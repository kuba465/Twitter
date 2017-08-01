<?php

class Comment {

    private $id;
    private $tweetId;
    private $userId;
    private $text;
    private $creationDate;
    private $username;

    public function __construct() {
        $this->id = -1;
        $this->tweetId = -1;
        $this->userId = -1;
        $this->text = '';
        $this->creationDate = date("d-m-Y H:i:s");
        $this->username = '';
    }

    public function setTweetId($newTweetId) {
        if (!isset($newTweetId) || is_null($newTweetId) || !is_numeric($newTweetId) || $newTweetId <= 0) {
            echo "Złe ID tweeta.<br>";
            return false;
        }
        $this->tweetId = $newTweetId;
    }

    public function setUserId($newUserId) {
        if (!isset($newUserId) || is_null($newUserId) || !is_numeric($newUserId) || $newUserId <= 0) {
            echo "Złe ID użytkownika.<br>";
            return false;
        }
        $this->userId = $newUserId;
    }

    public function settext($newText) {
        if (!isset($newText) || is_null($newText) || strlen($newText) < 0) {
            echo "Zły tekst komentarza.<br>";
            return false;
        }
        $this->text = $newText;
    }

    public function setUsername($newUsername) {
        if (!isset($newUsername) || is_null($newUsername) || strlen($newUsername) <= 0) {
            echo "Zła nazwa użytkownika.<br>";
            return false;
        }
        $this->username = $newUsername;
    }

    //settera do daty utworzenia nie ma, bo komentarze mają być dodawane tylko w obecnej dacie.

    public function getId() {
        return $this->id;
    }

    public function getTweetId() {
        return $this->tweetId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getText() {
        return $this->text;
    }

    public function getCreationTime() {
        return $this->creationDate;
    }

    public function getUsername() {
        return $this->username;
    }

    public function saveToDB(PDO $conn) {
        if ($this->id == -1) {

            $sql = 'INSERT INTO Comments(tweet_id, user_id, text, username) VALUES(:tweet_id, :user_id, :text, :username)';
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(['tweet_id' => $this->tweetId, 'user_id' => $this->userId, 'text' => $this->text, 'username' => $this->username]);
            if ($result !== false) {
                $this->id = $conn->lastInsertId();
                return true;
            }
        }
        return false;
    }

    static public function loadCommentsByTweetId(PDO $conn, $tweetId) {
        $ret = [];
        $stmt = $conn->prepare('SELECT * FROM Comments WHERE tweet_id=:tweet_id ORDER BY `date` DESC');
        $stmt->execute(['tweet_id' => $tweetId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result !== false && $stmt->rowCount() > 0) {
            foreach ($result as $row) {
                $loadedComment = new Comment();
                $loadedComment->id = $row['id'];
                $loadedComment->tweetId = $row['tweet_id'];
                $loadedComment->userId = $row['user_id'];
                $loadedComment->text = $row['text'];
                $loadedComment->creationDate = $row['date'];
                $loadedComment->username = $row['username'];
                $ret[] = $loadedComment;
            }

            return $ret;
        }
        return null;
    }

}
