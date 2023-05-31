<?php

if (isset($_POST['login'])) {

  $username = $_POST['username'];

  $password = $_POST['password'];

  // Đọc tài khoản từ file account.txt

  $accounts = file("account.txt", FILE_IGNORE_NEW_LINES);

  $is_valid_account = false;

  

  foreach ($accounts as $account) {

    list($user, $pass) = explode(",", $account);

    

    if ($username == $user && $password == $pass) {

      $is_valid_account = true;

      break;

    }

  }

  if ($is_valid_account) {

    // Chuyển hướng đến trang chat.html

    header("Location: https://manhokok.github.io/chat.html");

    exit();

  } else {

    echo "<h2>Đăng nhập thất bại</h2>";

  }

} elseif (isset($_POST['register'])) {

  $username = $_POST['username'];

  $password = $_POST['password'];

  // Lưu tài khoản vào file account.txt

  $file = fopen("account.txt", "a");

  fwrite($file, $username . "," . $password . "\n");

  fclose($file);

  // Chuyển hướng đến trang chat2.html

  header("Location: https://manhokok.github.io/index.html");

  exit();

}

?>


