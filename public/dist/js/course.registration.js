$(document).ready(function(){

var base = $('#baseUrl').val();
var url ='';


$('body').on('change', '#level-courses', function(event){
var form = $('<form></form>');
    form.append('<input type="text" name="level" value="'+ $(event.target).val() +'" />');
    form.append('<input type="hidden" name="_token" value="'+$('#token').val()+'" />');
    data = form.serialize();
    
    url = base+'/courses/registration/get';
    sendform(url, data);


});








function sendform(url,data){
		 $.ajax({
     	url:url,
     	type: "POST",
     	data:data,
     	success:function(data){
        if(data.success){
            $('.infoMsg').html(data.courses);
        	$('#infoModal').modal();
        	//alert(data.courses);
            $('#available-courses').html(data.courses);
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




});