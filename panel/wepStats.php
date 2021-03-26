<?php
session_start();
include('config.php');
include('./components/functions.php');
$username = $_SESSION["username"];
$sql = "SELECT * FROM wstats WHERE Name='$username'";
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
                <div class="row mt-3">
                    <center>
                        <h1>WEAPON STATS</h1>
                        <hr>
                    </center>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3">
                        <div class="card" style="background: none;">
                            <div class="card-header" style="background: #004fea;">ASSAULT RIFLES</div>
                            <div class="card-body" style="background: #151515; height: 20vh;">
                                <div class="card-text text-start">
                                    <ul style="list-style: none;">
                                        <li>M4 - <?php echo $qq["M4"]; ?> </li>
                                        <li>Ruger - <?php echo $qq["Ruger"]; ?> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="card" style="background: none;">
                            <div class="card-header" style="background: #004fea;">SNIPER RIFLES</div>
                            <div class="card-body" style="background: #151515; height: 20vh;">
                                <div class="card-text text-start">
                                    <ul style="list-style: none;">
                                        <li>Sniper - <?php echo $qq["Sniper"]; ?> </li>
                                        <li>Laserscope Rifle - <?php echo $qq["LaserScope"]; ?> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="card" style="background: none;">
                            <div class="card-header" style="background: #004fea;">SPECIAL WEAPONS</div>
                            <div class="card-body" style="background: #151515; height: 20vh;">
                                <div class="card-text text-start">
                                    <ul style="list-style: none;">
                                        <li>M60 - <?php echo $qq["M60"]; ?> </li>
                                        <li>Rocket Launcher - <?php echo $qq["RPG"]; ?> </li>
                                        <li>Flame Thrower - <?php echo $qq["FlameThrower"]; ?> </li>
                                        <li>Minigun - <?php echo $qq["Minigun"]; ?> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-3">
                        <div class="card" style="background: none;">
                            <div class="card-header" style="background: #004fea;">SUB-MACHINE GUNS</div>
                            <div class="card-body" style="background: #151515; height: 30vh;">
                                <div class="card-text text-start">
                                    <ul style="list-style: none;">
                                        <li>MP5 - <?php echo $qq["MP5"]; ?> </li>
                                        <li>Tec9 - <?php echo $qq["Tec9"]; ?> </li>
                                        <li>Uzi - <?php echo $qq["Uzi"]; ?> </li>
                                        <li>Ingram - <?php echo $qq["Ingram"]; ?> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="card" style="background: none;">
                            <div class="card-header" style="background: #004fea;">MEELEE</div>
                            <div class="card-body" style="background: #151515; height: 30vh;">
                                <div class="card-text text-start row">
                                    <ul class="col-md-6" style="list-style: none;">
                                        <li>Fist - <?php echo $qq["Fist"]; ?> </li>
                                        <li>Baseball Bat - <?php echo $qq["Bat"]; ?> </li>
                                        <li>Brass Knuckles - <?php echo $qq["Knuckles"]; ?> </li>
                                        <li>Screwdriver - <?php echo $qq["Screwdriver"]; ?> </li>
                                        <li>Golf Club - <?php echo $qq["GolfClub"]; ?> </li>
                                        <li>Nitestick - <?php echo $qq["Nightstick"]; ?> </li>
                                        <li>Knife - <?php echo $qq["Knife"]; ?> </li>
                                    </ul>
                                    <ul class="col-md-6" style="list-style: none;">
                                        <li>Hammer - <?php echo $qq["Hammer"]; ?> </li>
                                        <li>Meat Cleaver - <?php echo $qq["Cleaver"]; ?> </li>
                                        <li>Machete - <?php echo $qq["Machete"]; ?> </li>
                                        <li>Katana - <?php echo $qq["Katana"]; ?> </li>
                                        <li>Chainsaw - <?php echo $qq["Chainsaw"]; ?> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="card" style="background: none;">
                            <div class="card-header" style="background: #004fea;">THROWABLES</div>
                            <div class="card-body" style="background: #151515; height: 30vh;">
                                <div class="card-text text-start">
                                    <ul style="list-style: none;">
                                        <li>Grenade - <?php echo $qq["Grenade"]; ?> </li>
                                        <li>Remote Grenade - <?php echo $qq["Remote"]; ?> </li>
                                        <li>Tear Gas - <?php echo $qq["TearGas"]; ?> </li>
                                        <li>Molotov Cocktail - <?php echo $qq["Molotov"]; ?> </li>
                                    </ul>
                                </div>
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