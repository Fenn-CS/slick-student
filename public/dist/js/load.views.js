$(document).ready(function(){
	var base = $('#baseUrl').val();
    var url ='';

$('body').on('click','#form-addstudent', function(event){
	event.preventDefault();
	url = base+'/views/addstudent';
    getView(url);

});
$('body').on('click','#form-addcourse', function(event){
	event.preventDefault();
	url = base+'/views/addcourse';
    getView(url);

});
$('body').on('click','#form-assigncourse', function(event){
	event.preventDefault();
	url = base+'/views/assigncourse';
    getView(url);

});


$('body').on('click','#form-viewstudents', function(event){
	event.preventDefault();
	url = base+'/views/getstudents';
    getView(url);

});


$('body').on('click','#form-viewcourses', function(event){
	event.preventDefault();
	url = base+'/views/getcourses';
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