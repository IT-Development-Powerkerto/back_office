
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Staff</span>
												<span class="text-muted mt-1 fw-bold fs-7">500 Staff</span>
											</h3>
											<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">
												<a href="#" data-bs-toggle="modal" data-bs-target="#add-user" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->New Member</a>
											</div>
											<div class="modal fade" tabindex="-1" id="add-user">
												<div class="modal-dialog">
													<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Add User</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">

													@if(session()->has('success'))
														<div class="alert alert-success alert-dismissible fade show" role="alert">
															{{ session('success') }}
															<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
														</div>
													@endif

													@if(session()->has('error'))
														<div class="alert alert-danger alert-dismissible fade show" role="alert">
															{{ session('error') }}
															<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
														</div>
													@endif
													<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
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
																<input type="text" name="email" id="inputEmail" class="form-control" aria-describedby="emailHelpInline">
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
																<label for="inputPassword6" class="col-form-label">Role</label>
															</div>
															<div class="dropdown col-10">
																<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
																	Role
																</a>

																<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" name="role_id">
																	<li class="dropdown-item">Admin</a></li>
																	<li class="dropdown-item">CEO</a></li>
																	<li class="dropdown-item">Project Manager</a></li>
																	<li class="dropdown-item">HRD</a></li>
																	<li class="dropdown-item">Advertiser</a></li>
																	<li class="dropdown-item">Costumer Service</a></li>
																	<li class="dropdown-item">Design Grapich Multimedia</a></li>
																	<li class="dropdown-item">Content Web Marketing</a></li>
																	<li class="dropdown-item">IT Development</a></li>
																</ul>
															</div>
														</div>

														<div class="row align-items-center col-12 pb-5">
															<div class="col-2">
																<label for="inputPassword6" class="col-form-label">Image</label>
															</div>
															<div class="dropdown col-10">
																<div class="mb-3">
																	<input class="form-control" type="file" name="image" id="formFileMultiple" multiple>
																</div>
															</div>
														</div>

													<button type="submit" class="btn btn-primary mt-5 tombol center">Add</button>
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
															<th class="min-w-100px text-end">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        @foreach ($users as $user)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="symbol symbol-45px me-5">
																		<img src="/image/{{$user->image}}" width="100px" alt="" />
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
															<td>
																<div class="d-flex justify-content-end flex-shrink-0">
																	<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
																				<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																	<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																	<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
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
