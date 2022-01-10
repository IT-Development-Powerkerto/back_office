
									<!--begin::Tables Widget 9-->
									<div class="card card-l-stretch mb-5 mb-xl-8 pb-4 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 315px">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Campaign {{$campaign->title}}</span>
												<span class="text-muted mt-1 fw-bold fs-7">{{$lead->where('campaign_id', $campaign->id)->count()}} Leads</span>
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
															<th class="min-w-120px">Nama</th>
															<th class="min-w-120px">No Whatsapp</th>
															<th class="min-w-120px">Costumer Service</th>
															<th class="min-w-50px">Response Time</th>
                                                            <th class="min-w-100px">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        @foreach ($lead->where('campaign_id', $campaign->id) as $key =>$lead)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <h1 class="text-dark fw-normal fs-6">
                                                                            {{$lead->client->name}}
                                                                        </h1>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{--  <label class="text-dark fw-normal d-block fs-6">{{$lead->client->whatsapp}}</label>  --}}
                                                                    <a href="https://api.whatsapp.com/send/?phone={{ $lead->client->whatsapp }}&text={{ $lead->campaign->cs_to_customer }}">{{ $lead->client->whatsapp }}</a>
                                                                </td>
                                                                <td class="text-end">
                                                                    <div class="d-flex align-items-center">
                                                                        <h1 class="text-dark fw-normal fs-6">{{$lead->operator->name}}</h1>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-end clock{{ $lead->id }}">
																		<script>
                                                                            window.addEventListener('load', function() {
                                                                                var createdDate = new Date('{{$lead->created_at}}');
                                                                                var updatedDate = new Date('{{$lead->updated_at}}');
                                                                                var nowDate = new Date();
                                                                                if('{{$lead->status_id == 3}}'){
                                                                                    var futureDate = new Date(createdDate.getTime() + 0);
                                                                                    var dif = (nowDate.getTime() - futureDate.getTime()) / 1000;
                                                                                    var Seconds_Between_Dates = Math.abs(Math.round(dif));
                                                                                    var fiveMinutes{{ $lead->id}} = Seconds_Between_Dates;
                                                                                    display = document.querySelector('.clock{{ $lead->id }}');
                                                                                    CountUpTimer(fiveMinutes{{$lead->id}}, display);
                                                                                } else {
                                                                                    var dif = (createdDate.getTime() - updatedDate.getTime()) / 1000;
                                                                                    var Seconds_Between_Dates = Math.abs(Math.round(dif));
                                                                                    var fiveMinutes{{ $lead->id}} = Seconds_Between_Dates;
                                                                                    display = document.querySelector('.clock{{ $lead->id }}');
                                                                                    StopTimer(fiveMinutes{{$lead->id}}, display);
                                                                                }
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                                        <form action="{{ route('lead.edit',['lead' => $lead->id]) }}" method="GET">
                                                                            @csrf
                                                                            <div class="btn-toolbar justify-content-between px-2" role="toolbar" aria-label="Toolbar with button groups">
                                                                                <div class="btn-group" role="group" aria-label="First group">
                                                                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#edit-user" class="btn btn-primary  btn-icon"><i class="la la-user-edit"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        <form action="{{ route('lead.destroy', ['lead'=>$lead->id]) }}" method="POST">
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
