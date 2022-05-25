<?php

$conn = mysqli_connect('localhost', 'root', '', 'db_hotel');

$username = $_POST['username'];
$password = $_POST['pass'];

$query = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username'");
$dataUser = mysqli_fetch_assoc($query);

if ($dataUser) {
   if (password_verify($password, $dataUser['password'])) {
      session_start();
      $_SESSION['login'] = true;
      $_SESSION['user'] = $dataUser;

      if ($_SESSION['user']['id_level'] == 1) {
         echo "

            <script>
               alert('login berhasil')
               window.location.replace('../level/admin/index.php');
            </script>
         
         ";
      } else if ($_SESSION['user']['id_level'] == 2) {
         echo "

            <script>
               alert('login berhasil')
               window.location.replace('../level/resepsionis/resepsionis.php');
            </script>
         
         ";
      } else if ($_SESSION['user']['id_level'] == 3) {
         echo "

            <script>
               alert('login berhasil')
               window.location.replace('../level/tamu/tamu.php');
            </script>
         
         ";
      }
   } else {
      echo "

         <script>
            alert('login gagal')
            window.location.replace('../login.php');
         </script>
      
      ";
   }
} else {
   echo "

      <script>
         alert('Anda belum daftar')
         window.location.replace('../login.php');
      </script>
   
   ";
}