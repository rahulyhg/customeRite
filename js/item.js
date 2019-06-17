$(document).ready(function(){
	$('#addDesciption').hide();
	$('#viewDesciption').hide();

	$(".addDesc").click(function(){
		$('#addDesciption').toggle();
	});

	$(".viewDesc").click(function(){
		$('#viewDesciption').toggle();
	});

	$(".updateDesc").click(function(){
		var prevAttr = $('.updateDesc').attr();

		$('.updateDesc').attr('href','#addDescription');
		
		$('.updateDesc').attr('href','#addDescription');
	});

	$('.searchItems').keyup(function(){
		var text = $(this).val();

		if(text != ''){
			$('.itemTBody').html('');

			$.ajax({
				url:'itemSubjectSearch.php',
				method:'POST',
				data:{search:text},
				dataType:'text',
				success:function(data){
					$('.itemTBody').html(data);
				}
			});
		}
	});
});