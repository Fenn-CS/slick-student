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
    sendform(url, data);


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