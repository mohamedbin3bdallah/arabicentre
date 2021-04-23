$(document).ready(function(){
	$("#paymethod").change(function() {
		var paymethod = $(this).val();
		if(paymethod == 'bank') $("#bankaccount").show();
		else if(paymethod == 'paypal') $("#bankaccount").hide();
	});
});