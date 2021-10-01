<?php
require '../koneksi.php';
error_reporting(0);
$sql = 'SELECT * FROM waypoint';
$statement = $connection->prepare($sql);
$statement->execute();
$waypoint = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>

<head>
  <title>Tugas Akhir</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

  <!-- framework bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <!-- datepicker bootstrap -->
  <link rel="stylesheet" href="Style/CSS/bootstrap-datepicker.min.css">
  <script src="..\Style/js/bootstrap-datepicker.min.js"></script>
  <script src="..\Style/locales/bootstrap-datepicker.id.min.js"></script>

  <style type="text/css">
    body {
      padding: 0;
      margin: 0;
      font-family: 'Roboto', sans-serif;
    }

    #mapid {
      height: 100vh;
      width: 100%;
      z-index: 1;
    }

    .picker {
      position: absolute;
      height: 65px;
      width: 745px;
      left: 50px;
      top: 10px;
      background-color: white;
      z-index: 2;
      border-style: outset;
      border-radius: 10px;
    }

    .data {
      position: absolute;
      height: 620px;
      width: 780px;
      left: 10px;
      top: 80px;
      background-color: white;
      z-index: 2;
      border-style: outset;
      border-radius: 10px;
      display: block;
      border: 1px solid;
      padding: 5px;
      margin-top: 5px;
      overflow: scroll;
    }

    table {
      border-collapse: collapse;
    }

    table,
    th,
    td {
      border: 1px solid white;
      text-align: center;
    }

    th,
    td {
      padding: 1px;
    }

    th {
      background-color: #2596be;
      color: white;
    }
  </style>

  <script>
    $(function() {
      $("#date").datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        language: 'id'
      });
    });
  </script>

</head>

<body>
  <div class="picker">

    <form action="" method="POST">
      <div class="form-group">

        <label class="control-label col-sm-1">Date:</label>
        <div class="col-sm-4">
          <input name="tanggal" type="text" class="form-control" id="date">
        </div>

        <label class="control-label col-sm-1">Time:</label>
        <div class="col-sm-2">
          <input name="jam" type="text" class="form-control">
        </div>

        <button name="cari" class="col-sm-3"><a href="mapsnya.php">Enter</a></button>
      </div>
    </form>

    <?php
    $query = $_POST['tanggal'];
    $query2 = $_POST['jam'];
    ?>

  </div>
  <div class="data">
    <form>
      <div class="form-group">
        <table border="1">

          <tr>
            <th rowspan="3">Titik</th>
            <th rowspan="3">Date</th>
            <th rowspan="3">Time</th>
            <th rowspan="3">Status</th>
            <th colspan="3">Wind</th>
            <th colspan="3">Wave</th>
          </tr>
          <tr>
            <th rowspan="2">Actual</th>
            <th colspan="2">Prediction</th>
            <th rowspan="2">Actual</th>
            <th colspan="2">Prediction</th>
          </tr>
          <tr>
            <th>Neural Network</th>
            <th>Regresi Polinomial</th>
            <th>Neural Network</th>
            <th>Regresi Polinomial</th>
          </tr>

          <?php
          if ($query != '' && $query2 != '') {
            $titik1 = mysqli_query($conn, "SELECT * FROM titik_1 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik2 = mysqli_query($conn, "SELECT * FROM titik_2 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik3 = mysqli_query($conn, "SELECT * FROM titik_3 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik4 = mysqli_query($conn, "SELECT * FROM titik_4 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik5 = mysqli_query($conn, "SELECT * FROM titik_5 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik6 = mysqli_query($conn, "SELECT * FROM titik_6 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik7 = mysqli_query($conn, "SELECT * FROM titik_7 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik8 = mysqli_query($conn, "SELECT * FROM titik_8 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik9 = mysqli_query($conn, "SELECT * FROM titik_9 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik10 = mysqli_query($conn, "SELECT * FROM titik_10 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik11 = mysqli_query($conn, "SELECT * FROM titik_11 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik12 = mysqli_query($conn, "SELECT * FROM titik_12 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik13 = mysqli_query($conn, "SELECT * FROM titik_13 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik14 = mysqli_query($conn, "SELECT * FROM titik_14 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik15 = mysqli_query($conn, "SELECT * FROM titik_15 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik16 = mysqli_query($conn, "SELECT * FROM titik_16 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik17 = mysqli_query($conn, "SELECT * FROM titik_17 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik18 = mysqli_query($conn, "SELECT * FROM titik_18 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik19 = mysqli_query($conn, "SELECT * FROM titik_19 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik20 = mysqli_query($conn, "SELECT * FROM titik_20 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik21 = mysqli_query($conn, "SELECT * FROM titik_21 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik22 = mysqli_query($conn, "SELECT * FROM titik_22 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik23 = mysqli_query($conn, "SELECT * FROM titik_23 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik24 = mysqli_query($conn, "SELECT * FROM titik_24 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik25 = mysqli_query($conn, "SELECT * FROM titik_25 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik26 = mysqli_query($conn, "SELECT * FROM titik_26 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik27 = mysqli_query($conn, "SELECT * FROM titik_27 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik28 = mysqli_query($conn, "SELECT * FROM titik_28 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik29 = mysqli_query($conn, "SELECT * FROM titik_29 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik30 = mysqli_query($conn, "SELECT * FROM titik_30 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik31 = mysqli_query($conn, "SELECT * FROM titik_31 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik32 = mysqli_query($conn, "SELECT * FROM titik_32 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik33 = mysqli_query($conn, "SELECT * FROM titik_33 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");

            function regresi_angin($data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $data10, $data11, $data12, $data13, $data14, $data15, $data16, $data17, $data18, $data19, $data20, $data21)
            {
              $x = array_map(function ($x) {
                return $x;
              }, array($data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $data10, $data11, $data12, $data13, $data14, $data15, $data16, $data17, $data18, $data19, $data20, $data21));

              $FA = -0.037754 * $x[0] + 0.036306 * $x[1] + 0.0046599 * $x[2] + 0.0017617 * $x[3] - 0.003521 * $x[4] - 0.006152 * $x[5] + 0.020551 * $x[6] + 0.47205 * $x[7] - 1.0192 * $x[8] + 0.54965 * $x[9] + 0.0059297 * $x[10] - 0.0081909 * $x[11] + 0.021877 * $x[12] - 0.013706 * $x[13] + 0.0093249 * $x[14] + 0.0034893 * $x[15] + 0.00048469 * $x[16] + 0.0013427 * $x[17] - 0.024948 * $x[18] - 0.87174 * $x[19] + 1.8563 * $x[20] + 0.0078701;
              $format_FA = number_format($FA, 2, ",", ".");
              return $format_FA;
            }

            function bpnn_angin($data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $data10, $data11, $data12, $data13, $data14, $data15, $data16, $data17, $data18, $data19, $data20, $data21)
            {
              # Bagian Flow
              $x = array_map(function ($x) {
                return $x / 100;
              }, array($data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $data10, $data11, $data12, $data13, $data14, $data15, $data16, $data17, $data18, $data19, $data20, $data21));

              # bobot
              $iw1 = array_map(function ($iw1) {
                return $iw1;
              }, array(6.971433241, 1.313124995, -3.174959562, 1.754556186, 1.51148089, -4.619521135, -5.413529092, 4.471849548, -5.665788091, -4.792029691, -9.71836654, -0.580158031, -4.336821218, 2.139337662, -9.111795132, 1.308643297, -0.367242208, -1.623370666, -4.651902753, -1.23356641, 2.836891743));
              $iw2 = array_map(function ($iw2) {
                return $iw2;
              }, array(5.188972785, 1.893310526, 9.463923871, -0.451877344, -2.749674165, -5.37087394, -2.963688552, 6.817685989, -4.984527002, -1.299631693, 5.810974333, 4.758233815, 2.148065638, -0.414449699, -6.073047594, -4.692512251, 5.81221847, 7.501273462, -0.803409578, 2.494952857, 5.528716801));
              $iw3 = array_map(function ($iw3) {
                return $iw3;
              }, array(-0.751396271, 4.17827896, 6.03602488, 1.462556927, -4.920084629, 4.734146, 4.825723941, -8.595286609, -7.195849598, 5.941347514, 2.61556191, 0.122747968, -0.021761346, -4.289478001, -3.659968475, 3.224080442, -7.054674223, 6.164562422, -0.488993666, -0.696386006, 7.584438286));
              $iw4 = array_map(function ($iw4) {
                return $iw4;
              }, array(-0.227375494, 3.328661374, -1.412370148, 2.928548575, -0.766140383, -0.905362749, 1.120475577, -6.573468632, 8.655446042, -3.949211875, -0.976935959, 0.385138773, 0.511537075, -3.137597252, 0.460426239, 0.270406165, -4.66959598, 5.382098692, 0.163518895, 10.05380764, -23.27782203));
              $iw5 = array_map(function ($iw5) {
                return $iw5;
              }, array(-3.620723379, -8.194307562, 2.351348847, -1.552151942, -1.201594598, -1.929278796, 9.936806858, -0.108547819, -4.851020517, -4.206816131, -8.414618123, 6.412258797, 2.871539681, 3.725559899, 2.981343224, -1.243122271, 3.325439424, -2.642015964, -2.935471864, 3.938037356, 9.608305916));

              $lw1 = array_map(function ($lw1) {
                return $lw1;
              }, array(-2.578238354, -5.401104503, -0.424262674, -5.451557117, -5.188500123));
              $lw2 = array_map(function ($lw2) {
                return $lw2;
              }, array(2.5652421, 1.572583827, -5.367399033, 5.931050606, -1.72991722));
              $lw3 = array_map(function ($lw3) {
                return $lw3;
              }, array(-2.500010822, 3.812487306, 3.280451564, 6.483907893, -3.682145178));
              $lw4 = array_map(function ($lw4) {
                return $lw4;
              }, array(3.205505753, -0.982356683, -2.931653211, -8.86365287, -2.493056921));
              $lw5 = array_map(function ($lw5) {
                return $lw5;
              }, array(-3.410468672, -5.933171434, -1.200113203, 1.533878176, 5.983939645));
              $lw6 = array_map(function ($lw6) {
                return $lw6;
              }, array(-3.500411219, 5.531872797, -5.156868118, -0.708217277, -4.745088565));
              $lw7 = array_map(function ($lw7) {
                return $lw7;
              }, array(-5.432314057, -5.754145134, -4.205538584, 0.270457549, -2.441928721));
              $lw8 = array_map(function ($lw8) {
                return $lw8;
              }, array(-1.140617557, 0.783196009, -6.171188328, 15.91572085, -0.865038768));
              $lw9 = array_map(function ($lw9) {
                return $lw9;
              }, array(-3.917372917, -3.119679675, 2.238364209, 1.963033658, -0.684957631));
              $lw10 = array_map(function ($lw10) {
                return $lw10;
              }, array(-3.944344557, -4.005619081, -0.722160547, -3.341871489, -6.990141531));
              $lw11 = array_map(function ($lw11) {
                return $lw11;
              }, array(1.325480839, 0.107388041, 1.980245825, -4.871770866, 5.974634287));
              $lw12 = array_map(function ($lw12) {
                return $lw12;
              }, array(-0.071644692, -3.933964863, 2.288606547, -3.242119527, -7.733374053));
              $lw13 = array_map(function ($lw13) {
                return $lw13;
              }, array(5.735685893, -3.463520892, 4.060919541, 1.378521538, -3.141333929));
              $lw14 = array_map(function ($lw14) {
                return $lw14;
              }, array(5.370867752, -5.363958839, 0.080388584, -4.902944211, -1.378537117));
              $lw15 = array_map(function ($lw15) {
                return $lw15;
              }, array(-1.00131733, -5.487354757, -4.673683015, -0.555953687, -5.111228271));

              $LW1 = array_map(function ($LW1) {
                return $LW1;
              }, array(-1.025086768, -0.278166342, 1.436727389, 1.919004656, 1.309996505, 0.165173928, -2.137738647, -9.323904211, 0.532000812, -0.634391295, 2.708118778, 0.511635719, -0.466306302, 2.060449764, -1.017600419));

              # bias sementara
              $b1 = array_map(function ($b1) {
                return $b1;
              }, array(2.298621129, -8.211004688, -0.491088894, -0.290527822, -4.523384157));
              $b2  = array_map(function ($b2) {
                return $b2;
              }, array(14.33533399, -8.209244665, -1.97676336, 2.376049314, 2.848910547, 4.99992924, 10.32725535, -4.728771391, -0.624985614, 8.19153291, -1.027953227, 4.019166803, -1.675178685, 8.574935919, 5.829420579));
              $b3  = array_map(function ($b3) {
                return $b3;
              }, array(-4.001581809));

              #forward propagation
              $a1 = $iw1[0] * $x[0] + $iw1[1] * $x[1] + $iw1[2] * $x[2] + $iw1[3] * $x[3] + $iw1[4] * $x[4] + $iw1[5] * $x[5] + $iw1[6] * $x[6] + $iw1[7] * $x[7] + $iw1[8] * $x[8] + $iw1[9] * $x[9] + $iw1[10] * $x[10] + $iw1[11] * $x[11] + $iw1[12] * $x[12] + $iw1[13] * $x[13] + $iw1[14] * $x[14] + $iw1[15] * $x[15] + $iw1[16] * $x[16] + $iw1[17] * $x[17] + $iw1[18] * $x[18] + $iw1[19] * $x[19] + $iw1[20] * $x[20] + $b1[0];
              $a2 = $iw2[0] * $x[0] + $iw2[1] * $x[1] + $iw2[2] * $x[2] + $iw2[3] * $x[3] + $iw2[4] * $x[4] + $iw2[5] * $x[5] + $iw2[6] * $x[6] + $iw2[7] * $x[7] + $iw2[8] * $x[8] + $iw2[9] * $x[9] + $iw2[10] * $x[10] + $iw2[11] * $x[11] + $iw2[12] * $x[12] + $iw2[13] * $x[13] + $iw2[14] * $x[14] + $iw2[15] * $x[15] + $iw2[16] * $x[16] + $iw2[17] * $x[17] + $iw2[18] * $x[18] + $iw2[19] * $x[19] + $iw2[20] * $x[20] + $b1[1];
              $a3 = $iw3[0] * $x[0] + $iw3[1] * $x[1] + $iw3[2] * $x[2] + $iw3[3] * $x[3] + $iw3[4] * $x[4] + $iw3[5] * $x[5] + $iw3[6] * $x[6] + $iw3[7] * $x[7] + $iw3[8] * $x[8] + $iw3[9] * $x[9] + $iw3[10] * $x[10] + $iw3[11] * $x[11] + $iw3[12] * $x[12] + $iw3[13] * $x[13] + $iw3[14] * $x[14] + $iw3[15] * $x[15] + $iw3[16] * $x[16] + $iw3[17] * $x[17] + $iw3[18] * $x[18] + $iw3[19] * $x[19] + $iw3[20] * $x[20] + $b1[2];
              $a4 = $iw4[0] * $x[0] + $iw4[1] * $x[1] + $iw4[2] * $x[2] + $iw4[3] * $x[3] + $iw4[4] * $x[4] + $iw4[5] * $x[5] + $iw4[6] * $x[6] + $iw4[7] * $x[7] + $iw4[8] * $x[8] + $iw4[9] * $x[9] + $iw4[10] * $x[10] + $iw4[11] * $x[11] + $iw4[12] * $x[12] + $iw4[13] * $x[13] + $iw4[14] * $x[14] + $iw4[15] * $x[15] + $iw4[16] * $x[16] + $iw4[17] * $x[17] + $iw4[18] * $x[18] + $iw4[19] * $x[19] + $iw4[20] * $x[20] + $b1[3];
              $a5 = $iw5[0] * $x[0] + $iw5[1] * $x[1] + $iw5[2] * $x[2] + $iw5[3] * $x[3] + $iw5[4] * $x[4] + $iw5[5] * $x[5] + $iw5[6] * $x[6] + $iw5[7] * $x[7] + $iw5[8] * $x[8] + $iw5[9] * $x[9] + $iw5[10] * $x[10] + $iw5[11] * $x[11] + $iw5[12] * $x[12] + $iw5[13] * $x[13] + $iw5[14] * $x[14] + $iw5[15] * $x[15] + $iw5[16] * $x[16] + $iw5[17] * $x[17] + $iw5[18] * $x[18] + $iw5[19] * $x[19] + $iw5[20] * $x[20] + $b1[4];

              $A1 = 1 / (1 + exp(-1 * $a1));
              $A2 = 1 / (1 + exp(-1 * $a2));
              $A3 = 1 / (1 + exp(-1 * $a3));
              $A4 = 1 / (1 + exp(-1 * $a4));
              $A5 = 1 / (1 + exp(-1 * $a5));

              $a_1 = $lw1[0] * $A1 + $lw1[1] * $A2 + $lw1[2] * $A3 + $lw1[3] * $A4 + $lw1[4] * $A5 + $b2[0];
              $a_2 = $lw2[0] * $A1 + $lw2[1] * $A2 + $lw2[2] * $A3 + $lw2[3] * $A4 + $lw2[4] * $A5 + $b2[1];
              $a_3 = $lw3[0] * $A1 + $lw3[1] * $A2 + $lw3[2] * $A3 + $lw3[3] * $A4 + $lw3[4] * $A5 + $b2[2];
              $a_4 = $lw4[0] * $A1 + $lw4[1] * $A2 + $lw4[2] * $A3 + $lw4[3] * $A4 + $lw4[4] * $A5 + $b2[3];
              $a_5 = $lw5[0] * $A1 + $lw5[1] * $A2 + $lw5[2] * $A3 + $lw5[3] * $A4 + $lw5[4] * $A5 + $b2[4];
              $a_6 = $lw6[0] * $A1 + $lw6[1] * $A2 + $lw6[2] * $A3 + $lw6[3] * $A4 + $lw6[4] * $A5 + $b2[5];
              $a_7 = $lw7[0] * $A1 + $lw7[1] * $A2 + $lw7[2] * $A3 + $lw7[3] * $A4 + $lw7[4] * $A5 + $b2[6];
              $a_8 = $lw8[0] * $A1 + $lw8[1] * $A2 + $lw8[2] * $A3 + $lw8[3] * $A4 + $lw8[4] * $A5 + $b2[7];
              $a_9 = $lw9[0] * $A1 + $lw9[1] * $A2 + $lw9[2] * $A3 + $lw9[3] * $A4 + $lw9[4] * $A5 + $b2[8];
              $a_10 = $lw10[0] * $A1 + $lw10[1] * $A2 + $lw10[2] * $A3 + $lw10[3] * $A4 + $lw10[4] * $A5 + $b2[9];
              $a_11 = $lw11[0] * $A1 + $lw11[1] * $A2 + $lw11[2] * $A3 + $lw11[3] * $A4 + $lw11[4] * $A5 + $b2[10];
              $a_12 = $lw12[0] * $A1 + $lw12[1] * $A2 + $lw12[2] * $A3 + $lw12[3] * $A4 + $lw12[4] * $A5 + $b2[11];
              $a_13 = $lw13[0] * $A1 + $lw13[1] * $A2 + $lw13[2] * $A3 + $lw13[3] * $A4 + $lw13[4] * $A5 + $b2[12];
              $a_14 = $lw14[0] * $A1 + $lw14[1] * $A2 + $lw14[2] * $A3 + $lw14[3] * $A4 + $lw14[4] * $A5 + $b2[13];
              $a_15 = $lw15[0] * $A1 + $lw15[1] * $A2 + $lw15[2] * $A3 + $lw15[3] * $A4 + $lw15[4] * $A5 + $b2[14];

              $A_1 = 1 / (1 + exp(-1 * $a_1));
              $A_2 = 1 / (1 + exp(-1 * $a_2));
              $A_3 = 1 / (1 + exp(-1 * $a_3));
              $A_4 = 1 / (1 + exp(-1 * $a_4));
              $A_5 = 1 / (1 + exp(-1 * $a_5));
              $A_6 = 1 / (1 + exp(-1 * $a_6));
              $A_7 = 1 / (1 + exp(-1 * $a_7));
              $A_8 = 1 / (1 + exp(-1 * $a_8));
              $A_9 = 1 / (1 + exp(-1 * $a_9));
              $A_10 = 1 / (1 + exp(-1 * $a_10));
              $A_11 = 1 / (1 + exp(-1 * $a_11));
              $A_12 = 1 / (1 + exp(-1 * $a_12));
              $A_13 = 1 / (1 + exp(-1 * $a_13));
              $A_14 = 1 / (1 + exp(-1 * $a_14));
              $A_15 = 1 / (1 + exp(-1 * $a_15));

              $z1 = $LW1[0] * $A_1 + $LW1[1] * $A_2 + $LW1[2] * $A_3 + $LW1[3] * $A_4 + $LW1[4] * $A_5 + $LW1[5] * $A_6 + $LW1[6] * $A_7 + $LW1[7] * $A_8 + $LW1[8] * $A_9 + $LW1[9] * $A_10 + $LW1[10] * $A_11 + $LW1[11] * $A_12 + $LW1[12] * $A_13 + $LW1[13] * $A_14 + $LW1[14] * $A_15 + $b3[0];
              $Y1 = (1 / (1 + exp(-1 * $z1))) * 100;
              $format_Z1 = number_format($Y1, 2, ",", ".");
              return $format_Z1;
            }

            function regresi_gelombang($data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $data10, $data11, $data12, $data13, $data14, $data15, $data16, $data17, $data18, $data19, $data20, $data21)
            {
              $x = array_map(function ($x) {
                return $x;
              }, array($data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $data10, $data11, $data12, $data13, $data14, $data15, $data16, $data17, $data18, $data19, $data20, $data21));

              $FY = -0.055193 * $x[0] + 0.04061 * $x[1] + 0.071044 * $x[2] - 0.02262 * $x[3] - 0.040929 * $x[4] - 0.035091 * $x[5] - 0.013516 * $x[6] + 0.046139 * $x[7] + 0.1028 * $x[8] - 0.03882 * $x[9] - 0.052768 * $x[10] - 0.034738 * $x[11] - 0.011196 * $x[12] + 0.045396 * $x[13] + 0.073354 * $x[14] - 0.037074 * $x[15] - 0.066943 * $x[16] - 0.11601 * $x[17] - 0.18904 * $x[18] - 0.049974 * $x[19] + 1.3841 * $x[20] + 0.00020185;
              $format_FY = number_format($FY, 2, ",", ".");
              return $format_FY;
            }

            function bpnn_gelombang($data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $data10, $data11, $data12, $data13, $data14, $data15, $data16, $data17, $data18, $data19, $data20, $data21)
            {
              $x = array_map(function ($x) {
                return $x / 100;
              }, array(
                $data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $data10, $data11, $data12, $data13, $data14, $data15, $data16, $data17, $data18, $data19, $data20, $data21
              ));

              # bobot
              $iw1 = array_map(function ($iw1) {
                return $iw1;
              }, array(32.62734113, -5.581189779, 19.58874993, -31.72052627, -22.71414019, 33.34162281, 24.11531857, 0.433578358, -12.135388, -7.539223135, -6.808818039, 22.76009563, -10.19609852, 36.41949992, -26.70793838, -32.08617877, 20.76090703, -10.0326253, -31.30275151, -23.70933923, -1.565318821));
              $iw2 = array_map(function ($iw2) {
                return $iw2;
              }, array(3.878245777, -12.48132411, 2.753668542, -15.31969224, -44.80793782, 13.53994142, 9.1524963, 40.04116467, -21.56839095, 24.0286652, -43.03743595, 5.6822314, -16.2108222, -11.87810246, 31.56738401, 5.593927708, 13.18116913, 36.61018571, 18.01110709, -7.630647474, -12.88890779));
              $iw3 = array_map(function ($iw3) {
                return $iw3;
              }, array(
                27.9891353, 31.49702203, -22.3441248, -29.90822007, 33.84011754, 28.67380791, -19.52280251, -33.11479944, -23.30023284, -6.730720099, -14.94869167, 20.33799975, 25.18013025, 16.51275041, 1.229694627, 30.82327703, 24.97162077, 3.921798857, 11.34059601, 15.67902937, -1.20014801
              ));
              $iw4 = array_map(function ($iw4) {
                return $iw4;
              }, array(
                17.67822367, 33.49585762, -30.15226758, 25.72723371, 16.47629331, 21.68202593, -18.93479462, 6.212456524, -20.91207005, 20.23658278, -12.13504282, 31.78535864, 13.7555686, 25.72136824, -9.693629488, -32.47579556, 26.73281821, 12.30322575, 4.322541283, 32.02666898, -25.58390551
              ));
              $iw5 = array_map(function ($iw5) {
                return $iw5;
              }, array(-33.18522118, -25.08958316, -6.3435059, -29.47968957, 4.034000268, -20.30765628, -15.27922985, -6.515951989, 10.44221675, -20.28938889, -40.00544614, -31.33706363, 13.77858768, -40.46150507, -19.0481864, 22.15875394, 12.9570222, -18.13131997, 19.19098116, -21.77434819, 15.67628007));
              $iw6 = array_map(function ($iw6) {
                return $iw6;
              }, array(-8.25259046, 40.65301086, -17.94804819, 27.78091388, 33.95934262, -9.455563384, 19.6620246, 33.85703029, 13.1030684, -19.11793234, -5.975350382, -34.03210478, 1.98859645, 18.84142717, 7.727699705, 37.0472552, -6.288100804, -6.884155913, 20.87812243, 25.62288641, 20.47972262));
              $iw7 = array_map(function ($iw7) {
                return $iw7;
              }, array(-35.45178615, 38.31917697, -17.09612762, -15.89531766, -27.35784297, -32.01005608, -2.915505008, -10.07352368, 31.52426692, -30.77047146, -8.648821937, 6.76544832, 29.59818422, 15.76462943, 8.13457827, 26.44349338, -6.025010942, 5.110739235, -36.39056913, 11.51266788, -9.447432127));
              $iw8 = array_map(function ($iw8) {
                return $iw8;
              }, array(-29.16260102, -18.58325129, -4.00505959, -4.178200568, -7.8328212, 24.73889378, -18.79497795, -39.139803, 25.94270011, 5.816092368, 23.24393633, 30.31434994, -28.47793549, 5.131760262, -25.27934145, 28.83696406, -3.189719072, 26.60597255, 11.22301374, -35.70280513, 18.21901969));
              $iw9 = array_map(function ($iw9) {
                return $iw9;
              }, array(-33.49186051, -29.37038657, -15.65122577, 13.64469162, -20.87221795, 34.13343918, -10.58494523, -2.817420312, -34.91905791, 6.809927008, -11.20713889, -4.789671871, -5.018084272, 8.728287789, 23.84222925, -36.23735075, -6.140186489, -31.79683194, -26.98294012, 26.66571722, 26.26995964));
              $iw10 = array_map(function ($iw10) {
                return $iw10;
              }, array(6.146180352, -9.73222365, 17.66906986, 33.14855941, 27.53384827, -0.521509373, -21.27362786, 17.46523315, -22.83886606, -19.2982268, -9.452904997, 8.065702482, -32.84109776, 34.26918383, -19.45155298, -9.079413311, -18.31656665, 41.80446362, 19.86962555, 12.16787506, 35.55926916));
              $iw11 = array_map(function ($iw11) {
                return $iw11;
              }, array(-25.36826656, 12.42320324, 33.42299033, -15.74406846, -10.14751939, -35.2610813, -17.65256355, -33.75585199, 21.04687185, -9.015802977, -30.57501553, 30.42292391, -28.69641576, 21.39308687, -12.24101863, 11.99858186, 22.43384778, -22.47655903, -15.61811711, -14.89765708, -17.8599371));
              $iw12 = array_map(function ($iw12) {
                return $iw12;
              }, array(-31.64773636, -8.415894647, 15.92641776, -19.19156485, -11.16839131, 27.67147816, -31.65991113, -30.24804589, -7.231763583, -7.239289312, 21.24780954, -23.71806544, -6.853407396, 17.97122496, -27.94003851, -26.34838891, -34.9280869, 32.98784219, 22.68995797, 20.17920069, 3.768188619));
              $iw13 = array_map(function ($iw13) {
                return $iw13;
              }, array(-7.477815924, 19.5374088, -27.72994404, 2.938291238, 18.49342658, 34.97364212, 10.58172082, -16.11532367, -30.08485134, 18.36935973, -1.649090052, 31.93264657, -9.736812467, -33.21981939, -18.7446476, 34.05410076, 26.57328882, 35.43721185, 17.78435112, 12.71049665, 12.06795483));
              $iw14 = array_map(function ($iw14) {
                return $iw14;
              }, array(-2.741111103, -6.133060381, -2.563517036, -11.5209627, 19.78684161, 12.09299447, 37.2890198, 25.2439588, -14.26858229, -6.612903606, -43.78528364, 6.330131598, -14.19842494, 47.50200505, -35.63307252, 27.79036349, -7.729854345, 25.67410094, 13.77569504, -1.16542471, 18.65223092));
              $iw15 = array_map(function ($iw15) {
                return $iw15;
              }, array(-23.6324993, 6.037078264, 6.643620657, -31.89215052, 7.374943913, -3.568362532, 20.98823486, -30.44191656, 21.93284459, 31.56908072, 16.2213612, 7.428946051, 18.7897329, -22.81005237, 19.20957215, -7.000228763, -23.75738917, -4.006459968, 33.38524374, 38.5506968, 36.77326226));
              $iw16 = array_map(function ($iw16) {
                return $iw16;
              }, array(-28.18617251, -16.55528849, 3.868955621, 32.64886614, -18.22049222, 3.377704937, 34.16545516, -44.03544911, 13.72668673, 0.024160382, 38.03595126, 19.50792491, -17.17241321, 23.75791587, 2.176097821, -10.8837795, 3.048346888, 35.09272658, 21.06990432, 19.32919042, -7.497945612));
              $iw17 = array_map(function ($iw17) {
                return $iw17;
              }, array(19.43257377, 2.532346807, -30.27745995, -5.358769557, -5.09869271, -9.001804689, 31.71988957, 31.50153519, -34.23855848, 28.99575936, -2.38690482, 28.89034012, -13.16506561, 34.40690138, -28.80303361, -13.12008618, -22.9343372, 17.76418761, 13.12454307, -26.54230976, 18.64175102));
              $iw18 = array_map(function ($iw18) {
                return $iw18;
              }, array(7.812640859, 23.664132, 6.824019176, -26.30692357, -19.53235604, 28.30292948, -14.89941065, 23.49831292, -25.47199916, -36.22631709, 11.90366894, 28.47818011, -33.24448535, -25.31992122, 5.356448412, -17.51570505, 9.381468952, -24.44331661, -5.06943425, 28.09830284, -30.00041332));
              $iw19 = array_map(function ($iw19) {
                return $iw19;
              }, array(34.01439676, -30.50003389, 6.026596328, -6.944735082, -16.78618826, 37.75835544, -28.66197551, -3.202842547, 18.60815722, -21.21086905, 31.9292576, -30.14698896, -25.59091604, -28.60538439, 12.1849687, 8.396736487, -15.78590049, 28.46539557, 21.87969484, -0.49631933, 6.83903198));
              $iw20 = array_map(function ($iw20) {
                return $iw20;
              }, array(7.854780295, 11.24054785, 18.0245128, -4.579476137, -7.087170241, 24.95049116, -29.29325037, 35.41037206, -11.81065621, 18.42018629, -23.14094389, -18.11435103, 22.41876778, -13.41207412, 31.44052122, -28.7259089, 28.21362772, -24.25203088, -8.535222985, 35.58681929, -28.84769002));

              $LW1 = array_map(function ($LW1) {
                return $LW1;
              }, array(-0.038284467, -0.013686567, 0.008520207, -0.009506364, -0.001863527, -0.000514632, 0.005388793, -0.01061814, 0.007036633, 0.009547987, 0.000787497, -0.011445666, -0.008587172, 0.002874326, 0.018610429, -0.018848232, 0.021236505, -0.012539132, 0.0426464, -0.016000941));

              # bias sementara
              $b1 = array_map(function ($b1) {
                return $b1;
              }, array(-1.145758511, -1.824931747, -3.03423399, -3.014671846, 4.111867052, -2.048079866, 1.673888526, 1.255203134, 2.295248577, -1.234819417, 1.704281291, 2.247895597, -2.56670212, -1.939559263, -2.537890033, -2.669632556, 0.621360919, 2.561483747, 1.617268852, 1.146566182));
              $b2  = array_map(function ($b2) {
                return $b2;
              }, array(-0.059896859));

              #forward propagation
              $a1 = $iw1[0] * $x[0] + $iw1[1] * $x[1] + $iw1[2] * $x[2] + $iw1[3] * $x[3] + $iw1[4] * $x[4] + $iw1[5] * $x[5] + $iw1[6] * $x[6] + $iw1[7] * $x[7] + $iw1[8] * $x[8] + $iw1[9] * $x[9] + $iw1[10] * $x[10] + $iw1[11] * $x[11] + $iw1[12] * $x[12] + $iw1[13] * $x[13] + $iw1[14] * $x[14] + $iw1[15] * $x[15] + $iw1[16] * $x[16] + $iw1[17] * $x[17] + $iw1[18] * $x[18] + $iw1[19] * $x[19] + $iw1[20] * $x[20] + $b1[0];
              $a2 = $iw2[0] * $x[0] + $iw2[1] * $x[1] + $iw2[2] * $x[2] + $iw2[3] * $x[3] + $iw2[4] * $x[4] + $iw2[5] * $x[5] + $iw2[6] * $x[6] + $iw2[7] * $x[7] + $iw2[8] * $x[8] + $iw2[9] * $x[9] + $iw2[10] * $x[10] + $iw2[11] * $x[11] + $iw2[12] * $x[12] + $iw2[13] * $x[13] + $iw2[14] * $x[14] + $iw2[15] * $x[15] + $iw2[16] * $x[16] + $iw2[17] * $x[17] + $iw2[18] * $x[18] + $iw2[19] * $x[19] + $iw2[20] * $x[20] + $b1[1];
              $a3 = $iw3[0] * $x[0] + $iw3[1] * $x[1] + $iw3[2] * $x[2] + $iw3[3] * $x[3] + $iw3[4] * $x[4] + $iw3[5] * $x[5] + $iw3[6] * $x[6] + $iw3[7] * $x[7] + $iw3[8] * $x[8] + $iw3[9] * $x[9] + $iw3[10] * $x[10] + $iw3[11] * $x[11] + $iw3[12] * $x[12] + $iw3[13] * $x[13] + $iw3[14] * $x[14] + $iw3[15] * $x[15] + $iw3[16] * $x[16] + $iw3[17] * $x[17] + $iw3[18] * $x[18] + $iw3[19] * $x[19] + $iw3[20] * $x[20] + $b1[2];
              $a4 = $iw4[0] * $x[0] + $iw4[1] * $x[1] + $iw4[2] * $x[2] + $iw4[3] * $x[3] + $iw4[4] * $x[4] + $iw4[5] * $x[5] + $iw4[6] * $x[6] + $iw4[7] * $x[7] + $iw4[8] * $x[8] + $iw4[9] * $x[9] + $iw4[10] * $x[10] + $iw4[11] * $x[11] + $iw4[12] * $x[12] + $iw4[13] * $x[13] + $iw4[14] * $x[14] + $iw4[15] * $x[15] + $iw4[16] * $x[16] + $iw4[17] * $x[17] + $iw4[18] * $x[18] + $iw4[19] * $x[19] + $iw4[20] * $x[20] + $b1[3];
              $a5 = $iw5[0] * $x[0] + $iw5[1] * $x[1] + $iw5[2] * $x[2] + $iw5[3] * $x[3] + $iw5[4] * $x[4] + $iw5[5] * $x[5] + $iw5[6] * $x[6] + $iw5[7] * $x[7] + $iw5[8] * $x[8] + $iw5[9] * $x[9] + $iw5[10] * $x[10] + $iw5[11] * $x[11] + $iw5[12] * $x[12] + $iw5[13] * $x[13] + $iw5[14] * $x[14] + $iw5[15] * $x[15] + $iw5[16] * $x[16] + $iw5[17] * $x[17] + $iw5[18] * $x[18] + $iw5[19] * $x[19] + $iw5[20] * $x[20] + $b1[4];
              $a6 = $iw6[0] * $x[0] + $iw6[1] * $x[1] + $iw6[2] * $x[2] + $iw6[3] * $x[3] + $iw6[4] * $x[4] + $iw6[5] * $x[5] + $iw6[6] * $x[6] + $iw6[7] * $x[7] + $iw6[8] * $x[8] + $iw6[9] * $x[9] + $iw6[10] * $x[10] + $iw6[11] * $x[11] + $iw6[12] * $x[12] + $iw6[13] * $x[13] + $iw6[14] * $x[14] + $iw6[15] * $x[15] + $iw6[16] * $x[16] + $iw6[17] * $x[17] + $iw6[18] * $x[18] + $iw6[19] * $x[19] + $iw6[20] * $x[20] + $b1[5];
              $a7 = $iw7[0] * $x[0] + $iw7[1] * $x[1] + $iw7[2] * $x[2] + $iw7[3] * $x[3] + $iw7[4] * $x[4] + $iw7[5] * $x[5] + $iw7[6] * $x[6] + $iw7[7] * $x[7] + $iw7[8] * $x[8] + $iw7[9] * $x[9] + $iw7[10] * $x[10] + $iw7[11] * $x[11] + $iw7[12] * $x[12] + $iw7[13] * $x[13] + $iw7[14] * $x[14] + $iw7[15] * $x[15] + $iw7[16] * $x[16] + $iw7[17] * $x[17] + $iw7[18] * $x[18] + $iw7[19] * $x[19] + $iw7[20] * $x[20] + $b1[6];
              $a8 = $iw8[0] * $x[0] + $iw8[1] * $x[1] + $iw8[2] * $x[2] + $iw8[3] * $x[3] + $iw8[4] * $x[4] + $iw8[5] * $x[5] + $iw8[6] * $x[6] + $iw8[7] * $x[7] + $iw8[8] * $x[8] + $iw8[9] * $x[9] + $iw8[10] * $x[10] + $iw8[11] * $x[11] + $iw8[12] * $x[12] + $iw8[13] * $x[13] + $iw8[14] * $x[14] + $iw8[15] * $x[15] + $iw8[16] * $x[16] + $iw8[17] * $x[17] + $iw8[18] * $x[18] + $iw8[19] * $x[19] + $iw8[20] * $x[20] + $b1[7];
              $a9 = $iw9[0] * $x[0] + $iw9[1] * $x[1] + $iw9[2] * $x[2] + $iw9[3] * $x[3] + $iw9[4] * $x[4] + $iw9[5] * $x[5] + $iw9[6] * $x[6] + $iw9[7] * $x[7] + $iw9[8] * $x[8] + $iw9[9] * $x[9] + $iw9[10] * $x[10] + $iw9[11] * $x[11] + $iw9[12] * $x[12] + $iw9[13] * $x[13] + $iw9[14] * $x[14] + $iw9[15] * $x[15] + $iw9[16] * $x[16] + $iw9[17] * $x[17] + $iw9[18] * $x[18] + $iw9[19] * $x[19] + $iw9[20] * $x[20] + $b1[8];
              $a10 = $iw10[0] * $x[0] + $iw10[1] * $x[1] + $iw10[2] * $x[2] + $iw10[3] * $x[3] + $iw10[4] * $x[4] + $iw10[5] * $x[5] + $iw10[6] * $x[6] + $iw10[7] * $x[7] + $iw10[8] * $x[8] + $iw10[9] * $x[9] + $iw10[10] * $x[10] + $iw10[11] * $x[11] + $iw10[12] * $x[12] + $iw10[13] * $x[13] + $iw10[14] * $x[14] + $iw10[15] * $x[15] + $iw10[16] * $x[16] + $iw10[17] * $x[17] + $iw10[18] * $x[18] + $iw10[19] * $x[19] + $iw10[20] * $x[20] + $b1[9];
              $a11 = $iw11[0] * $x[0] + $iw11[1] * $x[1] + $iw11[2] * $x[2] + $iw11[3] * $x[3] + $iw11[4] * $x[4] + $iw11[5] * $x[5] + $iw11[6] * $x[6] + $iw11[7] * $x[7] + $iw11[8] * $x[8] + $iw11[9] * $x[9] + $iw11[10] * $x[10] + $iw11[11] * $x[11] + $iw11[12] * $x[12] + $iw11[13] * $x[13] + $iw11[14] * $x[14] + $iw11[15] * $x[15] + $iw11[16] * $x[16] + $iw11[17] * $x[17] + $iw11[18] * $x[18] + $iw11[19] * $x[19] + $iw11[20] * $x[20] + $b1[10];
              $a12 = $iw12[0] * $x[0] + $iw12[1] * $x[1] + $iw12[2] * $x[2] + $iw12[3] * $x[3] + $iw12[4] * $x[4] + $iw12[5] * $x[5] + $iw12[6] * $x[6] + $iw12[7] * $x[7] + $iw12[8] * $x[8] + $iw12[9] * $x[9] + $iw12[10] * $x[10] + $iw12[11] * $x[11] + $iw12[12] * $x[12] + $iw12[13] * $x[13] + $iw12[14] * $x[14] + $iw12[15] * $x[15] + $iw12[16] * $x[16] + $iw12[17] * $x[17] + $iw12[18] * $x[18] + $iw12[19] * $x[19] + $iw12[20] * $x[20] + $b1[11];
              $a13 = $iw13[0] * $x[0] + $iw13[1] * $x[1] + $iw13[2] * $x[2] + $iw13[3] * $x[3] + $iw13[4] * $x[4] + $iw13[5] * $x[5] + $iw13[6] * $x[6] + $iw13[7] * $x[7] + $iw13[8] * $x[8] + $iw13[9] * $x[9] + $iw13[10] * $x[10] + $iw13[11] * $x[11] + $iw13[12] * $x[12] + $iw13[13] * $x[13] + $iw13[14] * $x[14] + $iw13[15] * $x[15] + $iw13[16] * $x[16] + $iw13[17] * $x[17] + $iw13[18] * $x[18] + $iw13[19] * $x[19] + $iw13[20] * $x[20] + $b1[12];
              $a14 = $iw14[0] * $x[0] + $iw14[1] * $x[1] + $iw14[2] * $x[2] + $iw14[3] * $x[3] + $iw14[4] * $x[4] + $iw14[5] * $x[5] + $iw14[6] * $x[6] + $iw14[7] * $x[7] + $iw14[8] * $x[8] + $iw14[9] * $x[9] + $iw14[10] * $x[10] + $iw14[11] * $x[11] + $iw14[12] * $x[12] + $iw14[13] * $x[13] + $iw14[14] * $x[14] + $iw14[15] * $x[15] + $iw14[16] * $x[16] + $iw14[17] * $x[17] + $iw14[18] * $x[18] + $iw14[19] * $x[19] + $iw14[20] * $x[20] + $b1[13];
              $a15 = $iw15[0] * $x[0] + $iw15[1] * $x[1] + $iw15[2] * $x[2] + $iw15[3] * $x[3] + $iw15[4] * $x[4] + $iw15[5] * $x[5] + $iw15[6] * $x[6] + $iw15[7] * $x[7] + $iw15[8] * $x[8] + $iw15[9] * $x[9] + $iw15[10] * $x[10] + $iw15[11] * $x[11] + $iw15[12] * $x[12] + $iw15[13] * $x[13] + $iw15[14] * $x[14] + $iw15[15] * $x[15] + $iw15[16] * $x[16] + $iw15[17] * $x[17] + $iw15[18] * $x[18] + $iw15[19] * $x[19] + $iw15[20] * $x[20] + $b1[14];
              $a16 = $iw16[0] * $x[0] + $iw16[1] * $x[1] + $iw16[2] * $x[2] + $iw16[3] * $x[3] + $iw16[4] * $x[4] + $iw16[5] * $x[5] + $iw16[6] * $x[6] + $iw16[7] * $x[7] + $iw16[8] * $x[8] + $iw16[9] * $x[9] + $iw16[10] * $x[10] + $iw16[11] * $x[11] + $iw16[12] * $x[12] + $iw16[13] * $x[13] + $iw16[14] * $x[14] + $iw16[15] * $x[15] + $iw16[16] * $x[16] + $iw16[17] * $x[17] + $iw16[18] * $x[18] + $iw16[19] * $x[19] + $iw16[20] * $x[20] + $b1[15];
              $a17 = $iw17[0] * $x[0] + $iw17[1] * $x[1] + $iw17[2] * $x[2] + $iw17[3] * $x[3] + $iw17[4] * $x[4] + $iw17[5] * $x[5] + $iw17[6] * $x[6] + $iw17[7] * $x[7] + $iw17[8] * $x[8] + $iw17[9] * $x[9] + $iw17[10] * $x[10] + $iw17[11] * $x[11] + $iw17[12] * $x[12] + $iw17[13] * $x[13] + $iw17[14] * $x[14] + $iw17[15] * $x[15] + $iw17[16] * $x[16] + $iw17[17] * $x[17] + $iw17[18] * $x[18] + $iw17[19] * $x[19] + $iw17[20] * $x[20] + $b1[16];
              $a18 = $iw18[0] * $x[0] + $iw18[1] * $x[1] + $iw18[2] * $x[2] + $iw18[3] * $x[3] + $iw18[4] * $x[4] + $iw18[5] * $x[5] + $iw18[6] * $x[6] + $iw18[7] * $x[7] + $iw18[8] * $x[8] + $iw18[9] * $x[9] + $iw18[10] * $x[10] + $iw18[11] * $x[11] + $iw18[12] * $x[12] + $iw18[13] * $x[13] + $iw18[14] * $x[14] + $iw18[15] * $x[15] + $iw18[16] * $x[16] + $iw18[17] * $x[17] + $iw18[18] * $x[18] + $iw18[19] * $x[19] + $iw18[20] * $x[20] + $b1[17];
              $a19 = $iw19[0] * $x[0] + $iw19[1] * $x[1] + $iw19[2] * $x[2] + $iw19[3] * $x[3] + $iw19[4] * $x[4] + $iw19[5] * $x[5] + $iw19[6] * $x[6] + $iw19[7] * $x[7] + $iw19[8] * $x[8] + $iw19[9] * $x[9] + $iw19[10] * $x[10] + $iw19[11] * $x[11] + $iw19[12] * $x[12] + $iw19[13] * $x[13] + $iw19[14] * $x[14] + $iw19[15] * $x[15] + $iw19[16] * $x[16] + $iw19[17] * $x[17] + $iw19[18] * $x[18] + $iw19[19] * $x[19] + $iw19[20] * $x[20] + $b1[18];
              $a20 = $iw20[0] * $x[0] + $iw20[1] * $x[1] + $iw20[2] * $x[2] + $iw20[3] * $x[3] + $iw20[4] * $x[4] + $iw20[5] * $x[5] + $iw20[6] * $x[6] + $iw20[7] * $x[7] + $iw20[8] * $x[8] + $iw20[9] * $x[9] + $iw20[10] * $x[10] + $iw20[11] * $x[11] + $iw20[12] * $x[12] + $iw20[13] * $x[13] + $iw20[14] * $x[14] + $iw20[15] * $x[15] + $iw20[16] * $x[16] + $iw20[17] * $x[17] + $iw20[18] * $x[18] + $iw20[19] * $x[19] + $iw20[20] * $x[20] + $b1[19];

              $A1 = 2 / (1 + exp(-2 * $a1)) - 1;
              $A2 = 2 / (1 + exp(-2 * $a2)) - 1;
              $A3 = 2 / (1 + exp(-2 * $a3)) - 1;
              $A4 = 2 / (1 + exp(-2 * $a4)) - 1;
              $A5 = 2 / (1 + exp(-2 * $a5)) - 1;
              $A6 = 2 / (1 + exp(-2 * $a6)) - 1;
              $A7 = 2 / (1 + exp(-2 * $a7)) - 1;
              $A8 = 2 / (1 + exp(-2 * $a8)) - 1;
              $A9 = 2 / (1 + exp(-2 * $a9)) - 1;
              $A10 = 2 / (1 + exp(-2 * $a10)) - 1;
              $A11 = 2 / (1 + exp(-2 * $a11)) - 1;
              $A12 = 2 / (1 + exp(-2 * $a12)) - 1;
              $A13 = 2 / (1 + exp(-2 * $a13)) - 1;
              $A14 = 2 / (1 + exp(-2 * $a14)) - 1;
              $A15 = 2 / (1 + exp(-2 * $a15)) - 1;
              $A16 = 2 / (1 + exp(-2 * $a16)) - 1;
              $A17 = 2 / (1 + exp(-2 * $a17)) - 1;
              $A18 = 2 / (1 + exp(-2 * $a18)) - 1;
              $A19 = 2 / (1 + exp(-2 * $a19)) - 1;
              $A20 = 2 / (1 + exp(-2 * $a20)) - 1;
              $z2 = $LW1[0] * $A1 + $LW1[1] * $A2 + $LW1[2] * $A3 + $LW1[3] * $A4 + $LW1[4] * $A5 + $LW1[5] * $A6 + $LW1[6] * $A7 + $LW1[7] * $A8 + $LW1[8] * $A9 + $LW1[9] * $A10 + $LW1[10] * $A11 + $LW1[11] * $A12 + $LW1[12] * $A13 + $LW1[13] * $A14 + $LW1[14] * $A15 + $LW1[15] * $A16 + $LW1[16] * $A17 + $LW1[17] * $A18 + $LW1[18] * $A19 + $LW1[19] * $A20 + $b2[0];
              $Y2 = (2 / (1 + exp(-2 * $z2)) - 1) * 100;
              $format_Z2 = number_format($Y2, 2, ",", ".");
              return $format_Z2;
            }

            while ($data = mysqli_fetch_array($titik1)) {
              $bpnn_angin_1 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_1 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_1 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_1 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              if ($bpnn_angin_1 >= 21 or $bpnn_gelombang_1 >= 2.5) {
                $status_1 = "BAHAYA";
              } else {
                $status_1 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik2)) {
              $bpnn_angin_2 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_2 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_2 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_2 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_2 >= 21 or $bpnn_gelombang_2 >= 2.5) {
                $status_2 = "BAHAYA";
              } else {
                $status_2 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik3)) {
              $bpnn_angin_3 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_3 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_3 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_3 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_3 >= 21 or $bpnn_gelombang_3 >= 2.5) {
                $status_3 = "BAHAYA";
              } else {
                $status_3 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik4)) {
              $bpnn_angin_4 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_4 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_4 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_4 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_4 >= 21 or $bpnn_gelombang_4 >= 2.5) {
                $status_4 = "BAHAYA";
              } else {
                $status_4 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik5)) {
              $bpnn_angin_5 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_5 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_5 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_5 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_5 >= 21 or $bpnn_gelombang_5 >= 2.5) {
                $status_5 = "BAHAYA";
              } else {
                $status_5 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik6)) {
              $bpnn_angin_6 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_6 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_6 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_6 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_6 >= 21 or $bpnn_gelombang_6 >= 2.5) {
                $status_6 = "BAHAYA";
              } else {
                $status_6 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik7)) {
              $bpnn_angin_7 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_7 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_7 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_7 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_7 >= 21 or $bpnn_gelombang_7 >= 2.5) {
                $status_7 = "BAHAYA";
              } else {
                $status_7 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik8)) {
              $bpnn_angin_8 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_8 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_8 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_8 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_8 >= 21 or $bpnn_gelombang_8 >= 2.5) {
                $status_8 = "BAHAYA";
              } else {
                $status_8 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik9)) {
              $bpnn_angin_9 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_9 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_9 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_9 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_9 >= 21 or $bpnn_gelombang_9 >= 2.5) {
                $status_9 = "BAHAYA";
              } else {
                $status_9 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik10)) {
              $bpnn_angin_10 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_10 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_10 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_10 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_10 >= 21 or $bpnn_gelombang_10 >= 2.5) {
                $status_10 = "BAHAYA";
              } else {
                $status_10 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik11)) {
              $bpnn_angin_11 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_11 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_11 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_11 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_11 >= 21 or $bpnn_gelombang_11 >= 2.5) {
                $status_11 = "BAHAYA";
              } else {
                $status_11 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik12)) {
              $bpnn_angin_12 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_12 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_12 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_12 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_12 >= 21 or $bpnn_gelombang_12 >= 2.5) {
                $status_12 = "BAHAYA";
              } else {
                $status_12 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik13)) {
              $bpnn_angin_13 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_13 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_13 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_13 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_13 >= 21 or $bpnn_gelombang_13 >= 2.5) {
                $status_13 = "BAHAYA";
              } else {
                $status_13 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik14)) {
              $bpnn_angin_14 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_14 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_14 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_14 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_14 >= 21 or $bpnn_gelombang_14 >= 2.5) {
                $status_14 = "BAHAYA";
              } else {
                $status_14 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik15)) {
              $bpnn_angin_15 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_15 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_15 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_15 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_15 >= 21 or $bpnn_gelombang_15 >= 2.5) {
                $status_15 = "BAHAYA";
              } else {
                $status_15 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik16)) {
              $bpnn_angin_16 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_16 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_16 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_16 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_16 >= 21 or $bpnn_gelombang_16 >= 2.5) {
                $status_16 = "BAHAYA";
              } else {
                $status_16 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik17)) {
              $bpnn_angin_17 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_17 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_17 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_17 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_17 >= 21 or $bpnn_gelombang_17 >= 2.5) {
                $status_17 = "BAHAYA";
              } else {
                $status_17 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik18)) {
              $bpnn_angin_18 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_18 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_18 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_18 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_18 >= 21 or $bpnn_gelombang_18 >= 2.5) {
                $status_18 = "BAHAYA";
              } else {
                $status_18 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik19)) {
              $bpnn_angin_19 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_19 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_19 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_19 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_19 >= 21 or $bpnn_gelombang_19 >= 2.5) {
                $status_19 = "BAHAYA";
              } else {
                $status_19 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik20)) {
              $bpnn_angin_20 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_20 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_20 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_20 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_20 >= 21 or $bpnn_gelombang_20 >= 2.5) {
                $status_20 = "BAHAYA";
              } else {
                $status_20 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik21)) {
              $bpnn_angin_21 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_21 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_21 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_21 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_21 >= 21 or $bpnn_gelombang_21 >= 2.5) {
                $status_21 = "BAHAYA";
              } else {
                $status_21 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik22)) {
              $bpnn_angin_22 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_22 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_22 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_22 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_22 >= 21 or $bpnn_gelombang_22 >= 2.5) {
                $status_22 = "BAHAYA";
              } else {
                $status_22 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik23)) {
              $bpnn_angin_23 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_23 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_23 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_23 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_23 >= 21 or $bpnn_gelombang_23 >= 2.5) {
                $status_23 = "BAHAYA";
              } else {
                $status_23 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik24)) {
              $bpnn_angin_24 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_24 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_24 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_24 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_24 >= 21 or $bpnn_gelombang_24 >= 2.5) {
                $status_24 = "BAHAYA";
              } else {
                $status_24 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik25)) {
              $bpnn_angin_25 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_25 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_25 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_25 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_25 >= 21 or $bpnn_gelombang_25 >= 2.5) {
                $status_25 = "BAHAYA";
              } else {
                $status_25 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik26)) {
              $bpnn_angin_26 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_26 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_26 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_26 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_26 >= 21 or $bpnn_gelombang_26 >= 2.5) {
                $status_26 = "BAHAYA";
              } else {
                $status_26 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik27)) {
              $bpnn_angin_27 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_27 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_27 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_27 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_27 >= 21 or $bpnn_gelombang_27 >= 2.5) {
                $status_27 = "BAHAYA";
              } else {
                $status_27 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik28)) {
              $bpnn_angin_28 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_28 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_28 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_28 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_28 >= 21 or $bpnn_gelombang_28 >= 2.5) {
                $status_28 = "BAHAYA";
              } else {
                $status_28 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik29)) {
              $bpnn_angin_29 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_29 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_29 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_29 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_29 >= 21 or $bpnn_gelombang_29 >= 2.5) {
                $status_29 = "BAHAYA";
              } else {
                $status_29 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik30)) {
              $bpnn_angin_30 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_30 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_30 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_30 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_30 >= 21 or $bpnn_gelombang_30 >= 2.5) {
                $status_30 = "BAHAYA";
              } else {
                $status_30 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik31)) {
              $bpnn_angin_31 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_31 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_31 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_31 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_31 >= 21 or $bpnn_gelombang_31 >= 2.5) {
                $status_31 = "BAHAYA";
              } else {
                $status_31 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik32)) {
              $bpnn_angin_32 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_32 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_32 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_32 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_32 >= 21 or $bpnn_gelombang_32 >= 2.5) {
                $status_32 = "BAHAYA";
              } else {
                $status_32 = "AMAN";
              }
            }

            while ($data = mysqli_fetch_array($titik33)) {
              $bpnn_angin_33 = bpnn_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $bpnn_gelombang_33 = bpnn_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);
              $regresi_angin_33 = regresi_angin($data['a21'], $data['a20'], $data['a19'], $data['a18'], $data['a17'], $data['a16'], $data['a15'], $data['a14'], $data['a13'],  $data['a12'], $data['a11'], $data['a10'], $data['a9'], $data['a8'], $data['a7'], $data['a6'], $data['a5'], $data['a4'], $data['a3'], $data['a2'],  $data['a1']);
              $regresi_gelombang_33 = regresi_gelombang($data['g21'], $data['g20'], $data['g19'], $data['g18'], $data['g17'], $data['g16'], $data['g15'], $data['g14'], $data['g13'], $data['g12'],  $data['g11'], $data['g10'], $data['g9'], $data['g8'], $data['g7'], $data['g6'], $data['g5'], $data['g4'], $data['g3'], $data['g2'], $data['g1']);

              if ($bpnn_angin_33 >= 21 or $bpnn_gelombang_33 >= 2.5) {
                $status_33 = "BAHAYA";
              } else {
                $status_33 = "AMAN";
              }
            }

          ?>
          <?php
          }
          ?>

          <?php
          if ($query != '' && $query2 != '') {
            $titik1 = mysqli_query($conn, "SELECT * FROM titik_1 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik2 = mysqli_query($conn, "SELECT * FROM titik_2 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik3 = mysqli_query($conn, "SELECT * FROM titik_3 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik4 = mysqli_query($conn, "SELECT * FROM titik_4 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik5 = mysqli_query($conn, "SELECT * FROM titik_5 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik6 = mysqli_query($conn, "SELECT * FROM titik_6 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik7 = mysqli_query($conn, "SELECT * FROM titik_7 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik8 = mysqli_query($conn, "SELECT * FROM titik_8 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik9 = mysqli_query($conn, "SELECT * FROM titik_9 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik10 = mysqli_query($conn, "SELECT * FROM titik_10 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik11 = mysqli_query($conn, "SELECT * FROM titik_11 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik12 = mysqli_query($conn, "SELECT * FROM titik_12 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik13 = mysqli_query($conn, "SELECT * FROM titik_13 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik14 = mysqli_query($conn, "SELECT * FROM titik_14 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik15 = mysqli_query($conn, "SELECT * FROM titik_15 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik16 = mysqli_query($conn, "SELECT * FROM titik_16 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik17 = mysqli_query($conn, "SELECT * FROM titik_17 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik18 = mysqli_query($conn, "SELECT * FROM titik_18 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik19 = mysqli_query($conn, "SELECT * FROM titik_19 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik20 = mysqli_query($conn, "SELECT * FROM titik_20 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik21 = mysqli_query($conn, "SELECT * FROM titik_21 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik22 = mysqli_query($conn, "SELECT * FROM titik_22 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik23 = mysqli_query($conn, "SELECT * FROM titik_23 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik24 = mysqli_query($conn, "SELECT * FROM titik_24 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik25 = mysqli_query($conn, "SELECT * FROM titik_25 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik26 = mysqli_query($conn, "SELECT * FROM titik_26 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik27 = mysqli_query($conn, "SELECT * FROM titik_27 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik28 = mysqli_query($conn, "SELECT * FROM titik_28 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik29 = mysqli_query($conn, "SELECT * FROM titik_29 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik30 = mysqli_query($conn, "SELECT * FROM titik_30 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik31 = mysqli_query($conn, "SELECT * FROM titik_31 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik32 = mysqli_query($conn, "SELECT * FROM titik_32 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");
            $titik33 = mysqli_query($conn, "SELECT * FROM titik_33 WHERE date LIKE '" . $query . "' AND  time LIKE '" . $query2 . "'");

            while ($data = mysqli_fetch_array($titik1)) { ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_1; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_1; ?></td>
                <td><?php echo $regresi_angin_1; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_1; ?></td>
                <td><?php echo $regresi_gelombang_1; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik2)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_2; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_2; ?></td>
                <td><?php echo $regresi_angin_2; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_2; ?></td>
                <td><?php echo $regresi_gelombang_2; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik3)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_3; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_3; ?></td>
                <td><?php echo $regresi_angin_3; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_3; ?></td>
                <td><?php echo $regresi_gelombang_3; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik4)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_4; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_4; ?></td>
                <td><?php echo $regresi_angin_4; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_4; ?></td>
                <td><?php echo $regresi_gelombang_4; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik5)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_5; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_5; ?></td>
                <td><?php echo $regresi_angin_5; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_5; ?></td>
                <td><?php echo $regresi_gelombang_5; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik6)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_6; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_6; ?></td>
                <td><?php echo $regresi_angin_6; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_6; ?></td>
                <td><?php echo $regresi_gelombang_6; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik7)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_7; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_7; ?></td>
                <td><?php echo $regresi_angin_7; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_7; ?></td>
                <td><?php echo $regresi_gelombang_7; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik8)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_8; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_8; ?></td>
                <td><?php echo $regresi_angin_8; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_8; ?></td>
                <td><?php echo $regresi_gelombang_8; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik9)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_9; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_9; ?></td>
                <td><?php echo $regresi_angin_9; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_9; ?></td>
                <td><?php echo $regresi_gelombang_9; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik10)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_10; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_10; ?></td>
                <td><?php echo $regresi_angin_10; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_10; ?></td>
                <td><?php echo $regresi_gelombang_10; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik11)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_11; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_11; ?></td>
                <td><?php echo $regresi_angin_11; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_11; ?></td>
                <td><?php echo $regresi_gelombang_11; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik12)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_12; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_12; ?></td>
                <td><?php echo $regresi_angin_12; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_12; ?></td>
                <td><?php echo $regresi_gelombang_12; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik13)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_13; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_13; ?></td>
                <td><?php echo $regresi_angin_13; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_13; ?></td>
                <td><?php echo $regresi_gelombang_13; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik14)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_14; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_14; ?></td>
                <td><?php echo $regresi_angin_14; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_14; ?></td>
                <td><?php echo $regresi_gelombang_14; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik15)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_15; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_15; ?></td>
                <td><?php echo $regresi_angin_15; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_15; ?></td>
                <td><?php echo $regresi_gelombang_15; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik16)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_16; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_16; ?></td>
                <td><?php echo $regresi_angin_16; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_16; ?></td>
                <td><?php echo $regresi_gelombang_16; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik17)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_17; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_17; ?></td>
                <td><?php echo $regresi_angin_17; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_17; ?></td>
                <td><?php echo $regresi_gelombang_17; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik18)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_18; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_18; ?></td>
                <td><?php echo $regresi_angin_18; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_18; ?></td>
                <td><?php echo $regresi_gelombang_18; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik19)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_19; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_19; ?></td>
                <td><?php echo $regresi_angin_19; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_19; ?></td>
                <td><?php echo $regresi_gelombang_19; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik20)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_20; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_20; ?></td>
                <td><?php echo $regresi_angin_20; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_20; ?></td>
                <td><?php echo $regresi_gelombang_20; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik21)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_21; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_21; ?></td>
                <td><?php echo $regresi_angin_21; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_21; ?></td>
                <td><?php echo $regresi_gelombang_21; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik22)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_22; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_22; ?></td>
                <td><?php echo $regresi_angin_22; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_22; ?></td>
                <td><?php echo $regresi_gelombang_22; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik23)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_23; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_23; ?></td>
                <td><?php echo $regresi_angin_23; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_23; ?></td>
                <td><?php echo $regresi_gelombang_23; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik24)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_24; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_24; ?></td>
                <td><?php echo $regresi_angin_24; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_24; ?></td>
                <td><?php echo $regresi_gelombang_24; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik25)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_25; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_25; ?></td>
                <td><?php echo $regresi_angin_25; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_25; ?></td>
                <td><?php echo $regresi_gelombang_25; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik26)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_26; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_26; ?></td>
                <td><?php echo $regresi_angin_26; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_26; ?></td>
                <td><?php echo $regresi_gelombang_26; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik27)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_27; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_27; ?></td>
                <td><?php echo $regresi_angin_27; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_27; ?></td>
                <td><?php echo $regresi_gelombang_27; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik28)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_28; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_28; ?></td>
                <td><?php echo $regresi_angin_28; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_28; ?></td>
                <td><?php echo $regresi_gelombang_28; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik29)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_29; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_29; ?></td>
                <td><?php echo $regresi_angin_29; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_29; ?></td>
                <td><?php echo $regresi_gelombang_29; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik30)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_30; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_30; ?></td>
                <td><?php echo $regresi_angin_30; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_30; ?></td>
                <td><?php echo $regresi_gelombang_30; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik31)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_31; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_31; ?></td>
                <td><?php echo $regresi_angin_31; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_31; ?></td>
                <td><?php echo $regresi_gelombang_31; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik32)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_32; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_32; ?></td>
                <td><?php echo $regresi_angin_32; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_32; ?></td>
                <td><?php echo $regresi_gelombang_32; ?></td>
              </tr>
            <?php
            }
            while ($data = mysqli_fetch_array($titik33)) {
            ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['date']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td><?php echo $status_33; ?></td>
                <td><?php echo $data['a_actual']; ?></td>
                <td><?php echo $bpnn_angin_33; ?></td>
                <td><?php echo $regresi_angin_33; ?></td>
                <td><?php echo $data['g_actual']; ?></td>
                <td><?php echo $bpnn_gelombang_33; ?></td>
                <td><?php echo $regresi_gelombang_33; ?></td>
              </tr>
            <?php
            }
            ?>

          <?php
          }
          ?>
        </table>
      </div>
    </form>
  </div>

  <div id="mapid"></div>

  <script>
    var blueIcon = L.icon({
      iconUrl: '../Style/images/blue.png',
      iconSize: [19, 29]
    });
    var redIcon = L.icon({
      iconUrl: '../Style/images/red.png',
      iconSize: [19, 29]
    });

    var
      mymap =
      L.map('mapid').setView([-4.947625,
          112.077026
        ],
        7);
    L.tileLayer(
      'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Mapdata& copy;<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' + 'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
      }).addTo(mymap);

    <?php
    $way_1 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 1 . "'");
    while ($data_1 = mysqli_fetch_array($way_1)) {
      if ($bpnn_gelombang_1 >= 2.5 or $bpnn_angin_1 >= 21) {
    ?>
        L.marker([<?= $data_1['latitude']; ?>, <?= $data_1['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_1['koordinat']; ?>").openPopup();
        L.circle([<?= $data_1['latitude']; ?>, <?= $data_1['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_1['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_1['latitude']; ?>, <?= $data_1['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_1['koordinat']; ?>").openPopup();
        L.circle([<?= $data_1['latitude']; ?>, <?= $data_1['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_1['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_2 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 2 . "'");
    while ($data_2 = mysqli_fetch_array($way_2)) {
      if ($bpnn_gelombang_2 >= 2.5 or $bpnn_angin_2 >= 21) {
    ?>
        L.marker([<?= $data_2['latitude']; ?>, <?= $data_2['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_2['koordinat']; ?>").openPopup();
        L.circle([<?= $data_2['latitude']; ?>, <?= $data_2['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_2['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_2['latitude']; ?>, <?= $data_2['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_2['koordinat']; ?>").openPopup();
        L.circle([<?= $data_2['latitude']; ?>, <?= $data_2['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_2['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_3 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 3 . "'");
    while ($data_3 = mysqli_fetch_array($way_3)) {
      if ($bpnn_gelombang_3 >= 2.5 or $bpnn_angin_3 >= 21) {
    ?>
        L.marker([<?= $data_3['latitude']; ?>, <?= $data_3['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_3['koordinat']; ?>").openPopup();
        L.circle([<?= $data_3['latitude']; ?>, <?= $data_3['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_3['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_3['latitude']; ?>, <?= $data_3['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_3['koordinat']; ?>").openPopup();
        L.circle([<?= $data_3['latitude']; ?>, <?= $data_3['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_3['koordinat']; ?>");
    <?php
      }
    }
    ?>


    <?php
    $way_4 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 4 . "'");
    while ($data_4 = mysqli_fetch_array($way_4)) {
      if ($bpnn_gelombang_4 >= 2.5 or $bpnn_angin_4 >= 21) {
    ?>
        L.marker([<?= $data_4['latitude']; ?>, <?= $data_4['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_4['koordinat']; ?>").openPopup();
        L.circle([<?= $data_4['latitude']; ?>, <?= $data_4['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_4['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_4['latitude']; ?>, <?= $data_4['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_4['koordinat']; ?>").openPopup();
        L.circle([<?= $data_4['latitude']; ?>, <?= $data_4['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_4['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_5 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 5 . "'");
    while ($data_5 = mysqli_fetch_array($way_5)) {
      if ($bpnn_gelombang_5 >= 2.5 or $bpnn_angin_5 >= 21) {
    ?>
        L.marker([<?= $data_5['latitude']; ?>, <?= $data_5['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_5['koordinat']; ?>").openPopup();
        L.circle([<?= $data_5['latitude']; ?>, <?= $data_5['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_5['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_5['latitude']; ?>, <?= $data_5['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_5['koordinat']; ?>").openPopup();
        L.circle([<?= $data_5['latitude']; ?>, <?= $data_5['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_5['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_6 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 6 . "'");
    while ($data_6 = mysqli_fetch_array($way_6)) {
      if ($bpnn_gelombang_6 >= 2.5 or $bpnn_angin_6 >= 21) {
    ?>
        L.marker([<?= $data_6['latitude']; ?>, <?= $data_6['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_6['koordinat']; ?>").openPopup();
        L.circle([<?= $data_6['latitude']; ?>, <?= $data_6['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_6['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_6['latitude']; ?>, <?= $data_6['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_6['koordinat']; ?>").openPopup();
        L.circle([<?= $data_6['latitude']; ?>, <?= $data_6['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_6['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_7 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 7 . "'");
    while ($data_7 = mysqli_fetch_array($way_7)) {
      if ($bpnn_gelombang_7 >= 2.5 or $bpnn_angin_7 >= 21) {
    ?>
        L.marker([<?= $data_7['latitude']; ?>, <?= $data_7['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_7['koordinat']; ?>").openPopup();
        L.circle([<?= $data_7['latitude']; ?>, <?= $data_7['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_7['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_7['latitude']; ?>, <?= $data_7['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_7['koordinat']; ?>").openPopup();
        L.circle([<?= $data_7['latitude']; ?>, <?= $data_7['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_7['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_8 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 8 . "'");
    while ($data_8 = mysqli_fetch_array($way_8)) {
      if ($bpnn_gelombang_8 >= 2.5 or $bpnn_angin_8 >= 21) {
    ?>
        L.marker([<?= $data_8['latitude']; ?>, <?= $data_8['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_8['koordinat']; ?>").openPopup();
        L.circle([<?= $data_8['latitude']; ?>, <?= $data_8['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_8['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_8['latitude']; ?>, <?= $data_8['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_8['koordinat']; ?>").openPopup();
        L.circle([<?= $data_8['latitude']; ?>, <?= $data_8['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_8['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_9 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 9 . "'");
    while ($data_9 = mysqli_fetch_array($way_9)) {
      if ($bpnn_gelombang_9 >= 2.5 or $bpnn_angin_9 >= 21) {
    ?>
        L.marker([<?= $data_9['latitude']; ?>, <?= $data_9['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_9['koordinat']; ?>").openPopup();
        L.circle([<?= $data_9['latitude']; ?>, <?= $data_9['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_9['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_9['latitude']; ?>, <?= $data_9['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_9['koordinat']; ?>").openPopup();
        L.circle([<?= $data_9['latitude']; ?>, <?= $data_9['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_9['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_10 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 10 . "'");
    while ($data_10 = mysqli_fetch_array($way_10)) {
      if ($bpnn_gelombang_10 >= 2.5 or $bpnn_angin_10 >= 21) {
    ?>
        L.marker([<?= $data_10['latitude']; ?>, <?= $data_10['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_10['koordinat']; ?>").openPopup();
        L.circle([<?= $data_10['latitude']; ?>, <?= $data_10['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_10['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_10['latitude']; ?>, <?= $data_10['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_10['koordinat']; ?>").openPopup();
        L.circle([<?= $data_10['latitude']; ?>, <?= $data_10['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_10['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_11 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 11 . "'");
    while ($data_11 = mysqli_fetch_array($way_11)) {
      if ($bpnn_gelombang_11 >= 2.5 or $bpnn_angin_11 >= 21) {
    ?>
        L.marker([<?= $data_11['latitude']; ?>, <?= $data_11['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_11['koordinat']; ?>").openPopup();
        L.circle([<?= $data_11['latitude']; ?>, <?= $data_11['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_11['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_11['latitude']; ?>, <?= $data_11['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_11['koordinat']; ?>").openPopup();
        L.circle([<?= $data_11['latitude']; ?>, <?= $data_11['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_11['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_12 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 12 . "'");
    while ($data_12 = mysqli_fetch_array($way_12)) {
      if ($bpnn_gelombang_12 >= 2.5 or $bpnn_angin_12 >= 21) {
    ?>
        L.marker([<?= $data_12['latitude']; ?>, <?= $data_12['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_12['koordinat']; ?>").openPopup();
        L.circle([<?= $data_12['latitude']; ?>, <?= $data_12['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_12['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_12['latitude']; ?>, <?= $data_12['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_12['koordinat']; ?>").openPopup();
        L.circle([<?= $data_12['latitude']; ?>, <?= $data_12['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_12['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_13 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 13 . "'");
    while ($data_13 = mysqli_fetch_array($way_13)) {
      if ($bpnn_gelombang_13 >= 2.5 or $bpnn_angin_13 >= 21) {
    ?>
        L.marker([<?= $data_13['latitude']; ?>, <?= $data_13['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_13['koordinat']; ?>").openPopup();
        L.circle([<?= $data_13['latitude']; ?>, <?= $data_13['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_13['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_13['latitude']; ?>, <?= $data_13['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_13['koordinat']; ?>").openPopup();
        L.circle([<?= $data_13['latitude']; ?>, <?= $data_13['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_13['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_14 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 14 . "'");
    while ($data_14 = mysqli_fetch_array($way_14)) {
      if ($bpnn_gelombang_14 >= 2.5 or $bpnn_angin_14 >= 21) {
    ?>
        L.marker([<?= $data_14['latitude']; ?>, <?= $data_14['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_14['koordinat']; ?>").openPopup();
        L.circle([<?= $data_14['latitude']; ?>, <?= $data_14['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_14['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_14['latitude']; ?>, <?= $data_14['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_14['koordinat']; ?>").openPopup();
        L.circle([<?= $data_14['latitude']; ?>, <?= $data_14['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_14['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_15 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 15 . "'");
    while ($data_15 = mysqli_fetch_array($way_15)) {
      if ($bpnn_gelombang_15 >= 2.5 or $bpnn_angin_15 >= 21) {
    ?>
        L.marker([<?= $data_15['latitude']; ?>, <?= $data_15['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_15['koordinat']; ?>").openPopup();
        L.circle([<?= $data_15['latitude']; ?>, <?= $data_15['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_15['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_15['latitude']; ?>, <?= $data_15['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_15['koordinat']; ?>").openPopup();
        L.circle([<?= $data_15['latitude']; ?>, <?= $data_15['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_15['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_16 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 16 . "'");
    while ($data_16 = mysqli_fetch_array($way_16)) {
      if ($bpnn_gelombang_16 >= 2.5 or $bpnn_angin_16 >= 21) {
    ?>
        L.marker([<?= $data_16['latitude']; ?>, <?= $data_16['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_16['koordinat']; ?>").openPopup();
        L.circle([<?= $data_16['latitude']; ?>, <?= $data_16['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_16['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_16['latitude']; ?>, <?= $data_16['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_16['koordinat']; ?>").openPopup();
        L.circle([<?= $data_16['latitude']; ?>, <?= $data_16['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_16['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_17 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 17 . "'");
    while ($data_17 = mysqli_fetch_array($way_17)) {
      if ($bpnn_gelombang_17 >= 2.5 or $bpnn_angin_17 >= 21) {
    ?>
        L.marker([<?= $data_17['latitude']; ?>, <?= $data_17['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_17['koordinat']; ?>").openPopup();
        L.circle([<?= $data_17['latitude']; ?>, <?= $data_17['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_17['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_17['latitude']; ?>, <?= $data_17['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_17['koordinat']; ?>").openPopup();
        L.circle([<?= $data_17['latitude']; ?>, <?= $data_17['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_17['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_18 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 18 . "'");
    while ($data_18 = mysqli_fetch_array($way_18)) {
      if ($bpnn_gelombang_18 >= 2.5 or $bpnn_angin_18 >= 21) {
    ?>
        L.marker([<?= $data_18['latitude']; ?>, <?= $data_18['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_18['koordinat']; ?>").openPopup();
        L.circle([<?= $data_18['latitude']; ?>, <?= $data_18['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_18['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_18['latitude']; ?>, <?= $data_18['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_18['koordinat']; ?>").openPopup();
        L.circle([<?= $data_18['latitude']; ?>, <?= $data_18['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_18['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_19 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 19 . "'");
    while ($data_19 = mysqli_fetch_array($way_19)) {
      if ($bpnn_gelombang_19 >= 2.5 or $bpnn_angin_19 >= 21) {
    ?>
        L.marker([<?= $data_19['latitude']; ?>, <?= $data_19['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_19['koordinat']; ?>").openPopup();
        L.circle([<?= $data_19['latitude']; ?>, <?= $data_19['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_19['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_19['latitude']; ?>, <?= $data_19['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_19['koordinat']; ?>").openPopup();
        L.circle([<?= $data_19['latitude']; ?>, <?= $data_19['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_19['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_20 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 20 . "'");
    while ($data_20 = mysqli_fetch_array($way_20)) {
      if ($bpnn_gelombang_20 >= 2.5 or $bpnn_angin_20 >= 21) {
    ?>
        L.marker([<?= $data_20['latitude']; ?>, <?= $data_20['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_20['koordinat']; ?>").openPopup();
        L.circle([<?= $data_20['latitude']; ?>, <?= $data_20['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_20['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_20['latitude']; ?>, <?= $data_20['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_20['koordinat']; ?>").openPopup();
        L.circle([<?= $data_20['latitude']; ?>, <?= $data_20['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_20['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_21 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 21 . "'");
    while ($data_21 = mysqli_fetch_array($way_21)) {
      if ($bpnn_gelombang_21 >= 2.5 or $bpnn_angin_21 >= 21) {
    ?>
        L.marker([<?= $data_21['latitude']; ?>, <?= $data_21['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_21['koordinat']; ?>").openPopup();
        L.circle([<?= $data_21['latitude']; ?>, <?= $data_21['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_21['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_21['latitude']; ?>, <?= $data_21['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_21['koordinat']; ?>").openPopup();
        L.circle([<?= $data_21['latitude']; ?>, <?= $data_21['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_21['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_22 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 22 . "'");
    while ($data_22 = mysqli_fetch_array($way_22)) {
      if ($bpnn_gelombang_22 >= 2.5 or $bpnn_angin_22 >= 21) {
    ?>
        L.marker([<?= $data_22['latitude']; ?>, <?= $data_22['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_22['koordinat']; ?>").openPopup();
        L.circle([<?= $data_22['latitude']; ?>, <?= $data_22['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_22['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_22['latitude']; ?>, <?= $data_22['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_22['koordinat']; ?>").openPopup();
        L.circle([<?= $data_22['latitude']; ?>, <?= $data_22['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_22['koordinat']; ?>");
    <?php
      }
    }
    ?>


    <?php
    $way_23 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 23 . "'");
    while ($data_23 = mysqli_fetch_array($way_23)) {
      if ($bpnn_gelombang_23 >= 2.5 or $bpnn_angin_23 >= 21) {
    ?>
        L.marker([<?= $data_23['latitude']; ?>, <?= $data_23['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_23['koordinat']; ?>").openPopup();
        L.circle([<?= $data_23['latitude']; ?>, <?= $data_23['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_23['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_23['latitude']; ?>, <?= $data_23['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_23['koordinat']; ?>").openPopup();
        L.circle([<?= $data_23['latitude']; ?>, <?= $data_23['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_23['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_24 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 24 . "'");
    while ($data_24 = mysqli_fetch_array($way_24)) {
      if ($bpnn_gelombang_24 >= 2.5 or $bpnn_angin_24 >= 21) {
    ?>
        L.marker([<?= $data_24['latitude']; ?>, <?= $data_24['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_24['koordinat']; ?>").openPopup();
        L.circle([<?= $data_24['latitude']; ?>, <?= $data_24['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_24['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_24['latitude']; ?>, <?= $data_24['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_24['koordinat']; ?>").openPopup();
        L.circle([<?= $data_24['latitude']; ?>, <?= $data_24['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_24['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_25 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 25 . "'");
    while ($data_25 = mysqli_fetch_array($way_25)) {
      if ($bpnn_gelombang_25 >= 2.5 or $bpnn_angin_25 >= 21) {
    ?>
        L.marker([<?= $data_25['latitude']; ?>, <?= $data_25['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_25['koordinat']; ?>").openPopup();
        L.circle([<?= $data_25['latitude']; ?>, <?= $data_25['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_25['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_25['latitude']; ?>, <?= $data_25['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_25['koordinat']; ?>").openPopup();
        L.circle([<?= $data_25['latitude']; ?>, <?= $data_25['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_25['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_26 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 26 . "'");
    while ($data_26 = mysqli_fetch_array($way_26)) {
      if ($bpnn_gelombang_26 >= 2.5 or $bpnn_angin_26 >= 21) {
    ?>
        L.marker([<?= $data_26['latitude']; ?>, <?= $data_26['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_26['koordinat']; ?>").openPopup();
        L.circle([<?= $data_26['latitude']; ?>, <?= $data_26['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_26['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_26['latitude']; ?>, <?= $data_26['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_26['koordinat']; ?>").openPopup();
        L.circle([<?= $data_26['latitude']; ?>, <?= $data_26['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_26['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_27 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 27 . "'");
    while ($data_27 = mysqli_fetch_array($way_27)) {
      if ($bpnn_gelombang_27 >= 2.5 or $bpnn_angin_27 >= 21) {
    ?>
        L.marker([<?= $data_27['latitude']; ?>, <?= $data_27['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_27['koordinat']; ?>").openPopup();
        L.circle([<?= $data_27['latitude']; ?>, <?= $data_27['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_27['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_27['latitude']; ?>, <?= $data_27['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_27['koordinat']; ?>").openPopup();
        L.circle([<?= $data_27['latitude']; ?>, <?= $data_27['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_27['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_28 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 28 . "'");
    while ($data_28 = mysqli_fetch_array($way_28)) {
      if ($bpnn_gelombang_28 >= 2.5 or $bpnn_angin_28 >= 21) {
    ?>
        L.marker([<?= $data_28['latitude']; ?>, <?= $data_28['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_28['koordinat']; ?>").openPopup();
        L.circle([<?= $data_28['latitude']; ?>, <?= $data_28['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_28['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_28['latitude']; ?>, <?= $data_28['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_28['koordinat']; ?>").openPopup();
        L.circle([<?= $data_28['latitude']; ?>, <?= $data_28['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_28['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_29 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 29 . "'");
    while ($data_29 = mysqli_fetch_array($way_29)) {
      if ($bpnn_gelombang_29 >= 2.5 or $bpnn_angin_29 >= 21) {
    ?>
        L.marker([<?= $data_29['latitude']; ?>, <?= $data_29['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_29['koordinat']; ?>").openPopup();
        L.circle([<?= $data_29['latitude']; ?>, <?= $data_29['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_29['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_29['latitude']; ?>, <?= $data_29['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_29['koordinat']; ?>").openPopup();
        L.circle([<?= $data_29['latitude']; ?>, <?= $data_29['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_29['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_30 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 30 . "'");
    while ($data_30 = mysqli_fetch_array($way_30)) {
      if ($bpnn_gelombang_30 >= 2.5 or $bpnn_angin_30 >= 21) {
    ?>
        L.marker([<?= $data_30['latitude']; ?>, <?= $data_30['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_30['koordinat']; ?>").openPopup();
        L.circle([<?= $data_30['latitude']; ?>, <?= $data_30['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_30['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_30['latitude']; ?>, <?= $data_30['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_30['koordinat']; ?>").openPopup();
        L.circle([<?= $data_30['latitude']; ?>, <?= $data_30['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_30['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_31 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 31 . "'");
    while ($data_31 = mysqli_fetch_array($way_31)) {
      if ($bpnn_gelombang_31 >= 2.5 or $bpnn_angin_31 >= 21) {
    ?>
        L.marker([<?= $data_31['latitude']; ?>, <?= $data_31['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_31['koordinat']; ?>").openPopup();
        L.circle([<?= $data_31['latitude']; ?>, <?= $data_31['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_31['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_31['latitude']; ?>, <?= $data_31['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_31['koordinat']; ?>").openPopup();
        L.circle([<?= $data_31['latitude']; ?>, <?= $data_31['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_31['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_32 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 32 . "'");
    while ($data_32 = mysqli_fetch_array($way_32)) {
      if ($bpnn_gelombang_32 >= 2.5 or $bpnn_angin_32 >= 21) {
    ?>
        L.marker([<?= $data_32['latitude']; ?>, <?= $data_32['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_32['koordinat']; ?>").openPopup();
        L.circle([<?= $data_32['latitude']; ?>, <?= $data_32['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_32['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_32['latitude']; ?>, <?= $data_32['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_32['koordinat']; ?>").openPopup();
        L.circle([<?= $data_32['latitude']; ?>, <?= $data_32['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_32['koordinat']; ?>");
    <?php
      }
    }
    ?>

    <?php
    $way_33 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 33 . "'");
    while ($data_33 = mysqli_fetch_array($way_33)) {
      if ($bpnn_gelombang_33 >= 2.5 or $bpnn_angin_33 >= 21) {
    ?>
        L.marker([<?= $data_33['latitude']; ?>, <?= $data_33['longitude']; ?>], {
            icon: redIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_33['koordinat']; ?>").openPopup();
        L.circle([<?= $data_33['latitude']; ?>, <?= $data_33['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_33['koordinat']; ?>");
      <?php
      } else {
      ?>
        L.marker([<?= $data_33['latitude']; ?>, <?= $data_33['longitude']; ?>], {
            icon: blueIcon
          }).addTo(mymap)
          .bindPopup("<?= $data_33['koordinat']; ?>").openPopup();
        L.circle([<?= $data_33['latitude']; ?>, <?= $data_33['longitude']; ?>], 500, {
          color: 'blue',
          fillOpacity: 0.5
        }).addTo(mymap).bindPopup("<?= $data_33['koordinat']; ?>");
    <?php
      }
    }
    ?>
  </script>

</body>

</html>