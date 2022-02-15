
									<!--begin::Mixed Widget 5-->
									<div class="card">
										<!--begin::Beader-->
										<div class="card-header border-0 py-3" style="background-color: #00509d;">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1 text-white">Total Leads</span>
												<span class="text-white fw-bold fs-7">{{$lead_count}} Leads @ Month</span>
                                                <input id="lead_jan" value="{{$lead_jan->count()}}" hidden/>
                                                <input id="lead_feb" value="{{$lead_feb->count()}}" hidden/>
                                                <input id="lead_mar" value="{{$lead_mar->count()}}" hidden/>
                                                <input id="lead_apr" value="{{$lead_apr->count()}}" hidden/>
                                                <input id="lead_may" value="{{$lead_may->count()}}" hidden/>
                                                <input id="lead_jun" value="{{$lead_jun->count()}}" hidden/>
                                                <input id="lead_jul" value="{{$lead_jul->count()}}" hidden/>
                                                <input id="lead_aug" value="{{$lead_aug->count()}}" hidden/>
                                                <input id="lead_sep" value="{{$lead_sep->count()}}" hidden/>
                                                <input id="lead_okt" value="{{$lead_okt->count()}}" hidden/>
                                                <input id="lead_nov" value="{{$lead_nov->count()}}" hidden/>
                                                <input id="lead_des" value="{{$lead_des->count()}}" hidden/>
												<input id="lead_month_max" value="{{$lead_month_max}}" hidden/>
                                                <input id="product_count" value="{{$products->count()}}" hidden/>
                                                <?php
                                                    $n=0;
                                                    $jan=0;
                                                    $feb=0;
                                                    $mar=0;
                                                    $apr=0;
                                                    $may=0;
                                                    $jun=0;
                                                    $jul=0;
                                                    $aug=0;
                                                    $sep=0;
                                                    $okt=0;
                                                    $nov=0;
                                                    $des=0;
                                                ?>
                                                @foreach ($products as $product)
                                                    {{-- <input id="{{$product->name}}" value="{{$inputer->where('product_name', $product->name)->sum('total_price') - $inputer->where('product_name', $product->name)->sum('product_promotion')}}" hidden/> --}}

                                                    <input id="{{$jan+=1}} bottle_jan" value="{{$omset_jan->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                                    <input id="{{$feb+=1}} bottle_feb" value="{{$omset_feb->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                                    <input id="{{$mar+=1}} bottle_mar" value="{{$omset_mar->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                                    <input id="{{$apr+=1}} bottle_apr" value="{{$omset_apr->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                                    <input id="{{$may+=1}} bottle_may" value="{{$omset_may->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                                    <input id="{{$jun+=1}} bottle_jun" value="{{$omset_jun->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                                    <input id="{{$jul+=1}} bottle_jul" value="{{$omset_jul->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                                    <input id="{{$aug+=1}} bottle_aug" value="{{$omset_aug->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                                    <input id="{{$sep+=1}} bottle_sep" value="{{$omset_sep->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                                    <input id="{{$okt+=1}} bottle_okt" value="{{$omset_okt->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                                    <input id="{{$nov+=1}} bottle_nov" value="{{$omset_nov->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                                    <input id="{{$des+=1}} bottle_des" value="{{$omset_des->where('product_name', $product->name)->sum('quantity')}}" hidden/>

                                                    <input id="product {{$n+=1}}" value="{{$product->name}}" hidden/>
                                                @endforeach
											</h3>
											{{-- <div class="card-toolbar">
												<!--begin::Menu-->
												<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
														<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Filters</div>
													</div>
													<!--end::Heading-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">Dayly</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link flex-stack px-3">Weekly</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">Monthly</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu 3-->
											</div> --}}
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body d-flex flex-column">
											<!--begin::Chart-->
											<div class="mixed-widget-5-chart card-rounded-top" data-kt-chart-color="dark" style="height: 165px"></div>
											<!--end::Chart-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Mixed Widget 5-->
