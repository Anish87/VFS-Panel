<?php
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vice Freemode Server</title>
    <link rel="stylesheet" href="style.css">
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
                <a class="nav-link" aria-current="page" href="./"> <i class="fas fa-home"></i> Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href=""> <i class="fas fa-chart-pie"></i> Top Charts</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../forum/"> <i class="fas fa-comments"></i> Forum</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../discord/"> <i class="fab fa-discord"></i> &nbsp;Discord</a>
              </li>

              <?php
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
                    echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hi, '.$_SESSION["username"].'</a>
                            <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item disabled" href="#">Coming Soon</a></li>
                                <li><a class="dropdown-item disabled" href="#">Coming Soon</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                          </li>';
                } else {
                    echo '<li class="nav-item">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class="nav-link btn btn-custom text-light" style="background: #111;"> <i class="fas fa-user"></i> &nbsp; Login</a>
                          </li>';
                }
              ?>
          </div>
        </div>
    </nav>
    <main>
        <div class="stats-content container-fluid">
            <div class="row text-center mt-3">
                <h1>TOP CHARTS</h1>
                <hr class="blue-hr">
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5 mt-3">
                    <div class="card" style="background: none;">
                        <div class="card-header text-center" style="background: #004fea;"><h2>TOP KILLERS</h2></div>
                        <div class="card-body" style="background: #151515;">
                            <div class="card-text">
                                <table class="table table-borderless text-light">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Kills</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $sql = "SELECT * FROM accounts ORDER BY Kills DESC LIMIT 5";
                                        $result = mysqli_query($conn, $sql);

                                        while($row = mysqli_fetch_array($result))
                                        {
                                            echo '<tr>';
                                            echo '<th>'.$i; $i++.'</th>';
                                            echo '<td>'.$row["Name"].'</td>';
                                            echo '<td>'.$row["Kills"].'</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-3">
                    <div class="card" style="background: none;">
                        <div class="card-header text-center" style="background: #004fea;"><h2>TOP DEATHS</h2></div>
                        <div class="card-body" style="background: #151515;">
                            <div class="card-text">
                                <table class="table table-borderless text-light">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Deaths</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $sql = "SELECT * FROM accounts ORDER BY Deaths DESC LIMIT 5";
                                        $result = mysqli_query($conn, $sql);

                                        while($row = mysqli_fetch_array($result))
                                        {
                                            echo '<tr>';
                                            echo '<th>'.$i; $i++.'</th>';
                                            echo '<td>'.$row["Name"].'</td>';
                                            echo '<td>'.$row["Deaths"].'</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-1"></div>
                <div class="col-md-5 mt-3">
                    <div class="card" style="background: none;">
                        <div class="card-header text-center" style="background: #004fea;"><h2>TOP ROBBERS</h2></div>
                        <div class="card-body" style="background: #151515;">
                            <div class="card-text">
                                <table class="table table-borderless text-light">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Robskills</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $sql = "SELECT * FROM accounts ORDER BY Robskills DESC LIMIT 5";
                                        $result = mysqli_query($conn, $sql);

                                        while($row = mysqli_fetch_array($result))
                                        {
                                            echo '<tr>';
                                            echo '<th>'.$i; $i++.'</th>';
                                            echo '<td>'.$row["Name"].'</td>';
                                            echo '<td>'.$row["Robskills"].'</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-3">
                    <div class="card" style="background: none;">
                        <div class="card-header text-center" style="background: #004fea;"><h2>TOP COPS</h2></div>
                        <div class="card-body" style="background: #151515;">
                            <div class="card-text">
                                <table class="table table-borderless text-light">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Copskills</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $sql = "SELECT * FROM accounts ORDER BY Copskills DESC LIMIT 5";
                                        $result = mysqli_query($conn, $sql);

                                        while($row = mysqli_fetch_array($result))
                                        {
                                            echo '<tr>';
                                            echo '<th>'.$i; $i++.'</th>';
                                            echo '<td>'.$row["Name"].'</td>';
                                            echo '<td>'.$row["Copskills"].'</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
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