$(document).ready(function(){

	var base = $('#baseUrl').val();
    var url ='';




$('body').on('click', '#import-scores', function(event){
 url = base+'/scores/import';
 console.log('Hello');
 if($('#csv-mark-input').val()!=''){
 var scores_file = document.getElementById('csv-mark-input').files[0]; //grapping photo file
                   upload(url,scores_file,'mark-sheet');
               }
}); 



 function upload(url, item,type) {

    var token = $('#token').val();
    var formData = new FormData();
    formData.append(type, item);
    formData.append('_token', token);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener('progress', progressHandler, false);
    ajax.addEventListener('load',  completeHandler, false);
    ajax.addEventListener('error', errorHandler, false);
    ajax.addEventListener('abort', abortHandler, false);
    ajax.open('POST', url);
    ajax.send(formData);
    preview=type;
  }



  function progressHandler(e) {
    console.log('progressing...');
    var percent = (e.loaded / e.total) * 100;
    percent = Math.round(percent);
    console.log(percent + '%.....');
   
  }

  function completeHandler(e) {
    console.log('complete');
    console.log("RespnseText:"+e.currentTarget.responseText);
   $('body').html(e.currentTarget.responseText);
   
  }

  function errorHandler(e) {
    console.log(e);
  }

  function abortHandler(e) {
    console.log(e);
  }


});
