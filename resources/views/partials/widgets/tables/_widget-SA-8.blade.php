
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Lead Tunneling</span>
												<span class="text-muted mt-1 fw-bold fs-7">{{$lead->count()}} Lead</span>
											</h3>
											<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
												<a href=/ld class="btn btn-sm btn-light btn-active-primary me-2" title="Click For Detail">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
												<span class="svg-icon svg-icon-3">
													<i class="fas fa-chart-line"></i>
												</span>
												<!--end::Svg Icon-->Detail</a>
												<form action="/dashboard" method="GET" class="d-flex">
												<div class="me-2">
													<input class="form-control mt-0" name="date_filter" id="date_filter" type="date" style="height: 33px;" onkeypress="submit()">
												</div>
												</form>

												<form action="#" method="GET" class="d-flex">
													<input class="form-control mt-0" name="search" id="searchlead" type="text" placeholder="Search" aria-label="Search" style="height: 33px;">
													<button class="btn mt-n2" type="submit" style="height: 30px;"><i class="fas fa-search fas-7x"></i></button>
												</form>
											</div>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body py-3">
											<!--begin::Table container-->
											<div class="table-responsive" id="myDIV">
												<!--begin::Table-->
												<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="leads">
													<!--begin::Table head-->
													<thead>
														<tr class="fw-medium text-muted">
															<th class=" text-center">No</th>
                                                            <th class=" text-center">Order ID</th>
															<th class=" text-center">Advertiser Name</th>
															<th class=" text-center">Operator Name</th>
															<th class=" text-center">Customer Name</th>
															<th class=" text-center">Whatsapp Customer</th>
															<th class=" text-center">Product Name</th>
															<th class=" text-center">Date/Time</th>
															<th class=" text-center">Response Time</th>
															<th class=" text-center">Lead Progress</th>
															<th class=" text-end">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        <?php $n=0; ?>
                                                        @foreach ($lead as $lead)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$n+=1}}</h1>
																</div>
															</td>
                                                            <td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">Ord-{{$lead->id}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$lead->advertiser}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$lead->operator_name}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-primary fw-normal fs-6 text-hover-primary">{{$lead->client_name}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	{{--  <h1 class="text-dark fw-normal fs-6">{{$lead->client_wa}}</h1>  --}}
																	{{--  <a class="text-dark fw-normal fs-6 text-hover-primary" href="https://api.whatsapp.com/send/?phone={{$lead->no_wa}}&text={{ $lead->text }}">{{$lead->no_wa}}</a>  --}}
																	<a class="text-primary fw-normal fs-6 text-hover-primary" href="https://api.whatsapp.com/send/?phone={{$lead->client_wa}}&text={{ str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($lead->client_name, $lead->client_wa, $lead->operator_name, $lead->product_name), $lead->text) }}">{{$lead->client_wa}}</a>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$lead->product_name}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$lead->client_created_at}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center clock{{ $lead->id }}">
                                                                    <script>
                                                                        window.addEventListener('load', function() {
                                                                            var createdDate = new Date('{{$lead->client_created_at}}');
                                                                            var updatedDate = new Date('{{$lead->client_updated_at}}');
                                                                            var nowDate = new Date();
                                                                            if('{{$lead->status_id == 3}}'){
                                                                                // var futureDate = new Date(createdDate.getTime() - 0);
                                                                                // var dif = (nowDate.getTime() - futureDate.getTime()) / 1000;
                                                                                var dif = (nowDate.getTime() - createdDate.getTime()) / 1000;
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
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal	 fs-6 badge badge-light-info">{{$lead->status}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                                    <form action="#" method="GET">
                                                                        @csrf
																		<div class="btn-toolbar justify-content-between px-2" role="toolbar" aria-label="Toolbar with button groups">
																			<div class="btn-group" role="group" aria-label="First group">
																				<button type="submit" data-bs-toggle="modal" data-bs-target="#edit-user" class="btn btn-primary  btn-icon"><i class="la la-user-edit"></i></button>
																			</div>
																		</div>
                                                                    </form>
                                                                    <form action="#" method="POST">
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
												{{--  {{ $leads->links() }}  --}}
												<!--end::Table-->
											</div>
											<!--end::Table container-->
										</div>
										<!--begin::Body-->
									</div>
									<!--end::Tables Widget 9-->
