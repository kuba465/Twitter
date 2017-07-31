<?php
include '../config.php';
include '../src/User.php';
include '../src/Tweet.php';
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    echo 'Musisz być zalogowany żeby oglądać profile.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['newTweet'])) {
        if (!isset($_POST['userTweet']) || is_null($_POST['userTweet']) || strlen($_POST['userTweet']) <= 0) {
            echo "Zła treść tweeta.";
        } else {
            $tweet = new Tweet();
            $tweet->setUserId($_SESSION['id']);
            $tweet->setText($_POST['userTweet']);
            $tweet->setUsername($_SESSION['username']);

            $tweet->saveToDB($conn);
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
        <title>Twitter - Strona główna</title>
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <a href="../register_edit/edit_user.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-pencil"></div> Edytuj profil</button></a>
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
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <form action="" method="post" role="form">
                        <legend>Dodawanie wpisu</legend>
                        <div class="form-group">
                            <label for="">Treść wpisu</label>
                            <input type="text" class="form-control" name="userTweet" id="userTweet" maxlength="140" placeholder="Treść tweeta"
                                   value="">
                        </div>
                        <button type="submit" name="newTweet" class="btn btn-primary">Tweetnij</button>
                    </form>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
            </div>
        </div>
        <div class="float-left">
            <h3>
                Twoje wpisy:
            </h3>
        </div>
        <div class="panel panel-default">
            <table class = "table">
                <?php
                $result = Tweet::loadTweetsByUserId($conn, $_SESSION['id']);
                if (count($result) > 0) {
                    echo '<tr><th>Treść wpisu</th><th>data</th><th>Komentarze</th></tr>';
                    foreach ($result as $row) {
                        echo '<tr><td><a href="../tweet.php?tweetId=' . $row->getId() . '">' . $row->getText() . "</a></td><td>" . $row->getCreationTime() . "</td></tr>";
                    }
                } else {
                    echo "Brak wpisów<br>";
                }
                ?>
            </table>
        </div>
    </body>
</html>