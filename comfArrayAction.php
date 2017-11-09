<html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$newname = test_input($_POST['name']);
$newid = test_input($_POST['id']);
}
function test_input($data) {
  $data = trim($data);
  //$data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function compare($ar1,$ar2){
if ($ar1["Score"] == $ar2["Score"])
 return 0;
else if ($ar1["Score"] < $ar2["Score"])
 return 1;
else
 return -1;
 }
 function sortLogin($logina, $loginb){
	 strtotime($logina["Last"]);
	 strtotime($loginb["Last"]);
	 if($logina["Last"] > $loginb["Last"])
		 return 1;
	 else if($logina["Last"] < $loginb["Last"])
		 return -1;
	 return 0;
 }
?>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
<table style ="width:50%">
<?php
$karma = array( 
            array (
				"UserId" => '1',
				"Name" => "Doe",
				"Score" => 45,
				"Date" => "2012-08-30",
            ),
			
		    array (
				"UserId" => 2,
				"Name" => "Smith" ,
				"Score" => 123,
				"Date" => "2012-09-02",
            ),
            
            array (
				"UserId" => 3,
				"Name" => "Chan",
				"Score" => 1,
				"Date" => "2011-12-23",
            ),
			
		    array(
				"UserId" => 4,
				"Name" => "Zee", 
				"Score" => 15,
				"Date" => "2012-07-01",
			)
         );	
$found = false;
		foreach($karma as &$v){
			if($v["UserId"] == ($newid)){
				if($v["Name"] == $newname){
					$v["Score"] += 5;
					$v["Date"] = date("Y-m-d");
					$found = true;
					break;
				}
			}
		}
		
if($found == false){
	$karma [] = 
	array(
		"UserId" => $newid,
		"Name" => $newname,
		"Score" => 1,
		"Date" => date("Y-m-d"),
	);
}
unset($v);
//sorts array by user id
ksort($karma);	
//prints out the array
echo "<tr><th>UserID</th>";
echo "<th>Name</th>";
echo "<th>Karma Score</th>";
echo "<th>Last Login</th></tr>";

foreach($karma as $v){
		echo '<tr>';
		echo '<td>'.$v["UserId"].'</td>';
		echo '<td>'.$v["Name"].'</td>';
		echo '<td>'.$v["Score"].'</td>';
		echo '<td>'.$v["Date"].'</td>';
		echo '</tr>';
  }
 //sorts time
usort($karma, 'sortLogin'); 
echo "<tr><th>UserID</th>";
echo "<th>Name</th>";
echo "<th>Karma Score</th>";
echo "<th>Last Login</th></tr>";
foreach($karma as $v){
		echo '<tr>';
		echo '<td>'.$v["UserId"].'</td>';
		echo '<td>'.$v["Name"].'</td>';
		echo '<td>'.$v["Score"].'</td>';
		echo '<td>'.$v["Date"].'</td>';
		echo '</tr>';
  } 
//sorts by score value
usort($karma, 'compare');
echo "<tr><th>UserID</th>";
echo "<th>Name</th>";
echo "<th>Karma Score</th>";
echo "<th>Last Login</th></tr>";

foreach($karma as $v){
		if( $v["Score"] > 10){
		echo '<tr>';
		echo '<td>'.$v["UserId"].'</td>';
		echo '<td>'.$v["Name"].'</td>';
		echo '<td>'.$v["Score"].'</td>';
		echo '<td>'.$v["Date"].'</td>';
		echo '</tr>';
		}
	}
?>
</table>
</html>