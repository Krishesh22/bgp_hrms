<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payslip - Britannia Labels India Pvt Ltd</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 0;
            padding: 15px;
            color: #333;
        }
        .payslip-container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 15px;
            box-sizing: border-box;
        }
        .company-header {
            text-align: center;
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .company-name {
            font-size: 18px;
            font-weight: bold;
        }
        .payslip-title {
            text-align: center;
            font-weight: bold;
            margin: 10px 0;
            font-size: 16px;
        }
        .employee-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .info-block {
            flex: 1;
        }
        .info-label {
            font-weight: bold;
        }
        .earnings-deductions {
            display: flex;
            margin-bottom: 15px;
        }
        .earnings, .deductions {
            flex: 1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total-row {
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .signature {
            width: 200px;
            border-top: 1px solid #333;
            text-align: center;
            padding-top: 5px;
        }
        .note {
            font-style: italic;
            text-align: center;
            margin-top: 10px;
            font-size: 11px;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
     <p align="left"><a onclick="window.print()" id="printbtn"><button
                style="font-size:18px; background-color:#31A569; color:white;">Print <i
                    class="fa fa-print"></i></button></a></p>
    <div class="payslip-container">
        <div class="company-header">
            <div class="company-name">BRITANNIA LABELS INDIA PVT LTD</div>
            <div>No:471/1B2,471/2A3B,Ramegoundempalaiyam</div>
            <div>Peruntholuvu Village, Tiruppur- 641665, India.</div>
            <div>Paid Date : 07-05-2025</div>
        </div>
        
        <div class="payslip-title">Wage slip for the month April- 2025</div>
        
        <div class="employee-info">
            <div class="info-block">
                <div><span class="info-label">Employee Name:</span> SATHEESHKUMAR N</div>
                <div><span class="info-label">Employee ID:</span> BCAT01ACC006001</div>
                <div><span class="info-label">Designation:</span> ACCOUNT MANAGER</div>
            </div>
            <div class="info-block">
                <div><span class="info-label">Working Days:</span> 26</div>
                <div><span class="info-label">Worked Days:</span> 24.5</div>
                <div><span class="info-label">Paid Leave:</span> 0.5</div>
            </div>
            <div class="info-block">
                <div><span class="info-label">UAN No:</span> </div>
                <div><span class="info-label">ESIC No:</span> </div>
                <div><span class="info-label">Balance Leave:</span> 14</div>
            </div>
        </div>
        
        <div class="earnings-deductions">
            <div class="earnings">
                <table>
                    <tr>
                        <th>Earnings</th>
                        <th>Amount (₹)</th>
                    </tr>
                    <tr>
                        <td>Basic+DA</td>
                        <td class="text-right">16,000.00</td>
                    </tr>
                    <tr>
                        <td>HRA</td>
                        <td class="text-right">5,000.00</td>
                    </tr>
                    <tr>
                        <td>OA</td>
                        <td class="text-right">9,572.00</td>
                    </tr>
                    <tr>
                        <td>Performance Allowance</td>
                        <td class="text-right">10,000.00</td>
                    </tr>
                    <tr class="total-row">
                        <td>Total Earnings</td>
                        <td class="text-right">40,572.00</td>
                    </tr>
                </table>
            </div>
            <div class="deductions">
                <table>
                    <tr>
                        <th>Deductions</th>
                        <th>Amount (₹)</th>
                    </tr>
                    <tr>
                        <td>PF</td>
                        <td class="text-right">0.00</td>
                    </tr>
                    <tr>
                        <td>ESI</td>
                        <td class="text-right">0.00</td>
                    </tr>
                    <tr>
                        <td>TDS</td>
                        <td class="text-right">0.00</td>
                    </tr>
                    <tr>
                        <td>Food & Other Deduction</td>
                        <td class="text-right">0.00</td>
                    </tr>
                    <tr class="total-row">
                        <td>Total Deductions</td>
                        <td class="text-right">0.00</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="net-pay">
            <table>
                <tr>
                    <td width="70%"><strong>Net Pay</strong></td>
                    <td width="30%" class="text-right"><strong>₹40,572.00</strong></td>
                </tr>
            </table>
        </div>
        
        <div class="footer">
            <div class="signature">Employee Signature</div>
            <div class="signature">Authorized Signatory</div>
        </div>
        
        <div class="note">
            This is computer-generated payslip, it does not require a signature
        </div>
    </div>
</body>
</html>

?>