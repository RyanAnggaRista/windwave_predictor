<?php
require '../koneksi.php';
error_reporting(0);
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <title>index</title>
</head>

<body>
    <style type="text/css">
        .maps {
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

        #mapid {
            height: 500px;
            width: 100%;
        }

        #sidebar {
            grid-area: sidebar;
        }

        #content1 {
            grid-area: content1;
            padding: 15px;
        }

        .title {
            color: black;
        }

        footer {
            grid-area: footer;
            text-align: center;
            color: black;
        }

        @media only screen and (max-width:550px) {
            .maps {
                grid-template-columns: 1fr;
                grid-template-rows: 0.5fr 4.5fr;
                grid-template-areas:
                    "sidebar"
                    "content1";
            }
        }
    </style>

    <div class="maps">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" id="sidebar">
            <p class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Sidebar</span>
            </p>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="admin.php" class="nav-link text-white" aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home" />
                        </svg>
                        Beranda
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
                    <a href="maps.php" class="nav-link active">
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
                <span class="fs-4">MAPS LOKASI PREDIKSI</span>
            </p>
            <hr>
            <div id="mapid"></div>
        </div>
    </div>

    <script>
        <?php
        require '../koneksi.php';
        ?>
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

        <?php foreach ($waypoint as $data) : ?>
            L.marker([<?= $data->latitude; ?>, <?= $data->longitude; ?>]).addTo(mymap)
                .bindPopup("<?= $data->waypoint; ?>").openPopup();
            L.circle([<?= $data->latitude; ?>, <?= $data->longitude; ?>], 1000, {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5
            }).addTo(mymap).bindPopup("<?= $data->waypoint; ?>");
        <?php endforeach; ?>
    </script>

</body>

</html>