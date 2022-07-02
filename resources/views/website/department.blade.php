@extends('website.layouts.master')
@section('title')
Department
@endsection
@section('content')

<!-- BREADCRUMB
			============================================= -->
			<div id="breadcrumb" class="division">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class=" breadcrumb-holder">

								<!-- Breadcrumb Nav -->


								<!-- Title -->
								<h4 class="h4-sm steelblue-color">Our department</h4>

							</div>
						</div>
					</div>  <!-- End row -->
				</div>	<!-- End container -->
			</div>	<!-- END BREADCRUMB -->




			<!-- SERVICES-7
			============================================= -->
			<section id="services-7" class="bg-lightgrey wide-70 servicess-section division">
				<div class="container">
					<div class="row">


						<!-- SERVICE BOXES -->
						<div class="col-lg-8">
							<div class="row">

                                @foreach ($departments as $department)
								<!-- SERVICE BOX #1 -->
                                <div class="col-md-6">
                                    <div class="sbox-7 icon-xs wow fadeInUp" data-wow-delay="0.4s">
                                        <a>

                                            <!-- Icon -->
                                           <span class="{{ $department->icon }} blue-color"></span>

                                           <!-- Text -->
                                           <div class="sbox-7-txt">

                                               <!-- Title -->
                                               <h5 class="h5-sm steelblue-color">{{ $department->title }}</h5>

                                               <!-- Text -->
                                               {!! strip_tags($department->text) !!}

                                           </div>

                                       </a>
                                    </div>
                                </div>  <!-- END SERVICE BOX #1 -->
                                @endforeach

	 						</div>
						</div>	<!-- END SERVICE BOXES -->


						<!-- INFO TABLE -->
						<div class="col-lg-4">
							<div class="services-7-table blue-table mb-30 wow fadeInUp" data-wow-delay="0.6s">

								<!-- Title -->
								<h4 class="h4-xs">Opening Hours:</h4>

								<!-- Text -->
								<p class="p-sm">It is a long established fact that a reader will be distracted by the readable content more or less normal distribution of letters opposed.
								</p>

								<!-- Table -->
								<table class="table">
									<tbody>
									    @foreach ($opening as $key=>$value)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td> - </td>
                                            <td class="text-right">{{ $value }}</td>
                                      </tr>
                                        @endforeach

									  </tbody>
								</table>

								<!-- Text -->
								<p class="p-sm">It is a long established fact that a reader will be distracted by the readable content more or less normal distribution of letters opposed.</p>

							</div>
						</div>	<!-- END INFO TABLE -->


					</div>    <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END SERVICES-7 -->


@endsection
