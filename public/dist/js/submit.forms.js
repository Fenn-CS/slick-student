$(document).ready(function(){

var base = $('#baseUrl').val();
var url ='';

$('body').on('click', '#register-student', function(event){
  event.preventDefault();
  var data= $('#form-register-student').serialize();
  var url = base+'/students/register';
  sendform(url, data, event);

});

$('body').on('click', '#save-new-course', function(event){
  event.preventDefault();
  var data= $('#form-add-course').serialize();
  var url = base+'/courses/add';
 sendform(url, data, event);

});

$('body').on('click', '#save-new-department', function(event){
  event.preventDefault();
  var data= $('#form-add-department').serialize();
  var url = base+'/departments/add';
 sendform(url, data, event);

});

$('body').on('click', '#save-new-teacher', function(event){
  event.preventDefault();
  var data= $('#form-add-teacher').serialize();
  var url = base+'/teachers/add';
 sendform(url, data, event);

});

$('body').on('click', '#add-program', function(event){
 event.preventDefault();
 if($('#program-title').val()!=''){
 addprogram($('#program-title').val());
 $('#program-title').val('');
	}
});










function sendform(url,data, event){
	$(event.target).attr("disabled", true);
		 $.ajax({
     	url:url,
     	type: "POST",
     	data:data,
     	success:function(data){
     	$(event.target).attr("disabled", true);
        if(data.success){
            // $('.infoMsg').html(data.message);
        	// $('#infoModal').modal();
        	 $('#floating-alert').html('<h4>'+data.message+'</h4>');
        	 $("#floating-alert").show().delay(5000).fadeOut();
        	$(data.reset).trigger('click');

           return;

        } else {
                 $('.infoMsg').html(data.message);
        	     $('#infoModal').modal();
               }
      },
      
      error:function(xhr, status, error) {
               //Error msg for Developers
               $('body').html('');
               $('body').prepend(xhr.responseText);
               $('body').append('XHR :'+xhr);
               $('body').append('STATUS :'+status);
               $('body').append('ERROR :'+error);
             
              
              }
         });

}

 function addprogram(name){

 	$('#program-list').append('<li>'+name+'</li>');
 	$('#programs').val($('#programs').val() +','+name);

 }

});