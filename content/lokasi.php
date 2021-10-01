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
                "sidebar footer";
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
                grid-template-rows: 0.5fr 4.3fr 0.2fr;
                grid-template-areas:
                    "sidebar"
                    "content1"
                    "footer";
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
                <span class="fs-4">TITIK LOKASI PREDIKSI</span>
            </p>
            <hr>
            <div class="container">
                <div class="card mt-5">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Waypoint</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($waypoint as $data) : ?>
                            <tr>
                                <td><?= $data->id; ?></td>
                                <td><?= $data->koordinat; ?></td>
                                <td><?= $data->latitude; ?></td>
                                <td><?= $data->longitude; ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $data->id ?>" class="btn btn-info">Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete this entry?')"
                                        href="delete.php?id=<?= $data->id ?>" class='btn btn-danger'>Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <footer>Build by Ismi Zulaida Ulifah || Tugas Akhir </footer>
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