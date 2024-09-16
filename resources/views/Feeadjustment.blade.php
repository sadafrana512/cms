<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Adjustment Form</title>
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
                    <h2>Fee Adjustment Form</h2>
                </div>
                <div class="card-body">
                    <form id="financeForm" method="POST" action="{{ route('feeadjustment.store1') }}">
                        @csrf
                        <!-- Row 1 -->
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="studentId">Student ID</label>
                                <input type="text" class="form-control" id="studentId" name="studentId" placeholder="Enter Student ID">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="studentName">Student Name</label>
                                <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Enter Student Name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="program">Program</label>
                                <input type="text" class="form-control" id="program" name="program" placeholder="Enter program">

                            </div>
                        </div>
                        <!-- Row 2 -->
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="session">Session</label>
                                <input type="text" class="form-control" id="session" name="session" placeholder="Enter Session">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="class">Class</label>
                                <input type="text" class="form-control" id="class" name="class" placeholder="Enter class">

                            </div>
                            <div class="form-group col-md-4">
                                <label for="balance">Previous Year Balance</label>
                                <input type="text" class="form-control" id="balance" name="balance" placeholder="Enter Previous Year Balance">
                            </div>
                        </div>
                        <!-- Row 3 -->
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="scholarship">Scholarship</label>
                                <input type="text" class="form-control" id="scholarship" name="scholarship" placeholder="Enter Scholarship">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nest">NEST Scholarship</label>
                                <input type="text" class="form-control" id="nest" name="nest" placeholder="Enter nest Scholarship">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="anth">ANTH Scholarship</label>
                                <input type="text" class="form-control" id="anth" name="anth" placeholder="Enter anth Scholarship">
                            </div>
                            
                        </div>
                        <!-- Row 4 -->
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="sdiscount">Sibling Discount</label>
                                <input type="text" class="form-control" id="sdiscount" name="sdiscount" placeholder="Enter Sibling Discount">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="pmcdiscount">PMC Discount</label>
                                <input type="text" class="form-control" id="pmcdiscount" name="pmcdiscount" placeholder="Enter PMC Discount">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="chairmandiscount">Chairman Discount</label>
                                <input type="text" class="form-control" id="chairmandiscount" name="chairmandiscount" placeholder="Enter Chairman Discount" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="ceodiscount">CEO Discount</label>
                                <input type="text" class="form-control" id="ceodiscount" name="ceodiscount" placeholder="Enter CEO Discount" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="feeAdjustment">Total Fee Adjustment</label>
                                <input type="text" class="form-control" id="feeAdjustment" name="feeAdjustment" placeholder="Enter Fee Adjustment">
                            </div>
                        </div>
                       
                        <button type="submit" class="btn btn-block text-white">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
