<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            margin-top: 50px;
        }
        .form-header {
            margin-bottom: 30px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #7A1632;
            border-radius: 10px 10px 0 0;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn {
            background-color: #7A1632;
            border: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #641327;
        }
    </style>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container form-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white form-header text-center">
                    <h2>Finanace Form</h2>
                </div>
                <div class="card-body">
                    <form id="financeForm" method="POST" action="{{ route('financeForm.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="program">Program</label>
                                <select class="form-control" id="program" name="program" onchange="updateForm()">
                                    <option value="">Select a program</option>
                                    <option value="MBBS">MBBS</option>
                                    <option value="BDS">BDS</option>
                                    <option value="DPT">DPT</option>
                                    <option value="MLT">MLT</option>
                                    <option value="BSN">BSN</option>
                                    <option value="PRN">PRN</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="session">Session</label>
                                <select class="form-control" id="session" name="session">
                                    <option value="">Select a session</option>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="class">Class</label>
                                <select class="form-control" id="class" name="class">
                                    <option value="">Select a class</option>
                                    <!-- Options will be dynamically generated -->
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="issue">Issue Date</label>
                                <input type="date" class="form-control" id="issue" name="issue" placeholder="Enter Issue Date">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="due">Due Date</label>
                                <input type="date" class="form-control" id="due" name="due" placeholder="Enter Due Date">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="feeAcademicYear">Fee For Academic Year</label>
                                <input type="text" class="form-control" id="feeAcademicYear" name="feeAcademicYear" placeholder="Enter fee for academic year" oninput="calculateWithholdingTax()">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="withholdingTax">Withholding Tax (5%)</label>
                                <input type="text" class="form-control" id="withholdingTax" name="withholdingTax" placeholder="Enter withholding tax" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="annualCharges">Annual Charges</label>
                                <input type="text" class="form-control" id="annualCharges" name="annualCharges" placeholder="Enter annual charges">
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="preEnrolmentFee">Pre-Enrollment Fee</label>
                                <input type="text" class="form-control" id="preEnrolmentFee" name="preEnrolmentFee" placeholder="Enter pre-enrollment fee">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="incExamFee">INC-Exam Fee</label>
                                <input type="text" class="form-control" id="incExamFee" name="incExamFee" placeholder="Enter INC-exam fee">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="hostelFee">Hostel Fee</label>
                                <input type="text" class="form-control" id="hostelFee" name="hostelFee" placeholder="Enter hostel Fee">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="universityfee">University Affiliation Fee</label>
                                <input type="text" class="form-control" id="universityfee" name="universityfee" placeholder="Enter University fee">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="library">Library Fund</label>
                                <input type="text" class="form-control" id="library" name="library" placeholder="Enter library fund">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block text-white">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function calculateWithholdingTax() {
        var feeForAcademicYear = parseFloat(document.getElementById('feeAcademicYear').value) || 0;
        var withholdingTax = feeForAcademicYear * 0.05;
        document.getElementById('withholdingTax').value = withholdingTax.toFixed(2);
    }

    function updateForm() {
        var program = document.getElementById('program').value;
        var classField = document.getElementById('class');
        classField.innerHTML = '';  // Clear the existing options
        
        var classOptions = [];

        if (program === 'MBBS' || program === 'BDS') {
            classOptions = ['1 Year', '2 Year', '3 Year', '4 Year', '5 Year'];
        } else if (program === 'DPT') {
            classOptions = ['1 Semester', '2 Semester', '3 Semester', '4 Semester', '5 Semester', '6 Semester', '7 Semester', '8 Semester', '9 Semester', '10 Semester'];
        } else if (program === 'MLT') {
            classOptions = ['1 Semester', '2 Semester', '3 Semester', '4 Semester', '5 Semester', '6 Semester', '7 Semester', '8 Semester'];
        } else if (program === 'PRN' || program === 'BSN') {
            classOptions = ['1 Semester', '2 Semester', '3 Semester', '4 Semester', '5 Semester', '6 Semester', '7 Semester', '8 Semester'];
        } else {
            classOptions = ['Select a class'];
        }

        addClassOptions(classOptions);
    }

    function addClassOptions(options) {
        const classField = document.getElementById('class');
        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option;
            opt.textContent = option;
            classField.appendChild(opt);
        });
    }

    function setDefaultClass() {
        var selectedSession = document.getElementById('session').value;
        var classField = document.getElementById('class');
        var defaultClasses = [];
        var selectedProgram = document.getElementById('program').value;

        // Determine default classes based on the selected session and program
        switch (selectedSession) {
            case '2025':
                defaultClasses = (selectedProgram === 'MBBS' || selectedProgram === 'BDS') ? ['1 Year'] : ['Semester 1'];
                break;
            case '2024':
                defaultClasses = (selectedProgram === 'MBBS' || selectedProgram === 'BDS') ? ['2 Year'] : ['Semester 2'];
                break;
            case '2023':
                defaultClasses = (selectedProgram === 'MBBS' || selectedProgram === 'BDS') ? ['3 Year'] : ['Semester 3'];
                break;
            case '2022':
                defaultClasses = (selectedProgram === 'MBBS' || selectedProgram === 'BDS') ? ['4 Year'] : ['Semester 4'];
                break;
            case '2021':
                defaultClasses = (selectedProgram === 'MBBS' || selectedProgram === 'BDS') ? ['5 Year'] : ['Semester 5'];
                break;
            case '2020':
                defaultClasses = (selectedProgram === 'MBBS' || selectedProgram === 'BDS') ? ['5 Year'] : ['Semester 6'];
                break;
            default:
                defaultClasses = ['Select a class'];
                break;
        }

        // Set the default values in the dropdown
        classField.innerHTML = '';
        addClassOptions(defaultClasses);
    }

    // Add event listeners for program and session changes
    document.getElementById('program').addEventListener('change', function() {
        updateForm();
        setDefaultClass();  // Set default class based on the program and session
    });

    document.getElementById('session').addEventListener('change', function() {
        setDefaultClass();  // Set default class based on the session
    });
</script>

</body>
</html>
