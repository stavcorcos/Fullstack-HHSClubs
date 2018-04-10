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

session_start();
if (isset($_SESSION['refresh'])) {
    header("Location:index.php");
    session_unset();
    die;
}
$_SESSION['refresh'] = "done";

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
    echo "<h1 style = 'text-align: center; color: white;'> You've successfully added a club! </h1>";
}

?>
<html>
    <head>
        <title>Club added</title>
        <meta name="description" content="This is my website. It's not good :(">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href = "style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </head>
    <div class = "container">
    <div class = "row justify-content-center">
<a href = "index.php"><button class = "btn btn-md btn-submit-custom">Back to main page</button></a>
</div>
</div>
</html>