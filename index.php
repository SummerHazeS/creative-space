
<?php 
	session_start();
    $host = "localhost";
    $dbname = "christmas_party";
    $username = "Summer_Haze";
    $password = "TestSummerHaze";
?>
<!DOCTYPE html>
<html lang="bg">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="keywords" content="таен дядо Коледа,Коледа, желание, коледа, зима, подаръци, Secret Santa, Wish">
	<meta name="description" content="Secret Santa website">
	<script type="text/javascript" src="WishesSecretSanta.js"></script>
	<link rel="stylesheet" href="index600.css">
	<link rel="stylesheet" href="footer1.css">
		<script>
function FlagClick1 () {
	document.getElementById("FlagEn").style.visibility = "visible";
	document.getElementById("FlagEn").style.left = "160px";
	window.document.location.href = "indexen.php";
}

function FlagClick2 () {
	window.document.location.href = "index.php";
}
	</script>
	<title><?php echo htmlspecialchars('Регистрация на Secret Santa')?></title>
</head>
<body>
<?php 
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h3>Здравей, Secret Santa" . "<button type='submit' id = 'HelloSecretSanta' name='HelloSecretSanta' value='HelloSecretSanta' onclick = 'CRPerson ()'>Влез</button></h3><br><br>";
	} catch (PDOException $e) {
		echo "Connection error: " . $e->getMessage();
		}
?>
	<h3><?php echo htmlspecialchars('Моля, попълни следните полета!'); ?></h3>
	<form id = "NPSSmainForm" action='<?php echo $_SERVER['PHP_SELF'] ?>' target='_self' method='post' name='NPSSmainForm' accept-charset='utf-8' autocomplete="off">
	<input type='text' name='name' value='Вашето име' maxlength="100" onclick='hideX("0")' onfocus='showHint("YNe")' onmouseenter='showHint("YNe")' onmouseleave='hideHint("YNe")' required><label id='YNe'>Име</label>
	<input type='text' name='years' pattern="[1-9]{1}[0-9]{1}|[0-9]{1}" value='Вашата възраст' maxlength="3" onclick='hideX("1")' onfocus='showHint("YY")' onmouseenter='showHint("YY")' onmouseleave='hideHint("YY")' required><label id='YY'>Възраст</label>
	<input type='text' name='address' value = 'Вашия адрес' onclick='hideX("2")' onfocus='showHint("YA")' onmouseenter='showHint("YA")' onmouseleave='hideHint("YA")'><label id='YA'>Адрес</label>
	<input type='text' name='phoneNumber' pattern = "/^[0-9]()+\- ]+$/" value = 'Вашия телефонен номер' maxlength="14" onclick='hideX("3")' onfocus='showHint("YPN")' onmouseenter='showHint("YPN")' onmouseleave='hideHint("YPN")'><label id='YPN'>Телефонен номер</label>
	<input type='text' name='email' pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" value = 'Вашия ел. поща' maxlength="200" onclick='hideX("4")' onfocus='showHint("YE")' onmouseenter='showHint("YE")' onmouseleave='hideHint("YE")' required><label id='YE'>Ел. поща</label>
	<input type='text' name='wish_for' value='Вашето желание' maxlength="500" onclick='hideX("5")' onfocus='showHint("YW")' onmouseenter='showHint("YW")' onmouseleave='hideHint("YW")'><label id='YW'>Желание</label><br>	
	<button id = "RegSecretSanta" type='submit' name='RegSecretSanta' value='RegSecretSanta'><?php echo htmlspecialchars('Регистрирай таен Дядо Коледа')?></button><br><br>
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
				echo "<div id = 'Wellcomes'><p class='Comes'> Здравейте! Вече има запис с този е email. Прехвърляме Ви към Входа!</p>";
				echo "<script> setInterval(CRPerson,6000); </script>";
			} else if($stmt_123->rowCount() > 1) {  // повече от 1 - има грешка - невъзможен отговор
				echo "<div id = 'Wellcomes'><p class='Comes'>Има грешка!</p>";
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
            echo "<div id = 'Wellcomes'><p class='Comes'>Вашeто име е " . $newname . " и вашата парола е " . $newpass . "</p>";
			
            $sql_2 = "INSERT INTO persons(ID,Name,Years,Address,Phone_Number,Email,Wish_for) VALUES (:newID, :name, :years, :address, :phoneNumber, :email, :wish_for) LIMIT 1";    //добавяме това, трябва да е един път
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
                echo "<br><p class='Comes2'>Добре дошъл!</p></div>";
    
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
					$RegMessageSubject  = "Привет от Secret Santa!";
					$RegMessageTxt = 'Добре дошъл в Secret Santa! Вие успешно се регистрирахте в сайта ни.' .'\n'. 
					'Вашият псевдоним е: ' . $newname . '.'.'\n'. 'Вашата парола е: '. $newpass . '.'.'\n'.
					'В случай, че имате въпроси, може да се свържете чрез този имейл или да изпратите съобщение посредством бутона "Контакт" на сайта.'.'\n'.
					'С Уважение,'.'\n'.'Екипа на'.'\n'.'www.winterfairyinthemist.com'; 
					$RegMessageHeaders = "From: abigail@winterfairyinthemist.com" . "\r\n" ."CC: " . $RegMessageTo;
					mail($RegMessageTo,$RegMessageSubject,$RegMessageTxt,$RegMessageHeaders);
					$MessageTo = "makedonskaliliya@gmail.com";
					$MessageSubject  = "New person!"; 
					$MessageTxt = "Има нов регистриран в базата данни на Secret Santa."; 
					$MessageHeaders = "From: abigail@winterfairyinthemist.com" . "\r\n" ."CC: makedonskaliliya@gmail.com";
					mail($MessageTo,$MessageSubject,$MessageTxt,$MessageHeaders);
					} 
					echo "<script>setInterval(RPerson, 6000);</script>";
						$conn->commit();
            } else {
                    echo "Error updating record: " . print_r($stmt_3->errorInfo(), true);
                    $conn->rollBack();
                    }      
        } else {
            echo htmlspecialchars("Няма такъв запис. Моля, запишете Прякор и Парола за влизане.");
            echo "<form action='NPSecretSanta.php' target='_self' method='post' name='NPSSRegSecretSantaFairiesForm' accept-charset='utf-8'>
                    <input type='text' name='Fairies_name' value='Your NickName' onclick='hideX('6')'><br><br>
					<input type='text' name='Fairies_pass' value='Your PassWord' onclick='hideX('7')'><br><br>
                    <button type='submit' name='RegSecretSantaFairies' value='RegSecretSantaFairies'>Потвърди</button><br>
				</form><br>";
                        
            if(isset($_POST["RegSecretSantaFairies"])){
                $_SESSION["Fairies_name"] = $_POST["Fairies_name"];
                $_SESSION["Fairies_pass"] = $_POST["Fairies_pass"];
                $Fairies_name = $_POST["Fairies_name"];
                $Fairies_pass = $_POST["Fairies_pass"];
                            
                $sql_4 = "INSERT INTO fairies2 (pass, pass2, pass3, pass4) VALUES (:Fairies_name, :Fairies_pass, 'no', 'CMade') LIMIT 1";  //
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
                    echo "<div id = 'Wellcomes'><p class='Comes'>Вашeто име е " . $newname . " и вашата парола е " . $newpass . "</p>";
                        
                    $sql_6 = "INSERT INTO persons (ID, Name, Years, Address, Phone_Number, Email, Wish_for) VALUES (:newID, :name, :years, :address, :phoneNumber, :email, :wish_for) LIMIT 1"; //
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
                        echo "<br><p class='Comes2'>Добре дошъл, Secret Santa!!!</p></div>";
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
						echo "<script>setInterval(RPerson,6000);</script>";
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
        echo "<div><p class='Comes2'>Вашето съобщение е изпратено!</p></div>";
    } catch (PDOException $e) {
        echo "" . $e->getMessage();
		}
} else {
    echo "";
    }	
?>
<div class = "footer">
	<button id = "AdminInfoButton" type="submit" name="AdminInfo" value="AdminInfo" formtarget = "_self" formmethod  = "post" onclick="showAdminInfo()">Инфо</button>
	<button id = "AdminConnButton" type="submit" name="AdminConnection" value="AdminConnection" formtarget = "_self" formmethod  = "post" onclick="showContactForm()">Контакт</button>
	<!--<div id = "Flag" onmouseenter = "showFlag ()" onmouseleave = "hideFlag ()">-->
	<div id = "Flag">
	<img id = "FlagEn" src="Enlan.png" alt="flag" width= "32px" height= "24px" onclick="FlagClick1()">
	<img id = "FlagBg" src="flagbgs.png" alt="flag" width= "20px" height= "20px" onclick="FlagClick2()">
	</div>
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
</body>
</html>	