
<?php
    session_start();
    $host = "localhost";
    $dbname = "christmas_party";
    $username = "Summer_Haze";
    $password = "TestSummerHaze";
?>
<!DOCTYPE html>
<html lang = "bg">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="таен дядо Коледа,Коледа, желание, коледа, зима, подаръци, Secret Santa, Wish">
    <meta name="description" content="Secret Santa website">
    <script type="text/javascript" src="WishesSecretSanta.js"></script>
	<link rel="stylesheet" href="HSecretSanta.css">
	<link rel="stylesheet" href="footer1.css">
    <title><?php echo htmlspecialchars('Secret Santa')?></title>
</head>
<body onload="showUp()">
<img id = "SnejinkaVij" src="sne.png" alt="sne" width= "40px" height= "40px"><span id = 'Clicka'>Кликни снежинката</span>
<div name = "divHSecretSanta">
    <h3 id="HSS">Здравей, Secret Santa!</h3>
    <h3 id="PHSS">Моля, попълни следните полета!</h3>
		<form id="HSSRForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" target="_self" method="post" name="HSSRForm" accept-charset="utf-8" autocomplete="off">
			<input id="SSName" type="text" name="SSName" value="Псевдоним" onclick="hideX(0)" onfocus="showHint('YN')" onmouseenter="showHint('YN')" onmouseleave="hideHint('YN')" required><label id="YN" for = 'SSName'>Псевдоним</label>
			<input id="SSPassword" type="password" name="SSPassword" value="*********" onclick="hideX(1)" onfocus="showHint('YP')" onmouseenter="showHint('YP')" onmouseleave="hideHint('YP')" required><label id="YP" for = 'SSPassword'>Парола</label>
			<br>
			<button type="submit" name="CheckSecretSanta" value="CheckSecretSanta">Влез, Secret Santa</button>	
    	</form>
</div>

<div class = "footer">
	<button id = "AdminInfoButton" type="submit" name="AdminInfo" value="AdminInfo" formtarget = "_self" formmethod  = "post" onclick="showAdminInfo()">Инфо</button>
	<button id = "AdminConnButton" type="submit" name="AdminConnection" value="AdminConnection" formtarget = "_self" formmethod  = "post" onclick="showContactForm()">Контакт</button>
	<div id="showAdminInfo">
		<div id="showAdminInfoInside">
			<a href="javascript:void(0)" id="closebtn" onclick="closeAdminInfo()">&times;</a>
			<h3>Secret Santa</h3>
            <p></p>
			<p><span>С регистрацията си:</span><br><span> =></span> получавате разрешение да изберете желание, което искате и можете да изпълните като ставате таен дядо Коледа;<br><span> =></span> съгласявате се да бъде избрано вашето желание от таен дядо Коледа, което той да изпълни;</p>
			<p>Един субект може да избере едно желание, което да изпълни.<br>Един субект може да запише едно желание за изпълнение.<br></p>
			<p>Крайна дата за изпъление на желанието е Коледа.</p>
		</div>
	</div>
	<form id = "AdminForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" name = "AdminForm" autocomplete="off">
		<label for="AdminConnect">До администратора:</label>
		<textarea id="AdminC" name="AdminConnect" rows="4" cols="45">Забравена парола?! Кратко, ясно съобщение, оставете обратна връзка - имейл или телефон.</textarea>
		<br>
		<button id = "AdminConnect" type="submit" name="AdminConnectButton" value="AdminConnect" formtarget = "_self" formmethod  = "post">Изпрати</button>
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
            echo "<p id = 'HelloPar'> Здравей, " . $SSName . "! <br> Ти си добре дошъл!" . "</p>";
			echo "<script> setInterval(RPerson,6000); </script>";
        } else {
            $b = 1;
            echo "<p id = 'RegPar'>Вие сте нерегистриран потребител. Прехвърляме Ви към регистрация.</p>";
            echo "<script> setInterval(NRPerson,6000); </script>";
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
        echo "<p>Изпратено съобщение!</p>";
    } catch (PDOException $e) {
        echo "" . $e->getMessage();
		}
} else {
    echo "";
    }

?>

</body>
</html>