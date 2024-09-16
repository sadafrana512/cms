<?php

namespace App\Http\Controllers;
use App\Models\FinanceFormmodel;
use App\Models\FeeAdjustment;

use Illuminate\Http\Request;

class FinanceFormController extends Controller
{
    public function show()
    {
        return view('financeform');
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'program' => 'required|string',
            'session' => 'required|string',
            'class' => 'required|string',
            'issue' => 'required|date',
            'due' => 'required|date',
            'feeAcademicYear' => 'required|string',
            'annualCharges' => 'required|string',
            'withholdingTax' => 'required|string',
            'preEnrolmentFee' => 'required|string',
            'incExamFee' => 'required|string',
            'hostelFee' => 'required|string',
            'universityfee' => 'required|string',
            'library' => 'required|string',
        ]);

        $financeForm = new FinanceFormmodel();
        $financeForm->program = $request->program;
        $financeForm->session = $request->session;
        $financeForm->class = $request->class;
        $financeForm->issue = $request->issue;
        $financeForm->due = $request->due;
        $financeForm->feeAcademicYear = $request->feeAcademicYear;
        $financeForm->annualCharges = $request->annualCharges;
        $financeForm->withholdingTax = $request->withholdingTax;
        $financeForm->preEnrolmentFee = $request->preEnrolmentFee;
        $financeForm->incExamFee = $request->incExamFee;
        $financeForm->hostelFee = $request->hostelFee;
        $financeForm->universityfee = $request->universityfee;
        $financeForm->library = $request->library;
        $financeForm->save();

        return redirect()->back()->with('success', 'Finance form submitted successfully.');
    }
// form2feeadjustment
public function feeadjustment()
{
    return view('feeadjustment');
}
public function store1(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'studentId' => 'required|string',
            'studentName' => 'required|string',
            'program' => 'required|string',
            'session' => 'required|string',
            'class' => 'nullable|string',
            'balance' => 'nullable|numeric',
            'scholarship' => 'nullable|numeric',
            'nest' => 'nullable|numeric',
            'anth' => 'nullable|numeric',

            'sdiscount' => 'nullable|numeric',
            'pmcdiscount' => 'nullable|numeric',
            'chairmandiscount' => 'nullable|numeric',
            'ceodiscount' => 'nullable|numeric',
            'feeAdjustment' => 'nullable|numeric',
        ]);

        // Create a new FeeAdjustment record
        $feeAdjustment = FeeAdjustment::create($validated);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Fee adjustment submitted successfully.');
    }
}
