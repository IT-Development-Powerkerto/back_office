									<!--begin::Charts Widget 1-->
									<div class="card card-l-stretch">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<!--begin::Title-->
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Income & Advertising Cost</span>
												<span class="text-muted fw-bold fs-7">Daily</span>
                                                <input id="omset_su" value="{{$omset_su->sum('total_price') - $omset_su->sum('product_promotion')}}" hidden/>
                                                <input id="omset_mo" value="{{$omset_mo->sum('total_price') - $omset_mo->sum('product_promotion')}}" hidden/>
                                                <input id="omset_tu" value="{{$omset_tu->sum('total_price') - $omset_tu->sum('product_promotion')}}" hidden/>
                                                <input id="omset_we" value="{{$omset_we->sum('total_price') - $omset_we->sum('product_promotion')}}" hidden/>
                                                <input id="omset_th" value="{{$omset_th->sum('total_price') - $omset_th->sum('product_promotion')}}" hidden/>
                                                <input id="omset_fr" value="{{$omset_fr->sum('total_price') - $omset_fr->sum('product_promotion')}}" hidden/>
                                                <input id="omset_sa" value="{{$omset_sa->sum('total_price') - $omset_sa->sum('product_promotion')}}" hidden/>

                                                <input id="advertising_su" value="{{$advertising_su}}" hidden/>
                                                <input id="advertising_mo" value="{{$advertising_mo}}" hidden/>
                                                <input id="advertising_tu" value="{{$advertising_tu}}" hidden/>
                                                <input id="advertising_we" value="{{$advertising_we}}" hidden/>
                                                <input id="advertising_th" value="{{$advertising_th}}" hidden/>
                                                <input id="advertising_fr" value="{{$advertising_fr}}" hidden/>
                                                <input id="advertising_sa" value="{{$advertising_sa}}" hidden/>
											</h3>
											<!--end::Title-->
											<div class="card-toolbar">
												<!--begin::Menu-->
												{{-- <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"> --}}
													<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
													{{-- <span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
																<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
																<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
																<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
															</g>
														</svg>
													</span> --}}
													<!--end::Svg Icon-->
												{{-- </button> --}}

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
											</div>
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
