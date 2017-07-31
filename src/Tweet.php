<?php

class Tweet {

    private $id;
    private $userId;
    private $text;
    private $creationDate;
    private $username;

    public function __construct() {
        $this->id = -1;
        $this->userId = -1;
        $this->text = '';
        $this->creationDate = date("d-m-Y H:i:s");
        $this->username = '';
    }

    public function setUserId($newUserId) {
        if (!isset($newUserId) || is_null($newUserId) || !is_numeric($newUserId) || $newUserId <= 0) {
            echo "Złe ID użytkownika.<br>";
            return false;
        }
        $this->userId = $newUserId;
    }

    public function setText($newText) {
        if (!isset($newText) || is_null($newText) || strlen($newText) < 0) {
            echo "Zły tekst tweeta.<br>";
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

    //settera do daty utworzenia nie ma, bo posty mają być dodawane tylko w obecnej dacie.

    public function getId() {
        return $this->id;
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

            $sql = 'INSERT INTO Tweets(user_id, text, username) VALUES(:user_id, :text, :username)';
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(['user_id' => $this->userId, 'text' => $this->text, 'username' => $this->username]);
            if ($result !== false) {
                $this->id = $conn->lastInsertId();
                return true;
            }
        }
        return false;
    }

    static public function loadTweetById(PDO $conn, $id) {
        $stmt = $conn->prepare('SELECT * FROM Tweets WHERE id=:id');
        $result = $stmt->execute(['id' => $id]);
        if ($result === true && $stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $loadedTweet = new Tweet();
            $loadedTweet->id = $row['id'];
            $loadedTweet->userId = $row['user_id'];
            $loadedTweet->text = $row['text'];
            $loadedTweet->creationDate = $row['date'];
            $loadedTweet->username = $row['username'];
            return $loadedTweet;
        }
        return null;
    }

    static public function loadTweetsByUserId(PDO $conn, $userId) {
        $ret = [];
        $stmt = $conn->prepare('SELECT * FROM Tweets WHERE user_id=:user_id ORDER BY `date` DESC');
        $stmt->execute(['user_id' => $userId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result !== false && $stmt->rowCount() > 0) {
            foreach ($result as $row) {
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['user_id'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['date'];
                $loadedTweet->username = $row['username'];
                $ret[] = $loadedTweet;
            }

            return $ret;
        }
        return null;
    }

    static public function loadAllTweets(PDO $conn) {
        $ret = [];
        $sql = "SELECT * FROM Tweets";
        $result = $conn->query($sql);
        if ($result !== false && $result->rowCount() > 0) {
            foreach ($result as $row) {
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['user_id'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['date'];
                $loadedTweet->username = $row['username'];
                $ret[] = $loadedTweet;
            }
        }
        return $ret;
    }

}
