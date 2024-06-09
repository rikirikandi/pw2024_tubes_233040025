<?php
session_start();

function koneksi()
 {
    $conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040025');
    return $conn;
}
function query($query) 
{

$conn = koneksi();


$result = mysqli_query($conn, $query);

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}


return $rows;
}

function tambah($data)
{
        $conn = koneksi();
      
        $judul = htmlspecialchars($data['judul']);
        $genre = htmlspecialchars($data['genre']);

        // upload gambar
        $gambar = upload();
        if( !$gambar ) {
            return false;
        }
      
        $query = "INSERT INTO movie VALUES (null, '$judul', '$genre', '$gambar')";
      
        mysqli_query($conn, $query) or die(mysqli_error($conn));

        return mysqli_affected_rows($conn);
          
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    // cek apakah tidak ada yang diupload
    if ($error == 4) {
        return 'nophoto.png';
      }

    // cek yg diupload apakah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower (end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
                </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar 
    if( $ukuranFile > 1000000 ) {
        echo "<script>
        alert('ukuran gambar terlalu besar')
        </script>";

        return false;
    }

    // generate gambar baru
    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $ekstensiGambar;

    // gambar di upload
    move_uploaded_file($tmpName, 'img/img/' . $namaFilebaru);

    return $namaFilebaru;

}


function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM movie WHERE id_film = $id") or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    
        $conn = koneksi();


        $id = htmlspecialchars($data['id']);
        $judul = htmlspecialchars($data['judul']);
        $genre = htmlspecialchars($data['genre']);
        // $gambar = htmlspecialchars($data['gambar']);
        $gambar_lama = htmlspecialchars($data['gambar_lama']);

        
        if ($_FILES['gambar']['error'] == 4) {
            $gambar = $gambar_lama;
          } else {
            $gambar = upload($_FILES['gambar']);
            if (!$gambar) {
              return false;
            }
          }
      
        $query = "UPDATE movie SET
                        judul = '$judul',
                        genre = '$genre',
                        gambar = '$gambar'

                    WHERE id_film = $id";
                   
      
        mysqli_query($conn, $query) or die(mysqli_error($conn));

        return mysqli_affected_rows($conn);
          
}

function cari($keyword) {
    $conn = koneksi();

    $query = "SELECT * FROM movie
                WHERE 
                judul LIKE '%$keyword%' OR
                genre LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function login($data)
{
    $conn = koneksi();

    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);

    $user = query("SELECT * FROM tbl_user WHERE email = '$email'")[0];
    // var_dump ($user);
    if ($user['email'] == $email)  {
        if(password_verify($password,$user['password'])){
            // set session
            $_SESSION['login'] = true;
        
            header("Location: haladmin.php");
            exit;            
        }
    }
   
}

function registrasi($data) {
    $conn = koneksi();


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
    $query = "INSERT INTO tbl_user (fullname, username, email, password)
    VALUES ('$fullname', '$username', '$email', '$password')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);


}