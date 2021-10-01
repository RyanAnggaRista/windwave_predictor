<?php
require '../koneksi.php';
$sql = 'SELECT * FROM waypoint';
$statement = $connection->prepare($sql);
$statement->execute();
$waypoint = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>index</title>
</head>

<body>
    <style>
        .beranda {
            display: grid;
            height: 100vh;
            width: 100%;
            grid-template-columns: 1fr 4fr;
            grid-template-rows: 4.8fr 0.2fr;
            grid-template-areas:
                "sidebar content1"
                "sidebar content1";
            grid-gap: 0.3rem;
            color: #004d40;
        }

        #sidebar {
            grid-area: sidebar;
            height: 100%;
        }

        #content1 {
            padding: 15px;
            grid-area: content1;
        }

        .title {
            color: black;
        }
        
        .way {
            height: 90%;
            width: 100%;
            overflow: scroll;
        }

        .judul {
            font-weight: 400px;
        }

        footer {
            grid-area: footer;
            text-align: center;
            color: black;
        }

        @media only screen and (max-width:550px) {
            .beranda {
                grid-template-columns: 1fr;
                grid-template-rows: 0.5fr 4.3fr;
                grid-template-areas:
                    "sidebar"
                    "content1"
            }
        }
    </style>

    <div class="beranda">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" id="sidebar">
            <p href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Sidebar</span>
            </p>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="admin.php" class="nav-link active" aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home" />
                        </svg>
                        Bobot
                    </a>
                </li>
                <li>
                    <a href="lokasi.php" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid" />
                        </svg>
                        Waypoint
                    </a>
                </li>
                <li>
                    <a href="maps.php" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid" />
                        </svg>
                        Maps
                    </a>
                </li>
                <li>
                    <a href="..\index.php" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid" />
                        </svg>
                        Keluar
                    </a>
                </li>
            </ul>
        </div>

        <div id="content1">
            <p class="title d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Tugas Akhir</span>
            </p>

            <hr>

            <div class="way">
                <table class="table table-bordered">
                    <?php
                    $way_1 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 1 . "'");
                    $way_2 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 2 . "'");
                    $way_3 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 3 . "'");
                    $way_4 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 4 . "'");
                    $way_5 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 5 . "'");
                    $way_6 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 6 . "'");
                    $way_7 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 7 . "'");
                    $way_8 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 8 . "'");
                    $way_9 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 9 . "'");
                    $way_10 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 10 . "'");
                    $way_11 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 11 . "'");
                    $way_12 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 12 . "'");
                    $way_13 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 13 . "'");
                    $way_14 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 14 . "'");
                    $way_15 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 15 . "'");
                    $way_16 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 16 . "'");
                    $way_17 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 17 . "'");
                    $way_18 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 18 . "'");
                    $way_19 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 19 . "'");
                    $way_20 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 20 . "'");
                    $way_21 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 21 . "'");
                    $way_22 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 22 . "'");
                    $way_23 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 23 . "'");
                    $way_24 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 24 . "'");
                    $way_25 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 25 . "'");
                    $way_26 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 26 . "'");
                    $way_27 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 27 . "'");
                    $way_28 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 28 . "'");
                    $way_29 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 29 . "'");
                    $way_30 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 30 . "'");
                    $way_31 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 31 . "'");
                    $way_32 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 32 . "'");
                    $way_33 = mysqli_query($conn, "SELECT * FROM waypoint WHERE id LIKE '" . 33 . "'");

                    while ($data_1 = mysqli_fetch_array($way_1)) {
                        $lat_1 = $data_1['latitude'];
                        $long_1 = $data_1['longitude'];
                    }
                    while ($data_2 = mysqli_fetch_array($way_2)) {
                        $lat_2 = $data_2['latitude'];
                        $long_2 = $data_2['longitude'];
                    }
                    while ($data_3 = mysqli_fetch_array($way_3)) {
                        $lat_3 = $data_3['latitude'];
                        $long_3 = $data_3['longitude'];
                    }
                    while ($data_4 = mysqli_fetch_array($way_4)) {
                        $lat_4 = $data_4['latitude'];
                        $long_4 = $data_4['longitude'];
                    }
                    while ($data_5 = mysqli_fetch_array($way_5)) {
                        $lat_5 = $data_5['latitude'];
                        $long_5 = $data_5['longitude'];
                    }
                    while ($data_6 = mysqli_fetch_array($way_6)) {
                        $lat_6 = $data_6['latitude'];
                        $long_6 = $data_6['longitude'];
                    }
                    while ($data_7 = mysqli_fetch_array($way_7)) {
                        $lat_7 = $data_7['latitude'];
                        $long_7 = $data_7['longitude'];
                    }
                    while ($data_8 = mysqli_fetch_array($way_8)) {
                        $lat_8 = $data_8['latitude'];
                        $long_8 = $data_8['longitude'];
                    }
                    while ($data_9 = mysqli_fetch_array($way_9)) {
                        $lat_9 = $data_9['latitude'];
                        $long_9 = $data_9['longitude'];
                    }
                    while ($data_10 = mysqli_fetch_array($way_10)) {
                        $lat_10 = $data_10['latitude'];
                        $long_10 = $data_10['longitude'];
                    }
                    while ($data_11 = mysqli_fetch_array($way_11)) {
                        $lat_11 = $data_11['latitude'];
                        $long_11 = $data_11['longitude'];
                    }
                    while ($data_12 = mysqli_fetch_array($way_12)) {
                        $lat_12 = $data_12['latitude'];
                        $long_12 = $data_12['longitude'];
                    }
                    while ($data_13 = mysqli_fetch_array($way_13)) {
                        $lat_13 = $data_13['latitude'];
                        $long_13 = $data_13['longitude'];
                    }
                    while ($data_14 = mysqli_fetch_array($way_14)) {
                        $lat_14 = $data_14['latitude'];
                        $long_14 = $data_14['longitude'];
                    }
                    while ($data_15 = mysqli_fetch_array($way_15)) {
                        $lat_15 = $data_15['latitude'];
                        $long_15 = $data_15['longitude'];
                    }
                    while ($data_16 = mysqli_fetch_array($way_16)) {
                        $lat_16 = $data_16['latitude'];
                        $long_16 = $data_16['longitude'];
                    }
                    while ($data_17 = mysqli_fetch_array($way_17)) {
                        $lat_17 = $data_17['latitude'];
                        $long_17 = $data_17['longitude'];
                    }
                    while ($data_18 = mysqli_fetch_array($way_18)) {
                        $lat_18 = $data_18['latitude'];
                        $long_18 = $data_18['longitude'];
                    }
                    while ($data_19 = mysqli_fetch_array($way_19)) {
                        $lat_19 = $data_19['latitude'];
                        $long_19 = $data_19['longitude'];
                    }
                    while ($data_20 = mysqli_fetch_array($way_20)) {
                        $lat_20 = $data_20['latitude'];
                        $long_20 = $data_20['longitude'];
                    }
                    while ($data_21 = mysqli_fetch_array($way_21)) {
                        $lat_21 = $data_21['latitude'];
                        $long_21 = $data_21['longitude'];
                    }
                    while ($data_22 = mysqli_fetch_array($way_22)) {
                        $lat_22 = $data_22['latitude'];
                        $long_22 = $data_22['longitude'];
                    }
                    while ($data_23 = mysqli_fetch_array($way_23)) {
                        $lat_23 = $data_23['latitude'];
                        $long_23 = $data_23['longitude'];
                    }
                    while ($data_24 = mysqli_fetch_array($way_24)) {
                        $lat_24 = $data_24['latitude'];
                        $long_24 = $data_24['longitude'];
                    }
                    while ($data_25 = mysqli_fetch_array($way_25)) {
                        $lat_25 = $data_25['latitude'];
                        $long_25 = $data_25['longitude'];
                    }
                    while ($data_26 = mysqli_fetch_array($way_26)) {
                        $lat_26 = $data_26['latitude'];
                        $long_26 = $data_26['longitude'];
                    }
                    while ($data_27 = mysqli_fetch_array($way_27)) {
                        $lat_7 = $data_27['latitude'];
                        $long_7 = $data_27['longitude'];
                    }
                    while ($data_28 = mysqli_fetch_array($way_28)) {
                        $lat_28 = $data_28['latitude'];
                        $long_28 = $data_28['longitude'];
                    }
                    while ($data_29 = mysqli_fetch_array($way_29)) {
                        $lat_29 = $data_29['latitude'];
                        $long_29 = $data_29['longitude'];
                    }
                    while ($data_30 = mysqli_fetch_array($way_30)) {
                        $lat_30 = $data_30['latitude'];
                        $long_30 = $data_30['longitude'];
                    }
                    while ($data_31 = mysqli_fetch_array($way_31)) {
                        $lat_31 = $data_31['latitude'];
                        $long_31 = $data_31['longitude'];
                    }
                    while ($data_32 = mysqli_fetch_array($way_32)) {
                        $lat_32 = $data_32['latitude'];
                        $long_32 = $data_32['longitude'];
                    }
                    while ($data_33 = mysqli_fetch_array($way_33)) {
                        $lat_33 = $data_33['latitude'];
                        $long_33 = $data_33['longitude'];
                    }

                    $jarak_1_2 = (6371 * acos(cos(deg2rad($lat_2)) * cos(deg2rad($lat_1)) * cos(deg2rad($long_1) - deg2rad($long_2)) + sin(deg2rad($lat_2)) * sin(deg2rad($lat_1))));
                    $jarak_2_3 = (6371 * acos(cos(deg2rad($lat_3)) * cos(deg2rad($lat_2)) * cos(deg2rad($long_2) - deg2rad($long_3)) + sin(deg2rad($lat_3)) * sin(deg2rad($lat_2))));
                    $jarak_3_4 = (6371 * acos(cos(deg2rad($lat_4)) * cos(deg2rad($lat_3)) * cos(deg2rad($long_3) - deg2rad($long_4)) + sin(deg2rad($lat_4)) * sin(deg2rad($lat_3))));
                    $jarak_4_5 = (6371 * acos(cos(deg2rad($lat_5)) * cos(deg2rad($lat_4)) * cos(deg2rad($long_4) - deg2rad($long_5)) + sin(deg2rad($lat_5)) * sin(deg2rad($lat_4))));
                    $jarak_5_6 = (6371 * acos(cos(deg2rad($lat_6)) * cos(deg2rad($lat_5)) * cos(deg2rad($long_5) - deg2rad($long_6)) + sin(deg2rad($lat_6)) * sin(deg2rad($lat_5))));
                    $jarak_6_7 = (6371 * acos(cos(deg2rad($lat_7)) * cos(deg2rad($lat_6)) * cos(deg2rad($long_6) - deg2rad($long_7)) + sin(deg2rad($lat_7)) * sin(deg2rad($lat_6))));
                    $jarak_7_8 = (6371 * acos(cos(deg2rad($lat_8)) * cos(deg2rad($lat_7)) * cos(deg2rad($long_7) - deg2rad($long_8)) + sin(deg2rad($lat_8)) * sin(deg2rad($lat_7))));
                    $jarak_8_9 = (6371 * acos(cos(deg2rad($lat_9)) * cos(deg2rad($lat_8)) * cos(deg2rad($long_8) - deg2rad($long_9)) + sin(deg2rad($lat_9)) * sin(deg2rad($lat_8))));
                    $jarak_9_10 = (6371 * acos(cos(deg2rad($lat_10)) * cos(deg2rad($lat_9)) * cos(deg2rad($long_9) - deg2rad($long_10)) + sin(deg2rad($lat_10)) * sin(deg2rad($lat_9))));
                    $jarak_10_11 = (6371 * acos(cos(deg2rad($lat_11)) * cos(deg2rad($lat_10)) * cos(deg2rad($long_10) - deg2rad($long_11)) + sin(deg2rad($lat_11)) * sin(deg2rad($lat_10))));
                    $jarak_11_12 = (6371 * acos(cos(deg2rad($lat_12)) * cos(deg2rad($lat_11)) * cos(deg2rad($long_11) - deg2rad($long_12)) + sin(deg2rad($lat_12)) * sin(deg2rad($lat_11))));
                    $jarak_12_13 = (6371 * acos(cos(deg2rad($lat_13)) * cos(deg2rad($lat_12)) * cos(deg2rad($long_12) - deg2rad($long_13)) + sin(deg2rad($lat_13)) * sin(deg2rad($lat_12))));
                    $jarak_13_14 = (6371 * acos(cos(deg2rad($lat_14)) * cos(deg2rad($lat_13)) * cos(deg2rad($long_13) - deg2rad($long_14)) + sin(deg2rad($lat_14)) * sin(deg2rad($lat_13))));
                    $jarak_14_15 = (6371 * acos(cos(deg2rad($lat_15)) * cos(deg2rad($lat_14)) * cos(deg2rad($long_14) - deg2rad($long_15)) + sin(deg2rad($lat_15)) * sin(deg2rad($lat_14))));
                    $jarak_15_16 = (6371 * acos(cos(deg2rad($lat_16)) * cos(deg2rad($lat_15)) * cos(deg2rad($long_15) - deg2rad($long_16)) + sin(deg2rad($lat_16)) * sin(deg2rad($lat_15))));
                    $jarak_16_17 = (6371 * acos(cos(deg2rad($lat_17)) * cos(deg2rad($lat_16)) * cos(deg2rad($long_16) - deg2rad($long_17)) + sin(deg2rad($lat_17)) * sin(deg2rad($lat_16))));
                    $jarak_17_18 = (6371 * acos(cos(deg2rad($lat_18)) * cos(deg2rad($lat_17)) * cos(deg2rad($long_17) - deg2rad($long_18)) + sin(deg2rad($lat_18)) * sin(deg2rad($lat_17))));
                    $jarak_18_19 = (6371 * acos(cos(deg2rad($lat_19)) * cos(deg2rad($lat_18)) * cos(deg2rad($long_18) - deg2rad($long_19)) + sin(deg2rad($lat_19)) * sin(deg2rad($lat_18))));
                    $jarak_19_20 = (6371 * acos(cos(deg2rad($lat_20)) * cos(deg2rad($lat_19)) * cos(deg2rad($long_19) - deg2rad($long_20)) + sin(deg2rad($lat_20)) * sin(deg2rad($lat_19))));
                    $jarak_20_21 = (6371 * acos(cos(deg2rad($lat_21)) * cos(deg2rad($lat_20)) * cos(deg2rad($long_20) - deg2rad($long_21)) + sin(deg2rad($lat_21)) * sin(deg2rad($lat_20))));
                    $jarak_21_22 = (6371 * acos(cos(deg2rad($lat_22)) * cos(deg2rad($lat_21)) * cos(deg2rad($long_21) - deg2rad($long_22)) + sin(deg2rad($lat_22)) * sin(deg2rad($lat_21))));
                    $jarak_22_23 = (6371 * acos(cos(deg2rad($lat_23)) * cos(deg2rad($lat_22)) * cos(deg2rad($long_22) - deg2rad($long_23)) + sin(deg2rad($lat_23)) * sin(deg2rad($lat_22))));
                    $jarak_23_24 = (6371 * acos(cos(deg2rad($lat_24)) * cos(deg2rad($lat_23)) * cos(deg2rad($long_23) - deg2rad($long_24)) + sin(deg2rad($lat_24)) * sin(deg2rad($lat_23))));
                    $jarak_24_25 = (6371 * acos(cos(deg2rad($lat_25)) * cos(deg2rad($lat_24)) * cos(deg2rad($long_24) - deg2rad($long_25)) + sin(deg2rad($lat_25)) * sin(deg2rad($lat_24))));
                    $jarak_25_26 = (6371 * acos(cos(deg2rad($lat_26)) * cos(deg2rad($lat_25)) * cos(deg2rad($long_25) - deg2rad($long_26)) + sin(deg2rad($lat_26)) * sin(deg2rad($lat_25))));
                    $jarak_26_27 = (6371 * acos(cos(deg2rad($lat_27)) * cos(deg2rad($lat_26)) * cos(deg2rad($long_26) - deg2rad($long_27)) + sin(deg2rad($lat_27)) * sin(deg2rad($lat_26))));
                    $jarak_27_28 = (6371 * acos(cos(deg2rad($lat_28)) * cos(deg2rad($lat_27)) * cos(deg2rad($long_27) - deg2rad($long_28)) + sin(deg2rad($lat_28)) * sin(deg2rad($lat_27))));
                    $jarak_28_29 = (6371 * acos(cos(deg2rad($lat_29)) * cos(deg2rad($lat_28)) * cos(deg2rad($long_28) - deg2rad($long_29)) + sin(deg2rad($lat_29)) * sin(deg2rad($lat_28))));
                    $jarak_29_30 = (6371 * acos(cos(deg2rad($lat_30)) * cos(deg2rad($lat_29)) * cos(deg2rad($long_29) - deg2rad($long_30)) + sin(deg2rad($lat_30)) * sin(deg2rad($lat_29))));
                    $jarak_30_31 = (6371 * acos(cos(deg2rad($lat_31)) * cos(deg2rad($lat_30)) * cos(deg2rad($long_30) - deg2rad($long_31)) + sin(deg2rad($lat_31)) * sin(deg2rad($lat_30))));
                    $jarak_31_32 = (6371 * acos(cos(deg2rad($lat_32)) * cos(deg2rad($lat_31)) * cos(deg2rad($long_31) - deg2rad($long_32)) + sin(deg2rad($lat_32)) * sin(deg2rad($lat_31))));
                    $jarak_32_33 = (6371 * acos(cos(deg2rad($lat_33)) * cos(deg2rad($lat_32)) * cos(deg2rad($long_32) - deg2rad($long_33)) + sin(deg2rad($lat_33)) * sin(deg2rad($lat_32))));
                    ?>

                    <tr>
                        <th>Id</th>
                        <th>Koordinat</th>
                        <th>Jarak</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Jarak 1 ke 2</td>
                        <td><?= $jarak_1_2; ?></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jarak 2 ke 3</td>
                        <td><?= $jarak_2_3; ?></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Jarak 3 ke 4</td>
                        <td><?= $jarak_3_4; ?></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Jarak 4 ke 5</td>
                        <td><?= $jarak_4_5; ?></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Jarak 5 ke 6</td>
                        <td><?= $jarak_5_6; ?></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Jarak 6 ke 7</td>
                        <td><?= $jarak_6_7; ?></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Jarak 7 ke 8</td>
                        <td><?= $jarak_7_8; ?></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Jarak 8 ke 9</td>
                        <td><?= $jarak_8_9; ?></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Jarak 9 ke 10</td>
                        <td><?= $jarak_9_10; ?></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Jarak 10 ke 11</td>
                        <td><?= $jarak_10_11; ?></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Jarak 11 ke 12</td>
                        <td><?= $jarak_11_12; ?></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Jarak 12 ke 13</td>
                        <td><?= $jarak_12_13; ?></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Jarak 13 ke 14</td>
                        <td><?= $jarak_13_14; ?></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Jarak 14 ke 15</td>
                        <td><?= $jarak_14_15; ?></td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>Jarak 15 ke 16</td>
                        <td><?= $jarak_15_16; ?></td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>Jarak 16 ke 17</td>
                        <td><?= $jarak_16_17; ?></td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td>Jarak 17 ke 18</td>
                        <td><?= $jarak_17_18; ?></td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>Jarak 18 ke 19</td>
                        <td><?= $jarak_18_19; ?></td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td>Jarak 19 ke 20</td>
                        <td><?= $jarak_19_20; ?></td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>Jarak 20 ke 21</td>
                        <td><?= $jarak_20_21; ?></td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td>Jarak 21 ke 22</td>
                        <td><?= $jarak_21_22; ?></td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td>Jarak 22 ke 23</td>
                        <td><?= $jarak_22_23; ?></td>
                    </tr>
                    <tr>
                        <td>23</td>
                        <td>Jarak 23 ke 24</td>
                        <td><?= $jarak_23_24; ?></td>
                    </tr>
                    <tr>
                        <td>24</td>
                        <td>Jarak 24 ke 25</td>
                        <td><?= $jarak_24_25; ?></td>
                    </tr>
                    <tr>
                        <td>25</td>
                        <td>Jarak 25 ke 26</td>
                        <td><?= $jarak_25_26; ?></td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td>Jarak 26 ke 27</td>
                        <td><?= $jarak_26_27; ?></td>
                    </tr>
                    <tr>
                        <td>27</td>
                        <td>Jarak 27 ke 28</td>
                        <td><?= $jarak_27_28; ?></td>
                    </tr>
                    <tr>
                        <td>28</td>
                        <td>Jarak 28 ke 29</td>
                        <td><?= $jarak_28_29; ?></td>
                    </tr>
                    <tr>
                        <td>29</td>
                        <td>Jarak 29 ke 30</td>
                        <td><?= $jarak_29_30; ?></td>
                    </tr>
                    <tr>
                        <td>30</td>
                        <td>Jarak 30 ke 31</td>
                        <td><?= $jarak_30_31; ?></td>
                    </tr>
                    <tr>
                        <td>31</td>
                        <td>Jarak 31 ke 32</td>
                        <td><?= $jarak_31_32; ?></td>
                    </tr>
                    <tr>
                        <td>32</td>
                        <td>Jarak 32 ke 33</td>
                        <td><?= $jarak_32_33; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>