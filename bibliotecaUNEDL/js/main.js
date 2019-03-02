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

