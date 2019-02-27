$(document).ready(function(){
    $('#search').keyup(function(){
      $('#result-search').html('');

      var utilisateur = $(this).val();

      if(utilisateur != ""){
        $.ajax({
          type: 'GET',
          url: 'fonctions/recherche.php',
          data: 'user=' + encodeURIComponent(utilisateur),
          success: function(data){
            if(data != ""){
              $('#result-search').append(data);
            }else{
              document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun utilisateur</div>"
            }
          }
        });
      }
    });
  });