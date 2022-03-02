$(function(){
	$('#product_name').change(function(){

		var product = $('#product_name').val();
		// console.log('produk ', {{ $products }});
		$.ajax({
			url: "get_product/"+product,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				// console.log(data[0]);
				$('#price').val(data[0]);
			}
		});
	});
});
// $(function(){
// 	var product_id = $('#product').val();
// 	$.ajax({
// 		url: 'get_promotion_list/'+product_id,
// 		type: 'GET',
// 		dataType: 'json',
// 		success: function(data){
// 			console.log(data);
// 			$.each(data, function(key, value){
// 				$('#product_promotion_id').append('<option value="'+value.id+'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
// 			});
// 		}
// 	});
// })
// $(function(){
// 	$('#product').on('change',function(){
// 		var product_id = $('#product').val();
// 		$.ajax({
// 			url: 'get_promotion_list/'+product_id,
// 			type: 'GET',
// 			dataType: 'json',
// 			success: function(data){
// 				console.log(data);
// 				// $.each(data, function(key, value){
// 				// 		$('#product_promotion_id').append('<option value="'+value.city_id+'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
// 				// 	});
// 			}
// 		});
// 	});
// });