@extends('website.layouts.master')
@section('title')
For Doctor
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
								<h4 class="h4-sm steelblue-color">Medical Consultant</h4>

							</div>
						</div>
					</div>  <!-- End row -->
				</div>	<!-- End container -->
			</div>	<!-- END BREADCRUMB -->


            <section class="sample-text-area">
                <div class="container box_1170 p-4">

                    <h2 class="mb-30 text-blue">If You Are a Consultant</h2>
                    {!! html_entity_decode($consult->doctor) !!}
                </div>
            </section>
            <br>

@endsection
