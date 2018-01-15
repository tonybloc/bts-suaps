window.addEventListener("load", function() {
	let cells = document.getElementsByTagName("td");
	
	let users = JSON.parse(sessionStorage.getItem("users"));
	let userRole = sessionStorage.getItem("userRole");
	console.log(users);
	console.log(userRole);
	let action = 0;
	/*
		action :
			0 : nothing
			1 : unbook
			2.1 : book self
			2.2 : book else
			2.3 : invite else
	*/
	
	$("#calendrier").on("click", "td", function(e) {
		let str = "";
		
		let player = ($(this).attr("id")).split("-")[0].substring(1);

		let dateY = ($(this).attr("id")).split("-")[1];
		let dateM = ($(this).attr("id")).split("-")[2];
		let dateD = ($(this).attr("id")).split("-")[3];
		let date = dateD + "/" + dateM + "/" + dateY;
		
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
			let inputTxt = $(this).val().toLowerCase();
			let idxUser = -1;
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
		if (action == 0) {
			console.log("nothing");
		} else if (action == 1) {
			console.log("unbook")
		} else if (action == 2.1) {
			console.log("book self");
		} else if (action == 2.2) {
			console.log("book else");
		} else if (action == 2.3) {
			console.log("invite else");
		}
	})
})