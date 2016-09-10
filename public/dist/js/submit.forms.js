$(document).ready(function(){

var base = $('#baseUrl').val();
var url ='';

$('body').on('click', '#register-student', function(event){
  event.preventDefault();
  var data= $('#form-register-student').serialize();
  var url = base+'/students/register';
  sendform(url, data);

});

$('body').on('click', '#save-new-course', function(event){
  event.preventDefault();
  var data= $('#form-add-course').serialize();
  var url = base+'/courses/add';
  sendform(url, data);

});










function sendform(url,data){
		 $.ajax({
     	url:url,
     	type: "POST",
     	data:data,
     	success:function(data){
        if(data.success){
            $('.infoMsg').html(data.message);
        	$('#infoModal').modal();
        	$('#form-addstudent').trigger('click');

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

});