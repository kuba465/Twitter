<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    include '../src/User.php';
    if (User::verifyEmailFromUser($_POST['userEmail']) === false) {
        echo "Podałeś złego e-maila.";
    } elseif (User::verifyUsernameFromUser($_POST['userName']) === false) {
        echo "Podałeś złą nazwę uż←tkownika.";
    } elseif (User::verifyPasswordFromUser($_POST['userPassword']) === false) {
        echo "Podałeś złe hasło.";
    } else {
        include '../config.php';

        $user = User::loadUserById($conn, $_SESSION['id']);
        $user->setEmail($_POST['userEmail']);
        $user->setUsername($_POST['userName']);
        $user->setPassword($_POST['userPassword']);

        if ($user->saveToDB($conn) === true) {
            $_SESSION['id'] = $user->getId();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['username'] = $user->getUsername();

            header("refresh:5;url=../profiles/user_profile.php");
            echo "Zmieniłeś swoje dane. Zostaniesz przeniesiony na stronę główną za 5 sekund.";
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
        <title>Twitter - Zmiana ustawień</title>
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>

        <div class="float-left">
            <div class="container">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <a href="../profiles/user_profile.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-circle-arrow-left"></div> Powrót do strony głównej</button></a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="../messages/messages.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-inbox"></div> Wiadomości</button></a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="../login.php?logout"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-off"></div> Wyloguj się</button></a>
                    </div>
                    <div class="btn-group" role="group">
                        <p>Jesteś zalogowany jako: <?php echo $_SESSION['username']; ?></p>
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
                        <legend>Edycja użytkownika</legend>
                        <div class="form-group">
                            <label for="">Nazwa użytkownika</label>
                            <input type="text" class="form-control" name="userName" id="userName" placeholder="Nazwa użytkownika"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">E-mail użytkownika</label>
                            <input type="email" class="form-control" name="userEmail" id="userEmail"
                                   placeholder="E-mail użytkownika"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">Hasło użytkownika</label>
                            <input type="password" class="form-control" name="userPassword" id="userPassword"
                                   placeholder="Hasło użytkownika">
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary">Edytuj</button>
                    </form>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                </div>
            </div>
        </div>

    </body>
</html>