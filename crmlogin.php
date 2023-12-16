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
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Connect to the database
           

            // Prepare and execute the SQL query
            $stmt = $conn->prepare("SELECT * FROM crmlogin WHERE username=? AND password=?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if a matching record is found
            if ($result->num_rows > 0) {
                // Redirect to the different page
                header("Location: dashboard.php");
                exit();
            } else {
                echo '<script>alert("Invalid username or password. Try again.");</script>';            }

            // Close the connections
            $stmt->close();
            $conn->close();
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Boostrap Login | Ludiflex</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

body{
    font-family: 'Poppins', sans-serif;
    /* background: #87ceeb; */
    display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('crmback.jpg') no-repeat center center fixed;
            background-size: cover;
}

/*------------ Login container ------------*/

.box-area{
    width: 930px;
}

/*------------ Right box ------------*/

.right-box{
    padding: 40px 30px 40px 40px;
}

/*------------ Custom Placeholder ------------*/

::placeholder{
    font-size: 16px;
}

.rounded-4{
    border-radius: 20px;
}
.rounded-5{
    border-radius: 30px;
}


/*------------ For small screens------------*/

@media only screen and (max-width: 768px){

     .box-area{
        margin: 0 10px;

     }
     .left-box{
        height: 100px;
        overflow: hidden;
     }
     .right-box{
        padding: 20px;
     }

}
</style>
<body>
<form method="post">
    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #87ceeb;">
           <div class="featured-image mb-3">
            <img src="logo.png" class="img-fluid" style="width: 270px;">
           </div>
           <p class="text-black fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 550;">Check and Add Updates</p>
           <small class="text-black text-wrap text-center" style="font-family: 'Courier New', Courier, monospace; font-size:25px;">Shri Dewan Krishna Kishore S.D.Sanskrit College   <br>   (Ambala Chwani)</small>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
       
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Hello,Admin</h2>
                     <p>We are happy to have you back.</p>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" name="username" placeholder="Username">
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="Password">
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                    </div>
                   
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                </div>
                
               
          </div>
       </div> 
        </form>
      </div>
    </div>

</body>
</html>