<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Create Promotion</title>
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
									@if(is_null(Auth()->user()->image))
									<img src="/assets/img/default.jpg" alt="" />
									@else
									<img src={{ Auth()->user()->image }} alt="image" />
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
					@if(session()->has('success'))
							<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session('success') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif

					@if(session()->has('error'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							{{ session('error') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::details View-->
							<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
								<!--begin::Card header-->
								<div class="card-header cursor-pointer">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bolder m-0">Create Promotion</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">
									<form action="{{ route('promotion.index') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body shadow-sm">
                                            <div class="form-group mt-5">
                                                <label for="inputProgress" class="col-form-label">Promotion Type</label>
                                                <div class="dropdown" required>
                                                    <select name="promotion_type" id="promotion_type" class="form-control">
                                                        <option hidden>Promotion Type</option>
                                                        <option value="Product Price" required>Product Price</option>
                                                        <option value="Shipping Cost" required>Shipping Cost</option>
                                                        <option value="Product Price & Shipping Cost" required>Product & Shipping Cost</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5">
                                                <label for="inputProgress" class="col-form-label">Product Type</label>
                                                <div class="dropdown" required>
                                                    <select name="product_name" id="product_name" class="form-control">
                                                        <option hidden>Product Name</option>
                                                        <option value="All" required>All</option>
                                                        @foreach ($product as $product)
															<option value="{{$product->name}}" required>{{$product->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5">
                                                <label class="col-form-label">Promotion Name</label>
                                                <input type="text" class="form-control form-control" name="promotion_name" id="promotion_name" placeholder="Enter Promotion name" required/>
                                                <span class="form-text text-muted">Please enter name promotion with the rules ex: Generos Subsidi Ongkir Min. Belanja 120rb</span>
                                            </div>
                                            <div class="form-group mt-5">
                                                <label class="col-form-label">Promotion Product Price</label>
												<span class="form-text text-muted"><a href="#" data-bs-toggle="modal" data-bs-target="#modal-help-product">help</a></span>
												<div class="modal fade" tabindex="-1" id="modal-help-product">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Promotion Product Rules</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<ol>
																	<p>There are 3 possibilities that happen</p>
																	<li>if you only fill the fixed promotion then </li>
																	<p>product price - fixed promotion</p>
																	<li>if you only fill precentage promotion then</li>
																	<p>product price - precentage promotion</p>
																	<p>	Example : <br>
																		Product price = 100.000 <br>
																		Precentage promo = 50% -> 100.000*50%= 50.000 <br>
																		Product price - precentage promotion = 100.000 - 10.000 = 90.000</p>
																	<li>if you fill both (fixed promotion & precentage promotion) there are 2 possibilities : </li>
																	<ul>
																		<li>if fixed promotion > precentage promotion -> precentage promotion</li>
																		<li>if fixed promotion < precentage promotion -> fixed promotion</li>
																	</ul>
																	<p> Example 1 : <br>
																		Product price = 100.000 <br>
																		Fixed promo = 10.000 <br>
																		Precentage promo = 50% -> 100.000*50%= 50.000 (fixed promotion < precentage promotion) <br>
																		Product price - fixed promotion = 100.000 - 10.000 = 90.000 </p>
																	<br>
																	<p> Example 2 : <br>
																		Product price = 100.000 <br>
																		Fixed promo = 60.000 <br>
																		Precentage promo = 50% -> 100.000*50%= 50.000 (fixed promotion > precentage promotion) <br>
																		Product price - precentage promotion = 100.000 - 50.000 = 50.000</p>
																</ol>
															</div>
														</div>
													</div>
												</div>
                                                <div class="input-group input-group-lg">
                                                    <div class="input-group-prepend"><span class="input-group-text" style="font-size: 18px">IDR</span></div>
                                                    <input type="number" min="0" value="0" name="promotion_product_price" id="promotion_product_price" onchange="calculate()" class="form-control form-control" placeholder="0" required/>
                                                    <div class="input-group-prepend"><span class="input-group-text" style="font-size: 18px">%</span></div>
                                                    <input type="number" min="0" max="100" value="0" name="promotion_product_percent" id="promotion_product_percent" class="form-control form-control" placeholder="0" required/>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5">
                                                <label class="col-form-label">Promotion Shippment Cost</label>
												<span class="form-text text-muted"><a href="#" data-bs-toggle="modal" data-bs-target="#modal-help-shippment">help</a></span>
												<div class="modal fade" tabindex="-1" id="modal-help-shippment">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Promotion Shippment Rules</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<ol>
																	<p>There are 3 possibilities that happen</p>
																	<li>if you only fill the fixed promotion then </li>
																	<p>shipment cost - fixed promotion</p>
																	<li>if you only fill precentage promotion then</li>
																	<p>shipment cost - precentage promotion</p>
																	<p> Example : <br>
																		shipment cost = 20.000 <br> 
																		Precentage promo = 10% -> 20.000*10%= 2.000 <br>
																		shipment cost - precentage promotion = 20.000 - 2.000 = 18.000</p>
																	<li>if you fill both (fixed promotion & precentage promotion) there are 2 possibilities : </li>
																	<ul>
																		<li>if fixed promotion > precentage promotion -> precentage promotion</li>
																		<li>if fixed promotion < precentage promotion -> fixed promotion</li>
																	</ul>
																	<p> Example 1 : <br>
																		shipment cost = 30.000 <br>
																		Fixed promo = 10.000 <br>
																		Precentage promo = 50% -> 30.000*50%= 15.000 (fixed promotion < precentage promotion) <br>
																		Shipment price - fixed promotion = 30.000 - 10.000 = 20.000</p>
																	<br>
																	<p> Example 2 : <br>
																		shipment cost = 30.000 <br>
																		Fixed promo = 20.000 <br>
																		Precentage promo = 50% -> 30.000*50%= 15.000 (fixed promotion > precentage promotion) <br>
																		Shipment price - precentage promotion = 30.000 - 20.000 = 10.000</p>
																</ol>
															</div>
														</div>
													</div>
												</div>
                                                <div class="input-group input-group-lg">
                                                    <div class="input-group-prepend"><span class="input-group-text" style="font-size: 18px">IDR</span></div>
                                                    <input type="text" min="0" value="0" name="promotion_shippment_cost" id="promotion_shippment_cost" onchange="calculate(), numberFormat($this.value)" class="form-control form-control" placeholder="0" required/>
                                                    <div class="input-group-prepend"><span class="input-group-text" style="font-size: 18px">%</span></div>
                                                    <input type="number" min="0" value="0" max="100" name="promotion_shippment_percent" id="promotion_shippment_percent" onchange="calculate(), numberFormat($this.value)" class="form-control form-control" placeholder="0" required/>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5">
                                                <label class="col-form-label">Total Promotion</label>
                                                <div class="input-group input-group-lg">
                                                    <div class="input-group-prepend"><span class="input-group-text" style="font-size: 18px">IDR</span></div>
                                                    <input type="number" min="0" name="total_promotion" id="total_promotion" class="form-control form-control" placeholder="0" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                            <a type="button" class="btn btn-secondary" href="/dashboard">Cancel</a>
                                        </div>
                                    </form>
                                    @include('partials/widgets/tables/_widget-4')
								</div>
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
            $(document).ready(function() {
                $('#event_id').on('change', function() {
                    var eventId = $(this).val();
                    if(eventId) {
                        $.ajax({
                            url: '/getEvent/'+eventId,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data)
                        });
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#product_id').on('change', function() {
                    var productId = $(this).val();
                    if(productId) {
                        $.ajax({
                            url: '/getProduct/'+productId,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data)
                        });
                    }
                });
            });
        </script>
        <script>
            $(function () {
                var $src = $('#product_name'),
                    $dst = $('#promotion_name');
                    $src.on('input', function () {
                        $dst.val($src.val());
                    });
            });
        </script>
        <script type="text/javascript">
			function calculate(){
				{{--  var quantity = parseInt(document.getElementById('quantity').value);  --}}

				var product_price = parseInt(document.getElementById('promotion_product_price').value);
                var shippment_cost = parseInt(document.getElementById('promotion_shippment_cost').value);

				var total = product_price + shippment_cost;

				var total_promotion = document.getElementById('total_promotion');
				total_promotion.value = total;
			}
		</script>
		{{--  <script>
			$(function(){
				$('#promotion_shippment_cost').change(function(){
					var x = $('#promotion_shippment_cost').val()
					{{--  x = parseInt(x);  --}}
					var num = x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
					$('#promotion_shippment_cost').val(num); 
				});
			});
		</script>  --}}
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
