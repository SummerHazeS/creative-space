
'use strict';

function showUp () {
	FirstAndLast ();
	FirstAndLastHold ();
	document.getElementById("SnejinkaVij").addEventListener("click",showUp2);
}
 
function showUp2 () {
	document.getElementById("Clicka").style.display = "none";
	showUpHSS ();
	showUpHSSHold ();
	showUpPHSS ();
	showUpPHSSHold ();
	showUpPHSS2 ();
	showUpPHSS2Hold ();
}

function FirstAndLast () {	
	document.getElementById("SnejinkaVij").style.animation = "StartSne 2s ease 0s";
	document.getElementById("Clicka").style.animation = "StartClick 2s linear 1s 1 normal";
}

function FirstAndLastHold (){
	document.getElementById("SnejinkaVij").style.display = "block";
	document.getElementById("SnejinkaVij").style.width = "100px";	
	document.getElementById("SnejinkaVij").style.height = "100px";
	document.getElementById("Clicka").style.display = "inline";
	document.getElementById("Clicka").style.position = "fixed";	
	document.getElementById("Clicka").style.bottom = "2px";
}

function showUpHSS () {	
	document.getElementById("HSS").style.animation = "StartAnimeFirst 1s ease 0s";	
}

function showUpHSSHold (){
	var w = window.matchMedia("(max-width: 600px)");
	var x = window.matchMedia("(max-width: 768px)");
	var y = window.matchMedia("(max-width: 992px)");
	var z = window.matchMedia("(min-width: 992px)");
	if (x.matches || w.matches){
		document.getElementById("HSS").style.display = "block";
		document.getElementById("HSS").style.fontSize = "16px";	
	}
	if (y.matches){
		document.getElementById("HSS").style.display = "block";
		document.getElementById("HSS").style.fontSize = "18px";		
	}
	if (z.matches){
		document.getElementById("HSS").style.display = "block";
		document.getElementById("HSS").style.fontSize = "20px";		
	}
}

function showUpPHSS () {
	document.getElementById("PHSS").style.animation = "StartAnimeFirst2 2s ease 0s";	
}

function showUpPHSSHold () {
	var w = window.matchMedia("(max-width: 600px)");
	var x = window.matchMedia("(max-width: 768px)");
	var y = window.matchMedia("(max-width: 992px)");
	var z = window.matchMedia("(min-width: 992px)");
	if (x.matches || w.matches){
		document.getElementById("PHSS").style.display = "block";
		document.getElementById("PHSS").style.fontSize = "14px";	
	}
	if (y.matches){
		document.getElementById("PHSS").style.display = "block";
		document.getElementById("PHSS").style.fontSize = "14px";		
	}
	if (z.matches){
		document.getElementById("PHSS").style.display = "block";
		document.getElementById("PHSS").style.fontSize = "18px";		
	}
}

function showUpPHSS2 () {
	document.getElementById("HSSRForm").style.animation = "StartAnimeFirst3 1s ease 0s";
}

function showUpPHSS2Hold () {
	document.getElementById("HSSRForm").style.display = "block";
}

function hideX(x){
	document.getElementsByTagName("input")[x].value = "";
	document.getElementsByTagName("input")[x].style.border="1px solid red";
}

function showHint(x){
	document.getElementById(x).style.visibility = "visible";	
}

function hideHint(x) {
	document.getElementById(x).style.visibility = "hidden";
}

function NRPerson () { 
	window.document.location.href = "index.php";
}

function CRPerson () {
	location.assign("HSecretSanta.php");
}

function RPerson () {
	location.assign("WishesSecretSanta.php");
}

function ExitPerson () {
	window.document.location.href = "index.php";
}

function NRPerson2 () { 
	window.document.location.href = "indexen.php";
}

function CRPerson2 () {
	location.assign("HSecretSantaen.php");
}

function RPerson2 () {
	location.assign("WishesSecretSantaen.php");
}

function ExitPerson2 () {
	window.document.location.href = "indexen.php";
}

function Dissapear () {
	document.getElementById("NPSSmainForm").style.visibility = "hidden";	
	document.getElementsByTagName("input")[0].style.visibility = "hidden";
	document.getElementsByTagName("input")[1].style.visibility = "hidden";
	document.getElementsByTagName("input")[2].style.visibility = "hidden";
	document.getElementsByTagName("input")[3].style.visibility = "hidden";
	document.getElementsByTagName("input")[4].style.visibility = "hidden";
	document.getElementsByTagName("input")[5].style.visibility = "hidden";
	document.getElementsByTagName("h3")[0].style.visibility = "hidden";
	document.getElementsByTagName("button")[0].style.visibility = "hidden";
	document.getElementsByTagName("h3")[1].style.visibility = "hidden";
	document.getElementsByTagName("button")[1].style.visibility = "hidden";
}

function DissapearshowUp () {
	document.getElementById("HSS").style.display = "none";
	document.getElementById("PHSS").style.display = "none";
	document.getElementById("HSSRForm").style.display = "none";
}

function showOpenMenuIcon() {
	if (window.matchMedia("(max-width: 600px)").matches) {
		document.getElementById("OpenMenu").style.display = "block";
		document.getElementById("menu").style.display = "none";
	} else {
		document.getElementById("OpenMenu").style.display = "none";
		document.getElementById("menu").style.display = "block";
	}
}

function openMenu() {
	var z = document.getElementById("menu"); 
	if(z.style.display == "none"){
		document.getElementById("menu").style.display = "block";
		document.getElementById("OpenMenu").style.left = "10px";
		document.getElementById("OpenMenu").style.right = "auto";
		document.getElementsByClassName("main")[0].style.margin = "120px auto";
	} else {
		document.getElementById("menu").style.display = "none";
		document.getElementById("OpenMenu").style.right = "10px";
		document.getElementById("OpenMenu").style.left = "auto";
		document.getElementsByClassName("main")[0].style.margin = "30px auto";
	}
}

function MenuShow() {
	document.getElementById("BB").style.display = "block";
	document.getElementById("BB1").removeEventListener("click", MenuShow);
	document.getElementById("BB1").addEventListener("click",MenuHide);
}

function MenuHide() {
	document.getElementById("BB").style.display = "none";
	document.getElementById("BB1").removeEventListener("click", MenuHide);
	document.getElementById("BB1").addEventListener("click",MenuShow);
}

function MenuShow2() {
	document.getElementById("CC").style.display = "block";
	document.getElementById("CC1").removeEventListener("click", MenuShow);
	document.getElementById("CC1").addEventListener("click",MenuHide);
}

function MenuHide2() {
	document.getElementById("CC").style.display = "none";
	document.getElementById("CC1").removeEventListener("click", MenuHide);
	document.getElementById("CC1").addEventListener("click",MenuShow);
}

var j;  
var k = "CC";
var m = "BB";

function FixMenu (j){  
	if (window.matchMedia("(max-width: 768px)").matches) {  
		if(j === k) {  
		document.getElementById(j).style.display = "block";
		document.getElementById("BSendInvitationForSSW").style.top = "140px";
		document.getElementById("ChangeData").style.top = "160px";
		document.getElementById("ExitSait").style.top = "180px";
		} else if(j === m) {
		document.getElementById(j).style.display = "block";
		document.getElementById("BSendInvitationForSSW").style.top = "80px";
		document.getElementById("ExitSait").style.top = "200px";
		document.getElementById("YourSecretSanta").style.right = "60px";
		document.getElementById("ShowWishes").style.right = "60px";
		document.getElementById("BSendInvitationForSSW").style.right = "60px";
		document.getElementById("ChangeData").style.right = "60px";
		document.getElementById("ExitSait").style.right = "80px";
		}
	} else {
		
		}
}
	
function RestoreMenu (j){  
	if (window.matchMedia("(max-width: 768px)").matches) { 
		if(j === k) { 
		document.getElementById(j).style.display = "none";
		document.getElementById("BSendInvitationForSSW").style.top = "80px";
		document.getElementById("ChangeData").style.top = "100px";
		document.getElementById("ExitSait").style.top = "120px";
		} else if(j === m) { 
		document.getElementById(j).style.display = "none";
		document.getElementById("ExitSait").style.top = "120px";
		document.getElementById("YourSecretSanta").style.right = "10px";
		document.getElementById("ShowWishes").style.right = "10px";
		document.getElementById("BSendInvitationForSSW").style.right = "10px";
		document.getElementById("ChangeData").style.right = "10px";
		document.getElementById("ExitSait").style.right = "10px";
		}
	} else {
		
		}
}

function YourChoice(x) {
	let y = 0;
	let z = 0;
	for (y, len = document.getElementsByTagName("tr").length; y < len; y++) {
		document.getElementsByTagName("tr")[y].style.border="0px solid #FE2712";
	}
	y = x.rowIndex;
	z = y + 10;
	document.getElementsByTagName("tr")[y].style.border="3px solid #DBE5FF";
	document.getElementById("WishesChoiceB").style.display="block";
	document.getElementById("WishesChoiceHidden").style.display="block";
	document.getElementById("WishesChoiceB").style.border="3px solid #DBE5FF";
	document.getElementById("WishesChoiceHidden").value = z;
}

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

function ShowSendForm (){
	document.getElementById("SendForm1").style.visibility = "visible";
	document.getElementById("SendForm1F").style.visibility = "visible";
	document.getElementById("SeeInvitationForSSW").style.visibility = "visible";
	document.getElementById("ResetInvitationForSSW").style.visibility = "visible";
	document.getElementById("SendInvitationForSSW").style.visibility = "visible";
	document.getElementById("MesageInvitationForSSW").style.visibility = "visible";
	document.getElementsByClassName("SendForm1Labels")[0].style.visibility = "visible";
	document.getElementsByClassName("SendForm1Labels")[1].style.visibility = "visible";
	document.getElementsByClassName("SendForm1Labels")[2].style.visibility = "visible";
	document.getElementsByClassName("SendForm1Labels")[3].style.visibility = "visible";
	document.getElementsByClassName("SendForm1Labels")[4].style.visibility = "visible";
	document.getElementsByClassName("SendForm1Inputs")[0].style.visibility = "visible";
	document.getElementsByClassName("SendForm1Inputs")[1].style.visibility = "visible";
	document.getElementsByClassName("SendForm1Inputs")[2].style.visibility = "visible";
	document.getElementsByClassName("SendForm1Inputs")[3].style.visibility = "visible";
}

function ResetInvitationField () {
	ShowSendForm ();
	document.getElementsByClassName("SendForm1Inputs")[0].value = " ";
	document.getElementsByClassName("SendForm1Inputs")[1].value = " ";
	document.getElementsByClassName("SendForm1Inputs")[2].value = " ";
	document.getElementsByClassName("SendForm1Inputs")[3].value = " ";
	document.getElementById("SendForm2").style.visibility = "hidden";
	document.getElementById("SendForm2F").style.visibility = "hidden";
	document.getElementById("DoSend").style.display = "block";
	document.getElementById("Do2Send").style.display = "block";
	document.getElementById("Do3Send").style.display = "block";
	document.getElementsByTagName("p")[0].style.display = "block";
	document.getElementsByTagName("p")[3].innerHTML = "Пожелаваме Светли Празници!!";
	document.getElementById("MesageInvitationForSSW").rows = "8";
	document.getElementById("MesageInvitationForSSW").cols = "52";
	document.getElementById("MesageInvitationForSSW").style.height = "100px";
	document.getElementById("MesageInvitationForSSW").style.width = "400px";
	document.getElementsByTagName("p")[3].innerHTML = "Въведете съобщенето си...";
	document.getElementById("DoSend").innerHTML = "Виксен!";
	document.getElementById("Do2Send").innerHTML = "Вие сте поканен да посетите Secret Santa Websait!";
}

//
function ShowDataOfChoice () {
	var y = document.getElementsByTagName("p")[2];
	if (y.style.visibility === "hidden") {
		y.style.visibility = "visible";
	} else {
		y.style.visibility = "hidden";
		}
}
	
function ShowAddressOfShipping () {
	var z = document.getElementsByTagName("p")[3];
	if (z.style.visibility === "hidden") {
		z.style.visibility = "visible";
	} else {
		z.style.visibility = "hidden";
		}	
}

//
function showAdminInfo(){
	document.getElementById("showAdminInfo").style.width = "100%";
	document.getElementById("closebtn").style.display = "block";
}

function closeAdminInfo(){
	document.getElementById("showAdminInfo").style.width = "0";
	document.getElementById("closebtn").style.display = "none"; 
}

function showContactForm(){
	document.getElementById("AdminForm").style.display = "block";
	document.getElementById("Flag").style.display = "none";
	if(document.getElementById("AdminForm").style.display == "none"){
		document.getElementById("AdminForm").style.display == "block";
		document.getElementById("Flag").style.display = "none";
	} else {
		document.getElementById("AdminForm").style.display == "none";
		document.getElementById("Flag").style.display = "block";
	}
}

function hideContactForm(){
	document.getElementById("AdminForm").style.display = "none";
}

/*
function showFlag (){
	document.getElementById("FlagEn").style.display = "block";
}

function hideFlag (){
	document.getElementById("FlagEn").style.display = "none";
}
*/
function FlagClick1 () {
	document.getElementById("FlagEn").style.visibility = "visible";
	document.getElementById("FlagEn").style.left = "160px";
	window.document.location.href = "indexen.php";
}

function FlagClick2 () {
	window.document.location.href = "index.php";
}

function CRPerson2 () {
	location.assign("HSecretSantaen.php");
}

function RPerson2 () {
	location.assign("WishesSecretSantaen.php");
}

function ExitPerson2 () {
	window.document.location.href = "indexen.php";
}








	


