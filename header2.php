

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

a {
  text-decoration: none !important;
}

li {
  list-style: none;
}

ul{
  padding: 0;
}
.dropdown-menu{
  width: 100%;
}
.dropdown-menu.show {
  transform: translate3d(0px, 285.4px, 0px) !important;
}
.reports.show{
  transform: translate3d(0px, 237.4px, 0px) !important;
  border-radius: 18px;
}
.charts.show{
  transform: translate3d(0px, 285.4px, 0px) !important;
}
.nav-link{
  padding: 0 !important;
}

:root {
  --poppins: "Poppins", sans-serif;
  --lato: "Lato", sans-serif;

  --black: #000;
  --pink: #e91d62;
  --light: #f9f9f9;
  --blue: #3c91e6;
  --light-blue: #cfe8ff;
  --grey: #eee;
  --dark-grey: #aaaaaa;
  --dark: #342e37;
  --red: #db504a;
  --yellow: #ffce26;
  --light-yellow: #fff2c6;
  --orange: #fd7238;
  --light-orange: #ffe0d3;
}

html {
  overflow-x: hidden;
}

body.dark {
  --light: #0c0c1e;
  --grey: #060714;
  --dark: #fbfbfb;
}

body {
  background: var(--grey);
  overflow-x: hidden;
}
#sidebar {
  overflow: hidden;
  position: fixed;
  top: 0;
  left: 0;
  width: 280px;
  height: 100%;
  background: black;
  z-index: 2000;
  color: white;
  font-family: var(--lato);
  transition: 0.3s ease;
  overflow-x: hidden;
  scrollbar-width: none;
}
#sidebar::--webkit-scrollbar {
  display: none;
}
#sidebar.hide {
  width: 60px;
}
#sidebar .brand {
  font-size: 36px;
  font-weight: 700;
  height: 56px;
  display: flex;
  align-items: center;
  color: var(--light-yellow);
  position: sticky;
  top: 18px;
  left: 0;
  
  z-index: 500;
  padding: 20px 0;
  box-sizing: content-box;
}
#sidebar .brand img {
  width: 4rem;
  height: auto;
}
#sidebar .brand .bx {
  min-width: 60px;
  display: flex;
  justify-content: center;
}
#sidebar .side-menu {
  width: 100%;
  margin-top: 48px;
}
#sidebar .side-menu li {
  height: 48px;
  background: transparent;
  margin-left: 6px;
  display: flex;
  padding: 4px;
}
.brand .text{
      margin: 0rem 0.4rem;
}
#sidebar .side-menu li a {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  border-radius: 48px;
  font-size: 16px;
  color: white;
  white-space: nowrap;
  overflow-x: hidden;
}
#sidebar .dropdown-menu li a {
  color: black;
}

#sidebar .side-menu.top li a:hover {
  /* color: var(--blue); */
  background-color: var(--pink);
  transition-duration: 0.3s;
}
#sidebar.hide .side-menu li a {
  width: calc(48px - (4px * 2));
  transition: width 0.3s ease;
}
#sidebar .side-menu li a.logout {
  color: var(--yellow);
}
#sidebar .side-menu.top li a:hover {
  color: var(--grey);
}
#sidebar .side-menu li a .bx {
  min-width: calc(60px - ((4px + 6px) * 2));
  display: flex;
  justify-content: center;
}
#content {
  position: relative;
  width: calc(100% - 280px);
  left: 280px;
  transition: 0.3s ease;
}
#sidebar.hide ~ #content {
  width: calc(100% - 60px);
  left: 60px;
}
#content nav {
  height: 56px;
  background: var(--light);
  padding: 0 24px;
  display: flex;
  align-items: center;
  grid-gap: 24px;
  font-family: var(--lato);
  position: sticky;
  top: 0;
  left: 0;
  z-index: 1000;
}
#content nav::before {
  content: "";
  position: absolute;
  width: 40px;
  height: 40px;
  bottom: -40px;
  left: 0;
  border-radius: 50%;
  box-shadow: -20px -20px 0 var(--light);
}
#content nav a {
  color: var(--dark);
}
#content nav .bx.bx-menu {
  cursor: pointer;
  color: var(--dark);
}
#content nav .nav-link {
  font-size: 16px;
  transition: 0.3s ease;
}
#content nav .nav-link:hover {
  color: var(--blue);
}
#content nav form {
  max-width: 400px;
  width: 100%;
  margin-right: auto;
}
#content nav form .form-input {
  display: flex;
  align-items: center;
  height: 36px;
}
#content nav form .form-input input {
  flex-grow: 1;
  padding: 0 16px;
  height: 100%;
  border: none;
  background: var(--grey);
  border-radius: 36px 0 0 36px;
  outline: none;
  width: 100%;
  color: var(--dark);
}
#content nav form .form-input button {
  width: 36px;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background: var(--grey);
  color: var(--light);
  font-size: 18px;
  border: none;
  outline: none;
  border-radius: 0 36px 36px 0;
  cursor: pointer;
}
#content nav form .form-input .bx {
  color: black;
}
#content nav .notification {
  font-size: 20px;
  position: relative;
}
#content nav .notification .num {
  position: absolute;
  top: -6px;
  right: -6px;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  border: 2px solid var(--light);
  background: var(--red);
  color: var(--light);
  font-weight: 700;
  font-size: 12px;
  display: flex;
  justify-content: center;
  align-items: center;
}
#content nav .profile img {
  width: 36px;
  height: 36px;
  object-fit: cover;
  border-radius: 50%;
}
#content nav .switch-mode {
  display: block;
  min-width: 50px;
  height: 25px;
  border-radius: 25px;
  background: var(--grey);
  cursor: pointer;
  position: relative;
}
#content nav .switch-mode::before {
  content: "";
  position: absolute;
  top: 2px;
  left: 2px;
  bottom: 2px;
  width: calc(25px - 4px);
  background: var(--blue);
  border-radius: 50%;
  transition: all 0.3s ease;
}
#content nav #switch-mode:checked + .switch-mode::before {
  left: calc(100% - (25px - 4px) - 2px);
}
#content main {
  width: 100%;
  /*padding: 36px 24px;*/
  font-family: var(--poppins);
  max-height: calc(100vh - 56px);
  overflow-y: auto;
}
#content main .head-title {
  display: flex;
  align-items: center;
  justify-content: space-between;
  grid-gap: 16px;
  flex-wrap: wrap;
}
#content main .head-title .left h1 {
  font-size: 36px;
  font-weight: 600;
  margin-bottom: 10px;
  color: var(--dark);
}
#content main .head-title .left .breadcrumb {
  display: flex;
  align-items: center;
  grid-gap: 16px;
}
#content main .head-title .left .breadcrumb li {
  color: var(--dark);
}
#content main .head-title .left .breadcrumb li a {
  color: var(--dark-grey);
  pointer-events: none;
}
#content main .head-title .left .breadcrumb li a.active {
  color: var(--blue);
  pointer-events: unset;
}
#content main .head-title .btn-download {
  height: 36px;
  padding: 0 16px;
  border-radius: 36px;
  background: var(--blue);
  color: var(--light);
  display: flex;
  justify-content: center;
  align-items: center;
  grid-gap: 10px;
  font-weight: 500;
}

#content main .box-info {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  grid-gap: 24px;
  margin-top: 36px;
}
#content main .box-info li {
  padding: 24px;
  background: var(--light);
  border-radius: 20px;
  display: flex;
  align-items: center;
  grid-gap: 24px;
}
#content main .box-info li .bx {
  width: 80px;
  height: 80px;
  border-radius: 10px;
  font-size: 36px;
  display: flex;
  justify-content: center;
  align-items: center;
}
#content main .box-info li:nth-child(1) .bx {
  background: var(--light-blue);
  color: var(--blue);
}
#content main .box-info li:nth-child(2) .bx {
  background: var(--light-yellow);
  color: var(--yellow);
}
#content main .box-info li:nth-child(3) .bx {
  background: var(--light-orange);
  color: var(--orange);
}
#content main .box-info li .text h3 {
  font-size: 24px;
  font-weight: 600;
  color: var(--dark);
}
#content main .box-info li .text p {
  color: var(--dark);
}

#content main .table-data {
  display: flex;
  flex-wrap: wrap;
  grid-gap: 24px;
  margin-top: 24px;
  width: 100%;
  color: var(--dark);
}
#content main .table-data > div {
  border-radius: 20px;
  background: var(--light);
  padding: 24px;
  overflow-x: auto;
}
#content main .table-data .head {
  display: flex;
  align-items: center;
  grid-gap: 16px;
  margin-bottom: 24px;
}
#content main .table-data .head h3 {
  margin-right: auto;
  font-size: 24px;
  font-weight: 600;
}
#content main .table-data .head .bx {
  cursor: pointer;
}

#content main .table-data .order {
  flex-grow: 1;
  flex-basis: 500px;
}
#content main .table-data .order table {
  width: 100%;
  border-collapse: collapse;
}
#content main .table-data .order table th {
  padding-bottom: 12px;
  font-size: 13px;
  text-align: left;
  border-bottom: 1px solid var(--grey);
}
#content main .table-data .order table td {
  padding: 16px 0;
}
#content main .table-data .order table tr td:first-child {
  display: flex;
  align-items: center;
  grid-gap: 12px;
  padding-left: 6px;
}
#content main .table-data .order table td img {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  object-fit: cover;
}
#content main .table-data .order table tbody tr:hover {
  background: var(--grey);
}
#content main .table-data .order table tr td .status {
  font-size: 10px;
  padding: 6px 16px;
  color: var(--light);
  border-radius: 20px;
  font-weight: 700;
}
#content main .table-data .order table tr td .status.completed {
  background: var(--blue);
}
#content main .table-data .order table tr td .status.process {
  background: var(--yellow);
}
#content main .table-data .order table tr td .status.pending {
  background: var(--orange);
}

#content main .table-data .todo {
  flex-grow: 1;
  flex-basis: 300px;
}
#content main .table-data .todo .todo-list {
  width: 100%;
}
#content main .table-data .todo .todo-list li {
  width: 100%;
  margin-bottom: 16px;
  background: var(--grey);
  border-radius: 10px;
  padding: 14px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
#content main .table-data .todo .todo-list li .bx {
  cursor: pointer;
}
#content main .table-data .todo .todo-list li.completed {
  border-left: 10px solid var(--blue);
}
#content main .table-data .todo .todo-list li.not-completed {
  border-left: 10px solid var(--orange);
}
#content main .table-data .todo .todo-list li:last-child {
  margin-bottom: 0;
}
@media screen and (max-width: 768px) {
  #sidebar {
    width: 200px;
  }

  #content {
    width: calc(100% - 60px);
    left: 200px;
  }

  #content nav .nav-link {
    display: none;
  }
}

@media screen and (max-width: 576px) {
  #content nav form .form-input input {
    display: none;
  }

  #content nav form .form-input button {
    width: auto;
    height: auto;
    background: transparent;
    border-radius: none;
    color: var(--dark);
  }

  #content nav form.show .form-input input {
    display: block;
    width: 100%;
  }
  #content nav form.show .form-input button {
    width: 36px;
    height: 100%;
    border-radius: 0 36px 36px 0;
    color: var(--light);
    background: var(--red);
  }

  #content nav form.show ~ .notification,
  #content nav form.show ~ .profile {
    display: none;
  }

  #content main .box-info {
    grid-template-columns: 1fr;
  }

  #content main .table-data .head {
    min-width: 420px;
  }
  #content main .table-data .order table {
    min-width: 420px;
  }
  #content main .table-data .todo .todo-list {
    min-width: 420px;
  }
}
.fc td{
  background-color: white;
}
.fc-title {
  font-size: 1.5em;
  color: white;
}
.fc-right {
  display: none;
}
        ul {
            padding-left: 0px !important;
        }

        .a {
            border: none;
            background: rgb(51, 102, 204);
            color: white;
            padding: 5px 15px;
            margin: 1rem 0 0 0;
        }

        .submit-btn {
            border: none;
            background: rgb(51, 102, 204);
            color: white;
            padding: 3px 10px;
        }

        .my-div {
            margin: 1rem 0 0 1rem;
        }

        .reports.show {
            transform: translate3d(0px, 237.4px, 0px) !important;
        }

        .charts.show {
            transform: translate3d(0px, 285.4px, 0px) !important;
        }

        ul.dropdown-menu {
            max-height: 400px;
            overflow-y: auto;
        }

        .charts .dropdown-heading {
            background: none !important;
            color: var(--blue) !important;
            padding: 0px;
            align-items: flex-end !important;
            cursor: default;
        }
 .reports .dropdown-heading {
            background: none !important;
            color: var(--blue) !important;
            padding: 0px;
            align-items: flex-end !important;
            cursor: default;
        }
        ul.sub-dropdown-menu {
            height: 150px;
            overflow-y: auto;
        }
        ul.nested-sub-dropdown-menu {
            height: 150px;
            overflow-y: auto;
        }

        /* Media Queries for Responsive Design */
@media screen and (max-width: 768px) {
  /* Adjust styles for small screens */
  .header {
    padding: 10px 15px;
  }

  .header-logo {
    font-size: 24px;
  }

  .header-menu {
    display: none;
  }

  .menu-icon {
    display: block;
  }
}

/* Add more media queries as needed for other screen sizes */

    </style>
</head>

<body>
    <section id="sidebar">
    <a href="./index.html" class="brand">
            
            <img src="logo.png" alt="Logo" style="width: 150px; margin-left:60px;"/>
            <!-- <span class="text">SDKSSD</span> -->
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="dashboard.php">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bx bxs-shopping-bag-alt"></i></i>Reports
                </a>
                <ul class="dropdown-menu reports">
                    <li><a class="dropdown-item" href="student_report.php">Student_Master Report</a></li>
                    <li><a class="dropdown-item" href="./hiring.php">Employee_Master Report</a></li>
          
                                        
                </ul>
            </li>
            <li>
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bx bxs-shopping-bag-alt"></i></i>Charts
                </a>
                <ul class="dropdown-menu reports">
                    <li><a class="dropdown-item" href="student_chart.php">Student_Master Chart</a></li>
                    <!-- <li><a class="dropdown-item" href="designation.php">Desgination Chart</a></li> -->
          
                                        
                </ul>
            </li>
            <!-- <li>
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bx bxs-shopping-bag-alt"></i></i>Chart
                </a>
                <ul class="dropdown-menu charts">
                    <li><a class="dropdown-item" href="student_chart.php">Student_Master Chart</a></li>
                   <li><a class="dropdown-item" href="designation.php">Desgination Chart</a></li>
                 
                </ul>
            </li> -->


            <li>
                <a href="admissionreport.php">
                    <i class="bx bxs-message-dots"></i>
                    <span class="text">Admission Forms</span>
                </a>
            </li>

            <li>
                <a href="acceptpage.php">
                    <i class="bx bxs-message-dots"></i>
                    <span class="text">Accepted Applications</span>
                </a>
            </li>
            <li>
                <a href="rejectpage.php">
                    <i class="bx bxs-message-dots"></i>
                    <span class="text">Rejected Applications</span>
                </a>
            </li>
         
            <li>
                <a href="admin.php">
                    <i class="bx bxs-message-dots"></i>
                    <span class="text">Notice Board</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class="bx bxs-cog"></i>
                    <span class="text">Change Password</span>
                </a>
            </li>
            <li>
                <a href="main.php" class="logout">
                    <i class="bx bxs-log-out-circle"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <section id="content">
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script>
            const menuBar = document.querySelector("#content nav .bx.bx-menu");
            const sidebar = document.getElementById("sidebar");

            menuBar.addEventListener("click", function() {
                sidebar.classList.toggle("hide");
            });

            const searchButton = document.querySelector(
                "#content nav form .form-input button"
            );
            const searchButtonIcon = document.querySelector(
                "#content nav form .form-input button .bx"
            );
            const searchForm = document.querySelector("#content nav form");

            searchButton.addEventListener("click", function(e) {
                if (window.innerWidth < 576) {
                    e.preventDefault();
                    searchForm.classList.toggle("show");
                    if (searchForm.classList.contains("show")) {
                        searchButtonIcon.classList.replace("bx-search", "bx-x");
                    } else {
                        searchButtonIcon.classList.replace("bx-x", "bx-search");
                    }
                }
            });

            if (window.innerWidth < 768) {
                sidebar.classList.add("hide");
            } else if (window.innerWidth > 576) {
                searchButtonIcon.classList.replace("bx-x", "bx-search");
                searchForm.classList.remove("show");
            }

            window.addEventListener("resize", function() {
                if (this.innerWidth > 576) {
                    searchButtonIcon.classList.replace("bx-x", "bx-search");
                    searchForm.classList.remove("show");
                }
            });
        </script>
</body>

</html>