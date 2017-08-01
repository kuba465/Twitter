<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
}
include 'config.php';
include 'src/Tweet.php';
include 'src/Comment.php';

$tweetId = $_GET['tweetId'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'search_form_service_other_pages.php';
    if (isset($_POST['newComment'])) {
        if (!isset($_POST['userComment']) || is_null($_POST['userComment']) || strlen($_POST['userComment']) <= 0) {
            echo "Zła treść komentarza.";
        } else {
            $comment = new Comment();
            $comment->setTweetId($tweetId);
            $comment->setUserId($_SESSION['id']);
            $comment->setText($_POST['userComment']);
            $comment->setUsername($_SESSION['username']);

            $comment->saveToDB($conn);
        }
    }
}

$tweet = Tweet::loadTweetById($conn, $tweetId);
$comments = Comment::loadCommentsByTweetId($conn, $tweetId);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Twitter - Wpis</title>
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="float-left">
            <div class="container">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <a href="profiles/user_profile.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-circle-arrow-left"></div> Powrót do strony głównej</button></a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="all_tweets.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-home"></div> Wszystkie tweety z bazy</button></a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="messages/messages.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-inbox"></div> Wiadomości</button></a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="login.php?logout"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-off"></div> Wyloguj się</button></a>
                    </div>
                    <div class="btn-group" role="group">
                        <p>Jesteś zalogowany jako: <?php echo $_SESSION['username']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="btn-group" role="group">
                <p><?php include 'search_form.php'; ?></p>
            </div>
        </div>
        <div class="float-left">
            <div class="container">
                <div class="panel panel-default">
                    <table class="table">
                        <tr><th>Autor</th><th>Treść wpisu</th><th>Data opublikowania</th></tr>
                        <?php
                        echo '<tr><td><a href="profiles/user_profile.php?id="' . $tweet->getUserId() . '">' . $tweet->getUsername() . "</a></td><td>" . $tweet->getText() . "</td><td>" . $tweet->getCreationTime() . "</td></tr>";
                        ?>
                    </table>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <form action="" method="post" role="form">
                            <legend>Dodawanie komentarza</legend>
                            <div class="form-group">
                                <label for="">Treść komentarza</label>
                                <input type="text" class="form-control" name="userComment" id="userComment" maxlength="60" placeholder="Treść komentarza"
                                       value="">
                            </div>
                            <button type="submit" name="newComment" class="btn btn-primary">Skomentuj</button>
                        </form>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    </div>
                </div>
            </div>
            <div class="container">
                <h3>
                    Komentarze: 
                </h3>
            </div>
            <div class="container">
                <div class="panel panel-default">
                    <table class = "table">
                        <?php
                        if (count($comments) > 0) {
                            echo '<tr><th>Autor</th><th>Treść komentarza</th><th>Data dodania</th></tr>';
                            foreach ($comments as $row) {
                                echo '<tr><td><a href="profiles/user_profile.php?id=' . $row->getUserId() . '">' . $row->getUsername() . "</a></td><td>" . $row->getText() . "</td><td>" . $row->getCreationTime() . "</td></tr>";
                            }
                        } else {
                            echo "Brak wpisów<br>";
                        }
                        ?>
                    </table>
                </div>
            </div>
    </body>
</html>