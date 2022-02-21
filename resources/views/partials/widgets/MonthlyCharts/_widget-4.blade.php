
									<!--begin::Statistics Widget 5-->
									<label class="card card-xl-stretch mb-5 mb-xl-8 bg-primary">
										<!--begin::Body-->
										<div class="card-body">
											<!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
											<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000"/>
														<rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1"/>
													</g>
												</svg>
											</span>
											<!--end::Svg Icon-->
											<div class="text-white fw-bolder fs-2 mb-2 mt-5">{{($lead_count == 0) ? 0 : round(($closing_count / $lead_count)*100, 1)}} %</div>
											<div class="fw-bold text-white">Closing Rate</div>
										</div>
                                        <?php
                                            $n=0;
                                            $jan=0;
                                            $feb=0;
                                            $mar=0;
                                            $apr=0;
                                            $may=0;
                                            $jun=0;
                                            $jul=0;
                                            $aug=0;
                                            $sep=0;
                                            $okt=0;
                                            $nov=0;
                                            $des=0;
                                        ?>
                                        @foreach ($products as $product)
                                            {{-- <input id="{{$product->name}}" value="{{$inputer->where('product_name', $product->name)->sum('total_price') - $inputer->where('product_name', $product->name)->sum('product_promotion')}}" hidden/> --}}
                                            <input id="{{$jan+=1}} lead_jan" value="{{$lead_jan->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$feb+=1}} lead_feb" value="{{$lead_feb->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$mar+=1}} lead_mar" value="{{$lead_mar->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$apr+=1}} lead_apr" value="{{$lead_apr->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$may+=1}} lead_may" value="{{$lead_may->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$jun+=1}} lead_jun" value="{{$lead_jun->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$jul+=1}} lead_jul" value="{{$lead_jul->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$aug+=1}} lead_aug" value="{{$lead_aug->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$sep+=1}} lead_sep" value="{{$lead_sep->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$okt+=1}} lead_okt" value="{{$lead_okt->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$nov+=1}} lead_nov" value="{{$lead_nov->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$des+=1}} lead_des" value="{{$lead_des->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="product {{$n+=1}}" value="{{$product->name}}" hidden/>
                                        @endforeach
										<!--end::Body-->
									</label>
									<!--end::Statistics Widget 5-->
