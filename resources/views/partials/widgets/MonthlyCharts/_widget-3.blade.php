
									<!--begin::Mixed Widget 5-->
									<div class="card">
										<!--begin::Beader-->
										<div class="card-header border-0 py-3" style="background-color: #00509d;">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1 text-white">Total Closing</span>
												<span class="text-white fw-bold fs-7">{{$closing_count}} Closing @ Month</span>
                                                <input id="closing_jan" value="{{$closing_jan->count()}}" hidden/>
                                                <input id="closing_feb" value="{{$closing_feb->count()}}" hidden/>
                                                <input id="closing_mar" value="{{$closing_mar->count()}}" hidden/>
                                                <input id="closing_apr" value="{{$closing_apr->count()}}" hidden/>
                                                <input id="closing_may" value="{{$closing_may->count()}}" hidden/>
                                                <input id="closing_jun" value="{{$closing_jun->count()}}" hidden/>
                                                <input id="closing_jul" value="{{$closing_jul->count()}}" hidden/>
                                                <input id="closing_aug" value="{{$closing_aug->count()}}" hidden/>
                                                <input id="closing_sep" value="{{$closing_sep->count()}}" hidden/>
                                                <input id="closing_okt" value="{{$closing_okt->count()}}" hidden/>
                                                <input id="closing_nov" value="{{$closing_nov->count()}}" hidden/>
                                                <input id="closing_des" value="{{$closing_des->count()}}" hidden/>
												<input id="closing_month_max" value="{{$closing_month_max}}" hidden/>

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
                                                    <input id="{{$jan+=1}} omset_jan" value="{{$omset_jan->where('product_name', $product->name)->sum('total_price') - $omset_jan->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                                    <input id="{{$feb+=1}} omset_feb" value="{{$omset_feb->where('product_name', $product->name)->sum('total_price') - $omset_feb->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                                    <input id="{{$mar+=1}} omset_mar" value="{{$omset_mar->where('product_name', $product->name)->sum('total_price') - $omset_mar->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                                    <input id="{{$apr+=1}} omset_apr" value="{{$omset_apr->where('product_name', $product->name)->sum('total_price') - $omset_apr->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                                    <input id="{{$may+=1}} omset_may" value="{{$omset_may->where('product_name', $product->name)->sum('total_price') - $omset_may->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                                    <input id="{{$jun+=1}} omset_jun" value="{{$omset_jun->where('product_name', $product->name)->sum('total_price') - $omset_jun->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                                    <input id="{{$jul+=1}} omset_jul" value="{{$omset_jul->where('product_name', $product->name)->sum('total_price') - $omset_jul->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                                    <input id="{{$aug+=1}} omset_aug" value="{{$omset_aug->where('product_name', $product->name)->sum('total_price') - $omset_aug->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                                    <input id="{{$sep+=1}} omset_sep" value="{{$omset_sep->where('product_name', $product->name)->sum('total_price') - $omset_sep->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                                    <input id="{{$okt+=1}} omset_okt" value="{{$omset_okt->where('product_name', $product->name)->sum('total_price') - $omset_okt->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                                    <input id="{{$nov+=1}} omset_nov" value="{{$omset_nov->where('product_name', $product->name)->sum('total_price') - $omset_nov->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                                    <input id="{{$des+=1}} omset_des" value="{{$omset_des->where('product_name', $product->name)->sum('total_price') - $omset_des->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>

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

												<!--end::Menu-->
											</div> --}}
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body d-flex flex-column">
											<!--begin::Chart-->
											<div class="mixed-widget-6-chart card-rounded-top" data-kt-chart-color="warning" style="height: 165px"></div>
											<!--end::Chart-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Mixed Widget 5-->
