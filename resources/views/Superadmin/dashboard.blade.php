@extends('layouts.master')
@section('content')
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<div class="content-wrapper">
		    <div class="card card-primary"  align="center">
        <div class="card-header" align="center">
          <h3 class="card-title"></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
			@inject('visit','App\Models\visitors')
			@inject('appoin','App\Models\Appointment')
        <div class="card-body" style="display: block" align="center" style="content-align:center">
			<div class="row" align="center">
          <div class="col">
				<div class="small-box bg-primary">
				<div class="inner" align="center">
				<h3>{{ $visit->whereRaw('Date(created_at) = CURDATE()')->count() }}</h3>
				<p>New Visitors Today</p>
				</div>
				<div class="icon">
				<i class="ion ion-bag"></i>
				</div>
				</div>
				</div>

				<div class="col">
				<div class="small-box bg-primary">
				<div class="inner" align="center">
				<h3>{{ $appoin->whereRaw('Date(created_at) = CURDATE()')->count() }}</h3>
				<p>New Appointments Today</p>
				</div>
				<div class="icon">
				<i class="ion ion-bag"></i>
				</div>
				</div>
				</div>
         </div>
		</div>
      </div>
	<div class="row">
                <div class="col" style="width:400px !important;">
                    <canvas id="canvas" height="280" width="600"></canvas>
                </div>
	<br>
	 			<div class="col" style="width:400px !important;">
                    <canvas id="canvas1" height="280" width="600"></canvas>
                </div>
	</div>
	<br>
</div>
@if(Session::get('err'))
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
	<script>
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
	Toast.fire({
        icon: 'success',
        title: '{{ Session::get('err') }}',
        background: '#20c997',
      })
	</script>
    @endif
<script>
    var year = <?php echo $month; ?>;
    var user = <?php echo $user; ?>;
    var appointment = <?php echo $appointment; ?>;
    var barChartData = {
        labels: year,
        datasets: [{
            label: 'Visitor',
            backgroundColor: "#07f7e7",
            data: user
        }]
    };

	var barChartData1 = {
        labels: year,
        datasets: [{
            label: 'Appointment',
            backgroundColor: "#07f7e7",
            data: appointment
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom',
                    }
                },
                responsive: true,
                title: {
                    display: true,
						text: 'Monthly Visitor Count',
                }
            }
        });
		var ctx1 = document.getElementById("canvas1").getContext("2d");
        window.myBar = new Chart(ctx1, {
            type: 'bar',
            data: barChartData1,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom',
                    }
                },
                responsive: true,
                title: {
                    display: true,
						text: 'Monthly Appointment',
                }
            }
        });
    };


</script>
@endsection
