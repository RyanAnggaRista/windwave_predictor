<?php
require '../koneksi.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM waypoint WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id]);
$waypoint = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['waypoint']) && isset($_POST['latitude']) && isset($_POST['longitude'])) {
    $waypoint = $_POST['waypoint'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $sql = 'UPDATE waypoint SET waypoint=:waypoint, latitude=:latitude, longitude=:longitude WHERE id=:id';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':waypoint' => $waypoint, ':latitude' => $latitude, ':longitude' => $longitude, ':id' => $id])) {
        header("location: lokasi.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <title>index</title>
</head>

<body>
    <style>
        .lokasi {
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
        }

        #content1 {
            padding: 15px;
            grid-area: content1;
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
            .lokasi {
                grid-template-columns: 1fr;
                grid-template-rows: 0.5fr 4.5fr;
                grid-template-areas:
                    "sidebar"
                    "content1";
            }
        }
    </style>

    <div class="lokasi">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" id="sidebar">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Sidebar</span>
            </a>
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
                    <a href="lokasi.php" class="nav-link active">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid" />
                        </svg>
                        Lokasi AWS
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
                    <a href="..\index
                    .php" class="nav-link text-white">
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
                <span class="fs-4">TITIK LOKASI PREDIKSI</span>
            </p>
            <hr>
            <div class="container">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>Update Waypoints</h2>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($message)) : ?>
                        <div class="alert alert-success">
                            <?= $message; ?>
                        </div>
                        <?php endif; ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="name">Waypoint</label>
                                <input value="<?= $waypoint->waypoint; ?>" type="text" name="waypoint" id="waypoint"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Latitude</label>
                                <input value="<?= $waypoint->latitude; ?>" type="text" name="latitude" id="latitude"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Longitude</label>
                                <input value="<?= $waypoint->longitude; ?>" type="text" name="longitude" id="longitude"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Update Waypoint</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
        </script>

    </div>
</body>

</html>