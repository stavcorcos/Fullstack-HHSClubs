<?php 
$servername = "localhost";
$username = "root";
$password = getenv("herokuPass");
$dbName = "HHSCLUBSDATA";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully" . "<br>";

$clubname = $_POST['delclub'];

$sql = "DELETE FROM HHSClubData WHERE clubName = ('$clubname')";

if($conn->query($sql)) {
    echo "Success!";
}

?>
<a href = "index.php"><button>Back to main page</button></a>