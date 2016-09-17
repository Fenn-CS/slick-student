$(document).ready(function(){

var base = $('#baseUrl').val();
var url ='';
var selected='';


$('body').on('change', '#level-courses', function(event){
var form = $('<form></form>');
    form.append('<input type="text" name="level" value="'+ $(event.target).val() +'" />');
    form.append('<input type="hidden" name="_token" value="'+$('#token').val()+'" />');
    data = form.serialize();
    url = base+'/courses/registration/get';
    sendform(url, data, event);


});

$('body').on('click', '.available-course', function(event){

if(selected.search($(event.target).data('coursecode'))==-1){
 selected += $(event.target).data('coursecode')+'-'; 
 $('#selected-courses').append($(event.target));
 console.log(selected);
}

});

$('body').on('click', '#clear', function(event){
 selected ='';
 $('#selected-courses').html('');
});

$('body').on('click', '#save-registered-courses', function(event){
	var form = $('<form></form>');
    form.append('<input type="text" name="courses" value="'+selected+'" />');
    form.append('<input type="hidden" name="_token" value="'+$('#token').val()+'" />');
    data = form.serialize();
	url = base+'/courses/registration/save';
	sendform(url, data, event);


});

$('body').on('click','.drop-course', function(event){
data='course='+$(event.target).data('courseid')+'&_token='+$('#token').val();
url = base+'/courses/registration/drop';
sendform(url,data,event); 
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
     
        	if(data.selection){

            $('#available-courses').html(data.courses);

            } 
            if(data.registration){
                  $('#floating-alert').html('<h4>Courses registered, work hard! :)</h4>');
        	      $("#floating-alert").show().delay(5000).fadeOut();
        	      selected ='';
                  $('#selected-courses').html('');
                  $('#registered-courses').html(data.courses);

            }  
            if(data.dropped){
            	//Course dropped update UI
        	    $('#registered-courses').html(data.remaining);
        	    $('#floating-alert').html('<h4>Course dropped, you are a free bird! :)</h4>');
        	    $("#floating-alert").show().delay(5000).fadeOut();
        	    return;
        	   
            }

           return;

        } else {
                 $('.infoMsg').html(data.message);
        	     $('#infoModal').modal();
        	     console.log('Hey')
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