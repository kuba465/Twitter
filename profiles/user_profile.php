
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'my_profile.php';
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = '';
    }
    if ($id == ''/* || $id  =  moje id */) {
        include 'my_profile.php';
    } else {
        include 'other_profile.php';
    }
}
