
<?php include("HEADER.php"); ?>
<html>
<head>
    <title>Scholarship Courses Data</title>
    <style>
        /* CSS styles omitted for brevity */
        .btn-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 15px;
            margin-right: 35px;
            margin-left: 35px;
        }

        .leftbtn button, .rightbtn button {
            color: white;
            background: #e91d62;
            height: 40px;
            border: none;
            border-radius: 7px;
            margin: 0.3rem 0rem;
            padding: 5px 10px;
        }

        .leftbtn button:hover, .rightbtn button:hover {
            background: white;
            cursor: pointer;
            border: 1px solid orange;
        }
        

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .heapic{
                    
                width: 12%;
            /*margin-right: 1rem;*/

        }
        td{
            border: 1px solid black; padding: 6px; text-align: left; font-family: bold;
        }
        .heapic img {
            width: 92%;
        }

        h5 {
            border: 1px solid black; 
            padding: 5px 10px; 
            text-align: center; 
        }
         .card{
            /*overflow-x: scroll;*/
            margin: 20px auto; 
            padding-top: 50px; 
            max-width: 81rem; 
            padding: 20px; 
            background-color: white; 
            border-radius: 5px; 
            box-shadow: 3 10px 10px rgba(0, 0, 0, 0.2);
            height: fit-content;
        }
        h5 {
            border: 1px solid black; 
            padding: 5px 10px; 
            text-align: center; 
        }
        .table-container th{
            color: #e91d62;
            font-weight: 500;
            padding: 5px;
            border: 1px solid black; 
        }
        @media screen and (max-width: 768px) {
            .leftbtn {
                justify-content: center;
                flex-wrap: wrap;
            }
            .header{
                flex-direction: column;
            }
            .heapic img {
                width: 100%;
                margin-bottom: 10px;
            }

            .heatext {
                text-align: center;
            }

            .heatext h6, .heatext h5 {
                font-size: 16px;
            }

            table {
                font-size: 14px;
            }
            .card {
                max-width: 100%;
            }
            .table-container {
                max-width: 100%;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <main>
        <div class="btn-container">
        <div class="rightbtn">
            <a href="trialform.php"><button> Add</button></a>
            <a href="student_chart.php"><button> Chart</button></a>
        </div>
        <div class="leftbtn">
            <button onclick="printCardToPdf()">Print PDF</button>
            <button onclick="downloadCardToPdf()">Download PDF</button>
            <button onclick="exportDataToExcel()">Export to Excel</button>
        </div>
        </div>
        <div class="card" ">
            <div class="header">
                <!-- <div class="heapic">
                    <img src="rudraksha.png" alt="rudraksha.png">
                </div> -->
                <div class="heatext">
                    <!-- <center><h2>RUDRAKSHA WELFARE FOUNDATION</h2></center>
                    <center><h6>A Section 8 Non Profit Organisation under Ministry of Corporate Affairs, Govt. Of INDIA</h6></center> -->
                    <br> <center><h5>Event Report</h5></center>
                </div>
            </div>
            
            <br>
            <br>
            <div class="table-container">
            <table border="2" style="border-collapse: collapse; width: 100%;">
                <tr>
                    <th>Sr. No.</th>
                    <th>Event Basic Detail</th>
                     <th>Expenditure Detail</th>
                   <th>Time and Date Detail</th>
                    <!-- <th>Extra Details</th> -->
                </tr>
                <?php
                $localhost = "localhost";
                $user  = "root";
                $password =  "";
                $database1 = "adarsh college";
                $conn = mysqli_connect($localhost, $user, $password, $database1);
                $sql = "SELECT * FROM event";
                $result = mysqli_query($conn, $sql);
    
                if (mysqli_num_rows($result) > 0) {
                    $counter = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $counter . "</td>";
                        echo "<td>";
                                                echo "<b>Event code: " . $row['ecode'] . "</b><br>";

                        echo "<b>Event Name: " . $row['ename']. " "  . "<br></b>";
                        echo "Start Venue: " . $row['svenue'] . "<br>";
                        echo "Declared Venue: " . $row['dvenue'] . "<br>";
                        echo "Chiefguest: " . $row['cheifguest'] . "<br>";
                        echo "Organiser Number: " . $row['organisernumber'] . "<br>";
                     
                       
                        echo "</td>";
                        

                        echo "<td style='border: 1px solid black; padding: 9px; text-align: left; font-family: bold;'>";
                        echo "Expenditure: " . $row['expenditure'] . "<br>";
                        echo "Fundalloted: " . $row['fundalloted'] . "<br>";
                        echo "Money Saved: " . $row['moneysaved'] . "<br>";
                        echo "Over Budget: " . $row['overbudget'] . "<br>";
                        echo "CPOC: " . $row['cpoc'] . "<br>";
                          echo "</td>";

                         echo "<td style='border: 1px solid black; padding: 6px; text-align: left; font-family: bold;'>";
                       
                        echo "Date: " . $row['date'] . "<br>";
                        echo "Time: " . $row['time'] . "<br>";
                        // echo "Branch Location: " . $row['branch_loc'] . "<br>";
                        echo "</td>";
                        
                       
                        
                        // echo "<td style='border: 1px solid black; padding: 6px; text-align: left; font-family: bold;'>";
                     
                        // echo "Remark: " . $row['remark'] . "<br>";
                        // if (isset($row['fileUpload'])) {
                        //     echo "Admission Proof: <a href='" . $row['fileUpload'] . "' target='_blank'>Admission Proof</a>" . "<br>";
                        // }
                        // echo "</td>";
                        echo "</tr>";
    
    
                        $counter++;
                    }
                } else {
                    echo "<tr><td colspan='2' style='border: 1px solid black; padding: 8px; text-align: left; font-family: bold;'>No records found.</td></tr>";
                }
    
                mysqli_close($conn);
                ?>
            </table>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script>
       
       function printCardToPdf() {
            const card = document.querySelector('.card');
            const printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Print</title></head><body>');
            printWindow.document.write(card.outerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();

            const currentDateTime = new Date().toLocaleString();
            printWindow.onload = function() {
            const printDoc = printWindow.document;
            const dateTimeElement = printDoc.createElement('p');
            dateTimeElement.textContent = 'Printed on: ' + currentDateTime;
            printDoc.body.appendChild(dateTimeElement);
            printWindow.print();
        }
        }
        function downloadCardToPdf() {
            const card = document.querySelector('.card');
            const options = {
                margin: 10,
                filename: 'VendorDetails.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a2', orientation: 'portrait' }
            };
            card.style.width = '1700px';
        
            // Get the current date and time
            const currentDateTime = new Date().toLocaleString();
        
            html2pdf().from(card).set(options).toPdf().get('pdf').then(function(pdf) {
                const totalPages = pdf.internal.getNumberOfPages();

            for (let i = 1; i <= totalPages; i++) {
                pdf.setPage(i);
                pdf.setFontSize(10);
                pdf.setTextColor(128);
                pdf.text(currentDateTime, 15, pdf.internal.pageSize.getHeight() - 10);
                    }

                pdf.save();
            });
        }


        function exportDataToExcel() {
            const table = document.querySelector('table');
            const workbook = XLSX.utils.table_to_book(table);
            const excelBuffer = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });
            saveAsExcel(excelBuffer, 'data.xlsx');
        }

        function saveAsExcel(buffer, fileName) {
            const data = new Blob([buffer], { type: 'application/octet-stream' });
            const url = window.URL.createObjectURL(data);
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('IntenAllDetails', fileName);
            document.body.appendChild(link);
            link.click();
        }
    </script>
</body>
</html>
