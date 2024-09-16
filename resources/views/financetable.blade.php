<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Finance Module</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/table.js') }}"></script>    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style>
        .heading-center {
            text-align: center;
            margin-top: 20px;
            color: #7A1632;
        }
        .links-bar {
            text-align: center;
            margin: 20px 0;
        }
        .links-bar a {
            margin: 0 10px;
            padding: 10px 20px;
            background-color: #7A1632;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }
        .links-bar a:hover {
            background-color: #5a1223;
        }
        #generate-challan {
            background-color: #7A1632;
            color: white;
        }
        
        /* Webkit browsers (Chrome, Safari) */
        ::-webkit-scrollbar {
            width: 12px; /* Width of the scrollbar */
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1; /* Track background color */
        }

        ::-webkit-scrollbar-thumb {
            background: #888; /* Scrollbar thumb color */
            border-radius: 10px; /* Scrollbar thumb border-radius */
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555; /* Scrollbar thumb color on hover */
        }

        /* Firefox */
        * {
            scrollbar-width: thick; /* Width of the scrollbar */
            scrollbar-color: #888 #f1f1f1; /* Scrollbar thumb and track color */
        }

        @media (max-width: 768px) {
            .links-bar {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .links-bar a {
                margin: 5px 0;
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h1 class="heading-center"><b>Finance Module</b></h1>
    <div class="links-bar">
        <a href="{{ url('/financeform') }}">Finance Form</a>
        <a href="{{ url('/feeadjustment') }}">Fee Ajdustment Form</a>
        <a href="{{ url('/form') }}">Student Information Form</a>
        <a href="">Fee Challan</a>
    </div>
    <div class="content mt-3">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <strong class="card-title">Finance Information</strong>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between mb-3">
                <form action="{{ route('retrieve-data') }}" method="post" class="form-inline" id="trackingForm">
                  @csrf
                  <div class="form-group mb-2 ml-2">
                      <label for="program" class="mr-2">Program:</label>
                      <select id="program" name="program" class="form-control" required>
                          <option value="">Select Program</option>
                          <option value="MBBS">MBBS</option>
                          <option value="BDS">BDS</option>
                          <option value="DPT">DPT</option>
                          <option value="MLT">MLT</option>
                          <option value="BSN">BSN</option>
                          <option value="PRN">PRN</option>
                      </select>
                  </div>
              
                  <div class="form-group mb-2 ml-2">
                      <label for="session" class="mr-2">Session:</label>
                      <select id="session" name="session" class="form-control" required>
                          <option value="">Select Session</option>
                          <option value="2025">2025</option>
                          <option value="2024">2024</option>
                          <option value="2023">2023</option>
                          <option value="2022">2022</option>
                          <option value="2021">2021</option>
                          <option value="2020">2020</option>
                      </select>
                  </div>
              
                  <div class="form-group mb-2 ml-2">
                      <label for="class" class="mr-2">Class/Semester:</label>
                      <select id="class" name="class" class="form-control" required>
                          <option value="">Select Class/Semester</option>
                      </select>
                  </div>
              
                  <button type="submit" class="btn btn-success mb-2 ml-2">Submit</button>

              </form>

              <!-- Search Bar aligned to the right -->

              <div class="form-group mb-3 ml-2">            
                <!-- Search Input -->
                <input type="text" id="searchInput" class="form-control" placeholder="Search..." style="width: 200px;">
            </div>
            <button type="button" id="markAsPaidBtn" class="btn btn-danger mb-2 ml-2">Mark as Paid</button>

              </div>
              <div id="table-container" class="table-responsive">
                  <table id="data-table" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Program</th>
                              <th>Session</th>
                              <th>Class</th>
                              <th>Email</th>
                              <th>Issue</th>
                              <th>Due</th>
                              <th style="background-color: grey;">Fee Academic Year</th>
                              <th>Annual Charges</th>
                              <th style="background-color: yellow;">Withholding Tax</th>
                              <th>Hostel Fee</th>
                              <th>University Fee</th>
                              <th>Library Fund</th>
                              <th>Pre Enrollment Fee</th>
                              <th>Inc Exam Fee</th>
                              <th style="background-color: grey;">Previous Year Balance</th>
                              <th style="background-color: rgb(35, 156, 116);">Scholarship</th>
                              <th style="background-color: rgb(35, 156, 116);">Nest Scholarship</th>
                              <th style="background-color: rgb(35, 156, 116);">Anth Scholarship</th>
                              <th style="background-color: #FFE4E1;">Sibling Discount</th>
                              <th style="background-color:#FFE4E1;">PMC Discount</th>
                              <th style="background-color: #FFE4E1;">Chairman Discount</th>
                              <th style="background-color: #FFE4E1;">CEO Discount</th>                         
                              <th style="background-color: #E6FFE6;">Total Fee Adjustment</th>
                              <th style="background-color: rgb(172, 131, 56);">Arrears</th>
                              <th style="background-color: lightblue;">Total Within Due Date</th>
                              <th style="background-color: rgb(180, 19, 19);">Late Fee Fine</th>
                              <th style="background-color: lightblue;">Total After Due Date</th>
                              <th>Select</th> 

                          </tr>
                      </thead>
                      <tbody>
                          <!-- Data will be populated here dynamically -->
                      </tbody>
                  </table>
              </div>
              <button id="generate-challan" class="btn  mb-2">Generate Challans</button>   
            </div>
          </div>
        </div>
      </div>
      {{-- scriptforthispage --}}
      <script>
        $(document).ready(function() {
            let isProcessing = false;
        
            $('#markAsPaidBtn').on('click', function() {
                if (isProcessing) return; // Prevent multiple submissions
                isProcessing = true;
        
                var selectedNames = [];
                
                // Collect selected names from checkboxes
                $('#data-table tbody input[type="checkbox"]:checked').each(function() {
                    var row = $(this).closest('tr');
                    var name = row.find('td:eq(0)').text(); // Assuming name is in the first column
                    selectedNames.push(name);
                });
        
                if (selectedNames.length > 0) {
                    $.ajax({
                        url: '{{ route("update-paid-status") }}', // Laravel route for the AJAX request
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}', // CSRF token for security
                            names: selectedNames
                        },
                        success: function(response) {
                            isProcessing = false;
                            if (response.success) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: response.message || 'Selected rows marked as paid successfully.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                });
        
                                // Update the table with new data
                                updateTable(response.updated_rows);
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message || 'An error occurred while processing your request.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            isProcessing = false;
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while processing your request.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                } else {
                    isProcessing = false;
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Please select at least one row.',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                }
            });
        
            function updateTable(updatedRows) {
    $('#data-table tbody').empty();
    if (updatedRows.length > 0) {
        $.each(updatedRows, function(index, item) {
            var feeAcademicYear = parseFloat(item.fee_academic_year) || 0;
            var balance = parseFloat(item.balance) || 0;
            var arrears = feeAcademicYear + balance;

            $('#data-table tbody').append(
                            '<tr>' +
                            '<td>' + (item.name || '') + '</td>' +
                            '<td>' + (item.program || '') + '</td>' +
                            '<td>' + (item.session || '') + '</td>' +
                            '<td>' + (item.class || '') + '</td>' +
                            '<td>' + (item.email || '') + '</td>' +
                            '<td>' + (item.issue || '') + '</td>' +
                            '<td>' + (item.due || '') + '</td>' +
                            '<td style="background-color: grey;">' + (item.feeAcademicYear || '') + '</td>' +
                            '<td>' + (item.annualCharges || '') + '</td>' +
                            '<td style="background-color: yellow;">' + (item.withholdingTax || '') + '</td>' +
                            '<td>' + (item.hostelFee || '') + '</td>' +
                            '<td>' + (item.universityfee || '') + '</td>' +
                            '<td>' + (item.library || '') + '</td>' +
                            '<td>' + (item.preEnrolmentFee || '') + '</td>' +
                            '<td>' + (item.incExamFee || '') + '</td>' +
                            '<td style="background-color: grey;">' + (item.balance || '') + '</td>' +
                            '<td style="background-color: rgb(35, 156, 116);">' + (item.scholarship || '') + '</td>' +
                            '<td style="background-color: rgb(35, 156, 116);">' + (item.nest || '') + '</td>' +
                            '<td style="background-color: rgb(35, 156, 116);">' + (item.anth || '') + '</td>' +
                            '<td style="background-color: #FFE4E1;">' + (item.sdiscount || '') + '</td>' +
                            '<td style="background-color: #FFE4E1;">' + (item.pmcdiscount || '') + '</td>' +
                            '<td style="background-color: #FFE4E1;">' + (item.chairmandiscount || '') + '</td>' +
                            '<td style="background-color: #FFE4E1;">' + (item.ceodiscount || '') + '</td>' +
                            '<td style="background-color:  #E6FFE6;">' + (item.feeAdjustment || '') + '</td>' +
                            '<td style="background-color: rgb(172, 131, 56);">' + arrears + '</td>' +
                            '<td style="background-color: lightblue;">' + (item.totalWithinDueDate || '') + '</td>' +
                            '<td style="background-color: rgb(180, 19, 19);">' + (item.lateFeeFine || '') + '</td>' +
                            '<td style="background-color: lightblue;">' + (item.totalAfterDueDate || '') + '</td>' +
                            '<td><input type="checkbox" name="select[]" value="' + (item.id || '') + '"></td>' +
                '</tr>'
            );
        });
    }
}


        });
        </script>
        
        
<script>
$(document).ready(function()  {
    $('#markAsPaidBtn').on('click', function() {
        var selectedNames = [];
        
        // Collect selected names from checkboxes
        $('#data-table tbody input[type="checkbox"]:checked').each(function() {
            var row = $(this).closest('tr');
            var name = row.find('td:eq(0)').text(); // Assuming name is in the first column
            selectedNames.push(name);
        });

        if (selectedNames.length > 0) {
            $.ajax({
                url: '{{ route("update-paid-status") }}', // Laravel route for the AJAX request
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    names: selectedNames
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.message || 'Selected rows marked as paid successfully.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                        // Update the table with new data
                        updateTable(response.updated_rows);
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: response.message || 'An error occurred while processing your request.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while processing your request.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        } else {
            Swal.fire({
                title: 'Warning!',
                text: 'Please select at least one row.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        }
    });

    $('#searchInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#data-table tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    // Event handler for Program dropdown change
    $('#program').change(function() {
        var selectedProgram = $(this).val();
        var classOptions = '';

        if (selectedProgram === 'MBBS' || selectedProgram === 'BDS') {
            classOptions = '<option value="1st Year">1st Year</option>' +
                        '<option value="2nd Year">2nd Year</option>' +
                        '<option value="3rd Year">3rd Year</option>' +
                        '<option value="4th Year">4th Year</option>' +
                        '<option value="5th Year">5th Year</option>';
        } else {
            classOptions = '<option value="Semester 1">Semester 1</option>' +
                        '<option value="Semester 2">Semester 2</option>' +
                        '<option value="Semester 3">Semester 3</option>' +
                        '<option value="Semester 4">Semester 4</option>' +
                        '<option value="Semester 5">Semester 5</option>' +
                        '<option value="Semester 6">Semester 6</option>' +
                        '<option value="Semester 7">Semester 7</option>' +
                        '<option value="Semester 8">Semester 8</option>';
        }

        $('#class').html(classOptions);

        // Set default class/semester based on selected program and session
        setDefaultClass();
    });

    // Event handler for Session dropdown change
    $('#session').change(function() {
        setDefaultClass();
    });

    function setDefaultClass() {
        var selectedProgram = $('#program').val();
        var selectedSession = $('#session').val();
        var defaultClass = '';

        if (selectedSession === '2025') {
            defaultClass = (selectedProgram === 'MBBS' || selectedProgram === 'BDS') ? '1st Year' : 'Semester 1';
        } else if (selectedSession === '2024') {
            defaultClass = (selectedProgram === 'MBBS' || selectedProgram === 'BDS') ? '2nd Year' : 'Semester 2';
        } else if (selectedSession === '2023') {
            defaultClass = (selectedProgram === 'MBBS' || selectedProgram === 'BDS') ? '3rd Year' : 'Semester 3';
        } else if (selectedSession === '2022') {
            defaultClass = (selectedProgram === 'MBBS' || selectedProgram === 'BDS') ? '4th Year' : 'Semester 4';
        } else if (selectedSession === '2021') {
            defaultClass = (selectedProgram === 'MBBS' || selectedProgram === 'BDS') ? '5th Year' : 'Semester 5';
        } else if (selectedSession === '2020') {
            defaultClass = (selectedProgram === 'MBBS' || selectedProgram === 'BDS') ? '5th Year' : 'Semester 6';
        }

        $('#class').val(defaultClass);
    }

    $('#trackingForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(data) {
                $('#data-table tbody').empty();
                if (data.length > 0) {
                    $.each(data, function(index, item) {
                        var feeAcademicYear = parseFloat(item.feeAcademicYear) || 0;
                        var balance = parseFloat(item.balance) || 0;
                        var arrears = feeAcademicYear + balance;

                        $('#data-table tbody').append(
                            '<tr>' +
                            '<td>' + (item.name || '') + '</td>' +
                            '<td>' + (item.program || '') + '</td>' +
                            '<td>' + (item.session || '') + '</td>' +
                            '<td>' + (item.class || '') + '</td>' +
                            '<td>' + (item.email || '') + '</td>' +
                            '<td>' + (item.issue || '') + '</td>' +
                            '<td>' + (item.due || '') + '</td>' +
                            '<td style="background-color: grey;">' + (item.feeAcademicYear || '') + '</td>' +
                            '<td>' + (item.annualCharges || '') + '</td>' +
                            '<td style="background-color: yellow;">' + (item.withholdingTax || '') + '</td>' +
                            '<td>' + (item.hostelFee || '') + '</td>' +
                            '<td>' + (item.universityfee || '') + '</td>' +
                            '<td>' + (item.library || '') + '</td>' +
                            '<td>' + (item.preEnrolmentFee || '') + '</td>' +
                            '<td>' + (item.incExamFee || '') + '</td>' +
                            '<td style="background-color: grey;">' + (item.balance || '') + '</td>' +
                            '<td style="background-color: rgb(35, 156, 116);">' + (item.scholarship || '') + '</td>' +
                            '<td style="background-color: rgb(35, 156, 116);">' + (item.nest || '') + '</td>' +
                            '<td style="background-color: rgb(35, 156, 116);">' + (item.anth || '') + '</td>' +
                            '<td style="background-color: #FFE4E1;">' + (item.sdiscount || '') + '</td>' +
                            '<td style="background-color: #FFE4E1;">' + (item.pmcdiscount || '') + '</td>' +
                            '<td style="background-color: #FFE4E1;">' + (item.chairmandiscount || '') + '</td>' +
                            '<td style="background-color: #FFE4E1;">' + (item.ceodiscount || '') + '</td>' +
                            '<td style="background-color:  #E6FFE6;">' + (item.feeAdjustment || '') + '</td>' +
                            '<td style="background-color: rgb(172, 131, 56);">' + arrears + '</td>' +
                            '<td style="background-color: lightblue;">' + (item.totalWithinDueDate || '') + '</td>' +
                            '<td style="background-color: rgb(180, 19, 19);">' + (item.lateFeeFine || '') + '</td>' +
                            '<td style="background-color: lightblue;">' + (item.totalAfterDueDate || '') + '</td>' +
                            '<td><input type="checkbox" name="select[]" value="' + (item.id || '') + '"></td>' +
                            '</tr>'
                        );
                    });
                } else {
                    $('#data-table tbody').append(
                        '<tr><td colspan="26">No data found</td></tr>'
                    );
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while processing your request.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
    $('#generate-challan').on('click', function() {
                    var selectedProgram = $('#program').val();
                    var selectedSession = $('#session').val();
                    var selectedClass = $('#class').val();

                    if (selectedProgram && selectedSession && selectedClass) {
                        // Gather data from the table
                        var tableData = [];
                        $('#data-table tbody tr').each(function() {
                            var row = $(this);
                            var rowData = {
                                name: row.find('td').eq(0).text(),
                                program: row.find('td').eq(1).text(),
                                session: row.find('td').eq(2).text(),
                                class: row.find('td').eq(3).text(),
                                email: row.find('td').eq(4).text(),
                                issue: row.find('td').eq(5).text(),
                                due: row.find('td').eq(6).text(),
                                feeAcademicYear: row.find('td').eq(7).text(),
                                annualCharges: row.find('td').eq(8).text(),
                                withholdingTax: row.find('td').eq(9).text(),
                                hostelFee: row.find('td').eq(10).text(),
                                universityfee: row.find('td').eq(11).text(),
                                library: row.find('td').eq(12).text(),
                                preEnrolmentFee: row.find('td').eq(13).text(),
                                incExamFee: row.find('td').eq(14).text(),
                                balance: row.find('td').eq(15).text(),
                                scholarship: row.find('td').eq(16).text(),
                                nest: row.find('td').eq(17).text(),
                                anth: row.find('td').eq(18).text(),
                                sdiscount: row.find('td').eq(19).text(),
                                pmcdiscount: row.find('td').eq(20).text(),
                                chairmandiscount: row.find('td').eq(21).text(),
                                ceodiscount: row.find('td').eq(22).text(),
                                feeAdjustment: row.find('td').eq(23).text(),
                                arrears: row.find('td').eq(24).text(),
                                totalWithinDueDate: row.find('td').eq(25).text(),
                                lateFeeFine: row.find('td').eq(26).text(),
                                totalAfterDueDate: row.find('td').eq(27).text()
                            };
                            tableData.push(rowData);
                        });

                        // Send the data via AJAX
                        $.ajax({
                            url: '{{ url('/save-challan-data') }}',
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                program: selectedProgram,
                                session: selectedSession,
                                class: selectedClass,
                                tableData: tableData
                            },
                            success: function(response) {
                                // If saving is successful, redirect to generate the challan
                                window.location.href = '{{ url('/generate-challan') }}/' + selectedProgram + '/' + selectedSession + '/' + selectedClass;
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error);
                                alert('There was an error saving the data. Please try again.');
                            }
                        });
                    } else {
                        alert('Please select all fields.');
                    }
                });

});
</script>
</body>
</html>