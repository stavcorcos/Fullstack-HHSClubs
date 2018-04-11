<?php
session_start();
$servername = getenv("herokuServer");
$username = getenv("herokuUser");
$password = getenv("herokuPass");
$dbName = getenv("herokuDB");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

$namequery= "SELECT clubName FROM HHSClubData";
$nameresults = $conn->query($namequery);
$shortquery= "SELECT shortDesc FROM HHSClubData";
$shortresults = $conn->query($shortquery);
$iconquery= "SELECT clubIcon FROM HHSClubData";
$iconresults = $conn->query($iconquery);
$leftquery= "SELECT leftImage FROM HHSClubData";
$leftresults = $conn->query($leftquery);
$longquery= "SELECT longDesc FROM HHSClubData";
$longresults = $conn->query($longquery);
$roomquery= "SELECT room FROM HHSClubData";
$roomresults = $conn->query($roomquery);
$timesquery= "SELECT times FROM HHSClubData";
$timesresults = $conn->query($timesquery);
$advisorquery= "SELECT advisor FROM HHSClubData";
$advisorresults = $conn->query($advisorquery);
$emailquery= "SELECT email FROM HHSClubData";
$emailresults = $conn->query($emailquery);

//while($row = $results->fetch_assoc()) {
    //echo "id :" . $row["id"] . "<br>" . "Name : " . $row["clubName"] . "<br>" . "<br>";
//}

$nameObject = array();
while($row = $nameresults->fetch_assoc()) {
    $nameObject[] = $row;
}
$shortObject = array();
while($rowd = $shortresults->fetch_assoc()) {
    $shortObject[] = $rowd;
}
$iconObject = array();
while($rowp = $iconresults->fetch_assoc()) {
    $iconObject[] = $rowp;
}
$leftObject = array();
while($rowa = $leftresults->fetch_assoc()) {
    $leftObject[] = $rowa;
}
$longObject = array();
while($rowc = $longresults->fetch_assoc()) {
    $longObject[] = $rowc;
}
$roomObject = array();
while($rowe = $roomresults->fetch_assoc()) {
    $roomObject[] = $rowe;
}
$timesObject = array();
while($rowh = $timesresults->fetch_assoc()) {
    $timesObject[] = $rowh;
}
$advisorObject = array();
while($rowl = $advisorresults->fetch_assoc()) {
    $advisorObject[] = $rowl;
}
$emailObject = array();
while($rowu = $emailresults->fetch_assoc()) {
    $emailObject[] = $rowu;
}

?>
<html>
    <head>
        <title>HHS Clubs</title>
        <meta name="description" content="A place to view all the highschool's clubs.">
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
    <img style = "width: 100%; height: auto; margin: 0; padding: 0;" src="Images/header.png">
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
            <span><a class="copyright" target="_blank" href = "https://github.com/Poonchy">&copy; Stav Corcos</a></span>
        </div>
    </div>
</footer>
<footer class="footer" id = "footerPhone">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <span class = "copyright" >2018 HHSClubs</span>
            <span><a class="copyright" target="_blank" href = "https://github.com/Poonchy">&copy; Stav Corcos</a></span>
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