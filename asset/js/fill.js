window.addEventListener("load", function() {
	let users = new Array(
		{
			"name": "Mateusz",
			"lastname": "Tyminski",
			"email": "gfy@liental.space"
		},
		{
			"name": "Rémy",
			"lastname": "Mouttet",
			"email": "remy.mouttet@sandwi.ch"
		},
		{
			"name": "Arsène",
			"lastname": "Laeuffer",
			"email": "me@sevdev.top",
		},
		{
			"name": "Anthony",
			"lastname": "Mochel",
			"email": "me@tonymochel.top"
		},
		{
			"name": "Syed",
			"lastname": "Shah",
			"email": "s1syed@hotmail.com"
		},
		{
			"name": "Wandy",
			"lastname": "Allen",
			"email": "WendyFAllen@dayrep.com"
		},
		{
			"name": "Glenn",
			"lastname": "Smith",
			"email": "GlennMSmith@hotmail.com"
		}
	);
	
	sessionStorage.setItem("users", JSON.stringify(users));
	sessionStorage.setItem("userMail","jean.knakes@schnitzel.com");
	sessionStorage.setItem("userName","Jean Knäkes");
	sessionStorage.setItem("userRole",1);
	//cells[5].innerHTML = "test";
})