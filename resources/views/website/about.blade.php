@extends('website.layouts.master')
@section('title')
About Us
@endsection
@section('content')


			<!-- BREADCRUMB
			============================================= -->
            @php
            $topimage = json_decode($topimg);
            $vision = json_decode($ourvision);
            $mission = json_decode($ourmission);
            $values=json_decode($allvalues);
            @endphp
			<div id="breadcrumb" class="division" style="background-image: url({{ asset($topimage->image) }})">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class=" breadcrumb-holder">

								<!-- Breadcrumb Nav -->


								<!-- Title -->
								<h4 class="h4-sm steelblue-color">About Us</h4>

							</div>
						</div>
					</div>  <!-- End row -->
				</div>	<!-- End container -->
			</div>	<!-- END BREADCRUMB -->





			<!-- INFO-4
			============================================= -->
			<section id="info-4" class="wide-100 info-section division">
				<div class="container">


					<!-- TOP ROW -->
					<div class="top-row mb-80">
						<div class="row d-flex align-items-center">


						<!-- INFO IMAGE -->
						<div class="col-lg-6">
							<div class="info-4-img text-center wow fadeInUp" data-wow-delay="0.6s">
								<img class="img-fluid" src="{{ asset($vision->image) }}" alt="info-image">
							</div>
						</div>


						<!-- INFO TEXT -->
						<div class="col-lg-6">
							<div class="txt-block pc-30 wow fadeInUp" data-wow-delay="0.4s">

								<!-- Section ID -->
					 			<span class="section-id blue-color">Welcome to Cure Hospital</span>

								<!-- Title -->
								<h3 class="h3-md steelblue-color">Our Vision</h3>

								<!-- Text -->
								<p>{!! strip_tags($vision->description) !!}

								</p>


								<!-- Singnature -->
								<div class="singnature mt-35">

									<!-- Text -->


									<!-- Singnature Image -->
									<!-- Recommended sizes for Retina Ready displays is 400x68px; -->
									<img class="img-fluid" src="{{ asset('frontend/images/image/coeurlove.webp') }}" width="200" height="34" alt="signature-image">

								</div>

							</div>
						</div>	<!-- END TEXT BLOCK -->


						</div>    <!-- End row -->
					</div>	<!-- END TOP ROW -->


					<!-- BOTTOM ROW -->
					<div class="bottom-row">
						<div class="row d-flex align-items-center">


							<!-- INFO TEXT -->
							<div class="col-lg-6">
								<div class="txt-block pc-30 wow fadeInUp" data-wow-delay="0.4s">

									<!-- Section ID -->
									<h3 class="h3-md steelblue-color">Our Mission</h3>


									<!-- Text -->
									<p class="mb-30">{!! strip_tags($mission->description) !!}

									</p>

									<!-- Options List -->
									<div class="row">
                                        @php
                                        $valmission=json_decode($ourmission,true)
                                        @endphp
                                        @foreach ($valmission['values'] as $key=>$value)
                                        <div class="col-xl-6">
                                        <div class="box-list">
                                            <div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
                                            <p class="p-sm">{{ $key }}</p>
                                        </div>
                                        </div>
                                        @endforeach

									</div>	<!-- End Options List -->

								</div>
							</div>	<!-- END INFO TEXT -->


							<!-- INFO IMAGE -->
							<div class="col-lg-6">
								<div class="info-4-img text-center wow fadeInUp" data-wow-delay="0.6s">
									<img class="img-fluid" src="{{ asset($mission->image) }}" alt="info-image">
								</div>
							</div>


						</div>    <!-- End row -->
					</div>	<!-- END BOTTOM ROW -->

	<!-- BOTTOM ROW -->
	<div class="bottom-row mt-5">
		<div class="row d-flex align-items-center">

			<div class="col-lg-6">
				<div class="info-4-img text-center wow fadeInUp" data-wow-delay="0.6s">
					<img class="img-fluid" src="{{ asset($values->image) }}" alt="info-image">
				</div>
			</div>

			<!-- INFO TEXT -->
			<div class="col-lg-6">
				<div class="txt-block pc-30 wow fadeInUp" data-wow-delay="0.4s">

					<!-- Section ID -->
					<h3 class="h3-md steelblue-color mt-5">Values</h3>


					<!-- Text -->

                    <p class="mb-30">{!! strip_tags($values->description) !!}
					</p>

					<!-- Options List -->
					<div class="row">
                        @php
                        $value=json_decode($allvalues,true)
                        @endphp
                        @foreach ($value['values'] as $key=>$value)
                        <div class="col-xl-6">
                        <div class="box-list">
                            <div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
                            <p class="p-sm">{{ $key }}</p>
                        </div>
                        </div>
                        @endforeach




					</div>	<!-- End Options List -->

				</div>
			</div>	<!-- END INFO TEXT -->




		</div>    <!-- End row -->
		<div class="container mt-5">
		<div align="center" class="row d-flex align-items-center justify-content-center">
<div class="col-6">
	<img class="img-fluid" src="{{ asset('frontend/images/image/coeurlove.webp') }}" width="400" height="34" alt="signature-image">

</div>
		</div>
		</div>
	</div>	<!-- END BOTTOM ROW -->

				</div>	   <!-- End container -->
			</section>	<!-- END INFO-4 -->






@endsection
