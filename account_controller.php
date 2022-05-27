<?php

session_start(); 
include("conf.php");

if (isset($_POST['login'])) 
{
  $nama = $_POST['username'];
  $password = $_POST['password'];
  $password_md5 = md5($password);

  if($username != '' && $password != '')
  {
    $sql = "SELECT * FROM users WHERE username = '$nama' AND password = '$password_md5'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($query);
    
    if(mysqli_num_rows($query) < 1)
    {
      setcookie("message", "Username atau Password salah!", time()+10);
      header("location: login.php");
    }
    else
    {
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama'] = $data['nama'];   

        setcookie("message", "", time()-60);
        header("location: index.php");
    }
  }
  else
  {
    setcookie("message", "Username atau Password kosong!", time()+60);
    header("location: login.php");
  }
}


if (isset($_POST['register'])) 
{
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password_md5 = md5($_POST['password']);

  $sql = "INSERT INTO users VALUES ('$username', '$nama', '$password_md5')";
  $result = mysqli_query($koneksi, $sql);

  if (!$result) 
  {
    die('Could not insert data: ' . mysqli_error($koneksi));
  } 
  else 
  {
    echo "<script>" . "alert('Registrasi berhasil! Silakan login untuk melanjutkan.');" .
      "window.location.href = 'login.php'" . "</script>";
  }
}

if (isset($_POST['logout'])) 
{
  session_start();
  session_destroy(); 
  header("location: login.php");
}

?>