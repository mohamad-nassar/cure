@extends('website.layouts.master')
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
								<h4 class="h4-sm steelblue-color">Our Services</h4>

							</div>
						</div>
					</div>  <!-- End row -->
				</div>	<!-- End container -->
			</div>	<!-- END BREADCRUMB -->








			<!-- TABS-2
			============================================= -->
			<section id="tabs-2" class="wide-100 tabs-section division">
				<div class="container">
				 	<div class="row">


				 		<!-- TABS NAVIGATION -->
				 		<div class="col-lg-4">
							<div id="tabs-nav" class="list-group text-center clearfix">
							    <ul class="nav nav-pills" id="pills-tab" role="tablist">

							    	<!-- TAB-1 LINK -->
								  	<li class="nav-item icon-xs">
								    	<a class="nav-link active" id="tab11-list" data-toggle="pill" href="#tab-11" role="tab" aria-controls="tab-11" aria-selected="true">
											Outpatient services

								    	</a>
								  	</li>

								  	<!-- TAB-2 LINK -->
									<li class="nav-item icon-xs">
									    <a class="nav-link" id="tab12-list" data-toggle="pill" href="#tab-12" role="tab" aria-controls="tab-12" aria-selected="false">
											In patients’ services and facilities
									    </a>
									</li>

									<!-- TAB-3 LINK -->
									<li class="nav-item icon-xs">
									    <a class="nav-link" id="tab13-list" data-toggle="pill" href="#tab-13" role="tab" aria-controls="tab-13" aria-selected="false">
											Intensive care unit
									    </a>
									</li>

									<!-- TAB-4 LINK -->
									<li class="nav-item icon-xs">
									    <a class="nav-link" id="tab14-list" data-toggle="pill" href="#tab-14" role="tab" aria-controls="tab-14" aria-selected="false">
											Operation theatre
									    </a>
									</li>

									<li class="nav-item icon-xs">
									    <a class="nav-link" id="tab15-list" data-toggle="pill" href="#tab-15" role="tab" aria-controls="tab-15" aria-selected="false">
											Other Services
									    </a>
									</li>

								</ul>

							</div>
						</div>	<!-- END TABS NAVIGATION -->


						<!-- TABS CONTENT -->
				 		<div class="col-lg-8">
							<div class="tab-content" id="pills-tabContent">


								<!-- TAB-1 CONTENT -->
								<div class="tab-pane fade show active" id="tab-11" role="tabpanel" aria-labelledby="tab11-list">
									<!-- Title -->
									<h3 class="h3-md steelblue-color">Hospital emergency unit </h3>

									<!-- Text -->
									<p>The Emergency unit is ready to receive wide range of emergencies
										with all the facilities and equipment needed and under supervision of
										highly qualified emergency specialists and packed with consultants
										for all specialties on call, the unit works 24 hours /7 days per week.

									</p>

									<!-- Image -->
									<div class="tab-img">
										<img class="img-fluid" src="{{ asset('images/image/back5.jpg') }}" alt="tab-image">
									</div>

									<!-- Text -->
									<p>The outpatient clinics covering almost all medical specialties and subspecialties,
										all the outpatient’s doctors hold highest scientific certificates either from best
										Egyptian universities or western accredited certificates such as British Royal
										Collage, European Board, Canadian Board or same level institutes
									</p>
<p>The outpatient clinics equipped with all the required facilities for every specialty
	and they cover all day starting from 11:00 am to 11:00 pm.
	Our reservation system and personnel are responsible to manage the schedule for
	the clinics and most of specialties work on prior reservation base as we appreciate
	the value of time for our patients and our doctors
	</p>
									<!-- Options List -->
									<div class="row">

										<div class="col-xl-6">

											<!-- Option #1 -->
											<div class="box-list">
												<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
												<p>Internal medicine.</p>
											</div>

											<!-- Option #2 -->
											<div class="box-list">
												<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
												<p>General surgery</p>
											</div>

											<!-- Option #3 -->
											<div class="box-list">
												<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
												<p>Orthopedics and trauma surgery</p>
											</div>
	<!-- Option #3 -->
	<div class="box-list">
		<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
		<p>Pediatrics</p>
	</div>
<!-- Option #3 -->
<div class="box-list">
	<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
	<p>Cardiology</p>
</div>

<!-- Option #3 -->
<div class="box-list">
	<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
	<p>Neurology</p>
</div>

										</div>

										<div class="col-xl-6">

											<!-- Option #4 -->
											<div class="box-list">
												<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
												<p>Urology</p>
											</div>

											<!-- Option #5 -->
											<div class="box-list">
												<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
												<p>Dermatology</p>
											</div>

											<!-- Option #6 -->
											<div class="box-list">
												<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
												<p>ENT</p>
											</div>
<!-- Option #6 -->
<div class="box-list">
	<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
	<p>Nephrology</p>
</div>
<!-- Option #6 -->
<div class="box-list">
	<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
	<p>Psychiatry </p>
</div>
<!-- Option #6 -->
<div class="box-list">
	<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
	<p>Geriatrics</p>
</div>
										</div>

									</div>	<!-- End Options List -->

									<!-- Button -->
									<a href="service-1-1.html" class="btn btn-blue blue-hover mt-30">View More Details</a>

								</div>	<!-- END TAB-1 CONTENT -->


								<!-- TAB-2 CONTENT -->
								<div class="tab-pane fade" id="tab-12" role="tabpanel" aria-labelledby="tab12-list">

									<!-- Title -->
									<h3 class="h3-md steelblue-color">
										Inpatient general and post-operative
										accommodation </h3>

									<!-- Text -->
									<p>Cure Hospital is designed to offer calm clean comfortable and safe
										environment for our customers. The inpatient wards offer different
										varieties of accommodation based on high level design, decorations
										and facilities to offer the best available environment and hospitality
									</p>

									<!-- Image -->
									<div class="tab-img">
										<img class="img-fluid" src="{{ asset('images/image/back5.jpg') }}" alt="tab-image">
									</div>

									<!-- Text -->
									<p>Cure Hospital is designed to offer calm clean comfortable and safe
										environment for our customers. The inpatient wards offer different
										varieties of accommodation based on high level design, decorations
										and facilities to offer the best available environment and hospitality
									</p>


									<!-- Button -->
									<a href="service-1-1.html" class="btn btn-blue blue-hover mt-30">View More Details</a>

								</div>	<!-- END TAB-2 CONTENT -->


								<!-- TAB-3 CONTENT -->
								<div class="tab-pane fade" id="tab-13" role="tabpanel" aria-labelledby="tab13-list">

									<!-- Title -->
									<h3 class="h3-md steelblue-color">Intensive care unit</h3>

									<!-- Text -->
									<p>Our ICU unit is our hospital’s corner stone facility that offer best available intensive
										care services either post-operative, transfer from emergency unit or transfer from
										other medical facility.
									</p>

									<!-- Image -->
									<div class="tab-img">
										<img class="img-fluid" src="{{ asset('images/image/icu1.jpg') }}" alt="tab-image">
									</div>

									<!-- Text -->
									<p>The ICU is ready to receive wide variety of cases with 10 highly equipped beds
										packed with all the required machines and devices to offer the ultimate care for
										our valuable patients.
									</p>

									<p>The ICU well selected specialist physicians and highly qualified nurses are ready
										to offer the best medical care for patient round the clock and supervised by best
										highly certified and densely experienced intensive care consultants.
										</p>
										<p>The ICU unit is packed with highly efficient dialysis machine to serve the critical
											care patient as well as impaired renal function patients from inpatient wards or
											patient transferred from other hospitals.</p>


									<!-- Button -->
									<a href="service-1-1.html" class="btn btn-blue blue-hover mt-30">View More Details</a>

								</div>	<!-- END TAB-3 CONTENT -->


								<!-- TAB-4 CONTENT -->
								<div class="tab-pane fade" id="tab-14" role="tabpanel" aria-labelledby="tab14-list">

									<!-- Title -->
									<h3 class="h3-md steelblue-color">Operation theatre</h3>

									<!-- Text -->
									<p>Our operation theatre follows the best available standard regarding
										design, structure and equipments, our operation rooms packed with
										high level machines and devices make the surgeons and staff working
										in ease and in safe environment to be able to offer the best quality
										surgical services for patients ranging from minor surgeries to the
										highly demanding surgeries.
									</p>

									<!-- Image -->
									<div class="tab-img">
										<img class="img-fluid" src="{{ asset('images/image/laboratoire.jpg') }}" alt="tab-image">
									</div>

									<!-- Text -->
									<p>Our theatre is equipped with high quality surgical tools, high quality
										high resolution image intensifier (CArm), and new generation
										endoscopy unit ready to offer upper and lower GIT endoscopy
										diagnostic and therapeutic services.
									</p>
<p>The Operation rooms are ready as well to receive the laparoscopic
	surgeries of different specialties either general surgery, orthopedics
	or gynecological surgeries. </p>
									<!-- Options List -->

									<!-- Button -->
									<a href="service-1-1.html" class="btn btn-blue blue-hover mt-30">View More Details</a>

								</div>	<!-- END TAB-4 CONTENT -->

	<!-- TAB-1 CONTENT -->
	<div class="tab-pane fade " id="tab-15" role="tabpanel" aria-labelledby="tab15-list">
		<!-- Title -->
		<h3 class="h3-md steelblue-color">Laboratory unit </h3>

		<!-- Text -->
		<p>Our Lab is equipped to serve all inpatients, outpatients and
			emergency requirements with high end machines and devices to
			offer rapid reliable results in all scopes of lab services:

		</p>
		<h3 class="h3-md steelblue-color">Radiology Department</h3>
		<p>Our radiology department offer wide range of services of
			conventional radiology with X-ray machine ready to fulfill all
			requested conventional radiology from simple X-ray to contrast and
			interventional radiology.</p>

		<!-- Image -->
		<div class="tab-img">
			<img class="img-fluid" src="{{ asset('images/image/laboratoire.jpg') }}" alt="tab-image">
		</div>

		<!-- Text -->

		<!-- Options List -->
		<div class="row">

			<div class="col-xl-6">

				<!-- Option #1 -->
				<div class="box-list">
					<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
					<p>fully integrated IT system.</p>
				</div>

				<!-- Option #2 -->
				<div class="box-list">
					<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
					<p>quality control and infection control</p>
				</div>

			</div>

			<div class="col-xl-6">

				<!-- Option #4 -->
				<div class="box-list">
					<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
					<p>hospital staff</p>
				</div>

				<!-- Option #5 -->
				<div class="box-list">
					<div class="box-list-icon blue-color"><i class="fa fa-angle-double-right"></i></div>
					<p>fully equipped kitchen</p>
				</div>

			</div>

		</div>	<!-- End Options List -->

		<!-- Button -->
		<a href="service-1-1.html" class="btn btn-blue blue-hover mt-30">View More Details</a>

	</div>	<!-- END TAB-1 CONTENT -->


							</div>	<!-- END TABS CONTENT -->


			 			</div>
				 	</div>     <!-- End row -->
				</div>     <!-- End container -->
			</section>	<!-- END TABS-2 -->



@endsection
