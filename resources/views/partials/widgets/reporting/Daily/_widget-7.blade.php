
		<!--begin::Charts Widget 6-->
		<div class="card shadow-sm">
			<!--begin::Header-->
			<div class="card-header border-0 bg-white py-5">
				<h3 class="card-title fw-bolder text-dark">Total Bottle</h3>
				<label class="my-auto px-3 rounded fs-5 fw-bolder bg-light-success text-success">
                    <script>
                        var bilangan = {{$inputer->sum('quantity')}};

                        var	number_string = bilangan.toString(),
                            sisa 	= number_string.length % 3,
                            rupiah 	= number_string.substr(0, sisa),
                            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                        if (ribuan) {
                            separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }

                        document.write(rupiah);
                    </script> Bottle
                </label>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				<div class="row">
					<div class="col-4 d-flex flex-column">
						<!--begin::Block-->
						<div class="shadow-sm p-8 rounded rounded-xl flex-grow-1">
							<input id="product_count" value="{{$product->count()}}" hidden/>
							<?php
                                $n=0;
                                $su=0;
                                $mo=0;
                                $tu=0;
                                $we=0;
                                $th=0;
                                $fr=0;
                                $sa=0;
                            ?>
                            @foreach ($product as $product)
                                {{-- <input id="{{$product->name}}" value="{{$inputer->where('product_name', $product->name)->sum('total_price') - $inputer->where('product_name', $product->name)->sum('product_promotion')}}" hidden/> --}}
                                <input id="{{$su+=1}} bottle_su" value="{{$omset_su->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$mo+=1}} bottle_mo" value="{{$omset_mo->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$tu+=1}} bottle_tu" value="{{$omset_tu->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$we+=1}} bottle_we" value="{{$omset_we->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$th+=1}} bottle_th" value="{{$omset_th->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$fr+=1}} bottle_fr" value="{{$omset_fr->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$sa+=1}} bottle_sa" value="{{$omset_sa->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="product {{$n+=1}}" value="{{$product->name}}" hidden/>
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-5">
                                    <div class="symbol symbol-circle symbol-white overflow-hidden flex-shrink-0 me-3">
                                        <span class="symbol-label">
                                            <img src="{{$product->image}}" class="h-100 align-self-end" alt="image">
                                        </span>
                                    </div>
                                    <div>
                                        <div class="font-size-sm fw-bold text-{{$icon->where('id', ($n%5 == 0) ? 5 : $n%5)->implode('name')}}">{{$product->name}}</div>
                                        <div class="font-size-sm fw-bold text-{{$icon->where('id', ($n%5 == 0) ? 5 : $n%5)->implode('name')}}">
                                            <script>
                                                var bilangan = {{$omset_day_count->where('product_name', $product->name)->sum('quantity')}};

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
                                    </div>
                                </div>
                                <!--end::Item-->
                            @endforeach
						</div>
						<!--end::Block-->
					</div>
					<div class="col-8">
					<!--begin::Chart-->
					<div class="card-rounded" id="kt_charts_widget_10_chart" style="height: 100%"></div>
					<!--end::Chart-->
				</div>
			</div>
			<!--end::Body-->
		</div>
		<!--end::Charts Widget 6-->
		</div>
