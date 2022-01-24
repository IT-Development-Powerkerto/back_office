
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
												<button type="button" class="btn btn-sm btn-light btn-active-primary me-2" title="Click For Export" data-bs-toggle="modal" data-bs-target="#exampleModal">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
													<span class="svg-icon svg-icon-3">
														<i class="las la-print" style="font-size: 18px"></i>
													</span>
													<!--end::Svg Icon-->Export</button>

												<!-- Modal -->
												<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">

															<form action="{{ route('export-inputer')}}" method="GET">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Export To Excel</h5>
																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<div class="modal-body">
																	<div class="row align-items-center col-12 pb-5">
																		<div class="col-5">
																			<input class="form-control mt-0" name="from_date"  id="from_date" type="date" style="height: 33px;">
																		</div>
																		<div class="col-2">
																			<h3 class="text-center text-dark fw-bolder fs-6 pt-3">Until</h3>
																		</div>
																		<div class="col-5">
																			<input class="form-control mt-0" name="to_date"  id="to_date" type="date" style="height: 33px;">
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="submit" class="btn btn-sm btn-primary btn-active-info me-2" title="Click For Export">
																	<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
																	<span class="svg-icon svg-icon-3">
																		<i class="las la-print" style="font-size: 18px"></i>
																	</span>
																	<!--end::Svg Icon-->Export</button>
																</div>
															</form>
														</div>
													</div>
												</div>
												<form action="/inputer" method="GET" class="d-flex">
													<div class="me-2 d-flex flex-row">
														<input class="form-control mt-0" name="date_filter" id="date_filter" type="date" style="height: 33px;" onchange="submit()">
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
													@foreach ($inputers as $inputer)
													<tbody>
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<h1 class="text-dark fw-normal fs-6">{{$inputer['id']}}</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<a href="{{ route('viewdata',['id' => $inputer->id]) }}" class="text-dark fw-normal fs-6 text-hover-primary mb-2">
																			{{$inputer['customer_address']}} / CS {{$inputer->lead->user['name']}} / ADV {{$inputer->lead['advertiser']}} / JA Hanif / {{$inputer['product_name']}} {{$inputer['quantity']}} box / {{$inputer['total_price']+$inputer['shipping_price']}} / {{$inputer['promotion_price']}} / {{ $inputer->promotion['promotion_name'] ?? 'Not Have Promotion'}}
																		</a>
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
													@endforeach
													<!--end::Table body-->
												</table>
												<!--end::Table-->
											</div>
											<!--end::Table container-->
										</div>
										<!--begin::Body-->
									</div>
									<!--end::Tables Widget 9-->
