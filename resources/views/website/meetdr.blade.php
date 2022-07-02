@extends('website.layouts.master')
@section('title')
Meet The Doctor
@endsection
@section('content')
    <style>
        .wsmenu {
            font-size: 12.6px;
        }

        .headertopright2 {}

        .wrapper {
            position: absolute;
            width: fit-content;
            height: auto;
            margin-top: 1px;
            width: 25%;
        }

        .button2 {
            width: 160px;
            height: 30px;
            background: #f2f2f2;
            border-style: none;
            color: black;
            font-size: 11px;
            letter-spacing: 3px;
            font-family: 'Lato';
            font-weight: 600;
            outline: none;
            cursor: pointer;
            position: relative;
            padding: 0px;
            overflow: hidden;
            transition: all .5s;
        }

        .button2 span {
            position: absolute;
            display: block;
        }

        .button2 span:nth-child(1) {
            height: 3px;
            width: 200px;
            top: 0px;
            left: -200px;
            background: linear-gradient(to right, rgba(0, 0, 0, 0), #65b01b);
            border-top-right-radius: 1px;
            border-bottom-right-radius: 1px;
            animation: span1 2s linear infinite;
            animation-delay: 1s;
        }

        @keyframes span1 {
            0% {
                left: -200px
            }

            100% {
                left: 200px;
            }
        }

        .button2 span:nth-child(2) {
            height: 70px;
            width: 3px;
            top: -70px;
            right: 0px;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0), #65b01b);
            border-bottom-left-radius: 1px;
            border-bottom-right-radius: 1px;
            animation: span2 2s linear infinite;
            animation-delay: 2s;
        }

        @keyframes span2 {
            0% {
                top: -70px;
            }

            100% {
                top: 70px;
            }
        }

        .button span:nth-child(3) {
            height: 3px;


            width: 200px;
            right: -200px;
            bottom: 0px;
            background: linear-gradient(to left, rgba(0, 0, 0, 0), #004861);
            border-top-left-radius: 1px;
            border-bottom-left-radius: 1px;
            animation: span3 2s linear infinite;
            animation-delay: 3s;
        }

        @keyframes span3 {
            0% {
                right: -200px;
            }

            100% {
                right: 200px;
            }
        }

        .button2 span:nth-child(4) {
            height: 70px;
            width: 3px;
            bottom: -70px;
            left: 0px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0), #004861);
            border-top-right-radius: 1px;
            border-top-left-radius: 1px;
            animation: span4 2s linear infinite;
            animation-delay: 4s;
        }

        @keyframes span4 {
            0% {
                bottom: -70px;
            }

            100% {
                bottom: 70px;
            }
        }

        .button2:hover {
            transition: all .5s;
            outline: none;
            border: none;
        }

        .button2:focus {
            outline: none;
            border: none;
        }

        .button2:hover span {
            animation-play-state: paused;
        }

        @media (min-width: 1024px) {
            .wsmenu>.wsmenu-list>li>.wsmegamenu {
                width: 70%;
                left: 12%;
                position: absolute;
                top: 90px;
            }

            .wsmenu>.wsmenu-list>li>ul.sub-menu {
                position: absolute;
                top: 90px;
            }
        }

        .btn-company {
            color: white !important;
            background: transparent !important;
        }

        .btn-company:hover {
            color: white;
        }
    </style>
    <!-- BREADCRUMB
       ============================================= -->
    <div id="breadcrumb" class="division">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class=" breadcrumb-holder">

                        <!-- Breadcrumb Nav -->


                        <!-- Title -->
                        <h4 class="h4-sm steelblue-color">Meet The Doctors</h4>

                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> <!-- END BREADCRUMB -->

<br>
<div class="row">
    <!-- DOCTOR #1 -->
    @foreach ($doctors as $doctor)
    <div class="col-md-6 col-lg-4">
        <div class="doctor-2">
            <div class="hover-overlay">
                <img class="img-fluid" src="{{ asset($doctor->image) }}" alt="doctor-foto">
            </div>
            <div class="doctor-meta">
                <h5 class="h5-xs blue-color">{{ $doctor->name }}</h5>
                <span>{{ $doctor->caption }}</span>
                <a class="btn btn-sm btn-blue blue-hover mt-15" href="#" title="">View More Info</a>
            </div>

        </div>

    </div> <!-- END DOCTOR #1 -->

    @endforeach

</div>

@endsection
