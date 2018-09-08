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

$('.profesor').click(function(){
  var matricula = document.getElementById("matri").value;
  var expre = /^([0-9]{2}[A|B][L])[0-9]{7}$/;
  var expres = /^([0-9]){3,5}$/;
  if(expre.test(matricula))
  {
  	document.getElementById("carre").style.display = "block";
  	document.getElementById("maestro").style.display = "none";
  	document.getElementById("noexiste").style.display = "none";
  	$('#carre').prop("required", true);
  }else if(expres.test(matricula))
  {
  	$('#carre').removeAttr("required");
  	document.getElementById("carre").style.display = "none";
  	document.getElementById("maestro").style.display = "block";
  	document.getElementById("noexiste").style.display = "none";
  }else
  {
  	$('#carre').prop("required", true);
  	document.getElementById("carre").style.display = "none";
  	document.getElementById("noexiste").style.display = "block";
  	document.getElementById("maestro").style.display = "none";
  }
});

$('.buscartodos').click(function(){
    $('#usuario').removeAttr("required");
});