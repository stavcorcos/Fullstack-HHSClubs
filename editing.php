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

$clubname = mysqli_real_escape_string($conn, $_POST['editclub']);

$namequery= "SELECT clubName FROM HHSClubData WHERE clubName = ('$clubname')";
$nameresults = $conn->query($namequery);
$shortquery= "SELECT shortDesc FROM HHSClubData WHERE clubName = ('$clubname')";
$shortresults = $conn->query($shortquery);
$iconquery= "SELECT clubIcon FROM HHSClubData WHERE clubName = ('$clubname')";
$iconresults = $conn->query($iconquery);
$leftquery= "SELECT leftImage FROM HHSClubData WHERE clubName = ('$clubname')";
$leftresults = $conn->query($leftquery);
$longquery= "SELECT longDesc FROM HHSClubData WHERE clubName = ('$clubname')";
$longresults = $conn->query($longquery);
$roomquery= "SELECT room FROM HHSClubData WHERE clubName = ('$clubname')";
$roomresults = $conn->query($roomquery);
$timesquery= "SELECT times FROM HHSClubData WHERE clubName = ('$clubname')";
$timesresults = $conn->query($timesquery);
$advisorquery= "SELECT advisor FROM HHSClubData WHERE clubName = ('$clubname')";
$advisorresults = $conn->query($advisorquery);
$emailquery= "SELECT email FROM HHSClubData WHERE clubName = ('$clubname')";
$emailresults = $conn->query($emailquery);

while($row = $nameresults->fetch_assoc()) {
    $vname = $row["clubName"];
}
while($rowd = $shortresults->fetch_assoc()) {
    $vshort = $rowd["shortDesc"];
}
while($rowp = $iconresults->fetch_assoc()) {
    $vicon = $rowp["clubIcon"];
}
while($rowa = $leftresults->fetch_assoc()) {
    $vimage = $rowa["leftImage"];
}
while($rowc = $longresults->fetch_assoc()) {
    $vlong = $rowc["longDesc"];
}
while($rowe = $roomresults->fetch_assoc()) {
    $vroom = $rowe["room"];
}
while($rowh = $timesresults->fetch_assoc()) {
    $vtimes = $rowh["times"];
}
while($rowl = $advisorresults->fetch_assoc()) {
    $vadvisor = $rowl["advisor"];
}
while($rowu = $emailresults->fetch_assoc()) {
    $vemail = $rowu["email"];
}

?>
<html>
    <head>
        <title>Club editing</title>
        <meta name="description" content="">
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
<body onload="init(), inittwo()">
    <div class = "container">
    <div class = "row justify-content-center">
    <div class = "col-xl-8 col-lg-9 col-md-10 col-sm-12">
    <h1 style = "text-align: center; color: white;"> Editing: <?php echo "$clubname" ?> </h1>
    <form style = "text-align: center;"action = "modify.php" method="post">
        <input value="<?php echo "$vname"; ?>" style = "width: 100%;" type = "hidden" required name="name"><br>
        <textarea row="1" id="text" style = "width: 100%; resize: none; overflow: hidden; outline: none;" type = "text" required name="shortDesc"><?php echo "$vshort"; ?></textarea><br><br>
        <div data-tip="Right click on an image, click 'Open image in new tab', and copy paste that link. If you want to upload your own image, do so on another site and follow these instructions (sites like imgur or imgbb)."><input pattern="(?:([^:/?#]+):)?(?://([^/?#]*))?([^?#]*\.(?:jpg|gif|png|jpeg))(?:\?([^#]*))?(?:#(.*))?" value = "<?php echo "$vicon"; ?>" style = "width: 100%;" type = "text" required name="icon"></div><br>
        <div data-tip="Right click on an image, click 'Open image in new tab', and copy paste that link. If you want to upload your own image, do so on another site and follow these instructions (sites like imgur or imgbb)."><input pattern="(?:([^:/?#]+):)?(?://([^/?#]*))?([^?#]*\.(?:jpg|gif|png|jpeg))(?:\?([^#]*))?(?:#(.*))?" value = "<?php echo "$vimage"; ?>" style = "width: 100%;" type = "text" required name="left"></div><br>
        <textarea row="1" id="texttwo" style = "width: 100%; resize: none; overflow: hidden; outline: none;" type = "text" required name="longDesc"><?php echo "$vlong"; ?></textarea><br><br>
        <input value = "<?php echo "$vroom"; ?>" style = "width: 100%;" type = "text" required name="room"><br><br>
        <input value = "<?php echo "$vtimes"; ?>" style = "width: 100%;" type = "text" required name="times"><br><br>
        <input value = "<?php echo "$vadvisor"; ?>" style = "width: 100%;" type = "text" required name="advisor"><br><br>
        <input value = "<?php echo "$vemail"; ?>" style = "width: 100%;" type = "email" required name="email"><br><br>
        <input  class = "btn btn-md btn-submit-custom" type="submit">
    </form>
    </div>
    </div>
    </div>
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
<?php
mysqli_close($conn);
?>