
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Staff</span>
												<span class="text-muted mt-1 fw-bold fs-7">{{$users->count()}} Staff</span>
											</h3>
											<div class="modal fade" tabindex="-1" id="add-user">
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
															<th class="min-w-100px">Name</th>
															<th class="min-w-100px">Point</th>
															<th class="min-w-140px">Division</th>
															<th class="min-w-120px">Status</th>
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
																		<img src="{{$user->image}}" width="100px" alt="" />
																	</div>
																	<div class="d-flex justify-content-start flex-column">
																		<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$user->name}}</a>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder text-hover-primary fs-6">50 Points </h1>
																</div>
															</td>
															<td>
																<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$user->role->name}}</a>
															</td>
															<td class="text-end">
																<div class="d-flex flex-column w-100 me-2">
																	<div class="d-flex flex-stack">
                                                                        @if ($user->status_id == 1)
                                                                            <span class="badge badge-light-success">{{$user->status->name}}</span>
                                                                        @else
                                                                            <span class="badge badge-light-danger">{{$user->status->name}}</span>
                                                                        @endif
																	</div>
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