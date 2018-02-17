<?php
$servername = "localhost:3306";
$username = "web";
$password = "hello_friend";
$dbname = "Cards";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM `cards`';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $to_encode = array();
    while($row = $result->fetch_assoc()) {
        $to_encode[] = $row;
    }
    echo json_encode($to_encode);

} else {
    echo "0 results";
}
$conn->close();
?>