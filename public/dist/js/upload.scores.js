$(document).ready(function(){
var base = $('#baseUrl').val();
var token =$('#token').val();
var url ='';

$('body').on('keypress', '.score-box', function(event){

if (event.which == 13)
 { 
  var student = $(event.target).data('student');
  var settings = $(event.target).data('settings');
      student = student.split("-");
      settings = settings.split("-"); 
      var score = $(event.target).val();
      var matricule = student[0];
      var id = student[1];
      var type = settings[0];
      var semester = settings[1];
      var course = settings[2];
      uploadScore(score,course,matricule,id,type,semester,event);
      console.log('===CONSOLE REPORT===');
      console.log('Matricule:'+student[0]);
      console.log('ID:'+student[1]);
      console.log('Type:'+settings[0]);
      console.log('Semester:'+settings[1]);
      console.log('Score:'+$(event.target).val());
      console.log('Course:'+course);


 }

});

$('body').on('click', '.score-action', function(event){
   var box_matricule = $(event.target).data('input');
   $('#'+box_matricule).attr("disabled", false);
});


function uploadScore(score,course, student_matricule, student_id, type, semester,event)
{
	  url = base+'/scores/addscore';
		$.ajax({
     	url:url,
     	type: "POST",
     	data:{score:score,course:course,matricule:student_matricule,id:student_id,type:type,semester:semester,_token:token},
     	success:function(data){
        if(data.success){

             $(event.target).attr("disabled", true);

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
