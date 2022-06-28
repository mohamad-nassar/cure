	@php
        $contact=json_decode(file_get_contents(public_path() . "/pages/contactus.json"));
        $opening=json_decode(file_get_contents(public_path() . "/pages/opening.json"));
    @endphp
    <!-- FOOTER-1
			============================================= -->
			<footer id="footer-1" class="wide-40 footer division">
				<div class="container">


					<!-- FOOTER CONTENT -->
					<div class="row">


						<!-- FOOTER INFO -->
						<div class="col-md-6 col-lg-3">
							<div class="footer-info mb-40">

								<!-- Footer Logo -->
								<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 360 x 80  pixels) -->
								<img src="{{ asset($contact->image) }}" width="180" height="60" alt="footer-logo">

								<!-- Text -->
								<p class="p-sm mt-20">Cure hospital is established to offer wide range of specialized high quality medical services.
								</p>

								<!-- Social Icons -->
								{{-- <div class="footer-socials-links mt-20">
									<ul class="foo-socials text-center clearfix">

										<li><a href="#" class="ico-facebook"><i class="fa fa-facebook-f"></i></a></li>
										<li><a href="#" class="ico-facebook"><i class="fa fa-instagram"></i></a></li>
										<li><a href="#" class="ico-twitter"><i class="fa fa-whatsapp"></i></a></li>
									</ul>
								</div> --}}

							</div>
						</div>


						<!-- FOOTER CONTACTS -->
						<div class="col-md-6 col-lg-3">
							<div class="footer-box mb-40">

								<!-- Title -->
								<h5 class="h5-xs">Our Location</h5>

								<!-- Address -->
								{!! html_entity_decode($contact->location) !!}

							</div>
						</div>


						<!-- FOOTER WORKING HOURS -->
						<div class="col-md-6 col-lg-3">
							<div class="footer-box mb-40">

								<!-- Title -->
								<h5 class="h5-xs">Working Time</h5>
								<!-- Working Hours -->
                                @foreach ($opening as $key=>$value)
								<p class="p-sm">{{ $key }} - <span>{{ $value }}</span></p>
                                @endforeach
							</div>
						</div>


						<!-- FOOTER PHONE NUMBER -->
						<div class="col-md-6 col-lg-3">
							<div class="footer-box mb-40">

								<!-- Title -->
								<h5 class="h5-xs">Contact Us</h5>

								<!-- Email -->
								<p class="foo-email mt-20">E: <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>

								<!-- Phone -->
								<p>P:{{ $contact->phone }}</p>
							</div>
						</div>


					</div>	  <!-- END FOOTER CONTENT -->


					<!-- FOOTER COPYRIGHT -->
					<div class="bottom-footer">
						<div class="row">
							<div class="col-md-12">
								<p class="footer-copyright">&copy;2022<span>&nbsp;Cure Hospital</span>&nbsp;|&nbsp;Powered By VeroZone Solutions</p>

							</div>
						</div>
					</div>


				</div>	   <!-- End container -->
			</footer>	<!-- END FOOTER-1 -->




		</div>	<!-- END PAGE CONTENT -->
