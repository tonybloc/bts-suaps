$().ready(function() {

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
				equalTo: "#inscriptionPdw"
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
		}
	});
});

jQuery.validator.addMethod("EmailUnique", function(value, element){
	return this.optional(element) || .test(value);
}, "L'Email doit ëtre unique");

// $("#formConnection").validate();
