
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 scroll scroll-pull shadow-sm border mt-6" data-scroll="true" data-wheel-propagation="true">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Activity Evaluation</span>
												<span class="text-muted mt-1 fw-bold fs-7">{{$budgeting->where('admin_id', auth()->user()->admin_id)->where('status', '!=', 2)->where('requirement', '>=', 1000000)->count()}} Activity</span>
											</h3>
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
															<th class="min-w-50px">No</th>
															<th class="min-w-150px">Name</th>
															<th class="min-w-150px">Product Name</th>
															<th class="min-w-150px">Date</th>
															<th class="min-w-100px">Time</th>
															<th class="min-w-150px">Resistance</th>
															<th class="min-w-150px">Solution</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<h1 href="#" class="text-dark fw-normal fs-6">1</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">Diska</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">Generos</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">20-02-2022</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">10:00</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores itaque ea saepe soluta odio dolores reiciendis odit tenetur hic fugiat.</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores itaque ea saepe soluta odio dolores reiciendis odit tenetur hic fugiat.</h1>
																</div>
															</td>
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
