<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="google-signin-client_id" content="616427647027-4qae6brl9pjqs9jbg4aftc5uf8qeobp5.apps.googleusercontent.com">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="../js/google_sign_in.js"></script>
  <script src="../js/search_books.js"></script>
  <script src="https://kit.fontawesome.com/7a55933cbe.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/library.css">
</head>
<body>
<sidebar>
<nav>
    <div class="sidebar-top">
      <span class="shrink-btn">
        <i class='bx bx-chevron-left'></i>
      </span>
      <a href="../index.php">
        <img src="../img/logo.png" class="logo" alt="">
      </a>
      <h3 class="hide">GBooksAPI</h3>
    </div>
    <div class="search">

    </div>

    <div class="sidebar-links mt-5">
      <ul>
        <div class="active-tab"></div>
        <li class="tooltip-element" data-tooltip="0">
          <a href="../index.php" data-active="0">
            <div class="icon">
              <i class='bx bx-tachometer'></i>
              <i class='bx bxs-tachometer'></i>
            </div>
            <span class="link hide">Accueil</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="1">
          <a href="#" class="active" data-active="1">
            <div class="icon">
              <i class='bx bx-folder'></i>
              <i class='bx bxs-folder'></i>
            </div>
            <span class="link hide">Bibliothèque</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="2">
          <a href="#" data-active="2">
            <div class="icon">
              <i class='bx bx-message-square-detail'></i>
              <i class='bx bxs-message-square-detail'></i>
            </div>
            <span class="link hide">Planning</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="3">
          <a href="#" data-active="3">
            <div class="icon">
              <i class='bx bx-bar-chart-square'></i>
              <i class='bx bxs-bar-chart-square'></i>
            </div>
            <span class="link hide">Panier</span>
          </a>
        </li>
        <div class="tooltip">
          <span class="show">Accueil</span>
          <span>Bibliothèque</span>
          <span>Planning</span>
          <span>Panier</span>
        </div>
      </ul>

      <h4 class="hide">Compte</h4>

      <ul>
        <li class="tooltip-element" data-tooltip="0">
          <a href="#" data-active="4">
            <div class="icon">
              <i class='bx bx-help-circle'></i>
              <i class='bx bxs-help-circle'></i>
            </div>
            <span class="link hide">Aide</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="1">
          <a href="#" data-active="5">
            <div class="icon">
              <i class='bx bx-cog'></i>
              <i class='bx bxs-cog'></i>
            </div>
            <span class="link hide">Paramètres</span>
          </a>
        </li>
        <?php
        if(isset($_COOKIE['ID'])) {
          ?>
        <li class="tooltip-element" data-tooltip="2">
          <a href="#" onclick="signOut();" data-active="6">
            <div class="icon">
              <i class='bx bx-log-out'></i>
              <i class='bx bx-log-out'></i>
            </div>
            <span class="link hide">Déconnexion</span>
          </a>
        </li>
        <?php
        }
        ?>
        <?php
        if(!isset($_COOKIE['ID'])) {
          ?>
        <li class="tooltip-element" data-tooltip="2">
          <a href="login.php" data-active="6">
            <div class="icon">
              <i class='bx bx-log-in'></i>
              <i class='bx bx-log-in'></i>
            </div>
            <span class="link hide">Connexion</span>
          </a>
        </li>
        <?php
        }
        ?>
        <div class="tooltip">
          <span class="show">Aide</span>
          <span>Paramètres</span>
          <span>Connexion</span>
        </div>
      </ul>
    </div>
    <div class="sidebar-footer">
      <a href="#" class="account tooltip-element" data-tooltip="0">
        <i class='bx bx-user'></i>
      </a>
      <?php
if(isset($_COOKIE['ID'])) 
{
$mysqli = new mysqli("localhost", "root", "");
$db = mysqli_select_db($mysqli, "users");
$query = mysqli_query($mysqli, "select * from tbl_users");
$ID = $_COOKIE["ID"];
while ($row = mysqli_fetch_array($query))
{
  if ($row["fld_google_id"] == $ID)
  {
?>
      <div class="admin-user tooltip-element" data-tooltip="1">
        <div class="admin-profile hide">
          <img src=<?php echo $row["fld_user_img"]; ?> alt="" referrerpolicy="no-referrer">
          <div class="admin-info">
            <h3><?php echo $row["fld_user_name"]; ?></h3>
            <h5><?php echo $row["fld_user_email"]; ?></h5>
          </div>
        </div>
      </div>
      <div class="tooltip">
        <span class="show"><?php echo $row["fld_user_name"]; ?></span>
        <span>Logout</span>
      </div>
    </div>
    <?php
  }
}
}
?>
  </nav>
</sidebar>
<div class="g-signin2" data-onsuccess="onSignIn" style="display: none;"></div>
<select name="" id="orderChoose" class="orderBy">
  <option value="order">A à Z</option>
  <option value="orderInverse">Z à A</option>
</select>
<?php
$name = $_COOKIE["ID"];
$tbl = "tbl";
$tbl .= $name;
$mysqli = new mysqli("localhost", "root", "");
$db = mysqli_select_db($mysqli, "libraries");
?>
<?php
$query = mysqli_query($mysqli, "select * from ".$tbl." ORDER BY titles");
?>

<div id="bookCardsContainer" class="w-100">
</div>
<!-- JavaScript Bundle with Popper -->
<script src="../js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="../js/get_books_from_library.js"></script>
</body>
</html>