$(document).ready(function(){
	var base = $('#baseUrl').val();
    var url ='';

$('body').on('click','#form-addstudent', function(event){
	event.preventDefault();
	url = base+'/views/addstudent';
    getView(url, event);

});
$('body').on('click','#form-addcourse', function(event){
	event.preventDefault();
	url = base+'/views/addcourse';
    getView(url, event);

});
$('body').on('click','#form-assigncourse', function(event){
	event.preventDefault();
	url = base+'/views/assigncourse';
    getView(url, event);

});

$('body').on('click','#form-adddepartment', function(event){
	event.preventDefault();
	url = base+'/views/adddepartment';
    getView(url, event);

});
$('body').on('click','#form-addclass', function(event){
	event.preventDefault();
	url = base+'/views/addclass';
    getView(url, event);

});

$('body').on('click','#form-addteacher', function(event){
	event.preventDefault();
	url = base+'/views/addteacher';
    getView(url, event);

});
$('body').on('click','#form-addscoresprompt', function(event){
	event.preventDefault();
	url = base+'/views/addscoresprompt';
    getView(url, event);

});
$('body').on('click','#form-viewscoresprompt', function(event){
	event.preventDefault();
	url = base+'/views/viewscoresprompt';
    getView(url, event);

});

//supposed to be a post
$('body').on('click','#form-addscores', function(event){
	event.preventDefault();
	url = base+'/views/scores/prompt/input';
	var data= $('#form-score-prompt').serialize();
    submitAndGetView(data, url,event);

});
//supposed to be a post
$('body').on('click','#form-viewscores', function(event){
	event.preventDefault();
	url = base+'/views/getscores';
    var data= $('#form-score-prompt').serialize();
    submitAndGetView(data, url, event);

});


$('body').on('click','#show-result', function(event){
    event.preventDefault();
    url = base+'/results/getresults';
    var data= $('#form-result-prompt').serialize();
    submitAndGetView(data, url, event);

});


$('body').on('click','#form-registercourses', function(event){
	event.preventDefault();
	url = base+'/views/registercourses';
    getView(url, event);

});


$('body').on('click','#form-viewstudents', function(event){
	event.preventDefault();
	url = base+'/views/getstudents';
    getView(url, event);

});


$('body').on('click','#form-viewcourses', function(event){
	event.preventDefault();
	url = base+'/views/getcourses';
    getView(url, event);

});
$('body').on('click','#form-viewdepartments', function(event){
	event.preventDefault();
	url = base+'/views/getdepartments';
    getView(url, event);

});

$('body').on('click','#form-viewclasses', function(event){
	event.preventDefault();
	url = base+'/views/getclasses';
    getView(url, event);

});

$('body').on('click','#form-viewteachers', function(event){
	event.preventDefault();
	url = base+'/views/getteachers';
    getView(url, event);

});

$('body').on('click','#form-viewuserinfo', function(event){
	event.preventDefault();
	url = base+'/views/userinfo';
    getView(url, event);

});
$('body').on('click','#form-viewcourseassigns', function(event){
	event.preventDefault();
	url = base+'/views/getteacherassigns';
    getView(url, event);

});

$('body').on('click', '#form-academic-years', function(event){
  event.preventDefault();
  url = base+'/views/academicyears';
    getView(url, event);

});
$('body').on('click', '#form-fee-operations', function(event){
  event.preventDefault();
  url = base+'/views/fees/operations';
    getView(url, event);

});

$('body').on('click', '#form-fee-pay', function(event){
  event.preventDefault();
  url = base+'/views/fees/pay';
    getView(url, event);

});

$('body').on('click', '#form-viewresultsprompt', function(event){
  event.preventDefault();
  url = base+'/views/viewresultsprompt';
  getView(url, event);

});
$('body').on('click', '#form-result-restrictions', function(event){
  event.preventDefault();
  url = base+'/views/restrictions/results';
  getView(url, event);

});







	function getView(url, event){
	$(event.target).attr("disabled", true);
  settings = init();
  var target = document.getElementById('spinner');
  var spinner = new Spinner(settings).spin(target);
	 $.ajax({
     	url:url,
     	type: "GET",
     	data:{},
     	success:function(data){
     	$(event.target).attr("disabled", false);
      spinner.stop();
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

   function submitAndGetView(data, url, event){
    $(event.target).attr("disabled", true);
     $.ajax({
     	url:url,
     	type: "POST",
     	data:data,
     	success:function(data){
     	$(event.target).attr("disabled", false);
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