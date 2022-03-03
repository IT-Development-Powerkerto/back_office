$(function(){
	$('#product_name').change(function(){

		var product = $('#product_name').val();
		// console.log('produk ', {{ $products }});
		$.ajax({
			url: "get_product/"+product,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				// console.log(data);
				$('#price').val(data);
			}
		});
		$('#product_promotion_id').empty();
		$.ajax({
			url: "get_promotion_list/"+product,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				console.log(data);
				$.each(data.product_promotion, function(key, value){
					$('#product_promotion_id').append(`<option value="" hidden>Select Promotion</option>`);
					$('#product_promotion_id').append(`<option value="">Not Have Promotion</option>`);
					$('#product_promotion_id').append(`<option value="${value.id}">${value.promotion_name}</option>`);
					
					$('#add_product_promotion_id').append(`<option value="" hidden>Select Promotion</option>`);
					$('#add_product_promotion_id').append(`<option value="">Not Have Promotion</option>`);
					$('#add_product_promotion_id').append(`<option value="${value.id}">${value.promotion_name}</option>`);
				});
			}
		});
	});
});