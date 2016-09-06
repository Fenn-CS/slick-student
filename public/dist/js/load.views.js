$(document).ready(function(){
	var base = $('#baseUrl').val();
    var url ='';

$('body').on('click','#form-addstudent', function(event){
	event.preventDefault();
	url = base+'/views/addstudent';
    getView(url);

});







	function getView(url){
	 $.ajax({
     	url:url,
     	type: "GET",
     	data:{},
     	success:function(data){
        $('.content-header').html(data.title);
        $('.content').html(data.content);
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