@extends('website.layouts.master')
@section('content')

			<!-- HERO-11
			============================================= -->
			<section id="hero-11" class="bg-fixed hero-section division">


				<!-- SLIDER -->
				<div class="slider blue-nav">
			    	<ul class="slides">
                        @foreach ($slider as $item=>$value)
                        <li id="slide-{{ $item+1 }}">
				        	<img src="{{ asset($value->image) }}" alt="slide-background">
		       				<div class="caption d-flex align-items-center right-align">
		       					<div class="container">
		       						<div class="row">
		       							<div class="col-md-9 col-lg-8 col-xl-7">
		       								<div class="caption-txt text-left white-color">
						       					<h3>{{ $value->title }}</h3>
												<div class="box-list">
													<div class="box-list-icon"><i class="fa fa-genderless"></i></div>
													<p class="p-md">{!! strip_tags($value->text) !!}</p>
												</div>
											</div>
										</div>
									</div>
								</div>
					        </div>

					    </li>
                        @endforeach
				    </ul>
			  	</div>
			</section>
			<section id="about-2" class="about-section division">
				<div class="container">
					<div class="abox-2-holder">
						<div class="row">
							<div class="col-md-12 col-lg-4">
								<div class="abox-2">
									<h5 class="h5-md steelblue-color">Opening Hours</h5>
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

								</div>
							</div>


							<!-- ABOUT BOX #2 -->
							<div class="col-md-6 col-lg-4">
								<div class="abox-2">
									<h5 class="h5-md steelblue-color"></h5>
									<p>
									</p>
								</div>
							</div>


							<!-- ABOUT BOX #3 -->
							<div class="col-md-6 col-lg-4">
								<div class="abox-2">

									<!-- Title -->
									<h5 class="h5-md steelblue-color">Cure Hospital</h5>

									<!-- Text -->

									<p class="mt-20">Cure Hospital is designed to offer calm clean comfortable and safe
										environment for our customers. The inpatient wards offer different
										varieties of accommodation.
									</p>

								</div>
							</div>


						</div>    <!-- End row -->
					</div>
				</div>	   <!-- End container -->
			</section>	<!-- END ABOUT-2 -->




			<!-- SERVICES-1
			============================================= -->
			<section id="services-1" class="wide-50 services-section division">
				<div class="container">
			 		<div class="row">

                        @foreach ($services as $service)
                        <!-- SERVICE BOX #1 -->
                        <div class="col-sm-6 col-lg-3">
                            <div class="sbox-1 icon-md wow fadeInUp" data-wow-delay="0.4s">

                                <!-- Icon -->
                                <span class="{{ $service->icon }} blue-color"></span>

                                <!-- Title -->
                                <h5 class="h5-sm steelblue-color">{{ $service->title }}</h5>

                                <!-- Text -->
                                {!! html_entity_decode($service->text) !!}

                            </div>
                        </div>
                        @endforeach
			 		</div>	   <!-- End row -->
			 	</div>	   <!-- End container -->
			</section>	<!-- END SERVICES-1 -->




			<!-- ABOUT-5
			============================================= -->
			<section id="about-5" class="bg-lightgrey pt-100 about-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- IMAGE BLOCK -->
						<div class="col-lg-6">
							<div class="about-img text-center wow fadeInUp" data-wow-delay="0.6s">
								<img class="img-fluid" src="{{ asset($who->image) }}" alt="about-image">
							</div>
						</div>


						<!-- TEXT BLOCK -->
						<div class="col-lg-6">
							<div class="txt-block pc-30 wow fadeInUp" data-wow-delay="0.4s">

								<!-- Section ID -->
					 			<span class="section-id blue-color">Welcome To Cure Hospital</span>

								<!-- Title -->
								<h3 class="h3-md steelblue-color">WHO ARE WE </h3>

								<!-- Text -->
								{!! html_entity_decode($who->description) !!}
								{{-- <img class="img-fluid" src="{{ asset($who->image) }}" width="200" height="34" alt="signature-image"> --}}


								<!-- Singnature -->


							</div>
						</div>	<!-- END TEXT BLOCK -->


					</div>    <!-- End row -->
				</div>	   <!-- End container -->

			</section>	<!-- END ABOUT-5 -->




			<!-- SERVICES-2
			============================================= -->
			<section id="services-2" class="wide-70 services-section division">
				<div class="container">


					<!-- SECTION TITLE -->
					<div class="row">
						<div class="col-lg-10 offset-lg-1 section-title">

							<!-- Title 	-->
							<h3 class="h3-md steelblue-color">Choose Department</h3>

							<!-- Text -->
							<p>Cure Hospital is designed to offer calm clean comfortable and safe
								environment for our customers
							</p>

						</div>
					</div>


			 		<div class="row">

                        @foreach ($departments as $department)
                            <!-- SERVICE BOX #1 -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="sbox-2 wow fadeInUp" data-wow-delay="0.4s">
                                    <a href="#">

                                        <!-- Icon  -->
                                        <div class="sbox-2-icon icon-xl">
                                            <span class="{{ $department->icon }}"></span>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="h5-sm sbox-2-title steelblue-color">{{ $department->title }}</h5>

                                    </a>
                                </div>
                            </div>
                        @endforeach


			 		</div>	   <!-- End row -->


			 	</div>	   <!-- End container -->
			</section>	<!-- END SERVICES-2 -->




			<!-- BANNER-2
			============================================= -->
			<section id="banner-2" class="pt-80 banner-section division">
				<div class="bg-scroll bg-inner bg-image division">
					<div class="container white-color">
						<div class="row d-flex align-items-center">


							<!-- CALL TO ACTION IMAGE -->
							<div class="col-lg-5">
								<div class="banner-2-img">
									<img class="img-fluid" src="{{ ('frontend/images/image/dctr.png') }}" alt="banner-image">
								</div>
							</div>


							<!-- BANNER TEXT -->
							<div class="col-lg-6 offset-lg-1">
								<div class="banner-txt pc-30 wow fadeInUp" data-wow-delay="0.4s">

									<!-- Section ID -->
					 				<span class="section-id id-color">Qualified Doctors</span>

									<!-- Title  -->
									<h3 class="h3-lg">Group of Certified and Experienced Doctors</h3>

									<!-- Text -->
									<p>Cure Hospital is honored to earn the trust of
										each of our valuable consultants

								    </p>

								    <!-- Button -->
									<a href="#" class="btn btn-tra-white blue-hover">View Our Doctors</a>

								</div>
							</div>	<!-- END BANNER TEXT -->


						</div>	  <!-- End row -->
					</div>	   <!-- End container -->
				</div>		<!-- End Inner Background -->
			</section>	<!-- END BANNER-2 -->




			<!-- STATISTIC-3
			============================================= -->
			<div id="statistic-3" class="wide-60 statistic-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- TEXT BLOCK -->
						<div class="col-lg-6">
							<div class="txt-block pc-30 mb-40 wow fadeInUp" data-wow-delay="0.4s">

								<!-- Section ID -->
					 			<span class="section-id blue-color">Best Practices</span>

								<!-- Title -->
								<h3 class="h3-md steelblue-color">Outpatient clinics</h3>

								<!-- Text -->
								<p>The outpatient clinics covering almost all medical specialties and subspecialties,
									all the outpatient’s doctors hold highest scientific certificates.	</p>
                                    @inject('outpa', 'App\Models\outpatient_clinics')
								<!-- Statistic Holder -->
								<div class="statistic-holder">
									<div class="row">

										<!-- STATISTIC BLOCK #1 -->
										<div class="col-sm-4">
											<div class="statistic-block icon-sm">

												<!-- Icon  -->
												<span class="flaticon-062-cardiogram-3 blue-color"></span>

												<!-- Text -->
												<h5 class="statistic-number steelblue-color"><span class="count-element">{{ $outpa->first()->patient }}</span></h5>
												<p>Happy Patients</p>

											</div>
										</div>

										<!-- STATISTIC BLOCK #2 -->
										<div class="col-sm-4">
											<div class="statistic-block icon-sm">

												<!-- Icon  -->
												<span class="flaticon-137-doctor blue-color"></span>

												<!-- Text -->
												<h5 class="statistic-number steelblue-color"><span class="count-element">{{ $outpa->first()->doctor }}</span></h5>
												<p>Qualified Doctors</p>

											</div>
										</div>

										<!-- STATISTIC BLOCK #3 -->
										<div class="col-sm-4">
											<div class="statistic-block icon-sm">

												<!-- Icon  -->
												<span class="flaticon-065-hospital-bed blue-color"></span>

												<!-- Text -->
												<h5 class="statistic-number steelblue-color"><span class="count-element">{{ $outpa->first()->room }}</span></h5>
												<p>Clinic Rooms</p>

											</div>
										</div>

									</div>
								</div>	<!-- End Statistic Holder -->


							</div>
						</div>	<!-- END TEXT BLOCK -->


						<!-- STATISTIC IMAGE -->
						<div class="col-lg-6">
							<div class="statistic-img text-center mb-40 wow fadeInUp" data-wow-delay="0.6s">
								<img class="img-fluid" src="{{ ('frontend/images/image/doctors.jpg') }}" alt="statistic-image">
							</div>
						</div>


					</div>  <!-- End row -->
				</div>	 <!-- End container -->
			</div>	 <!-- END STATISTIC-3 -->





			<!-- TABS-1
			============================================= -->
			<section id="tabs-1" class="wide-100 tabs-section division">
				<div class="container">
				 	<div class="row">
				 		<div class="col-md-12">


				 			<!-- TABS NAVIGATION -->
							<div id="tabs-nav" class="list-group text-center">
							    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    @foreach ($departments as $department)
                                    <li class="nav-item icon-xs">
								    	<a class="nav-link @if($loop->first) active @endif" id="tab{{ $department->id }}-list" data-toggle="pill" href="#tab-{{ $department->id }}" role="tab" aria-controls="tab-1" aria-selected="true">
								    		<span class="{{ $department->icon }}"></span> {{ $department->title }}
								    	</a>
								  	</li>
                                    @endforeach

								</ul>

							</div>	<!-- END TABS NAVIGATION -->


							<!-- TABS CONTENT -->
							<div class="tab-content" id="pills-tabContent">

                                @foreach ($departments as $department)
<!-- TAB-1 CONTENT -->
<div class="tab-pane fade @if($loop->first) show active @endif " id="tab-{{ $department->id }}" role="tabpanel" aria-labelledby="tab1-list">
    <div class="row d-flex align-items-center">


        <!-- TAB-1 IMAGE -->
        <div class="col-lg-6">
            <div class="tab-img">
                <img class="img-fluid" src="{{ ('frontend/images/image/pedia.jpg') }}" alt="tab-image">
            </div>
        </div>


        <!-- TAB-1 TEXT -->
        <div class="col-lg-6">
            <div class="txt-block pc-30">

                <!-- Title -->
                <h3 class="h3-md steelblue-color">{{ $department->title }}</h3>

                <!-- Text -->
                {!! html_entity_decode($department->text) !!}
                <a href="#" class="btn btn-blue blue-hover mt-30">View More Details</a>

            </div>
        </div>	<!-- END TAB-1 TEXT -->


    </div>
</div>	<!-- END TAB-1 CONTENT -->
                                @endforeach
							</div>	<!-- END TABS CONTENT -->


			 			</div>
				 	</div>     <!-- End row -->
				</div>     <!-- End container -->
			</section>	<!-- END TABS-1 -->





			<!-- INFO-9
			============================================= -->
			<section id="info-9" class="bg-blue info-section division">


				<!-- TEXT BLOCK -->
				<div class="container">
					<div class="row d-flex align-items-center">
						<div class="col-lg-6">
							<div class="info-9-table white-color wow fadeInUp" data-wow-delay="0.4s">

								<!-- Title -->
								<h4 class="h4-xs">Opening Hours:</h4>

								<!-- Text -->
								<p>It is a long established fact that a reader will be distracted by the readable content more or less normal distribution of letters opposed.
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


							</div>
						</div>
					</div>	  <!-- End row -->
				</div>	   <!-- END TEXT BLOCK -->


				<!-- INFO-9 IMAGE -->
				<div class="info-9-img bg-fixed text-center"></div>


			</section>	<!-- END INFO-9 -->

			<section class="ttm-row zero_padding-section procedure-section ttm-bgcolor-grey clearfix mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ttm-bg ttm-col-bgcolor-yes pt-160 pb-75 res-991-pt-50 res-991-pb-35">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <div class="layer-content">
                                    <div class="row">
                                        <div class="col-lg-6 m-auto">
                                            <!-- section title -->
                                            <div class="section-title title-style-center_text">
                                                <div class="title-header">
                                                    <h3>WORKING PROCESS</h3>

                                                </div>
                                            </div><!-- section title end -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ttm-processbox-wrapper">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                                        <div class="ttm-processbox">
                                                            <div class="featured-content">
                                                                <div class="featured-title">
                                                                    <h3>Healthcare</h3>
                                                                    <p>First step of process</p>
                                                                </div>
                                                            </div>
                                                            <div class="ttm-box-icon">
                                                                <div class="ttm-process-icon">
                                                                    <div class="ttm-icon ttm-icon_element-size-md style2 ttm-icon_element-color-skincolor ttm-bgcolor-grey">
																		<i class="fa fa-medkit" aria-hidden="true"></i>
                                                                    </div>
                                                                    <span class="number">01</span>
                                                                </div>
                                                            </div>
                                                            <div class="featured-content">
                                                                <div class="featured-desc">
                                                                    <p>Committed for providing quality treatment.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                                        <div class="ttm-processbox">
                                                            <div class="featured-content">
                                                                <div class="featured-title">
                                                                    <h3>Get Details</h3>
                                                                    <p>Our second easy </p>
                                                                </div>
                                                            </div>
                                                            <div class="ttm-box-icon">
                                                                <div class="ttm-process-icon">
                                                                    <div class="ttm-icon ttm-icon_element-size-md style2 ttm-icon_element-color-skincolor ttm-bgcolor-grey">
																		<i class="fa fa-file" aria-hidden="true"></i>
                                                                    </div>
                                                                    <span class="number">02</span>
                                                                </div>
                                                            </div>
                                                            <div class="featured-content">
                                                                <div class="featured-desc">
                                                                    <p>Search us on your browser get the information.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                                        <div class="ttm-processbox">
                                                            <div class="featured-content">
                                                                <div class="featured-title">
                                                                    <h3>Appointment</h3>
                                                                    <p>Important third step</p>
                                                                </div>
                                                            </div>
                                                            <div class="ttm-box-icon">
                                                                <div class="ttm-process-icon">
                                                                    <div class="ttm-icon ttm-icon_element-size-md style2 ttm-icon_element-color-skincolor ttm-bgcolor-grey">
																		<i class="fa fa-calendar" aria-hidden="true"></i>
                                                                    </div>
                                                                    <span class="number">03</span>
                                                                </div>
                                                            </div>
                                                            <div class="featured-content">
                                                                <div class="featured-desc">
                                                                    <p>Regarding your health issue book an appointment.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                                        <div class="ttm-processbox">
                                                            <div class="featured-content">
                                                                <div class="featured-title">
                                                                    <h3>Consult Us</h3>
                                                                    <p>Solution in final step</p>
                                                                </div>
                                                            </div>
                                                            <div class="ttm-box-icon">
                                                                <div class="ttm-process-icon">
                                                                    <div class="ttm-icon ttm-icon_element-size-md style2 ttm-icon_element-color-skincolor ttm-bgcolor-grey">
																		<i class="fa fa-user-md" aria-hidden="true"></i>
                                                                    </div>
                                                                    <style>
                                                                        .number::after{
                                                                            content:'' !important;
                                                                        }
                                                                    </style>
                                                                    <span class="number">04</span>
                                                                </div>
                                                            </div>
                                                            <div class="featured-content">
                                                                <div class="featured-desc">
                                                                    <p>Expertise treatments by our expert and be healthy.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection
