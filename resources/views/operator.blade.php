<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Operator</title>
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
								<h1 class="text-dark fw-bold my-0 fs-2">Operator</h1>
								<!--end::Heading-->
								<!--begin::Breadcrumb-->
								<ul class="breadcrumb breadcrumb-line text-muted fw-bold fs-base my-1">
									<li class="breadcrumb-item text-muted">
										<a href="{{ route('dashboard.index') }}" class="text-muted">Home</a>
									</li>
									<li class="breadcrumb-item text-dark">Operator</li>
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
							<!--end::Wrapper-->
							<!--begin::Toolbar wrapper-->
							<div class="d-flex flex-shrink-0">
								<!--begin::Create app-->
								<div class="d-flex ms-3">
									<a href="{{ route('dashboard.index') }}" class="btn btn-primary">Home</a>
								</div>
								<!--end::Create app-->
							</div>
							<!--end::Toolbar wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">

							<!--begin::Tables Widget 11-->
							<div class="card card-xxl-stretch mb-5 mb-xl-8">
								<!--begin::Header-->
								<div class="card-header border-0 pt-5">
									<h3 class="card-title align-items-start flex-column">
										<span class="card-label fw-bolder fs-3 mb-1">Operator</span>
										<span class="text-muted mt-1 fw-bold fs-7">1 Operator</span>
									</h3>
									<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a Announcement">
										<a href="/operator/create " class="btn btn-sm btn-light btn-active-primary">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
										<span class="svg-icon svg-icon-3">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
												<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->Create Operator</a>
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
													<th class="min-w-30px">No</th>
													<!-- <th class="min-w-30px">Status</th> -->
													<th class="min-w-200px">Name</th>
													<th class="min-w-200px">Email</th>
													<th class="min-w-200px">Whatsapp</th>
													<th class="min-w-200px">Assign To</th>
                                                    <th class="min-w-100px text-end">Action</th>
												</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
                                                
												<tr>
													<td>
														<label class="text-dark fw-bolder text-hover-primary d-block fs-6">1</label>                                               
													</td>
													<!-- <td>
														<div class="timeline-desc timeline-desc-light-primary mx-3">
                                                            <div class="menu-content">
                                                                <label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="kt_user_menu_dark_mode_toggle">
                                                                    <input data-id="{{Auth()->user()->id}}" class="form-check-input w-30px h-20px" type="checkbox" name="status" data-toggle="toggle" data-on="1" data-off="0" {{ Auth()->user()->status_id ? 'checked' : '' }}/>
                                                                    <span class="pulse-ring ms-n1"></span>
                                                                    <span class="form-check-label text-gray-600 fs-7"></span>
                                                                </label>
                                                            </div>
														</div>
													</td> -->
													<td>
                                                        <div class="timeline-desc timeline-desc-light-primary">
                                                            <span class="fw-mormal text-gray-800">CS Zall</span>
                                                            <p class="fw-bolder pb-2">
                                                                cszall@zall.com
                                                            </p>
                                                        </div>
													</td>
													<td>
														<label class="badge badge-light-primary mb-5">Email</label>
													</td>
                                                    <td>
                                                        <div class="timeline-desc timeline-desc-light-primary">
                                                            <span class="fw-mormal text-gray-800">1 Campaigns</span>
                                                            <p class="fw-bolder pb-2">
                                                                79 Traffic
                                                            </p>
                                                        </div>
													</td>
													<td>
														<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
															<div class="btn-toolbar justify-content-between px-2" role="toolbar" aria-label="Toolbar with button groups">
																<div class="btn-group" role="group" aria-label="First group">
																	<button type="submit" data-bs-toggle="modal" data-bs-target="#edit-op" class="btn btn-primary  btn-icon"><i class="la la-user-edit"></i></button>
																</div>
															</div>

															<div class="modal fade" tabindex="-1" id="edit-op">
																<div class="modal-dialog">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title">Create Operator</h5>
																			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																		</div>
																		<div class="modal-body">
																			<form action="" method="POST">
																				@csrf

																				<div class="row align-items-center col-12 pb-5">
																					<div class="col-2">
																						<label for="inputtittle" class="col-form-label">Name</label>
																					</div>
																					<div class="col-10">
																						<input type="text" name="nameop" value="" id="inputtittle" class="form-control" aria-describedby="nameopHelpInline">
																					</div>
																				</div>
																				<div class="row align-items-center col-12 pb-5">
																					<div class="col-2">
																						<label for="inputnickname" class="col-form-label">Nickname</label>
																					</div>
																					<div class="col-10">
																						<input type="text" name="nickname" value="" id="inputnickname" class="form-control" aria-describedby="fbpHelpInline">
																					</div>
																				</div>
																				<div class="row align-items-center col-12 pb-5">
																					<div class="col-2">
																						<label for="inputType" class="col-form-label">Type</label>
																					</div>
																					<div class="dropdown col-10">
																						<select name="typeop" id="inputType" class="form-control">
																							<option value="">Choose Type</option>
                                                                                            <option value="">WhatsApp</option>
                                                                                            <option value="">Email</option>
																						</select>
																					</div>
																				</div>
                                                                                <div class="row align-items-center col-12 pb-5">
																					<div class="col-2">
																						<label for="inputidentity" class="col-form-label">Identity</label>
																					</div>
																					<div class="col-10">
																						<input type="text" name="identity" value="" id="inputidentity" class="form-control" aria-describedby="fbpHelpInline">
																					</div>
																				</div>
																				{{ csrf_field() }}
																				<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Edit Operator">
																			</form>
																		</div>
																	</div>
																</div>
															</div>

															<form action="" method="POST">
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

		<script id="document-template" type="text/x-handlebars-template">
		<tr class="delete_add_more_item" id="delete_add_more_item">

			<td>
				<input type="text" name="operator" value="">
			</td>
			<td>
			<i class="removeaddmore" style="cursor:pointer;color:red;">Remove</i>
			</td>

		</tr>
		</script>

		<script type="text/javascript">

		$(document).on('click','#addMore',function(){

			$('.table').show();

			var operator = $("#operator").val();\
			var source = $("#document-template").html();
			var template = Handlebars.compile(source);

			var data = {
				task_name: task_name,
				cost: cost
			}

			var html = template(data);
			$("#addRow").append(html)

			total_ammount_price();
		});

		$(document).on('click','.removeaddmore',function(event){
			$(this).closest('.delete_add_more_item').remove();
		});

		</script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
