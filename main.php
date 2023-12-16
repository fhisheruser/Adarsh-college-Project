<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "adarsh college";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
        $type = $_POST['type'];
    $file = $_POST['file'];

    $stmt = $conn->prepare("INSERT INTO `notice` (`type`, `file`) VALUES (?, ?)");
    $stmt->bind_param("ss", $type, $file);
    
    if ($stmt->execute()) {
        echo "Insertion successful";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$result = $conn->query("SELECT id, type, file FROM `notice`");
if (!$result) {
    die("Error fetching data: " . $conn->error);
}

$conn->close();
?>
<!DOCTYPE html>
<div lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="initial-scale=1, minimum-scale=1, width=device-width, height=device-height" />
    <title>ADARSH VIDYALAY</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> 
    <link rel="stylesheet" href="style.css"/> 
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin >
   <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

  
html,body{
width: 100%;
  align-items: center;
}

.zoomable.zoomed {
  transform: scale(2.5); /* Adjust the scale factor as needed */
  transition: transform 0.3s ease; /* Adjust the transition duration as needed */
}
.zoomable {
  z-index: 999;
}
    .section-1 img {
      width: 75%;
      display: block;
      
    }

    .img-fluid {
      /* width: 20%; */
      height: 200px;
      margin-top: 5px;
      margin-bottom: 8px;
      display: block;
    
    }
    @keyframes moveLeft {
      from {
        transform: translateX(100%);
      }
      to {
        transform: translateX(-450%);
      }
    }

.card-front__heading {
  font-size: 1.5rem;
  margin-top: .25rem;
}

/* Main heading for inside page */
.inside-page__heading { 
  padding-bottom: 1rem; 
  width: 100%;
}

.inside-page__heading,
.card-front__text-view {
  font-size: 1rem;
  font-weight: 800;
  margin-top: .2rem;
}

.inside-page__heading--city,
.card-front__text-view--city { color: #ff62b2; }

.inside-page__heading--ski,
.card-front__text-view--ski { color: #2aaac1; }

.inside-page__heading--beach,
.card-front__text-view--beach { color: #fa7f67; }

.inside-page__heading--camping,
.card-front__text-view--camping { color: #00b97c; }
.card-front__tp { color: #fafbfa; }

.card-front__text-price {
  font-size: 1.2rem;
  margin-top: -.2rem;
}

.inside-page__text {
  color: #333;
}

.card-front__icon {
  fill: #fafbfa;
  font-size: 3vw;
  height: 3.25rem;
  margin-top: -.5rem;
  width: 3.25rem;
}

.inside-page__btn {
  background-color: transparent;
  border: 3px solid;
  border-radius: .5rem;
  font-size: 1.2rem;
  font-weight: 600;
  margin-top: 2rem;
  overflow: hidden;
  padding: .7rem .75rem;
  position: relative;
  text-decoration: none;
  transition: all .3s ease;
  width: 90%;
  z-index: 10;
}

.inside-page__btn::before { 
  content: "";
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  transform: scaleY(0);
  transition: all .3s ease;
  width: 100%;
  z-index: -1;
}

.inside-page__btn--city { 
  border-color: #ff40a1;
  color: #ff40a1;
}

.inside-page__btn--city::before { 
  background-color: #ff40a1;
}

.inside-page__btn--ski { 
  border-color: #279eb2;
  color: #279eb2;
}

.inside-page__btn--ski::before { 
  background-color: #279eb2;
}

.inside-page__btn--beach { 
  border-color: #fa7f67;
  color: #fa7f67;
}

.inside-page__btn--beach::before { 
  background-color: #fa7f67;
}

.inside-page__btn--camping { 
  border-color: #00b97d;
  color: #00b97d;
}

.inside-page__btn--camping::before { 
  background-color: #00b97d;
}

.inside-page__btn:hover { 
  color: #fafbfa;
}

.inside-page__btn:hover::before { 
  transform: scaleY(1);
}

.card-area {
  align-items: center;
  display: flex;
  flex-wrap: wrap;
  height: 100%;
  justify-content: space-evenly;
  padding: 1rem;
  margin-bottom: 400px;
}

/* .card-section {
  align-items: center;
  display: flex;
  height: 100%;
  justify-content: center;
  width: 100%;
} */
/* A container to hold the flip card and the inside page */
.card {
  background-color: rgba(0,0,0, .05);
  box-shadow: -.1rem 1.7rem 6.6rem -3.2rem rgba(0,0,0,0.5);
  height: 15rem;
  position: relative;
  transition: all 1s ease;
  width: 15rem;
}
.flip-card {
  height: 15rem;
  perspective: 100rem;
  position: absolute;
  right: 0;
  transition: all 1s ease;
  visibility: hidden;
  width: 15rem;
  z-index: 100;
}
.flip-card > * {
  visibility: visible;
}

.flip-card__container {
  height: 100%;
  position: absolute;
  right: 0;
  transform-origin: left;
  transform-style: preserve-3d;
  transition: all 1s ease;
  width: 100%;
}

.card-front,
.card-back {
  backface-visibility: hidden;
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  width: 100%;
}

.card-front {
  background-color: #fafbfa;
  height: 15rem;
  width: 15rem;
}

.card-front__tp {
  align-items: center;
  clip-path: polygon(0 0, 100% 0, 100% 90%, 57% 90%, 50% 100%, 43% 90%, 0 90%);
  display: flex;
  flex-direction: column;
  height: 12rem;
  justify-content: center;
  padding: .75rem;
}

.card-front__tp--city {
  background: linear-gradient(
    to bottom,
    #ff73b9,
    #ff40a1
  );
}

.card-front__tp--ski {
  background: linear-gradient(
    to bottom,
    #47c2d7,
    #279eb2
  );
}

.card-front__tp--beach {
  background: linear-gradient(
    to bottom,
    #fb9b88,
    #f86647
  );
}

.card-front__tp--camping {
  background: linear-gradient(
    to bottom,
    #00db93,
    #00b97d
  );
}

.card-front__bt {
  align-items: center;
  display: flex;
  justify-content: center;
}
.card-back {
  background-color: #fafbfa;
  transform: rotateY(180deg);
}
.video__container {
  clip-path: polygon(0% 0%, 100% 0%, 90% 50%, 100% 100%, 0% 100%);
  height: auto;
  min-height: 100%;
  object-fit: cover;
  width: 100%;
}
.inside-page {
  background-color: #fafbfa;
  box-shadow: inset 20rem 0px 5rem -2.5rem rgba(0,0,0,0.25);
  height: 100%;
  padding: 1rem;
  position: absolute;
  right: 0;
  transition: all 1s ease;
  width: 15rem;
  z-index: 1;
}

.inside-page__container {
  align-items: center;
  display: flex;
  flex-direction: column;
  height: 100%;
  text-align: center; 
  width: 100%;
}
.card:hover {
  box-shadow:
  -.1rem 1.7rem 6.6rem -3.2rem rgba(0,0,0,0.75);
  width: 30rem;
}

.card:hover .flip-card__container {
  transform: rotateY(-180deg);
}

.card:hover .inside-page {
  box-shadow: inset 1rem 0px 5rem -2.5rem rgba(0,0,0,0.1);
}

.swiper {
  width: 100%; /* Use 100% width */
  max-width: 20rem; /* Set a maximum width if needed */
  height: auto; /* Allow height to adjust based on content */
}

.container{
  width: 100%;
}
.projects h4{
    margin: 50px 2px;
padding:35px;
font-family: 'Roboto', sans-serif;
font-size: 4em;

text-transform: uppercase;
text-align: center;
position: relative;
background-color: #08C4E2;
color: white;
font-weight: bold;
}

.image-container {
  position: relative;
}

.headline {
  animation: moveLeft 30s linear infinite;
  animation-play-state: running;
  position: absolute;
  top: 5px;
  left: 0;
  width: 100%;
  z-index: 999;
}
.headline:hover {
  animation-play-state: paused; /* pause animation on hover */
}
    </style>
  </head>

<?php include('MAINHEAD.php') ?>

<div class="image-container">
  <img src="vision statement  (2).jpg" alt="" style="width: 100%; height:90px">
  <div class="headline">
    <?php
    while ($row = $result->fetch_assoc()) {
      echo '<p>' . $row['type'] . '<br>';
      if (!empty($row['file'])) {
        echo "Notice Document: <a href='" . $row['file'] . "' target='_blank'>NOTICE</a> ". '</p>';    
        }
    }
    $result->free_result();
    ?>
  </div>
</div>

    <div
      id="carouselExampleIndicators"
      class="carousel slide"
      data-ride="carousel"
      data-interval="7000"
    >
      <ol class="carousel-indicators">
        <li
          data-target="#carouselExampleIndicators"
          data-slide-to="0"
          class="active"
        ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
       
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active rounded">
          <img class="d-block w-100" src="SANATAN 1.jpg" alt="First slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="SANATAN 2.jpg" alt="Second slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="SANATAN 3.jpg" alt="Third slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="SANATAN 4.jpg" alt="Fourth slide" />
        </div>
       
        <div class="carousel-item">
          <img class="d-block w-100" src="NAVGRAHAS WIDTH.jpg" alt="Sixth slide" />
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <p style="margin-top: 30px;"><b>SDKKSD Adarsh Sanskrit College</b> is initiated with the aim of protecting and propagating the fundamental principles of Sanatan- Dharma, with the inspiration and blessings of Mahamana Pt. Madan Mohan Malaviya ji, Tyagamurti Shri Goswami Ganeshdutt ji, lecturer Pt. Deendayal ji and with the efforts of Pt. Rishiram ji, Lahore in 1916. Shri Diwan Krishna Kishore Sanatan Dharma Sanskrit College was established. It has been recognized as Sanatan Dharma Adarsh ​​Sanskrit College (Lahore), Ambala Cantonment by the Ministry of Education, Government of India from 1 November 1989.</p>
 
  <div class="projects">
    <h4>OUR EVENTS</h4>
  </div>
        <section class="card-area">

            <!-- Card: City -->
            <section class="card-section">
                <div class="card">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve" class="card-front__icon">
                               <g>
                                   <path d="M49.7,22c-1.1,0-2,0.9-2,2v32.2c0,1.1,0.9,2,2,2s2-0.9,2-2V24C51.7,22.9,50.8,22,49.7,22z"/>
                                   <path d="M13,29.5c1.1,0,2-0.9,2-2s-0.9-2-2-2H5.7v-3h20.8c1.1,0,2-0.9,2-2s-0.9-2-2-2H5.7v-3h20.8c1.1,0,2-0.9,2-2s-0.9-2-2-2H5.7
                                       V7.1h24.8v15.3c0,1.1,0.9,2,2,2s2-0.9,2-2V5.1c0-1.1-0.9-2-2-2H3.7c-1.1,0-2,0.9-2,2v51c0,1.1,0.9,2,2,2s2-0.9,2-2V36.5H13
                                       c1.1,0,2-0.9,2-2s-0.9-2-2-2H5.7v-3H13z"/>
                                   <path d="M58,11.9c0-0.1,0-0.1,0-0.2c0-0.1,0-0.1-0.1-0.2c0-0.1,0-0.1-0.1-0.2c0-0.1-0.1-0.1-0.1-0.2c0,0,0-0.1-0.1-0.1c0,0,0,0,0,0
                                       c0-0.1-0.1-0.1-0.1-0.2c0,0-0.1-0.1-0.1-0.1c0,0-0.1-0.1-0.1-0.1c-0.1,0-0.1-0.1-0.2-0.1c0,0-0.1-0.1-0.2-0.1
                                       c-0.1,0-0.1-0.1-0.2-0.1c-0.1,0-0.1,0-0.2-0.1c-0.1,0-0.1,0-0.2-0.1c0,0-0.1,0-0.1,0c-0.1,0-0.2,0-0.2,0c0,0,0,0,0,0
                                       c0,0-0.1,0-0.1,0c-0.1,0-0.2,0-0.2,0c-0.1,0-0.1,0-0.2,0c-0.1,0-0.1,0-0.2,0.1c-0.1,0-0.1,0.1-0.2,0.1c0,0-0.1,0-0.1,0.1l-12.6,7.8
                                       c0,0,0,0,0,0c-0.1,0-0.1,0.1-0.2,0.1c0,0-0.1,0.1-0.1,0.1c0,0-0.1,0.1-0.1,0.1c0,0-0.1,0.1-0.1,0.2c0,0.1-0.1,0.1-0.1,0.2
                                       c0,0.1-0.1,0.1-0.1,0.2c0,0.1,0,0.1-0.1,0.2c0,0.1,0,0.1-0.1,0.2c0,0.1,0,0.1,0,0.2c0,0.1,0,0.1,0,0.2c0,0,0,0,0,0v5.4H22.1
                                       c-1.1,0-2,0.9-2,2v28.9c0,1.1,0.9,2,2,2s2-0.9,2-2V29.3h17.3v26.9c0,1.1,0.9,2,2,2s2-0.9,2-2V21l8.6-5.3v40.5c0,1.1,0.9,2,2,2
                                       s2-0.9,2-2V12.1C58,12,58,12,58,11.9z"/>
                                   <path d="M28,31L28,31c-1.1,0-2,0.9-2,2s0.9,2,2,2s2-0.9,2-2S29.1,31,28,31z"/>
                                   <path d="M33.5,31L33.5,31c-1.1,0-2,0.9-2,2s0.9,2,2,2c1.1,0,2-0.9,2-2S34.6,31,33.5,31z"/>
                                   <path d="M28,36L28,36c-1.1,0-2,0.9-2,2s0.9,2,2,2s2-0.9,2-2S29.1,36,28,36z"/>
                                   <path d="M33.5,36L33.5,36c-1.1,0-2,0.9-2,2s0.9,2,2,2c1.1,0,2-0.9,2-2S34.6,36,33.5,36z"/>
                               </g>
                               </svg>

                               <h3 class="card-front__heading">
                               Swachata Saptaha 1/10/2023 - 7/10/2023
                            </h3>
                                </div>

                                <div class="card-front__bt">
                                    <p class="card-front__text-view card-front__text-view--city">
                                        View me
                                    </p>
                                </div>
                            </div>
                            <div class="card-back">
                            <img src="clean1.jpg" alt="" style="height: 300px; width:250px;" class="zoomable">
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                        <img src="clean2.jpg" alt="" style="height: 320px; width:220px;" class="zoomable">
<br>
<br>
<br>
<br>
                            <a href="#" class="inside-page__btn inside-page__btn--city"></a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Card: Ski -->
            <section class="card-section">
                <div class="card">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--ski">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve" class="card-front__icon">
                               <g>
                                   <path d="M58.8,54.5L38.5,19.3c-0.4-0.6-1-1-1.7-1s-1.4,0.4-1.7,1L14.8,54.5c-0.4,0.6-0.4,1.4,0,2c0.4,0.6,1,1,1.7,1h40.6
                                       c0.7,0,1.4-0.4,1.7-1C59.2,55.9,59.2,55.1,58.8,54.5z M36.8,24.3l5.8,10c-0.5-0.2-1.1-0.3-1.7-0.3c-2.5,0-3.7,1.5-4.6,2.5
                                       c-0.7,0.9-1,1.1-1.5,1.1s-0.8-0.2-1.5-1.1c-0.6-0.7-1.3-1.5-2.4-2.1L36.8,24.3z M20,53.5l8.9-15.4c0.5,0,0.7,0.3,1.4,1.1
                                       c0.8,1,2.1,2.5,4.6,2.5s3.7-1.5,4.6-2.5c0.7-0.9,1-1.1,1.5-1.1c0.5,0,0.8,0.2,1.5,1.1c0.8,1,2.1,2.5,4.5,2.5l6.8,11.8H20z"/>
                                   <path d="M14.7,51.5c1.1,0,2-0.9,2-2s-0.9-2-2-2H6.4l9.1-15.7c0.6,0.6,1.5,1.3,2.9,1.3c1.8,0,2.8-1.2,3.3-1.8
                                       c0.1-0.1,0.2-0.2,0.3-0.3c0.1,0.1,0.2,0.2,0.3,0.3c0.5,0.6,1.5,1.8,3.3,1.8c1.1,0,2-0.9,2-2c0-1.1-0.9-2-1.9-2
                                       c-0.1-0.1-0.2-0.2-0.3-0.4c-0.5-0.6-1.5-1.8-3.3-1.8c-1.8,0-2.8,1.2-3.3,1.8c-0.1,0.1-0.2,0.2-0.3,0.3c-0.1-0.1-0.2-0.2-0.3-0.3
                                       c-0.1-0.2-0.3-0.4-0.5-0.6l5.7-9.9l3.8,6.6c0.6,1,1.8,1.3,2.7,0.7c1-0.6,1.3-1.8,0.7-2.7L25,13.2c-0.4-0.6-1-1-1.7-1
                                       s-1.4,0.4-1.7,1l-8.4,14.5c-0.1,0.1-0.2,0.3-0.3,0.4L1.2,48.5c0,0,0,0.1,0,0.1c0,0.1-0.1,0.1-0.1,0.2c0,0.1,0,0.1-0.1,0.2
                                       c0,0.1,0,0.1,0,0.2c0,0.1,0,0.1,0,0.2c0,0,0,0.1,0,0.1c0,0,0,0,0,0.1c0,0.1,0,0.1,0,0.2c0,0.1,0,0.1,0,0.2C1,50,1,50,1,50.1
                                       c0,0.1,0,0.1,0.1,0.2c0,0.1,0.1,0.1,0.1,0.2c0,0.1,0.1,0.1,0.1,0.2c0,0.1,0.1,0.1,0.1,0.2c0,0,0.1,0.1,0.1,0.1c0,0,0.1,0.1,0.1,0.1
                                       c0.1,0,0.1,0.1,0.2,0.1c0,0,0,0,0.1,0c0,0,0.1,0,0.1,0c0.1,0.1,0.2,0.1,0.3,0.1c0,0,0.1,0,0.1,0c0.1,0,0.3,0.1,0.5,0.1c0,0,0,0,0,0
                                       c0,0,0,0,0,0c0,0,0,0,0,0H14.7z"/>
                                   <path d="M40.7,12.3h3.1l-2.2,2.2c-0.6,0.6-0.6,1.5,0,2.1c0.3,0.3,0.7,0.4,1.1,0.4s0.8-0.1,1.1-0.4l2.2-2.2v3.1
                                       c0,0.8,0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5v-3.1l2.2,2.2c0.3,0.3,0.7,0.4,1.1,0.4s0.8-0.1,1.1-0.4c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2h3.1
                                       c0.8,0,1.5-0.7,1.5-1.5s-0.7-1.5-1.5-1.5h-3.1l2.2-2.2c0.6-0.6,0.6-1.5,0-2.1c-0.6-0.6-1.5-0.6-2.1,0L49,7.2V4
                                       c0-0.8-0.7-1.5-1.5-1.5S46,3.2,46,4v3.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0c-0.6,0.6-0.6,1.5,0,2.1l2.2,2.2h-3.1
                                       c-0.8,0-1.5,0.7-1.5,1.5S39.9,12.3,40.7,12.3z"/>
                               </g>
                               </svg>
                                               <h3 class="card-front__heading">
                                               Sanskrit Sambhashan varg  from 11/9/23 - 22/9/23
                                               </h3>
                                </div>

                                <div class="card-front__bt">
                                    <p class="card-front__text-view card-front__text-view--ski">
                                        View me
                                    </p>
                                </div>
                            </div>

                            <div class="card-back">
                            <img src="sans1.jpeg" alt="" style="height: 300px; width:250px;" class="zoomable">
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                        <img src="sans2.jpeg" alt="" style="height: 320px; width:220px;" class="zoomable">
<br>
<br>
<br>
<br>
                            <a href="#" class="inside-page__btn inside-page__btn--ski"></a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Card: Beach -->
            <section class="card-section">
                <div class="card">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--beach">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve" class="card-front__icon">
                               <path d="M57.2,28h-7.4c-0.4-4-2-7.7-4.4-10.6l3.2-3.2c0.8-0.8,0.8-2,0-2.8c-0.8-0.8-2-0.8-2.8,0l-3.2,3.2c-3-2.4-6.6-4-10.6-4.4V2.8
                                   c0-1.1-0.9-2-2-2s-2,0.9-2,2v7.4c-4,0.4-7.7,2-10.6,4.4l-3.2-3.2c-0.8-0.8-2-0.8-2.8,0c-0.8,0.8-0.8,2,0,2.8l3.2,3.2
                                   c-2.4,3-4,6.6-4.4,10.6H2.8c-1.1,0-2,0.9-2,2s0.9,2,2,2h7.4c0.4,4,2,7.7,4.4,10.6l-3.2,3.2c-0.8,0.8-0.8,2,0,2.8
                                   c0.4,0.4,0.9,0.6,1.4,0.6s1-0.2,1.4-0.6l3.2-3.2c3,2.4,6.6,4,10.6,4.4v7.4c0,1.1,0.9,2,2,2s2-0.9,2-2v-7.4c4-0.4,7.7-2,10.6-4.4
                                   l3.2,3.2c0.4,0.4,0.9,0.6,1.4,0.6s1-0.2,1.4-0.6c0.8-0.8,0.8-2,0-2.8l-3.2-3.2c2.4-3,4-6.6,4.4-10.6h7.4c1.1,0,2-0.9,2-2
                                   S58.3,28,57.2,28z M30,45.9c-8.8,0-15.9-7.2-15.9-15.9c0-8.8,7.2-15.9,15.9-15.9c8.8,0,15.9,7.2,15.9,15.9
                                   C45.9,38.8,38.8,45.9,30,45.9z"/>
                               </svg>
                               
                                               <h3 class="card-front__heading">
                                               Sanskrit week 28/8/23 - 4/9/23
                                               </h3>
                                </div>

                                <div class="card-front__bt">
                                    <p class="card-front__text-view card-front__text-view--beach">
                                        View me
                                    </p>
                                </div>
                            </div>
                            <div class="card-back">
                            <img src="week2.jpeg" alt="" style="height: 320px; width:220px;" class="zoomable">

                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                        <img src="week3.jpeg" alt="" style="height: 320px; width:220px;" class="zoomable">
<br>
<br>
<br>
<br>
                            <a href="#" class="inside-page__btn inside-page__btn--beach"></a>
                        </div>
                    </div>
                </div>
            </section>
        </section>

         
        <section class="card-area">
            <!-- Card: Camping -->
            <section class="card-section">
                <div class="card">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--camping">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve" class="card-front__icon">
                               <path d="M57,52.1c0-0.4-0.1-0.7-0.3-1.1l-6.3-10.8L32.4,9l2.3-4c0.6-1,0.2-2.2-0.7-2.7c-1-0.6-2.2-0.2-2.7,0.7L30,5.2L28.7,3
                                   c-0.6-1-1.8-1.3-2.7-0.7c-1,0.6-1.3,1.8-0.7,2.7l2.3,4l-18,31.1L3.3,51C3.1,51.3,3,51.7,3,52.1c0,0.4,0.1,0.7,0.3,1
                                   c0.4,0.6,1,1,1.7,1h50c0.7,0,1.4-0.4,1.7-1C56.9,52.8,57,52.4,57,52.1z M34.7,49.8C34.2,50,32.1,50,30,50s-4.2,0-4.7-0.2
                                   c-0.2-0.5-0.2-2.1-0.2-3.6l0-4.3c0-2.7,2.2-4.9,4.9-4.9s4.9,2.2,4.9,4.9l0,4.3C34.9,47.7,34.9,49.3,34.7,49.8z M13.1,42.1L28,16.5
                                   v16.7c-3.9,0.9-6.9,4.4-6.9,8.6l0,4.3c0,1.7,0,2.9,0.2,4H8.5L13.1,42.1z M38.7,50.1c0.2-1,0.2-2.3,0.2-4l0-4.3
                                   c0-4.2-2.9-7.7-6.9-8.6V16.5l15,25.7l4.6,7.9H38.7z"/>
                               </svg>
                                               <h3 class="card-front__heading">
                                               National seminar 31/3/2023
                                               </h3>
                                </div>

                                <div class="card-front__bt">
                                    <p class="card-front__text-view card-front__text-view--camping">
                                        View me
                                    </p>
                                </div>
                            </div>
                            <div class="card-back">
                            <img src="nseminar1.jpeg" alt="" style="height: 320px; width:220px;" class="zoomable">

                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                        <img src="nseminar2.jpeg" alt="" style="height: 225px; width:220px;" class="zoomable">
<br>
<br>

                            <a href="#" class="inside-page__btn inside-page__btn--camping"></a>
                        </div>
                    </div>
                </div>
            </section>
       
  
            <section class="card-section">
                <div class="card">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve" class="card-front__icon">
                               <g>
                                   <path d="M49.7,22c-1.1,0-2,0.9-2,2v32.2c0,1.1,0.9,2,2,2s2-0.9,2-2V24C51.7,22.9,50.8,22,49.7,22z"/>
                                   <path d="M13,29.5c1.1,0,2-0.9,2-2s-0.9-2-2-2H5.7v-3h20.8c1.1,0,2-0.9,2-2s-0.9-2-2-2H5.7v-3h20.8c1.1,0,2-0.9,2-2s-0.9-2-2-2H5.7
                                       V7.1h24.8v15.3c0,1.1,0.9,2,2,2s2-0.9,2-2V5.1c0-1.1-0.9-2-2-2H3.7c-1.1,0-2,0.9-2,2v51c0,1.1,0.9,2,2,2s2-0.9,2-2V36.5H13
                                       c1.1,0,2-0.9,2-2s-0.9-2-2-2H5.7v-3H13z"/>
                                   <path d="M58,11.9c0-0.1,0-0.1,0-0.2c0-0.1,0-0.1-0.1-0.2c0-0.1,0-0.1-0.1-0.2c0-0.1-0.1-0.1-0.1-0.2c0,0,0-0.1-0.1-0.1c0,0,0,0,0,0
                                       c0-0.1-0.1-0.1-0.1-0.2c0,0-0.1-0.1-0.1-0.1c0,0-0.1-0.1-0.1-0.1c-0.1,0-0.1-0.1-0.2-0.1c0,0-0.1-0.1-0.2-0.1
                                       c-0.1,0-0.1-0.1-0.2-0.1c-0.1,0-0.1,0-0.2-0.1c-0.1,0-0.1,0-0.2-0.1c0,0-0.1,0-0.1,0c-0.1,0-0.2,0-0.2,0c0,0,0,0,0,0
                                       c0,0-0.1,0-0.1,0c-0.1,0-0.2,0-0.2,0c-0.1,0-0.1,0-0.2,0c-0.1,0-0.1,0-0.2,0.1c-0.1,0-0.1,0.1-0.2,0.1c0,0-0.1,0-0.1,0.1l-12.6,7.8
                                       c0,0,0,0,0,0c-0.1,0-0.1,0.1-0.2,0.1c0,0-0.1,0.1-0.1,0.1c0,0-0.1,0.1-0.1,0.1c0,0-0.1,0.1-0.1,0.2c0,0.1-0.1,0.1-0.1,0.2
                                       c0,0.1-0.1,0.1-0.1,0.2c0,0.1,0,0.1-0.1,0.2c0,0.1,0,0.1-0.1,0.2c0,0.1,0,0.1,0,0.2c0,0.1,0,0.1,0,0.2c0,0,0,0,0,0v5.4H22.1
                                       c-1.1,0-2,0.9-2,2v28.9c0,1.1,0.9,2,2,2s2-0.9,2-2V29.3h17.3v26.9c0,1.1,0.9,2,2,2s2-0.9,2-2V21l8.6-5.3v40.5c0,1.1,0.9,2,2,2
                                       s2-0.9,2-2V12.1C58,12,58,12,58,11.9z"/>
                                   <path d="M28,31L28,31c-1.1,0-2,0.9-2,2s0.9,2,2,2s2-0.9,2-2S29.1,31,28,31z"/>
                                   <path d="M33.5,31L33.5,31c-1.1,0-2,0.9-2,2s0.9,2,2,2c1.1,0,2-0.9,2-2S34.6,31,33.5,31z"/>
                                   <path d="M28,36L28,36c-1.1,0-2,0.9-2,2s0.9,2,2,2s2-0.9,2-2S29.1,36,28,36z"/>
                                   <path d="M33.5,36L33.5,36c-1.1,0-2,0.9-2,2s0.9,2,2,2c1.1,0,2-0.9,2-2S34.6,36,33.5,36z"/>
                               </g>
                               </svg>

                               <h3 class="card-front__heading">
                               International seminar 28,29/03/2023
                            </h3>
                                </div>

                                <div class="card-front__bt">
                                    <p class="card-front__text-view card-front__text-view--city">
                                        View me
                                    </p>
                                </div>
                            </div>
                            <div class="card-back">
                            <img src="i1.jpeg" alt="" style="height: 300px; width:250px;" class="zoomable">
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                        <img src="i2.jpeg" alt="" style="height: 320px; width:220px;" class="zoomable">
                        <br>
<br>
<br>
<br>
<br>
                            <a href="#" class="inside-page__btn inside-page__btn--city"></a>
                        </div>
                    </div>
                </div>
            </section>
      
  

            <section class="card-section">
                <div class="card">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--ski">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve" class="card-front__icon">
                               <g>
                                   <path d="M58.8,54.5L38.5,19.3c-0.4-0.6-1-1-1.7-1s-1.4,0.4-1.7,1L14.8,54.5c-0.4,0.6-0.4,1.4,0,2c0.4,0.6,1,1,1.7,1h40.6
                                       c0.7,0,1.4-0.4,1.7-1C59.2,55.9,59.2,55.1,58.8,54.5z M36.8,24.3l5.8,10c-0.5-0.2-1.1-0.3-1.7-0.3c-2.5,0-3.7,1.5-4.6,2.5
                                       c-0.7,0.9-1,1.1-1.5,1.1s-0.8-0.2-1.5-1.1c-0.6-0.7-1.3-1.5-2.4-2.1L36.8,24.3z M20,53.5l8.9-15.4c0.5,0,0.7,0.3,1.4,1.1
                                       c0.8,1,2.1,2.5,4.6,2.5s3.7-1.5,4.6-2.5c0.7-0.9,1-1.1,1.5-1.1c0.5,0,0.8,0.2,1.5,1.1c0.8,1,2.1,2.5,4.5,2.5l6.8,11.8H20z"/>
                                   <path d="M14.7,51.5c1.1,0,2-0.9,2-2s-0.9-2-2-2H6.4l9.1-15.7c0.6,0.6,1.5,1.3,2.9,1.3c1.8,0,2.8-1.2,3.3-1.8
                                       c0.1-0.1,0.2-0.2,0.3-0.3c0.1,0.1,0.2,0.2,0.3,0.3c0.5,0.6,1.5,1.8,3.3,1.8c1.1,0,2-0.9,2-2c0-1.1-0.9-2-1.9-2
                                       c-0.1-0.1-0.2-0.2-0.3-0.4c-0.5-0.6-1.5-1.8-3.3-1.8c-1.8,0-2.8,1.2-3.3,1.8c-0.1,0.1-0.2,0.2-0.3,0.3c-0.1-0.1-0.2-0.2-0.3-0.3
                                       c-0.1-0.2-0.3-0.4-0.5-0.6l5.7-9.9l3.8,6.6c0.6,1,1.8,1.3,2.7,0.7c1-0.6,1.3-1.8,0.7-2.7L25,13.2c-0.4-0.6-1-1-1.7-1
                                       s-1.4,0.4-1.7,1l-8.4,14.5c-0.1,0.1-0.2,0.3-0.3,0.4L1.2,48.5c0,0,0,0.1,0,0.1c0,0.1-0.1,0.1-0.1,0.2c0,0.1,0,0.1-0.1,0.2
                                       c0,0.1,0,0.1,0,0.2c0,0.1,0,0.1,0,0.2c0,0,0,0.1,0,0.1c0,0,0,0,0,0.1c0,0.1,0,0.1,0,0.2c0,0.1,0,0.1,0,0.2C1,50,1,50,1,50.1
                                       c0,0.1,0,0.1,0.1,0.2c0,0.1,0.1,0.1,0.1,0.2c0,0.1,0.1,0.1,0.1,0.2c0,0.1,0.1,0.1,0.1,0.2c0,0,0.1,0.1,0.1,0.1c0,0,0.1,0.1,0.1,0.1
                                       c0.1,0,0.1,0.1,0.2,0.1c0,0,0,0,0.1,0c0,0,0.1,0,0.1,0c0.1,0.1,0.2,0.1,0.3,0.1c0,0,0.1,0,0.1,0c0.1,0,0.3,0.1,0.5,0.1c0,0,0,0,0,0
                                       c0,0,0,0,0,0c0,0,0,0,0,0H14.7z"/>
                                   <path d="M40.7,12.3h3.1l-2.2,2.2c-0.6,0.6-0.6,1.5,0,2.1c0.3,0.3,0.7,0.4,1.1,0.4s0.8-0.1,1.1-0.4l2.2-2.2v3.1
                                       c0,0.8,0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5v-3.1l2.2,2.2c0.3,0.3,0.7,0.4,1.1,0.4s0.8-0.1,1.1-0.4c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2h3.1
                                       c0.8,0,1.5-0.7,1.5-1.5s-0.7-1.5-1.5-1.5h-3.1l2.2-2.2c0.6-0.6,0.6-1.5,0-2.1c-0.6-0.6-1.5-0.6-2.1,0L49,7.2V4
                                       c0-0.8-0.7-1.5-1.5-1.5S46,3.2,46,4v3.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0c-0.6,0.6-0.6,1.5,0,2.1l2.2,2.2h-3.1
                                       c-0.8,0-1.5,0.7-1.5,1.5S39.9,12.3,40.7,12.3z"/>
                               </g>
                               </svg>
                                               <h3 class="card-front__heading">
                                               Youth festivals held at CSU Campus, Jammu
                                               </h3>
                                </div>

                                <div class="card-front__bt">
                                    <p class="card-front__text-view card-front__text-view--ski">
                                        View me
                                    </p>
                                </div>
                            </div>

                            <div class="card-back">
                            <img src="y1.jpeg" alt="" style="height: 300px; width:250px;" class="zoomable">
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                        <img src="y2.jpeg" alt="" style="height: 320px; width:220px;" class="zoomable">
<br>
<br>
<br>
<br>
<br>
                            <a href="#" class="inside-page__btn inside-page__btn--ski"></a>
                        </div>
                    </div>
                </div>
            </section>
            </section>

            <section class="card-area">

            <section class="card-section">
                <div class="card">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--beach">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve" class="card-front__icon">
                               <path d="M57.2,28h-7.4c-0.4-4-2-7.7-4.4-10.6l3.2-3.2c0.8-0.8,0.8-2,0-2.8c-0.8-0.8-2-0.8-2.8,0l-3.2,3.2c-3-2.4-6.6-4-10.6-4.4V2.8
                                   c0-1.1-0.9-2-2-2s-2,0.9-2,2v7.4c-4,0.4-7.7,2-10.6,4.4l-3.2-3.2c-0.8-0.8-2-0.8-2.8,0c-0.8,0.8-0.8,2,0,2.8l3.2,3.2
                                   c-2.4,3-4,6.6-4.4,10.6H2.8c-1.1,0-2,0.9-2,2s0.9,2,2,2h7.4c0.4,4,2,7.7,4.4,10.6l-3.2,3.2c-0.8,0.8-0.8,2,0,2.8
                                   c0.4,0.4,0.9,0.6,1.4,0.6s1-0.2,1.4-0.6l3.2-3.2c3,2.4,6.6,4,10.6,4.4v7.4c0,1.1,0.9,2,2,2s2-0.9,2-2v-7.4c4-0.4,7.7-2,10.6-4.4
                                   l3.2,3.2c0.4,0.4,0.9,0.6,1.4,0.6s1-0.2,1.4-0.6c0.8-0.8,0.8-2,0-2.8l-3.2-3.2c2.4-3,4-6.6,4.4-10.6h7.4c1.1,0,2-0.9,2-2
                                   S58.3,28,57.2,28z M30,45.9c-8.8,0-15.9-7.2-15.9-15.9c0-8.8,7.2-15.9,15.9-15.9c8.8,0,15.9,7.2,15.9,15.9
                                   C45.9,38.8,38.8,45.9,30,45.9z"/>
                               </svg>
                               
                                               <h3 class="card-front__heading">
                                               Rupak Mahotsav
                                               </h3>
                                </div>

                                <div class="card-front__bt">
                                    <p class="card-front__text-view card-front__text-view--beach">
                                        View me
                                    </p>
                                </div>
                            </div>
                            <div class="card-back">
                            <img src="rup1.jpeg" alt="" style="height: 320px; width:220px;" class="zoomable">

                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                        <img src="rup2.jpeg" alt="" style="height: 320px; width:220px;" class="zoomable">
                        <br>
<br>
<br>
<br>
<br>
                            <a href="#" class="inside-page__btn inside-page__btn--beach"></a>
                        </div>
                    </div>
                </div>
            </section>
        </section>
</body>
<?php include('footer.php') ?>
  <script src="index.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script>

  $('.responsive').slick({
    dots: true,
    infinite: false,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><i class="fa fa-angle-right"></i></button>',
    responsive: [
      {
        breakpoint: 1600,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 1092,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
  
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
          rotate: 20,
          stretch: 0,
          depth: 200,
          modifier: 1,
          slideShadows: true,
        },
        loop:true,
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
        autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      });
    </script>

<script>

  function videoslider(links){
      document.querySelector(".slider").src = links;
  }
  
  </script>
   <script src="https://code.jquery.com/jquery-3.6.3.min.js" ></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/deb4d1b812.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
   <script>
function toggleNoticeBoard() {
      const noticeBoard = document.getElementById('noticeBoard');
      noticeBoard.classList.toggle('open-notice-board');
    }

document.addEventListener('DOMContentLoaded', function () {
    let currentLanguage = 'en';
    const translations = {
        'en': {
            'main-title': 'Welcome to Your Website',
            'content': 'This is the main content of your website.'
        },
        '': {
            'main-title': 'Bienvenido a tu sitio web',
            'content': 'Este es el contenido principal de tu sitio web.'
        }
    };
    function updateContent() {
        const elements = document.querySelectorAll('[data-translate]');
        elements.forEach(element => {
            const key = element.getAttribute('data-translate');
            element.textContent = translations[currentLanguage][key];
        });
    }
    updateContent();

    const languageSelector = document.getElementById('language-selector');
    languageSelector.addEventListener('change', function () {
        currentLanguage = this.value;
        updateContent();
    });
});

const images = document.querySelectorAll('.zoomable');

images.forEach(image => {
  image.addEventListener('click', () => {
    image.classList.toggle('zoomed');
  });
});
</script>
  </body>
</html>


























      