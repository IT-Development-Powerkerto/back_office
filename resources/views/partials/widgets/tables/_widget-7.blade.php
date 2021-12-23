
									<!--begin::Tables Widget 9-->
									<div class="card card-l-stretch mb-5 mb-xl-8 pb-4 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 315px">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Information</span>
											</h3>
											<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">

											</div>
<<<<<<< HEAD
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
															<th class="min-w-100px">Product</th>
															<th class="min-w-90px">Link</th>
															<th class="min-w-80px">Visitors</th>
															<th class="min-w-80px">Leads</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder text-hover-primary fs-6">Etawa</h1>
																</div>
															</td>
															<td>
																<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">Link</a>
															</td>
															<td class="text-end">
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder text-hover-primary fs-6">100</h1>
=======
											<div class="modal fade" tabindex="-1" id="add-product">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Add Product</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
																@csrf
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputFullname" class="col-form-label">Name</label>
																	</div>
																	<div class="col-10">
																		<input type="text" name="name" id="inputFullname" class="form-control" aria-describedby="fullnameHelpInline">
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputprice" class="col-form-label">Price</label>
																	</div>
																	<div class="col-10">
																		<input type="number" name="price" id="inputprice" class="form-control" aria-describedby="priceHelpInline">
																	</div>
>>>>>>> 5411b61b55da21836db41dd22aba31d6aa5b965e
																</div>
															</td>
															<td>
																<div class="d-flex align-items-end">
																	<h1 class="text-dark fw-bolder text-hover-primary fs-6">50</h1>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder text-hover-primary fs-6">Gizidat</h1>
																</div>
															</td>
															<td>
																<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">Link</a>
															</td>
															<td class="text-end">
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder text-hover-primary fs-6">100</h1>
																</div>
<<<<<<< HEAD
															</td>
															<td>
																<div class="d-flex align-items-end">
																	<h1 class="text-dark fw-bolder text-hover-primary fs-6">50</h1>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder text-hover-primary fs-6">Generos</h1>
																</div>
															</td>
															<td>
																<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">Link</a>
															</td>
															<td class="text-end">
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder text-hover-primary fs-6">100</h1>
=======
																{{ csrf_field() }}
																<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Add Product">
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body py-3 ">
											<!--begin::Table container-->
											<div class="row row-cols-10 d-flex justify-content-center knowledge">
                                                @foreach ($products as $product)
												<div class="col-2 text-center knowledge1">
													<img src="{{$product->image}}" width="130" height="130" alt="Freshmag" data-bs-toggle="modal" data-bs-target="#add-product-1">
													<div class="menu-link">
														<a href="#" class="text-dark fw-bolder fs-6">{{$product->name}}</a>
													</div>
													<div class="modal fade" tabindex="-1" id="add-product-1">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title">Actions</h5>
																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
>>>>>>> 5411b61b55da21836db41dd22aba31d6aa5b965e
																</div>
															</td>
															<td>
																<div class="d-flex align-items-end">
																	<h1 class="text-dark fw-bolder text-hover-primary fs-6">50</h1>
																</div>
<<<<<<< HEAD
															</td>
														</tr>
													</tbody>
													<!--end::Table body-->
												</table>
												<!--end::Table-->
=======
															</div>
														</div>
													</div>
												</div>
                                                @endforeach
>>>>>>> 5411b61b55da21836db41dd22aba31d6aa5b965e
											</div>
											<!--end::Table container-->
										</div>
										<!--begin::Body-->
									</div>
									<!--end::Tables Widget 9-->
									