<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php
$result = "Your Have Successfully Logged In!";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$userErr = $passErr = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(empty($_POST["user"])) {
		$userErr = "Username Is Required!";
	}
	else{
		$user = test_input($_POST["user"]);
	}
	
	if(empty($_POST["pass"])){
		$passErr = "Password Is Required";
	}
	else{
		$pass = test_input($_POST["pass"]);
	}
}
$newuser = $newpass = "";
?>
<p><span class="error">*Required Field.</span></p>
<form method="post" action="oneFileStyle.php?content=passwordAction">  
  Please Enter Your Username: <input type="text" name="user" value="<?php echo $user;?>">
  <span class="error">* <?php echo $userErr;?></span><br><br>
   Please Enter Your Password: <input type="password" name="pass" value="<?php echo $pass;?>">
  <span class="error">* <?php echo $passErr;?></span><br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<?php
if (isset($_POST['submit'])){ 
$bl = true;
$userNames = array("elliez", "greatGuy", "blogger", "Bobs", "mixed45", "computerss3", "alphaBravo", "charlieDelta", "echoFoxtrot", "mstsrgt");
$passWords = array("tr789ial", "abc123", "23seventeen23", "sidewalk12", "password", "qazwsx123", "12345678", "qweasdzxc", "drowssap", "ranged22");
$arrLength = count($userNames);
for($x = 0; $x < $arrLength; $x++){
	if($user == $userNames[$x] && $pass == $passWords[$x]){
		echo $result;
		$bl = false;
	}	
}
if($bl)
	echo "Sorry, wrong information has been entered!";
}
?>
</html>