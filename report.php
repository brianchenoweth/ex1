<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Runner Report</title>
    <link rel="stylesheet" href="app.css">
  
</head>
<body>
    <h1>SDSU Marathon Runner Report</h1>
<?php
$server = 'localhost';    
$user = 'jadrn009';
$password = 'keyboard';
$database = 'jadrn009';

//function calc_age($dob) {
//	$bday = new DateTime($dob);
//	$now = new DateTime();
//	$age = $now->diff($bday);
//	return $age->y;
//}

if(!($db = mysqli_connect($server,$user,$password,$database)))
	echo "ERROR in connection".mysqli_error($db);
else {


	$sql = "select fname, lname, experience, dob, image from person order by category, lname;";
	$result = mysqli_query($db,$sql);
	
	if(!$result)
		echo "Error in query".mysqli_error($db);
	echo "<table>\n";
	echo "<tr><td>First Name</td><td>Last Name</td><td>Experience</td><td>Age</td><td>Image</td></tr>\n";
	
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$birthDate = $row['dob'];
		$birthDate = explode("-", $birthDate);
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1): (date("Y") - $birthDate[2]));
		//$age = calc_age($row['dob']);
	//$birthDate = $row['birthday'];
 //$birthDate = explode("-", $birthDate);
//$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
 //? ((date("Y") - $birthDate[2]) - 1): (date("Y") - $birthDate[2]));
        //echo "Age is:" . $birthDate;
        //echo "Age is:" . $birthday;

		echo "<tr>";
//		foreach(array_slice($row,1) as $item) 
//			echo "<td>$item</td>";
			echo "<td> ". $row['fname'] . "</td>";
			echo "<td>" . $row['lname'] . "</td>";
			echo "<td>" . $row['experience'] . "</td>";
			echo "<td>" . $age . "</td>";
			//echo "<td><img src ='http://jadran.sdsu.edu/~jadrn009/proj3/im_ges/" . $row['image'] . "' height='auto' width='150'></td>";
			echo "</tr>\n";
   	 }
	mysqli_close($db);


	
 /*date in mm/dd/yyyy format; or it can be in other formats as well
  $dob = "12/17/1983";
  //explode the date to get month, day and year
  $dob = explode("-", $dob);
  //get age from date or dob
  $age = (date("md", date("U", mktime(0, 0, 0, $dob[0], $dob[1], $dob[2]))) > date("md")
    ? ((date("Y") - $dob[2]) - 1)
    : (date("Y") - $dob[2]));
  echo "Age is:" . $age;*/


 /* birthday in format 01-01-1901
  echo "<td>" . $row['dob'] . "</td>";*/

	}
?>

</table>
</body>
</html>
