<?php

class User {

    private $id;
    private $username;
    private $hashPass;
    private $email;

    public function __construct() {
        $this->id = -1;
        $this->username = '';
        $this->email = '';
        $this->hashPass = '';
    }

    public function setUsername($newUsername) {
        if (!isset($newUsername) || strlen($newUsername) < 0) {
            echo "Zła nazwa użytkownika.<br>";
            return false;
        }
        $this->username = $newUsername;
    }

    public function setEmail($newEmail) {
        if (!isset($newEmail) || strlen($newEmail) < 5 || filter_var($newEmail, FILTER_VALIDATE_EMAIL) == false) {
            echo "Zły e-mail.<br>";
            return false;
        }
        $this->email = $newEmail;
    }

    public function setPassword($newPassword) {
        if (!isset($newPassword) || strlen($newPassword) < 0) {
            echo "Złe hasło.<br>";
            return false;
        }
        $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $this->hashPass = $newHashedPassword;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->hashPass;
    }

    public function saveToDB(PDO $conn) {
        if ($this->id == -1) {

            $sql = 'INSERT INTO Users(username, email, hash_pass) VALUES(:username, :email, :pass)';
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(['username' => $this->username, 'email' => $this->email, 'pass' => $this->hashPass]);
            if ($result !== false) {
                $this->id = $conn->lastInsertId();
                return true;
            }
        } else {
            $stmt = $conn->prepare('UPDATE Users SET email=:email, username=:username, hash_pass=:hash_pass WHERE  id=:id ');
            $result = $stmt->execute(['email' => $this->email, 'username' => $this->username, 'hash_pass' => $this->hashPass, 'id' => $this->id]);
            if ($result === true) {
                return true;
            }
        }
        return false;
    }

    static public function loadUserById(PDO $conn, $id) {
        $stmt = $conn->prepare('SELECT * FROM Users WHERE id=:id');
        $result = $stmt->execute(['id' => $id]);
        if ($result === true && $stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->username = $row['username'];
            $loadedUser->hashPass = $row['hash_pass'];
            $loadedUser->email = $row['email'];
            return $loadedUser;
        }
        return null;
    }

    static public function loadUserByEmail(PDO $conn, $email) {
        $stmt = $conn->prepare('SELECT * FROM Users WHERE email=:email');
        $result = $stmt->execute(['email' => $email]);
        if ($result === true && $stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->username = $row['username'];
            $loadedUser->hashPass = $row['hash_pass'];
            $loadedUser->email = $row['email'];
            return $loadedUser;
        }
        return null;
    }

    static public function loadUserByUsername(PDO $conn, $username) {
        $stmt = $conn->prepare('SELECT * FROM Users WHERE username=:username');
        $result = $stmt->execute(['username' => $username]);
        if ($result === true && $stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->username = $row['username'];
            $loadedUser->hashPass = $row['hash_pass'];
            $loadedUser->email = $row['email'];
            return $loadedUser;
        }
        return null;
    }

    static public function loadAllUsers(PDO $conn) {
        $ret = [];
        $sql = "SELECT * FROM Users";
        $result = $conn->query($sql);
        if ($result !== false && $result->rowCount() > 0) {
            foreach ($result as $row) {
                $loadedUser = new User();
                $loadedUser->id = $row['id'];
                $loadedUser->username = $row['username'];
                $loadedUser->hashPass = $row['hash_pass'];
                $loadedUser->email = $row['email'];
                $ret[] = $loadedUser;
            }
        }
        return $ret;
    }

    public function delete(PDO $conn) {
        if ($this->id != -1) {
            $stmt = $conn->prepare('DELETE FROM Users WHERE id=:id');
            $result = $stmt->execute(['id' => $this->id]);
            if ($result === true) {
                return true;
            }
            return false;
        }
        return true;
    }

    static public function login(PDO $conn, $email, $passFromUser) {
        $user = User::loadUserByEmail($conn, $email);

        if ($user !== null && password_verify($passFromUser, $user->getPassword()) == $passFromUser) {
            return $user;
        } else {
            return false;
        }
    }

    static public function verifyEmailFromUser($email) {
        if (!isset($email) || is_null($email) || !is_string($email) || is_numeric($email) || strlen($email) <= 0 || filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            return false;
        } else {
            return true;
        }
    }

    static public function verifyPasswordFromUser($pass) {
        if (!isset($pass) || is_null($pass) || strlen($pass) <= 0) {
            return false;
        } else {
            return true;
        }
    }

    static public function verifyUsernameFromUser($username) {
        if (!isset($username) || is_null($username) || strlen($username) <= 0) {
            return false;
        } else {
            return true;
        }
    }

}    