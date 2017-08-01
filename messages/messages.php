<?php
session_start();
include '../config.php';
include '../src/User.php';
include '../src/Message.php';
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    echo 'Musisz być zalogowany żeby oglądać profile.';
}
$messages = Message::loadMessagesByReceiverId($conn, $_SESSION['id']);
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
        <title>Twitter - wiadomości</title>
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
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
        <div class="container">
            <div class="btn-group" role="group">
                <p><?php include '../search_form.php'; ?></p>
            </div>
        </div>
        <div class="container">
            <h3>
                Wiadomości: 
            </h3>
        </div>
        <div class="container">
            <div class="panel panel-default">
                <table class = "table">
                    <?php
                    if (count($messages) > 0) {
                        echo '<tr><th>Autor</th><th>Treść wiadomości</th><th>Data odebrania</th></tr>';
                        foreach ($messages as $row) {
                            $short = strlen($row->getText()) > 30 ? substr($row->getText(), 0, 30) . "..." : $row->getText();
                            if ($row->getIsRead() == 0) {
                                echo '<tr><td><a href="../profiles/user_profile.php?id=' . $row->getSenderId() . '">' . $row->getSenderUsername() . "</a></td>"
                                . '<td><strong><a href="message.php?id=' . $row->getId() . '">' . $short . "</a></strong></td>"
                                . "<td>" . $row->getCreationTime() . "</td></tr>";
                            } else {
                                echo '<tr><td><a href="../profiles/user_profile.php?id=' . $row->getSenderId() . '">' . $row->getSenderUsername() . "</a></td>"
                                . '<td><a href="message.php?id=' . $row->getId() . '">' . $short . "</a></td>"
                                . "<td>" . $row->getCreationTime() . "</td></tr>";
                            }
                        }
                    } else {
                        echo "Brak wiadomości<br>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>