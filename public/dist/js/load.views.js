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

$('body').on('click','#form-adddepartment', function(event){
	event.preventDefault();
	url = base+'/views/adddepartment';
    getView(url);

});
$('body').on('click','#form-addclass', function(event){
	event.preventDefault();
	url = base+'/views/addclass';
    getView(url);

});

$('body').on('click','#form-addteacher', function(event){
	event.preventDefault();
	url = base+'/views/addteacher';
    getView(url);

});
$('body').on('click','#form-addscoresprompt', function(event){
	event.preventDefault();
	url = base+'/views/addscoresprompt';
    getView(url);

});
$('body').on('click','#form-viewscoresprompt', function(event){
	event.preventDefault();
	url = base+'/views/viewscoresprompt';
    getView(url);

});

//supposed to be a post
$('body').on('click','#form-addscores', function(event){
	event.preventDefault();
	url = base+'/views/scores/prompt/input';
	var data= $('#form-prompt-score-registration').serialize();
    submitAndGetView(data, url);

});
//supposed to be a post
$('body').on('click','#form-viewscores', function(event){
	event.preventDefault();
	url = base+'/views/getscores';
    getView(url);

});


$('body').on('click','#form-registercourses', function(event){
	event.preventDefault();
	url = base+'/views/registercourses';
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
$('body').on('click','#form-viewdepartments', function(event){
	event.preventDefault();
	url = base+'/views/getdepartments';
    getView(url);

});

$('body').on('click','#form-viewclasses', function(event){
	event.preventDefault();
	url = base+'/views/getclasses';
    getView(url);

});

$('body').on('click','#form-viewteachers', function(event){
	event.preventDefault();
	url = base+'/views/getteachers';
    getView(url);

});

$('body').on('click','#form-viewuserinfo', function(event){
	event.preventDefault();
	url = base+'/views/userinfo';
    getView(url);

});
$('body').on('click','#form-viewcourseassigns', function(event){
	event.preventDefault();
	url = base+'/views/getteacherassigns';
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

   function submitAndGetView(data, url){

     $.ajax({
     	url:url,
     	type: "POST",
     	data:data,
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