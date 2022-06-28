@extends('website.layouts.master')
@section('content')

@php
$contact=json_decode(file_get_contents(public_path() . "/pages/contactus.json"));
$opening=json_decode(file_get_contents(public_path() . "/pages/opening.json"));
@endphp
			<!-- BREADCRUMB
			============================================= -->
			<div id="breadcrumb" class="division">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class=" breadcrumb-holder">

								<!-- Breadcrumb Nav -->


								<!-- Title -->
								<h4 class="h4-sm steelblue-color">Appointment</h4>

							</div>
						</div>
					</div>  <!-- End row -->
				</div>	<!-- End container -->
			</div>	<!-- END BREADCRUMB -->



			<!-- APPOINTMENT PAGE
			============================================= -->
			<div id="appointment-page" class="wide-60 appointment-page-section division">
				<div class="container">
				 	<div class="row">


				 		<!-- SERVICE DETAILS -->
				 		<div class="col-lg-8">
				 			<div class="txt-block pr-30">

				 				<!-- Title -->
								<h3 class="h3-md steelblue-color">Book an Appointment</h3>

								<!-- Text -->
								<p>Request appointments based on slots, date,consultation location. Know your Doctor to book confirmed doctor Appointment effortlessly with clinic details of practice location to engage with patients effortlessly.
								</p>

								<!-- APPOINTMENT FORM -->
								<div id="appointment-form-holder" class="text-center">
									<form action="{{ Route('sendappointment') }}" method="POST" class="row appointment-form" autocomplete="off">
                                        @csrf
										<!-- Form Select -->
						                <div id="input-department" class="col-md-12 input-department">
						                    <select id="inlineFormCustomSelect1" name="department" class="custom-select department" required="">
						                        <option value="">Select Department</option>
						                      	@foreach ($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->title }}</option>
                                                @endforeach
						                    </select>
						                </div>

						                <!-- Form Select -->
						                <div id="input-doctor" class="col-md-12 input-doctor">
						                    <select id="inlineFormCustomSelect2" name="doctor" class="custom-select doctor" required="">
						                        <option value="">Select Doctor</option>
                                                @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                            @endforeach
						                    </select>
						                </div>

						                 <!-- Form Select -->
						                <div id="input-patient" class="col-md-12 input-patient">
						                    <select id="inlineFormCustomSelect3" name="patient" class="custom-select patient" required="">
						                        <option value="">Have You Visited Us Before?*</option>
												<option value="New">New Patient</option>
												<option value="Other">Other</option>
						                    </select>
						                </div>

						                <!-- Contact Form Input -->
						                <div id="input-date" class="col-lg-12">
						                	<input id="datetimepicker" type="text" name="date" class="form-control date" placeholder="Appointment Date" required="">
						                </div>

						                <!-- Contact Form Input -->
						                <div id="input-name" class="col-lg-12">
						                	<input type="text" name="name" class="form-control name" placeholder="Full Name*" required="">
						                </div>

						                <div id="input-email" class="col-lg-12">
						                	<input type="text" name="email" class="form-control email" placeholder="Enter Your Email*" required="">
						                </div>

						                <div id="input-phone" class="col-lg-12">
						                	<input type="tel" name="phone" class="form-control phone" placeholder="Enter Your Phone Number*" required="">
						                </div>

						                <div id="input-message" class="col-lg-12 input-message">
						                	<textarea class="form-control message" name="message" rows="6" placeholder="Your Message ..."></textarea>
						                </div>

						                <!-- Contact Form Button -->
						                <div class="col-lg-12 form-btn">
						                	<button type="submit" class="btn btn-blue blue-hover submit">Request an Appointment</button>
						                </div>

						                <!-- Contact Form Message -->

					                </form>

								</div>	<!-- END APPOINTMENT FORM -->

				 			</div>
				 		</div>	<!-- END SERVICE DETAILS -->


				 		<!-- SIDEBAR -->
						<aside id="sidebar" class="col-lg-4">


							<!-- TEXT WIDGET -->
							<div id="txt-widget" class="sidebar-div mb-50">

								<!-- Title -->
								<h5 class="h5-sm steelblue-color">The Heart Of Clinic</h5>

								<!-- Head of Clinic -->
								{{-- <div class="txt-widget-unit mb-15 clearfix d-flex align-items-center">

									<!-- Avatar -->
									<div class="txt-widget-avatar">
										<img src="{{ asset('images/image/dr1.webp') }}" alt="testimonial-avatar">

									</div>

									<!-- Data -->
									<div class="txt-widget-data">
										<h5 class="h5-md steelblue-color">Dr. Ajami</h5>
										<span>Cardiology</span>
										<p class="blue-color">1-222-222-222</p>
									</div>

								</div>	<!-- End Head of Clinic --> --}}

								<!-- Text -->
								<p class="p-sm">Know your Doctor to book confirmed doctor Appointment effortlessly with clinic details of practice location to engage with patients effortlessly.
								</p>

								<!-- Button -->
								<a href="about.html" class="btn btn-blue blue-hover">Learn More</a>

							</div>	<!-- END TEXT WIDGET -->


							<!-- SIDEBAR TABLE -->
							<div class="sidebar-table blue-table sidebar-div mb-50">

								<!-- Title -->
								<h5 class="h5-md">Working Time</h5>

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

								<!-- Title -->
								<h5 class="h5-xs">Need a personal health plan?</h5>

								<!-- Text -->
								<p class="p-sm">Porta semper lacus cursus, and feugiat primis ultrice ligula at risus auctor</p>

							</div>	<!-- END SIDEBAR TABLE -->


						</aside>   <!-- END SIDEBAR -->


					</div>	<!-- End row -->
				</div>	 <!-- End container -->
			</div>	<!-- END APPOINTMENT PAGE -->





@endsection
