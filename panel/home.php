<?php
session_start();
include('./config.php');
include('./components/functions.php');
$username = $_SESSION["username"];
$sql = "SELECT * FROM accounts WHERE Name='$username'";
$result = mysqli_query($conn, $sql);
$qq = mysqli_fetch_assoc($result);
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header('location: ./');
}
if($qq['FreeroamStats'] == "NULL") $freeroam = array("Respect" => "0", "MissionsAttempted" => "0", "MissionsDone" => "0", "DaysPassed" => "0", "Rampages" => "0", "Jumps" => "0", "Stacks" => "0", "DistOnFoot" => "0", "DistByVeh" => "0");
else $freeroam = json_decode($qq['FreeroamStats'], true);
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
                <a class="nav-link" href="./tops.php"> <i class="fas fa-chart-pie"></i> Top Charts</a>
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
        <div class="home-content mt-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="text-center">
                        <hr class="blue-hr">
                        <h3>PLAYER INFORMATION [ <span class="username-span"><?php echo $_SESSION["username"]; ?></span> ]</h3>
                        <hr class="blue-hr">
                        <ul style="list-style: none; margin-left: -15px; color: #F5FFFA;">
                            <li><img style="height: 128px; width: 128px; border-radius: 100%;" src="https://avatars.dicebear.com/api/initials/<?php echo substr($_SESSION["username"], 0, 1); ?>.svg?background=%23004fea"></li>
                            <br>
                            <li>Name: <?php echo $_SESSION["username"]; ?></li>
                            <li>Playtime: <?php echo ReadPlayTime($qq["Playtime"]); ?></li>
                            <li>Last Active: <?php echo ReadLastActive($qq["LastActive"]); ?></li>
                            <li>Joins: <?php echo ''.$qq["Joins"].''; ?></li>
                            <li>Vehicles Owned: <?php echo ''.$qq["CarsOwned"].''; ?></li>
                            <li>Properties Owned: <?php echo ''.$qq["PropsOwned"].''; ?></li>
                            <li>Cash: <?php echo '<span style="color: #30ff30;">$'.$qq["Cash"].'</span>'; ?></li>
                            <li>Bank: <?php echo '<span style="color: #30ff30;">$'.$qq["Bank"].'</span>'; ?></li>
                            <li>Phone Balance: <?php echo '<span style="color: #30ff30;">$'.$qq["Balance"].'</span>'; ?></li>
                            <li><strong>NOTE</strong>: Avatar changing feature will be available soon.</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center">
                        <hr class="blue-hr">
                        <h2>STATISTICS</h2>
                        <hr class="blue-hr">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="accordion" id="threeStats">
                                <div class="accordion-item">
                                    <h2 class="accordion-header text-center" id="headingDM">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDM" aria-expanded="true" aria-controls="collapseOne" style="color: #F5FFFA; background: #004FEA;">
                                            DEATHMATCH
                                        </button>
                                    </h2>
                                    <div id="collapseDM" class="accordion-collapse collapse show" aria-labelledby="headingDM" data-bs-parent="#threeStats">
                                        <div class="accordion-body text-center" style="background: #151515;">
                                            <ul style="list-style: none; text-align: left;">
                                                <li>Kills: <?php echo ''.$qq["Kills"].''; ?></li>
                                                <li>Deaths: <?php echo ''.$qq["Deaths"].''; ?></li>
                                                <li>K/D Ratio: <?php echo ShowRatio($qq["Kills"], $qq["Deaths"]); ?></li>
                                                <li>Sprees: <?php echo ''.$qq["Sprees"].''; ?></li>
                                                <li>Top Spree: <?php echo ''.$qq["TopSpree"].''; ?></li>
                                                <li>Hits Taken: <?php echo ''.$qq["Hits"].''; ?></li>
                                            </ul>
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#bsModal" class="btn btn-custom" style="background: #004FEA; color: #F5FFFA;">Body Stats</a> 
                                            <a href="wepStats.php" class="btn btn-custom" style="background: #004FEA; color: #F5FFFA;">Weapon Stats</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingRP">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRP" aria-expanded="true" aria-controls="collapseOne" style="color: #F5FFFA; background: #004FEA;">
                                            ROLEPLAY
                                        </button>
                                    </h2>
                                    <div id="collapseRP" class="accordion-collapse collapse" aria-labelledby="headingRP" data-bs-parent="#threeStats">
                                        <div class="accordion-body" style="background: #151515;">
                                            <ul class="mt-3" style="list-style: none; text-align: left; margin-left: 20px;">
                                                <li>Robskills: <?php echo ''.$qq["Robskills"].''; ?></li>
                                                <li>Copskills: <?php echo ''.$qq["Copskills"].''; ?></li>
                                                <li>Trash Collector Skills: <?php echo ''.$qq["TrashSkills"].''; ?></li>
                                                <li>Successful Smuggles: <?php echo ''.$qq["Smuggled"].''; ?></li>
                                                <li>Fishing Skills: <?php echo ''.$qq["FishSkills"].''; ?></li>
                                                <li>Pizza Delivery Skills: <?php echo ''.$qq["PizzaDelivered"].''; ?></li>
                                                <li>Coffin Delivery Skills: <?php echo ''.$qq["CoffinSkills"].''; ?></li>
                                                <li>Medic Skills: <?php echo ''.$qq["Heals"].''; ?></li>
                                                <li>Mechanic Skills: <?php echo ''.$qq["FixSkills"].''; ?></li>
                                                <li>Baggage Handler Skills: <?php echo ''.$qq["BaggageSkills"].''; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFreeroam">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFreeroam" aria-expanded="true" aria-controls="collapseOne" style="color: #F5FFFA; background: #004FEA;">
                                            FREEROAM
                                        </button>
                                    </h2>
                                    <div id="collapseFreeroam" class="accordion-collapse collapse" aria-labelledby="headingFreeroam" data-bs-parent="#threeStats">
                                        <div class="accordion-body" style="background: #151515;">
                                            <ul class="mt-3" style="list-style: none; text-align: left; margin-left: 20px;">
                                                <li>Respect Points: <?php echo $freeroam['Respect']; ?></li>
                                                <li>Missions Attempted: <?php echo $freeroam['MissionsAttempted']; ?></li>
                                                <li>Missions Completed: <?php echo $freeroam['MissionsDone']; ?></li>
                                                <li>Days Passed: <?php echo $freeroam['DaysPassed']; ?></li>
                                                <li>Rampages Done: <?php echo $freeroam['Rampages']; ?></li>
                                                <li>Jumps Done: <?php echo $freeroam['Jumps']; ?></li>
                                                <li>Stacks Collected: <?php echo $freeroam['Stacks']; ?></li>
                                                <li>Distance on Foot: <?php echo $freeroam['DistOnFoot']; ?></li>
                                                <li>Distance by Vehicle: <?php echo $freeroam['DistByVeh']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                        <div class="accordion" id="sixStats">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingBR">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBR" aria-expanded="true" aria-controls="collapseBR" style="color: #F5FFFA; background: #004FEA;">
                                            BATTLE ROYALE
                                        </button>
                                    </h2>
                                    <div id="collapseBR" class="accordion-collapse collapse" aria-labelledby="headingBR" data-bs-parent="#sixStats">
                                        <div class="accordion-body" style="background: #151515;">
                                        Coming Soon
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTDM">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTDM" aria-expanded="true" aria-controls="collapseTDM" style="color: #F5FFFA; background: #004FEA;">
                                            TEAM DEATHMATCH
                                        </button>
                                    </h2>
                                    <div id="collapseTDM" class="accordion-collapse collapse" aria-labelledby="headingTDM" data-bs-parent="#sixStats">
                                        <div class="accordion-body" style="background: #151515;">
                                            Coming Soon
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingRace">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRace" aria-expanded="true" aria-controls="collapseRace" style="color: #F5FFFA; background: #004FEA;">
                                            RACE
                                        </button>
                                    </h2>
                                    <div id="collapseRace" class="accordion-collapse collapse" aria-labelledby="headingRace" data-bs-parent="#sixStats">
                                        <div class="accordion-body" style="background: #151515;">
                                            Coming Soon
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade bg-custom" style="background: #111111aa;" id="bsModal" tabindex="-1" aria-labelledby="bsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" style="background: #151515; font-family: 'Monda', sans-serif;">
            <div class="modal-header" style="background: #004FEA; border: none;">
              <h5 class="modal-title" id="bsModalLabel" style="color: #F5FFFA;">BODY STATS</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul style="list-style: none; margin-left: -15px; color: #F5FFFA;">
                    <?php
                    $sql = "SELECT * FROM bstats WHERE Name='$username'";
                    $result = mysqli_query($conn, $sql);
                    $qq = mysqli_fetch_assoc($result);
                    ?>
                    <li>Head: <?php echo $qq["Head"]; ?></li>
                    <li>Body: <?php echo $qq["Body"]; ?></li>
                    <li>Torso: <?php echo $qq["Torso"]; ?></li>
                    <li>Right Leg: <?php echo $qq["RLeg"]; ?></li>
                    <li>Right Arm: <?php echo $qq["RArm"]; ?></li>
                    <li>Left Leg: <?php echo $qq["LLeg"]; ?></li>
                    <li>Left Arm: <?php echo $qq["LArm"]; ?></li>
                </ul>
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