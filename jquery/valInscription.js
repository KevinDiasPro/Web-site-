

$().ready(function(){
    $("#formInscription").validate({
        errorClass: 'inputErr',
        validClass: 'inputVal',
        rules: {
            lastname: {
                required: true,
                stringVal: true 
            },
            firstname: {
                required: true,
                stringVal: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8,
                passwordVal: true
            }            
        }, 

        messages: { 
            lastname:{
                required: "Le nom est obligatoire",
                stringVal: "caractères de l'alphabet seulement"
            },
            firstname:{
                required: "Le prénom est obligatoire",
                stringVal: "caractères de l'alphabet seulement"
            },
            email:{
                required: "L'adresse mail est obligatoire",
                email: "Entrez une addresse mail valide"
            },
            password:{
                required: "Le mot de passe est obligatoire",
                minlength: "8 caractères minimum",
                passwordVal: "min, maj, chiffre et symbole demandés"
            }
        },
        errorPlacement: function(error, element) {         
       error.insertBefore(element);
   }
    });
});

$.validator.addMethod("passwordVal", 
function(value){
    var upper =  /[A-Z]/.test(value);
    var lower = /[a-z]/.test(value);
    var number = /[0-9]/.test(value);
    var special = /\W/.test(value);
    return (upper && lower && number && special);
});

$.validator.addMethod("stringVal", 
function(value){
    return /^[a-zA-Z-]+$/.test(value);
});


$().ready(function(){
    $("#formConnection").validate({
        errorClass: 'inputErr',
        validClass: 'inputVal',
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8,
                passwordVal: true
            }            
        }, 
        messages: { 
            email:{
                required: "L'adresse mail est obligatoire",
                email: "Entrez une addresse mail valide"
            },
            password:{
                required: "Le mot de passe est obligatoire",
                minlength: "8 caractères minimum",
                passwordVal: "min, maj, chiffre et symbole demandés"
            }
        },
        errorPlacement: function(error, element) {         
       error.insertBefore(element);
   }
    });
});