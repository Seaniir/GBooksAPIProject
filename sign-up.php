<script src="js/form_sign_in.js"></script>

<?php  

$con = mysqli_connect('localhost', 'root', '','users');

$ID = $_POST['inputID'];
$Email = $_POST['inputEmail'];
$Password = $_POST['inputPassword'];

$sql = "INSERT INTO `form_users` (`id`, `email`, `pwd`) VALUES ('$ID', '$Email', '$Password')";

$rs = mysqli_query($con, $sql);
setcookie("ID", $ID, time()+30*24*60*60);
?> 

<script>
    window.location.href = "index.php";
</script>
