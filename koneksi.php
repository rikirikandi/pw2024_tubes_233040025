<?php
// koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040025');

function register($data) {
    global $conn;


    $fullname = htmlspecialchars( $data["fullname"]);
    $username = strtolower(stripslashes($data["username"]));
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);



    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM tbl_user WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar!')
            </script>";

        return false;
    }
    
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO tbl_user VALUES('$fullname', '$username', '$email', '$password')");

    return mysqli_affected_rows($conn);


}