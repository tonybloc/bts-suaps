$("#formInscription").validate({
	rules:{
		inscriptionFirstName :{
			required : true
		},
		inscriptionLastName : {
			required : true
		},
		inscriptionEmail : {
			required : true,
			email:true
		},
		inscriptionPwd : {
			required : true
		},
		inscriptionPwdComfirm : {
			required : true,
			equalTo: "#inscriptionPwd2"
		}
	},
	messages: {
		inscriptionFirstName :{
			required : "Veuillez remplir le champ"
		},
		inscriptionLastName : {
			required : "Veuillez remplir le champ"
		},
		inscriptionEmail : {
			required : "Veuillez remplir le champ",
			email: "email invalide"
		},
		inscriptionPwd : {
			required : "Veuillez remplir le champ"
		},
		inscriptionPwdComfirm : {
			required : "Veuillez remplir le champ",
			equalTo: "Confirmation invalide"
		}
	},
	errorElement:'div',
	
});



// $("#formConnection").validate();
