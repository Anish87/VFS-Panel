<?php
include('config.php');
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    header("location: home.php");
    exit;
}

if(isset($_POST["login"]))
{
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $lowername = strtolower($username);
    $sql = "SELECT * FROM accounts WHERE LOWER(Name)='$lowername'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $dbpass = $row["Password"];
            $sha256pass = hash('sha256', $password);
            $sha256upper = strtoupper($sha256pass);
            if($dbpass == $sha256upper)
            {
                $_SESSION["username"] = $username;
                $_SESSION["loggedin"] = true;
                $_SESSION["pid"] = $row["ID"];
                header("location:home.php");
            } 
            else 
            {
                echo '<script>
                        alert("Incorrect password.");
                        window.location.href="index.php";
                      </script>';
            }
        }
    } 
    else 
    {
        echo '<script>
                alert("Incorrect username.");
                window.location.href="index.php";
              </script>';
    }
}

?>