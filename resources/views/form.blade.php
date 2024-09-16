<!doctype html>

<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Attendence Portal</title></title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link
    rel="icon"
    type="image/png"
    sizes="16x16"
    href="../assets/images/favicon.png" /> 
    <script src="progress-bar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"  crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"  crossorigin="anonymous"></script>
   <!-- Font Awesome CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/assets/css/style.css">
    <link rel="stylesheet" href="assets/assets/css/style2.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
        <style>
        .preview {
            margin-top: 10px;
        }
        .preview img, .preview object {
            max-width: 100%;
            max-height: 150px;
        }
    </style>
</head>
<body> 
        <div id="right-panel" class="right-panel">
            <!-- Header-->
            <header id="header" class="header">
                <div class="header-menu">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-6">
                            <div class="header-left">
                                <img src="assets/images/logo8.png" alt="Admission Portal Image" class="img-fluid" style="max-width: 40%; height: auto; padding-top: 0px;">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <div class="header-right float-md-right text-right">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-link">
                    <img class="user-avatar rounded-circle" src="assets/images/logout.png" alt="" style="width: 20px; height: 20px;">
                    Logout
                </button>
            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
                <!-- Header-->
        <div class="breadcrumbs">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                            
                            </div>
                        </div>
                    </div>
                
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                        
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
        <div  class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6" id="personalInformationCard2">
                        <div class="card">
                            @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif       
                            <div class="card-header">
                                <strong class="card-title">Student Information</strong>
                            </div>
                            <div id="editForm" class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">                     
                                    <form action="{{ route('requestForm') }}" method="post" class="simpleForm" enctype="multipart/form-data" novalidate="novalidate">
                                        @csrf
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="profile_id" class="form-control-label">Profile ID</label>
                                                <input type="text" id="profile_id" name="profile_id" placeholder="Enter your Profile ID"  class="form-control capitalize" required>
                                                @error('profile_id')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
    
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="first_name" class="form-control-label">* First Name</label>
                                                <input type="text" id="first_name" name="first_name" placeholder=""  class="form-control capitalize" required>
                                                @error('first_name')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="middle_name" class="form-control-label">Middle Name</label>
                                                <input type="text" id="middle_name" name="middle_name" placeholder=" " class="form-control capitalize" required>
                                                @error('middle_name')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="last_name" class="form-control-label">Last Name</label>
                                                <input type="text" id="last_name" name="last_name" placeholder=" " class="form-control capitalize" required>
                                                @error('last_name')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="cnic" class="form-control-label">* CNIC/Form-B</label>
                                                <input type="text" id="cnic" name="cnic" placeholder="" maxlength="13"  class="form-control" required>
                                                @error('cnic')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="gender" class="form-control-label">* Gender</label>
                                                <input type="text" id="gender" name="gender" placeholder=""   class="form-control capitalize" required>
                                                @error('gender')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="marital_status" class="form-control-label">* Marital Status</label>
                                                <input type="text" id="marital_status" name="marital_status" placeholder=""  class="form-control capitalize" required>
                                                @error('marital_status')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="blood_group" class="form-control-label">* Blood Group</label>
                                                <input type="text" id="blood_group" name="blood_group" placeholder=""  class="form-control capitalize" required>
                                                @error('blood_group')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="birth_date" class="form-control-label">* Birthday</label>
                                                <div class="input-group">
                                                    <input type="text" id="birth_date" class="form-control" placeholder=""  name="birth_date" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                                  @error('birth_date')
                                                    <p class="error-message">{{ $message }}</p>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="phone_no" class="form-control-label">* Phone No</label>
                                                <input type="text" id="phone_no" name="phone_no" placeholder=""   class="form-control" required>
                                                @error('phone_no')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="address" class="form-control-label">*Address</label>
                                                <input type="text" id="address" name="address" placeholder=""   class="form-control capitalize"required>
                                                @error('address')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="roll_no" class="form-control-label">Roll No</label>
                                                <input type="text" id="roll_no" name="roll_no" placeholder=""  class="form-control capitalize"required>
                                                @error('roll_no')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="pemail" class="form-control-label">*Personal Email</label>
                                                <input type="text" id="pemail" name="pemail" placeholder=""  class="form-control"required>
                                                @error('pemail')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="program" class="form-control-label">*Program</label>
                                                <input type="text" id="program" name="program" placeholder=""    class="form-control"required>
                                                @error('program')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="city" class="form-control-label">*City</label>
                                                <input type="text" id="city" name="city" placeholder=""   class="form-control capitalize"required>
                                                @error('city')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" id="personalInformationCard">
                                    <div class="card">
                                        <div class="card-header"><strong>Student Information</strong></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="category">* Category</label>
                                                        <select name="category" id="category" class="form-control" required>
                                                            <option value="1" {{ old('category') == '0' ? 'selected' : '' }}>Select</option>
                                                            <option value="2" {{ old('category') == 'Open Merit' ? 'selected' : '' }}>Open Merit</option>
                                                            <option value="3" {{ old('category') == 'Foreign' ? 'selected' : '' }}>Foreign</option>
                                                        </select>
                                                        @error('category')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="oemail_id" class="form-control-label">Official Email</label>
                                                        <input type="email" id="oemail" name="oemail" placeholder="" class="form-control "required>
                                                        @error('oemail')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="lms_id" class="form-control-label">* LMS ID</label>
                                                        <input type="text" id="lms_id" name="lms_id" placeholder="" class="form-control capitalize"required>
                                                        @error('lms_id')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="admission_year" class="form-control-label">Admission Year</label>
                                                        <input type="text" id="admission_year" name="admission_year" placeholder="" class="form-control capitalize"required>
                                                        @error('admission_year')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="pmdc_reg_no" class="form-control-label">PMDC Reg No</label>
                                                        <input type="text" id="pmdc_reg_no" name="pmdc_reg_no" placeholder="" class="form-control"required>
                                                        @error('pmdc_reg_no')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="university_reg_no" class="form-control-label">University Reg No</label>
                                                        <input type="text" id="university_reg_no" name="university_reg_no" placeholder="" class="form-control"required>
                                                        @error('university_reg_no')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="domicile" class="form-control-label">* Domicile</label>
                                                        <input type="text" id="domicile" name="domicile" placeholder=""  class="form-control"required>
                                                        @error('domicile')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
    
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="transport">* Transport</label>
                                                        <select name="transport" id="transport" class="form-control"required >
                                                            <option value="1" {{ old('transport') == '0' ? 'selected' : '' }}>Select</option>
                                                            <option value="2" {{ old('transport') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                            <option value="3" {{ old('transport') == 'No' ? 'selected' : '' }}>No</option>
                                                        </select>
                                                        @error('transport')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="hostel">* Hostel</label>
                                                        <select name="hostel" id="hostel" class="form-control"required>
                                                            <option value="1" {{ old('hostel') == '0' ? 'selected' : '' }}>Select</option>
                                                            <option value="2" {{ old('hostel') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                            <option value="3" {{ old('hostel') == 'No' ? 'selected' : '' }}>No</option>
                                                        </select>
                                                        @error('hostel')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>                                                   
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="student_image" class="form-control-label">*Student Image</label>
                                                            <input type="hidden" id="student_image" name="student_image" value="{{ $Crequest->student_image }}">
                                                        
                                                            <div id="imagePreviewContainer">
                                                                <img id="imagePreview" src="{{ asset('storage/' . $Crequest->student_image) }}" alt="Student Image" style="max-width: 100%; max-height: 200px;">
                                                            </div>
                                                            @error('student_image')
                                                            <p class="error-message">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Hidden input to submit existing file path -->
                                                    <input type="hidden" id="student_cnic_image" name="student_cnic_image" value="{{ $Crequest->student_cnic_image }}">
                                                    
                                                    <!-- Display link to view CNIC PDF -->
                                                    <div id="studentCnicPdfPreviewContainer">
                                                        <a id="studentCnicPdfLink" href="{{ asset('storage/' . $Crequest->student_cnic_image) }}" target="_blank">View CNIC PDF</a>
                                                    </div>
                                                    
                                                <script>
                                                    $(document).ready(function() {
                                                        // Function to handle file selection for student image
                                                        $('#imagePreviewContainer').on('change', '#student_image_input', function(evt) {
                                                            handleFileSelect(evt, 'imagePreview', 'student_image');
                                                        });
                                                
                                                        // Function to handle file selection for student CNIC image
                                                        $('#studentCnicImagePreviewContainer').on('change', '#student_cnic_image_input', function(evt) {
                                                            handleFileSelect(evt, 'studentCnicImagePreview', 'student_cnic_image');
                                                        });
                                                
                                                        function handleFileSelect(evt, previewId, inputId) {
                                                            var file = evt.target.files[0];
                                                
                                                            var reader = new FileReader();
                                                            reader.onload = function(e) {
                                                                $('#' + previewId).attr('src', e.target.result);
                                                            };
                                                            reader.readAsDataURL(file);
                                                
                                                            // Set the hidden input value for form submission
                                                            var formData = new FormData();
                                                            formData.append(inputId, file);
                                                        }
                                                    });
                                                </script>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <div class="col-lg-6" id="fatherInformationForm">
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong class="card-title">Father Information</strong>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                    <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="father_name">*Father Name</label>
                                                    <input type="text" name="father_name" id="father_name" class="form-control capitalize"  placeholder=""required>
                                                    @error('father_name')
                                                    <p class="error-message">{{ $message }}</p>
                                                    @enderror
                                                    </div>   
                                                    <div class="form-group">
                                                
                                                        <label for="mother_national_id">*Father's National Identity Card</label>
                                                        <input type="text" name="father_national_id" id="father_national_id"  class="form-control" maxlength="13"  placeholder=""required>
                                                        @error('father_national_id')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    
                                                    </div>
                                                
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                    <label for="mother_email">* Email Address</label>
                                                    <input type="email" name="father_email" id="father_email"   class="form-control" placeholder=""required>
                                                    @error('father_email')
                                                    <p class="error-message">{{ $message }}</p>
                                                    @enderror
                                                    </div>
                                                    <div class="form-group">
                                                
                                                        <label for="father_phone_no">* Phone No</label>
                                                        <input type="text" name="father_phone_no" id="father_phone_no"  class="form-control"  placeholder=""required>
                                                        @error('father_phone_no')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="father_cnic" class="form-control-label">*Father's CNIC</label>
                                                        <!-- Hidden input for storing father's CNIC file path -->
                                                        <input type="hidden" name="father_cnic" id="father_cnic" >
                                                
                                                        <!-- Error handling -->
                                                        @error('father_cnic')
                                                        <p class="error-message">{{ $message }}</p>
                                                        @enderror
                                                
                                                        <!-- Preview container for father's CNIC PDF -->
                                                        <div id="fatherCnicPreviewContainer">
                                                            <a id="fatherCnicPdfLink" href="#" target="_blank">View Father's CNIC PDF</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                        <div class="col-lg-6" id="motherInformationForm">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Mother Information</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mother_name">* Mother Name</label>
                                    <input type="text" name="mother_name" id="mother_name"   class="form-control capitalize"  placeholder="" required>
                                    @error('mother_name')
                                    <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group">                                
                                        <label for="mother_national_id">* Mother's National Identity Card</label>
                                        <input type="text" name="mother_national_id" id="mother_national_id"   class="form-control" maxlength="13" placeholder="" required>                                   
                                        @error('mother_national_id')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>                               
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for="mother_email">* Email Address</label>
                                    <input type="email" name="mother_email" id="mother_email" class="form-control" placeholder=""required>
                                    @error('mother_email')
                                    <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                    <label for="mother_phone_no">* Phone No</label>
                                    <input type="text" name="mother_phone_no" id="mother_phone_no" class="form-control"   placeholder=""required>                                        
                                    @error('mother_phone_no')
                                    <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>                               
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="mother_cnic" class="form-control-label">*Mother's CNIC</label>
                                        <!-- Hidden input for storing mother's CNIC file path -->
                                        <input type="hidden" name="mother_cnic" id="mother_cnic" value="">
                                
                                        <!-- Error handling -->
                                        @error('mother_cnic')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                
                                        <!-- Preview container for mother's CNIC PDF -->
                                        <div id="motherCnicPreviewContainer">
                                            <a id="motherCnicPdfLink" href="#" target="_blank">View Mother's CNIC PDF</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                                        </div>
                            </div>
                        </div>
                        <div class="col-lg-6" id="guardianInformationForm">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Guardian Information</strong>
                               
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="guardian_title">* Title</label>
                                        <input type="text" name="guardian_title" id="guardian_title" class="form-control capitalize"  placeholder="" required>
                                        @error('guardian_name')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        
                                        <label for="guardian_email">* Email Address</label>
                                        <input type="email" name="guardian_email" id="guardian_email"  class="form-control"  placeholder=""  required>
                                        @error('guardian_email')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">                                        
                                    <label for="guardian_national_id">* Guardian's National Identity Card</label>
                                    <input type="text" name="guardian_national_id" id="guardian_national_id" class="form-control"  maxlength="13"  placeholder=""required>
                                    @error('guardian_national_id')
                                    <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                        
                                                <label for="guardian_name">* Guardian Name</label>
                                                <input type="text" name="guardian_name" id="guardian_name" class="form-control capitalize" placeholder="" required>
                                                @error('guardian_name')
                                                    <p class="error-message">{{ $message }}</p>
                                                    @enderror
                                            </div>
                                        
                                            <div class="form-group">
                                            
                                                <label for="guardian_phone_no">* Phone No</label>
                                                <input type="text" name="guardian_phone_no" id="guardian_phone_no"  class="form-control"  placeholder=""   required>
                                                @error('guardian_phone_no')
                                                <p class="error-message">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            </div>
    
    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SSC Academic Information -->
                        <div class="col-lg-6" id="matricAcademicInformation">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Academic Information (SSC)</strong>
                                </div>
                                <div class="card-body">
                                    <!-- Matric Passing Year and Board -->
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="col-form-label text-right">* Matric Passing Year</label>
                                            <input type="text" name="matric_passing_year" id="matric_passing_year" class="form-control capitalize" maxlength="55"  required>
                                            @error('matric_passing_year')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="col-form-label text-right">* Matric Board</label>
                                            <input type="text" name="matric_board" id="matric_board" class="form-control capitalize" maxlength="55"  required>
                                            @error('matric_board')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Matric Marks Obtained and Total -->
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="col-form-label text-right">* Matric Marks Obtained</label>
                                            <input type="text" name="matric_marks_obtained" id="matric_marks_obtained" class="form-control" maxlength="12"  required>
                                            @error('matric_marks_obtained')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="col-form-label text-right">* Matric Total Marks</label>
                                            <input type="text" name="matric_total_marks" id="matric_total_marks" class="form-control"  required>
                                            @error('matric_total_marks')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Matric Institution -->
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="col-form-label text-right">* Institution</label>
                                            <input type="text" name="matric_institution" id="matric_institution" class="form-control"  required>
                                            @error('matric_institution')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <!-- HSSC Academic Information -->
                        <div class="col-lg-6" id="fscAcademicInformation">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Academic Information (HSSC)</strong>
                                </div>
                                <div class="card-body">
                                    <!-- FSC Passing Year and Board -->
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="col-form-label text-right">* FSC Passing Year</label>
                                            <input type="text" name="fsc_passing_year" id="fsc_passing_year" class="form-control capitalize" maxlength="55"  required>
                                            @error('fsc_passing_year')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="col-form-label text-right">* FSC Board</label>
                                            <input type="text" name="fsc_board" id="fsc_board" class="form-control capitalize" maxlength="55"  required>
                                            @error('fsc_board')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- FSC Marks Obtained and Total -->
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="col-form-label text-right">* FSC Marks Obtained</label>
                                            <input type="text" name="fsc_marks_obtained" id="fsc_marks_obtained" class="form-control" maxlength="12" required>
                                            @error('fsc_marks_obtained')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="col-form-label text-right">* FSC Total Marks</label>
                                            <input type="text" name="fsc_total_marks" id="fsc_total_marks" class="form-control" required>
                                            @error('fsc_total_marks')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- FSC Institution -->
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="col-form-label text-right">* Institution</label>
                                            <input type="text" name="fsc_institution" id="fsc_institution" class="form-control" required>
                                            @error('fsc_institution')
                                            <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Test Information -->
                    <div class="col-lg-6" id="testInformation">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Student Test Information</strong>
                            </div>
                            <div class="card-body">
                                <!-- MDCAT Roll No and MDCAT Marks -->
                                {{-- <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="col-form-label text-right">* MDCAT Roll No</label>
                                        <input type="text" name="mdcat_roll_no" id="mdcat_roll_no" class="form-control capitalize" maxlength="55" value="{{ isset($testData) ? $testData->registration_number : '' }}" required>
                                        @error('mdcat_roll_no')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="col-form-label text-right">* MDCAT Marks</label>
                                        <input type="text" name="mdcat_marks" id="mdcat_marks" class="form-control capitalize" maxlength="55" value="{{ isset($testData) ? $testData->obtained_marks : '' }}" required>
                                        @error('mdcat_marks')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div> --}}
                                <!-- Entry Test Type and Registration No -->
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="col-form-label text-right">* Registration No</label>
                                        <input type="text" name="registration_no" id="registration_no" class="form-control"  required>
                                        @error('registration_no')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="col-form-label text-right">* Entry Test Type</label>
                                        <input type="text" name="entry_test_type" id="entry_test_type" class="form-control" maxlength="12" required>
                                        @error('entry_test_type')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <!-- MDCAT Obtained Marks and MDCAT Total Marks -->
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="col-form-label text-right">* MDCAT Obtained Marks</label>
                                        <input type="text" name="mdcat_obtained_marks" id="mdcat_obtained_marks" class="form-control" required>
                                        @error('mdcat_obtained_marks')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="col-form-label text-right">* MDCAT Total Marks</label>
                                        <input type="text" name="mdcat_total_marks" id="mdcat_total_marks" class="form-control"  required>
                                        @error('mdcat_total_marks')
                                        <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                     </div>
                   </div>
                        <div class="text-center" style="text-align: center;">
                            <button type="submit" id="saveAndNextButton" class="btn btn-primary" style="
                            padding: 12px 12px;
                            font-size: 16px;
                            color: white;
                            background-color: #7a1632; /* Background color */
                            border: none;
                            border-radius: 30px;
                            cursor: pointer;
                            transition: background-color 0.3s ease;
                            display: inline-block;
                            margin-right: 8px;
                            width: 150px; /* Adjust the width as needed */
                        ">
                            Save
                        </button>
                        
                        </div>
                            </form>
                            <script>
                                document.getElementById('profile_id').addEventListener('change', function() {
                                    var profileId = this.value;
                                    if (profileId) {
                                        fetch(`/fetch-data/${profileId}`)
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data) {
                                                    // Personal information fields
                                                    document.getElementById('first_name').value = data.first_name;
                                                    document.getElementById('middle_name').value = data.middle_name;
                                                    document.getElementById('last_name').value = data.last_name;
                                                    document.getElementById('cnic').value = data.cnic;
                                                    document.getElementById('gender').value = data.gender;
                                                    document.getElementById('birth_date').value = data.birth_date;
                                                    document.getElementById('marital_status').value = data.marital_status;
                                                    document.getElementById('blood_group').value = data.blood_group;
                                                    document.getElementById('phone_no').value = data.phone_no;
                                                    document.getElementById('address').value = data.mailing_address_line_1;
                                                    document.getElementById('pemail').value = data.pemail;
                                                    document.getElementById('program').value = data.program;
                                                    document.getElementById('city').value = data.city_name;
                                                    document.getElementById('father_name').value = data.father_name;
                                                    document.getElementById('mother_name').value = data.mother_name;
                                                    document.getElementById('father_email').value = data.father_email;
                                                    document.getElementById('mother_email').value = data.mother_email;
                                                    document.getElementById('father_phone_no').value = data.father_phone_no;
                                                    document.getElementById('mother_phone_no').value = data.mother_phone_no;
                                                    document.getElementById('father_national_id').value = data.father_national_id;
                                                    document.getElementById('mother_national_id').value = data.mother_national_id;
                                
                                                    if (data.image_url) {
                                                        $('#imagePreview').attr('src', data.image_url);
                                                        $('#imagePreview').show(); // Show image preview container
                                                        document.getElementById('student_image').value = data.image_url; // Set hidden input value
                                                    } else {
                                                        $('#imagePreview').attr('src', '#'); // Clear image preview if no image found
                                                        $('#imagePreview').hide(); // Hide image preview container
                                                    }
                                
                                                    // Show student CNIC image if available
                                                    if (data.student_cnic_pdf_url) {
                                                        $('#studentCnicPdfLink').attr('href', data.student_cnic_pdf_url);
                                                        $('#studentCnicPdfLink').text('View CNIC PDF'); // Update link text
                                                        $('#studentCnicPdfPreviewContainer').show(); // Show PDF link container
                                                        document.getElementById('student_cnic_image').value = data.student_cnic_pdf_url; // Set hidden input value
                                                    } else {
                                                        $('#studentCnicPdfPreviewContainer').hide(); // Hide PDF link container if no PDF URL
                                                    }
                                
                                                    // Show father's CNIC PDF if available
                                                    if (data.father_cnic_pdf_url) {
                                                        $('#fatherCnicPdfLink').attr('href', data.father_cnic_pdf_url);
                                                        $('#fatherCnicPdfLink').text('View Father\'s CNIC PDF'); // Update link text
                                                        $('#fatherCnicPreviewContainer').show(); // Show PDF link container
                                                        document.getElementById('father_cnic').value = data.father_cnic_pdf_url; // Set hidden input value
                                                    } else {
                                                        $('#fatherCnicPreviewContainer').hide(); // Hide PDF link container if no PDF URL
                                                    }
                                
                                                    // Show mother's CNIC PDF if available
                                                    if (data.mother_cnic_pdf_url) {
                                                        $('#motherCnicPdfLink').attr('href', data.mother_cnic_pdf_url);
                                                        $('#motherCnicPdfLink').text('View Mother\'s CNIC PDF'); // Update link text
                                                        $('#motherCnicPreviewContainer').show(); // Show PDF link container
                                                        document.getElementById('mother_cnic').value = data.mother_cnic_pdf_url; // Set hidden input value
                                                    } else {
                                                        $('#motherCnicPreviewContainer').hide(); // Hide PDF link container if no PDF URL
                                                    }
                                
                                                    document.getElementById('admission_year').value = data.admission_year;
                                                    document.getElementById('guardian_title').value = data.guardian_title;
                                                    document.getElementById('guardian_national_id').value = data.guardian_national_id;
                                                    document.getElementById('guardian_phone_no').value = data.guardian_phone_no;
                                                    document.getElementById('guardian_email').value = data.guardian_email;
                                                    document.getElementById('guardian_name').value = data.guardian_name;
                                
                                                    // Academic information fields based on exam level
                                                    if (data.matric_passing_year) {
                                                        document.getElementById('matric_passing_year').value = data.matric_passing_year;
                                                        document.getElementById('matric_board').value = data.matric_board;
                                                        document.getElementById('matric_marks_obtained').value = data.matric_marks_obtained;
                                                        document.getElementById('matric_total_marks').value = data.matric_total_marks;
                                                        document.getElementById('matric_institution').value = data.matric_institution;
                                                    }
                                                    if (data.fsc_passing_year) {
                                                        document.getElementById('fsc_passing_year').value = data.fsc_passing_year;
                                                        document.getElementById('fsc_board').value = data.fsc_board;
                                                        document.getElementById('fsc_marks_obtained').value = data.fsc_marks_obtained;
                                                        document.getElementById('fsc_total_marks').value = data.fsc_total_marks;
                                                        document.getElementById('fsc_institution').value = data.fsc_institution;
                                                    }
                                
                                                    // Additional fields
                                                    document.getElementById('registration_no').value = data.registration_no;
                                                    document.getElementById('entry_test_type').value = data.entry_test_type;
                                                    document.getElementById('mdcat_obtained_marks').value = data.mdcat_obtained_marks;
                                                    document.getElementById('mdcat_total_marks').value = data.mdcat_total_marks;
                                                    document.getElementById('mdcat_passing_year').value = data.mdcat_passing_year;
                                                }
                                            })
                                            .catch(error => console.error('Error fetching data:', error));
                                    }
                                });
                                </script>
                                
                            
                        </div>
                    </div>
               
                    <script>
                        $(document).ready(function() {
                            $('input').on('input', function() {
                                // Clear the error message for the current input field
                                $(this).next('.error-message').remove();
                            });
                        });
                    </script>         
<script src="assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="assets/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="assets/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>
<script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


</body>
</html>
