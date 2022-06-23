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
								<h4 class="h4-sm steelblue-color">Hospital Equipment</h4>

							</div>
						</div>
					</div>  <!-- End row -->
				</div>	<!-- End container -->
			</div>	<!-- END BREADCRUMB -->


            <section class="sample-text-area">
                <div class="container p-4">
                    <img src="{{ asset('images/image/icu.jpg') }}" class="w-100 mb-3">
                    <img src="{{ asset('images/image/icumach.jpg') }}" class="w-100 mb-3">
                    <img src="{{ asset('images/image/icu.jpg') }}" class="w-100 mb-3">
                    <img src="{{ asset('images/image/icumach.jpg') }}" class="w-100 mb-3">
                    <img src="{{ asset('images/image/icu.jpg') }}" class="w-100 mb-3">
                 </div>
            </section>



@endsection
