
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 scroll scroll-pull shadow-sm border" data-scroll="true" data-wheel-propagation="true">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Data Closing</span>
												<span class="text-muted mt-1 fw-bold fs-7">{{$inputers->where('admin_id', auth()->user()->admin_id)->count()}} Data</span>
											</h3>
											<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-sm btn-outline border-primary text-primary text-active-white btn-active-secondary me-2" title="Click For Export">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
													<span class="svg-icon svg-icon-3">
														<i class="las la-print text-primary" style="font-size: 18px"></i>
													</span>
													<!--end::Svg Icon-->Export</button>
												<form action="/dashboard" method="GET" class="d-flex">
												<form action="/adv" method="GET" class="d-flex">
													<div class="me-2 d-flex flex-row">
														<input class="form-control mt-0" name="date_filter"  id="date_filter" type="date" style="height: 33px;" onchange="submit()">
														<button type="button" class="btn btn-sm btn-light btn-active-primary ms-2" title="Click For Export">GO</button>
													</div>
												</form>
											</div>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body py-3">
											<!--begin::Table container-->
											<div class="table-responsive">
												<!--begin::Table-->
												<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
													<!--begin::Table head-->
													<thead>
														<tr class="fw-bolder text-muted">
															<th class=""></th>
															<th class=""></th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
														<tr>
                                                            @foreach ($inputers as $inputers)
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<h1 class="text-dark fw-normal fs-6">{{$inputers['id']}}</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<a href="{{ route('viewdata') }}" class="text-dark fw-normal fs-6 text-hover-primary mb-2">
																			{{$inputers['customer_address']}} / CS {{$inputers->lead->user['name']}} / ADV {{$inputers->lead['advertiser']}} / JA Hanif / {{$inputers['product_name']}} {{$inputers['quantity']}} box / {{$inputers['total_price']+$inputers['shipping_price']}} / {{$inputers['promotion']}} / Promo H+1
																		</a>
																	</div>
																</div>
															</td>
                                                            @endforeach
														</tr>
													</tbody>
													<!--end::Table body-->
												</table>
												<!--end::Table-->
											</div>
											<!--end::Table container-->
										</div>
										<!--begin::Body-->
									</div>
									<!--end::Tables Widget 9-->
