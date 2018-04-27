<?php 
require_once(__DIR__ .'/../../config.php');
require_once(ROOT_FOLDER . DS .'model'. DS .'model.php');
?>

<?php 
if(isset($_SESSION['user']))
{
   
?> 

<script>

var cells = document.getElementsByTagName("td");

var users = JSON.parse(sessionStorage.getItem("users"));
var userRole = sessionStorage.getItem("userRole");
var userMail = sessionStorage.getItem("userMail");
var userName = sessionStorage.getItem("userName");
var userId = sessionStorage.getItem("userId");

var action = 0;
/*
	action :
		0 : nothing
		1 : unbook
		2.1 : book self
		2.2 : book else
		2.3 : invite else
*/

// Lorsqu'on click sur une case du calendrier
$("#calendrier").on("click", "td", function(e) {
	var str = "";
	
	var userSelectedEmail = $(this).children().next().html();		// email de l'utilisateur (référence à la case)
	var player = ($(this).attr("id")).split("-")[0].substring(1);	// place de l'utilisateur (référence à la case)
	var dateY = ($(this).attr("id")).split("-")[1];		// annee (référence à la case)
	var dateM = ($(this).attr("id")).split("-")[2];		// mois (référence à la case)
	var dateD = ($(this).attr("id")).split("-")[3];		// jour (référence à la case)
	var date = dateD + "/" + dateM + "/" + dateY;		
	var dateToCel = dateY + '-' + dateM + '-' + dateD;

	var userSelectedInvite = $(this).children().next().next().next().html();
	
	// stocker les informations dans la sessionStorage JS
	sessionStorage.setItem('place', player);
	sessionStorage.setItem('date', dateToCel);
	sessionStorage.setItem('userSelectedEmail', userSelectedEmail);

	//affichage du modal
	$("#modal-validate").show();
	$("#modal-booking").hide();
	$("#modal-input-else").prop("disabled", true);

	// place déjà réservé
	if (this.innerHTML != "") 
	{
		
		// pour les utilisateurs voulant se désinscrire
		if(this.innerHTML.indexOf(userMail)!== -1)
		{
			str = "Voulez-vous vous désinscrire ?";
			action = 1.3;
			console.log(action)
		}
		// pour les utilisateurs voulant désinscrire leurs invité		
		else if(userSelectedInvite == userId){
			str = "Vous aviez invité cette personne. Voulez-vous la désinscrire ?";
			action = 1.2;
			console.log(action)
		}
		// pour les admins voulant désinscrire qqun
		else if (userRole == 1) 
		{
			str = "<strong>Administrateur :</strong> Voulez-vous désinscrire cette personne ?";
			action = 1.2;
			console.log(action)
		}
		// pour les utilisateurs voulant désinscrire qqun
		else 
		{
			str = "Une personne est déjà inscrite à cette place.";
			$("#modal-validate").hide();
		}
	} 
	// Nouvelle réservation
	else 
	{
		// role : admin + adhérant
		if (userRole == 1 || userRole == 4) 
		{
			str = "Qui voulez inscrire le " + date + " en tant que joueur " + player + " ?";
			$("#modal-booking").show();
		} 
		// role : membre
		else if (userRole == 2) 
		{
			str = "Vous devez mettre à jour votre carte de membre pour pouvoir vous inscrire.";
		} 
		// role : invité
		else if (userRole == 3) 
		{
			str = "Vous devez être adhérant pour pouvoir vous inscrire.";
		}
	}
	
	$("#modal-text").html(str);
	$("#modal-book").modal("show");
})

$("#modal-input").on("change keyup paste", function() {
	if ($(this).val() == "") {
		$("#modal-input-else").html("&nbsp;");
		$("#modal-input-else").prop("disabled", true);
	} else {
		var inputTxt = $(this).val().toLowerCase();
		var idxUser = -1;
		for (i = 0; i < users.length; i++) {
			if (users[i].name.toLowerCase().indexOf(inputTxt) !== -1
				|| users[i].lastname.toLowerCase().indexOf(inputTxt) !== -1
				|| users[i].email.toLowerCase().indexOf(inputTxt) !== -1) {
				
					idxUser = i;
					break;
			}
		}
		if (idxUser == -1) {
			$("#modal-input-else").prop("disabled", true);
			$("#modal-input-else").text("Aucun utilisateur trouvé");
		} else {
			$("#modal-input-else").prop("disabled", false);
			$("#modal-input-else").text(users[idxUser].name + " "
			+ users[idxUser].lastname + " (" + users[idxUser].email + ")");
		}
	}
})

$("#modal-book").on("hidden.bs.modal", function() {
	$("#modal-input").val("");
	$("#modal-input-else").html("&nbsp;");
})

$("#modal-input-self").on("click", function() {
	action = 2.1;
})

$("#modal-input-else").on("click", function() {
	if (userRole == 1) {
		action = 2.2;
	} else if (userRole == 4) {
		action = 2.3
	}
})

/**
 	effectue une action en fonction 
 	de l'action effectuée lors
 	du click sur le bouton valider
 */
$("#modal-validate").on("click", function() {
	console.log(action);
	var place = sessionStorage.getItem("place");
	var dateToCel = sessionStorage.getItem("date");
	var userSelectedEmail = sessionStorage.getItem("userSelectedEmail");
	
	if (action == 0) 
	{
		console.log("nothing");
	} 
	else if (action == 1.2) 
	{
		console.log("unbook else");
		document.location = "/Projet_SUAPS/controler/controlerBooking.php?action=annulation_else&place="+ place +"&date=" + dateToCel + "&userSelectedEmail="+userSelectedEmail + "&userid="+ userId;
	}
	else if (action == 1.3){
		console.log("unbook self");
		console.log("/Projet_SUAPS/controler/controlerBooking.php?action=annulation&place="+ place +"&date=" + dateToCel + "&userid="+<?= unserialize($_SESSION['user'])->getId()?>);
		document.location = "/Projet_SUAPS/controler/controlerBooking.php?action=annulation_self&place="+ place +"&date=" + dateToCel + "&userid="+ userId;
	}	
	else if (action == 2.1) 
	{
		console.log("book self");
		document.location = "/Projet_SUAPS/controler/controlerBooking.php?action=reservation&place="+ place +"&date=" + dateToCel + "&userid="+userId;
		
	}
	else if (action == 2.2 || action == 2.3) 
	{
		console.log("book else");

		var emailInvite = $("#modal-input-else").text().split("(")[1].slice(0, -1);
		var nomInvite = $("#modal-input-else").text().split(" ")[1];
		var prenomInvite = $("#modal-input-else").text().split(" ")[0];
		console.log(emailInvite);
		console.log(nomInvite);
		console.log(prenomInvite);
		
		
		document.location = "/Projet_SUAPS/controler/controlerBooking.php?action=invitation&place="+ place +"&date=" + dateToCel + "&userid="+ userId +"&userinviteemail="+emailInvite;
		
	}
})

/*
 * recuperer en javascript les données de l'URL
 */
function extractUrlParmas(){
	var table = location.search.substring(1).split('&');
	var f = [];
	for (var i=0; i<table.length; i++)
	{
			var x = table[i].split('=');
			f[x[0]]=x[1];
	}
	return f;
}
</script>
<?php
require_once (ROOT_FOLDER.DS.'asset'.DS.'js'.DS.'fill_calendar.php');
}
?>