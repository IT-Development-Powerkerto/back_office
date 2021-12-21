<!--begin::Toolbar wrapper-->
<div class="d-flex align-items-stretch flex-shrink-0">
	<!--begin::Activities-->
	<div class="d-flex align-items-center ms-1 ms-lg-3">
		<!--begin::Drawer toggle-->
		<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_activities_toggle">
			<i class="bi bi-bell fs-2"></i>
		</div>
		<!--end::Drawer toggle-->
	</div>
	<!--end::Activities-->
	<!--begin::User-->
	<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
		<!--begin::Menu wrapper-->
		<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
			data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
			<img src={{ Auth()->user()->image }} alt="image" />
		</div>

		<div class="menu-item py-5">
			<div class="menu-content">
				<label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="kt_user_menu_dark_mode_toggle">
					<input data-id="{{Auth()->user()->id}}" class="form-check-input w-30px h-20px" type="checkbox" name="status" data-toggle="toggle" data-on="1" data-off="0" {{ Auth()->user()->status_id ? 'checked' : '' }}/>
					<span class="pulse-ring ms-n1"></span>
					<span class="form-check-label text-gray-600 fs-7"></span>
				</label>
			</div>
		</div>

		@include('layout/topbar/partials/_user-menu')

		<!--end::Menu wrapper-->
	</div>
	<!--end::User -->
	
</div>
<!--end::Toolbar wrapper-->
