
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Lead tunneling</span>
												<span class="text-muted mt-1 fw-bold fs-7">{{$leads->count()}} Lead</span>
											</h3>
											<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
												<a href=/ld class="btn btn-sm btn-light btn-active-primary mx-2" title="Click For Detail">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
												<span class="svg-icon svg-icon-3">
													<i class="fas fa-chart-line"></i>
												</span>
												<!--end::Svg Icon-->Detail</a>

												<form action="#" method="GET" class="d-flex">
													<input class="form-control mt-0" name="search" type="search" placeholder="Search" aria-label="Search" style="height: 33px;">
													<button class="btn mt-n2" type="submit" style="height: 30px;"><i class="fas fa-search fas-7x"></i></button>
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
														<tr class="fw-medium text-muted">
															<th class="min-w-50px">No</th>
															<th class="min-w-130px">Advertiser</th>
															<th class="min-w-130px">Operator</th>
															<th class="min-w-120px">Product</th>
															<th class="min-w-120px">Quantity</th>
															<th class="min-w-120px">Price</th>
															<th class="min-w-120px">Total</th>
															<th class="min-w-120px">Response Time</th>
															<th class="min-w-120px">Progress</th>
															<th class="min-w-100px text-end">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        <?php $n=0; ?>
                                                        @foreach ($leads as $lead)
														<tr>
															<td>
																<div class="d-flex align-items-center ">
																	<h1 class="text-dark fw-medium fs-6">{{$n+=1}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-medium fs-6">{{ $lead->advertiser }}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-medium fs-6">{{ $lead->operator->name }}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-primary fw-medium fs-6">{{$lead->product->name}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-medium fs-6">{{$lead->quantity}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-medium fs-6">{{$lead->price}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-medium fs-6">{{$lead->total_price}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center clock{{ $lead->id }}">
																	{{-- <h1 class="text-dark fw-bolder fs-6"><span id="time">05:00</span></h1> --}}
                                                                    <script>
                                                                        window.addEventListener('load', function() {
                                                                            var fiveMinutes{{ $lead->id}} = 60*5,
                                                                            display = document.querySelector('.clock{{ $lead->id }}');
                                                                            startTimer(fiveMinutes{{$lead->id}}, display);
                                                                        });
                                                                    </script>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6 badge badge-light-danger">{{ $lead->status->name }}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                                    <form action="{{ route('lead.edit',['lead' => $lead->id]) }}" method="GET">
                                                                        @csrf
																		<div class="btn-toolbar justify-content-between px-2" role="toolbar" aria-label="Toolbar with button groups">
																			<div class="btn-group" role="group" aria-label="First group">
																				<button type="submit" data-bs-toggle="modal" data-bs-target="#edit-user" class="btn btn-primary  btn-icon"><i class="la la-user-edit"></i></button>
																			</div>
																		</div>
                                                                    </form>
                                                                    <form action="" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
																		<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
																			<div class="btn-group" role="group" aria-label="First group">
																				<button type="submit" class="btn btn-danger btn-icon" onclick="return confirm('Jadi Delete Kah ?')"><i class="la la-trash"></i></button>
																			</div>
																		</div>
                                                                    </form>
																</div>
															</td>
														</tr>
                                                        @endforeach
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
