
									<!--begin::Mixed Widget 5-->
									<div class="card">
										<!--begin::Beader-->
										<div class="card-header border-0 py-3" style="background-color: #00509d;">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1 text-white">Total Closing</span>
												<span class="text-white fw-bold fs-7">
                                                    <script>
                                                        var bilangan = {{$closing_count}};

                                                        var	number_string = bilangan.toString(),
                                                            sisa 	= number_string.length % 3,
                                                            rupiah 	= number_string.substr(0, sisa),
                                                            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                        if (ribuan) {
                                                            separator = sisa ? '.' : '';
                                                            rupiah += separator + ribuan.join('.');
                                                        }

                                                        document.write(rupiah);
                                                    </script> Closing @ Week
                                                </span>
                                                <input id="closing_week1" value="{{$closing_week1->count()}}" hidden/>
                                                <input id="closing_week2" value="{{$closing_week2->count()}}" hidden/>
                                                <input id="closing_week3" value="{{$closing_week3->count()}}" hidden/>
                                                <input id="closing_week4" value="{{$closing_week4->count()}}" hidden/>
												<input id="closing_week_max" value="{{$closing_week_max}}" hidden/>

                                                <input id="product_count" value="{{$products->count()}}" hidden/>

                                                <?php
                                                    $n=0;
                                                    $week1=0;
                                                    $week2=0;
                                                    $week3=0;
                                                    $week4=0;
                                                ?>
                                                @foreach ($products as $product)
                                                    {{-- <input id="{{$product->name}}" value="{{$inputer->where('product_name', $product->name)->sum('total_price') - $inputer->where('product_name', $product->name)->sum('product_promotion')}}" hidden/> --}}
                                                    <input id="{{$week1+=1}} omset_week1" value="{{$omset_week1->where('product_name', $product->name)->sum('total_price') - $omset_week1->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                                    <input id="{{$week2+=1}} omset_week2" value="{{$omset_week2->where('product_name', $product->name)->sum('total_price') - $omset_week2->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                                    <input id="{{$week3+=1}} omset_week3" value="{{$omset_week3->where('product_name', $product->name)->sum('total_price') - $omset_week3->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                                    <input id="{{$week4+=1}} omset_week4" value="{{$omset_week4->where('product_name', $product->name)->sum('total_price') - $omset_week4->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>

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
