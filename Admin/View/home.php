<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <link rel="stylesheet" href="home.css">
  <style>
        <?php
        include "C:/xampp/htdocs/e-project1/Admin/css/home.css";
        ?>
    </style>
</head>

<body>
  <nav>
    <div class="menu"><ion-icon name="menu-outline"></ion-icon></div>
    <ul>
      <li>
        <a href="home.php">
          <ion-icon name="home-outline"></ion-icon>
          Home</a>
      </li>
      <li>
        <a href="profile.php">
          <ion-icon name="people-outline"></ion-icon>
          Profile</a>
      </li>
      <li>
        <a href="setting.php">
          <ion-icon name="settings-outline"></ion-icon>
          Setting</a>
      </li>
      <li>
        <a href="chat.php">
          <ion-icon name="chatbubbles-outline"></ion-icon>
          Message</a>
      </li>
      <li>
        <a href="logout.php">
          <ion-icon name="log-out-outline"></ion-icon>
          Logout</a>
      </li>
    </ul>
  </nav>

  <script>
    const nav = document.querySelector('nav');
    const menu = document.querySelector('.menu');
    const root = document.querySelector('.root');
    const header = document.querySelector('h1');

    menu.onclick = function() {
      nav.classList.toggle('hide');
      root.classList.toggle('expand');
      header.classList.toggle('expand');
    }
  </script>
 
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>