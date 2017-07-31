<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'my_profile.php';
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = '';
    }
    $myId = $_SESSION['id'];
    if ($id == '' || $id == $myId) {
        include 'my_profile.php';
    } else {
        include 'other_profile.php';
    }
}
