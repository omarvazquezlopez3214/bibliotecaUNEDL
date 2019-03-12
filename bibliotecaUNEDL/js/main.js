$('.toggle').click(function(){
    $('.formulario').animate({
        height: "toggle",
        'padding-top': 'toggle',
        'padding-bottom': 'toggle',
        opacity: 'toggle'
    }, "slow");
});

$('.reset-password').click(function(){
    $('.formulario2').animate({
        height: "toggle",
        'padding-top': 'toggle',
        'padding-bottom': 'toggle',
        opacity: 'toggle'
    }, "slow");
});

$('.bibliotecario').click(function(){
  var matricula = document.getElementById("matri").value;
  var expre = /^([B][I])[0-9]{3}$/;
  if(expre.test(matricula))
  {
    document.getElementById("carre").style.display = "block";
    document.getElementById("noexiste").style.display = "none";
    $('#carre').prop("required", true);
  }else
  {
    $('#carre').prop("required", true);
    document.getElementById("carre").style.display = "none";
    document.getElementById("noexiste").style.display = "block";
  }
});

$('.buscartodos').click(function(){
    $('#usuario').removeAttr("required");
});



      $(document).ready(function(){
      var consulta; 
      //hacemos focus
      $("#matri").focus();                                    
      //comprobamos si se pulsa una tecla
      $("#matri").keyup(function(e){
         //obtenemos el texto introducido en el campo
         consulta = $("#matri").val();                      
         //hace la búsqueda
         $("#resultado").delay(100).queue(function(n) {      
                                       
            $("#resultado").html('<img src="ajax-loader.gif" />');                    
                  $.ajax({
                        type: "POST",
                        url: "existeusuario.php",
                        data: "m="+consulta,
                        dataType: "html",
                        error: function(){
                              alert("error petición ajax");
                        },
                        success: function(data){
                              $("#resultado").html(data)
                              if($("#resultado").text() == "Matrícula válida.")
                              {
                                document.getElementById("carre").style.display = "block";
                                $('#carre').prop("required", true);
                              }else if($("#resultado").text() == "Número de colaborador válido.")
                              {
                                $('#carre').removeAttr("required");
                                document.getElementById("carre").style.display = "none";
                              }else if($("#resultado").text() == "No es una matrícula o número de colaborador válido.")
                              {
                                $('#carre').prop("required", true);
                                document.getElementById("carre").style.display = "none";
                              }
                              n();
                        }
              });
                                           
             });
                                
      });
                          
});

