<html>
  <head>
    <meta charset="UTF-8">
    <title>eSharing NGOs Around You</title>

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/main.js"></script>
    <style type="text/css">
      .container{
        width: 100%;
        height: 100%;
      }    
      #map{
        width: 100%;
        height: 95%;
        border: 2px solid #16ffa9;
      }
      #blank, #all, #userPos, #userPosBtn{
        display: none;
      }
    </style>
  </head>
  <body>
    <?php
      require 'location.php';
      $loc = new location;
      $blank = $loc->getBlankLocations();
      $blank = json_encode($blank, true);
      echo '<div id="blank">'. $blank . '</div>';

      $all = $loc->getAllLocations();
      $all = json_encode($all, true);
      echo '<div id="all">'. $all . '</div>';

    ?>
    <div class="container">
      <center>
        <h1>NGOs Around You are displayed below! <div id="userPosBtn" class="btn btn-primary" onclick="getCurrentPos()"> Locate </div></h1>
        <div id="userPos"></div>
        <div id="map"></div>
      </center>
    </div>

  
  <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

  <!--add your google api key below -->
  
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE&callback=loadMap"></script>
  
  </body>
</html>