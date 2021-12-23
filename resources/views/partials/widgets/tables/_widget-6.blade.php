									
									<!--begin::Tables Widget 9-->
									<div class="card card-l-stretch mb-5 mb-xl-8 pb-4 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 315px">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Product</span>
												<span class="text-muted mt-1 fw-bold fs-7">1 Product</span>
											</h3>
											<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a product">
												<a href="#" data-bs-toggle="modal" data-bs-target="#add-product" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->Add Produk</a>
											</div>
											<div class="modal fade" tabindex="-1" id="add-product">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Add Product</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<form action="{{ route('dashboard.store') }}" method="post" enctype="multipart/form-data">
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
																		<input type="price" name="price" id="inputprice" class="form-control" aria-describedby="priceHelpInline">
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputdiscount" class="col-form-label">Discount</label>
																	</div>
																	<div class="col-10">
																		<input type="text" name="discount" id="inputdiscount" class="form-control" aria-describedby="discountHelpInline">
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputimage" class="col-form-label">Image</label>
																	</div>
																	<div class="dropdown col-10">
																		<div class="mb-3">
																			<input class="form-control" type="file" id="inputimage" name="image" id="formFileMultiple" multiple id>
																		</div>
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputproduct_link6" class="col-form-label">Product Link</label>
																	</div>
																	<div class="col-10">
																		<input type="product_link" name="product_link" id="inputproduct_link6" class="form-control" aria-describedby="passwordHelpInline">
																	</div>
																</div>
																{{ csrf_field() }}
																<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Add Product">
															</form>
														</div>
													</div>
												</div>
											</div>


											<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">

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
															<th class="min-w-30px">No</th>
															<th class="min-w-100px">Name</th>
															<th class="min-w-100px text-end">Action</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder text-hover-primary fs-6">1</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<div class="symbol symbol-45px me-5">
																		<img src="assets/media/avatars/150-11.jpg" alt="" />
																	</div>
																	<div class="d-flex justify-content-start flex-column">
																		<span class="text-dark fw-bolder text-hover-primary fs-6">Freshmag</span>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                                    <form action="{{ route('product.edit',['product' => $products->id]) }}" method="GET">
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
									