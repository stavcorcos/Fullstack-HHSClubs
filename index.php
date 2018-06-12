<?php
if ($_SERVER['HTTP_X_FORWARDED_PROTO'] != "https") {
    header('Location: https://hhsclubs.herokuapp.com/index.php');
    exit;
    die;
}
session_start();
$servername = getenv("herokuServer");
$username = getenv("herokuUser");
$password = getenv("herokuPass");
$dbName = getenv("herokuDB");


// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

$clubInfoQuery = "SELECT * FROM HHSClubData order by clubName REGEXP '^\d*[^\da-z&\.\' \-\"\!\@\#\$\%\^\*\(\)\;\:\<\>\,\?\/\~\`\|\_\-]' DESC, 
clubName+0, clubName;";
$clubInfoResults = $conn->query($clubInfoQuery);

$nameObject = array();
$shortObject = array();
$iconObject = array();
$leftObject = array();
$longObject = array();
$roomObject = array();
$timesObject = array();
$advisorObject = array();
$emailObject = array();

while($row = $clubInfoResults->fetch_assoc()) {
    $nameObject[] = $row['clubName'];
    $shortObject[] = $row['shortDesc'];
    $iconObject[] = $row['clubIcon'];
    $leftObject[] = $row['longDesc'];
    $longObject[] = $row['leftImage'];
    $roomObject[] = $row['room'];
    $timesObject[] = $row['times'];
    $advisorObject[] = $row['advisor'];
    $emailObject[] = $row['email'];
}

?>
<html>
    <head>
        <title>HHS Clubs</title>
        <meta name="description" content="A place to view all the highschool's clubs.">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href = "style.css">
        <link rel="icon" href="Images/HHS Clubs Favicon.png">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </head>
<body id = "body">
<nav class="hhsclubsnav" id = "navigation">
    <div class="container">
        <div class="row justify-content-between">
            <a class = "hhsmainpage"href="https://www.hewlett-woodmere.net/Domain/497">Back to HHS Main Page</a>
            <div class = "googletranslate" id="google_translate_element"></div>
            <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
            }
            </script>
        </div>
    </div>
</nav>
<div class="jumbotron">
    <img style = "width: 100%; height: auto; margin: 0; padding: 0;" src="Images/header.png" id = "cpuheader">
    <img style = "width: 100%; height: auto; margin: 0; padding: 0;" src="Images\ClubsHeaderMobile.png" id = "mobileheader">
</div>
<script type="text/javascript">
var clubNamesObject = <?php echo json_encode($nameObject) ?>;
var shortDescObject = <?php echo json_encode($shortObject) ?>;
var clubIconsObject = <?php echo json_encode($iconObject) ?>;
var leftImageObject = <?php echo json_encode($leftObject) ?>;
var longDescObject = <?php echo json_encode($longObject) ?>;
var roomObject = <?php echo json_encode($roomObject) ?>;
var timesObject = <?php echo json_encode($timesObject) ?>;
var advisorObject = <?php echo json_encode($advisorObject) ?>;
var emailObject = <?php echo json_encode($emailObject) ?>;
<?php echo "$clubNamesObject"; ?>
</script>
<div class="container-fluid">
    <div class="row align-items-end justify-content-around" id = "clubContainer">
    </div>
</div>
<script src = "app.js"></script>
<footer class="footer" id = "footer">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <span class = "copyright" >2018 HHSClubs</span>
            <a href="edit.php" id="editBtn"><button class = "btn btn-md btn-custom">Add or delete a club</button></a>
            <span><img style = "height: 18px;" src = "Images/Poonchy Script Logo Header White.png"></span>
        </div>
    </div>
</footer>
<footer class="footer" id = "footerPhone">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <span class = "copyright" >2018 HHSClubs</span>
            <span><img style = "height: 18px;" src = "Images/Poonchy Script Logo Header White.png"></span>
            <a href="edit.php" id="editBtn"><button class = "btn btn-md btn-custom">Add or delete a club</button></a>
        </div>
    </div>
</footer>
</body>
</html>
<?php
session_unset();
mysqli_close($conn);
?>