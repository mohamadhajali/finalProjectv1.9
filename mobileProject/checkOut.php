<?php 

if($_SERVER['REQUEST_METHOD']=='PUT'){

  $server_name = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hotel";

    $conn = new mysqli($server_name,$username,$password,$dbname);
    $roomID = isset($_PUT['roomID'])? $_PUT['roomID'] : "";
    $userName = isset($_PUT['userName'])? $_PUT['userName'] : "";
    $Sql_Query = "UPDATE room set isReserved = '0' , userName='' where roomID = '$roomID';";
    $Sql_Query .= "UPDATE customer set roomID = ''  where userName='$userName' ;";

    $res = $conn->multi_query($Sql_Query);

	
if($res == true)
    echo "Check in successfully";
else
    echo "Erorr occured while checking in";

$conn->close(); 
}
else {
    echo "request method should be PUT ";
}
?>