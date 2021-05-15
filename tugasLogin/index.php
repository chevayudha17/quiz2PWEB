<?php 
session_start();

if(!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require "bR.php";
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $name." | ".$NIM  ?></title>
  <style>
    .container{
      display: flex;
      flex-wrap: wrap;
      width: 100%;
      justify-content: space-around;
    }
    .class{
      width: 400px;
      height: 400px;
      border: 1px solid black;
      box-shadow: 3px 3px #888888;
      margin-top: 20px;
    }
    .identity{
      border: 1px solid black;
      box-shadow: 3px 3px #888888;
      padding: 20px;
    }
  </style>
</head>
<body>
<a href="logout.php">keluar</a>

  <table class="identity">
    <tr>
      <td>Nama</td>
      <td>: <?=$name?></td>
    </tr>
    <tr>
      <td>NIM</td>
      <td>: <?=$NIM?></td>
    </tr>
    <tr>
      <td>Kelas</td>
      <td>:  <?=$kelas?></td>
    </tr>
  </table><br><br>

  <div class="container">
    <!-- Cube -->
    <div class="class">
      <center><H1>Cube</H1></center>
      <center>
        <form action="" method="GET">
          <table>
            <tr>
              <td>side</td>
              <td><input type="text" name="side"></td>
            </tr>
          </table><br>
          <button type="submit" name="countLargeCube">Count Large</button>
          <br>
          <button type="submit" name="countVolumeCube">Count Volume</button>
        </form>
      </center>

      <?php
        if(isset($_GET["countLargeCube"])){
          $side = $_GET["side"];
          $Cube1 = new Cube($side);
          $result = $Cube1->getLarge(); ?>
          <center>
            <h1>Large = <?php echo $result ?></h1>
          </center>
          

          
        <?php }
        if(isset($_GET["countVolumeCube"])){
          $side = $_GET["side"];
          $Cube1 = new Cube($side);
          $result = $Cube1->getVolume(); ?>
          <center>
            <h1>Volume = <?php echo $result ?></h1>
          </center>

        <?php }
      ?>
    </div>

    <!-- Ball -->
    <div class="class">
      <center><H1>Ball</H1></center>
      <center>
        <form action="" method="GET">
          <table>
            <tr>
              <td>radius</td>
              <td><input type="text" name="radius"></td>
            </tr>
          </table><br>
          <button type="submit" name="countLargeBall">Count Large</button>
          <br>
          <button type="submit" name="countVolumeBall">Count Volume</button>
        </form>
      </center>

      <?php
        if(isset($_GET["countLargeBall"])){
          $radius = $_GET["radius"];
          $Ball1 = new Ball($radius);
          $result = $Ball1->getLarge(); ?>
          <center>
            <h1>Large = <?php echo $result ?></h1>
          </center>
          
        <?php }
        if(isset($_GET["countVolumeBall"])){
          $radius = $_GET["radius"];
          $Ball1 = new Ball($radius);
          $result = $Ball1->getVolume(); ?>
          <center>
            <h1>Volume = <?php echo $result ?></h1>
          </center>
        <?php }
      ?>
    </div>

  <!-- Beam -->
  <div class="class">
      <center><H1>Beam</H1></center>
      <center>
        <form action="" method="GET">
          <table>
            <tr>
              <td>length</td>
              <td><input type="text" name="length"></td>
            </tr>
            <tr>
              <td>wide</td>
              <td><input type="text" name="wide"></td>
            </tr><tr>
              <td>height</td>
              <td><input type="text" name="height"></td>
            </tr>
            
          </table>
          <br>
          <button type="submit" name="countLargeBeam">Count Large</button>
          <br>
          <button type="submit" name="countVolumeBeam">Count Volume</button>
        </form>
      </center>

      <?php
        if(isset($_GET["countLargeBeam"])){
          $length = $_GET["length"];
          $wide = $_GET["wide"];
          $height = $_GET["height"];

          $Beam1 = new Beam($length,$wide,$height);
          $result = $Beam1->getLarge(); ?>
          <center>
            <h1>Large = <?php echo $result ?></h1>
          </center>
          
        <?php }
        if(isset($_GET["countVolumeBeam"])){
          $length = $_GET["length"];
          $wide = $_GET["wide"];
          $height = $_GET["height"];

          $Beam1 = new Beam($length,$wide,$height);
          $result = $Beam1->getVolume(); ?>
          <center>
            <h1>Large = <?php echo $result ?></h1>
          </center>
        <?php }
      ?>
  
    </div>
  </div>
</body>
</html>
