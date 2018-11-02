<html>
<head>
	<Title> Page-Visits Results</title>
</head>
<body>
<h1> Page-Visits Results</h1>
<?php
include("loginBook.php");

$searchtype=$_POST['searchtype'];
$searchterm=trim($_POST['searchterm']);

//if($searchtype === "PageName")
	//$searchtype = "page_name";

//if($searchtype === "RemoteHost")
	//$searchtype ="remote_host";	

if(!$searchtype || !$searchterm) {
	echo "You Have Not Entered Search Details.  Please Try Again!";
	exit;
}

switch($searchtype){
	case 'page_name':
	case 'remote_host':
		break;
	default:
		echo '<p> That Is Not A Valid Search Type <br />
			Please Try Again!</p>';
		exit;
}

$db = login();
  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }

  $query = "select page_name, visit_date, visit_time, previous_page, request_method, remote_host, remote_port 
			
			FROM visitInfo WHERE $searchtype = ?";
  $stmt = $db -> prepare($query);
  $stmt->bind_param('s',$searchterm);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($name, $date, $time, $prev, $method, $host, $port);
  
 echo "<p> Number of Pages Found: " . $stmt->num_rows . "</p>";
  
 while($stmt->fetch()) {
		echo "<p><strong> Page_Name: ". $name. "</strong><br />";
		echo "Visit_Date: " . $date . "<br />";
		echo "Visit_Time: " . $time . "<br />";
		echo "Previous_page: " . $prev . "<br />";
		echo "Request_Method: " . $method . "<br />";
		echo "<strong>Remote_Host: ". $host . "</strong><br />";
		echo "Remote_Port: " . $port . "<br />";
 }
 
 $stmt->free_result();
 $db->close();
?>
</body>
</html>
