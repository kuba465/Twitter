<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'coderslab');
define('DB_DBNAME', 'Twitter');

try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DBNAME . ";charset=utf8", DB_USER, DB_PASSWORD);
} catch (PDOException $ex) {
    echo "Błąd połączenia. Kod błędu: " . $ex->getMessage();
}
//userzy od 1 do 5
//tweety od 19 do 38
$username = ['kuba', 'donka', 'kubus', 'test', 'rafal'];
$polishUsername = ['kuby', 'donki', 'kubusia', 'konta testowego', 'rafala'];
$usernameNumber = 0;
$tweet = 19;
$comment = 1;
$commentText = "Komentarz nr $comment od $polishUsername[$usernameNumber]";
$user = 1;

for ($user = 1; $user <= 5; $user++) {
    for ($tweet = 19; $tweet <= 38; $tweet++) {
        $sql = "INSERT INTO Comments(tweet_id, user_id, text, username) VALUES(:tweet, :user, :comment, :username)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(['tweet' => $tweet, 'user' => $user, 'comment' => $commentText, 'username' => $username[$usernameNumber]]);
    }
    $comment++;
    $usernameNumber++;
}


