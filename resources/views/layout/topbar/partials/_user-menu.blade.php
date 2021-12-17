											
											<!--begin::Menu-->
											<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<div class="menu-content d-flex align-items-center px-3">
														<!--begin::Avatar-->
														<div class="symbol symbol-50px me-5">
															<img alt="Logo" src="assets/media/avatars/150-26.jpg" />
														</div>
														<!--end::Avatar-->
														<!--begin::Username-->
														<div class="d-flex flex-column">
															<div class="fw-bolder d-flex align-items-center fs-5">Max Smith</div>
															<a href="#" class="fw-bold text-muted text-hover-primary fs-7">max@kt.com</a>
														</div>
														<!--end::Username-->
													</div>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu separator-->
												<div class="separator my-2"></div>
												<!--end::Menu separator-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
													<a href="?page=account/overview" class="menu-link px-5">My Profile</a>
												</div>
												<!--end::Menu item-->
												
												<!--begin::Menu item-->
												<div class="menu-item px-5">
												<form action="/logout" method="POST">
												@csrf
													<button type="submit" class="nav-link px-5 bg-light border-0"><span data-feather="log-out"></span> Logout</button>
												</form>
												</div>
												<!--end::Menu item-->
											</div>
											<!--end::Menu-->
											