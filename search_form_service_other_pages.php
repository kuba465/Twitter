<?php

if (isset($_POST['search'])) {
    if (!isset($_POST['userName']) || is_null($_POST['userName']) || strlen($_POST['userName']) <= 0) {
        echo "Zła nazwa użytkownika.";
    } else {
        include 'src/User.php';
        include 'config.php';
        $foundUser = User::loadUserByUsername($conn, $_POST['userName']);
        if ($foundUser !== false) {
            header("Location: user_profile.php?id=".$foundUser->getId());
        }
    }
}

