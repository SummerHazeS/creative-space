
<?php
    session_start();
    $host = "localhost";
    $dbname = "christmas_party";
    $username = "Summer_Haze";
    $password = "TestSummerHaze";
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="таен дядо Коледа,Коледа, желание, коледа, зима, подаръци, Secret Santa, Wish">
    <meta name="description" content="Secret Santa website">
    <script type="text/javascript" src="WishesSecretSanta.js"></script>
	<link rel="stylesheet" href="HSecretSanta.css">
	<link rel="stylesheet" href="HSecretSantaEnAdd.css">
	<link rel="stylesheet" href="footer1.css">
	<link rel="stylesheet" href="footer1enAddEnd.css">
			<script>
function NRPerson2 () { 
	window.document.location.href = "indexen.php";
}

function CRPerson2 () {
	location.assign("HSecretSantaen.php");
}

function RPerson2 () {
	location.assign("WishesSecretSantaen.php");
}
	</script>
    <title><?php echo htmlspecialchars('Secret Santa')?></title>
</head>
<body onload="showUp()">
<img id = "SnejinkaVij" src="sne.png" alt="sne" width= "40px" height= "40px"><span id = 'Clicka'>Click the snowflake</span>
<div name = "divHSecretSanta">
    <h3 id="HSS">Hello Secret Santa!</h3>
    <h3 id="PHSS">Please fill in the following fields!</h3>
		<form id="HSSRForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" target="_self" method="post" name="HSSRForm" accept-charset="utf-8" autocomplete="off">
			<input id="SSName" type="text" name="SSName" value="Nickname" onclick="hideX(0)" onfocus="showHint('YN')" onmouseenter="showHint('YN')" onmouseleave="hideHint('YN')" required><label id="YN" for = 'SSName'>Nickname</label>
			<input id="SSPassword" type="password" name="SSPassword" value="*********" onclick="hideX(1)" onfocus="showHint('YP')" onmouseenter="showHint('YP')" onmouseleave="hideHint('YP')" required><label id="YP" for = 'SSPassword'>Password</label>
			<br>
			<button type="submit" name="CheckSecretSanta" value="CheckSecretSanta">Enter, Secret Santa</button>	
    	</form>
</div>

<div class = "footer">
	<button id = "AdminInfoButton" type="submit" name="AdminInfo" value="AdminInfo" formtarget = "_self" formmethod  = "post" onclick="showAdminInfo()">Info</button>
	<button id = "AdminConnButton" type="submit" name="AdminConnection" value="AdminConnection" formtarget = "_self" formmethod  = "post" onclick="showContactForm()">Contact</button>
	<div id="showAdminInfo">
		<div id="showAdminInfoInside">
			<a href="javascript:void(0)" id="closebtn" onclick="closeAdminInfo()">&times;</a>
			<h3>Secret Santa</h3>
            <p></p>
			<p><span>With your registration:</span><br><span> =></span> you get permission to choose a wish you want and you can fulfill by becoming a Secret santa;<br><span> =></span> you agree to have your secret santa wish to be chosen by others to please you;</p>
			<p>A person can choose one wish to grant.<br>A person can record one wish to fulfill.<br></p>
			<p>Deadline to fulfill the wish is Christmas.</p>
		</div>
	</div>
	<form id = "AdminForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" name = "AdminForm" autocomplete="off">
		<label for="AdminConnect">To the administrator:</label>
		<textarea id="AdminC" name="AdminConnect" rows="4" cols="45">Forgot password?! Short, clear message, leave feedback - email or phone.</textarea>
		<br>
		<button id = "AdminConnect" type="submit" name="AdminConnectButton" value="AdminConnect" formtarget = "_self" formmethod  = "post">Send</button>
		<a href="javascript:void(0)" id = "closebtn2" onclick="hideContactForm()">&times;</a>
	</form>
</div>

<?php
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if (isset($_POST['CheckSecretSanta'])) {
        $_SESSION['SSName'] = $_POST['SSName'];
        $_SESSION['SSPassword'] = $_POST['SSPassword'];
        $SSName = trim($_POST['SSName']);
        $SSPassword = trim($_POST['SSPassword']);
    
        $sql = "SELECT * FROM fairies2 WHERE pass = :SSName AND pass2 = :SSPassword AND pass3 = 'yes'";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':SSName', $SSName);
        $stmt->bindParam(':SSPassword', $SSPassword);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $b = 1;
            echo "<p id = 'HelloPar'> Hello, " . $SSName . "! <br> You are welcome!" . "</p>";
			echo "<script> setInterval(RPerson2,6000); </script>";
        } else {
            $b = 1;
            echo "<p id = 'RegPar'>You are an unregistered user. We transfer you to registration.</p>";
            echo "<script> setInterval(NRPerson2,6000); </script>";
            }
    }     
} catch (PDOException $e) {
    echo "Connection error: " . $e->getMessage();
	}

if (isset($_POST['AdminConnectButton'])) {
    $_SESSION['AdminConnect'] = $_POST['AdminConnect'];
    $AdminConnect = $_POST['AdminConnect'];
    try {
        $sql2 = "INSERT INTO vikings(Text) VALUES (:AdminConnect)";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bindParam(':AdminConnect', $AdminConnect);
        $stmt2->execute();
        echo "<p>Message sent!</p>";
    } catch (PDOException $e) {
        echo "" . $e->getMessage();
		}
} else {
    echo "";
    }

?>

</body>
</html>