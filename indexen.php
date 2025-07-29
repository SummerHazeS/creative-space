
<?php 
	session_start();
    $host = "localhost";
    $dbname = "christmas_party";
    $username = "Summer_Haze";
    $password = "TestSummerHaze";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="keywords" content="таен дядо Коледа,Коледа, желание, коледа, зима, подаръци, Secret Santa, Wish">
	<meta name="description" content="Secret Santa website">
	<script type="text/javascript" src="WishesSecretSanta.js"></script>
	<link rel="stylesheet" href="index600.css">
	<link rel="stylesheet" href="index600enAddEnd.css">
	<link rel="stylesheet" href="footer1.css">
	<link rel="stylesheet" href="footer1enAddEnd.css">
	<script>
function FlagClick2 () {
	document.getElementById("FlagBg").style.visibility = "visible";
	document.getElementById("FlagBg").style.left = "160px";
	window.document.location.href = "indexen.php";
}

function FlagClick1 () {
	window.document.location.href = "index.php";
}
	</script>
	<title><?php echo htmlspecialchars('Secret Santa Registration')?></title>
</head>
<body>
<?php 
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h3>Hello, Secret Santa" . "<button type='submit' id = 'HelloSecretSanta' name='HelloSecretSanta' value='HelloSecretSanta' onclick = 'CRPerson2 ()'>Log in</button></h3><br><br>";
	} catch (PDOException $e) {
		echo "Connection error: " . $e->getMessage();
		}
?>
	<h3><?php echo htmlspecialchars('Please fill in the following fields!'); ?></h3>
	<form id = "NPSSmainForm" action='<?php echo $_SERVER['PHP_SELF'] ?>' target='_self' method='post' name='NPSSmainForm' accept-charset='utf-8' autocomplete="off">
	<input type='text' name='name' value='Your name' maxlength="100" onclick='hideX("0")' onfocus='showHint("YNe")' onmouseenter='showHint("YNe")' onmouseleave='hideHint("YNe")' required><label id='YNe'>Name</label>
	<input type='text' name='years' pattern="[1-9]{1}[0-9]{1}|[0-9]{1}" value='Your age' maxlength="3" onclick='hideX("1")' onfocus='showHint("YY")' onmouseenter='showHint("YY")' onmouseleave='hideHint("YY")' required><label id='YY'>Age</label>
	<input type='text' name='address' value = 'Your address' onclick='hideX("2")' onfocus='showHint("YA")' onmouseenter='showHint("YA")' onmouseleave='hideHint("YA")'><label id='YA'>Address</label>
	<input type='text' name='phoneNumber' pattern = "/^[0-9]()+\- ]+$/" value = 'Your phone number' maxlength="14" onclick='hideX("3")' onfocus='showHint("YPN")' onmouseenter='showHint("YPN")' onmouseleave='hideHint("YPN")'><label id='YPN'>Phone number</label>
	<input type='text' name='email' pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" value = 'Your e-mail' maxlength="200" onclick='hideX("4")' onfocus='showHint("YE")' onmouseenter='showHint("YE")' onmouseleave='hideHint("YE")' required><label id='YE'>E-mail</label>
	<input type='text' name='wish_for' value='Your wish' maxlength="500" onclick='hideX("5")' onfocus='showHint("YW")' onmouseenter='showHint("YW")' onmouseleave='hideHint("YW")'><label id='YW'>Wish</label><br>	
	<button id = "RegSecretSanta" type='submit' name='RegSecretSanta' value='RegSecretSanta'><?php echo htmlspecialchars('Register a secret Santa')?></button><br><br>
</form> 
<?php
if (isset($_POST['RegSecretSanta'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['years'] = $_POST['years'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['phoneNumber'] = $_POST['phoneNumber'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['wish_for'] = $_POST['wish_for'];
    
    $name = $_POST['name'];
    $years = $_POST['years'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $wish_for = $_POST['wish_for'];

    try {
       $conn->beginTransaction();
        $sql_123 = "SELECT ID, Name, email  FROM persons WHERE email = '$email'";
		$stmt_123 = $conn->prepare($sql_123);
		$stmt_123->execute();
		if($stmt_123->rowCount() > 0) {
			if($stmt_123->rowCount() == 1) {   // правим проверка дали е повече от 1
				echo "<div id = 'Wellcomes'><p class='Comes'> Hello! There is already a record with this email. We are redirecting you to Login!</p>";
				echo "<script> setInterval(CRPerson,6000); </script>";
			} else if($stmt_123->rowCount() > 1) {  // повече от 1 - има грешка - невъзможен отговор
				echo "<div id = 'Wellcomes'><p class='Comes'>Error!</p>";
				}
		} else {  // или е ==0 или е <0 значи няма запис, значи започваме записа
		
        $sql_1 = "SELECT ID, pass, pass2 FROM fairies2 WHERE pass3 = 'no' LIMIT 1";
        $stmt_1 = $conn->prepare($sql_1);
        $stmt_1->execute();

        if ($row = $stmt_1->fetch(PDO::FETCH_ASSOC)) {
            $newID = $row['ID'];
            $newname = $row['pass'];
            $newpass = $row['pass2'];
			echo "<script>setInterval(Dissapear,100);</script>";
            echo "<div id = 'Wellcomes'><p class='Comes'>Your name is " . $newname . " and your password is " . $newpass . "</p>";

            $sql_2 = "INSERT INTO persons(ID,Name,Years,Address,Phone_Number,Email,Wish_for) VALUES (:newID, :name, :years, :address, :phoneNumber, :email, :wish_for) LIMIT 1"; //
            $stmt_2 = $conn->prepare($sql_2);
            $stmt_2->bindParam(':newID', $newID);
            $stmt_2->bindParam(':name', $name);
			$stmt_2->bindParam(':years', $years);
            $stmt_2->bindParam(':address', $address);
            $stmt_2->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
            $stmt_2->bindParam(':email', $email);
            $stmt_2->bindParam(':wish_for', $wish_for);
            $stmt_2->execute();

            if ($stmt_2) {
                $IDnumber = $conn->lastInsertId();
                echo "<br><p class='Comes2'>Wellcome!</p></div>";
    
                $sql_3 = "UPDATE fairies2 SET pass3 = 'yes' WHERE pass = :newname AND pass2 = :newpass";
                $stmt_3 = $conn->prepare($sql_3);
                $stmt_3->bindParam(':newname', $newname);
                $stmt_3->bindParam(':newpass', $newpass);
                $stmt_3->execute();

                if ($stmt_3) {
                    $_SESSION['SSName'] = $newname;
                    $_SESSION['SSPassword'] = $newpass;
                    $_SESSION['IDnumber'] = $IDnumber;
					$RegMessageTo = $email;		
					$RegMessageSubject  = "Greetings from Secret Santa!";
					$RegMessageTxt = 'Welcome to Secret Santa! You have successfully registered on our site.' .'\n'. 
					'Your nickname is: ' . $newname . '.'.'\n'. 'Your password is: '. $newpass . '.'.'\n'.
					'In case you have any questions, you can contact us through this email or send a message using the "Contact" button on the site.'.'\n'.
					'Sincerely,'.'\n'.'The team of'.'\n'.'www.winterfairyinthemist.com'; 
					$RegMessageHeaders = "From: abigail@winterfairyinthemist.com" . "\r\n" ."CC: " . $RegMessageTo;
					mail($RegMessageTo,$RegMessageSubject,$RegMessageTxt,$RegMessageHeaders);
					$MessageTo = "makedonskaliliya@gmail.com";
					$MessageSubject  = "New person!"; 
					$MessageTxt = "There is a new one registered in the database на www.winterfairyinthemist.com."; 
					$MessageHeaders = "From: abigail@winterfairyinthemist.com" . "\r\n" ."CC: makedonskaliliya@gmail.com";
					mail($MessageTo,$MessageSubject,$MessageTxt,$MessageHeaders);
					} 
					echo "<script>setInterval(RPerson2, 6000);</script>";
						$conn->commit();
            } else {
                    echo "Error updating record: " . print_r($stmt_3->errorInfo(), true);
                    $conn->rollBack();
                    }      
        } else {
            echo htmlspecialchars("No such record. Please write down the Nickname and Password for login.");
            echo "<form action='NPSecretSanta.php' target='_self' method='post' name='NPSSRegSecretSantaFairiesForm' accept-charset='utf-8'>
                    <input type='text' name='Fairies_name' value='Your NickName' onclick='hideX('6')'><br><br>
					<input type='text' name='Fairies_pass' value='Your PassWord' onclick='hideX('7')'><br><br>
                    <button type='submit' name='RegSecretSantaFairies' value='RegSecretSantaFairies'>Confirm</button><br>
				</form><br>";
                        
            if(isset($_POST["RegSecretSantaFairies"])){
                $_SESSION["Fairies_name"] = $_POST["Fairies_name"];
                $_SESSION["Fairies_pass"] = $_POST["Fairies_pass"];
                $Fairies_name = $_POST["Fairies_name"];
                $Fairies_pass = $_POST["Fairies_pass"];
                            
                $sql_4 = "INSERT INTO fairies2 (pass, pass2, pass3, pass4) VALUES (:Fairies_name, :Fairies_pass, 'no', 'CMade') LIMIT 1";
                $stmt4 = $conn->prepare($sql_4);
                $stmt4->bindParam(':Fairies_name', $Fairies_name, PDO::PARAM_STR);
                $stmt4->bindParam(':Fairies_pass', $Fairies_pass, PDO::PARAM_STR);
                $result4 = $stmt4->execute();
                        
                $sql_5 = "SELECT ID, pass, pass2 FROM fairies2 WHERE pass3 = 'no' LIMIT 1";
                $stmt5 = $conn->prepare($sql_5);
                $stmt5->execute();
                $row = $stmt5->fetch(PDO::FETCH_ASSOC);
                        
                if ($row) {
                    $newID = $row["ID"];
                    $newname = $row["pass"];
                    $newpass = $row["pass2"];
                        
                    echo "<script>setInterval(Dissapear,100);</script>";
                    echo "<div id = 'Wellcomes'><p class='Comes'>Your name is " . $newname . " and your password is " . $newpass . "</p>";
                        
                    $sql_6 = "INSERT INTO persons (ID, Name, Years, Address, Phone_Number, Email, Wish_for) VALUES (:newID, :name, :years, :address, :phoneNumber, :email, :wish_for) LIMIT 1";
                    $stmt6 = $conn->prepare($sql_6);
                    $stmt6->bindParam(':newID', $newID, PDO::PARAM_INT);
                    $stmt6->bindParam(':name', $name, PDO::PARAM_STR);
                    $stmt6->bindParam(':years', $years, PDO::PARAM_STR);
                    $stmt6->bindParam(':address', $address, PDO::PARAM_STR);
                    $stmt6->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
                    $stmt6->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt6->bindParam(':wish_for', $wish_for, PDO::PARAM_STR);
                    $result6 = $stmt6->execute();
                        
                    if ($result6) {
                        $IDnumber = $conn->lastInsertId();
                        echo "<br><p class='Comes2'>Welcome, Secret Santa!!!</p></div>";
                    } else {
                        echo " ";
                        }
                    
					$sql_7 = "UPDATE fairies2 SET pass3 = 'yes' WHERE pass = :newname AND pass2 = :newpass";
                    $stmt7 = $conn->prepare($sql_7);
                    $stmt7->bindParam(':newname', $newname, PDO::PARAM_STR);
                    $stmt7->bindParam(':newpass', $newpass, PDO::PARAM_STR);
                    $result7 = $stmt7->execute();
                        
                    if ($result7) {
                        $_SESSION["SSName"] = $newname;
                        $_SESSION["SSPassword"] = $newpass;
                        $_SESSION["IDnumber"] = $IDnumber;
						echo "<script>setInterval(RPerson2,6000);</script>";
                    } else {
                        echo "Error updating record: " . implode(" ", $stmt7->errorInfo());
                        }
                } else {
                    echo " ";
                    }
				}
			}
		}
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
		$conn->rollBack();
		}
}

if (isset($_POST['AdminConnectButton'])) {
    $_SESSION['AdminConnect'] = $_POST['AdminConnect'];
    $AdminConnect = $_POST['AdminConnect'];
    try {
        $sql_8 = "INSERT INTO vikings(Text) VALUES (:AdminConnect)";
        $stmt8 = $conn->prepare($sql_8);
        $stmt8->bindParam(':AdminConnect', $AdminConnect);
        $stmt8->execute();
        echo "<div><p class='Comes2'>Your message has been sent!</p></div>";
    } catch (PDOException $e) {
        echo "" . $e->getMessage();
		}
} else {
    echo "";
    }	
?>
<div class = "footer">
	<button id = "AdminInfoButton" type="submit" name="AdminInfo" value="AdminInfo" formtarget = "_self" formmethod  = "post" onclick="showAdminInfo()">Info</button>
	<button id = "AdminConnButton" type="submit" name="AdminConnection" value="AdminConnection" formtarget = "_self" formmethod  = "post" onclick="showContactForm()">Contact</button>
	<div id = "Flag">
	<img id = "FlagEn" src="Enlan.png" alt="flag" width= "32px" height= "24px" onclick="FlagClick2()">
	<img id = "FlagBg" src="flagbgs.png" alt="flag" width= "20px" height= "20px" onclick="FlagClick1()">
	</div>
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
</body>
</html>	