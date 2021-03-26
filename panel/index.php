<?php
session_start();
include('config.php');

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    header('location: ./home.php');
}

$sql = "SELECT * FROM accounts";
$result = mysqli_query($conn, $sql);
$pr = mysqli_num_rows($result);

$sql = "SELECT * FROM vehicles";
$result = mysqli_query($conn, $sql);
$vr = mysqli_num_rows($result);

$sql = "SELECT * FROM properties";
$result = mysqli_query($conn, $sql);
$props = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vice Freemode Server</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body style="background: #101010;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom" style="background: #004FEA; font-family: 'Monda', sans-serif;">
        <div class="container-fluid">
          <a class="navbar-brand" href="./">Vice Freemode Server</a>
          <button class="navbar-toggler" style="color: #F5FFFA; border-radius: 0px; border: none;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon" style="color: #F5FFFA !important;"></span> -->
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href=""> <i class="fas fa-home"></i> Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="./tops.php"> <i class="fas fa-chart-pie"></i> Top Charts</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../forum/"> <i class="fas fa-comments"></i> Forum</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../discord/"> <i class="fab fa-discord"></i> &nbsp;Discord</a>
              </li>

              <li class="nav-item">
                <a type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class="nav-link btn btn-custom text-light" style="background: #111;"> <i class="fas fa-user"></i> &nbsp; Login</a>
              </li>
          </div>
        </div>
    </nav>
    <main>
        <div class="banner d-flex align-items-center justify-content-center">
            <h1>VICE FREEMODE SERVER</h1>
        </div>
        <div class="main-content mt-4">
            <div class="container-fluid">
                <div class="row mt-3 d-flex align-items-center justify-content-center text-center">
                    <h1>Information</h1>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3">
                        <div class="card info-cards">
                            <div class="card-header text-center bg-custom info-header">
                                Players Registered
                            </div>
                            <div class="card-body">
                                <div class="card-text text-center">
                                    <?php
                                    echo $pr;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="card info-cards">
                            <div class="card-header text-center bg-custom info-header">
                                Vehicles Available
                            </div>
                            <div class="card-body">
                                <div class="card-text text-center">
                                    <?php
                                    echo $vr;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="card info-cards">
                            <div class="card-header text-center bg-custom info-header">
                                Properties Available
                            </div>
                            <div class="card-body">
                                <div class="card-text text-center">
                                    <?php
                                    echo $props;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 mb-4 text-center" style="color: #F5FFFA;">
                    <h1>Quick Links</h1>
                    <div class="col-md-3 mt-2">
                        <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    </div>

                    <div class="col-md-3 mt-2">
                        <button class="btn btn-warning w-100" onclick="location.href='../forum/'">Forum</button>
                    </div>

                    <div class="col-md-3 mt-2">
                        <button class="btn btn-custom w-100 text-light" onclick="location.href='../discord/'" style="background-color: #7289da;">Discord</button>
                    </div>

                    <div class="col-md-3 mt-2">
                        <button class="btn btn-custom w-100 text-light" style="background-color: #00b3ea;">Server</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade bg-custom" style="background: #111111aa;" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" style="background: #151515; font-family: 'Monda', sans-serif;">
            <div class="modal-header" style="background: #004FEA; border: none;">
              <h5 class="modal-title" id="loginModalLabel" style="color: #F5FFFA;">Login</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="login.php">
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="background: #090909; color: #F5FFFA; border: none;" id="basic-addon1"><i class="fas fa-user"></i></span>
                        <input name="username" type="text" style="background: #222222; color: #F5FFFA; border: none;" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="background: #090909; color: #F5FFFA; border: none;" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        <input name="password" type="password" style="background: #222222; color: #F5FFFA; border: none;" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <input name="login" class="form-control btn btn-custom" style="background: #004FEA; color: #F5FFFA;" type="submit" value="Login">
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    <footer class="mt-5">
        <p class="text-muted text-center">Copyrights Reserved &copy; Vice Freemode Server</p>
        <p class="text-muted text-center">Website Designed and Developed by <a href="https://vfs.vcmp.net/forum/index.php?/profile/1-anish/">Anish</a></p>
    </footer>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/156a8324f0.js" crossorigin="anonymous"></script>
</html>