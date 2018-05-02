<?php session_start();
if(!isset($_SESSION['username'])){
   header("Location:login.php");
} 
?>

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

$query= "SELECT clubName FROM HHSClubData ORDER BY clubName;";
$results = $conn->query($query);
$resultstwo = $conn->query($query);

?>
<html>
    <head>
        <title>Edit Clubs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
<body onload="init(), inittwo()" id = "body">
<br>
<div class = "container">
<div class = "row justify-content-center">
    <a href = "index.php"><button class = "btn btn-md btn-submit-custom">Back to main page</button></a>
</div>
</div>
<br>
<div class = "container">
<div class = "row justify-content-center">
<div class = "col-xl-6 col-lg-6 col-md-7 col-sm-12">
    <h1 style = "text-align: center; color: white;"> Add a club </h1>
    <form style = "text-align: center;"action = "insert.php" method="post">
        <input placeholder = "Club name." style = "width: 100%;" type = "text" required name="name"><br><br>
        <textarea row="1" id="text" placeholder = "A short hook to catch a student's attention." style = "width: 100%; resize: none; overflow: hidden; outline: none;" type = "text" required name="shortDesc"></textarea><br><br>
        <div data-tip="Right click on an image, click 'Open image in new tab', and copy paste that link. If you want to upload your own image, do so on another site and follow these instructions (sites like imgur or imgbb)."><input pattern="(?:([^:/?#]+):)?(?://([^/?#]*))?([^?#]*\.(?:jpg|gif|png|jpeg))(?:\?([^#]*))?(?:#(.*))?" placeholder = "Main Clubs Page Image URL, must end with .png, .jpg, or .gif!" style = "width: 100%;" type = "text" required name="icon"></div><br>
        <div data-tip="Right click on an image, click 'Open image in new tab', and copy paste that link. If you want to upload your own image, do so on another site and follow these instructions (sites like imgur or imgbb)."><input pattern="(?:([^:/?#]+):)?(?://([^/?#]*))?([^?#]*\.(?:jpg|gif|png|jpeg))(?:\?([^#]*))?(?:#(.*))?" placeholder = "Top image URL, must end with .png, .jpg, or .gif!" style = "width: 100%;" type = "text" required name="left"></div><br>
        <textarea row="1" id="texttwo" placeholder = "A long description to tell students about the club. Fill this out thoughroughly!" style = "width: 100%; resize: none; overflow: hidden; outline: none;" type = "text" required name="longDesc"></textarea><br><br>
        <input placeholder = "Location\Room #" style = "width: 100%;" type = "text" required name="room"><br><br>
        <input placeholder = "Days and Times: " style = "width: 100%;" type = "text" required name="times"><br><br>
        <input placeholder = "Advisor's name." style = "width: 100%;" type = "text" required name="advisor"><br><br>
        <input placeholder = "Advisor's contact information." style = "width: 100%;" type = "email" required name="email"><br><br>
        <input  class = "btn btn-md btn-submit-custom" type="submit" value = "Add">
    </form>
</div>
<div class = "col-xl-6 col-lg-6 col-md-5 col-sm-12">
<h1 style = "text-align: center; color: white;"> Delete a club </h1>
<form action = "delete.php" method="post">
    <div class = "row">
    <?php 
        while($rows = $results->fetch_assoc()) {
            echo "<div class = 'col-xl-6 col-lg-6 col-md-12 col-sm-12'>";
            echo "<input style = 'color: white;' required type = 'radio' name='delclub' value='" . mysql_real_escape_string ($rows["clubName"]) . "'>" . "<span style = 'color: white; font-size: 20px;'>" . mysql_real_escape_string ($rows["clubName"]) . "</span>" . "<br>";
            echo "</div>";
        }
    ?>
    </div>
    <br>
    <div style = "text-align: center">
    <input  class = "btn btn-md btn-submit-custom" type="submit" value = "Delete">
    </div>
</form>
</div>
<div class = "col-xl-6 col-lg-6 col-md-5 col-sm-12">
<h1 style = "text-align: center; color: white;"> Edit a club </h1>
<form action = "editing.php" method="post">
    <div class = "row">
    <?php 
        while($rowu = $resultstwo->fetch_assoc()) {
            echo "<div class = 'col-xl-6 col-lg-6 col-md-12 col-sm-12'>";
            echo "<input style = 'color: white;' required type = 'radio' name='editclub' value='" . mysql_real_escape_string ($rowu["clubName"]) . "'>" . "<span style = 'color: white; font-size: 20px;'>" . mysql_real_escape_string ($rowu["clubName"]) . "</span>" . "<br>";
            echo "</div>";
        }
    ?>
    </div>
    <br>
    <div style = "text-align: center">
    <input  class = "btn btn-md btn-submit-custom" type="submit" value = "Modify">
    </div>
</form>
</div>
</div>
</div>
<br>
<?php if ($_SESSION['username'] == "master") {
    echo "<div class = 'container'>";
    echo "<div class = 'row justify-content-center'>";
    echo "<div class = 'col-xl-12 col-lg-12 col-md-12 col-sm-12'>";
    echo "<h1 style = 'text-align: center; color: white;'> Reset non-admin password </h1>" . "<br>";
    echo "</div>";
    echo "<form onsubmit='checkCaptcha()' style = 'text-align: center;'action = 'password.php' method='post'>";
    echo "<div id = 'recaptcha' class='g-recaptcha' data-sitekey='6LfarFIUAAAAAOROsAVMC76_4iM0XWS97IcWUx6x'></div> <br>";
    echo "<input id = 'verifiedc' class = 'btn btn-md btnsuperCustom' type='submit' value = 'Reset Password'>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
}?>
<br>
<script type="text/javascript">
function checkCaptcha() {
if (grecaptcha.getResponse() == ""){event.preventDefault()}else{}}
var observe;
if (window.attachEvent) {
    observe = function (element, event, handler) {
        element.attachEvent('on'+event, handler);
    };
}
else {
    observe = function (element, event, handler) {
        element.addEventListener(event, handler, false);
    };
}
function init () {
    var text = document.getElementById('text');
    function resize () {
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
    /* 0-timeout to get the already changed text */
    function delayedResize () {
        window.setTimeout(resize, 0);
    }
    observe(text, 'change',  resize);
    observe(text, 'cut',     delayedResize);
    observe(text, 'paste',   delayedResize);
    observe(text, 'drop',    delayedResize);
    observe(text, 'keydown', delayedResize);

    text.focus();
    text.select();
    resize();
}
</script>
<script type="text/javascript">
var observetwo;
if (window.attachEvent) {
    observetwo = function (element, event, handler) {
        element.attachEvent('on'+event, handler);
    };
}
else {
    observetwo = function (element, event, handler) {
        element.addEventListener(event, handler, false);
    };
}
function inittwo () {
    var texttwo = document.getElementById('texttwo');
    function resizetwo () {
        texttwo.style.height = 'auto';
        texttwo.style.height = texttwo.scrollHeight+'px';
    }
    /* 0-timeout to get the already changed text */
    function delayedResizetwo () {
        window.setTimeout(resizetwo, 0);
    }
    observetwo(texttwo, 'change',  resizetwo);
    observetwo(texttwo, 'cut',     delayedResizetwo);
    observetwo(texttwo, 'paste',   delayedResizetwo);
    observetwo(texttwo, 'drop',    delayedResizetwo);
    observetwo(texttwo, 'keydown', delayedResizetwo);

    texttwo.focus();
    texttwo.select();
    resizetwo();
}
</script>
</body>
</html>

<?php
mysqli_close($conn);
?>