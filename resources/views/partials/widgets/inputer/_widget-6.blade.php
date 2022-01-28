
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 scroll scroll-pull shadow-sm" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Customer Service</span>
												<span class="text-muted mt-1 fw-bold fs-7">1 CS</span>
											</h3>
											<div class="card-toolbar" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a Operator">
												<a href="" data-bs-toggle="modal" data-bs-target="#add-operator" class="btn btn-sm btn-light btn-active-primary me-2">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->Add Customer Service</a>
											</div>
											<div class="modal fade" tabindex="-1" id="add-operator">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Add Customer Service</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															{{--  <form action="{{route('addOperator.store')}}" method="POST">  --}}
															<form action="#" method="POST">
																@csrf
		
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputtitle" class="col-form-label">Customer Service</label>
																	</div>
																	<div class="col-10">
		
																		{{--  <input type="text" name="campaign_id" value="{{ $campaigns->id }}" required class="form-control">  --}}
																		<select class="form-control" name="operator_id">
																			<option>Select Operator</option>
																			@foreach ($operators as $operator)
																				<option value="{{ $operator->id }}">
																					{{ $operator->name }}
																				</option>
																			@endforeach
																		</select>
																	</div>
																</div>
		
																{{ csrf_field() }}
																<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Add"/>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- Modal -->
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body py-3">
											<!--begin::Table container-->
											<div class="table-responsive">
												<!--begin::Table-->
												<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="staff">
													<!--begin::Table head-->
													<thead>
														<tr class="fw-bolder text-muted">
															<th class="">Name CS</th>
															<th class="">Phone</th>
															<th class="">Email</th>
                                                            <th class="text-end">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        @foreach ($users as $user)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="symbol symbol-45px me-5 image-size">
																		@if(is_null($user->image))
																		<img src="/assets/img/default.jpg" width="100px" alt="" />
																		@else

																		<img src="{{$user->image}}" width="100px" alt="" />
																		@endif
																	</div>
																	<div class="d-flex justify-content-start flex-column">
																		<label class="text-dark fw-medium text-hover-primary fs-6">Zall</label>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="badge badge-light-info">081245527645</h1>
																</div>
															</td>
															<td>
																<label class="text-dark fw-medium d-block fs-6">zall@zall.com</label>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                                    <form action="{{ route('dashboard.destroy', ['dashboard'=>$user->id]) }}" method="POST">
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
