<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Create Campaign</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
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
							<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
								<!--begin::Heading-->
								<h1 class="text-dark fw-bold my-0 fs-2">Create Campaign</h1>
								<!--end::Heading-->
								<!--begin::Breadcrumb-->
								<ul class="breadcrumb breadcrumb-line text-muted fw-bold fs-base my-1">
									<li class="breadcrumb-item text-muted">
										<a href="{{ route('dashboard.index') }}" class="text-muted">Home</a>
									</li>
									<li class="breadcrumb-item text-muted">Account</li>
									<li class="breadcrumb-item text-dark">Create Campaign</li>
								</ul>
								<!--end::Breadcrumb-->
							</div>
							<!--end::Page title=-->
							<!--begin::Wrapper-->
							<div class="d-flex d-lg-none align-items-center ms-n2 me-2">
								<!--begin::Logo-->
								    <img alt="Logo" src="../img/logo.png" class="h-40px" />
								<!--end::Logo-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Toolbar wrapper-->
							<div class="d-flex flex-shrink-0">
								<!--begin::Create app-->
								<div class="d-flex ms-3">
									<a href="{{ route('campaign.index') }}" class="btn btn-primary">Back</a>
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
							<!--begin::details View-->
							<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
								<!--begin::Card header-->
								<div class="card-header cursor-pointer">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bolder m-0">Create Campaign</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">
									<form action="{{route('campaign.store')}}" method="POST">
										@csrf

										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputtittle" class="col-form-label">Tittle</label>
											</div>
											<div class="col-10">
												<input type="text" name="tittle" value="" id="inputtittle" class="form-control" aria-describedby="tittleHelpInline">
											</div>
										</div>
                                        <div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputfbp" class="col-form-label">Facebook Pixel</label>
											</div>
											<div class="col-10">
												<input type="text" name="fbp" value="" id="inputfbp" class="form-control" aria-describedby="fbpHelpInline">
											</div>
										</div>
                                        <div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputRole" class="col-form-label">Facebook Event</label>
											</div>
											<div class="dropdown col-10">
												<select name="fbe" id="fbe1" class="form-control">
													<option value="">Costume</option>
												</select>
											</div>
										</div>
                                        <div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputtp" class="col-form-label">Thanks Page</label>
											</div>
											<div class="col-10">
												<textarea type="text" name="tp" value="" id="inputtp" class="form-control" aria-describedby="tpHelpInline"></textarea>
											</div>
										</div>
                                        {{-- <div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputfu" class="col-form-label">Follow Up</label>
											</div>
											<div class="col-10">
												<textarea type="text" name="fu" value="" id="inputfu" class="form-control" aria-describedby="fuHelpInline"></textarea>
											</div>
										</div> --}}
                                        <div class="row align-items-center col-12 pb-5" id="tittle">
                                            <div class="col-2">
												<label for="inputtittle" class="col-form-label">Operator</label>
											</div>
                                            <div class="col-10">
                                                <!-- <form name="add_name" id="add_name">
                                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                                        <ul></ul>
                                                    </div>
                                                    <div class="alert alert-success print-success-msg" style="display:none">
                                                        <ul></ul>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="dynamic_field">
                                                            <tr>
                                                                <td>
                                                                    <select name="operator[]" id="fbe1" class="form-control">
                                                                        <option value="">Costume</option>
                                                                    </select>
                                                                </td>
                                                                <td><button type="button" name="add" id="add" class="btn btn-primary">Add More</button></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </form> -->
                                                <form method="post" id="dynamic_form">
                                                    <span id="result"></span>
                                                    <table  id="user_table">
                                                        <tbody></tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="2" align="right">&nbsp;</td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
										{{ csrf_field() }}
										<input type="submit" name="save" id="save" class="btn btn-primary mt-5 float-end me-6" value="Create">
									</form>
								</div>
								<!--end::Card body-->
							</div>
							<!--end::details View-->
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
		<script src="../assets/plugins/global/plugins.bundle.js"></script>
		<script src="../assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="../assets/js/custom/widgets.js"></script>
		<!--end::Page Custom Javascript-->

        <script type="text/javascript">
            $(document).ready(function(){
            var postURL = "<?php echo url('addmore'); ?>";
            var i=1;


            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select name="operator[]" id="fbe1" class="form-control"><option value="">Costume</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });


            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#submit').click(function(){
                $.ajax({
                        url:postURL,
                        method:"POST",
                        data:$('#add_name').serialize(),
                        type:'json',
                        success:function(data)
                        {
                            if(data.error){
                                printErrorMsg(data.error);
                            }else{
                                i=1;
                                $('.dynamic-added').remove();
                                $('#add_name')[0].reset();
                                $(".print-success-msg").find("ul").html('');
                                $(".print-success-msg").css('display','block');
                                $(".print-error-msg").css('display','none');
                                $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                            }
                        }
                });
            });


            function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $(".print-success-msg").css('display','none');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
            });
        </script> -->


        <script>
            $(document).ready(function(){

            var count = 1;

            dynamic_field(count);

            function dynamic_field(number)
            {
            html = '<tr>';
                    html += '<td><input type="text" name="operator[]" class="form-control" /></td>';
                    if(number > 1)
                    {
                        html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                        $('tbody').append(html);
                    }
                    else
                    {
                        html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                        $('tbody').html(html);
                    }
            }

            $(document).on('click', '#add', function(){
            count++;
            dynamic_field(count);
            });

            $(document).on('click', '.remove', function(){
            count--;
            $(this).closest("tr").remove();
            });

            $('#dynamic_form').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:'{{ route("campaign.store") }}',
                        method:'post',
                        data:$(this).serialize(),
                        dataType:'json',
                        beforeSend:function(){
                            $('#save').attr('disabled','disabled');
                        },
                        success:function(data)
                        {
                            if(data.error)
                            {
                                var error_html = '';
                                for(var count = 0; count < data.error.length; count++)
                                {
                                    error_html += '<p>'+data.error[count]+'</p>';
                                }
                                $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                            }
                            else
                            {
                                dynamic_field(1);
                                $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                            }
                            $('#save').attr('disabled', false);
                        }
                    })
            });

            });
        </script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
