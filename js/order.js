$(document).ready(function(){
	// $('#reqP').hide();
	// $('#invP').hide();
	// // $('.totalP').val('900');

	// $('.totalP').keyup(function(){
	// 	var val = $(this).val();

	// 	// $('#reqP').text(val);
	// 	if(val === ""){
	// 		$('#reqP').show();
	// 		$('#regBtn').attr('disabled','true');
	// 	}
	// 	// else if(!isNumeric(val.toString())){
	// 	// 	$('#invP').show();
	// 	// 	$('#regBtn').attr('disabled','true');
	// 	// 	$('.btnError').text('Please input a number as total price!');    
	// 	// }
	// 	else{
	// 		$('#reqP').hide();
	// 		$('#invP').hide();
	// 		$('#regBtn').attr('disabled','false');
	// 	}
	// });

	$('.searchOrders').keyup(function(){
		var text = $(this).val();

		// $('body').css('background-color','red');
		if(text != ''){
			$('.orderTBody').html('');

			$.ajax({
				url:'orderIdSearch.php',
				method:'POST',
				data:{search:text},
				dataType:'text',
				success:function(data){
					$('.orderTBody').html(data);
				}
			});
		}
	});

	$('#date').hide();

	$("#advSearch").click(function(){
		$('.searchOrders').toggle();
		$('#date').toggle();
	});

    $('#searchByDate').change(function(){
		var text = $(this).val();
		
		// $('.searchOrder').val(text);

		if(text != ''){
			$('.orderTBody').html('');

			$.ajax({
				url:'orderCustomerSearch.php',
				method:'POST',
				data:{search:text},
				dataType:'text',
				success:function(data){
					$('.orderTBody').html(data);
				}
			});
		}
	});
});