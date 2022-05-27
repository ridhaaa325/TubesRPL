<?php

session_start();
// include("conf.php");

if( ! isset($_SESSION['username'])) {
    header("location: login.php");
}

$gasLeak = $_POST['kondisiGas'];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gas Likage Detecio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php
        include("skin/navbar.html");
    ?>

    <!-- Ridha tidak baik. Ridha sombong. #PukulRidha -->
    <section>
        <?php
            if($gasLeak == 0) {
                echo"<div class='mx-auto mt-5 text-center mb-5'>
                <h2>Status Deteksi: <span class='text-success'>Tidak ada kebocoran gas</span></h2>
                </div>";
            }else{
                echo"<div class='mx-auto mt-5 text-center mb-5'>
                <h2>Status Deteksi: <span class='text-danger'>Kebocoran gas terdeteksi!! Wiu Wiu!!!!</span></h2>
                </div>";
            }
        ?>

        <?php
            if($gasLeak == 0) {
                echo"
                <div class='text-center my-5'>
                    Alarm tidak aktif </br>
                    <button type='button' class='btn btn-danger'>Nyalakan Alarm</button>
                </div>
                ";
            }
            else
            {
                echo"
                <div class='text-center my-5'>
                    Alarm aktif!! </br>
                    <button type='button' class='btn btn-success'>Matikan Alarm</button>
                </div>
                ";
            }
        ?>

    </section>

    <section>
        <div class="card ms-5 my-5" style="width: 18rem;">
            <div class="card-body">
                <h4 class="mb-5">Selamat Datang, <?php echo $_SESSION['usernama']; ?>!</h4>
                <h4 class="card-title">Control Panel</h4>
                <h6 class="card-subtitle mb-4 text-muted">Gunakan Control Panel untuk simulasi kebocoran gas
                    ini.</h6>
                <form method="post" action="index.php">
                    <div class="form-check-inline mb-3">
                        Kondisi gas <br>
                        <input class="form-check-input" type="radio" name="kondisiGas" id="kondisiGas1" value="Aman"
                            checked>
                        <label class="form-check-label mx-2" for="kondisiGas1">
                            Aman
                        </label>

                        <input class="form-check-input" type="radio" name="kondisiGas" id="kondisiGas2" value="Bocor">
                        <label class="form-check-label mx-2" for="kondisiGas2">
                            Bocor
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Simulasi</button>
                </form>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>