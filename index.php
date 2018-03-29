<?php

error_reporting(0);

 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>MRI ATTENDANCE</title>

  </head>
  <body>

<div class="container">

<br/><br/>

  <center><h3>Silahkan Pilih Bulan dan Tahun</h3></center>

<br/><br/>

    <form class="form-inline" action="monthly_report.php" method="POST">

      <div class="form-group">
        <label for="email">Bulan :</label>
        <select name="bulan" class="form-control">
          <option value="1">Januari</option>
          <option value="2">Febuari</option>
          <option value="3">Maret</option>
          <option value="4">April</option>
          <option value="5">Mei</option>
          <option value="6">Juni</option>
          <option value="7">Juli</option>
          <option value="8">Agustus</option>
          <option value="9">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select>
      </div>

      <div class="form-group">
        <label for="email">Tahun :</label>
        <select name="tahun" class="form-control">
          <?php
             for($i = 2000 ; $i <= date('Y'); $i++){
                echo "<option>$i</option>";
             }
          ?>
        </select>
      </div>

      <button type="submit" class="btn btn-success" name="submit">Submit</button>

    </form>



</div>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
