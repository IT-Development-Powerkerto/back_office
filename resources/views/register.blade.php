<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <title>Pwkbackoffice</title>

	<link rel="icon" href="img/favicon.png">

	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->

	<!--begin::Page Vendor Stylesheets(used by this page)-->
	<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendor Stylesheets-->

	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
	<!--end::Global Stylesheets Bundle-->

    <title>Back Office Powerkerto</title>
  </head>
  <body class="overflow-hidden">
    <div class="content d-flex flex-column flex-column-fluid " id="kt_content">
        <!--begin::Container-->
        <div class="container-xl" id="kt_content_container">
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
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body pb-0">

                    <!--begin::Heading-->
                    <div class="card-px text-center pt-20 pb-5">

                        <!--begin::Title-->
                        <h2 class="fs-2x fw-bolder mb-0">Create Your Account Right Here.</h2>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <p class="text-gray-400 fs-4 fw-bold py-7">Click on the below buttons to <br> Create The Accounts.</p>
                        <!--end::Description-->
                        <!--begin::Action-->
                        <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_create_account">Create Account</a>
                        <!--end::Action-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Illustration-->
                    <div class="text-center px-5">
                        <img src="assets/media/illustrations/sigma-1/3.png" alt="" class="mw-100 h-200px h-sm-325px" />
                    </div>
                    <!--end::Illustration-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            <!--begin::Modal - Create account-->
            <div class="modal fade" id="kt_modal_create_account" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog mw-1000px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Title-->
                            <h2>Create Account</h2>
                            <!--end::Title-->
                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y m-5">
                            <!--begin::Stepper-->
                            <div class="stepper stepper-links d-flex flex-column" id="kt_create_account_stepper">
                                <!--begin::Nav-->
                                <div class="stepper-nav py-5">
                                    <!--begin::Step 1-->
                                    <div class="stepper-item current" data-kt-stepper-element="nav">
                                        <h3 class="stepper-title">Account Type</h3>
                                    </div>
                                    <!--end::Step 1-->
                                    <!--begin::Step 2-->
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <h3 class="stepper-title">Your Account</h3>
                                    </div>
                                    <!--end::Step 2-->
                                    <!--begin::Step 3-->
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <h3 class="stepper-title">Payment</h3>
                                    </div>
                                    <!--end::Step 3-->
                                    <!--begin::Step 5-->
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <h3 class="stepper-title">Completed</h3>
                                    </div>
                                    <!--end::Step 5-->
                                </div>
                                <!--end::Nav-->
                                <!--begin::Form-->
                                <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">

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
                                                <input name="name" type="text" value="{{ old('name') }}" class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"/>
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
                                                <input name="username" value="{{ old('username') }}" type="text"  class="form-control form-control-lg form-control-solid @error('username') is-invalid @enderror"/>
                                                @error('username')
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
                                                <input name="email" value="{{ old('email') }}" type="text"  class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"/>
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
                                                <input name="phone" value="{{ old('phone') }}" type="text" class="form-control form-control-lg form-control-solid @error('phone') is-invalid @enderror"/>
                                                @error('phone')
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
                                                <input name="password" type="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" />
                                                @error('password')
                                                    <div class="form-control alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Step 2-->
                                    <!--begin::Step 4-->
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
                                    <!--end::Step 4-->
                                    <!--begin::Step 5-->
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
                                    <!--end::Step 5-->
                                    <!--begin::Actions-->
                                    <div class="d-flex flex-stack pt-15">
                                        <!--begin::Wrapper-->
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black" />
                                                    <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Back</button>
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Wrapper-->
                                        <div>

                                            {{-- <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                                                <span class="indicator-label">Submit
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                <span class="svg-icon svg-icon-3 ms-2 me-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
                                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon--></span>
                                                <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button> --}}
                                            <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                            <span class="svg-icon svg-icon-4 ms-1 me-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
                                                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></button>
                                        </div>
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Submit" data-kt-stepper-action="submit">
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Stepper-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            <!--end::Modal - Create project-->
        </div>
        <!--end::Container-->
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/4096ccc916.js" crossorigin="anonymous"></script>
    <!-- End -->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="assets/js/custom/modals/create-account.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
    <script>
    $(function() {
        $('#kt_modal_create_account').modal('show');
    });
    </script>
    @endif
</body>
</html>
