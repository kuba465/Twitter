<?php
session_start();
include '../config.php';
include '../src/User.php';
include '../src/Message.php';
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    echo 'Musisz być zalogowany żeby oglądać profile.';
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $messageId = $_GET['id'];
        $message = Message::loadMessageById($conn, $messageId);
        if ($message->getSenderId() == $_SESSION['id'] || $message->getReceiverId() == $_SESSION['id']) {
            $message->saveToDB($conn);
        } else {
            header("Location: messages.php");
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../search_form_service_other_pages.php';
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Twitter - wiadomość</title>
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
                        <a href="send_message.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-envelope"></div> Wyślij wiadomość</button></a>
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
            <div class="btn-group" role="group">
                <p><?php include '../search_form.php'; ?></p>
            </div>
        </div>
        <div class="container">
            <h3>
                Wiadomość: 
            </h3>
        </div>
        <div class="container">
            <div class="panel panel-default">
                <table class = "table">
                    <?php
                    if ($message !== null) {
                        echo '<tr><th>Autor</th><td><a href="../profiles/user_profile.php?id=' . $message->getSenderId() . '">' . $message->getSenderUsername() . '</a></td></tr>';
                        echo '<tr><th>Odbiorca</th><td><a href="../profiles/user_profile.php?id=' . $message->getReceiverId() . '">' . $message->getReceiverUsername() . '</a></td></tr>';
                        echo '<tr><th>Treść wiadomości</th><td>' . $message->getText() . '</td></tr>';
                        echo '<tr><th>Data odebrania</th><td>' . $message->getCreationTime() . '</td></tr>';
                    } else {
                        echo "Brak takiej wiadomości.<br>";
                    }
                    ?>
                </table>
            </div>
            <div class="container">
                <a href="../messages/send_message.php?id=<?php echo $message->getSenderId(); ?>"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-envelope"></div> Odpowiedz</button></a>
            </div>
        </div>
    </body>
</html>