
									<!--begin::Mixed Widget 5-->
									<div class="card">
										<!--begin::Beader-->
										<div class="card-header border-0 py-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Total Leads</span>
												<span class="text-muted fw-bold fs-7">{{$lead_count}} Leads</span>
                                                <input id="lead_jan" value="{{$lead_jan}}" hidden/>
                                                <input id="lead_feb" value="{{$lead_feb}}" hidden/>
                                                <input id="lead_mar" value="{{$lead_mar}}" hidden/>
                                                <input id="lead_apr" value="{{$lead_apr}}" hidden/>
                                                <input id="lead_may" value="{{$lead_may}}" hidden/>
                                                <input id="lead_jun" value="{{$lead_jun}}" hidden/>
                                                <input id="lead_jul" value="{{$lead_jul}}" hidden/>
                                                <input id="lead_aug" value="{{$lead_aug}}" hidden/>
                                                <input id="lead_sep" value="{{$lead_sep}}" hidden/>
                                                <input id="lead_okt" value="{{$lead_okt}}" hidden/>
                                                <input id="lead_nov" value="{{$lead_nov}}" hidden/>
                                                <input id="lead_des" value="{{$lead_des}}" hidden/>
											</h3>
											<div class="card-toolbar">
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
														<label for="daily" class="menu-link px-3">Daily</label>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#weekly" class="menu-link flex-stack px-3">Weekly</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#monthly" class="menu-link px-3">Monthly</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu 3-->
											</div>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body d-flex flex-column">
											<!--begin::Chart-->
											{{-- <div id="daily" class="" data-kt-chart-color="dark" style="height: 150px"></div> --}}
                                            {{-- <div id="weekly" class="" data-kt-chart-color="dark" style="height: 150px"></div> --}}
                                            <div id="monthly" class="mixed-widget-5-chart card-rounded-top" data-kt-chart-color="dark" style="height: 150px"></div>
											<!--end::Chart-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Mixed Widget 5-->
