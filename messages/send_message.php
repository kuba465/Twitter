<?php
session_start();
include '../config.php';
include '../src/User.php';
include '../src/Message.php';
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    echo 'Musisz być zalogowany żeby oglądać profile.';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../search_form_service_other_pages.php';
    if (isset($_POST['send'])) {
        if (!isset($_POST['text']) || is_null($_POST['text']) || strlen($_POST['text']) <= 0) {
            echo "Zła treśc wiadomości.<br>";
        } elseif ($_POST['userName'] == $_SESSION['username']) {
            echo "Nie możesz wysłać wiadomości do samego siebie.<br>";
        } else {
            $receiver = User::loadUserByUsername($conn, $_POST['userName']);
            if ($receiver === null) {
                return "Zła nazwa użytkownika.";
            }
            $newMessage = new Message();
            $newMessage->setSenderId($_SESSION['id']);
            $newMessage->setReceiverId($receiver->getId());
            $newMessage->setText($_POST['text']);
            $newMessage->setSenderUsername($_SESSION['username']);
            $newMessage->setReceivername($receiver->getUsername());

            $newMessage->saveToDB($conn);
            echo "Wiadomość wysłana<br>";
        }
    }
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $sender = User::loadUserById($conn, $_GET['id']);
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Twitter - Wysyłanie wiadomości</title>
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>

        <div class="float-left">
            <div class="container">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <a href="messages.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-circle-arrow-left"></div> Powrót do wiadomości</button></a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="../profiles/user_profile.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-circle-arrow-left"></div> Wróć do swojej strony głównej</button></a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="../all_tweets.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-home"></div> Wszystkie tweety z bazy</button></a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="sent_messages.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-share"></div> Wysłane wiadomości</button></a>
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
                        <legend>Wysyłanie wiadomości</legend>
                        <div class="form-group">
                            <label for="">Nazwa użytkownika odbiorcy</label>
                            <input type="text" class="form-control" name="userName" id="userName" placeholder="Nazwa użytkownika"
                                   value="<?php echo isset($_GET['id']) ? $sender->getUsername() : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Treść wiadomości</label>
                            <input type="text" class="form-control" name="text" id="text"
                                   placeholder="Wpisz treśc wiadomości"
                                   value="">
                        </div>
                        <button type="submit" name="send" class="btn btn-primary">Wyślij</button>
                    </form>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                </div>
            </div>
        </div>

    </body>
</html>