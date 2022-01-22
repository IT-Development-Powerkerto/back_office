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
									<form class="form" action="{{ route('lead.update',['lead' => $lead->implode('id')]) }}" method="POST">
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
														<select class="form-control" name="status_id">
															<option value="3" {{ (old('status_id') ?? $lead->implode('status_id') ) == '3' ? 'selected': '' }} required>Waiting</option>
															<option value="4" {{ (old('status_id') ?? $lead->implode('status_id') ) == '4' ? 'selected': '' }} required>Proccessing</option>
															<option value="5" {{ (old('status_id') ?? $lead->implode('status_id') ) == '5' ? 'selected': '' }} required>Closing</option>
															<option value="6" {{ (old('status_id') ?? $lead->implode('status_id') ) == '6' ? 'selected': '' }} required>Spam</option>
															<option value="7" {{ (old('status_id') ?? $lead->implode('status_id') ) == '7' ? 'selected': '' }} required>Failed</option>
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
														<input type="text" name="name" class="form-control" value="{{ old('client') ?? $lead->implode('client_name') }}" placeholder="Full name"/>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-user-friends" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter your full name</span>
										  		</div>
												<label class="col-lg-1 col-form-label text-lg-right">Contact</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="text" name="whatsapp" class="form-control" value="{{ old('client') ?? $lead->implode('client_wa') }}" placeholder="Enter contact number"/>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-phone" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter Customer contact</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right">Address</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="text" name="address" class="form-control" value="{{ old('address') ?? $inputer->implode('address') }}" placeholder="Enter your address"/>
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
														<label type="text"class="form-control" placeholder="Product Name">{{ old('operator') ?? $lead->implode('product_name') }}</label>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-box" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled Product Name</span>
										  		</div>
												<label class="col-lg-1 col-form-label text-lg-right">Quantity</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="number" placeholder="Quantity Product" min="0" onchange="calculate('#promotion_name'.value)" id="quantity" name="quantity" value="{{ old('quantity') ?? $lead->implode('quantity') }}" id="inputquantity" class="form-control" aria-describedby="quantityHelpInline"/>
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
														<select class="form-control" name="promotion_name" id="promotion_name" onchange="calculate(this.value)">
															<option value="0">Not Have Promotion</option>
															@foreach ($promotion as $promotion)
																<option value="{{$promotion->total_promotion}}">{{ $promotion->promotion_name }}</option>
															@endforeach
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-percent" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter promotion type</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Promotion Price</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<input type="number" name="total_price" id="total_price" class="form-control" placeholder="Promotion Price" disabled/>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled Promotion Price</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Total Price</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<input type="number" name="total_price" id="total_price" class="form-control" placeholder="Total Price"  onchange="sum(this.value)" disabled/>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled Total</span>
												</div>
											</div>
										 	<div class="separator separator-dashed my-10"></div>
										 	<div class="form-group row">
												<label class="col-lg-1 col-form-label text-lg-right">Payment</label>
												<div class="col-lg-3">
													<div class="input-group">
														<select class="form-control" value="{{ old('payment_method') ?? $inputer->implode('payment_method') }}" name="payment_method" id="payment_method" onchange="ongkir()">
															<option value="" hidden>Payment Method</option>
															<option value="COD" {{ (old('payment_method') ?? $inputer->implode('payment_method') ) == 'COD' ? 'selected': '' }} required>COD</option>
															<option value="Transfer" {{ (old('payment_method') ?? $inputer->implode('payment_method') ) == 'Transfer' ? 'selected': '' }} required>Transfer</option>
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-file-invoice-dollar" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Select an payment method.</span>
											  	</div>
												<label class="col-lg-1 col-form-label text-lg-right">Weight (gram)</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="number" min="1" class="form-control" value="{{ old('product_weight') ?? $inputer->implode('product_weight') }}" name="weight" id="weight" placeholder="Weight" onchange="ongkir()"/>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-weight-hanging" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please input the product wieght</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right">Warehouse</label>
												<div class="col-lg-3">
													<div class="input-group">
														<select class="form-control" value="{{ old('warehouse') ?? $inputer->implode('warehouse') }}" name="warehouse" id="warehouse" onchange="ongkir()">
															<option value="" hidden>Warehouse</option>
															<option value="Cilacap" {{ (old('warehouse') ?? $inputer->implode('warehouse') ) == 'Cilacap' ? 'selected': '' }} required>Cilacap</option>
															<option value="Kosambi" {{ (old('warehouse') ?? $inputer->implode('warehouse') ) == 'Kosambi' ? 'selected': '' }} required>Kosambi</option>
															<option value="Tandes.Sby" {{ (old('warehouse') ?? $inputer->implode('warehouse') ) == 'Tandes.Sby' ? 'selected': '' }} required>Tandes.Sby</option>
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-warehouse" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please select an warehouse</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Destination Province</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<select class="form-control" id="province" name="province">
															<option value="" hidden>Destination Province</option>
															@foreach ($province as $province)
																<option value="{{ $province['province_id'] }}">{{ $province['province'] }}</option>
															@endforeach
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please select an destination province</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Destination City</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<select class="form-control" id="city" name="city">
															<option value="" hidden>Destination City</option>

														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please select an destination city</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Destination Subdistrict</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<select class="form-control" id="subdistrict" name="subdistrict" onchange="ongkir()">
															<option value="" hidden>Destination Subdistrict</option>

														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please select an destination subdistrict</span>
												</div>
										  		<label class="col-lg-1 col-form-label text-lg-right mt-8">Courier</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<select class="form-control" value="{{ old('courier') ?? $inputer->implode('courier') }}" name="courier" id="courier" onchange="ongkir()">
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
													<span class="form-text text-muted">Please select an courier.</span>
											  	</div>
												  <label class="col-lg-1 col-form-label text-lg-right mt-8">Shipping Price</label>
												<div class="col-lg-7 mt-8">
													<div class="input-group">
														<input type="number" class="form-control" placeholder="Total Shipping Price" id="shipping_price" name="shipping_price" value="">
														<div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled Total</span>
												</div>
										 	</div>
											<div class="separator separator-dashed my-10"></div>
											<div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Grand Total</label>
												<div class="col-lg">
													<input name="total_payment" id="total_payment" class="form-control" placeholder="Total Payment" value="" disabled>
													<span class="form-text text-muted">Total Price + Courier</span>
												</div>
											</div>
											<div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Upload The Proof</label>
												<div class="col-lg">
													<input class="form-control" value="{{ old('image') ?? $inputer->implode('image') }}" type="file" id="inputimage" name="image" id="formFileMultiple" multiple id>
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
									{{-- <form action="{{ route('lead.update',['lead' => $lead->implode('id')]) }}" method="POST">
										@csrf
										@method('PATCH')
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputAdvertiser" class="col-form-label">Advertiser</label>
											</div>
											<div class="col-10">
												<label class="col-form-label form-control" value="">{{ old('advertiser') ?? $lead->implode('advertiser') }}</label>
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputOperator" class="col-form-label">Operator</label>
											</div>
											<div class="col-10">
												<label class="col-form-label form-control" value="">{{ old('operator') ?? $lead->implode('operator_name') }}</label>
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputProduct" class="col-form-label">Product</label>
                                            </div>
                                            <div class="dropdown col-10">
												<label class="col-form-label form-control" value="">{{ old('product') ?? $lead->implode('product_name') }}</label>
                                            </div>
                                        </div>
										<div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputProduct" class="col-form-label">Costumer Name</label>
                                            </div>
                                            <div class="dropdown col-10">
												<input class="col-form-label form-control" value="{{ old('client') ?? $lead->implode('client_name') }}" name="name">
                                            </div>
                                        </div>
										<div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputProduct" class="col-form-label">No Whatsapp</label>
                                            </div>
                                            <div class="dropdown col-10">
												<input class="col-form-label form-control" value="{{ old('client') ?? $lead->implode('client_wa') }}" name="whatsapp">
                                            </div>
                                        </div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputQuantity" class="col-form-label">Quantity</label>
											</div>
											<div class="col-10">
												<input type="number" min="0" onchange="calculate(this.value)" id="quantity" name="quantity" value="{{ old('quantity') ?? $lead->implode('quantity') }}" id="inputquantity" class="form-control" aria-describedby="quantityHelpInline">
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputprice" class="col-form-label">Price</label>
											</div>
											<div class="col-10">
												<input type="number" min="0" id="price" name="price" value="{{ old('price') ?? $lead->implode('price') }}" id="inputprice" class="form-control" aria-describedby="priceHelpInline">
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputTotal" class="col-form-label">Total</label>
											</div>
											<div class="col-10">
												<label class="col-form-label form-control" id="total_price" name="total_price" required value="" aria-describedby="totalHelpInline">{{ old('total') ?? $lead->total_price }}</label>
												<input class="col-form-label form-control" id="total_price" name="total_price" required value="{{ old('total') ?? $lead->implode('total_price')}}" aria-describedby="totalHelpInline" disabled>
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputTime" class="col-form-label">Time</label>
											</div>
											<div class="col-10">
												<input type="text" name="time" required value="{{ old('time') ?? $campaign->time }}" id="inputtime" class="form-control" aria-describedby="totalHelpInline">
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputProgress" class="col-form-label">Progress</label>
                                            </div>
                                            <div class="dropdown col-10">
                                                <select name="status_id" id="status_id" class="form-control">
                                                    <option value="3" {{ (old('status_id') ?? $lead->implode('status_id') ) == '3' ? 'selected': '' }} required>Waiting</option>
													<option value="4" {{ (old('status_id') ?? $lead->implode('status_id') ) == '4' ? 'selected': '' }} required>Proccessing</option>
													<option value="5" {{ (old('status_id') ?? $lead->implode('status_id') ) == '5' ? 'selected': '' }} required>Closing</option>
													<option value="6" {{ (old('status_id') ?? $lead->implode('status_id') ) == '6' ? 'selected': '' }} required>Spam</option>
													<option value="7" {{ (old('status_id') ?? $lead->implode('status_id') ) == '7' ? 'selected': '' }} required>Failed</option>
                                                </select>
                                            </div>
                                        </div>
										{{ csrf_field() }}
										<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Edit Lead Tenneling">
									</form> --}}
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
            $(document).ready(function() {
                $('#event_id').on('change', function() {
                    var eventId = $(this).val();
                    if(eventId) {
                        $.ajax({
                            url: '/getEvent/'+eventId,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data);
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
                            success:function(data);
                        });
                    }
                });
            });
        </script>
		<script type="text/javascript">
			function calculate(promotion){
				var quantity = parseInt(document.getElementById('quantity').value);
				var price = parseInt(document.getElementById('price').value);
                var promotion = parseInt(document.getElementById('promotion_name').value);
				var total = (price * quantity) - promotion;
				var total_price = document.getElementById('total_price');
				total_price.value = total;
			}
		</script>
        <script type="text/javascript">
			function sum(promotion){
				var total_price = parseInt(document.getElementById('total_price').value);
				var total = total_price - promotion;
				var set = document.getElementById('total_price');
				set.value = total;
			}
		</script>
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
			function ongkir(){
				var warehouse = document.getElementById("warehouse").value;
				var subdistrict = document.getElementById("subdistrict").value;
				var weight = document.getElementById("weight").value;
				var	courier = document.getElementById("courier").value;
				var courier = courier.toLowerCase();
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
							console.log(data)
							var shipping_price = document.getElementById('shipping_price');
                            var total_payment = document.getElementById('total_payment');
                            var total_price = parseInt(document.getElementById('total_price').value);
							shipping_price.value = data;
                            total_payment.value = total_price+data;
						}
					});
				}

			}
		</script>
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
