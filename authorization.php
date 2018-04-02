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

$userusername = mysqli_real_escape_string($conn, $_POST['username']);
$userpassword = mysqli_real_escape_string($conn, $_POST['password']);
$username = "SELECT username FROM authorization;";
$password = "SELECT password FROM authorization;";
$uresults = $conn->query($username);
$presults = $conn->query($password);

while($rowp = $uresults->fetch_assoc()) {
    $fusername = $rowp["username"];
}
while($rowz = $presults->fetch_assoc()) {
    $fpassword = $rowz["password"];
}

if (($userusername == $fusername) && ($userpassword == $fpassword)) {
    session_start();
    $_SESSION['username'] = "set";
    header("Location:edit.php");
} else {
    header("Location:login.php");
}
?>