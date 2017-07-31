<?php
session_start();

if (isset($_SESSION['id'])) {
    header("Location: profiles/user_profile.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    include '../src/User.php';
    if (User::verifyEmailFromUser($_POST['userEmail']) === false) {
        echo "Podałeś złego e-maila.";
    } elseif (User::verifyUsernameFromUser($_POST['userName']) === false) {
        echo "Podałeś złą nazwę użytkownika.";
    } elseif (User::verifyPasswordFromUser($_POST['userPassword']) === false) {
        echo "Podałeś złe hasło.";
    } else {
        include '../config.php';

        $user = new User();
        $user->setEmail($_POST['userEmail']);
        $user->setUsername($_POST['userName']);
        $user->setPassword($_POST['userPassword']);

        if ($user->saveToDB($conn) === true) {
            $_SESSION['id'] = $user->getId();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['username'] = $user->getUsername();

//            header("Location: ../profiles/user_profile.php");
            header("refresh:5;url=../profiles/user_profile.php");
            echo "Zarejestrowałeś konto ".$_SESSION['username']. ". Zostaniesz zalogowany za 5 sekund.";
        } else {
            echo "Podałeś złe dane logowania";
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
        <title>Twitter - Utworzenie użytkownika</title>
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>

        <div class="float-left">
            <div class="container">
                <div class="btn-group" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <a href="../login.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-circle-arrow-left"></div> Powrót do logowania</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <form action="" method="post" role="form">
                        <legend>Utworzenie użytkownika</legend>
                        <div class="form-group">
                            <label for="">Nazwa użytkownika</label>
                            <input type="text" class="form-control" name="userName" id="userName" placeholder="Nazwa użytkownika">
                        </div>
                        <div class="form-group">
                            <label for="">Email użytkownika</label>
                            <input type="text" class="form-control" name="userEmail" id="userEmail"
                                   placeholder="Email użytkownika">
                        </div>
                        <div class="form-group">
                            <label for="">Hasło użytkownika</label>
                            <input type="password" class="form-control" name="userPassword" id="userPassword"
                                   placeholder="Hasło użytkownika">
                        </div>
                        <button type="submit" name="register" class="btn btn-primary">Stwórz</button>
                    </form>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                </div>
            </div>
        </div>

    </body>
</html>