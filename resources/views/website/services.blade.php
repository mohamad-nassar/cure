@extends('website.layouts.master')
@section('title')
Services
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
                        <h4 class="h4-sm steelblue-color">Our Services</h4>

                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> <!-- END BREADCRUMB -->








    <!-- TABS-2
           ============================================= -->
    <section id="tabs-2" class="wide-100 tabs-section division">
        <div class="container">
            <div class="row">
                <!-- TABS NAVIGATION -->
                <div class="col-lg-4">
                    <div id="tabs-nav" class="list-group text-center clearfix">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            @foreach ($services as $item => $service)
                                <!-- TAB-1 LINK -->
                                <li class="nav-item icon-xs">
                                    <a class="nav-link @if ($loop->first) active @endif"
                                        id="tab{{ $service->id }}-list" data-toggle="pill"
                                        href="#tab-{{ $service->id }}" role="tab"
                                        aria-controls="tab-{{ $service->id }}"
                                        @if ($loop->first) aria-selected="true" @else aria-selected="false" @endif>
                                        {{ $service->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div> <!-- END TABS NAVIGATION -->
                <div class="col-lg-8">
                    <div class="tab-content" id="pills-tabContent">
                    @foreach ($services as $item => $service)
                            <div class="tab-pane fade show @if ($loop->first) active @endif"
                                id="tab-{{ $service->id }}" role="tabpanel"
                                aria-labelledby="tab{{ $service->id }}-list">
                                <h3 class="h3-md steelblue-color">{{ $service->title }}</h3>
                                {!! html_entity_decode($service->caption) !!}
                                <div class="tab-img">
                                    <img class="img-fluid" src="{{ asset($service->image) }}" alt="tab-image">
                                </div>
                                {!! html_entity_decode($service->description) !!}
                            </div> <!-- END TAB-1 CONTENT -->
                    @endforeach
                </div> <!-- END TABS CONTENT -->
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END TABS-2 -->
@endsection
