<html>

<head>
    <meta charset="UTF-8">
    <title>Wind Wave Predictor</title>
    <meta name="description" content="Login - Register Template">
    <meta name="author" content="Ismi Zulaida Ulifah">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        #container-login {
            background-color: #1D1F20;
            position: relative;
            top: 22.5%;
            margin: auto;
            width: 340px;
            height: 300px;
            border-radius: 0.35em;
            box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        #title {
            position: relative;
            background-color: #1A1C1D;
            width: 100%;
            padding: 20px 0px;
            border-radius: 0.35em;
            font-size: 22px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            color: white;
        }

        .lock {
            position: relative;
            top: 2px;
            color: white;
        }

        .input {
            margin: auto;
            width: 240px;
            border-radius: 4px;
            background-color: #373b3d;
            padding: 8px 0px;
            margin-top: 10px;
        }

        .margin {
            margin: auto;
            margin-top: 25px;
        }

        .input-addon {
            float: left;
            background-color: #373b3d;
            border: 1px solid #373b3d;
            padding: 4px 8px;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }

        input[type=text] {
            color: white;
            margin: 0;
            background-color: #373b3d;
            border: 1px solid #373b3d;
            padding: 6px 0px;
            border-radius: 3px;
        }

        input[type=text]:focus {
            border: 1px solid #373b3d;
        }

        input[type=password] {
            color: white;
            margin: 0;
            background-color: #373b3d;
            border: 1px solid #373b3d;
            padding: 6px 0px;
            border-radius: 3px;
        }

        input[type=password]:focus {
            border: 1px solid #373b3d;
        }

        .submit {
            margin: auto;
            width: 240px;
            border-radius: 4px;
            background-color: #373E4A;
            padding: 8px 0px;
            margin-top: 40px;
            color: #C1C3C6;
            font-weight: bold;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <div id="container-login">
        <div id="title">
            <i class="material-icons lock">lock</i>Login
        </div>

        <form class="margin" action="" method="post">
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons lock">face</i>
                </div>
                <input id="username" name="user" placeholder="Username" type="text" required class="validate" autocomplete="off">
            </div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons lock">vpn_key</i>
                </div>
                <input id="password" name="pass" placeholder="Password" type="password" required class="validate" autocomplete="off">
            </div>

            <input type="submit" value="Login" name="login" class="submit"></input>

        </form>

        <?php

        include 'koneksi.php';

        if (isset($_POST['login'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $data_user = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '$user' AND password_ = '$pass'");
            $r         = mysqli_num_rows($data_user);

            if ($r > 0) {
                echo '<script>window.location.href = "content/mapsnya.php";</script>';
            } else {
                echo "<font color='#ff0000'>ERROR!!!</font><br>";
            }
        }
        ?>

    </div>
</body>

</html>