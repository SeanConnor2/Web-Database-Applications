<html>
<head>
<table style ="width:20%">
<style>
body{}
h1{
font-family:courier;
font-size:50px;
}
table, th, td {
    border: 1px solid black;
	text-align: center;
	font-family:courier;
} 
</style>
</head>
<body>
<?php
include("loginBook2.php");

$db = login();
  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  $query = "SELECT AVG( perDem ) , AVG( perGOP ) , AVG( perInd ) , polls.state, evotes
			FROM polls,electoral
			WHERE polls.state = electoral.state
			GROUP BY polls.state";
			
$stmt = $db -> prepare($query);
$stmt->execute();
$stmt->store_result();		
$stmt->bind_result($avgDem, $avgGop, $avgInd, $state, $evotes);

$demV = 0;
$GopV = 0;
 while($stmt->fetch()){
	 if($avgDem > $avgGop)
		 $demV += $evotes;
	 else if($avgDem < $avgGop)
		 $GopV += $evotes;
}
echo "<tr bgcolor='#436AFF'><th>Democrats</th>";
echo "<th bgcolor='#FF4343'>Republicans</th></tr>";
echo "<tr>";
echo "<td>$demV eVotes!</td>";
echo "<td>$GopV eVotes!</td>";
echo "</tr>";
echo "</table>";

if($demV > $GopV)
	echo "<h3 style='color:blue;'>Hillary Wins</h3>";
else
	echo "<h3 style='color:red;'>Trump Wins!</h3>";
 
 $stmt->free_result();
 $db->close();
?>
</body>
</html>
