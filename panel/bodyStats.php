<?php
session_start();
include('config.php');
include('./components/functions.php');
$username = $_SESSION["username"];
$sql = "SELECT * FROM bstats WHERE Name='$username'";
$result = mysqli_query($conn, $sql);
$qq = mysqli_fetch_assoc($result);
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header('location: ./');
}
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
                <a class="nav-link active" aria-current="page" href="./"> <i class="fas fa-home"></i> Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="stats.php"> <i class="fas fa-chart-pie"></i> Stats</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../forum/"> <i class="fas fa-comments"></i> Forum</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../discord/"> <i class="fab fa-discord"></i> &nbsp;Discord</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo 'Hi, '.$_SESSION["username"]; ?></a>
                <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-dark" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item disabled" href="#">Coming Soon</a></li>
                    <li><a class="dropdown-item disabled" href="#">Coming Soon</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </li>
          </div>
        </div>
    </nav>
    <main>
        <div class="bodystats-content mt-4 text-center">
            <div class="container-fluid">
                <div class="row mt-3 d-flex align-items-center justify-content-start">
                    <center>
                        <h1>BODY STATS</h1>
                        <hr>
                    </center>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3">
                        <div class="card" style="background: none;">
                            <div class="card-header" style="background: #004fea;">HEAD</div>
                            <div class="card-body" style="background: #151515; height: 25vh;">
                                <div class="card-text"><h3><?php echo $qq["Head"]; ?></h3></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="card" style="background: none;">
                            <div class="card-header" style="background: #004fea;">BODY</div>
                            <div class="card-body" style="background: #151515; height: 25vh;">
                                <div class="card-text"><h3><?php echo $qq["Body"]; ?></h3></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="card" style="background: none;">
                            <div class="card-header" style="background: #004fea;">TORSO</div>
                            <div class="card-body" style="background: #151515; height: 25vh;">
                                <div class="card-text"><h3><?php echo $qq["Torso"]; ?></h3></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <div class="card" style="background: none;">
                            <div class="card-header" style="background: #004fea;">RIGHT LEG</div>
                            <div class="card-body"style="background: #151515; height: 25vh;">
                                <div class="card-text"><h3><?php echo $qq["RLeg"]; ?></h3></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="card" style="background: none;">
                            <div class="card-header" style="background: #004fea;">RIGHT ARM</div>
                            <div class="card-body" style="background: #151515; height: 25vh;">
                                <div class="card-text"><h3><?php echo $qq["RArm"]; ?></h3></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="card" style="background: none;">
                            <div class="card-header" style="background: #004fea;">LEFT LEG</div>
                            <div class="card-body" style="background: #151515; height: 25vh;">
                                <div class="card-text"><h3><?php echo $qq["LLeg"]; ?></h3></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="card" style="background: none;">
                            <div class="card-header" style="background: #004fea;">LEFT ARM</div>
                            <div class="card-body" style="background: #151515; height: 25vh;">
                                <div class="card-text"><h3><?php echo $qq["LArm"]; ?></h3></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p class="text-muted text-center">Copyrights Reserved &copy; Vice Freemode Server</p>
    </footer>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/156a8324f0.js" crossorigin="anonymous"></script>
</html>