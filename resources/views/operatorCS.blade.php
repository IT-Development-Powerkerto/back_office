<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Operator</title>
		<link rel="icon" href="img/favicon.png">
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
							@include('layout/header/_baseCS')


							@include('layout/_toolbar')
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
										<span class="text-muted mt-1 fw-bold fs-7">{{ $operators->count() }} Operator</span>
									</h3>
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
													<th class="min-w-100px">No</th>
													<!-- <th class="min-w-30px">Status</th> -->
													<th class="min-w-200px">Name</th>
													<th class="min-w-200px">Email</th>
													<th class="min-w-200px">Whatsapp</th>
													<th class="min-w-200px">Assign To</th>
												</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
                                                <?php $n=0; ?>
												@foreach ($operators as $operator)
												<tr>
													<td>
														<label class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $n+=1 }}</label>                                               
													</td>
													<td>
														<label class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $operator->name }}</label>                                               
													</td>
													<td>
														<label class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $operator->email }}</label> 
													</td>
													<td>
														<label class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $operator->phone }}</label>                                               
													</td>
                                                    <td>
                                                        <div class="timeline-desc timeline-desc-light-primary">
                                                            <span class="fw-mormal text-gray-800">{{ $campaign_count->where('user_id', $operator->id)->count() }} Campaigns</span>
                                                            <p class="fw-bolder pb-2">
                                                                {{ $lead_count->where('user_id', $operator->id)->count() }} Lead
                                                            </p>
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
