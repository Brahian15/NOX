
$("#emailLog").focusout(function(){
	$("#emailLog").siblings("span").remove();
  	var email= $("#emailLog").val();
	 $.post("emailLog",{email:email},function(data){
         var data = JSON.parse(data);
          if(data[1] == false){
			$("#emailLog").siblings("label").after("<span class='error'>"+data[0]+"</span>");

            $("#btnlog").attr("disabled",true);
          }else{
			$("#emailLog").siblings("span").remove();
            $("#btnlog").attr("disabled",false);

          }
  });

});
$("#login").submit(function(e) {
        e.preventDefault();
        if ($(this).parsley().isValid()) {
            var email= $("#emailLog").val();
            var pass= $("#passLog").val();
            $.post("ingreso",{email:email, pass:pass},function(data){
                var data = JSON.parse(data);

                if(data[0] == true){

				  localStorage.setItem("LocalStorege","fulano");
                  document.location.href="completeProfile";

                }else{
                  alert(data[1]);
                }
            })
        }
});

//metodo para mandar error si el correo no existe en la base de datos 
$("#remail").focusout(function(){
  $("#remail").siblings("span").remove();
    var email= $("#remail").val();
   $.post("emailLog",{email:email},function(data){
         var data = JSON.parse(data);
          if(data[1] == false){
      $("#remail").siblings("label").after("<span class='error'>"+data[0]+"</span>");
            $("#btnRec").attr("disabled",true);
          }else{
      $("#remail").siblings("span").remove();
            $("#btnRec").attr("disabled",false);
          }
  });
  
});

window.Parsley.addValidator('uppercase', {
  requirementType: 'number',
  validateString: function(value, requirement) {
    var uppercases = value.match(/[A-Z]/g) || [];
    return uppercases.length >= requirement;
  },
  messages: {
    en: 'Your password must contain at least (%s) uppercase letter.'
  }
});

//has lowercase
window.Parsley.addValidator('lowercase', {
  requirementType: 'number',
  validateString: function(value, requirement) {
    var lowecases = value.match(/[a-z]/g) || [];
    return lowecases.length >= requirement;
  },
  messages: {
    en: 'Your password must contain at least (%s) lowercase letter.'
  }
});

//has number
window.Parsley.addValidator('number', {
  requirementType: 'number',
  validateString: function(value, requirement) {
    var numbers = value.match(/[0-9]/g) || [];
    return numbers.length >= requirement;
  },
  messages: {
    en: 'Your password must contain at least (%s) number.'
  }
});

//has special char
window.Parsley.addValidator('special', {
  requirementType: 'number',
  validateString: function(value, requirement) {
    var specials = value.match(/[^a-zA-Z0-9]/g) || [];
    return specials.length >= requirement;
  },
  messages: {
    en: 'Your password must contain at least (%s) special characters.'
  }
});

