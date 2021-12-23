
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 250px">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Product Knowledge</span>
												<span class="text-muted mt-1 fw-bold fs-7">5 Product</span>
											</h3>
											<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">
												<a href="#" data-bs-toggle="modal" data-bs-target="#add-product" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->Add Product</a>
											</div>
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
																</div>
																<div class="modal-body">
																	<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Download">
																		<a href="#" data-bs-toggle="modal" data-bs-target="#add-product" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
																		<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
																			<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Files/Downloads-folder.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"/>
																					<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
																					<path d="M14.8875071,12.8306874 L12.9310336,12.8306874 L12.9310336,10.8230161 C12.9310336,10.5468737 12.707176,10.3230161 12.4310336,10.3230161 L11.4077349,10.3230161 C11.1315925,10.3230161 10.9077349,10.5468737 10.9077349,10.8230161 L10.9077349,12.8306874 L8.9512614,12.8306874 C8.67511903,12.8306874 8.4512614,13.054545 8.4512614,13.3306874 C8.4512614,13.448999 8.49321518,13.5634776 8.56966458,13.6537723 L11.5377874,17.1594334 C11.7162223,17.3701835 12.0317191,17.3963802 12.2424692,17.2179453 C12.2635563,17.2000915 12.2831273,17.1805206 12.3009811,17.1594334 L15.2691039,13.6537723 C15.4475388,13.4430222 15.4213421,13.1275254 15.210592,12.9490905 C15.1202973,12.8726411 15.0058187,12.8306874 14.8875071,12.8306874 Z" fill="#000000"/>
																				</g>
																			</svg><!--end::Svg Icon--></span>
																		<!--end::Svg Icon-->Download Knowledge</a>
																	</div>
																	<div class="card-toolbar mt-5" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Edit">
																		<a href="#" data-bs-toggle="modal" data-bs-target="#add-product" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
																		<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
																			<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Design/Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"/>
																					<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
																					<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
																				</g>
																			</svg><!--end::Svg Icon--></span>
																		<!--end::Svg Icon-->Edit Product</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
                                                @endforeach
											</div>
											<!--end::Table container-->
										</div>
										<!--begin::Body-->
									</div>
									<!--end::Tables Widget 9-->
