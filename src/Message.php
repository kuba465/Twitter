<?php

class Message {

    private $id;
    private $senderId;
    private $receiverId;
    private $text;
    private $creationDate;
    private $isRead;
    private $senderUsername;
    private $receiverUsername;

    public function __construct() {
        $this->id = -1;
        $this->senderId = -1;
        $this->receiverId = -1;
        $this->text = '';
        $this->creationDate = date("d-m-Y H:i:s");
        $this->isRead = 0;
        $this->senderUsername = '';
        $this->receiverUsername = '';
    }

    public function setSenderId($newSenderId) {
        if (!isset($newSenderId) || is_null($newSenderId) || !is_numeric($newSenderId) || $newSenderId <= 0) {
            echo "Złe ID nadawcy.<br>";
            return false;
        }
        $this->senderId = $newSenderId;
    }

    public function setReceiverId($newReceiverId) {
        if (!isset($newReceiverId) || is_null($newReceiverId) || !is_numeric($newReceiverId) || $newReceiverId <= 0) {
            echo "Złe ID odbiorcy.<br>";
            return false;
        }
        $this->receiverId = $newReceiverId;
    }

    public function setText($newText) {
        if (!isset($newText) || is_null($newText) || strlen($newText) < 0) {
            echo "Zły tekst komentarza.<br>";
            return false;
        }
        $this->text = $newText;
    }

    //settera do daty utworzenia nie ma, bo wiadomości mają być dodawane tylko w obecnej dacie.

    public function setIsRead($newIsRead) {
        if ($newIsRead == 0 || $newIsRead == 1) {
            $this->isRead = $newIsRead;
        } else {
            echo "Zły parametr.<br>";
            return false;
        }
    }

    public function setSenderUsername($newSenderUsername) {
        if (!isset($newSenderUsername) || is_null($newSenderUsername) || strlen($newSenderUsername) <= 0) {
            echo "Zła nazwa użytkownika nadawcy.<br>";
            return false;
        }
        $this->senderUsername = $newSenderUsername;
    }

    public function setReceivername($newReceiverUsername) {
        if (!isset($newReceiverUsername) || is_null($newReceiverUsername) || strlen($newReceiverUsername) <= 0) {
            echo "Zła nazwa użytkownika odbiorcy.<br>";
            return false;
        }
        $this->receiverUsername = $newReceiverUsername;
    }

    public function getId() {
        return $this->id;
    }

    public function getSenderId() {
        return $this->senderId;
    }

    public function getReceiverId() {
        return $this->receiverId;
    }

    public function getText() {
        return $this->text;
    }

    public function getCreationTime() {
        return $this->creationDate;
    }

    public function getIsRead() {
        return $this->isRead;
    }

    public function getSenderUsername() {
        return $this->senderUsername;
    }

    public function getReceiverUsername() {
        return $this->receiverUsername;
    }

    public function saveToDB(PDO $conn) {
        if ($this->id == -1) {

            $sql = 'INSERT INTO Messages(sender_id, receiver_id, text, is_read, sender_username, receiver_username)'
                    . ' VALUES(:sender_id, :receiver_id, :text, :is_read, :sender_username, :receiver_username)';
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(['sender_id' => $this->senderId, 'receiver_id' => $this->receiverId, 'text' => $this->text,
                'is_read' => $this->isRead, 'sender_username' => $this->senderUsername, 'receiver_username' => $this->receiverUsername]);
            if ($result !== false) {
                $this->id = $conn->lastInsertId();
                return true;
            }
        } else {
            $sql = 'UPDATE Messages SET is_read=1 WHERE  id=:id ';
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(['id' => $this->id]);
            if ($result === true) {
                return true;
            }
        }
        return false;
    }

    static public function loadMessageById(PDO $conn, $id) {
        $stmt = $conn->prepare('SELECT * FROM Messages WHERE id=:id');
        $result = $stmt->execute(['id' => $id]);
        if ($result === true && $stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $loadedMessage = new Message();
            $loadedMessage->id = $row['id'];
            $loadedMessage->senderId = $row['sender_id'];
            $loadedMessage->receiverId = $row['receiver_id'];
            $loadedMessage->text = $row['text'];
            $loadedMessage->creationDate = $row['date'];
            $loadedMessage->isRead = $row['is_read'];
            $loadedMessage->senderUsername = $row['sender_username'];
            $loadedMessage->receiverUsername = $row['receiver_username'];
            return $loadedMessage;
        }
        return null;
    }

    static public function loadMessagesBySenderId(PDO $conn, $senderId) {
        $ret = [];
        $sql = 'SELECT * FROM Messages WHERE sender_id=:sender_id ORDER BY `date` DESC';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['sender_id' => $senderId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result !== false && $stmt->rowCount() > 0) {
            foreach ($result as $row) {
                $loadedMessage = new Message();
                $loadedMessage->id = $row['id'];
                $loadedMessage->senderId = $row['sender_id'];
                $loadedMessage->receiverId = $row['receiver_id'];
                $loadedMessage->text = $row['text'];
                $loadedMessage->creationDate = $row['date'];
                $loadedMessage->isRead = $row['is_read'];
                $loadedMessage->senderUsername = $row['sender_username'];
                $loadedMessage->receiverUsername = $row['receiver_username'];
                $ret[] = $loadedMessage;
            }
            return $ret;
        }
        return null;
    }

    static public function loadMessagesByReceiverId(PDO $conn, $receiverId) {
        $ret = [];
        $sql = 'SELECT * FROM Messages WHERE receiver_id=:receiver_id ORDER BY `date` DESC';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['receiver_id' => $receiverId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result !== false && $stmt->rowCount() > 0) {
            foreach ($result as $row) {
                $loadedMessage = new Message();
                $loadedMessage->id = $row['id'];
                $loadedMessage->senderId = $row['sender_id'];
                $loadedMessage->receiverId = $row['receiver_id'];
                $loadedMessage->text = $row['text'];
                $loadedMessage->creationDate = $row['date'];
                $loadedMessage->isRead = $row['is_read'];
                $loadedMessage->senderUsername = $row['sender_username'];
                $loadedMessage->receiverUsername = $row['receiver_username'];
                $ret[] = $loadedMessage;
            }
            return $ret;
        }
        return null;
    }

    public function delete(PDO $conn) {
        if ($this->id != -1) {
            $stmt = $conn->prepare('DELETE FROM Messages WHERE id=:id');
            $result = $stmt->execute(['id' => $this->id]);
            if ($result === true) {
                return true;
            }
            return false;
        }
        return true;
    }

}
