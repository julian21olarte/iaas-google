<?php
  ini_set('display_errors', 1);
  if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    login($username, $password);
  }
  function renderIndex()
  {
    $text = file_get_contents("index.html");
    echo $text;
  }

  function login($username, $password) {
    $mysqli = new mysqli("localhost", "root", "root", "iaasgoogle", 3306);
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $user = $mysqli->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1");
    if($user->num_rows>0) {
      echo 'Usuario loggueado correctamente!  Mysql Host: ' . mysqli_get_host_info($mysqli);
    }
    else {
      echo 'No existe un usuario con esas credenciales!';
    }
  }

  renderIndex();
?>