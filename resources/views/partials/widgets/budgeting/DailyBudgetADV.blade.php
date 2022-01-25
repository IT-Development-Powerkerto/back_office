
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 scroll scroll-pull shadow-sm border" data-scroll="true" data-wheel-propagation="true">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Daily Info ADV Activity</span>
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
															<th class="min-w-150px">Period</th>
															<th class="min-w-150px">ADV Name</th>
															<th class="min-w-150px">Leads</th>
															<th class="min-w-150px">Closing</th>
															<th class="min-w-150px">Quantity</th>
															<th class="min-w-150px text-end">Omzet (Rp)</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
                                                    @if (auth()->user()->role_id == 1)
                                                        <tbody>
                                                            @foreach ($adv as $adv)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="d-flex justify-content-start flex-column">
                                                                            <h1 href="#" class="text-dark fw-medium fs-6">{{$day_output}}</h1>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="d-flex justify-content-start flex-column">
                                                                            <h1 href="#" class="text-dark fw-medium fs-6">{{$adv->name}}</h1>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <h1 class="text-dark fw-medium fs-6">{{$lead_day->where('admin_id', auth()->user()->admin_id)->where('advertiser', $adv->name)->count()}}</h1>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <h1 class="text-dark fw-medium fs-6">{{$lead_day->where('admin_id', auth()->user()->admin_id)->where('advertiser', $adv->name)->where('status_id', 5)->count()}}</h1>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <h1 class="text-dark fw-medium fs-6">{{$lead_day->where('admin_id', auth()->user()->admin_id)->where('advertiser', $adv->name)->where('status_id', 5)->sum('quantity')}}</h1>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center justify-content-end">
                                                                        <h1 class="text-dark fw-medium fs-6">Rp. {{$omset_day->where('admin_id', auth()->user()->admin_id)->where('adv_name', $adv->name)->sum('total_price')}}</h1>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    @else
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="d-flex justify-content-start flex-column">
                                                                            <h1 href="#" class="text-dark fw-medium fs-6">{{$day_output}}</h1>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="d-flex justify-content-start flex-column">
                                                                            <h1 href="#" class="text-dark fw-medium fs-6">{{auth()->user()->name}}</h1>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <h1 class="text-dark fw-medium fs-6">{{$lead_day->where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->count()}}</h1>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <h1 class="text-dark fw-medium fs-6">{{$lead_day->where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->count()}}</h1>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <h1 class="text-dark fw-medium fs-6">{{$lead_day->where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->sum('quantity')}}</h1>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center justify-content-end">
                                                                        <h1 class="text-dark fw-medium fs-6">Rp. {{$omset_day->where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->sum('total_price')}}</h1>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    @endif
													<!--end::Table body-->
												</table>
												<!--end::Table-->
											</div>
											<!--end::Table container-->
										</div>
										<!--begin::Body-->
									</div>
									<!--end::Tables Widget 9-->
