// ——————————————————————————————————————————————————
  // VALIDATE **
  // ——

  $().ready(function() {



    $("#formInscription").validate({
        rules: {

            username: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5,
                maxlength: 12
            },
            confirm_password: {
                required: true,
                minlength: 5,
                maxlength: 12,
                equalTo: "#password"
            }
        },
        messages: {
            username: {
                required: "Votre Pseudo obligatoire",
                minlength: "Votre pseudo doit comporter au moins 3 caractères"
            },
            password: {
                required: "Veuillez saisir un mot de passe",
                minlength: "Votre mot de passe doit comporter entre 5 et 12 caractères"
            },
            confirm_password: {
                required: "Merci de re-saisir votre mot de passe",
                minlength: "Votre mot de passe doit comporter entre 5 et 12 caractères",
                equalTo: "Veuillez saisir le même mot de passe"
            },
            email: "Veuillez saisir un email valide"

        }
    });





});
