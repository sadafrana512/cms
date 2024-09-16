<?php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf; // Ensure this is included
use App\Models\ChallanData;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function table()
    {
        return view('financetable');
    }
    public function retrieveData(Request $request) {
        $selectedProgram = $request->input('program');
        $selectedSession = $request->input('session');
        $selectedClass = $request->input('class');
    
        // Retrieve data from finance_form table
        $financeData = DB::table('finance_form')
            ->where('program', $selectedProgram)
            ->where('session', $selectedSession)
            ->where('class', $selectedClass)
            ->get()
            ->keyBy(function($item) {
                return $item->program . '-' . $item->session . '-' . $item->class;
            });
    
        // Retrieve data from studentdata table
        $mainData = DB::table('studentdata')
            ->where('program', $selectedProgram)
            ->where('session', $selectedSession)
            ->where('class', $selectedClass)
            ->get();
    
        // Retrieve data from fee_adjustments table
        $feeAdjustmentData = DB::table('fee_adjustments')
            ->where('program', $selectedProgram)
            ->where('session', $selectedSession)
            ->where('class', $selectedClass)
            ->get();
    
        // Retrieve data from paid_challan_data table
        $paidChallanData = DB::table('paid_challan_data')
            ->where('paid', 1)
            ->get()
            ->keyBy('name'); // Assuming studentName is the unique identifier
    
        // Combine data
        $combinedData = $mainData->map(function ($mainItem) use ($financeData, $feeAdjustmentData, $paidChallanData) {
            $key = $mainItem->program . '-' . $mainItem->session . '-' . $mainItem->class;
            $financeItem = $financeData->get($key);
    
            // Filter fee adjustments that match the student's name
            $matchingFeeAdjustments = $feeAdjustmentData->filter(function ($feeAdjustmentItem) use ($mainItem) {
                return $feeAdjustmentItem->studentName == $mainItem->name;
            });
    
            // Check if the student is in paid_challan_data
            $isPaidChallan = $paidChallanData->has($mainItem->name);
    
            $combinedItem = (array) $mainItem;
    
            if ($financeItem) {
                $combinedItem = array_merge($combinedItem, (array) $financeItem);
            } else {
                // Add default values for missing finance data
                $combinedItem = array_merge($combinedItem, [
                    'issue' => '',
                    'due' => '',
                    'feeAcademicYear' => 0,
                    'annualCharges' => 0,
                    'withholdingTax' => 0,
                    'hostelFee' => 0,
                    'universityFee' => 0,
                    'library' => 0,
                    'preEnrolmentFee' => 0,
                    'incExamFee' => 0,
                    'balance' => 0,
                    'scholarship' => 0,
                    'nest' => 0,
                    'anth' => 0,
                    'sDiscount' => 0,
                    'pmcDiscount' => 0,
                    'chairmanDiscount' => 0,
                    'ceoDiscount' => 0,
                    'feeAdjustment' => 0,
                    'arrears' => 0,
                    'totalWithinDueDate' => 0,
                    'lateFeeFine' => 0,
                    'totalAfterDueDate' => 0
                ]);
            }
    
            if ($matchingFeeAdjustments->isNotEmpty()) {
                // Merge the first matching fee adjustment data
                $combinedItem = array_merge($combinedItem, (array) $matchingFeeAdjustments->first());
            } else {
                // Add null values for missing or mismatched fee adjustment data
                $combinedItem = array_merge($combinedItem, [
                    'balance' => 0,
                    'scholarship' => 0,
                    'sdiscount' => 0,
                    'pmcdiscount' => 0,
                    'chairmandiscount' => 0,
                    'ceodiscount' => 0,
                    'nest' => 0,
                    'anth' => 0,
                    'feeAdjustment' => 0
                ]);
            }
    
            // Only update with paid_challan_data if the student has paid
            if ($isPaidChallan) {
                $paidData = $paidChallanData->get($mainItem->name);
                // Merge all fields from paid_challan_data
                $combinedItem = array_merge($combinedItem, (array) $paidData);
            }
    
            // Calculate arrears as the sum of feeAcademicYear and balance
                // Safely extract and cast values
                $feeAcademicYear = isset($combinedItem['feeAcademicYear']) ? (float)$combinedItem['feeAcademicYear'] : 0;
                $balance = isset($combinedItem['balance']) ? (float)$combinedItem['balance'] : 0;

                // Ensure both values are numeric
                $feeAcademicYear = is_numeric($feeAcademicYear) ? (float)$feeAcademicYear : 0;
                $balance = is_numeric($balance) ? (float)$balance : 0;

                // Calculate arrears
                $combinedItem['arrears'] = $feeAcademicYear + $balance;

                // Optional: Log values for debugging
                \Log::info('feeAcademicYear: ' . $feeAcademicYear);
                \Log::info('balance: ' . $balance);
                    
            // Calculate the sum of totalWithinDueDate
            $combinedItem['totalWithinDueDate'] = $combinedItem['arrears'] + $combinedItem['withholdingTax'] + $combinedItem['annualCharges'] + $combinedItem['feeAdjustment'] ?? 0;
            $combinedItem['totalAfterDueDate'] = $combinedItem['totalWithinDueDate'] + ($combinedItem['lateFeeFine'] ?? 0);
    
            return (object) $combinedItem;
        });
    
        // Return message if no data found
        if ($combinedData->isEmpty()) {
            return response()->json(['message' => 'No data found.']);
        }
    
        return response()->json($combinedData);
    }
    
    
// YourController.php
public function saveChallanData(Request $request)
{
    try {
        $program = $request->input('program');
        $session = $request->input('session');
        $class = $request->input('class');
        $tableData = $request->input('tableData');

        foreach ($tableData as $row) {
            ChallanData::create([
                'name' => $row['name'],
                'program' => $program,
                'session' => $session,
                'class' => $class,
                'email' => $row['email'],
                'issue' => $row['issue'],
                'due' => $row['due'],
                'feeAcademicYear' => $row['feeAcademicYear']?? 0,
                'annualCharges' => $row['annualCharges']?? 0,
                'withholdingTax' => $row['withholdingTax']?? 0,
                'hostelFee' => $row['hostelFee']?? 0,
                'universityFee' => $row['universityFee']?? 0,
                'library' => $row['library']?? 0,
                'preEnrolmentFee' => $row['preEnrolmentFee']?? 0,
                'incExamFee' => $row['incExamFee'],
                'balance' => $row['balance']?? 0,
                'scholarship' => $row['scholarship']?? 0,
                'nest' => $row['nest'] ?? 0, // Provide a default value if null
                'anth' => $row['anth'] ?? 0,
                'sdiscount' => $row['sdiscount'] ?? 0,
                'pmcdiscount' => $row['pmcdiscount'] ?? 0,
                'chairmandiscount' => $row['chairmandiscount'] ?? 0,
                'ceodiscount' => $row['ceodiscount'] ?? 0,
                'feeAdjustment' => $row['feeAdjustment'] ?? 0,
                'arrears' => $row['arrears'] ?? 0,
                'totalWithinDueDate' => $row['totalWithinDueDate'] ?? 0,
                'lateFeeFine' => $row['lateFeeFine'] ?? 0,
                'totalAfterDueDate' => $row['totalAfterDueDate'] ?? 0
            ]);
        }

        return response()->json(['status' => 'success']);
    } catch (\Exception $e) {
        \Log::error($e->getMessage());
        return response()->json(['status' => 'error', 'message' => 'There was an error saving the data. Please try again.']);
    }
}
public function generateChallan($program, $session, $class)
{
    // Fetch all relevant challan records
    $challanData = DB::table('challan_data')
        ->where('program', $program)
        ->where('session', $session)
        ->where('class', $class)
        ->get(); // Fetch all relevant challan records

    // Pass the data to the view
    return view('challan', ['entries' => $challanData]);
}

}