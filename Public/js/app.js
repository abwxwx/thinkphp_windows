$(function(){
	$("#signin").attr("disabled", true);
	
	$("#agree").click(function(){
		if(this.checked === true){
			$("#signin").attr("disabled", false);
		}
		else if(this.checked === false){
			$("#signin").attr("disabled", true);
		}
        else{
            alert($("#agree").checked);
        }
	});

    $("#headerUl li a").each(function(){
        if($(this)[0].href == String(window.location)){
            $(this).parent().addClass("active");
        }
    });

});