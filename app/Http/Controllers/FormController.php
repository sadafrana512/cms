<?php
namespace App\Http\Controllers;

use App\Models\FormModel;
use App\Models\MainForm;
use App\Models\ProgramApplication;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{
    public function showForm()
    {
        $Crequest = new MainForm(); // Assuming MainForm is the model you are working with
        return view('form', compact('Crequest'));
    }
    

     public function fetchData($profile_id)
    {
        // Fetch form data along with related academic, test information, city, user, and program applications
        $formModel = FormModel::with(['academicInformation', 'testInformation', 'city', 'user', 'programApplications'])
            ->where('tracking_id', $profile_id)
            ->first();

        if ($formModel) {
            // Extract personal information
            $data = $formModel->toArray();

            // Extract academic information for SSC and HSSC
            $sscData = $formModel->academicInformation()->where('exam_level', 'SSC')->first();
            $hsscData = $formModel->academicInformation()->where('exam_level', 'HSSC')->first();

            // Fill data for SSC (Matric) if available
            if ($sscData) {
                $data['matric_passing_year'] = $sscData->year_of_passing;
                $data['matric_board'] = $sscData->boards;
                $data['matric_marks_obtained'] = $sscData->obtained_marks;
                $data['matric_total_marks'] = $sscData->total_marks;
                $data['matric_institution'] = $sscData->school_name;
            }

            // Fill data for HSSC (FSC) if available
            if ($hsscData) {
                $data['fsc_passing_year'] = $hsscData->year_of_passing;
                $data['fsc_board'] = $hsscData->boards;
                $data['fsc_marks_obtained'] = $hsscData->obtained_marks;
                $data['fsc_total_marks'] = $hsscData->total_marks;
                $data['fsc_institution'] = $hsscData->school_name;
            }

            // Extract test information
            $testData = $formModel->testInformation()->first();
            if ($testData) {
                $data['registration_no'] = $testData->registration_number;
                $data['entry_test_type'] = $testData->degree_certificate;
                $data['mdcat_obtained_marks'] = $testData->obtained_marks;
                $data['mdcat_total_marks'] = $testData->total_marks;
                $data['mdcat_passing_year'] = $testData->exam_date; // assuming exam_date is the passing year
            }

            // Extract city name
            if ($formModel->city) {
                $data['city_name'] = $formModel->city->city_name;
            }

            // Extract user email
            if ($formModel->user) {
                $data['pemail'] = $formModel->user->email;
            }

            // Extract program name from program_tracking_id
            $programApplications = $formModel->programApplications;
            if ($programApplications) {
                $programNames = $programApplications->map(function ($program) {
                    $parts = explode('-', $program->program_tracking_id);
                    return $parts[1]; // return the middle part (program name)
                })->toArray();
                $data['program'] = $programNames;
            }

            // Retrieve session from students_program_application
            $programApplication = $formModel->programApplications()->first();
            if ($programApplication) {
                $data['admission_year'] = $programApplication->session;
            }

            $data['image_url'] = $formModel->image ? 'https://admissionportal.imdcollege.edu.pk/public/' . $formModel->image : null;
            $data['student_cnic_pdf_url'] = $formModel->student_document ? 'https://admissionportal.imdcollege.edu.pk/public/' . $formModel->student_document : null;
            $data['father_cnic_pdf_url'] = $formModel->father_document ? 'https://admissionportal.imdcollege.edu.pk/public/' . $formModel->father_document: null;
            $data['mother_cnic_pdf_url'] = $formModel->mother_document ? 'https://admissionportal.imdcollege.edu.pk/public/' . $formModel->mother_document : null;
                    

            return response()->json($data);
        }

        return response()->json(['message' => 'Data not found'], 404);
    }
    
    public function requestForm(Request $request)
    {
        try {
            $request->validate([
                // Personal Information
                'profile_id' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'last_name' => 'required|string|max:255',
                'cnic' => 'required|string|size:13|unique:personal_info,cnic',
                'birth_date' => 'required|date',
                'gender' => 'required|in:male,female,other',
                'marital_status' => 'required|in:single,married,divorced,widow,widower,separated',
                'blood_group' => 'required|string',
                'phone_no' => 'required|string|max:255',
                'roll_no' => 'required|string|max:255',
                'pemail' => 'required|email|max:255',
                'oemail' => 'email|max:255',
                'program' => 'required|string|max:255',
                'lms_id' => 'required|string|max:255',
                'admission_year' => 'required|string|max:255',
                'pmdc_reg_no' => 'required|string|max:255',
                'university_reg_no' => 'required|string|max:255',
                'domicile' => 'required|string|max:255',
                'category' => 'required|string',
                'hostel' => 'required|string',
                'transport' => 'required|string',
                'student_image' => 'required|string|max:255', // Adjusted to string
                'father_national_id' => 'required|string|size:13',
                'father_name' => 'required|string|max:255',
                'father_phone_no' => 'required|string|digits:11',
                'father_email' => 'required|email|max:255',
                'mother_national_id' => 'required|string|size:13',
                'mother_name' => 'required|string|max:255',
                'mother_phone_no' => 'required|string|digits:11',
                'mother_email' => 'required|email|max:255',
                'guardian_title' => 'required|string|max:255',
                'guardian_national_id' => 'required|string|size:13',
                'guardian_name' => 'required|string|max:255',
                'guardian_phone_no' => 'required|string|max:255',
                'guardian_email' => 'required|email|max:255',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'mother_cnic' => 'required|string|max:255', // Adjusted to string
                'father_cnic' => 'required|string|max:255', // Adjusted to string
                'student_cnic_image' => 'required|string|max:255', // Adjusted to string
    
                // SSC Academic Information
                'matric_passing_year' => 'required|digits:4|integer',
                'matric_board' => 'required|string|max:55',
                'matric_marks_obtained' => 'required|numeric',
                'matric_total_marks' => 'required|numeric',
                'matric_institution' => 'required|string|max:255',
    
                // HSSC Academic Information
                'fsc_passing_year' => 'required|digits:4|integer',
                'fsc_board' => 'required|string|max:55',
                'fsc_marks_obtained' => 'required|numeric',
                'fsc_total_marks' => 'required|numeric',
                'fsc_institution' => 'required|string|max:255',
    
                // Test Information
                'registration_no' => 'required|string|max:255',
                'entry_test_type' => 'required|string',
                'mdcat_obtained_marks' => 'required|numeric',
                'mdcat_total_marks' => 'required|numeric',
            ]);
    
            $Crequest = new MainForm();
            $Crequest->profile_id = $request->input('profile_id');
            $Crequest->unique_id = Str::random(10); // Assuming you want a random unique_id
            $Crequest->first_name = $request->input('first_name');
            $Crequest->middle_name = $request->input('middle_name'); 
            $Crequest->last_name = $request->input('last_name');
            $Crequest->cnic = $request->input('cnic');
            $Crequest->birth_date = $request->input('birth_date');
            $Crequest->gender = $request->input('gender');
            $Crequest->marital_status = $request->input('marital_status');
            $Crequest->blood_group = $request->input('blood_group');
            $Crequest->phone_no = $request->input('phone_no');  
            $Crequest->mailing_address_line_1 = $request->input('mailing_address_line_1');
            $Crequest->pemail = $request->input('pemail'); 
            $Crequest->program = $request->input('program');
            $Crequest->city = $request->input('city');
            $Crequest->category = $request->input('category');
            $Crequest->oemail = $request->input('oemail');
            $Crequest->lms_id = $request->input('lms_id');
            $Crequest->admission_year = $request->input('admission_year');
            $Crequest->pmdc_reg_no = $request->input('pmdc_reg_no');
            $Crequest->university_reg_no = $request->input('university_reg_no');
            $Crequest->domicile = $request->input('domicile');
            $Crequest->transport = $request->input('transport');
            $Crequest->hostel = $request->input('hostel');
            $Crequest->student_image = $request->input('student_image'); // Changed to input
            $Crequest->student_cnic_image = $request->input('student_cnic_image'); // Changed to input
    
            // Father's info
            $Crequest->father_name = $request->input('father_name');
            $Crequest->father_phone_no = $request->input('father_phone_no');
            $Crequest->father_email = $request->input('father_email');
            $Crequest->father_national_id = $request->input('father_national_id');
            $Crequest->father_cnic = $request->input('father_cnic'); // Changed to input
    
            // Mother's info
            $Crequest->mother_national_id = $request->input('mother_national_id');
            $Crequest->mother_name = $request->input('mother_name');
            $Crequest->mother_phone_no = $request->input('mother_phone_no');
            $Crequest->mother_email = $request->input('mother_email');
            $Crequest->mother_cnic = $request->input('mother_cnic'); // Changed to input
    
            // Guardian's info
            $Crequest->guardian_title = $request->input('guardian_title');
            $Crequest->guardian_national_id = $request->input('guardian_national_id');
            $Crequest->guardian_phone_no = $request->input('guardian_phone_no');
            $Crequest->guardian_email = $request->input('guardian_email');
            $Crequest->guardian_name = $request->input('guardian_name');
    
            // Academic info (SSC)
            $Crequest->matric_passing_year = $request->input('matric_passing_year');
            $Crequest->matric_board = $request->input('matric_board');
            $Crequest->matric_marks_obtained = $request->input('matric_marks_obtained');
            $Crequest->matric_total_marks = $request->input('matric_total_marks');
            $Crequest->matric_institution = $request->input('matric_institution');
    
            // Academic info (HSSC)
            $Crequest->fsc_passing_year = $request->input('fsc_passing_year');
            $Crequest->fsc_board = $request->input('fsc_board');
            $Crequest->fsc_marks_obtained = $request->input('fsc_marks_obtained');
            $Crequest->fsc_total_marks = $request->input('fsc_total_marks');
            $Crequest->fsc_institution = $request->input('fsc_institution');
    
            // Test info
            $Crequest->registration_no = $request->input('registration_no');
            $Crequest->entry_test_type = $request->input('entry_test_type');
            $Crequest->mdcat_obtained_marks = $request->input('mdcat_obtained_marks');
            $Crequest->mdcat_total_marks = $request->input('mdcat_total_marks');
    
            if ($Crequest->save()) {
                return redirect()->back()->with('success', 'Form submitted successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to submit form. Please try again.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}    