// Fonction pour afficher/masquer le mot de passe
$(document).ready(function() {
    $('#toggle-password').click(function() {
      var passwordInput = $('#password');
      var passwordFieldType = passwordInput.attr('type');
  
      if (passwordFieldType === 'password') {
        passwordInput.attr('type', 'text');
        $('#toggle-password').text('Hide');
      } else {
        passwordInput.attr('type', 'password');
        $('#toggle-password').text('Show');
      }
    });
  });
  
  $(document).ready(function () {
      // Écouter l'événement de soumission du formulaire
      $('#profile-form').on('submit', function (e) {
          e.preventDefault(); // Empêcher la soumission du formulaire par défaut
  
          // Récupérer les valeurs des champs de formulaire
          var username = $('#username').val();
          var password = $('#password').val();
  
          const passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
          if (!passwordPattern.test(password)) {
              alert("Le mot de passe doit contenir au moins 8 caractères, une majuscule, un chiffre et un caractère spécial.");
              return
          }
  
          // Envoyer les données au serveur via AJAX
          $.ajax({
              url: 'profile.php', // L'URL du script de traitement
              method: 'POST',
              data: {username: username, password: password}, // Les données à envoyer
              success: function (response) {
                  alert('Profil modifié avec succés !');
              },
              error: function (xhr, status, error) {
                  // Gérer les erreurs éventuelles
                  console.error(error);
              }
          });
      });
  });