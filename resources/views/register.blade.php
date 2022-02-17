<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../">
		<title>Register</title>
		<meta charset="utf-8" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Multi-steps-->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column" id="kt_create_account_stepper">
				<!--begin::Aside-->
				<div class="d-flex flex-column flex-lg-row-auto w-xl-500px shadow-sm" style="background-color: #00509d;">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-500px scroll-y">
						<!--begin::Header-->
						<div class="d-flex flex-row-fluid flex-column flex-center p-10 pt-lg-20">
							<!--begin::Logo-->
							<a href="../../demo9/dist/index.html" class="mb-10 mb-lg-20">
								<img alt="Logo" src="img/logo.png" class="h-40px" />
							</a>
							<!--end::Logo-->
							<!--begin::Nav-->
							<div class="stepper-nav">
								<!--begin::Step 1-->
								<div class="stepper-item current" data-kt-stepper-element="nav">
									<!--begin::Line-->
									<div class="stepper-line w-40px"></div>
									<!--end::Line-->
									<!--begin::Icon-->
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">1</span>
									</div>
									<!--end::Icon-->
									<!--begin::Label-->
									<div class="stepper-label">
										<h3 class="stepper-title">Account Type</h3>
										<div class="stepper-desc fw-bold">Setup Your Account Details</div>
									</div>
									<!--end::Label-->
								</div>
								<!--end::Step 1-->
								<!--begin::Step 2-->
								<div class="stepper-item" data-kt-stepper-element="nav">
									<!--begin::Line-->
									<div class="stepper-line w-40px"></div>
									<!--end::Line-->
									<!--begin::Icon-->
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">2</span>
									</div>
									<!--end::Icon-->
									<!--begin::Label-->
									<div class="stepper-label">
										<h3 class="stepper-title">Account Info</h3>
										<div class="stepper-desc fw-bold">Setup Your Account Settings</div>
									</div>
									<!--end::Label-->
								</div>
								<!--end::Step 2-->
								<!--begin::Step 3-->
								<div class="stepper-item" data-kt-stepper-element="nav">
									<!--begin::Line-->
									<div class="stepper-line w-40px"></div>
									<!--end::Line-->
									<!--begin::Icon-->
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">3</span>
									</div>
									<!--end::Icon-->
									<!--begin::Label-->
									<div class="stepper-label">
										<h3 class="stepper-title">Payment</h3>
										<div class="stepper-desc fw-bold">Your Business Related Info</div>
									</div>
									<!--end::Label-->
								</div>
								<!--end::Step 3-->
								<!--begin::Step 4-->
								<div class="stepper-item" data-kt-stepper-element="nav">
									<!--begin::Line-->
									<div class="stepper-line w-40px"></div>
									<!--end::Line-->
									<!--begin::Icon-->
									<div class="stepper-icon w-40px h-40px">
										<i class="stepper-check fas fa-check"></i>
										<span class="stepper-number">4</span>
									</div>
									<!--end::Icon-->
									<!--begin::Label-->
									<div class="stepper-label">
										<h3 class="stepper-title">Completed</h3>
										<div class="stepper-desc fw-bold">Set Your Payment Methods</div>
									</div>
									<!--end::Label-->
								</div>
								<!--end::Step 4-->
							</div>
							<!--end::Nav-->
						</div>
						<!--end::Header-->
						<!--begin::Illustration-->
						<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-150px min-h-lg-300px mt-n20" style="background-image: url(assets/media/illustrations/sigma-1/16.png"></div>
						<!--end::Illustration-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<!--begin::Content-->
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-700px p-10 p-lg-15 mx-auto">
							<!--begin::Form-->
							<form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" class="my-auto pb-5" novalidate="novalidate" id="kt_create_account_form">
								<!--begin::Step 1-->
                                <div class="current" data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-10 pb-lg-15">
                                            <!--begin::Title-->
                                            <h2 class="fw-bolder d-flex align-items-center text-dark">Choose Account Type
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Billing is issued based on your selected account type"></i></h2>
                                            <!--end::Title-->
                                            <!--begin::Notice-->
                                            <div class="text-muted fw-bold fs-6">If you need more info, please check out
                                            <a href="#" class="link-primary fw-bolder">Help Page</a>.</div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Option-->
                                                    <input type="radio" class="btn-check" name="paket_id" value="1" checked="checked" id="kt_create_account_form_account_type_personal" />
                                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_personal">

                                                        <!--begin::Info-->
                                                        <span class="d-block fw-bold text-start">
                                                            <span class="text-dark fw-bolder d-block fs-4 mb-2">Entrepreneur Plan</span>
                                                            <span class="text-primary fw-bold fs-1">Rp. 139.000<span class="text-primary fw-bold fs-8">/Month</span></span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Option-->
                                                    <input type="radio" class="btn-check" name="paket_id" value="2" id="kt_create_account_form_account_type_flexible" />
                                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_flexible">
                                                        <!--begin::Info-->
                                                        <span class="d-block fw-bold text-start">
                                                            <span class="text-dark fw-bolder d-block fs-4 mb-2">Flexible Plan</span>
                                                            <span class="text-primary fw-bold fs-1">Rp. 300<span class="text-primary fw-bold fs-8">/lead</span></span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Option-->
                                                    <input type="radio" class="btn-check" name="paket_id" value="3" id="kt_create_account_form_account_type_corporate" />
                                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="kt_create_account_form_account_type_corporate">

                                                        <!--begin::Info-->
                                                        <span class="d-block fw-bold text-start">
                                                            <span class="text-dark fw-bolder d-block fs-4 mb-2">Corporate Plan</span>
                                                            <span class="text-primary fw-bold fs-1">Rp. 299.000<span class="text-primary fw-bold fs-8">/Month</span></span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 1-->
								<!--begin::Step 2-->
                                <div data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-10 pb-lg-12">
                                            <!--begin::Title-->
                                            <h2 class="fw-bolder text-dark">Account Register</h2>
                                            <!--end::Title-->
                                            <!--begin::Notice-->
                                            <div class="text-muted fw-bold fs-6">If you need more info, please check out
                                            <a href="#" class="link-primary fw-bolder">Help Page</a>.</div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label required">Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input name="name" type="text" value="Name" class="form-control border border-secondary form-control-lg form-control-solid @error('name') is-invalid @enderror"/>
                                            @error('name')
                                                <div class="form-control alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center form-label">
                                                <span class="required">Username</span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input name="username" value="Username" type="text"  class="form-control border border-secondary form-control-lg form-control-solid @error('username') is-invalid @enderror"/>
                                            @error('username')
                                                <div class="form-control alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center form-label">
                                                <span class="required">Password</span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input name="password" type="password" value="Password" class="form-control border border-secondary form-control-lg form-control-solid @error('password') is-invalid @enderror" />
                                            @error('password')
                                                <div class="form-control alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold form-label required">Email</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input name="email" value="example@example.com" type="text"  class="form-control border border-secondary form-control-lg form-control-solid @error('email') is-invalid @enderror"/>
                                            @error('email')
                                                <div class="form-control alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center form-label">
                                                <span class="required">Phone</span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input name="phone" value="081245527***" type="text" class="form-control border border-secondary form-control-lg form-control-solid @error('phone') is-invalid @enderror"/>
                                            @error('phone')
                                                <div class="form-control alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 2-->
								<!--begin::Step 3-->
								<div data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-10 pb-lg-15 ps-8 d-flex flex-column align-items-center justify-content-start">
                                            <!--begin::Title-->
                                            <h2 class="fw-bolder text-dark">Payment Your Account</h2>
                                            <!--end::Title-->
                                            <!--begin::Notice-->
                                            <div class="text-muted fw-bold fs-6 mt-3">Continue your payment with click right here.</div>
                                            <a href="#" type="button" class="btn btn-lg btn-primary mt-5" target="_blank">Payment</a>
                                            <div class="fv-row mt-8">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center form-label">
                                                    <span class="required">Proof Of Payment</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="file" id="inputimage" name="image" id="formFileMultiple" multiple id>
                                                @error('image')
                                                    <div class="form-control alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--end::Input-->
                                            </div>

                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
								<!--end::Step 3-->
								<!--begin::Step 4-->
								<div data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-8 pb-lg-10">
                                            <!--begin::Title-->
                                            <h2 class="fw-bolder text-dark">Your Are Done!</h2>
                                            <!--end::Title-->
                                            <!--begin::Notice-->
                                            <div class="text-muted fw-bold fs-6">Please wait a minute...</div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div class="mb-0">
                                            <!--begin::Text-->
                                            <div class="fs-6 text-gray-600 mb-5">Your account is being verified by admin. The verification will be sent to your email account (banyumax@support.com).</div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
								<!--end::Step 4-->
								<!--begin::Actions-->
								<div class="d-flex flex-stack pt-15">
									<div class="mr-2">
										<button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
										<span class="svg-icon svg-icon-4 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black" />
												<path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->Previous</button>
									</div>
									<div>
										<button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
											<span class="indicator-label">Submit
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
											<span class="svg-icon svg-icon-4 ms-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
													<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon--></span>
											<span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										</button>
										<button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
										<span class="svg-icon svg-icon-4 ms-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
												<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon--></button>
									</div>
								</div>
								<!--end::Actions-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
						<!--begin::Links-->
						<div class="d-flex flex-center fw-bold fs-6">
							<a href="https://keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">About</a>
							<a href="https://keenthemes.com/support" class="text-muted text-hover-primary px-2" target="_blank">Support</a>
							<a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2" target="_blank">Purchase</a>
						</div>
						<!--end::Links-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Multi-steps-->
		</div>
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/modals/create-account.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>