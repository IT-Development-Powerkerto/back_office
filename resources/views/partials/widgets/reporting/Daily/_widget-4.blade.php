
	<!--begin::Nav Panel Widget 2-->
	<div class="card shadow-sm card-custom card-stretch gutter-b scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 515px">
        <!--begin::Header-->
        <div class="card-header border-0 bg-white py-5">
            <h3 class="card-title fw-bolder text-dark">ADV Ranking</h3>
			<button type="button" class="btn btn-sm btn-light btn-active-primary">
					<i class="las la-print" style="font-size: 18px"></i>
			</button>
        </div>
        <!--end::Header-->
        {{-- @foreach ($user->where('role_id', 4) as $adv)
            {{$x[$i+=1] = [
                    'adv' => $adv->name, $inputer->where('adv_name', $adv->name)->sum('total_price')
                ]
            }}
        @endforeach --}}
        {{-- {{dd($x)}} --}}
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Wrapper-->
            <div class="d-flex justify-content-between flex-column pt-4 h-100">
				<!--begin::Container-->
				<div class="pb-5">
					<!--begin::Header-->
					{{-- <div class="d-flex flex-column flex-center">
                        @foreach ($user->where('role_id', 4) as $adv)
                        <!--begin::Symbol-->
                        <div class="symbol symbol-150 symbol-circle symbol-success overflow-hidden">
                            <span class="symbol-label">
                            <img src="{{$adv->image}}" class="h-100 align-self-end" alt="image">
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Username-->
                        <label class="card-title fw-bolder text-dark font-size-h4 m-0 pt-7 pb-1">Rank 1</label>
                        <span class="text-dark fw-medium">{{$adv->name}}</span>
                        <!--end::Username-->
                        <!--begin::Info-->
                        <div class="fw-medium text-muted font-size-sm pb-6">IDR {{$inputer->where('adv_name', $adv->name)->sum('total_price') - $inputer->where('adv_name', $adv->name)->sum('product_promotion')}}</div>
                        <!--end::Info-->
                        @endforeach
					</div> --}}
					<!--end::Header-->
					<!--begin::Body-->
					<div class="pt-1">
                        @foreach ($user->where('role_id', 4) as $adv)
						<!--begin::Item-->
						<div class="d-flex align-items-center pb-6">
							<!--begin::Symbol-->
							<div class="symbol symbol-circle symbol-success overflow-hidden me-5">
								<span class="symbol-label">
								<img src="{{$adv->image}}" class="h-100 align-self-end" alt="image">
								</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Text-->
							<div class="d-flex flex-column flex-grow-1">
								<label class="fw-bolder text-dark mb-1 font-size-lg">{{$adv->name}}</label>
                                <span class="text-muted fw-medium">IDR {{$inputer->where('adv_name', $adv->name)->sum('total_price') - $inputer->where('adv_name', $adv->name)->sum('product_promotion')}}</span>
							</div>
							<!--end::Text-->
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
