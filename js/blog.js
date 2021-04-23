$(document).ready(function(){
	$(".blogimgdel").click(function() {
		var id = $(this).attr('id');
		var path = $(this).attr('path');

		$.ajax({
			type:'POST',
			//data:dataString,
			data: {	
			'path': path,
			},
			url:'ajaxs/deletesliderimage.php',
			success: function (response) { $("#blogimgdel-"+id).hide(); }
		});		
	});
});

$(document).ready(function(){
	$(".message").show(function() {
		$("#"+$(this).attr('type')).modal('show');
		setTimeout(function() { $("#"+$(this).attr('type')).modal('hide'); }, 3000);		
	});
});

$(document).ready(function(){
	$(".del").click(function() {
		var id = $(this).attr('id');
		$("#del-"+id).modal('show');
		
	});
});

function mydelete(id,currenttable)
{
	$.ajax({
		type:'POST',
		//data:dataString,
		data: {	
		'id': id,
		'currenttable': currenttable,
		},
		url:'ajaxs/deleteind.php',
		success: function (response) {
			if(response == 1)
			{
				$("#tr-"+id).hide();
				$("#success").modal('show');
				setTimeout(function() { $("#success").modal('hide'); }, 3000);
			}
			else
			{
				$("#cantdelete").modal('show');
				setTimeout(function() { $("#cantdelete").modal('hide'); }, 3000);
			}
		}
	});
}