<?php
session_start();

include './connect.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Email sudah terdaftar";
    } else {
        $query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

        if (mysqli_query($db, $query) === TRUE) {
            echo "Register berhasil, silahkan <a href='login.php'>Login</a>";
        }else {
            echo "Register gagal";
        }
    }
} else {
    header('Location: login.php');
}

?>