<?php include("header.php") ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adarsh college";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM employee_master";
$result = $conn->query($sql);

$sql2 = "SELECT * FROM admissionform";
$result2 = $conn->query($sql2);

$sql3 = "SELECT * FROM `admissionform` WHERE status = 'accepted'";
$result3 = $conn->query($sql3);

$sql4 = "SELECT * FROM `admissionform` WHERE status = 'rejected'";
$result4 = $conn->query($sql4);
// Get the total number of rows
$totalRows = $result->num_rows;
$totalRows2 = $result2->num_rows;
$totalRows3 = $result3->num_rows;
$totalRows4 = $result4->num_rows;


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
/* ---------- HEADER ---------- */
body {
    background-image: url('dashboardback.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your image file */
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
.header {
            grid-area: header;
            height: 70px;
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px; /* Adjusted padding for responsiveness */
            box-shadow: 0 6px 7px -4px rgba(0, 0, 0, 0.2);
        }

        .menu-icon {
            display: none;
            cursor: pointer;
        }
/* ---------- SIDEBAR ---------- */

#sidebar {
  grid-area: sidebar;
  height: 100%;
  background-color: #21232d;
  color: #9799ab;
  overflow-y: auto;
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
}

.sidebar-title {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 20px 20px 20px;
  margin-bottom: 30px;
}

.sidebar-title > span {
  display: none;
}

.sidebar-brand {
  margin-top: 15px;
  font-size: 20px;
  font-weight: 700;
}

.sidebar-list {
  padding: 0;
  margin-top: 15px;
  list-style-type: none;
}

.sidebar-list-item {
  padding: 20px 20px 20px 20px;
}

.sidebar-list-item:hover {
  background-color: rgba(255, 255, 255, 0.2);
  cursor: pointer;
}

.sidebar-list-item > a {
  text-decoration: none;
  color: #9799ab;
}

.sidebar-responsive {
  display: inline !important;
  position: absolute;
  z-index: 12 !important;
}

/* ---------- MAIN ---------- */

.main-container {
  grid-area: main;
  overflow-y: auto;
  padding: 20px 20px;
}

.main-title {
  display: flex;
  justify-content: space-between;
}

.main-title > p {
  font-size: 20px;
}

.main-cards {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  gap: 20px;
  margin: 20px 0;
}

.card {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 15px;
  background-color: #ffffff;
  box-sizing: border-box;
  border: 1px solid #d2d2d3;
  border-radius: 5px;
  box-shadow: 0 6px 7px -4px rgba(0, 0, 0, 0.2);
}

.card:first-child {
  border-left: 7px solid #246dec;
}

.card:nth-child(2) {
  border-left: 7px solid #f5b74f;
}

.card:nth-child(3) {
  border-left: 7px solid #367952;
}

.card:nth-child(4) {
  border-left: 7px solid #cc3c43;
}

.card > span {
  font-size: 20px;
  font-weight: 600;
}

.card-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.card-inner > p {
  font-size: 18px;
}

.card-inner > span {
  font-size: 35px;
}

.charts {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.charts-card {
  background-color: #ffffff;
  margin-bottom: 20px;
  padding: 25px;
  box-sizing: border-box;
  -webkit-column-break-inside: avoid;
  border: 1px solid #d2d2d3;
  border-radius: 5px;
  box-shadow: 0 6px 7px -4px rgba(0, 0, 0, 0.2);
}

.chart-title {
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
  font-weight: 600;
}

/* ---------- SCROLLBARS ---------- */

::-webkit-scrollbar {
  width: 5px;
  height: 6px;
}

::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px #a5aaad;
  border-radius: 10px;
}

::-webkit-scrollbar-thumb {
  background-color: #4f35a1;
  border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
  background-color: #a5aaad;
}

/* ---------- MEDIA QUERIES ---------- */

/* Medium <= 992px */
@media screen and (max-width: 992px) {
            .grid-container {
                grid-template-columns: 1fr;
                grid-template-rows: 0.2fr 3fr;
                grid-template-areas:
                    "header"
                    "main";
            }

            #sidebar {
                display: none;
            }

            .menu-icon {
                display: inline;
            }

            .sidebar-title > span {
                display: inline;
            }

            .header-left, .header-right {
                display: none;
            }
        }

/* Small <= 768px */
@media screen and (max-width: 768px) {
            .main-cards {
                grid-template-columns: 1fr;
                gap: 10px;
                margin-bottom: 0;
            }

            .charts {
                grid-template-columns: 1fr;
                margin-top: 30px;
            }
        }

        /* Extra Small <= 576px */
        @media screen and (max-width: 576px) {
            .header-left, .header-right {
                display: none;
            }
        }

    </style>
  </head>
  <body>
    <div class="grid-container">


      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold" style="color:white; font-size:60px;">DASHBOARD</p>
        </div>

        <div class="main-cards">

        <a href="admissionreport.php" class="card">
            <div class="card-inner">
                <p class="text-primary">Admission Forms</p>
                <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $totalRows2; ?></span>
        </a>

        <a href="hiring.php" class="card">
            <div class="card-inner">
                <p class="text-primary">Employee Reports</p>
                <span class="material-icons-outlined text-orange">add_shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold"> <?php echo $totalRows; ?></span>
        </a>

        <a href="acceptpage.php" class="card">
            <div class="card-inner">
                <p class="text-primary">Accepted Applications</p>
                <span class="material-icons-outlined text-green">shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $totalRows3; ?></span>
        </a>

        <a href="rejectpage.php" class="card">
            <div class="card-inner">
                <p class="text-primary">Rejected Applications</p>
                <span class="material-icons-outlined text-red">notification_important</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $totalRows4; ?></span>
        </a>


        </div>

        <!-- <div class="charts">

          <div class="charts-card">
            <p class="chart-title">Top 5 Products</p>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <p class="chart-title">Purchase and Sales Orders</p>
            <div id="area-chart"></div>
          </div>

        </div> -->
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
  </body>
</html>