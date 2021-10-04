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
  <script src="js/google_sign_in.js"></script>
  <script src="js/search_books.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="css/index_style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <?php
        if(isset($_COOKIE['ID'])) {
          ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Ma bibliothèque</a>
        </li>
        <?php
        }
        ?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- Google Buttons -->
<div class ="gButtons">
  <div class="g-signin2" data-onsuccess="onSignIn" prompt=select_account></div>
  <button href="#" onclick="signOut();">Sign out</button>
</div>

<!-- User details --> 
<?php
if(isset($_COOKIE['ID'])) {
$mysqli = new mysqli("localhost", "root", "");
$db = mysqli_select_db($mysqli, "users");
$query = mysqli_query($mysqli, "select * from tbl_users");
$ID = $_COOKIE["ID"];
while ($row = mysqli_fetch_array($query))
{
  if ($row["fld_google_id"] == $ID)
  {
?>
<div class="card" style="width: 150px;">
  <img src=<?php echo $row["fld_user_img"]; ?> class="card-img-top" alt="..." referrerpolicy="no-referrer">
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $row["fld_google_id"]; ?></li>
    <li class="list-group-item"><?php echo $row["fld_user_name"]; ?></li>
    <li class="list-group-item"><?php echo $row["fld_user_email"]; ?></li>
  </ul>
</div>
<?php
  }
}
}
?>
    <div id="search">
      <form id="myform" action="#">
        <div class="input-field">
          <input type="search" id="books">
          <label for="search"></label>
        </div>
        <button id='test'>Search Books</button>
      </form>
    </div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>