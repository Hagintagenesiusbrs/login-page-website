<?php 
include 'config.php'; // panggil perintah koneksi database 

// if(!isset($_SESSION['username'] )== 0) { // cek session apakah kosong(belum login) maka alihkan ke index.php
//     header('Location: index.php');
// }

if(isset($_POST['login'])) { // mengecek apakah form variabelnya ada isinya
    $username = $_POST['username']; // isi varibel dengan mengambil data username pada form
    $password = $_POST['password']; // isi variabel dengan mengambil data password pada form

    try {
        $sql = ("SELECT `username` , `password` FROM `kelas` WHERE `username` = :username  AND `password` = :password");// buat queri select
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute(); // jalankan query

        $count = $stmt->rowCount(); // mengecek row
        if($count == 1) { // jika rownya ada 
            $_SESSION['username'] = $username; // set sesion dengan variabel username
            header("Location: index.php"); // lempar variabel ke tampilan index.php
            return;
        }else{
            echo "Anda tidak dapat login";
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}

?>

<!-- FORM LOGIN -->

<form action="" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="login" value="Login">
            </td>
        </tr>
    </table>
</form>