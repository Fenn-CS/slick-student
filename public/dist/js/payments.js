$(document).ready(function(){


$('body').on('change', '#payment-method', function(event){

if($('#payment-method').val()=='Mobile Money'){
	$('#mobile-money').show();
	$('#credit-card').hide();
}
if($('#payment-method').val()=='Credit Card'){
	$('#credit-card').show();
	$('#mobile-money').hide();
}
if($('#payment-method').val()=='...'){
	$('#mobile-money').hide();
	$('#credit-card').hide();
}

});




























});