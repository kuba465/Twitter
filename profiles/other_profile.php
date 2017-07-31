<?php
include '../config.php';
include '../src/User.php';
include '../src/Tweet.php';
include '../src/Comment.php';
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    echo 'Musisz być zalogowany żeby oglądać profile.';
}
$otherUserId = $_GET['id'];
$otherUser = User::loadUserById($conn, $otherUserId);
$otherUserTweets = Tweet::loadTweetsByUserId($conn, $otherUserId);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../search_form_service.php';
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Twitter - użytkownik: <?php echo $otherUser->getUsername(); ?></title>
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">

                <div class="btn-group" role="group">
                    <a href="user_profile.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-circle-arrow-left"></div> Wróć do swojej strony głównej</button></a>
                </div>
                <div class="btn-group" role="group">
                    <a href="../messages/send_message.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-envelope"></div> Wyślij wiadomość do użytkownika: <?php echo $otherUser->getUsername(); ?></button></a>
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
        <h3>
            Wpisy użytkownika: <?php echo $otherUser->getUsername(); ?>
        </h3>
        <div class="panel panel-default">
            <table class = "table">
                <?php
                if (count($otherUserTweets) > 0) {
                    echo '<tr><th>Treść wpisu</th><th>data</th><th>Komentarze</th></tr>';
                    foreach ($otherUserTweets as $row) {
                        echo '<tr><td><a href="../tweet.php?tweetId=' . $row->getId() . '">' . $row->getText() . "</a></td><td>" . $row->getCreationTime() . "</td><td>" . count(Comment::loadCommentsByTweetId($conn, $row->getId())) . "</td></tr>";
                    }
                } else {
                    echo "Brak wpisów<br>";
                }
                ?>
            </table>
        </div>
    </body>
</html>