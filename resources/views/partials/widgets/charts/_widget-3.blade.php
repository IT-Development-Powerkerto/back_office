
									<!--begin::Mixed Widget 5-->
									<div class="card">
										<!--begin::Beader-->
										<div class="card-header border-0 py-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Total Closing</span>
												<span class="text-muted fw-bold fs-7">{{$closing_count}} Closing</span>
                                                <input id="closing_jan" value="{{$closing_jan}}" hidden/>
                                                <input id="closing_feb" value="{{$closing_feb}}" hidden/>
                                                <input id="closing_mar" value="{{$closing_mar}}" hidden/>
                                                <input id="closing_apr" value="{{$closing_apr}}" hidden/>
                                                <input id="closing_may" value="{{$closing_may}}" hidden/>
                                                <input id="closing_jun" value="{{$closing_jun}}" hidden/>
                                                <input id="closing_jul" value="{{$closing_jul}}" hidden/>
                                                <input id="closing_aug" value="{{$closing_aug}}" hidden/>
                                                <input id="closing_sep" value="{{$closing_sep}}" hidden/>
                                                <input id="closing_okt" value="{{$closing_okt}}" hidden/>
                                                <input id="closing_nov" value="{{$closing_nov}}" hidden/>
                                                <input id="closing_des" value="{{$closing_des}}" hidden/>
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
											<div class="mixed-widget-6-chart card-rounded-top" data-kt-chart-color="danger" style="height: 150px"></div>
											<!--end::Chart-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Mixed Widget 5-->
