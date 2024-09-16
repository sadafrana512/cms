<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    public function updatePaidStatus(Request $request)
    {
        $names = $request->input('names'); // Expecting an array of names

        Log::info('Update Paid Status Request Data:', ['names' => $names]);

        if (is_array($names) && count($names) > 0) {
            DB::beginTransaction(); // Start transaction
            try {
                // Fetch rows from challan_data based on names
                $rows = \DB::table('challan_data')
                    ->whereIn('name', $names)
                    ->get();

                Log::info('Rows fetched from the database:', ['rows' => $rows]);

                $updatedNames = [];

                foreach ($rows as $row) {
                    // Check if the entry already exists in paid_challan_data
                    $exists = \DB::table('paid_challan_data')
                        ->where('name', $row->name)
                        ->exists();

                    $updatedRow = [
                        'name' => $row->name,
                        'program' => $row->program,
                        'session' => $row->session,
                        'class' => $row->class,
                        'email' => $row->email,
                        'issue' => $row->issue,
                        'due' => $row->due,
                        'feeAcademicYear' => 0,
                        'annualcharges' => 0,
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
                        'sdiscount' => 0,
                        'pmcdiscount' => 0,
                        'chairmandiscount' => 0,
                        'ceodiscount' => 0,
                        'feeAdjustment' => 0,
                        'arrears' => 0,
                        'totalWithinDueDate' => 0,
                        'lateFeeFine' => 0,
                        'totalAfterDueDate' => 0,
                        'paid' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    if ($exists) {
                        // Update the existing record
                        \DB::table('paid_challan_data')
                            ->where('name', $row->name)
                            ->update($updatedRow);
                        Log::info('Updated existing record:', ['name' => $row->name]);
                    } else {
                        // Insert a new record
                        \DB::table('paid_challan_data')->insert($updatedRow);
                        Log::info('Inserted new record:', ['name' => $row->name]);
                    }

                    // Update the challan_data table
                    \DB::table('challan_data')
                        ->where('name', $row->name)
                        ->update(['paid' => 1]);
                    Log::info('Updated challan_data record:', ['name' => $row->name]);

                    $updatedNames[] = $row->name;
                }

                DB::commit();

                // Fetch updated rows from paid_challan_data to send in the response
                $updatedRows = \DB::table('paid_challan_data')
                    ->whereIn('name', $updatedNames)
                    ->get();

                Log::info('Updated rows:', ['rows' => $updatedRows]);

                return response()->json([
                    'success' => true,
                    'message' => 'Data updated successfully.',
                    'updated_rows' => $updatedRows
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Exception occurred during update:', ['exception' => $e->getMessage()]);
                return response()->json(['success' => false, 'message' => 'An error occurred while processing your request.'], 500);
            }
        }

        Log::warning('No rows selected.', ['names' => $names]);
        return response()->json(['success' => false, 'message' => 'No rows selected.'], 400);
    }
}
