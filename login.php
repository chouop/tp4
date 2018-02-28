<?php
require_once("init.php");
// if the user connected go to index.php if the user
if (isset($_SESSION['username'])) {

header ('location: index.php');

}
// username and password verification
if (isset($_POST['submit'])) {
$username = trim($_POST['username']);
$password = trim($_POST['password']);
// you can create a static method in class user
//To develop
//$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$bdd = new PDO('mysql:host=localhost;dbname=gallery_db;charset=utf8', 'root', '');

 	$req = $bdd->prepare("SELECT username ,password FROM users WHERE username = :username AND password = :password");
      $req->execute(array(':username' => $username, 'password' => $password ));
      $res = $req->fetch();
       $user_found= $res['username'];
      

// if the user was found
if ($user_found) {
	session_start();

	 header ('location: index.php');

       
} else {

	
$the_message = "Your password or username are
incorrect";

}
} else {
$the_message = "";
$username = "";
$password = "";
}
?>
<div class="col-md-4 col-md-offset-3">
<h4 class="bg-danger"><?php echo $the_message;
?></h4>
<form id="login-id" action="" method="post">
<div class="form-group">
<label for="username">Username</label>
<input type="text" class="form-control"
name="username" value="<?php echo
htmlentities($username); ?>" >
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" class="formcontrol"
name="password" value="<?php echo
htmlentities($password); ?>">
</div>
<div class="form-group">
<input type="submit" name="submit"
value="Submit" class="btn btn-primary">
</div>
</form>
</div>