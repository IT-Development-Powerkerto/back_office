<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Campaign</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
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
							<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
								<!--begin::Heading-->
								<h1 class="text-dark fw-bold my-0 fs-2">Campaigns</h1>
								<!--end::Heading-->
								<!--begin::Breadcrumb-->
								<ul class="breadcrumb breadcrumb-line text-muted fw-bold fs-base my-1">
									<li class="breadcrumb-item text-muted">
										<a href="{{ route('dashboard.index') }}" class="text-muted">Home</a>
									</li>
									<li class="breadcrumb-item text-dark">Campaign</li>
								</ul>
								<!--end::Breadcrumb-->
							</div>
							<!--end::Page title=-->
							<!--begin::Wrapper-->
							<div class="d-flex d-lg-none align-items-center ms-n2 me-2">
								<!--begin::Logo-->
								    <img alt="Logo" src="img/logo.png" class="h-40px" />
								<!--end::Logo-->
							</div>
							<!--begin::User-->
							<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
								<!--begin::Menu wrapper-->
								<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
									data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									<img src={{ Auth()->user()->image }} alt="image" />
								</div>

								@include('layout/topbar/partials/_user-menu')

								<!--end::Menu wrapper-->
							</div>
							<!--end::User -->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
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
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">

							<!--begin::Tables Widget 11-->
							<div class="card card-xxl-stretch mb-5 mb-xl-8">
								<!--begin::Header-->
								<div class="card-header border-0 pt-5">
									<h3 class="card-title align-items-start flex-column">
										<span class="card-label fw-bolder fs-3 mb-1">Campaign</span>
										<span class="text-muted mt-1 fw-bold fs-7">{{$campaigns->count()}} Campaign</span>
									</h3>
									<div class="card-toolbar" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a Announcement">
										<a href="" data-bs-toggle="modal" data-bs-target="#create-campaign" class="btn btn-sm btn-light btn-active-primary">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
										<span class="svg-icon svg-icon-3">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
												<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->Create Campaign</a>
									</div>
								</div>
								<!--end::Header-->
								<!--begin::Body-->
								<div class="card-body py-3 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 415px">
									<!--begin::Table container-->
									<div class="table-responsive">
										<!--begin::Table-->
										<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
											<!--begin::Table head-->
											<thead>
												<tr class="fw-bolder text-muted">
													<th class="min-w-50px">No</th>
													<th class="min-w-200px">Name</th>
													<th class="min-w-200px">Operators</th>
													<th class="min-w-200px">Trafic</th>
													<th class="min-w-200px">Code</th>
													<th class="min-w-200px text-end">Actions</th>
												</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
                                                <?php $n=0; ?>
												@foreach ($campaigns as $campaigns)
												<tr>
													<td>
														<label class="text-dark fw-bolder text-hover-primary d-block fs-6" >{{$n+=1}}</label>
													</td>
													<td>
														<!-- <div class="d-flex align-items-center">
															<label for="">WA Generosku</label>
															<h1 class="text-dark fw-bolder text-hover-primary fs-6">https://mauorder.online/wa-generosku-2 </h1>
														</div> -->
														<div class="timeline-desc timeline-desc-light-primary mx-3">
															<span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$campaigns->tittle}}</span>
															<!-- <p class="fw-bolder pb-2">
																https://mauorder.online/wa-generosku-2
															</p> -->
														</div>
													</td>
													<td>
														<label class="text-dark fw-bolder text-hover-primary d-block fs-6">0 Operator</label>
													</td>
													<td>
														<label class="text-dark fw-bolder text-hover-primary d-block fs-6">0 View</label>
													</td>
													<td>
														<textarea type="text" name="tp" id="inputtp" class="form-control" aria-describedby="tpHelpInline" >
<!doctype html>
<html lang="en">
<head>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '{{$campaigns->facebook_pixel}}');
	fbq('track', 'PageView');
	</script>
	<noscript>
	<img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?-ev=PageView&noscript=1"/>
	</noscript>

	<title>Hello, world!</title>
</head>
<body>

	<form action="https://api.pwkbackoffice.com/public/api/clients" method="POST">
	<div class="mb-3">
			<label for="exampleInputNama" class="form-label">Nama Lengkap</label>
		<input type="nama" name="name" class="form-control" id="exampleInputNama" aria-describedby="namaHelp">
	</div>
	<div class="mb-3">
			<label for="exampleInputWhatsapp" class="form-label">No. Whatsapp</label>
			<input type="text" name="whatsapp" class="form-control" id="exampleInputWhatsapp">
	</div>
	<button type="submit" class="btn btn-primary" onclick="{{$campaigns->event_pixel->event_pixel}}">Submit</button>
	</form>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
														</textarea>
													</td>
													<td>
														<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
															<div class="btn-toolbar justify-content-between " role="toolbar" aria-label="Toolbar with button groups">
																<div class="btn-group" role="group" aria-label="First group">
																	<a href="campaign/create" type="submit" data-bs-toggle="modal" data-bs-target="#edit-operator" class="btn btn-primary  btn-icon"><i class="la la-user-edit"></i></a>
																</div>
															</div>

															<div class="modal fade" tabindex="-1" id="create-campaign">
																<div class="modal-dialog">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title">Campaign</h5>
																			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																		</div>
																		<div class="modal-body">
																			<form action="{{route('campaign.store')}}" method="POST">
																				@csrf

																				<div class="row align-items-center col-12 pb-5">
																					<div class="col-2">
																						<label for="inputtittle" class="col-form-label">Tittle</label>
																					</div>
																					<div class="col-10">
																						<input type="text" name="tittle" value="" required id="inputtittle" class="form-control" aria-describedby="tittleHelpInline">
																					</div>
																				</div>
																				<div class="row align-items-center col-12 pb-5">
																					<div class="col-2">
																						<label for="inputfbp" class="col-form-label">Facebook Pixel</label>
																					</div>
																					<div class="col-10">
																						<input type="text" name="fbp" value="" required id="inputfbp" class="form-control" aria-describedby="fbpHelpInline">
																					</div>
																				</div>
																				<div class="row align-items-center col-12 pb-5">
																					<div class="col-2">
																						<label for="inputRole" class="col-form-label">Facebook Event</label>
																					</div>
																					<div class="dropdown col-10">
																						<select name="event_id" id="event_id" class="form-control">
																							@foreach ($events as $event)
																							<option value="{{$event->id}}" required>{{$event->name}}</option>
																							@endforeach
																						</select>
																					</div>
																				</div>
																				<div class="row align-items-center col-12 pb-5">
																					<div class="col-2">
																						<label for="inputtp"  class="col-form-label">Thanks Page</label>
																					</div>
																					<div class="col-10">
																						<textarea type="text" name="tp" value="" required id="inputtp" class="form-control" aria-describedby="tpHelpInline"></textarea>
																					</div>
																				</div>
																				{{ csrf_field() }}
																				<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Create">
																			</form>
																		</div>
																	</div>
																</div>
															</div>

															<div class="btn-toolbar justify-content-between px-2" role="toolbar" aria-label="Toolbar with button groups">
																<div class="btn-group" role="group" aria-label="First group">
																	<button type="submit" data-bs-toggle="modal" data-bs-target="#add-operator" class="btn btn-success btn-icon"><i class="la la-users"></i></button>
																</div>
															</div>

															<div class="modal fade" tabindex="-1" id="add-operator">
																<div class="modal-dialog">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title">Operator</h5>
																			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																		</div>
																		<form action="/dinamis/proses" method="post">
                                                                            {{ csrf_field() }}
                                                                            <div class="field_wrapper">
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <div class="col-md-10">
                                                                                            <input class="form-control" placeholder="Bahasa Pemrograman" type="text" name="nama_bahasa[]" value=""/>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <a class="btn btn-success" href="javascript:void(0);" id="add_button" title="Add field">TAMBAH</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button class="btn btn-lg btn-primary" type="submit">SIMPAN</a>
                                                                            <script type="text/javascript">
                                                                                $(document).ready(function(){
                                                                                    var maxField = 10; //Input fields increment limitation
                                                                                    var addButton = $('#add_button'); //Add button selector
                                                                                    var wrapper = $('.field_wrapper'); //Input field wrapper
                                                                                    var fieldHTML = '<div class="form-group add"><div class="row">';
                                                                                    fieldHTML=fieldHTML + '<div class="col-md-10"><input class="form-control" placeholder="Bahasa Pemrograman" type="text" name="nama_bahasa[]" /></div>';
                                                                                    fieldHTML=fieldHTML + '<div class="col-md-2"><a href="javascript:void(0);" class="remove_button btn btn-danger">HAPUS</a></div>';
                                                                                    fieldHTML=fieldHTML + '</div></div>';
                                                                                    var x = 1; //Initial field counter is 1

                                                                                    //Once add button is clicked
                                                                                    $(addButton).click(function(){
                                                                                        //Check maximum number of input fields
                                                                                        if(x < maxField){
                                                                                            x++; //Increment field counter
                                                                                            $(wrapper).append(fieldHTML); //Add field html
                                                                                        }
                                                                                    });

                                                                                    //Once remove button is clicked
                                                                                    $(wrapper).on('click', '.remove_button', function(e){
                                                                                        e.preventDefault();
                                                                                        $(this).parent('').parent('').remove(); //Remove field html
                                                                                        x--; //Decrement field counter
                                                                                    });
                                                                                });
                                                                            </script>
                                                                        </form>
																	</div>
																</div>
															</div>

															<form action="{{route('campaign.destroy',['campaign' => $campaigns->id])}}" method="POST">
																@csrf
																@method('DELETE')
																<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
																	<div class="btn-group" role="group" aria-label="First group">
																		<button type="submit" class="btn btn-danger btn-icon" onclick="return confirm('Jadi Delete Kah ?')"><i class="la la-trash"></i></button>
																	</div>
																</div>
															</form>
														</div>
													</td>
												</tr>
												@endforeach
											</tbody>
											<!--end::Table body-->
										</table>
										<!--end::Table-->
									</div>
									<!--end::Table container-->
								</div>
								<!--begin::Body-->
							</div>
							<!--end::Tables Widget 11-->
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
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/widgets.js"></script>
		<!--end::Page Custom Javascript-->
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
			var i = 0;
			$("#dynamic-ar").click(function () {
				++i;
				$("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
					'][subject]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
					);
			});
			$(document).on('click', '.remove-input-field', function () {
				$(this).parents('tr').remove();
			});
		</script>
	</body>
	<!--end::Body-->
</html>
