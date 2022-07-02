@extends('website.layouts.master')
@section('title')
Contact Us
@endsection
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
								<h4 class="h4-sm steelblue-color">Contact Us</h4>

							</div>
						</div>
					</div>  <!-- End row -->
				</div>	<!-- End container -->
			</div>	<!-- END BREADCRUMB -->







			<!-- CONTACTS-1
			============================================= -->
			<section id="contacts-1" class="wide-60 contacts-section division">
				<div class="container">


					<!-- SECTION TITLE -->
					<div class="row">
						<div class="col-lg-10 offset-lg-1 section-title">

							<!-- Title 	-->
							<h3 class="h3-md steelblue-color">Have a Question? Get In Touch</h3>

						</div>
					</div>


					<div class="row">


		 				<!-- CONTACTS INFO -->
		 				<div class="col-md-5 col-lg-4">

		 					<!-- General Information -->
		 					<div class="contact-box mb-40">
								<h5 class="h5-sm steelblue-color">General Information</h5>
								<p>{!! html_entity_decode($contact->location) !!}</p>
								<p>Phone:{{ $contact->phone }}</p>
								<p>Email: <a href="mailto:{{ $contact->email }}" class="blue-color">{{ $contact->email }}</a></p>
		 					</div>


		 					<!-- Working Hours -->
		 					<div class="contact-box mb-40">
								<h5 class="h5-sm steelblue-color">Working Hours</h5>
                                @foreach ($opening as $key=>$value)
                                <p>{{ $key }} : {{ $value }}</p>
                                @endforeach
		 					</div>

						</div>	<!-- END CONTACTS INFO -->


						<!-- CONTACT FORM -->
				 		<div class="col-md-7 col-lg-8">
				 			<div class="form-holder mb-40">
                                @if(Session::get('err'))
                                    <div class="alert alert-success">
                                        {{ Session::get('err') }}
                                    </div>
                                @endif
				 				<form  action="{{ Route('sendcontact') }}" method="POST" class="row contact-form">
                                    @csrf
					                <!-- Contact Form Input -->
					                <div id="input-name" class="col-md-12 col-lg-6">
					                	<input type="text" name="name" class="form-control name" placeholder="Enter Your Name*" >
					                </div>

					                <div id="input-email" class="col-md-12 col-lg-6">
					                	<input type="text" name="email" class="form-control email" placeholder="Enter Your Email*" required="">
					                </div>

					                <div id="input-phone" class="col-md-12 col-lg-6">
					                	<input type="tel" name="phone" class="form-control phone" placeholder="Enter Your Phone Number*" required="">
					                </div>


					                <div id="input-subject" class="col-lg-6 col-md-12">
					                	<input type="text" name="subject" class="form-control subject" placeholder="Subject*" required="">
					                </div>

					                <div id="input-message" class="col-lg-12 input-message">
					                	<textarea class="form-control message" name="msg" rows="6" placeholder="Your Message ..." required=""></textarea>
					                </div>

					                <!-- Contact Form Button -->
					                <div class="col-lg-12 mt-15 form-btn">
					                	<button type="submit" class="btn btn-blue blue-hover submit">Send Your Message</button>
					                </div>

					                <!-- Contact Form Message -->

				                </form>

				 			</div>
				 		</div> 	<!-- END CONTACT FORM -->


				 	</div>	<!-- End row -->


				</div>	   <!-- End container -->
			</section>	<!-- END CONTACTS-1 -->





@endsection
