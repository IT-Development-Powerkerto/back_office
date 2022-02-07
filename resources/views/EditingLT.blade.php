<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Edit Lead Tunelling</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link rel="icon" href="../img/favicon.png">
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<!-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
		<link href="{{ URL::asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!-- <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						<!--begin::Container-->
						<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
							<!--begin::Page title-->
							@include('layout/header/_base')


							@include('layout/_toolbar')
							<!--end::Page title=-->
							<!--begin::Wrapper-->
							<div class="d-flex d-lg-none align-items-center ms-n2 me-2">
								<!--begin::Logo-->
								    <img alt="Logo" src="../img/logo.png" class="h-40px" />
								<!--end::Logo-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Toolbar wrapper-->
							<!--begin::User-->
							<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
								<!--begin::Menu wrapper-->
								<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
									data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									@if(auth()->user()->image == null)
									    <img src="/assets/img/default.jpg" alt="" />
									@else
									    <img src={{auth()->user()->image }} alt="image" />
									@endif
								</div>

								@include('layout/topbar/partials/_user-menu')

								<!--end::Menu wrapper-->
							</div>
							<!--end::User -->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::details View-->
							<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
								<!--begin::Card header-->
								<div class="card-header cursor-pointer">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bolder m-0">Edit Lead Tunelling</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">
									<form class="form" action="{{ route('lead.update',['lead' => $lead->implode('id')]) }}" method="POST" enctype="multipart/form-data">
										@csrf
										@method('PATCH')
										<div class="card-body">
											<h1 class="pb-5">Data CS</h1>
										 	<div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Advertise</label>
												<div class="col-lg-3">
													<div class="input-group">
														<label type="text" class="form-control" placeholder="Full name">{{ old('advertiser') ?? $lead->implode('advertiser') }}</label>
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-users-cog" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled Advertise Name</span>
										  		</div>
												<label class="col-lg-1 col-form-label text-lg-right">Operator</label>
												<div class="col-lg-3">
													<div class="input-group">
														<label type="text" class="form-control" placeholder="your name">{{ old('operator') ?? $lead->implode('operator_name') }}</label>
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-user" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled CS Name</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right">Status</label>
												<div class="col-lg-3">
													<div class="input-group">
														<select class="form-control" name="status_id" id='status_id'>
															<option value="3" {{ $lead->implode('status_id')  == '3' ? 'selected': '' }} required>Waiting</option>
															<option value="4" {{ $lead->implode('status_id')  == '4' ? 'selected': '' }} required>Proccessing</option>
															<option value="5" {{ $lead->implode('status_id')  == '5' ? 'selected': '' }} required>Closing</option>
															<option value="6" {{ $lead->implode('status_id')  == '6' ? 'selected': '' }} required>Spam</option>
															<option value="7" {{ $lead->implode('status_id')  == '7' ? 'selected': '' }} required>Failed</option>
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-angle-down" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please Select Status</span>
												</div>
											</div>

											<div class="separator separator-dashed my-10"></div>

											<h1 class="pb-5">Data Order</h1>
											<div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Full Name</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="text" name="name" id="name" class="form-control" value="{{ old('client') ?? $lead->implode('client_name') }}" placeholder="Full name"/>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-user-friends" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter your full name</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right">Contact</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="text" name="whatsapp" id="whatsapp" class="form-control" value="{{ old('client') ?? $lead->implode('client_wa') }}" placeholder="Enter contact number"/>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-phone" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter Customer contact</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right">Address</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="text" name="address" id="address" class="form-control" value="{{ old('address') ?? $inputer->implode('address') }}" placeholder="Enter your address"/>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter your address</span>
												</div>
											</div>
										 	<div class="separator separator-dashed my-10"></div>
											 <div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Product</label>
												<div class="col-lg-3">
													<div class="input-group">
														<label type="text"class="form-control" id="product" placeholder="Product Name">{{ old('product_name') ?? $lead->implode('product_name') }}</label>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-box" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled Product Name</span>
										  		</div>
												<label class="col-lg-1 col-form-label text-lg-right">Quantity</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="number" placeholder="Quantity Product" min="0"  id="quantity" name="quantity" value="{{ old('quantity') ?? $lead->implode('quantity') }}" id="inputquantity" class="form-control" aria-describedby="quantityHelpInline"/>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-boxes" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter quantity</span>
										  		</div>
												<label class="col-lg-1 col-form-label text-lg-right">Price</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="number" placeholder="Enter price" min="0" id="price" name="price" value="{{ old('price') ?? $lead->implode('price') }}" id="inputprice" class="form-control" aria-describedby="priceHelpInline"/>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-money-bill-wave" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter price</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Promotion</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<select class="form-control" name="promotion_id" id="promotion_id">
                                                            <option value=""hidden>Select Promotion</option>
															<option value="">Not Have Promotion</option>
															@foreach ($promotion->where('product_name', $lead->implode('product_name')) as $promotion)
															<option value="{{$promotion->id}}" {{ $inputer->implode('promotion_id') == $promotion->id ? 'selected': ''}}>{{ $promotion->promotion_name }}</option>
															@endforeach
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-percent" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter promotion type</span>
													</div>
													<label class="col-lg-1 col-form-label text-lg-right mt-8">Product Promotion</label>
													<div class="col-lg-3 mt-8">
														<div class="input-group">
															<input type="number" value="{{ $inputer->implode('product_promotion') ?? 0 }}" name="product_promotion" id="product_promotion"  class="form-control" placeholder="Promotion Price" readonly/>
															<div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
														</div>
														<span class="form-text text-muted">Auto-Filled Promotion Price</span>
													</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Total Price</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<input type="number" value="{{ $inputer->implode('total_price') }}" name="total_price" id="total_price" class="form-control" placeholder="Total Price" readonly/>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled Total</span>
												</div>
											</div>
										 	<div class="separator separator-dashed my-10"></div>
										 	<div class="form-group row">

												<label class="col-lg-1 col-form-label text-lg-right">Weight (gram)</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="number" min="1" class="form-control" value="{{ old('product_weight') ?? $inputer->implode('product_weight') }}" name="weight" id="weight" placeholder="Weight" />
														<div class="input-group-append"><span class="input-group-text"><i class="las la-weight-hanging" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please input the product wieght</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right">Warehouse</label>
												<div class="col-lg-3">
													<div class="input-group">
														<select class="form-control" value="{{ old('warehouse') ?? $inputer->implode('warehouse') }}" name="warehouse" id="warehouse" >
															<option value="" hidden>Warehouse</option>
															<option value="Cilacap" {{ (old('warehouse') ?? $inputer->implode('warehouse') ) == 'Cilacap' ? 'selected': '' }} required>Cilacap</option>
															<option value="Kosambi" {{ (old('warehouse') ?? $inputer->implode('warehouse') ) == 'Kosambi' ? 'selected': '' }} required>Kosambi</option>
															<option value="Tandes.Sby" {{ (old('warehouse') ?? $inputer->implode('warehouse') ) == 'Tandes.Sby' ? 'selected': '' }} required>Tandes.Sby</option>
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-warehouse" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please select an warehouse</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right">Destination Province</label>
												<div class="col-lg-3">
													<div class="input-group">
														<select class="form-control" id="province" name="province" >
															<option value="" hidden>Destination Province</option>
															@foreach ($all_province as $all_province)
																<option value="{{ $all_province['province_id'] }}" {{ $inputer->implode('province_id') == $all_province['province_id'] ? 'selected': ''}}>{{ $all_province['province'] }}</option>
															@endforeach
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please select an destination province</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Destination City</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<select class="form-control" id="city" name="city" >
															<option value="" hidden>Destination City</option>
															@isset($all_city)
															@foreach ($all_city as $all_city)
															<option value="{{ $all_city['city_id'] }}" {{ $inputer->implode('city_id') == $all_city['city_id'] ? 'selected': ''}}>{{ $all_city['type'] }} {{ $all_city['city_name'] }}</option>
															@endforeach

															@endisset

														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please select an destination city</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Destination Subdistrict</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<select class="form-control" id="subdistrict" name="subdistrict">
															<option value="" hidden>Destination Subdistrict</option>
															@isset($all_subdistrict)

																@foreach ($all_subdistrict as $all_subdistrict)
																<option value="{{ $all_subdistrict['subdistrict_id'] }}" {{ $inputer->implode('subdistrict_id') == $all_subdistrict['subdistrict_id'] ? 'selected': ''}}>{{ $all_subdistrict['subdistrict_name'] }}</option>
																@endforeach
															@endisset

														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please select an destination subdistrict</span>
												</div>
										  		<label class="col-lg-1 col-form-label text-lg-right mt-8">Courier</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<select class="form-control" value="{{ old('courier') ?? $inputer->implode('courier') }}" name="courier" id="courier">
															<option value="" hidden>Courier Type</option>
															<option value="POS" {{ (old('courier') ?? $inputer->implode('courier') ) == 'POS' ? 'selected': '' }} required>POS</option>
															<option value="JNE OKE" {{ (old('courier') ?? $inputer->implode('courier') ) == 'JNE OKE' ? 'selected': '' }} required>JNE OKE</option>
															<option value="JNE REG" {{ (old('courier') ?? $inputer->implode('courier') ) == 'JNE REG' ? 'selected': '' }} required>JNE REG</option>
															<option value="JNT" {{ (old('courier') ?? $inputer->implode('courier') ) == 'JNT' ? 'selected': '' }} required>JNT</option>
															<option value="Ninja" {{ (old('courier') ?? $inputer->implode('courier') ) == 'Ninja' ? 'selected': '' }} required>Ninja</option>
															<option value="Sicepat" {{ (old('courier') ?? $inputer->implode('courier') ) == 'Sicepat' ? 'selected': '' }} required>Sicepat</option>
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-truck-moving" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">JNE OKE & JNE REG not available for COD payment.</span>
											  	</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Shipping Promotion</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<input type="number" class="form-control" placeholder="Shipping Promotion" id="shipping_promotion" name="shipping_promotion" value="{{ $inputer->implode('shipping_promotion') ?? 0 }}" readonly>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled Total</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Shipping Price</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<input type="number" class="form-control" placeholder="Total Shipping Price" id="shipping_price" name="shipping_price" value="{{ $inputer->implode('shipping_price') ?? '' }}" readonly>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled Total</span>
												</div>
                                                <label class="col-lg-1 col-form-label text-lg-right mt-8">Payment</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<select class="form-control" value="{{ old('payment_method') ?? $inputer->implode('payment_method') }}" name="payment_method" id="payment_method">
															<option value="" hidden>Payment Method</option>
															<option value="COD" {{ (old('payment_method') ?? $inputer->implode('payment_method') ) == 'COD' ? 'selected': '' }} required>COD</option>
															<option value="Transfer" {{ (old('payment_method') ?? $inputer->implode('payment_method') ) == 'Transfer' ? 'selected': '' }} required>Transfer</option>
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-file-invoice-dollar" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Select an payment method.</span>
											  	</div>
										 	</div>
											<div class="separator separator-dashed my-10"></div>
											<div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Grand Total</label>
												<div class="col-lg">
													<input name="total_payment" id="total_payment" class="form-control" placeholder="Total Payment" value="{{ $inputer->implode('total_payment') ?? '' }}" readonly>
													<span class="form-text text-muted">Total Price + Courier</span>
												</div>
											</div>
											<div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Upload The Proof</label>
												<div class="col-lg">
													<input class="form-control" type="file" id="image" name="image" id="formFileMultiple" multiple id>
													<span class="form-text text-muted">Please upload the proof if you closing</span>
												</div>
											</div>

										</div>
										{{ csrf_field() }}
										<div class="card-footer">
											<div class="row">
												<div class="col-lg-5"></div>
												<div class="col-lg-7">
													<input type="submit" class="btn btn-primary" value="Save">
                                                    <a type="button" class="btn btn-secondary" href="/dashboard">Cancel</a>
												</div>
											</div>
										</div>
									</form>
									
								</div>
								<!--end::Card body-->
							</div>
							<!--end::details View-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Page-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-xxl d-flex flex-column flex-md-row flex-stack">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-gray-400 fw-bold me-1">Created by</span>
								<a href="https://powerkerto.com" target="_blank" class="text-muted text-hover-primary fw-bold me-2 fs-6">Powerkerto</a>
							</div>
							<!--end::Copyright-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="../assets/plugins/global/plugins.bundle.js"></script>
		<script src="../assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="../assets/js/custom/widgets.js"></script>
		<!--end::Page Custom Javascript-->
		<script>
			$(document).ready(function(){
				$('#province').on('change', function(){
					let province_id = $(this).val();
					if(province_id){
						$.ajax({
							url: "/city/"+province_id,
							type: 'GET',
							dataType: 'json',
							success: function(data){
								$('#city').empty();
								$.each(data, function(key, value){
									$('#city').append('<option value="'+value.city_id+'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
								});
							}
						});
					}else {
						$('#city').empty();
					}
				});
			});

		</script>
		<script>
			$(document).ready(function(){
				$('#city').on('change', function(){
					let city_id = $(this).val();
					if(city_id){
						$.ajax({
							url: "/subdistrict/"+city_id,
							type: 'GET',
							dataType: 'json',
							success: function(data){
								$('#subdistrict').empty();
								$.each(data, function(key, value){
									$('#subdistrict').append('<option value="'+value.subdistrict_id+'">' + value.subdistrict_name + '</option>');
								});
							}
						});
					}else {
						$('#subdistrict').empty();
					}
				});
			});
		</script>
		<script>
			$(function(){
				$("#clipboard").hide();
				$('#copy').click(function(){
					var name = $('#name').val();
					var address = $('#address').val();
					var province = $('#province').find(":selected").text();
					var city = $('#city').find(":selected").text();
					var subdistrict = $('#subdistrict').find(":selected").text();
					var whatsapp = $('#whatsapp').val();
					var product = $('#product').text();
					var quantity = $('#quantity').val();
					var courier =  $('#courier').val();
					var method = $('#payment_method').val();
					var promotion = $('#promotion_id').find(":selected").text();
					var confirm_shipping_promotion =  $('#shipping_promotion').val();
					var confirm_shipping_price =  $('#shipping_price').val();
					var confirm_total_payment =  $('#total_payment').val();
					var warehouse = $('#warehouse').val();
					var text = `Nama Pemesan: ${name}\nAlamat: ${address}\nProvinsi: ${province}\nKota/Kabupaten: ${city}\nKecamatan: ${subdistrict}\nNo. Tlp : ${whatsapp}\nProduk yang dipesan: ${product}\nJumlah Pesanan: ${quantity}\nKurir: ${courier}\nMetode: ${method}`;
					$("#clipboard").val(text).show().select();
					document.execCommand("copy");
					$("#clipboard").hide();
					alert('copied to clipboard');
					return false
				});
			});
		</script>
		{{-- <script>
			$(document).ready(function(){
				$('#quantity, #price, #promotion_id').on('change', function(){
					var quantity = $('#quantity').val();
					var price = $('#price').val();
					var promotion_id = $('#promotion_id').val();
					if(promotion_id){
						$.ajax({
							url: "get_promotion/"+promotion_id,
							type: "GET",
							dataType: "json",
							success: function(promotion){
								$('#product_promotion').val(parseInt(promotion.product_promotion));
								$('#shipping_promotion').val(parseInt(promotion.shipping_promotion));
								var total = (price * quantity) - parseInt(promotion.product_promotion);
								$('#total_price').val(total);
								$('#total_payment').val(total+parseInt(promotion.shipping_promotion));
							}
						});
					}else{
						$('#product_promotion').val(0);
						$('#shipping_promotion').val(0);
						var total = (price * quantity);
						$('#total_price').val(total);
						$('#total_payment').val(total+parseInt(promotion.shipping_promotion));
					}
				});
			});
		</script> --}}
        <script>
			$(document).ready(function(){
				$('#quantity, #price, #promotion_id').on('change', function(){
					var quantity = $('#quantity').val();
					var price = $('#price').val();
					var promotion_id = $('#promotion_id').val();
					if(promotion_id){
						$.ajax({
							url: "get_promotion/"+promotion_id,
							type: "GET",
							dataType: "json",
							success: function(promotion){
								$('#product_promotion').val(parseInt(promotion.product_promotion));
								$('#shipping_promotion').val(parseInt(promotion.shipping_promotion));
								var total = (price * quantity);
								$('#total_price').val(total);
								//$('#total_payment').val(total+parseInt(promotion.shipping_promotion));
							}
						});
					}else{
						$('#product_promotion').val(0);
						$('#shipping_promotion').val(0);
						var total = (price * quantity);
						$('#total_price').val(total);
						//$('#total_payment').val(total+parseInt(promotion.shipping_promotion));
					}
				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$('#payment_method, #courier, #promotion_id').on('change', function(){
					var quantity = $('#quantity').val();
					var price = $('#price').val();
					var promotion_id = $('#promotion_id').val();
					var shipping_price = $('#shipping_price').val();
					var payment_method = $('#payment_method').val();
					var courier = $('#courier').val();

					if(promotion_id)
                    {
						$.ajax({
							url: "get_promotion/"+promotion_id,
							type: "GET",
							dataType: "json",
							success: function(promotion){
								$('#product_promotion').val(parseInt(promotion.product_promotion));
								$('#shipping_promotion').val(parseInt(promotion.shipping_promotion));
								if(courier === 'Ninja' && payment_method === 'COD'){
                                    var ongkir = parseInt(shipping_price);
									var total_price = (parseInt(price) * parseInt(quantity));
									if (total_price >= 120000){
										if (ongkir > 50000){
											ongkir -= 25000;
										}
										else{
											ongkir = ongkir*0.5;
										}
									}
									
									var admin = (total_price + ongkir) * 0.025;
									if (ongkir <= parseInt(promotion.shipping_promotion)){
										var total_ongkir = 0;
									}
									else{
										var total_ongkir = ongkir - parseInt(promotion.shipping_promotion);
									}
									var total_payment = total_price + total_ongkir + admin - parseInt(promotion.product_promotion);
									$('#total_payment').val(parseInt(total_payment));
								}
                                else if(courier === 'Sicepat' && payment_method === 'COD'){
                                    var ongkir = parseInt(shipping_price);
									var total_price = (parseInt(price) * parseInt(quantity));
									if (total_price >= 120000){
										if (ongkir > 50000){
											ongkir -= 25000;
										}
										else{
											ongkir = ongkir*0.5;
										}
									}
									var admin = (total_price + ongkir)*0.030;
									if(admin < 2000){
										admin = 2000;
									}
									if (ongkir <= parseInt(promotion.shipping_promotion)){
										var total_ongkir = 0;
									}
									else{
										var total_ongkir = ongkir - parseInt(promotion.shipping_promotion);
									}
									var total_payment = total_price + total_ongkir + admin - parseInt(promotion.product_promotion);
									$('#total_payment').val(parseInt(total_payment));
                                }
                                else if(courier === 'JNT' && payment_method === 'COD'){
                                    var ongkir = parseInt(shipping_price);
									var total_price = (parseInt(price) * parseInt(quantity));
									if (total_price >= 120000){
										if (ongkir > 50000){
											ongkir -= 25000;
										}
										else{
											ongkir = ongkir*0.5;
										}
									}
									var admin = (total_price + ongkir)*0.030;
									if(admin < 5000){
										admin = 5000;
									}
									if (ongkir <= parseInt(promotion.shipping_promotion)){
										var total_ongkir = 0;
									}
									else{
										var total_ongkir = ongkir - parseInt(promotion.shipping_promotion);
									}
									var total_payment = total_price + total_ongkir + admin - parseInt(promotion.product_promotion);
									$('#total_payment').val(parseInt(total_payment));
                                }
                                else if(payment_method == "Transfer"){
									var ongkir = parseInt(shipping_price);
									
									var total_price = (parseInt(price) * parseInt(quantity));
									if (total_price >= 120000){
										if (ongkir > 50000){
											ongkir -= 25000;
										}
										else{
											ongkir = ongkir*0.5;
										}
									}
									if (ongkir <= parseInt(promotion.shipping_promotion)){
										var total_ongkir = 0;
									}
									else{
										var total_ongkir = ongkir - parseInt(promotion.shipping_promotion);
									}
									var total_payment = total_price + total_ongkir - parseInt(promotion.product_promotion);
									$('#total_payment').val(parseInt(total_payment));
								}
							}
						});
					}
                    else{
						if(courier === 'Ninja' && payment_method === 'COD'){
							var ongkir = parseInt(shipping_price);
                            var total_price = (parseInt(price) * parseInt(quantity));
							if (total_price >= 120000){
								if (ongkir > 50000){
									ongkir -= 25000;
								}
								else{
									ongkir = ongkir*0.5;
								}
							}
                            var admin = (total_price + ongkir)*0.025;
							var total_payment = total_price + ongkir + admin;
                            $('#total_payment').val(parseInt(total_payment));
						}
                        else if(courier === 'Sicepat' && payment_method === 'COD'){
                            var ongkir = parseInt(shipping_price);
                            var total_price = (parseInt(price) * parseInt(quantity));
							if (total_price >= 120000){
								if (ongkir > 50000){
									ongkir -= 25000;
								}
								else{
									ongkir = ongkir*0.5;
								}
							}
                            var admin = (total_price + ongkir)*0.030;
                            if(admin < 2000){
                                admin = 2000;
                            }
                            var total_payment = total_price + ongkir + admin;
                            $('#total_payment').val(parseInt(total_payment));
						}
                        else if(courier === 'JNT' && payment_method === 'COD'){
                            var ongkir = parseInt(shipping_price);
                            var total_price = (parseInt(price) * parseInt(quantity));
							if (total_price >= 120000){
								if (ongkir > 50000){
									ongkir -= 25000;
								}
								else{
									ongkir = ongkir*0.5;
								}
							}
                            var admin = (total_price + ongkir)*0.030;
                            if(admin < 5000){
                                admin = 5000;
                            }
                            var total_payment = total_price + ongkir + admin;
                            $('#total_payment').val(parseInt(total_payment));
						}
                        else if(payment_method == "Transfer"){
                            var ongkir = parseInt(shipping_price);
                            var total_price = (parseInt(price) * parseInt(quantity));
							if (total_price >= 120000){
								if (ongkir > 50000){
									ongkir -= 25000;
								}
								else{
									ongkir = ongkir*0.5;
								}
							}
                            var total_payment = total_price + ongkir;
                            $('#total_payment').val(parseInt(total_payment));
                        }
					}

					// var promotion_id = $('#promotion_id').val();
					// if(promotion_id){
					// 	$.ajax({
					// 		url: "get_promotion/"+promotion_id,
					// 		type: "GET",
					// 		dataType: "json",
					// 		success: function(promotion){
					// 			$('#product_promotion').val(parseInt(promotion.product_promotion));
					// 			$('#shipping_promotion').val(parseInt(promotion.shipping_promotion));
					// 			var total = (price * quantity) - parseInt(promotion.product_promotion);
					// 			$('#total_price').val(total);
					// 			$('#total_payment').val(total+parseInt(promotion.shipping_promotion));
					// 		}
					// 	});
					// }else{
					// 	$('#product_promotion').val(0);
					// 	$('#shipping_promotion').val(0);
					// 	var total = (price * quantity);
					// 	$('#total_price').val(total);
					// 	$('#total_payment').val(total+parseInt(promotion.shipping_promotion));
					// }
				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$('#weight, #warehouse, #province, #city, #subdistrict, #courier, #shipping_promotion').on('change', function(){
					var weight = $("#weight").val();
					var warehouse = $("#warehouse").val();
					var province = $("#province").val();
					var city = $("#city").val();
					var subdistrict = $("#subdistrict").val();
					var	courier = $("#courier").val();
					var courier = courier.toLowerCase();
					var shipping_promotion = $("#shipping_promotion").val();
					if(warehouse == 'Cilacap'){
						document.getElementById("warehouse").setAttribute('class', 'form-control');
						var origin = 1442;
					}else if(warehouse == 'Kosambi'){
						document.getElementById("warehouse").setAttribute('class', 'form-control');
						var origin = 6278;
					}else if(warehouse == 'Tandes.Sby'){
						document.getElementById("warehouse").setAttribute('class', 'form-control');
						var origin = 6156;
					}else{
						document.getElementById("warehouse").setAttribute('class', 'form-control is-invalid');
					}

					if(subdistrict == ""){
						document.getElementById("subdistrict").setAttribute('class', 'form-control is-invalid');
					}else{
						document.getElementById("subdistrict").setAttribute('class', 'form-control');
					}
					if(weight == ""){
						document.getElementById("weight").setAttribute('class', 'form-control is-invalid');
					}else{
						document.getElementById("weight").setAttribute('class', 'form-control');
					}
					if(courier == ""){
						document.getElementById("courier").setAttribute('class', 'form-control is-invalid');
					}else{
						document.getElementById("courier").setAttribute('class', 'form-control');
					}
					if(warehouse != "" && subdistrict != "" && weight != "" && courier != ""){

						$.ajax({
							type: 'GET',
							url: "{{ route('ongkir') }}",
							data: {'origin': origin, 'destination': subdistrict, 'weight': weight, 'courier': courier},
							dataType: 'json',
							success: function(data){
                                shipping_price.value = data;
								// var total_shipping_price = data-shipping_promotion;
								// if(total_shipping_price <= 0){
								// 	shipping_price.value = 0;
								// }else{
								// 	shipping_price.value = total_shipping_price;
								// }
							}
						});
					}
				});
			});
		</script>
        <script>
            $(document).ready(function(){
                $('#status_id, #address, #name, #whatsapp, #quantity, #weight').on('change', function(){
                    if($('#status_id').val() == 5){
                        if($('#address').val() == ""){
                            document.getElementById("address").setAttribute('class', 'form-control is-invalid');
                        }else {
                            document.getElementById("address").setAttribute('class', 'form-control');
                        }
                        if($('#name').val() == ""){
                            document.getElementById("name").setAttribute('class', 'form-control is-invalid');
                        }else {
                            document.getElementById("name").setAttribute('class', 'form-control');
                        }
                        if($('#whatsapp').val() == ""){
                            document.getElementById("whatsapp").setAttribute('class', 'form-control is-invalid');
                        }else {
                            document.getElementById("whatsapp").setAttribute('class', 'form-control');
                        }
                        if($('#quantity').val() == ""){
                            document.getElementById("quantity").setAttribute('class', 'form-control is-invalid');
                        }else {
                            document.getElementById("quantity").setAttribute('class', 'form-control');
                        }
                        if($('#weight').val() == ""){
                            document.getElementById("weight").setAttribute('class', 'form-control is-invalid');
                        }else {
                            document.getElementById("weight").setAttribute('class', 'form-control');
                        }
                    }
                });
            });
        </script>
		{{--  <script>
			$(document).ready(function(){
				var weight = $("#weight").val();
					var warehouse = $("#warehouse").val();
					var province = $("#province").val();
					var city = $("#city").val();
					var subdistrict = $("#subdistrict").val();
					var	courier = $("#courier").val();
					var courier = courier.toLowerCase();
					var shipping_promotion = $('#shipping_promotion').val();
				$('#total_price, #shipping_promotion, #shipping_price, #promotion_id').on('change', function(){
					var total_price = $('#total_price').val();
					var shipping_price = $('#shipping_price').val();

					$.ajax({
						type: 'GET',
						url: "{{ route('ongkir') }}",
						data: {'origin': origin, 'destination': subdistrict, 'weight': weight, 'courier': courier},
						dataType: 'json',
						success: function(data){
							var total_shipping_price = data-shipping_promotion;
							if(total_shipping_price <= 0){
								shipping_price.value = 0;
							}else{
								shipping_price.value = total_shipping_price;
							}
						}
					});
					var total_payment = parseInt(total_price) + parseInt(shipping_price);
					$('#total_payment').val(total_payment);
				});
			});
		</script>  --}}
		<script>
			// Class definition
			var KTSelect2 = function() {
			// Private functions
			var demos = function() {
			// basic
			$('#kt_select2_1').select2({
			placeholder: "Select a state"
			});

			// nested
			$('#kt_select2_2').select2({
			placeholder: "Select a state"
			});

			// multi select
			$('#kt_select2_3').select2({
			placeholder: "Select a state",
			});

			// basic
			$('#kt_select2_4').select2({
			placeholder: "Select a state",
			allowClear: true
			});

			// loading data from array
			var data = [{
			id: 0,
			text: 'Enhancement'
			}, {
			id: 1,
			text: 'Bug'
			}, {
			id: 2,
			text: 'Duplicate'
			}, {
			id: 3,
			text: 'Invalid'
			}, {
			id: 4,
			text: 'Wontfix'
			}];

			$('#kt_select2_5').select2({
			placeholder: "Select a value",
			data: data
			});

			// loading remote data

			function formatRepo(repo) {
			if (repo.loading) return repo.text;
			var markup = "<div class='select2-result-repository clearfix'>" +
				"<div class='select2-result-repository__meta'>" +
				"<div class='select2-result-repository__title'>" + repo.full_name + "</div>";
			if (repo.description) {
				markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
			}
			markup += "<div class='select2-result-repository__statistics'>" +
				"<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo.forks_count + " Forks</div>" +
				"<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
				"<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
				"</div>" +
				"</div></div>";
			return markup;
			}

			function formatRepoSelection(repo) {
			return repo.full_name || repo.text;
			}

			$("#kt_select2_6").select2({
			placeholder: "Search for git repositories",
			allowClear: true,
			ajax: {
				url: "https://api.github.com/search/repositories",
				dataType: 'json',
				delay: 250,
				data: function(params) {
				return {
				q: params.term, // search term
				page: params.page
				};
				},
				processResults: function(data, params) {
				// parse the results into the format expected by Select2
				// since we are using custom formatting functions we do not need to
				// alter the remote JSON data, except to indicate that infinite
				// scrolling can be used
				params.page = params.page || 1;

				return {
				results: data.items,
				pagination: {
				more: (params.page * 30) < data.total_count
				}
				};
				},
				cache: true
			},
			escapeMarkup: function(markup) {
				return markup;
			}, // let our custom formatter work
			minimumInputLength: 1,
			templateResult: formatRepo, // omitted for brevity, see the source of this page
			templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
			});

			// custom styles

			// tagging support
			$('#kt_select2_12_1, #kt_select2_12_2, #kt_select2_12_3, #kt_select2_12_4').select2({
			placeholder: "Select an option",
			});

			// disabled mode
			$('#kt_select2_7').select2({
			placeholder: "Select an option"
			});

			// disabled results
			$('#kt_select2_8').select2({
			placeholder: "Select an option"
			});

			// limiting the number of selections
			$('#kt_select2_9').select2({
			placeholder: "Select an option",
			maximumSelectionLength: 2
			});

			// hiding the search box
			$('#kt_select2_10').select2({
			placeholder: "Select an option",
			minimumResultsForSearch: Infinity
			});

			// tagging support
			$('#kt_select2_11').select2({
			placeholder: "Your Destination",
			tags: true
			});

			// disabled results
			$('.kt-select2-general').select2({
			placeholder: "Select an option"
			});
			}

			var modalDemos = function() {
			$('#kt_select2_modal').on('shown.bs.modal', function () {
			// basic
			$('#kt_select2_1_modal').select2({
				placeholder: "Select a state"
			});

			// nested
			$('#kt_select2_2_modal').select2({
				placeholder: "Select a state"
			});

			// multi select
			$('#kt_select2_3_modal').select2({
				placeholder: "Select a state",
			});

			// basic
			$('#kt_select2_4_modal').select2({
				placeholder: "Select a state",
				allowClear: true
			});
			});
			}

			// Public functions
			return {
			init: function() {
			demos();
			modalDemos();
			}
			};
			}();

			// Initialization
			jQuery(document).ready(function() {
			KTSelect2.init();
			});
		</script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
