$("#usu_name").focusout(function(){
	$("#usu_name").siblings("span").remove();
	var text=$("#usu_name").val();
	$.post("validarText",{text:text},function(data){
		var data=JSON.parse(data);
		if(data[1]==true){
			$("#usu_name").siblings("label").after("<span class='error'>"+data[0]+"</span>");
            $("#btnreg").attr("disabled",true);
		}else{
			$("#usu_name").siblings("span").remove();
            $("#btnreg").attr("disabled",false);
		}

	});
});
$("#emailreg").focusout(function(){
	$("#emailreg").siblings("span").remove();
  	var email= $("#emailreg").val();
	 $.post("emailReg",{email:email},function(data){
         var data = JSON.parse(data);
          if(data[1] == false){
			$("#emailreg").siblings("label").after("<span class='error'>"+data[0]+"</span>");
            $("#btnreg").attr("disabled",true);
          }else{
			$("#emailreg").siblings("span").remove();
            $("#btnreg").attr("disabled",false);
          }
  });

});
$("#password").focusout(function(){
	$("#password").siblings("span").remove();
	var clave= $("#password").val();
	$.post("validarClave",{clave:clave},function(data){
		var data = JSON.parse(data);
		if(data[1]==true){
			$("#password").siblings("label").after("<span class='error'>"+data[0]+"</span>");
            $("#btnreg").attr("disabled",true);
		}else if(data[1]== false){
			$("#password").siblings("label").after("<span class='error'>"+data[0]+"</span>");
            $("#btnreg").attr("disabled",false);
		}else{

		}
	});
});

$("#pass").focusout(function(){
	$("#pass").siblings("span").remove();
	var pass=$("#password").val();
	var pass2=$("#pass").val();
	$.post("compararClave",{pass:pass,pass2:pass2},function(data){
		var data=JSON.parse(data);
		if(data[1]==false){
			$("#pass").siblings("label").after("<span class='error'>"+data[0]+"</span>");
            $("#btnLogin").attr("disabled",true);
		}else if(data[1]==true){
			$("#pass").siblings("span").remove();
			 $("#btnLogin").attr("disabled",false);
		}
	});
});




