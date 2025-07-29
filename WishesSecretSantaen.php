<?php 
	session_start();
    $host = "localhost";
    $dbname = "christmas_party";
    $username = "Summer_Haze";
    $password = "TestSummerHaze";
	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$secret_santa = $_SESSION['SSName'];
		$secret_santa_pass = $_SESSION['SSPassword'];
	} catch (PDOException $e) {
		echo "Connection error: " . $e->getMessage();
		}		
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script type="text/javascript" src="<?php echo 'WishesSecretSanta.js'; ?>"></script>
	<link rel="stylesheet" href="<?php echo 'baseAndDiv.css'; ?>">
	<link rel="stylesheet" href="<?php echo 'menu1_.css'; ?>">
	<link rel="stylesheet" href="<?php echo 'paragrafi.css'; ?>">
	<link rel="stylesheet" href="<?php echo 'tables.css'; ?>">
	<link rel="stylesheet" href="<?php echo 'forms.css'; ?>">
	<link rel="stylesheet" href="<?php echo 'buttons.css'; ?>">
	<link rel="stylesheet" href="<?php echo 'other.css'; ?>">
	<link rel="stylesheet" href="<?php echo 'invitation2.css'; ?>">
	<link rel="stylesheet" href="<?php echo 'footer2.css'; ?>">
	<script>
function RowChoice(x) {
	let y = 0;
	let z = 0;
	for (y, len = document.getElementsByTagName("tr").length; y < len; y++) {
			document.getElementsByTagName("tr")[y].style.border="0px solid #DBE5FF";
	}
	y = x.rowIndex;
	z = y;
	document.getElementsByTagName("tr")[y].style.border="3px solid #DBE5FF";
	document.getElementById("WishesChoiceB").style.display="block";
	document.getElementById("WishesComputerChoice").style.display="block";
	document.getElementById("WishesChoiceHidden").value = z;
}
	</script>
	<title><?php echo htmlspecialchars('Secret Santa Wishes')?></title>
</head>
<body onload = "showOpenMenuIcon()">
<a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" hreflang="bg" type="text/html" name = "Pozdrav" target="_self"><?php echo '<p class = "nightGhost">Hello,' . ' ' . $_SESSION['SSName'] . '!</p>';?></a>
<span id = "OpenMenu" class="nightBlue" onclick="openMenu()"><?php echo htmlspecialchars('Menu');?></span>
<div id="menu">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" target="_self" method="post" name="WSSmainForm" accept-charset="utf-8">
		<ul id="BB2" class = "BB2"> 
			<li><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" hreflang="bg" type="text/html" target="_self">
				<button type="submit" id = "YourSecretSanta" class="nightBlue" name="YourSecretSanta" value="YourSecretSanta"><?php echo htmlspecialchars('Do I have Secret Santa?');?></button>
			</a></li>
			<li id="CC1" onclick = "MenuShow2()">
			<a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" hreflang="bg" type="text/html" target="_self">
				<button type="submit" id = "ShowWishes" class="nightBlue" name="ShowWishes" value="ShowWishes" onclick="RestoreMenu('CC')" onmouseover = "FixMenu('CC')" onmouseleave = "RestoreMenu('CC')"><?php echo htmlspecialchars('Show Wishes');?></button>	
			</a>
			<ul id="CC" onmouseover = "FixMenu('CC')" onmouseleave = "RestoreMenu('CC')" onclick="RestoreMenu('CC')">
				<li><a rel="nofollow" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  hreflang="bg" type="text/html" target="_self">
					<button class="nightBlue" type="submit" name="WriteWish" value="WriteWish"><?php echo htmlspecialchars('Write wish');?></button>
					</a></li>
				<li><a rel="nofollow" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  hreflang="bg" type="text/html" target="_self">
					<button class="nightBlue" type="submit" name="ChangeWish" value="ChangeWish"><?php echo htmlspecialchars('Change wish');?></button>
					</a></li>
				<li><a rel="nofollow" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  hreflang="bg" type="text/html" target="_self">
					<button class="nightBlue" type="submit" name="ChangeAddress" value="ChangeAddress"><?php echo htmlspecialchars('Change address');?></button>
				</a></li>
			</ul>
			</li> 
			<li><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" hreflang="bg" type="text/html" target="_self">
				<button type="submit" id = "BSendInvitationForSSW" class="nightBlue" name="BSendInvitationForSSW" value="BSendInvitationForSSW"><?php echo htmlspecialchars('Send invitation');?></button>
			</a></li>
				<li id="BB1" onclick = "MenuShow()">
				<a rel="nofollow" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" hreflang="bg" type="text/html" target="_self">
					<button type="submit" id = "ChangeData" class="nightBlue" name="ChangeData" value="ChangeData" onmouseover = "FixMenu('BB')" onmouseleave = "RestoreMenu('BB')" onclick="RestoreMenu('BB')"><?php echo htmlspecialchars('Change data');?></button>
				</a>	
					<ul id="BB" onmouseover = "FixMenu('BB')" onmouseleave = "RestoreMenu('BB')" onclick="RestoreMenu('BB')">
						<li><a rel="nofollow" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  hreflang="bg" type="text/html" target="_self">
							<button type="submit" class="nightBlue" name="ChangeNickname" value="ChangeNickname"><?php echo htmlspecialchars('Change name');?></button>
						</a></li>
						<li><a rel="nofollow" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  hreflang="bg" type="text/html" target="_self">
							<button type="submit" class="nightBlue" name="ChangePassword" value="ChangePassword"><?php echo htmlspecialchars('Change password');?></button>
						</a></li>
						<li><a rel="nofollow" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  hreflang="bg" type="text/html" target="_self">
							<button type="submit" class="nightBlue" name="ChangeNameAndPass" value="ChangeNameAndPass"><?php echo htmlspecialchars('Change name and password');?></button>
						</a></li>
						<li><a rel="nofollow" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  hreflang="bg" type="text/html" target="_self">
							<button type="submit" class="nightBlue" name="DelPersonData" value="DelPersonData"><?php echo htmlspecialchars('Delete data');?></button>
						</a></li>
					</ul> 
			</li>
			<li><a href="second2.php" hreflang="bg" type="text/html" target="_self">
				<button type="submit" id = "ExitSait" class="nightBlue" name="ExitSait" value="ExitSait"><?php echo htmlspecialchars('Exit');?></button>
			</a></li> 
		</ul>		 
	</form>
</div>	
<div class = "main">
<?php 
	$secret_santa = $_SESSION['SSName'];
	$secret_santa_pass = $_SESSION['SSPassword'];
	
function showDateWishTaken (){ 
try {
	$host = "localhost";
    $dbname = "christmas_party";
    $username = "Summer_Haze";
    $password = "TestSummerHaze";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $secret_santa = $_SESSION['SSName'];
    $sql_4 = "SELECT date_taken FROM persons WHERE Secret_Santa = :secret_santa";
    $stmt4 = $conn->prepare($sql_4);
    $stmt4->bindParam(':secret_santa', $secret_santa);
    $stmt4->execute();
    $row = $stmt4->fetch(PDO::FETCH_ASSOC);
    $DateOfWish = $row['date_taken'];
    $str1 = substr($DateOfWish, 0, 10);
    $str2 = substr($DateOfWish, 3, 10);
    $str3 = substr($DateOfWish, 0, 5);
    $str4 = substr($str1, 0, 2); 
    $str5 = substr($str3, 3, 5);  
    $str6 = substr($str2, 3, 5); 
    $str7 = substr($DateOfWish, 10, 19);
    $str8 = substr($str7, 0, 7);
    $sql_5 = "SELECT WSS_Address FROM persons WHERE Secret_Santa = :secret_santa";
    $stmt5 = $conn->prepare($sql_5);
    $stmt5->bindParam(':secret_santa', $secret_santa);
    $stmt5->execute();
    $row2 = $stmt5->fetch(PDO::FETCH_ASSOC);
    $WSSAddress = $row2['WSS_Address'];
    echo "<button id='WSSDataOfChoice' class='nightBlue' type='submit' name='WSSDataOfChoice' value='WishesChoice' onclick='ShowDataOfChoice()'>Date</button><br>
    <button id='WSSAddressOfShipping' class='nightBlue' type='submit' name='WSSAddressOfShipping' value='WishesChoice' onclick='ShowAddressOfShipping()'>Address</button><br>";
    echo '<p class="nightBluePr fromChoiceForm1">You have chosen this wish on ' . $str4 . '.' . $str5 . '.' . $str6 . 'в ' . $str8 . '</p><br>';
    if ($WSSAddress == NULL || $WSSAddress == " ") {
        echo '<p class="nightBluePr fromChoiceForm2">No address has been entered yet to send the gift to.</p></div>';
    } else {
        echo '<p class="nightBluePr fromChoiceForm2">The address to which the gift should be sent is: <br>' .  $WSSAddress . '.' . '</p><br><!--<p class="nightBluePr fromChoiceForm2">Deadline for wish fulfillment is 25.12.2023 г. </p>--></div>';
		}
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
	}
}

function showDateAddressWishTaken (){
try {
	$dbname = "christmas_party";
    $username = "Summer_Haze";
    $password = "TestSummerHaze";
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $secret_santa = $_SESSION['SSName'];
    $sql_6 = "SELECT date_taken FROM persons WHERE Secret_Santa = :secret_santa";
    $stmt6 = $conn->prepare($sql_6);
    $stmt6->bindParam(':secret_santa', $secret_santa);
    $stmt6->execute();
    $row = $stmt6->fetch(PDO::FETCH_ASSOC);
    $DateOfWish = $row['date_taken'];
    $str7 = substr($DateOfWish, 10, 19);
    $str8 = substr($str7, 0, 7);
    $sql_7 = "SELECT WSS_Address FROM persons WHERE Secret_Santa = :secret_santa";
    $stmt7 = $conn->prepare($sql_7);
    $stmt7->bindParam(':secret_santa', $secret_santa);
    $stmt7->execute();
    $row2 = $stmt7->fetch(PDO::FETCH_ASSOC);
    $WSSAddress = $row2['WSS_Address'];
    echo "<button id='WSSDataOfChoice' class='nightBlue' type='submit' name='WSSDataOfChoice' value='WishesChoice' onclick='ShowDataOfChoice()'>Time</button><br>
        <button id='WSSAddressOfShipping' class='nightBlue' type='submit' name='WSSAddressOfShipping' value='WishesChoice' onclick='ShowAddressOfShipping()'>Address</button><br>";
    echo '<p class="nightBluePr">You have chosen this wish at ' . $str8 . ' ч.'. '</p><br>';
    if ($WSSAddress == NULL || $WSSAddress == " ") {
        echo '<p class="nightBluePr">No address has been entered yet to send the gift to.</p></div>';
    } else {
        echo '<p class="nightBluePr fromChoiceForm2">The address to which the gift should be sent is: <br>' .  $WSSAddress . '.' . '</p></div>';
		}
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
	}
}
	
try {
    $sql_8 = "SELECT ID FROM fairies2 WHERE pass = :secret_santa AND pass2 = :secret_santa_pass AND pass3 = 'yes'";
    $stmt8 = $conn->prepare($sql_8);
    $stmt8->bindParam(':secret_santa', $secret_santa);
    $stmt8->bindParam(':secret_santa_pass', $secret_santa_pass);
    $stmt8->execute();
    if ($stmt8->rowCount() > 0) {
        $row = $stmt8->fetch(PDO::FETCH_ASSOC);
        $ID = $row['ID'];
    } else {
        echo '';
		}
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
	}
	
try {
    $sql_9 = "SELECT MAX(ID) AS LastID FROM persons";
    $stmt9 = $conn->prepare($sql_9);
    $stmt9->execute();
    if ($stmt9->rowCount() > 0) {
        $row = $stmt9->fetch(PDO::FETCH_ASSOC);
        $LastID = $row['LastID'];
    } else {
        echo '';
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
	}
	
try {
	$sql_10 = "UPDATE persons SET Wish_for = '' WHERE Wish_for = 'Your wish'";
	$sql_11 = "UPDATE persons SET Address = '' WHERE Address = 'Your address'";
	$sql_12 = "UPDATE persons SET Phone_Number = '' WHERE Phone_Number = '0'";
	$stmt_10 = $conn->prepare($sql_10);
	$stmt_11 = $conn->prepare($sql_11);
	$stmt_12 = $conn->prepare($sql_12);
    $stmt_10->execute();
	$stmt_11->execute();
	$stmt_12->execute();
	if ($stmt_10 && $stmt_11 && $stmt_12) {
		echo '';
	}	
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
	}

if (isset($_POST['YourSecretSanta'])) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql_13 = "SELECT ID, Secret_Santa FROM persons WHERE ID = :ID AND NOT (Secret_Santa IS NULL OR Secret_Santa = '')";
        $stmt13 = $conn->prepare($sql_13);
        $stmt13->bindParam(':ID', $ID, PDO::PARAM_INT);
        $stmt13->execute();
        if ($stmt13->rowCount() > 0) {
            echo "<div class='divShowData' name='divYourSecretSanta'><br>" . "<p class = 'WhiteSnow'>You have Secret Santa!</p>";
            $sql_14 = "SELECT WSS_Address FROM persons WHERE ID = :ID AND NOT (WSS_Address IS NULL OR WSS_Address = '')";
            $stmt14 = $conn->prepare($sql_14);
            $stmt14->bindParam(':ID', $ID, PDO::PARAM_INT);
            $stmt14->execute();
            if ($stmt14->rowCount() > 0) {
                while ($row = $stmt14->fetch(PDO::FETCH_ASSOC)) {
                    $WSSAddress = $row['WSS_Address'];
                    echo "<p id='AddressF' class = 'nightBluePr'>The address you specified for shipping is: <br><br>" . $WSSAddress . " " . "</p></div>";
                }          
            } else {
                echo "<form action='WishesSecretSanta.php' target='_self' method='post' name='WSSAddressForm' accept-charset='utf-8'>
                        <p id='AddressW' class = 'nightBluePr'>Write down the address to which your gift will be delivered.</p>
                        <input id='WSSAddress' type='text' name='WSSAddress' value=' '><br>
                        <button id='WSSAddressComfurm' class = 'nightBlue' type='submit' name='WSSAddressComfurm'>Send</button><br>
                        </form><br></div>";
				}

        } else {
            echo "<div class='divShowData' name='divYourSecretSanta'><br><p class = 'WhiteSnow'>You don't have a Secret Santa!</p></div>";
			}
		$sql_80 = "SELECT Wish_for FROM persons WHERE ID = :ID AND NOT (Wish_for IS NULL OR Wish_for = '')";
        $stmt80 = $conn->prepare($sql_80);
        $stmt80->bindParam(':ID', $ID, PDO::PARAM_INT);
        $stmt80->execute();
        if ($stmt80->rowCount() > 0) {
			echo "";
		} else {
			echo "<br><p id = 'Ay' class = 'WhiteSnow'>You have no recorded wish!</p>";
			}
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

if (isset($_POST['WSSAddressComfurm'])) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $_SESSION['WSSAddress'] = $_POST['WSSAddress'];
        $WSSAddress = $_POST['WSSAddress'];
        $sql_15 = "UPDATE persons SET WSS_Address = :WSSAddress WHERE ID = :ID";
        $stmt15 = $conn->prepare($sql_15);
        $stmt15->bindParam(':WSSAddress', $WSSAddress, PDO::PARAM_STR);
        $stmt15->bindParam(':ID', $ID, PDO::PARAM_INT);
        $stmt15->execute(); 
        if ($stmt15->rowCount() > 0) {
            echo "<div class='divShowData' name='divYourSecretSanta2'><p class='nightBluePr'>The shipping address has been recorded.</p></div>";
        } else {
            echo "<div class='divShowData' name='divYourSecretSanta2'><p class='nightBluePr'>Sorry, we'll get back to you later.</p></div>"; 
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
		}
}

if (isset($_POST['ShowWishes'])) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql_16 = "SELECT ID, Wish_for FROM persons WHERE Secret_Santa = :secret_santa";
        $stmt16 = $conn->prepare($sql_16);
        $stmt16->bindParam(':secret_santa', $secret_santa, PDO::PARAM_STR);
        $stmt16->execute();
        if ($stmt16->rowCount() > 0) {
            echo "<div class='divShowData' name='divWSSChoiceForm'><p class='nightBluePr'>You have chosen to fulfill wish:</p>  
                    <table><tr>
                        <th>Number</th>
                        <th>Wish</th>
                    </tr>";
            while ($row = $stmt16->fetch(PDO::FETCH_ASSOC)) {
                $PSWish = $row['ID'];
                echo "<tr onclick='YourChoice(this)'>
                        <td>" . $row['ID'] . "</td>
                        <td>" . $row['Wish_for'] . "</td>
                    </tr></table>";
            }
            echo "<form id='WSSChoiceForm' action='WishesSecretSanta.php' target='_self' method='post' name='WSSChoiceForm' accept-charset='utf-8'>
                    <button type='submit' id='WishesChoiceSRW' class='nightBlue'  name='WishesChoiceSRW' value='WishesChoice' onclick='Click ()'>Remaining wishes</button><br>
                    <button type='submit' id='WishesChoiceSSSW' class='nightBlue'  name='WishesChoiceSSSW' value='WishesChoice' onclick='Click ()'>Wishes with Secret Santa</button><br>
                </form><br>";  showDateWishTaken (); 
        } else {
			$sql_17 ="CREATE TABLE IF NOT EXISTS ChoosingWishes AS SELECT ID, Name, Wish_for, date_taken, Secret_Santa FROM persons WHERE NOT ID ='$ID' AND NOT Wish_for = '' AND (Secret_Santa IS NULL OR Secret_Santa ='')";
			$sql_18 ="ALTER TABLE ChoosingWishes ADD COLUMN IF NOT EXISTS NumberSelect int(11)";   
			$sql_19 ="SELECT COUNT(ID) FROM ChoosingWishes";  
			$sql_20 ="SELECT ID,Wish_for FROM ChoosingWishes";  
			$stmt17 = $conn->prepare($sql_17);
			$stmt17->execute();
			$stmt18 = $conn->prepare($sql_18);
			$stmt18->execute();
			$stmt19 = $conn->prepare($sql_19);
			$stmt19->execute();
			$stmt20 = $conn->prepare($sql_20);
			$stmt20->execute();
			if ($stmt19->rowCount() > 0) {
				while ($row = $stmt19->fetch(PDO::FETCH_ASSOC)) {
					$mxn = $row['COUNT(ID)'];
					for ($xn = 1; $xn <= $mxn; $xn++) {
						$sql_21 = "UPDATE ChoosingWishes SET NumberSelect='$xn' WHERE NumberSelect IS NULL LIMIT 1";
						$stmt21 = $conn->prepare($sql_21);
						$stmt21->execute();
					}
				}
			} else {
				echo "<p class='nightGhost'>There is currently no option to choose! </p></div>";
				} 
			if ($stmt20->rowCount() > 0) {
				echo "<div class = 'divShowData' name='divWSSChoiceForm2'><p class='nightGhost'>You have not selected a wish to fulfill.<br> You can choose a wish or give the power to the computer to choose.</p>";
				echo "<table><tr>
						<th>№</th>
						<th>Wish</th>
					</tr>";
				while ($row = $stmt20->fetch(PDO::FETCH_ASSOC)) {
					echo "<tr onclick='RowChoice(this)'>
							<td>" . $row['ID'] . "</td>
							<td>" . $row['Wish_for'] . "</td>
						</tr>";
				}
				echo "</table><form action='WishesSecretSanta.php' target='_self' method='post' name='WSSChoiceForm2' accept-charset='utf-8'>
						<button id='WishesComputerChoice' class='nightBlue' type='submit' name='WishesComputerChoice' value='WishesChoice' onclick='Click()'>Computer</button><br>
						<button id='WishesChoiceB' class='nightBlue' type='submit' name='WishesChoiceB' value='WishesChoice' onclick='Click()'>Confirm selection</button><br>    
						<input id='WishesChoiceHidden' type='text' name='WishesChoiceHidden' value='0'><br>
						</form></div><br>";
			} else {
				echo "<p class='nightGhost'>There is currently no option to choose. </p></div>";
				}
		}		
		
		} catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
			}
	} else {
		if(isset($_SESSION['SSName'])){
		echo '';
		$DateOfchoice = date("d/m/Y");
		if(idate("i")>=0 & idate("i")<10){
			$Time = $DateOfchoice ."  ". idate("H")+1 . ":0" .idate("i"). ":".idate("s");
		} else {
			$Time = $DateOfchoice ."  ". idate("H")+1 . ":" .idate("i"). ":".idate("s");
			}
		if(idate("s")>=0 & idate("s")<10){
			$Time = $DateOfchoice ."  ". idate("H")+1 . ":" .idate("i"). ":0".idate("s");
		} else {
			$Time = $DateOfchoice ."  ". idate("H")+1 . ":" .idate("i"). ":".idate("s");
			}
			$_SESSION['Time'] = $Time;
		}
	}
		 		
if (isset($_POST['WishesChoiceSRW'])) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql_23 = "SELECT ID, Wish_for FROM persons WHERE NOT ID ='$ID' AND NOT Wish_for = '' AND (Secret_Santa IS NULL OR Secret_Santa ='')";
        $stmt23 = $conn->query($sql_23);
        if ($stmt23->rowCount() > 0) {
            echo "<div class = 'divTablesInfinitive' name='divWSSRemainingWishesForm'><p class='nightBluePr'>Remaining wishes</p>
                    <table><tr>
                        <th>№</th>
                        <th>Wishes</th>
                    </tr>";
            while ($row = $stmt23->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr onclick='RowChoice(this)'>
                        <td>" . $row['ID'] . "</td>
                        <td>" . $row['Wish_for'] . "</td>
                    </tr>";
            }
            echo "</table><form action='WishesSecretSanta.php' target='_self' method='post' name='WSSRemainingWishesForm' accept-charset='utf-8'>
                <button type='submit' id='WishesChoiceShowPSW' class='nightBlue' name='WishesChoiceShowPSW' value='WishesChoice' onclick='Click ()'>Selected wish</button><br> 
                <button  type='submit' id='WishesChoiceSSSW' class='nightBlue' name='WishesChoiceSSSW' value='WishesChoice' onclick='Click ()'>Wishes with Secret Santa</button><br>
                </form></div><br>";
        } else {
            echo "<div class = 'divTablesInfinitive' name='divWSSRemainingWishesForm'><p class = 'nightGhost ZeroZapisa'>There are 0 records.</p>";
			}
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
		}
} 
		 
if (isset($_POST['WishesChoiceSSSW'])) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql_24 = "SELECT ID, Wish_for, Secret_Santa FROM persons WHERE NOT Secret_Santa =' '";
        $stmt24 = $conn->query($sql_24);
        if ($stmt24->rowCount() > 0) {
            echo "<div class = 'divTablesInfinitive' name='divWSSSecretSantaWishesForm'><p class='nightBluePr'>Wishes with Secret Santa</p>
                    <table><tr>
                    <th>№</th>
                    <th>Wishes</th>
                    <th>Secret Santa</th>
                </tr>";
            while ($row = $stmt24->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr onclick='RowChoice(this)'>
                        <td>" . $row['ID'] . "</td>
                        <td>" . $row['Wish_for'] . "</td>
                        <td>" . $row['Secret_Santa'] . "</td>
                    </tr>";
            }
            echo "</table><form action='WishesSecretSanta.php' target='_self' method='post' name='WSSSecretSantaWishesForm' accept-charset='utf-8'>
                <button id='WishesChoiceShowPSW' class='nightBlue' type='submit' name='WishesChoiceShowPSW' value='WishesChoice' onclick='Click ()'>Selected wish</button><br>
                <button id='WishesChoiceSRW' class='nightBlue' type='submit' name='WishesChoiceSRW' value='WishesChoice' onclick='Click ()'>Remaining wishes</button<br>    
                </form></div><br>";
        } else {
            echo htmlspecialchars('There are 0 records.');
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
		}
} 
	 
if (isset($_POST['WishesChoiceShowPSW'])) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql_25 = "SELECT ID, Wish_for, date_taken FROM persons WHERE Secret_Santa ='$secret_santa'";
        $stmt25 = $conn->query($sql_25);
        if ($stmt25->rowCount() > 0) {
            while ($row = $stmt25->fetch(PDO::FETCH_ASSOC)) {
                $PSWish2 = $row['ID'];
                echo "<div class='divTablesData' name='divWSSSelectedWishesForm'><p class='nightBluePr'>Selected wish</p>
                    <table><tr>
                        <th>№</th>
                        <th>Wishes</th>
                        <th>Date</th>
                    </tr>";
                $DateOfWish = $row['date_taken'];
                $str1 = substr($DateOfWish, 0, 10);
                $str2 = substr($DateOfWish, 3, 10);
                $str3 = substr($DateOfWish, 0, 5);
                $str4 = substr($str1, 0, 2); //17
                $str5 = substr($str3, 3, 5);  // 07
                $str6 = substr($str2, 3, 5); //2023
                $str10 = $str4 . '.' . $str5 . '.' . $str6;
                $str7 = substr($DateOfWish, 10, 19);
                $str8 = substr($str7, 0, 7);
                echo "<tr onclick='YourChoice(this)'>
                        <td width='280px' height='280px'>" . $row['ID'] . "</td>
                        <td width='280px' height='280px'>" . $row['Wish_for'] . "</td>
                        <td id='CTI' width='280px' height='280px'>" . $str10 . "</td>
                        <span id='imgshow'>в" . $str8 . "</span></tr></table>";
            }
            echo "<form action='WishesSecretSanta.php' target='_self' method='post' name='WSSSelectedWishesForm' accept-charset='utf-8'>
                <button id='WishesChoiceSRW' class='nightBlue' type='submit' name='WishesChoiceSRW' value='WishesChoice' onclick='Click ()'>Remaining wishes</button<br>        
                <button id='WishesChoiceSSSW' class='nightBlue' type='submit' name='WishesChoiceSSSW' value='WishesChoice' onclick='Click ()'>Wishes with Secret Santa</button><br>
                </form></div><br>";  	
        } else {
            echo htmlspecialchars('There are no records in the table.');
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
		}
} 

if (isset($_POST['WishesChoiceHidden'])) {
    $rowID = trim($_POST['WishesChoiceHidden']);
}

if (isset($_POST['WishesChoiceB'])) {
    $rowID = trim($_POST['WishesChoiceHidden']);
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql_26 = "SELECT ID, Wish_for FROM ChoosingWishes WHERE NumberSelect='$rowID'";
        $stmt26 = $conn->query($sql_26);
        if ($stmt26->rowCount() > 0) {
            echo "<div class='divTablesData' name='divWSSConfirmSelectedWishes'><table><tr>
                    <th>№</th>
                    <th>Wishes</th>
                </tr>";
            while ($row = $stmt26->fetch(PDO::FETCH_ASSOC)) {
                $WishID = $row['ID'];
                echo "<tr onclick='RowChoice(this)'>
                        <td>" . $row['ID'] . "</td>
                        <td>" . $row['Wish_for'] . "</td>
                    </tr></table>";
                echo "<p class = 'nightGhost'>You have chosen " . $WishID . " " . "</p></div>";
            }
            $sql_27 = "UPDATE persons SET Secret_Santa ='$secret_santa' WHERE ID ='$WishID'";
            $conn->exec($sql_27);
            $sql_28 = "UPDATE persons SET date_taken ='$Time' WHERE ID ='$WishID'";
            $conn->exec($sql_28);
            $sql_29 = "DROP TABLE ChoosingWishes";
            $conn->exec($sql_29);
        } else {
            echo ' ';
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
		}
}
		
if (isset($_POST['WishesComputerChoice'])) {
	$sql_30 = "DROP TABLE IF EXISTS ChoosingWishes";
	$stmt30 = $conn->prepare($sql_30);
	$stmt30->execute();	
	$sql_31 = "CREATE TABLE ChoosingWishes AS SELECT ID, Name, Wish_for, date_taken, Secret_Santa FROM persons WHERE NOT ID ='$ID' AND NOT Wish_for = '' AND (Secret_Santa IS NULL OR Secret_Santa ='')";
	$stmt31 = $conn->prepare($sql_31); 
	$stmt31->execute();
	$sql_32 = "ALTER TABLE ChoosingWishes ADD FOREIGN KEY (ID) REFERENCES persons(ID)";
	$stmt32 = $conn->prepare($sql_32);
	$stmt32->execute();
	$sql_33 = "ALTER TABLE ChoosingWishes ADD COLUMN NumberSelect int(11)";
	$stmt33 = $conn->prepare($sql_33);
	$stmt33->execute();
	$mxn = 0; 
	$sql_34 = "SELECT COUNT(ID) FROM ChoosingWishes";
	$stmt34 = $conn->prepare($sql_34);
	$stmt34->execute();
	if ($stmt34->rowCount() > 0) {
		while ($row = $stmt34->fetch(PDO::FETCH_ASSOC)) {
			$mxn = $row['COUNT(ID)'];
			for ($xn = 1; $xn <= $mxn; $xn++) {
				$sql_35 = "UPDATE ChoosingWishes SET NumberSelect='$xn' WHERE NumberSelect IS NULL LIMIT 1";
				$stmt35 = $conn->prepare($sql_35);
				$stmt35->execute();
			}
		}
	} else {
		echo '';
		}		
	$sql_36 = "SELECT ID, Wish_for FROM ChoosingWishes";
	$stmt36 = $conn->prepare($sql_36);
	$stmt36->execute();
	$min = 1;
	$max = $mxn;
	$numberRand = rand($min,$max); 
	$sql_37 = "SELECT ID,Wish_for FROM ChoosingWishes WHERE NumberSelect ='$numberRand'";
	$stmt37 = $conn->prepare($sql_37);
	$stmt37->execute();
	$result37 = $stmt37->fetch(PDO::FETCH_ASSOC);
	if ($stmt37->rowCount() > 0) {
		$_SESSION['numberRand'] = $numberRand;	
		$rowID = $_SESSION['numberRand'];    
		$sql_38 = "SELECT ID, Wish_for FROM ChoosingWishes WHERE NumberSelect = :rowID";
		$stmt38 = $conn->prepare($sql_38);
		$stmt38->bindParam(':rowID', $rowID, PDO::PARAM_INT); 
		$stmt38->execute();
		if ($stmt38->rowCount() > 0) {
			echo "<div class='divTablesData' name='divWSSConfirmForm'><table><tr>
					<th>№</th>
					<th>Wishes</th>
				</tr>";
			while ($row = $stmt38->fetch(PDO::FETCH_ASSOC)) {
				$WishID2 = $row['ID'];
				echo "<tr onclick='RowChoice(this)'>
						<td>" . $row['ID'] . "</td>
						<td>" . $row['Wish_for'] . "</td>
					</tr></table>";
				echo "<p class='nightGhost'>The computer chose for you № " . $WishID2 . "</p>";
			}
			$stmt38->execute(); 
			echo "<form action='WishesSecretSanta.php' target='_self' method='post' name='WSSConfirmForm' accept-charset='utf-8'>
                <button id='WishesChoiceB2' class='nightBlue' type='submit' name='WishesChoiceB2' value='WishesChoice'>Confirm selection</button><br>
				</form></div><br>";
		} else {
			echo '';
			}
	} else {
		echo '';
		} 
}
 
if (isset($_POST['WishesChoiceB2'])) {
    $rowID = $_SESSION['numberRand'];
    $stmt39 = $conn->query("SELECT ID, Wish_for FROM ChoosingWishes WHERE NumberSelect='$rowID'");
    if ($stmt39->rowCount() > 0) {
        echo "<div class='divTablesData' name='divWSSConfirmForm2'><table><tr>
                <th>№</th>
                <th>Wishes</th>
            </tr>";
        while ($row = $stmt39->fetch(PDO::FETCH_ASSOC)) {
            $WishID2 = $row['ID'];
            echo "<tr onclick='RowChoice(this)'>
                    <td>" . $row['ID'] . "</td>
                    <td>" . $row['Wish_for'] . "</td>
                </tr></table>";
            echo '<p class="nightGhost">You have chosen  № ' . $WishID2 . ' </p></div>';
        }
    } else {
        echo ' ';
		}
    $stmt40 = $conn->prepare("UPDATE persons SET Secret_Santa = :secret_santa WHERE ID = :WishID2");
    $stmt40->bindParam(':secret_santa', $secret_santa);
    $stmt40->bindParam(':WishID2', $WishID2);
    $stmt40->execute();
    $stmt41 = $conn->prepare("UPDATE persons SET date_taken = :Time WHERE ID = :WishID2");
    $stmt41->bindParam(':Time', $Time);
    $stmt41->bindParam(':WishID2', $WishID2);
    $stmt41->execute();
    $stmt42 = $conn->query("DROP TABLE ChoosingWishes");
}

if (isset($_POST['WriteWish'])) {
	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql_43 = "SELECT Wish_for FROM persons WHERE ID = :ID AND NOT (Wish_for IS NULL OR Wish_for = '')";
		$stmt43 = $conn->prepare($sql_43);
        $stmt43->bindParam(':ID', $ID, PDO::PARAM_INT);
        $stmt43->execute();
		if ($stmt43->rowCount() > 0) {
                while ($row = $stmt43->fetch(PDO::FETCH_ASSOC)) {
                    $WriteNewWish = $row['Wish_for'];
                    echo "<div class = 'divChangingData'><p class = 'nightBluePr'>You already have a recorded wish: <br><br>" . $WriteNewWish . " " . "</p></div>";
					echo "";
                }          
            } else {		
		echo "<div class = 'divChangingData' name='divWSSAddWishForm'><p class='nightGhost'>Write down your wish:</p>
				<form action='WishesSecretSanta.php' target='_self' method='post' name='WSSAddWishForm' accept-charset='utf-8'>
				<input type='text' name='WriteNewWish' value=''><br><br>
				<button class='nightBlue btnFine' type='submit' name='ChangeAddWishSP' value='ChangeAddWishSP'>Confirm</button>	
			</form></div>";
			}
	} catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
		}
}

if (isset($_POST['ChangeAddWishSP'])) {
	try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$_SESSION['WriteNewWish'] = $_POST['WriteNewWish'];
        $WriteNewWish = $_POST['WriteNewWish'];
        $sql_44 = "UPDATE persons SET Wish_for = :WriteNewWish WHERE ID = :ID";
        $stmt44 = $conn->prepare($sql_44);
        $stmt44->bindParam(':WriteNewWish', $WriteNewWish, PDO::PARAM_STR);
        $stmt44->bindParam(':ID', $ID, PDO::PARAM_INT);
        $stmt44->execute(); 
        if ($stmt44->rowCount() > 0) {
            echo "<p class = 'nightGhost Zapisi'>Your wish has been recorded!</p></div>";
        } else {
            echo "<p class='nightBluePr'>Sorry, we'll get back to you later.</p></div>";   
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
		}
}

if (isset($_POST['ChangeWish'])) {
		$sql_45 = "SELECT ID, Secret_Santa FROM persons WHERE ID = :ID AND NOT (Secret_Santa IS NULL OR Secret_Santa = '')";
        $stmt45 = $conn->prepare($sql_45);
        $stmt45->bindParam(':ID', $ID, PDO::PARAM_INT);
        $stmt45->execute();
		if ($stmt45->rowCount() > 0) {
			echo "<div class='divShowData' name='divWSSChangeWishForm'><br>" . "<p class = 'nightGhost Zapisi'>You can't change your wish!<br><br>You have Secret Santa.</p>";
		} else {
			echo "<div class = 'divChangingData' name='divWSSChangeWishForm'><p class='nightGhost'>Write down your new wish:</p>
				<form action='WishesSecretSanta.php' target='_self' method='post' name='WSSChangeWishForm' accept-charset='utf-8'>
				<input type='text' name='WriteWishChange' value=''><br><br>
				<button class='nightBlue btnFine' type='submit' name='ChangeWishP' value='ChangeWishP'>Confirm</button>	
			</form></div>";
			}
}

if (isset($_POST['ChangeWishP'])) {
	try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$_SESSION['WriteWishChange'] = $_POST['WriteWishChange'];
        $WriteWishChange = $_POST['WriteWishChange'];
        $sql_46 = "UPDATE persons SET Wish_for = :WriteWishChange WHERE ID = :ID";
        $stmt46 = $conn->prepare($sql_46);
        $stmt46->bindParam(':WriteWishChange', $WriteWishChange, PDO::PARAM_STR);
        $stmt46->bindParam(':ID', $ID, PDO::PARAM_INT);
        $stmt46->execute(); 
        if ($stmt46->rowCount() > 0) {
            echo "<p class = 'nightGhost Zapisi'>Your new wish has been recorded!</p></div>";
        } else {
            echo "<p class='nightBluePr'>Sorry, we'll get back to you later.</p></div>";  
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
		}
}

if (isset($_POST['ChangeAddress'])) {
    echo "<div class = 'divChangingData' name='divWSSChangeAdresForm'><p class='nightGhost'>Write down your new address:</p>
		<form action='WishesSecretSanta.php' target='_self' method='post' name='WSSChangeAdresForm' accept-charset='utf-8'>
            <input type='text' name='WriteAdresChange' value=''><br><br>
            <button class='nightBlue btnFine' type='submit' name='ChangeAdresP' value='ChangeAdresP'>Confirm</button>	
        </form></div>";
}

if (isset($_POST['ChangeAdresP'])) {
	try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$_SESSION['WriteAdresChange'] = $_POST['WriteAdresChange'];
        $WriteAdresChange = $_POST['WriteAdresChange'];
        $sql_47 = "UPDATE persons SET WSS_Address = :WriteAdresChange WHERE ID = :ID";
        $stmt47 = $conn->prepare($sql_47);
        $stmt47->bindParam(':WriteAdresChange', $WriteAdresChange, PDO::PARAM_STR);
        $stmt47->bindParam(':ID', $ID, PDO::PARAM_INT);
        $stmt47->execute(); 
        if ($stmt47->rowCount() > 0) {
            echo "<p class = 'nightGhost Zapisi'>Your new address has been recorded!</p></div>";
        } else {
            echo "<p class='nightBluePr'>Sorry, we'll get back to you later.</p></div>"; 
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
		}
}

if (isset($_POST['BSendInvitationForSSW'])) { 	
echo "<form id = 'SendForm1' action='WishesSecretSanta.php' name='SendForm1' target='_self' method='post' accept-charset='utf-8'>
	<fieldset id = 'SendForm1F' form = 'SendForm1' name='SSI1'><legend>Secret Santa Покана</legend>
	<label for = 'nameResieverID' form = 'SendForm1' class = 'SendForm1Labels' name='nameResieverlabel'>Name of recipient:
	<input id = 'nameResieverID' class = 'SendForm1Inputs' type='text' name='nameResiever'>	 
	<label for = 'mailResieverID' form = 'SendForm1' class = 'SendForm1Labels' name='mailResieverlabel'>E-mail of recipient:</label><br>
	<input id = 'mailResieverID' class = 'SendForm1Inputs' type='text' name='mailResiever'><br> 
	<label for = 'MesageInvitationForSSW' form = 'SendForm1' class = 'SendForm1Labels' name='MesageResieverlabel'>Message:</label><br>
	<input id =  'SendForm1Inputs1' class = 'SendForm1Inputs' type='radio' name='SendForm1Inputs1' value = '0'><label form = 'SendForm1' class = 'SendForm1Labels' name='mesage1Resieverlabel' for = 'SendForm1Inputs1'>You are invited to visit the Secret Santa Website</label><br>
	<input id =  'SendForm2Inputs2' class = 'SendForm1Inputs' type='radio' name='SendForm2Inputs2' value = '1'><label form = 'SendForm1' class = 'SendForm1Labels' name='mesage2Resieverlabel' for = 'SendForm2Inputs2'>You are invited to register on the Secret Santa Website</label><br>
	<textarea id = 'MesageInvitationForSSW' name='MesageInvitationForSSW' rows='8' cols='52' wrap='hard' maxlength='900' placeholder = 'Въведете съобщенето си...'></textarea></label>		
	<button  id = 'SeeInvitationForSSW' class='nightBlue' type='submit' name='SeeInvitationForSSW' onclick = 'ShowSendForm ()' value='SeeInvitationForSSW'>See invitation</button><br>
	<button  id = 'SendInvitationForSSW'  class='nightBlue' type='submit' name='SendInvitationForSSW' value='SendInvitationForSSW'>Send</button><br>
	<button  id = 'ResetInvitationForSSW'  class='nightBlue type='reset'' name='ResetInvitationForSSW' value='ResetInvitationForSSW' onclick = 'ResetInvitationField ()'>Reset</button><br>
</fieldset></form><br>";   
}

if (isset($_POST['SeeInvitationForSSW'])) {	
	if(isset($_POST['nameResiever'])){
		$_SESSION['nameResiever'] = $_POST['nameResiever'];
		$InvitationTo = $_POST['nameResiever'];	 
	} else {
		$InvitationTo = $_SESSION['nameResiever']; 
		} 
	if(isset($_POST['mailResiever'])){
		$_SESSION['mailResiever'] = $_POST['mailResiever'];
		$InvitationTomail = $_POST['mailResiever'];
	} else {
		$InvitationTomail = $_SESSION['mailResiever']; 
		} 
	if(isset($_POST['MesageInvitationForSSW'])){
		$_SESSION['MesageInvitationForSSW'] = $_POST['MesageInvitationForSSW'];
		$commenttxt = $_POST['MesageInvitationForSSW'];
	} else {
		$commenttxt = $_SESSION['MesageInvitationForSSW']; 
		} 
	if(isset($_POST['SendForm1Inputs1'])){
		$_SESSION['SendForm1Inputs1'] = $_POST['SendForm1Inputs1'];
		$InvitationSubject = $_POST['SendForm1Inputs1'];
		$InvitationSubject = "You are invited to visit the Secret Santa Website";
	} else if (isset($_POST['SendForm2Inputs2'])) {
		$_SESSION['SendForm2Inputs2'] = $_POST['SendForm2Inputs2'];
		$InvitationSubject = $_POST['SendForm2Inputs2'];
		$InvitationSubject = "You are invited to register on the Secret Santa Website";
	} else if (empty($_POST['SendForm1Inputs1']) && empty($_POST['SendForm2Inputs2'])) {
		$InvitationSubject = "You are invited to register on the Secret Santa Website";
		$_SESSION['InvSubject'] = $InvitationSubject;
	} else {
		$InvitationSubject = "You are invited to register on the Secret Santa Website";
		}
	echo "<form id = 'SendForm1' action='WishesSecretSanta.php' name='SendForm1' target='_self' method='post' accept-charset='utf-8'>
			<fieldset id = 'SendForm2F' form = 'SendForm1' name='SSI2'><legend>Secret Santa Invitation</legend>
				<p id = 'DoSend'>Здравей, <br>" . $InvitationTo . "</p><br>
				<p id = 'Do2Send'>" . $InvitationSubject . "</p><br>
				<p id = 'Do3Send'>" . $commenttxt . "</p><br>
				<p id = 'Do4Send'>We wish you bright holidays!</p><br>
				<button  id = 'SeeInvitationForSSW' class='nightBlue' type='submit' name='SeeInvitationForSSW' onclick = 'ShowSendForm ()' value='SeeInvitationForSSW'>See invitation</button><br>
				<button  id = 'SendInvitationForSSW'  class='nightBlue' type='submit' name='SendInvitationForSSW' value='SendInvitationForSSW'>Send</button><br>
				<button  id = 'ResetInvitationForSSW'  class='nightBlue type='reset'' name='ResetInvitationForSSW' value='ResetInvitationForSSW' onclick = 'ResetInvitationField ()'>Reset</button><br>
			</fieldset></form><br>";		
}

if (isset($_POST['SendInvitationForSSW'])) {
	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $InvitationTo = $_SESSION['nameResiever'] ;
        $InvitationTomail = $_SESSION['mailResiever'];
		$InvitationSubject = $_SESSION['InvSubject'];
        $commenttxt = $_SESSION['MesageInvitationForSSW']; 
		try {
		$sql_90 = "SELECT Email FROM persons WHERE ID = :ID";
		$stmt90 = $conn->prepare($sql_90);
		$stmt90->bindParam(':ID', $ID);
		$stmt90->execute();
		if ($stmt90->rowCount() > 0) {
			$row = $stmt90->fetch(PDO::FETCH_ASSOC);
			$InvitationFrom = $row['Email'];
    } else {
        echo "<p class='nightGhost'>An error occurred!</p>";
		}
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
	}			
		$InvitationHeaders = "From: " . $InvitationFrom . "\r\n" ."CC: " . $InvitationTomail;
		$InvitationTxt = $commenttxt;
		mail($InvitationTo,$InvitationSubject,$InvitationTxt,$InvitationHeaders);
		echo "<form id = 'SendForm1' action='WishesSecretSanta.php' name='SendForm1' target='_self' method='post' accept-charset='utf-8' enctype='text/plain'>
			<fieldset id = 'SendForm2F' form = 'SendForm1' name='SSI2'><legend>Secret Santa Invitation</legend>
				<p id = 'Do4Send'>The invitation has been sent!</p><br>
			</fieldset></form><br>";
		echo "<script> setInterval(RPerson2,3000); </script>";
} catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
 
if (isset($_POST['ResetInvitationForSSW'])) {
echo "<form id = 'SendForm1' action='WishesSecretSanta.php' name='SendForm1' target='_self' method='post' accept-charset='utf-8'>
	<fieldset id = 'SendForm1F' form = 'SendForm1' name='SSI1'><legend>Secret Santa Покана</legend>
	<label for = 'nameResieverID' form = 'SendForm1' class = 'SendForm1Labels' name='nameResieverlabel'>Name of recipient:
	<input id = 'nameResieverID' class = 'SendForm1Inputs' type='text' name='nameResiever'>	 
	<label for = 'mailResieverID' form = 'SendForm1' class = 'SendForm1Labels' name='mailResieverlabel'>E-mail of recipient:</label><br>
	<input id = 'mailResieverID' class = 'SendForm1Inputs' type='text' name='mailResiever'><br> 
	<label for = 'MesageInvitationForSSW' form = 'SendForm1' class = 'SendForm1Labels' name='MesageResieverlabel'>Message:</label><br>
	<input id =  'SendForm1Inputs1' class = 'SendForm1Inputs' type='radio' name='SendForm1Inputs1' value = '0'><label form = 'SendForm1' class = 'SendForm1Labels' name='mesage1Resieverlabel' for = 'SendForm1Inputs1'>You are invited to visit the Secret Santa Website</label><br>
	<input id =  'SendForm2Inputs2' class = 'SendForm1Inputs' type='radio' name='SendForm2Inputs2' value = '1'><label form = 'SendForm1' class = 'SendForm1Labels' name='mesage2Resieverlabel' for = 'SendForm2Inputs2'>You are invited to register on the Secret Santa Website</label><br>
	<textarea id = 'MesageInvitationForSSW' name='MesageInvitationForSSW' rows='8' cols='52' wrap='hard' maxlength='900' placeholder = 'Въведете съобщенето си...'></textarea></label>		
	<button  id = 'SeeInvitationForSSW' class='nightBlue' type='submit' name='SeeInvitationForSSW' onclick = 'ShowSendForm ()' value='SeeInvitationForSSW'>See invitation</button><br>
	<button  id = 'SendInvitationForSSW'  class='nightBlue' type='submit' name='SendInvitationForSSW' value='SendInvitationForSSW'>Send</button><br>
	<button  id = 'ResetInvitationForSSW'  class='nightBlue type='reset'' name='ResetInvitationForSSW' value='ResetInvitationForSSW' onclick = 'ResetInvitationField ()'>Reset</button><br>
</fieldset></form><br>"; 
} 

if (isset($_POST['ChangeNickname'])) {
    echo "<div class = 'divChangingData' name='divWSSChangeNicknameForm'><p class='nightGhost'>Write down your new name:</p>
			<form action='WishesSecretSanta.php' target='_self' method='post' name='WSSChangeNicknameForm' accept-charset='utf-8'>
            <input type='text' name='Newname' value=''><br><br>
            <button class='nightBlue btnFine' type='submit' name='ChangeNicknameP' value='ChangeNicknameP'>Confirm</button>	
        </form></div>";
}

if (isset($_POST['ChangeNicknameP'])) {
    $secret_santa = $_SESSION['SSName'];
    $secret_santa_pass = $_SESSION['SSPassword'];
    $Newname = $_POST["Newname"];
    $stmt48 = $conn->prepare("SELECT ID FROM fairies2 WHERE ID = :ID AND pass4 = 'AMade'");
    $stmt48->bindParam(':ID', $ID);
    $stmt48->execute();
    if ($stmt48->rowCount() > 0) {
        while ($row = $stmt48->fetch(PDO::FETCH_ASSOC)) {
            $stmt49 = $conn->prepare("INSERT INTO fairies2 (pass, pass2, pass3, pass4) VALUES (:secret_santa, :secret_santa_pass, 'no', 'AMade') LIMIT 1"); //
            $stmt49->bindParam(':secret_santa', $secret_santa);
            $stmt49->bindParam(':secret_santa_pass', $secret_santa_pass);
            $stmt49->execute();
            $stmt50 = $conn->prepare("UPDATE fairies2 SET pass = :Newname WHERE ID = :ID AND pass3 = 'yes'");
            $stmt50->bindParam(':Newname', $Newname);
            $stmt50->bindParam(':ID', $ID);
            $stmt50->execute();
            $stmt51 = $conn->prepare("UPDATE fairies2 SET pass4 = 'Null' WHERE ID = :ID AND pass3 = 'yes'");
            $stmt51->bindParam(':ID', $ID);
            $stmt51->execute();
            $stmt52 = $conn->prepare("UPDATE persons SET Secret_Santa = :Newname WHERE Secret_Santa = :secret_santa");
            $stmt52->bindParam(':Newname', $Newname);
            $stmt52->bindParam(':secret_santa', $secret_santa);
            $stmt52->execute();
            if ($stmt52) {
                $_SESSION['SSName'] = $Newname;
                echo "<p class = 'nightGhost Zapisi'>Your new name is </p></div>" . $Newname;
            } else {
                echo '';
				}
        }
    } else {
        $stmt53 = $conn->prepare("UPDATE fairies2 SET pass = :Newname WHERE ID = :ID AND pass3 = 'yes' AND pass4 = 'Null'");
        $stmt53->bindParam(':Newname', $Newname);
        $stmt53->bindParam(':ID', $ID);
        $stmt53->execute();
        $stmt54 = $conn->prepare("UPDATE persons SET Secret_Santa = :Newname WHERE Secret_Santa = :secret_santa");
        $stmt54->bindParam(':Newname', $Newname);
        $stmt54->bindParam(':secret_santa', $secret_santa);
        $stmt54->execute();
        if ($stmt54) {
            $_SESSION['SSName'] = $Newname;
            echo "<p class = 'nightGhost Zapisi'>Your new name is </p></div>" . $Newname;
        } else {
            echo '';
			}
	}
} 
		
if (isset($_POST['ChangePassword'])) {
    echo "<div class = 'divChangingData' name='divWSSChangePasswordForm'><p class='nightGhost'>Write down your new password:</p>
			<form action='WishesSecretSanta.php' target='_self' method='post' name='WSSChangePasswordForm' accept-charset='utf-8'>
            <input type='text' name='Newpass' value=''><br><br>
            <button class='nightBlue btnFine' type='submit' name='ChangePasswordP' value='ChangePasswordP'>Confirm</button>	
        </form></div>";
}

if (isset($_POST['ChangePasswordP'])) {
    $secret_santa = $_SESSION['SSName'];
    $secret_santa_pass = $_SESSION['SSPassword'];
    $Newpass = $_POST["Newpass"];
    $stmt55 = $conn->prepare("SELECT ID FROM fairies2 WHERE ID = :ID AND pass4 = 'AMade'");
    $stmt55->bindParam(':ID', $ID);
    $stmt55->execute();
    if ($stmt55->rowCount() > 0) {
        while ($row = $stmt55->fetch(PDO::FETCH_ASSOC)) {
        }
        $stmt56 = $conn->prepare("INSERT INTO fairies2 (pass, pass2, pass3, pass4) VALUES (:secret_santa, :secret_santa_pass, 'no', 'AMade') LIMIT 1"); //
        $stmt56->bindParam(':secret_santa', $secret_santa);
        $stmt56->bindParam(':secret_santa_pass', $secret_santa_pass);
        $stmt56->execute();
        $stmt57 = $conn->prepare("UPDATE fairies2 SET pass2 = :Newpass WHERE ID = :ID AND pass3 = 'yes'");
        $stmt57->bindParam(':Newpass', $Newpass);
        $stmt57->bindParam(':ID', $ID);
        $stmt57->execute();
        $stmt58 = $conn->prepare("UPDATE fairies2 SET pass4 = 'Null' WHERE ID = :ID AND pass3 = 'yes'");
        $stmt58->bindParam(':ID', $ID);
        $stmt58->execute();
        if ($stmt58) {
            $_SESSION['SSPassword'] = $Newpass;
            echo "<p class = 'nightGhost Zapisi'>Your new password is </p>" . $Newpass;
        } else {
            echo ' ';
			}
    } else {
        $stmt59 = $conn->prepare("UPDATE fairies2 SET pass2 = :Newpass WHERE ID = :ID AND pass3 = 'yes' AND pass4 = 'Null'");
        $stmt59->bindParam(':Newpass', $Newpass);
        $stmt59->bindParam(':ID', $ID);
        $stmt59->execute();
        if ($stmt59) {
            $_SESSION['SSPassword'] = $Newpass;
            echo "<p class = 'nightGhost Zapisi'>Your new password is </p>" . $Newpass;
        } else {
            echo ' ';
			}
    }
} else {
    echo '';
	}

if (isset($_POST['ChangeNameAndPass'])) {
    echo "<div class = 'divChangingData' name='divWSSChangeNameAndPassForm'>
			<form action='WishesSecretSanta.php' target='_self' method='post' name='WSSChangeNameAndPassForm' accept-charset='utf-8'>
			<p id='idNick' class='nightGhost'>Write down your new name: <input type='text' name='Newname' value=''></p><br>
			<p id='idPass' class='nightGhost'>Write down your new password: <input type='text' name='Newpass' value=''></p><br><br>
			<button class='nightBlue' type='submit' name='ChangeNameAndPass2' value='ChangeNameAndPass2'>Confirm</button>	
		</form>
	</div>";
}

if (isset($_POST['ChangeNameAndPass2'])) {
    $secret_santa = $_SESSION['SSName'];
    $secret_santa_pass = $_SESSION['SSPassword'];
    $Newname = $_POST['Newname'];
    $Newpass = $_POST['Newpass'];
    $stmt60 = $conn->prepare("SELECT ID FROM fairies2 WHERE ID = :ID AND pass4 = 'AMade'");
    $stmt60->bindParam(':ID', $ID);
    $stmt60->execute();
    if ($stmt60->rowCount() > 0) {
        while ($row = $stmt48->fetch(PDO::FETCH_ASSOC)) {
        }
        $stmt61 = $conn->prepare("INSERT INTO fairies2 (pass, pass2, pass3, pass4) VALUES (:secret_santa, :secret_santa_pass, 'no', 'AMade') LIMIT 1"); //
        $stmt61->bindParam(':secret_santa', $secret_santa);
        $stmt61->bindParam(':secret_santa_pass', $secret_santa_pass);
        $stmt61->execute();
        $stmt62 = $conn->prepare("UPDATE fairies2 SET pass = :Newname, pass2 = :Newpass WHERE ID = :ID AND pass3 = 'yes'");
        $stmt62->bindParam(':Newname', $Newname);
        $stmt62->bindParam(':Newpass', $Newpass);
        $stmt62->bindParam(':ID', $ID);
        $stmt62->execute();
        $stmt63 = $conn->prepare("UPDATE fairies2 SET pass4 = 'Null' WHERE ID = :ID AND pass3 = 'yes'");
        $stmt63->bindParam(':ID', $ID);
        $stmt63->execute();
        $stmt64 = $conn->prepare("UPDATE persons SET Secret_Santa = :Newname WHERE Secret_Santa = :secret_santa");
        $stmt64->bindParam(':Newname', $Newname);
        $stmt64->bindParam(':secret_santa', $secret_santa);
        $stmt64->execute();
        if ($stmt64) {
            $_SESSION['SSName'] = $Newname;
            $_SESSION['SSPassword'] = $Newpass;
            echo '<p class = "nightGhost Zapisi">Your new password is </p>' . $Newpass . "<br><p>Your new name is </p>" . $Newname;
        } else {
            echo ' ';
			}
    } else {
        $stmt65 = $conn->prepare("UPDATE fairies2 SET pass = :Newname, pass2 = :Newpass WHERE ID = :ID AND pass3 = 'yes'");
        $stmt65->bindParam(':Newname', $Newname);
        $stmt65->bindParam(':Newpass', $Newpass);
        $stmt65->bindParam(':ID', $ID);
        $stmt65->execute();
        $stmt66 = $conn->prepare("UPDATE persons SET Secret_Santa = :Newname WHERE Secret_Santa = :secret_santa");
        $stmt66->bindParam(':Newname', $Newname);
        $stmt66->bindParam(':secret_santa', $secret_santa);
        $stmt66->execute();
        $stmt67 = $conn->prepare("UPDATE fairies2 SET pass4 = 'Null' WHERE ID = :ID AND pass3 = 'yes'");
        $stmt67->bindParam(':ID', $ID);
        $stmt67->execute();
        if ($stmt66) {
            $_SESSION['SSPassword'] = $Newpass;
            $_SESSION['SSName'] = $Newname;
            echo '<p class = "nightGhost Zapisi">Your new password is </p>' . $Newpass . "<br><p>Your new name is </p>" . $Newname;
        } else {
            echo ' ';
			}
        if ($stmt67) {
            echo ' ';
        } else {
            echo '';
			}
    }
} else {
    echo '';
	}

if (isset($_POST['DelPersonData'])) {
    echo "<div class = 'divChangingData' name='divWSSDelPersonDataForm'><p class='nightGhost'>Are you sure you want to delete your data and not access Secret Santa?</p>";
    echo "<form action='WishesSecretSanta.php' target='_self' method='post' name='WSSDelPersonDataForm' accept-charset='utf-8'>
            <button class='nightBlue' type='submit' name='DelPersonDataP' value='DelPersonDataP'>Yes</button>
            <button class='nightBlue' type='submit' name='DelPersonDataB' value='DelPersonDataB'>No</button>	
        </form></div>";
}

if (isset($_POST['DelPersonDataP'])) {
    $stmt68 = $conn->prepare("SELECT ID,pass FROM fairies2 WHERE ID = :ID AND pass3 = 'yes' AND pass4 = 'Null'");
    $stmt68->bindParam(':ID', $ID);
    $stmt68->execute();
    if ($stmt68->rowCount() > 0) {
        echo "<table><tr>
                <th>№</th>
                <th>pass</th>
            </tr>";
        while ($row = $stmt68->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" . $row['ID'] . "</td>
                    <td>" . $row['pass'] . "</td>
                </tr></table>";  
        }
        $stmt69 = $conn->prepare("UPDATE persons SET Secret_Santa = ' ' WHERE Secret_Santa = :secret_santa");
        $stmt69->bindParam(':secret_santa', $secret_santa);
        $stmt69->execute();
        $stmt70 = $conn->prepare("DELETE FROM persons WHERE ID = :ID");
        $stmt70->bindParam(':ID', $ID);
        $stmt70->execute();
        $stmt71 = $conn->prepare("DELETE FROM fairies2 WHERE ID = :ID AND pass3 = 'yes'");
        $stmt71->bindParam(':ID', $ID);
        $stmt71->execute();
        if ($stmt70) {
            echo "<script> setInterval(ExitPerson2,3000); </script>";
        } else {
            echo ' ';
			}
    } else {
        $stmt72 = $conn->prepare("UPDATE persons SET Secret_Santa = ' ' WHERE Secret_Santa = :secret_santa");
        $stmt72->bindParam(':secret_santa', $secret_santa);
        $stmt72->execute();
        $stmt73 = $conn->prepare("DELETE FROM persons WHERE ID = :ID");
        $stmt73->bindParam(':ID', $ID);
        $stmt73->execute();
        $stmt74 = $conn->prepare("UPDATE fairies2 SET pass3 = 'no' WHERE pass = :secret_santa AND pass2 = :secret_santa_pass");
        $stmt74->bindParam(':secret_santa', $secret_santa);
        $stmt74->bindParam(':secret_santa_pass', $secret_santa_pass);
        $stmt74->execute();
        if ($stmt74) {
            echo "<script> setInterval(ExitPerson2,3000); </script>";
        } else {
            echo ' ';
			}
    }
} else {
    echo '';
	}

if (isset($_POST['DelPersonDataB'])) {
    echo "<div class = 'divChangingData' name='divDelPersonData'><p class='nightGhost'>Hello Secret Santa!<br>Again!</p></div>";
} else {
    echo '';
	}

if (isset($_POST['AdminConnectButton'])) {
    $_SESSION['AdminConnect'] = $_POST['AdminConnect'];
    $AdminConnect = $_POST['AdminConnect'];
    try {
        $sql2 = "INSERT INTO vikings(Text) VALUES (:AdminConnect)";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bindParam(':AdminConnect', $AdminConnect);
        $stmt2->execute();
        echo "<div class = 'divShowData' name='divExit'><p class='nightGhost'>Message sent!</p></div>";
    }
    catch (PDOException $e) {
        echo " " . $e->getMessage();
		}
}

if(isset($_POST['ExitSait'])){
	echo "<div class = 'divShowData' name='divExit'><p class='nightGhost'>Bye!</p></div>";
	$sql_75 = "DROP TABLE IF EXISTS ChoosingWishes";
	$stmt75 = $conn->prepare($sql_75);
	$stmt75->execute();
	session_unset();
	session_destroy();	
	echo "<script> setInterval(ExitPerson2,1000); </script>";
}
?>

</div>
<div class = "footer">
	<button id = "AdminInfoButton" type="submit" name="AdminInfo" value="AdminInfo" formtarget = "_self" formmethod  = "post" onclick="showAdminInfo()">Info</button>
	<button id = "AdminConnButton" type="submit" name="AdminConnection" value="AdminConnection" formtarget = "_self" formmethod  = "post" onclick="showContactForm()">Contact</button>
	<div id="showAdminInfo">
		<div id="showAdminInfoInside">
			<a href="javascript:void(0)" id="closebtn" onclick="closeAdminInfo()">&times;</a>
			<h3>Secret Santa</h3>
            <p></p>
			<p><span>With your registration:</span><br><span> =></span> you get permission to choose a wish you want and you can fulfill by becoming a secret santa;<br><span> =></span> you agree to have your secret santa wish to be chosen by others to please you;</p>
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