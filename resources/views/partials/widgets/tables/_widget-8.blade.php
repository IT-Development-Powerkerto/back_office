									
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Customer Relationship Management</span>
												<span class="text-muted mt-1 fw-bold fs-7">1 CRM</span>
											</h3>
											<!-- <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">
												<a href="#" data-bs-toggle="modal" data-bs-target="#add-user" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
												
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
													</svg>
												</span>Add Staff</a>
											</div> -->
											<!-- <div class="modal fade" tabindex="-1" id="add-user">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Add Staff</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<form action="{{ route('dashboard.store') }}" method="post" enctype="multipart/form-data">
																@csrf
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputFullname" class="col-form-label">Fullname</label>
																	</div>
																	<div class="col-10">
																		<input type="text" name="name" id="inputFullname" class="form-control" aria-describedby="fullnameHelpInline">
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputEmail" class="col-form-label">Email</label>
																	</div>
																	<div class="col-10">
																		<input type="email" name="email" id="inputEmail" class="form-control" aria-describedby="emailHelpInline">
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputPhone" class="col-form-label">Phone</label>
																	</div>
																	<div class="col-10">
																		<input type="text" name="phone" id="inputPhone" class="form-control" aria-describedby="phoneHelpInline">
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputUsername" class="col-form-label">Username</label>
																	</div>
																	<div class="col-10">
																		<input type="text" name="username" id="inputUsername" class="form-control" aria-describedby="usernameHelpInline">
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputPassword6" class="col-form-label">Password</label>
																	</div>
																	<div class="col-10">
																		<input type="password" name="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputRole" class="col-form-label">Role</label>
																	</div>
																	<div class="dropdown col-10">
																		<select name="role_id" id="role_id" class="form-control">
																			@foreach ($role as $role)
																			<option value={{$role->id}}>{{$role->name}}</option>
																			@endforeach
																		</select>
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
																{{ csrf_field() }}
																<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Add Staff">
															</form>
														</div>
													</div>
												</div>
											</div> -->
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
															<th class="min-w-50px">No</th>
															<th class="min-w-130px">Advertiser</th>
															<th class="min-w-130px">Operator</th>
															<th class="min-w-120px">Product</th>
															<th class="min-w-120px">Quantity</th>
															<th class="min-w-120px">Price</th>
															<th class="min-w-120px">Total</th>
															<th class="min-w-120px">Time's</th>
															<th class="min-w-120px">Progress</th>
															<th class="min-w-100px text-end">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>

														<tr>
															<td>
																<div class="d-flex align-items-center ">
																	<h1 class="text-dark fw-bolder fs-6">1</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">Muh Faizal</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">Zall</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-primary fw-bolder fs-6">Freshmag</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">2</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">250000</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">500000</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">00:49</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6 badge badge-light-danger">Process Now</h1>
																</div>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                                    <form action="" method="GET">
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

														<tr>
															<td>
																<div class="d-flex align-items-center ">
																	<h1 class="text-dark fw-bolder fs-6">2</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">Muh Faizal</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">Zall</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-primary fw-bolder fs-6">Freshmag</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">2</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">250000</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">500000</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">05:00</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6 badge badge-light-primary">Processing</h1>
																</div>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
																	<form action="" method="GET">
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

														<tr>
															<td>
																<div class="d-flex align-items-center ">
																	<h1 class="text-dark fw-bolder fs-6">3</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">Muh Faizal</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">Zall</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-primary fw-bolder fs-6">Freshmag</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">2</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">250000</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">500000</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6">03:25</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder fs-6 badge badge-light-success">Closing</h1>
																</div>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                                    <form action="" method="GET">
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
