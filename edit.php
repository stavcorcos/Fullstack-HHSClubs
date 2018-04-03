<?php session_start();
if(!isset($_SESSION['username'])){
   header("Location:Login.php");
} 
session_unset();?>

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

$query= "SELECT clubName FROM HHSClubData";
$results = $conn->query($query);

?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </head>
<body id = "body">

<div class = "row justify-content-center">
<div class = "col-6">
    <h1 style = "color: white;"> Add a club. </h1>
    <form action = "insert.php" method="post">
        <input placeholder = "Club name..." style = "width: 400px;" type = "text" required name="name"><br><br>
        <input id="text" placeholder = "A short description to catch a student's attention." style = "width: 400px; resize: none; overflow: hidden; outline: none;" type = "text" required name="shortDesc"><br><br>
        <input placeholder = "Background image URL.. must end in .png,.jpg or .jpeg!" style = "width: 400px;" type = "text" required name="icon"><br><br>
        <input placeholder = "Left image URL... must end in .png,.jpg or .jpeg!" style = "width: 400px;" type = "text" required name="left"><br><br>
        <input id="texttwo" placeholder = "A long description to tell the student what he would do." style = "width: 400px; resize: none; overflow: hidden; outline: none;" type = "text" required name="longDesc"><br><br>
        <input placeholder = "Right image URL... must end in .png,.jpg or .jpeg!" style = "width: 400px;" type = "text" required name="right"><br><br>
        <input placeholder = "Room # or location of rendevouz." style = "width: 400px;" type = "text" required name="room"><br><br>
        <input placeholder = "What times and on what days does the club meet?" style = "width: 400px;" type = "text" required name="times"><br><br>
        <input placeholder = "What is the advisor's name?" style = "width: 400px;" type = "text" required name="advisor"><br><br>
        <input placeholder = "Advisor's contact information" style = "width: 400px;" type = "email" required name="email"><br><br>
        <input type="submit">
    </form>
</div>
<div class = "col-6">
<h1 style = "color: white;"> Delete a club. </h1>
<form action = "delete.php" method="post">
    <?php 
        while($rows = $results->fetch_assoc()) {
            echo "<input type = 'radio' name='delclub' value='" . $rows["clubName"] . "'>" . $rows["clubName"];
        }
    ?>
    <br>
    <br>
    <input type="submit">
</form>
</div>
</div>
<br>
<script type="text/javascript">
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