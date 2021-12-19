
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Announcements</span>
												<span class="text-muted mt-1 fw-bold fs-7">{{$announcements->count()}} Announcements</span>
											</h3>
											<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a Announcement">
												<a href="#" data-bs-toggle="modal" data-bs-target="#add-announcement" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->Create Announcement</a>
											</div>
											<div class="modal fade" tabindex="-1" id="add-announcement">
												<div class="modal-dialog">
													<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Create Announcement</h5>
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
													<form action="{{ route('announcements.store') }}" method="post" enctype="multipart/form-data">
                                                        @csrf
														<div class="row align-items-center col-12 pb-5">
															<div class="col-4">
																<label for="inputRole" class="col-form-label">Icon</label>
															</div>
															<div class="dropdown col-10">
																<select name="icon_id" id="role_id1" class="form-control">
                                                                    @foreach ($icon as $icon)
                                                                    <option value={{$icon->id}}>{{$icon->fa_name}}</option>
                                                                    @endforeach
																</select>
															</div>
														</div>
														<div class="row align-items-center col-12 pb-5">
															<div class="col-4">
																<label for="inputannouncement" class="col-form-label">Announcement</label>
															</div>
															<div class="col-8">
																<textarea type="text" name="announcement" id="inputannouncement" class="form-control" aria-describedby="announcementHelpInline"></textarea>
															</div>
														</div>
                                                        {{ csrf_field() }}
													    <input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Add Announcement">
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
															<th class="min-w-100px">Created At</th>
															<th class="min-w-100px"></th>
															<th class="min-w-140px">Announcement</th>
															<th class="min-w-100px text-end">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        @foreach ($announcements as $announcement)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$announcement->created_at}}</a>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder text-hover-primary fs-6">{{$announcement->icon}}</h1>
																</div>
															</td>
															<td>
																<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$announcement->announcement}}</a>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                                    <form action="" method="GET">
                                                                        @csrf
                                                                        <button type="submit" data-bs-toggle="modal" data-bs-target="#edit-user" class="btn btn-outline-primary btn-xs m-3 ">
                                                                            Edit
                                                                        </button>
                                                                    </form>
                                                                    <form action="" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
																	    <button type="submit" class="btn btn-danger btn-xs m-3" value="Delete"  onclick="return confirm('Jadi Delete Kah ?')">Delete</button>
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
