<?php
  session_start();
  $user_id = $_SESSION["user_id"] ?? false;
  if ($user_id) {
    require "vendor/autoload.php";
    $db = new \Photos\DB();
    $data = $db->get_user_photos($user_id);
  }
  if (isset($_GET["error"])) {
    $error = "Password or login not correct";
  }
  if (isset($_GET["sign_error"])) {
    $sign_error = "This user exist";
  }
  if (isset($_GET["sign_success"])) {
    $sign_success = "Welcome!";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index2.css" />
    <link rel="stylesheet" href="./media.css" />
    <title>Project 21</title>
</head>
<body> 
<?php include "./header.php" ?>
<?php if($user_id): ?>
  <h1></h1>
  <div id="grid">
  <?php foreach ($data as $photo): ?>
      <?= (new Photos\Photo($photo["Id"], $photo["Image"], $photo["Text"]))->get_html() ?>
    <?php endforeach; ?>
    </div>
<?php else: ?>
  <div class="form">
        <form action="./login.php" method="post">
            <h2>Sing in</h1>
            <input type="text" placeholder="Email" name="login">
            <input type="password" placeholder="Password" name="password">
            <button>Login</button>
            <?php if (isset($_GET["error"])): ?>
          <p class="error"><?= $error ?></p>
        <?php endif ?>
        </form>
    </div>
    <div class="form">
        <form action="./singup.php" method="post">
            <h2>Sing up</h1>
            <input type="text" placeholder="Email" name="login">
            <input type="password" placeholder="Password" name="password">
            <button>Sing up</button>
            <?php if (isset($_GET["sign_error"])): ?>
            <p class="error"><?= $sign_error ?></p>
            <?php endif ?>
            <?php if (isset($_GET["sign_success"])): ?>
            <p class="success"><?= $sign_success ?></p>
            <?php endif ?>
        </form>
    </div>
<?php endIf; ?>

<?php include "./add_form.php" ?>

    <div class="popup_photo">
      <img src="" alt="" />
    </div>
    <script src="./script2.js"></script>
</body>
</html>