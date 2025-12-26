<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = $koneksi->query("SELECT * FROM login WHERE username='$username'");
$data = $sql->fetch_assoc();

if($data && $password === $data['password']) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    header("Location: admin.php");
    exit;
} else {
    header("Location: login.php?error=1");
    exit;
}
