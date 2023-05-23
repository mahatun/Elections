<?php
include_once 'dbh.inc.php';
session_start();

if (isset($_GET["disconnect"])) {
    session_unset();
    session_destroy();
}


if (isset($_SESSION["USER_ID"])) {
    header("dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gerstion de vote Login in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php 
        $id = "";
        $idError = $psdError = "";
        $submit = true;
        $emp_exists= false;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = mysqli_real_escape_string($conn, $_POST['email']);
            $psd = mysqli_real_escape_string($conn, $_POST['psd']);
            $psd = sha1($psd);
            if (empty($id)) {
                $idError = "Veuillez entrer votre email";
                $submit = false;
            }
            $sql = "SELECT * FROM user;";
            //$result = $conn->query($sql);
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $password = $row['password'];
                    if($row['email'] == $id) {
                        $emp_exists = true;
                        $user_name = $row['username'];
                        $_SESSION["USER_NAME"] = $user_name;
                        $_SESSION["USER_ID"] = $row['user_id'];
                        $_SESSION["admin"] = $row['is_admin'];

                        $password = $row['password'];
                        break;
                    }

                }
            }
            if(!$emp_exists) {
                $idError = "email non valide";
                $submit = false;
            }
            if (empty($psd)) {
                $psdError = "Veuillez entrer votre mot de passe";
                $submit = false;
            }
            if($psd != $password ){
                $psdError = "Mot de passe incorrect";
                $submit = false;
            }
        }
        else {
            $submit = false;
        }
        if($submit == false) { ?>
          <section>
        <div class="form-box">
            <div class="form-value">
                <form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <h2 >Login</h2>
                    <div class="inputbox">
                        <ion-icon name="id-card-outline"></ion-icon>
                        <input type="email" name="email"  id="email" >
                        <label for="email">email</label>
                        <span class="text-danger"><?php echo $idError; ?></span>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="psd" id="psw">
                        <label for="psw">Mot de passe</label>
                        <span class="text-danger"><?php echo $psdError; ?></span>
                    </div>

                    <a class ="register" href="register.php">it you are ne you can register here</a>
                    <button type="submit" >Log in</button>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <?php
        } else {
           header("Location:dashboard.php");
        }
    ?>
</body>
</html>