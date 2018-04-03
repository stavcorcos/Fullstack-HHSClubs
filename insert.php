<?php 
$servername = getenv("herokuServer");
$username = getenv("herokuUser");
$password = getenv("herokuPass");
$dbName = getenv("herokuDB");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully" . "<br>";

$clubName = mysqli_real_escape_string($conn, $_POST["name"]);
$shortDesc = mysqli_real_escape_string($conn, $_POST["shortDesc"]);
$clubIcon = mysqli_real_escape_string($conn, $_POST["icon"]);
$leftImage = mysqli_real_escape_string($conn, $_POST["left"]);
$longDesc = mysqli_real_escape_string($conn, $_POST["longDesc"]);
$rightImage = mysqli_real_escape_string($conn, $_POST["right"]);
$room = mysqli_real_escape_string($conn, $_POST["room"]);
$times = mysqli_real_escape_string($conn, $_POST["times"]);
$advisor = mysqli_real_escape_string($conn, $_POST["advisor"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);

$sql = "INSERT INTO HHSClubData (clubName, shortDesc, clubIcon, leftImage, longDesc, rightImage, room, times, advisor, email) VALUES ('$clubName', '$shortDesc', '$clubIcon', '$leftImage', '$longDesc', '$rightImage', '$room', '$times', '$advisor', '$email')";

if($conn->query($sql)) {
    echo "Success!";
}

?>
<a href = "index.php"><button>Back to main page</button></a>