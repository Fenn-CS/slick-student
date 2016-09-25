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
$('body').on('click', '#save-new-class', function(event){
  event.preventDefault();
  var data= $('#form-add-class').serialize();
  var url = base+'/classes/add';
  sendform(url, data, event);

});

$('body').on('click', '#save-course-assignment', function(event){
  event.preventDefault();
  var data= $('#form-course-assignment').serialize();
  var url = base+'/courses/assignments/add';
  sendform(url, data, event);

});





$('body').on('change', '#classprogram', function(event){
nameclass();
});
$('body').on('change', '#classlevel', function(event){
nameclass();
});












function sendform(url,data, event){
	$(event.target).attr("disabled", true);
		 $.ajax({
     	url:url,
     	type: "POST",
     	data:data,
     	success:function(data){
     	$(event.target).attr("disabled", false);
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

 function addprogram(name)
 {

 	$('#program-list').append('<li>'+name+'</li>');
 	$('#programs').val($('#programs').val() +','+name);

 }

function nameclass()
{
if($('#classlevel').val()!='Select'&&$('#classprogram').val()!='Select')
$('#classname').val('LEVEL '+$('#classlevel').val()+' '+$('#classprogram').val());
}

});