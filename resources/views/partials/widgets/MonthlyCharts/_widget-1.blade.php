									<!--begin::Charts Widget 1-->
									<div class="card card-l-stretch">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5" style="background-color: #00509d;">
											<!--begin::Title-->
											<h3 class="card-title align-items-start flex-column mt-n3">
												<span class="card-label fw-bolder fs-3 mb-1 text-white">Income & Advertising Cost</span>
												<span class="text-white fw-bold fs-7">Monthly</span>
                                                <input id="omset_jan" value="{{$omset_jan->sum('total_price') - $omset_jan->sum('product_promotion')}}" hidden/>
                                                <input id="omset_feb" value="{{$omset_feb->sum('total_price') - $omset_feb->sum('product_promotion')}}" hidden/>
                                                <input id="omset_mar" value="{{$omset_mar->sum('total_price') - $omset_mar->sum('product_promotion')}}" hidden/>
                                                <input id="omset_apr" value="{{$omset_apr->sum('total_price') - $omset_apr->sum('product_promotion')}}" hidden/>
                                                <input id="omset_may" value="{{$omset_may->sum('total_price') - $omset_may->sum('product_promotion')}}" hidden/>
                                                <input id="omset_jun" value="{{$omset_jun->sum('total_price') - $omset_jun->sum('product_promotion')}}" hidden/>
                                                <input id="omset_jul" value="{{$omset_jul->sum('total_price') - $omset_jul->sum('product_promotion')}}" hidden/>
                                                <input id="omset_aug" value="{{$omset_aug->sum('total_price') - $omset_aug->sum('product_promotion')}}" hidden/>
                                                <input id="omset_sep" value="{{$omset_sep->sum('total_price') - $omset_sep->sum('product_promotion')}}" hidden/>
                                                <input id="omset_okt" value="{{$omset_okt->sum('total_price') - $omset_okt->sum('product_promotion')}}" hidden/>
                                                <input id="omset_nov" value="{{$omset_nov->sum('total_price') - $omset_nov->sum('product_promotion')}}" hidden/>
                                                <input id="omset_des" value="{{$omset_des->sum('total_price') - $omset_des->sum('product_promotion')}}" hidden/>

                                                <input id="advertising_jan" value="{{$advertising_jan}}" hidden/>
                                                <input id="advertising_feb" value="{{$advertising_feb}}" hidden/>
                                                <input id="advertising_mar" value="{{$advertising_mar}}" hidden/>
                                                <input id="advertising_apr" value="{{$advertising_apr}}" hidden/>
                                                <input id="advertising_may" value="{{$advertising_may}}" hidden/>
                                                <input id="advertising_jun" value="{{$advertising_jun}}" hidden/>
                                                <input id="advertising_jul" value="{{$advertising_jul}}" hidden/>
                                                <input id="advertising_aug" value="{{$advertising_aug}}" hidden/>
                                                <input id="advertising_sep" value="{{$advertising_sep}}" hidden/>
                                                <input id="advertising_okt" value="{{$advertising_okt}}" hidden/>
                                                <input id="advertising_nov" value="{{$advertising_nov}}" hidden/>
                                                <input id="advertising_des" value="{{$advertising_des}}" hidden/>

                                                <input id="product_count" value="{{$products->count()}}" hidden/>
											</h3>
											<!--end::Title-->
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
										<div class="card-body">
											<!--begin::Chart-->
											<div id="kt_charts_widget_1_chart" style="height: 303px"></div>
											<!--end::Chart-->
											<h1 class="text-dark fw-medium fs-6 text-center"><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Text/Dots.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1">
													<rect x="14" y="9" width="6" height="6" rx="3" fill="black"/>
													{{-- <rect x="3" y="9" width="6" height="6" rx="3" fill="black" fill-opacity="0.7"/> --}}
												</g>
											</svg><!--end::Svg Icon--></span>Income
											<span class="svg-icon svg-icon-secondary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Text/Dots.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1">
													<rect x="14" y="9" width="6" height="6" rx="3" fill="black"/>
													{{-- <rect x="3" y="9" width="6" height="6" rx="3" fill="black" fill-opacity="0.7"/> --}}
												</g>
											</svg><!--end::Svg Icon--></span>Advertising Cost</h1>
										</div>
										<!--end::Body-->
									</div>
									<!--end::Charts Widget 1-->
