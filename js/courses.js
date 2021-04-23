$(document).ready(function(){
	$("#genderid").change(function() {
		var table = $(this).attr('table');
		var field = $(this).attr('field');
		var val = $(this).val();
		$.ajax({
			type:'POST',
			//data:dataString,
			data: {
				'table': table,
				'field': field,
				'val': val,
			},
			url:'ajaxs/getselectoptions.php',
			success: function (response) { document.getElementById("fieldid").innerHTML = response; }
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

function mydelete(id,currenttable,img)
{
	$.ajax({
		type:'POST',
		//data:dataString,
		data: {	
		'id': id,
		'currenttable': currenttable,
		'img': img,
		},
		url:'ajaxs/deleteind1.php',
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