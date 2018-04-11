<?php
$servername = "localhost";
$username = "root";
$password = "1998St@v";
$dbName = "hhsclubdata";

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
$masterusername = "SELECT username FROM master_authorization;";
$masterpassword = "SELECT password FROM master_authorization;";
$uresults = $conn->query($username);
$presults = $conn->query($password);
$muresults = $conn->query($masterusername);
$mpresults = $conn->query($masterpassword);

while($rowp = $uresults->fetch_assoc()) {
    $fusername = $rowp["username"];
}
while($rowz = $presults->fetch_assoc()) {
    $fpassword = $rowz["password"];
}
while($rowpu = $muresults->fetch_assoc()) {
    $mfusername = $rowpu["username"];
}
while($rowzu = $mpresults->fetch_assoc()) {
    $mfpassword = $rowzu["password"];
}

if (($userusername == $mfusername) && ($userpassword == $mfpassword)) {
    session_start();
    $_SESSION['username'] = "master";
    header("Location:edit.php");
    die;
}
if (($userusername == $fusername) && ($userpassword == $fpassword)) {
    session_start();
    $_SESSION['username'] = "set";
    header("Location:edit.php");
} else {
    header("Location:login.php");
}
mysqli_close($conn);
?>