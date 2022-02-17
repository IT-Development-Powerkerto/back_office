
	<!--begin::Nav Panel Widget 2-->
	<div class="card shadow-sm card-custom card-stretch gutter-b scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 515px">
        <!--begin::Header-->
        <div class="card-header border-0 bg-white pt-5">
            <h3 class="card-title align-items-start flex-column">
                <label class="card-label fw-bolder fs-3 mb-1">Product Ranking</label>
                <label class="text-muted mt-1 fw-bold fs-7">{{$product->count()}} Product</label>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Wrapper-->
            <div class="d-flex justify-content-between flex-column">
				<!--begin::Container-->
				<div class="pb-5">
					<!--begin::Header-->
                    <!--begin::Row-->
                    <div class="row g-5 g-xl-8 mt-n 5">
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <label class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="text-white fw-bolder fs-4">{{$closing_count->count()}}</div>
                                    <div class="fw-medium text-white fs-7">Total Closing</div>
                                </div>
                                <!--end::Body-->
                            </label>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <label class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="text-white fw-bolder fs-4">{{$lead_count->count()}}</div>
                                    <div class="fw-medium text-white fs-7">Total Leads</div>
                                </div>
                                <!--end::Body-->
                            </label>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <label class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="text-white fw-bolder fs-4">{{($omset_month_count->sum('total_price')-$omset_month_count->sum('product_promotion')) / 1000000}} Juta</div>
                                    <div class="fw-medium text-white fs-7">Total Omset</div>
                                </div>
                                <!--end::Body-->
                            </label>
                            <!--end::Statistics Widget 5-->
                        </div>
                    </div>
                    <!--end::Row-->
					<!--end::Header-->
					<!--begin::Body-->
					<div class="pt-1">
                        @foreach ($product as $product)
                        <!--begin::Item-->
						<div class="d-flex align-items-center pb-7">
							<!--begin::Symbol-->
							<div class="symbol symbol-circle symbol-success overflow-hidden me-5">
								<span class="symbol-label">
								<img src="{{$product->image}}" class="h-100 align-self-end" alt="image">
								</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Text-->
							<div class="d-flex flex-column flex-grow-1">
								<label class="fw-bolder text-dark mb-1 font-size-lg">{{$product->name}}</label>
							</div>
							<!--end::Text-->
							<!--begin::label-->
							<span class="fw-medium text-muted label label-xl label-light-success label-inline px-3 py-5 min-w-45px">{{$lead_count->where('product_id', $product->id)->count()}} Leads</span>
							<span class="fw-medium text-muted label label-xl label-light-success label-inline px-3 py-5 min-w-45px">{{$closing_count->where('product_id', $product->id)->count()}} Closing</span>
                            <span class="fw-medium text-muted label label-xl label-light-success label-inline px-3 py-5 min-w-45px">{{($omset_month_count->where('product_name', $product->name)->sum('total_price')-$omset_month_count->where('product_name', $product->name)->sum('product_promotion')) / 1000000}} Juta</span>
							<!--end::label-->
						</div>
						<!--end::Item-->
                        @endforeach
					</div>
					<!--end::Body-->
				</div>
				<!--eng::Container-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Body-->
	</div>
	<!--end::Nav Panel Widget 2-->
