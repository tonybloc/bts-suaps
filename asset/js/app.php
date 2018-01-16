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
$("#calendrier").on("click", "td", function(e) {
	var str = "";
	
	var player = ($(this).attr("id")).split("-")[0].substring(1);
	var dateY = ($(this).attr("id")).split("-")[1];
	var dateM = ($(this).attr("id")).split("-")[2];
	var dateD = ($(this).attr("id")).split("-")[3];
	var date = dateD + "/" + dateM + "/" + dateY;
	
	var dateToCel = dateY + '-' + dateM + '-' + dateD;

	sessionStorage.setItem('place', player);
	sessionStorage.setItem('date', dateToCel);
	
	$("#modal-validate").show();
	$("#modal-booking").hide();
	$("#modal-input-else").prop("disabled", true);
	
	if (this.innerHTML != "") {
		if (userRole == 1) {
			str = "Voulez-vous désinscrire cette personne ?";
			
			action = 1;
			console.log(action)
		} else {
			str = "Une personne est déjà inscrite à cette place.";

			$("#modal-validate").hide();
		}
	} else {
		if (userRole == 1 || userRole == 4) {
			str = "Qui voulez inscrire le " + date + " en tant que joueur " + player + " ?";

			$("#modal-booking").show();
		} else if (userRole == 2) {
			str = "Vous devez mettre à jour votre carte de membre pour pouvoir vous inscrire.";
		} else if (userRole == 3) {
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

$("#modal-validate").on("click", function() {
	console.log(action);
	var place = sessionStorage.getItem("place");
	var dateToCel = sessionStorage.getItem("date");
	
	if (action == 0) {
		console.log("nothing");
	} else if (action == 1) {
		console.log("unbook")
		
	} else if (action == 2.1) {
		console.log("book self");
		document.location = "/Projet_SUAPS/view/reservView.php?place="+ place +"&date=" + dateToCel + "&userid="+<?= unserialize($_SESSION['user'])->getId() ?>;
		<?php 
		if(isset($_GET['place']) && isset($_GET['date']) && isset($_GET['userid']))
		{
		    if(!empty($_GET['place']) && !empty($_GET['date']) && !empty($_GET['userid']))
		    {
		        $place = htmlspecialchars($_GET['place']);
		        $date = htmlspecialchars($_GET['date']);
		        $userid = htmlspecialchars($_GET['userid']);
		        reservation($userid, $place, $date, null);
		        initSessionUsersCalendar();
		    }
		}
		?>
		booking(place, userId, dateToCel);
		console.log("test");
	} else if (action == 2.2) {
		console.log("book else");
	} else if (action == 2.3) {
		console.log("invite else");
	}
})

/* FONCTION AJAX */
function booking(place, userId, date)
{
	$.ajax({
		type: "post",
		url: "/../../model/model.php",
		data: 
			{
			"mode": "reservation",
			 "place": place,
			 "userId": userId,
			 "date": date
			},
		success: function(data)
		{
			if(data === "success")
			{
				console.log("ajax success")
			}
		}
		});
}

function cancelBooking(place, userId, date)
{
	$.ajax({
		type: "post",
		url: "/../../model/model.php",
		data: 
			{
			"mode": "annulation",
			 "place": place,
			 "userId": userId,
			 "date": date
			},
		success: function(data)
		{
			if(data === "success")
			{
				console.log("ajax success")
			}
		}
		});
}			
</script>
<?php
require_once (ROOT_FOLDER.DS.'asset'.DS.'js'.DS.'fill_calendar.php');
}
?>