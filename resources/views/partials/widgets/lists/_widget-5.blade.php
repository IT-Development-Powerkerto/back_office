<!--begin::List Widget 5-->
<div class="card card-l-stretch mb-xl-8">
	<!--begin::Header-->
	<div class="card-header align-items-center border-0 mt-4">
		<h3 class="card-title align-items-start flex-column">
			<span class="fw-bolder mb-2 text-dark">Announcements</span>
			<span class="text-muted fw-bold fs-7">{{$announcements->count()}} Announcements</span>
		</h3>
		<div class="card-toolbar">
			<!--begin::Menu-->
			<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
				data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
				<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
				<span class="svg-icon svg-icon-2">
					<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
							<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
							<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
							<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
						</g>
					</svg>
				</span>
				<!--end::Svg Icon-->
			</button>

			<!--begin::Menu 3-->
			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
				<!--begin::Heading-->
				<div class="menu-item px-3">
					<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Menu</div>
				</div>
				<!--end::Heading-->
				<!--begin::Menu item-->
				<div class="menu-item px-3">
					<a href="#" class="menu-link px-3">Create</a>
				</div>

			</div>
			<!--end::Menu 3-->

			<!--end::Menu-->
		</div>
	</div>
	<!--end::Header-->
	<!--begin::Body-->
	<div class="card-body pt-5">
        @foreach ($announcements as $announcement)
		<!--begin::Timeline-->
		<div class="timeline-label">
			<!--begin::Item-->
			<div class="timeline-item">
				<!--begin::Label-->
				<div class="timeline-label fw-bolder text-gray-800 fs-6">{{$announcement->created_at}}</div>
				<!--end::Label-->
				<!--begin::Badge-->
				<div class="timeline-badge">
					<i class="{{$announcement->icon->name}}"></i>
				</div>
				<!--end::Badge-->
				<!--begin::Text-->
				<div class="fw-mormal timeline-content text-muted ps-3">{{$announcement->announcement}}</div>
				<!--end::Text-->
			</div>
			<!--end::Item-->
			<!--begin::Item-->
		</div>
        @endforeach
		<!--end::Timeline-->
	</div>
	<!--end: Card Body-->
</div>
<!--end: List Widget 5-->
