<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/webfonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
        <link rel="shortcut icon" type="images/x-icon" href="assets/images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Payment Voucher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>
	Payment Voucher
</title>

<style>
    .divpara {
        flex: 2;
        text-align: center;
    }
    .divpara p {
        margin: 0;
        padding: 0;
    }
    .divpara p:nth-child(1) {
        font-size: 14px;
        padding-top: 10px;
    }
    .divpara p:nth-child(2) {
        font-size: 13px;
    }
    .divpara p:nth-child(3) {
        font-size: 12px;
    }
    .divpara p:nth-child(4) {
        font-size: 16px;
    }
  
    
    #imgLogo2, #imgLogo1 {
        width: 100px; /* Default width */
    }

    @media (max-width: 1200px) {
        #imgLogo2, #imgLogo1 {
            width: 50px; /* Adjust width for medium screens */
        }
         .divpara p:nth-child(1) {
            font-size: 5px;
        }
        .divpara p:nth-child(2) {
            font-size:5px;
        }
        .divpara p:nth-child(3) {
            font-size: 5px;
        }
        .divpara p:nth-child(4) {
            font-size: 6px;
        }
    }

    @media (max-width: 768px) {
        #imgLogo2, #imgLogo1 {
            width: 40px; /* Adjust width for small screens */
        }
         .divpara p:nth-child(1) {
            font-size: 5px;
        }
        .divpara p:nth-child(2) {
            font-size:5px;
        }
        .divpara p:nth-child(3) {
            font-size: 5px;
        }
        .divpara p:nth-child(4) {
            font-size: 6px;
        }
    }

    @media (max-width: 480px) {
        #imgLogo2, #imgLogo1 {
            width: 30px; /* Adjust width for extra small screens */
        }
        .divpara p:nth-child(1) {
            font-size: 5px;
        }
        .divpara p:nth-child(2) {
            font-size:5px;
        }
        .divpara p:nth-child(3) {
            font-size: 5px;
        }
        .divpara p:nth-child(4) {
            font-size: 6px;
        }
    }
</style>

<style type="text/css">
    .style-caption {
        width: 35%;
        float: left;
    }

    .style-caption-value {
        margin-left: 35%;
    }
</style>

<style type="text/css" media="print">
    @page {
        size: landscape;
    }
    .print-button {
        display: none;
    }
       .back-button {
        display: none;
    }
    .alert-success {
                display: none;
    }
    body {
        font-size: 14px;
    }
    #imgLogo2, #imgLogo1 {
        width: 70px; /* Adjust the width as needed */
    }
    .divpara {
        flex: 2;
        text-align: center;
    }
    .divpara p {
        margin: 0;
        padding: 0;
    }
    .divpara p:nth-child(1) {
        font-size: 10px;
        padding-top: 10px;
    }
    .divpara p:nth-child(2) {
        font-size: 9px;
    }
    .divpara p:nth-child(3) {
        font-size: 10px;
    }
    .divpara p:nth-child(4) {
        font-size: 14px;
    }
</style>
 

</head>

<body>
<div class="aspNetHidden"></div>
<div class="aspNetHidden" style="padding-left: 30px;">
    <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="6E06207D" />
</div>
<div>
       @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        @endif
    </div>
<div id="challanContainer" style=" text-align: center;">
     <button class="back-button" style="padding: 10px 20px; background-color: #6c757d; color: white; border: none; border-radius: 5px;" onclick="goBack()">Back</button>
    <button class="print-button" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; margin-right: 10px;" onclick="printChallan()">Print</button>
    
</div>

    <div class="fluid-container" style="padding-left: 20px; padding-top: 20px;">
        @foreach($entries as $data)
        <div class="challan-container" style="page-break-after: always;">

<div id="divFeePaymentBankCopy" style="border: 1px solid black; font-family: 'Calibri', Times, serif; font-size: smaller; width: 32%; float: left; height: 700px; position: relative;">
<div style="display: flex; align-items: center;">
<div style="flex: 1; text-align: left;"> 
        <img id="imgLogo1" src="https://admissionportal.imdc.netsmart.pk/public/assets/images/logo81.png" style="padding: 10px; " />
    </div>
    <div class="divpara">
    <p><b>Islamabad Medical & Dental College</b></p>
    <p><b>Murree Road, Bhara Kahu, Islamabad</b></p>logo81.png
    <p><b>Phone: 051-111 46 46 32 EXT 211</b></p>
    <p><b>Bank Copy</b></p>
</div>
    <div style="flex: 1; text-align: right;">
        <img id="imgLogo2" src="https://admissionportal.imdc.netsmart.pk/public/assets/images/bank-alfalah-logo.png" style="padding: 10px; " />
    </div>
</div>
  <p style="font-size:12px; font-weight: bold; text-align:center; ">Transaction to be posted through Alfalah Transact only</p>
            <div style="margin-left: 2%; margin-right: 2%;">
                <div style="text-align: center">
                </div>
                <div style="text-align: center;">
                </div>
                <div style="text-align: center;">
                    <b>
                </div>
                <div style="text-align: center;">
                </div>
                           
                <table cellspacing="0" rules="all" border="1" style="width: 100%; border-collapse: collapse;">
                  
                    <tbody>
                        <tr>
                            <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                                <b>*Challan #:</b>
                            </td>
                            <td style="text-align: center; border: 1px solid black;">
                                <b><span id="lblChallan_Date_Bank">2025-100001</span></b>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                                <b>For Credit:</b>
                            </td>
                            <td style="text-align: center; border: 1px solid black;">
                                <b><span id="lblBank_Account_Title_Bank">Islamabad Medical & Dental College</span></b>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                                <b>Issue Date:</b>
                            </td>
                            
                            <td style="text-align: center; ">
                                <b><span class="issue-date" style="margin-right: 10px;">{{ $data->issue ?? '' }}</span></b>
                                <b><span style="border-left: 1px solid black; margin-right: 5px; padding-left: 5px;">Due Date:</span></b>
                                <b><span class="due-date" style="border-left: 1px solid black; padding-left: 5px;">{{ $data->due ?? '' }}</span></b>
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                                <b>*Student ID:</b>
                            </td>
                            <td style="text-align: center;border: 1px solid black;">
                                <span id="lblReg_Adm_No_Bank">M-20-007</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                                *Applicant Name:
                            </td>
                            <td style="text-align: center;border: 1px solid black;">
                                <span id="lblStd_Name_Bank">{{ $data->name ?? '' }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                                College Dues for:
                            </td>
                            <td style="text-align: center; border: 1px solid black;">
                                <div class="program-name">{{ $data->class ?? '' }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                                Programme:
                            </td>
                            
                            <td style="text-align: center";>
                                <span style="padding-left: 10px; margin-right: 10px;" class="program-name">{{ $data->program ?? '' }}</span>
                                <span style="border-left: 1px solid black; margin-left: 10px; margin-right: 5px; padding-left:10px;">Session:</span>
                                <span style="border-left: 1px solid black; margin-left: 5px; padding-left:10px;" class="program-name">{{ $data->session ?? '' }}</span>
                            </td>
                            
                        </tr>
                        
                    </tbody>
                </table>
                
                <div id="divPayment_Detail_Bank">
                    <div id="divPayment_Detail_Bank">
                        <table cellspacing="0" rules="all" border="1" id="dgvPayment_Detail_Bank" style="height:10px; width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col" style="border: 1px solid black; width: 900px; text-align: center;">Particulars</th>
                                    <th scope="col" style="border: 1px solid black; width: 900px; text-align: center;">Amount (PKR)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Add table rows dynamically here if needed -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                        <b>Fee for Academic Year 2024-2025</b>
                                    </td>
                                    <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                        <b><span class="total-fee">{{ $data->feeAcademicYear ?? '' }}</span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                        <b>Annual Charges</b>
                                    </td>
                                    <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                        <b><span class="total-fee">{{ $data->annualCharges ?? '' }}</span></b>
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                        <b>Total Amount Payable</b>
                                    </td>
                                    <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                        <b><span class="total-fee">{{ $data->withholding_tax ?? '' }}</span></b>
                                    </td>
                                </tr> --}}
                                <tr>
                                    <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                        <b>Witholding Tax(5%)</b>
                                    </td>
                                    <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                        <b><span class="total-fee">{{ $data->withholdingTax ?? '' }}</span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                        <b>Fee Adjustment</b>
                                    </td>
                                    <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                        <b><span class="total-fee">{{ $data->hostelFee ?? '' }}</span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                        <b>Arrears</b>
                                    </td>
                                    <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                        <b><span class="total-fee">{{ $data->arrears ?? '' }}</span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                        <b>Total (within Due Date)</b>
                                    </td>
                                    <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                        <b><span class="total-fee">{{ $data->totalWithinDueDate ?? '' }}</span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                        <b>Late Fee Fine (upto 15 days)</b>
                                    </td>
                                    <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                        <b><span class="total-fee">{{ $data->lateFeeFine ?? '' }}</span></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                        <b>Total (After Due Date)</b>
                                    </td>
                                    <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                        <b><span class="total-fee">{{ $data->totalAfterDueDate ?? '' }}</span></b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        
                    </div>
                    <div style="font-size: 14px; padding-top:10px;">
                        <div>
                            <b><u>Disclaimer:</u></b>
                        </div>
                        <div>
                            <b>
              
                           <span id="lblAmount_in_Words_Institute" style="font-size: 12px; padding-top:10px;">
                               Application Processing Fee is Non-Refundable.<br>
                               In case of any issues with depositing the fee, please contact<br>051-2304134-5.
                            </span>
                                
                            </b>
                        </div>
                    </div>
                       <!-- <div id="divNotes_Bank">
                    <p style="text-align:center; font-size: 12px; font-weight:bold; padding-top:20px;"><b>Disclaimer:
                     
                    </b>In case of any issue in depositing the fee, please contact on 051-2304134-5</p>

                    </div> -->
                </div>
                <div id="challanContainer_Copy">
                    <div id="divAlternatePaymentChannel_Bank" style="margin-left: 15%; margin-right: 15%; margin-top: 1%;"></div>
                </div>
                <div style="position: absolute; bottom: 5px; font-size: small; width: 97%; padding-left: 10px; display: flex; justify-content: space-between;">
                    <div style="border-top: solid thin; padding-left: 0px; white-space: nowrap;">&nbsp;Depositor's Signature:&nbsp;</div>
                    <div style="border-top: solid thin; white-space: nowrap;">&nbsp;Bank's Officer Signature:&nbsp;</div>
                  
                </div>
            </div>
        </div>
        <div id="divFeePaymentBankCopy" style="border: 1px solid black; font-family: 'Calibri', Times, serif; font-size: smaller; width: 32%; float: left; height: 700px; position: relative;">
            <div style="display: flex; align-items: center;">
<div style="flex: 1; text-align: left;">
    <img id="imgLogo1" src="https://admissionportal.imdc.netsmart.pk/public/assets/images/logo81.png" style="padding: 10px; " />
</div>
    <div class="divpara">
    <p><b>Islamabad Medical & Dental College</b></p>
    <p><b>Murree Road, Bhara Kahu, Islamabad</b></p>
    <p><b>Phone: 051-111 46 46 32 EXT 211</b></p>
    <p><b>College Copy</b></p>
</div>
<div style="flex: 1; text-align: right;">
    <img id="imgLogo1" src="https://admissionportal.imdc.netsmart.pk/public/assets/images/bank-alfalah-logo.png" style="padding: 10px; " />
</div>
</div>
<p style="font-size:12px; font-weight: bold; text-align:center;">Transaction to be posted through Alfalah Transact only</p>
        <div style="margin-left: 2%; margin-right: 2%;">
            <div style="text-align: center">
            </div>
            <div style="text-align: center;">
            </div>
            <div style="text-align: center;">
                <b>
            </div>
            <div style="text-align: center;">
            </div>
                       
            <table cellspacing="0" rules="all" border="1" style="width: 100%; border-collapse: collapse;">
                  
                <tbody>
                    <tr>
                        <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                            <b>*Challan #:</b>
                        </td>
                        <td style="text-align: center; border: 1px solid black;">
                            <b><span id="lblChallan_Date_Bank">2025-100001</span></b>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                            <b>For Credit:</b>
                        </td>
                        <td style="text-align: center; border: 1px solid black;">
                            <b><span id="lblBank_Account_Title_Bank">Islamabad Medical & Dental College</span></b>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                            <b>Issue Date:</b>
                        </td>
                        
                        <td style="text-align: center; ">
                            <b><span class="issue-date" style="margin-right: 10px;">{{ $data->issue ?? '' }}</span></b>
                            <b><span style="border-left: 1px solid black; margin-right: 5px; padding-left: 5px;">Due Date:</span></b>
                            <b><span class="due-date" style="border-left: 1px solid black; padding-left: 5px;">{{ $data->due ?? '' }}</span></b>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                            <b>*Student ID:</b>
                        </td>
                        <td style="text-align: center;border: 1px solid black;">
                            <span id="lblReg_Adm_No_Bank">M-20-007</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                            *Applicant Name:
                        </td>
                        <td style="text-align: center;border: 1px solid black;">
                            <span id="lblStd_Name_Bank">{{ $data->name ?? '' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                            College Dues for:
                        </td>
                        <td style="text-align: center; border: 1px solid black;">
                            <div class="program-name">{{ $data->class ?? '' }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                            Programme:
                        </td>
                        
                        <td style="text-align: center";>
                            <span style="padding-left: 10px; margin-right: 10px;" class="program-name">{{ $data->program ?? '' }}</span>
                            <span style="border-left: 1px solid black; margin-left: 10px; margin-right: 5px; padding-left:10px;">Session:</span>
                            <span style="border-left: 1px solid black; margin-left: 5px; padding-left:10px;" class="program-name">{{ $data->session ?? '' }}</span>
                        </td>
                        
                    </tr>
                    
                </tbody>
            </table>
            
            <div id="divPayment_Detail_Bank">
                <div id="divPayment_Detail_Bank">
                    <table cellspacing="0" rules="all" border="1" id="dgvPayment_Detail_Bank" style="height:10px; width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col" style="border: 1px solid black; width: 900px; text-align: center;">Particulars</th>
                                <th scope="col" style="border: 1px solid black; width: 900px; text-align: center;">Amount (PKR)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Add table rows dynamically here if needed -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Fee for Academic Year 2024-2025</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->feeAcademicYear ?? '' }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Annual Charges</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->annualCharges ?? '' }}</span></b>
                                </td>
                            </tr>
                            {{-- <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Total Amount Payable</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->withholding_tax ?? '' }}</span></b>
                                </td>
                            </tr> --}}
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Witholding Tax(5%)</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->withholdingTax ?? '' }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Fee Adjustment</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->hostelFee ?? '' }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Arrears</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->arrears ?? '' }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Total (within Due Date)</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->totalWithinDueDate ?? '' }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Late Fee Fine (upto 15 days)</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->lateFeeFine ?? '' }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Total (After Due Date)</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->totalAfterDueDate ?? '' }}</span></b>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    
                </div>
                <div style="font-size: 14px; padding-top:10px;">
                    <div>
                        <b><u>Disclaimer:</u></b>
                    </div>
                    <div>
                        <b>
          
                       <span id="lblAmount_in_Words_Institute" style="font-size: 12px; padding-top:10px;">
                           Application Processing Fee is Non-Refundable.<br>
                           In case of any issues with depositing the fee, please contact<br>051-2304134-5.
                        </span>
                            
                        </b>
                    </div>
                </div>
                   <!-- <div id="divNotes_Bank">
                <p style="text-align:center; font-size: 12px; font-weight:bold; padding-top:20px;"><b>Disclaimer:
                 
                </b>In case of any issue in depositing the fee, please contact on 051-2304134-5</p>

                </div> -->
            </div>
            <div id="challanContainer_Copy">
                <div id="divAlternatePaymentChannel_Bank" style="margin-left: 15%; margin-right: 15%; margin-top: 1%;"></div>
            </div>
            <div style="position: absolute; bottom: 5px; font-size: small; width: 97%; padding-left: 10px; display: flex; justify-content: space-between;">
                <div style="border-top: solid thin; padding-left: 0px; white-space: nowrap;">&nbsp;Depositor's Signature:&nbsp;</div>
                <div style="border-top: solid thin; white-space: nowrap;">&nbsp;Bank's Officer Signature:&nbsp;</div>
              
            </div>
        </div>
    </div>
    <div id="divFeePaymentBankCopy" style="border: 1px solid black; font-family: 'Calibri', Times, serif; font-size: smaller; width: 32%; float: left; height: 700px; position: relative;">
        <div style="display: flex; align-items: center;">
<div style="flex: 1; text-align: left;">
    <img id="imgLogo1" src="https://admissionportal.imdc.netsmart.pk/public/assets/images/logo81.png" style="padding: 10px; " />
</div>
    <div class="divpara">
    <p><b>Islamabad Medical & Dental College</b></p>
    <p><b>Murree Road, Bhara Kahu, Islamabad</b></p>
    <p><b>Phone: 051-111 46 46 32 EXT 211</b></p>
    <p><b>Student Copy</b></p>
</div>
<div style="flex: 1; text-align: right;">
    <img id="imgLogo2" src="https://admissionportal.imdc.netsmart.pk/public/assets/images/bank-alfalah-logo.png" style="padding: 10px; " />
</div>
</div>
<p style="font-size:12px; font-weight: bold; text-align:center;">Transaction to be posted through Alfalah Transact only</p>
        <div style="margin-left: 2%; margin-right: 2%;">
            <div style="text-align: center">
            </div>
            <div style="text-align: center;">
            </div>
            <div style="text-align: center;">
                <b>
            </div>
            <div style="text-align: center;">
            </div>           
            <table cellspacing="0" rules="all" border="1" style="width: 100%; border-collapse: collapse;">
                  
                <tbody>
                    <tr>
                        <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                            <b>*Challan #:</b>
                        </td>
                        <td style="text-align: center; border: 1px solid black;">
                            <b><span id="lblChallan_Date_Bank">2025-100001</span></b>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                            <b>For Credit:</b>
                        </td>
                        <td style="text-align: center; border: 1px solid black;">
                            <b><span id="lblBank_Account_Title_Bank">Islamabad Medical & Dental College</span></b>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                            <b>Issue Date:</b>
                        </td>
                        
                        <td style="text-align: center; ">
                            <b><span class="issue-date" style="margin-right: 10px;">{{ $data->issue ?? '' }}</span></b>
                            <b><span style="border-left: 1px solid black; margin-right: 5px; padding-left: 5px;">Due Date:</span></b>
                            <b><span class="due-date" style="border-left: 1px solid black; padding-left: 5px;">{{ $data->due ?? '' }}</span></b>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                            <b>*Student ID:</b>
                        </td>
                        <td style="text-align: center;border: 1px solid black;">
                            <span id="lblReg_Adm_No_Bank">M-20-007</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                            *Applicant Name:
                        </td>
                        <td style="text-align: center;border: 1px solid black;">
                            <span id="lblStd_Name_Bank">{{ $data->name ?? '' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                            College Dues for:
                        </td>
                        <td style="text-align: center; border: 1px solid black;">
                            <div class="program-name">{{ $data->class ?? '' }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-left: 10px; border: 1px solid black;">
                            Programme:
                        </td>
                        
                        <td style="text-align: center";>
                            <span style="padding-left: 10px; margin-right: 10px;" class="program-name">{{ $data->program ?? '' }}</span>
                            <span style="border-left: 1px solid black; margin-left: 10px; margin-right: 5px; padding-left:10px;">Session:</span>
                            <span style="border-left: 1px solid black; margin-left: 5px; padding-left:10px;" class="program-name">{{ $data->session ?? '' }}</span>
                        </td>
                        
                    </tr>
                    
                </tbody>
            </table>
            
            <div id="divPayment_Detail_Bank">
                <div id="divPayment_Detail_Bank">
                    <table cellspacing="0" rules="all" border="1" id="dgvPayment_Detail_Bank" style="height:10px; width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col" style="border: 1px solid black; width: 900px; text-align: center;">Particulars</th>
                                <th scope="col" style="border: 1px solid black; width: 900px; text-align: center;">Amount (PKR)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Add table rows dynamically here if needed -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Fee for Academic Year 2024-2025</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->feeAcademicYear ?? '' }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Annual Charges</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->annualCharges ?? '' }}</span></b>
                                </td>
                            </tr>
                            {{-- <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Total Amount Payable</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->withholding_tax ?? '' }}</span></b>
                                </td>
                            </tr> --}}
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Witholding Tax(5%)</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->withholdingTax ?? '' }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Fee Adjustment</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->hostelFee ?? '' }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Arrears</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->arrears ?? '' }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Total (within Due Date)</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->totalWithinDueDate ?? '' }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Late Fee Fine (upto 15 days)</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->lateFeeFine ?? '' }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left; border: 1px solid black; padding-left: 10px;">
                                    <b>Total (After Due Date)</b>
                                </td>
                                <td style="text-align: right; padding-right:10px; border: 1px solid black; border-bottom-style: double;">
                                    <b><span class="total-fee">{{ $data->totalAfterDueDate ?? '' }}</span></b>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    
                </div>
                <div style="font-size: 14px; padding-top:10px;">
                    <div>
                        <b><u>Disclaimer:</u></b>
                    </div>
                    <div>
                        <b>
          
                       <span id="lblAmount_in_Words_Institute" style="font-size: 12px; padding-top:10px;">
                           Application Processing Fee is Non-Refundable.<br>
                           In case of any issues with depositing the fee, please contact<br>051-2304134-5.
                        </span>
                            
                        </b>
                    </div>
                </div>
                   <!-- <div id="divNotes_Bank">
                <p style="text-align:center; font-size: 12px; font-weight:bold; padding-top:20px;"><b>Disclaimer:
                 
                </b>In case of any issue in depositing the fee, please contact on 051-2304134-5</p>

                </div> -->
            </div>
            <div id="challanContainer_Copy">
                <div id="divAlternatePaymentChannel_Bank" style="margin-left: 15%; margin-right: 15%; margin-top: 1%;"></div>
            </div>
            <div style="position: absolute; bottom: 5px; font-size: small; width: 97%; padding-left: 10px; display: flex; justify-content: space-between;">
                <div style="border-top: solid thin; padding-left: 0px; white-space: nowrap;">&nbsp;Depositor's Signature:&nbsp;</div>
                <div style="border-top: solid thin; white-space: nowrap;">&nbsp;Bank's Officer Signature:&nbsp;</div>
              
            </div>
        </div>
    </div>
        <script>
            function goBack() {
                window.history.back();
            }
    
            function printChallan() {
                window.print();
            }
        </script>
       @endforeach
        </div>
</body>
</html>