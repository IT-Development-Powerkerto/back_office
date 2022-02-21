
									<!--begin::Statistics Widget 5-->
									<label class="card card-xl-stretch mb-5 mb-xl-8 bg-info">
										<!--begin::Body-->
										<div class="card-body">
											<!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
											<span class="svg-icon svg-icon-light svg-icon-3x ms-n1">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"/>
														<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"/>
													</g>
												</svg>
											</span>
											<!--end::Svg Icon-->
											<div class="text-light fw-bolder fs-2 mb-2 mt-5">
                                                <script>
                                                    var bilangan = {{$quantity}};

                                                    var	number_string = bilangan.toString(),
                                                        sisa 	= number_string.length % 3,
                                                        rupiah 	= number_string.substr(0, sisa),
                                                        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                    if (ribuan) {
                                                        separator = sisa ? '.' : '';
                                                        rupiah += separator + ribuan.join('.');
                                                    }

                                                    document.write(rupiah);
                                                </script>
                                            </div>
											<div class="fw-bold text-light">Total Box</div>
										</div>
										<!--end::Body-->
									</label>
									<!--end::Statistics Widget 5-->
