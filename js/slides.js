$(document).ready(function(){
	$(".sliderimgdel").click(function() {
		var id = $(this).attr('id');
		var path = $(this).attr('path');

		$.ajax({
			type:'POST',
			//data:dataString,
			data: {	
			'path': path,
			},
			url:'ajaxs/deletesliderimage.php',
			success: function (response) { $("#sliderimgdel-"+id).hide(); }
		});		
	});
});

$(document).ready(function(){
	$(".message").show(function() {
		$("#"+$(this).attr('type')).modal('show');
		setTimeout(function() { $("#"+$(this).attr('type')).modal('hide'); }, 3000);		
	});
});