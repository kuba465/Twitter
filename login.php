<?php
session_start();
if (isset($_GET['logout'])) {
    session_unset();
}

if (isset($_SESSION['id'])) {
    header("Location: profiles/user_profile.php");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        include 'src/User.php';
        if (User::verifyEmailFromUser($_POST['userEmail']) === false) {
            echo "Podałeś złego e-maila.";
        } elseif (User::verifyPasswordFromUser($_POST['userPassword']) === false) {
            echo "Podałeś złe hasło.";
        } else {
            include 'config.php';
            $user = User::login($conn, $_POST['userEmail'], $_POST['userPassword']);
            //dlaczego chcąc przypisać cały obiekt do zmiennej $_SESSION to dostaję obiekt "__PHP_Incomplete_Class_Name"?
            if ($user !== false) {
                $_SESSION['id'] = $user->getId();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['username'] = $user->getUsername();
                header("Location: profiles/user_profile.php");
            } else {
                echo "Podałeś złe dane logowania";
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Twitter - Login</title>
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <a href="register_edit/register_user.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-asterisk"></div>Zarejestuj się!</button></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <form action="" method="post" role="form">
                        <legend>Logowanie użytkownika</legend>
                        <div class="form-group">
                            <label for="">E-mail użytkownika</label>
                            <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="E-mail użytkownika"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">Hasło użytkownika</label>
                            <input type="password" class="form-control" name="userPassword" id="userPassword"
                                   placeholder="Hasło użytkownika"
                                   value="">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Wejdź</button>
                    </form>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
            </div>
        </div>

    </body>
</html>