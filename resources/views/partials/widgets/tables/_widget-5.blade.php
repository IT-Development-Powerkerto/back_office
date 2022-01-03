
									<!--begin::Tables Widget 9-->
									<div class="card card-l-stretch mb-5 mb-xl-8 pb-4 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 315px">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Campaign {{$campaign->title}}</span>
												<span class="text-muted mt-1 fw-bold fs-7">{{$campaign->client->count()}} Leads</span>
											</h3>
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
														<tr class="fw text-muted">
															<th class="min-w-100px">Nama</th>
															<th class="min-w-90px">No Whatsapp</th>
															<th class="min-w-80px">Costumer Service</th>
															<th class="min-w-80px">Response Time</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        @foreach ($lead->where('campaign_id', $campaign->id) as $key =>$lead)
                                                            @foreach ($client->where('campaign_id', $lead->campaign_id) as $client)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <h1 class="text-dark fw-normal fs-6">
                                                                                {{$client->name}}
                                                                            </h1>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <label class="text-dark fw-normal d-block fs-6">{{$client->whatsapp}}</label>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <div class="d-flex align-items-center">
                                                                            <h1 class="text-dark fw-normal fs-6">{{$client->campaign->operator->whereIn('id',$key+1)->implode('name')}}</h1>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-end">
                                                                            <h1 class="text-dark fw-normal fs-6 badge badge-succes">05:00</h1>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
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
