@extends('admin.layout.index')
@section('content')
<style>
  .content-i {
      width: 100%;
  }
  </style>
  <div class="content-i">
    <div class="content-box">
      <div class="row">
        <div class="col-sm-12">
          <div class="element-wrapper">
            <h6 class="element-header">
              Site Inspection
            </h6>
            <div class="element-box">
              <h4>Revenue</h4>
              <canvas id="myChart" width="400" height="150"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@section('script')
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['7 Days Ago', '6 Days Ago', '5 Days Ago', '4 Days Ago', '3 Days Ago', 'Yesterday','Today'],
        datasets: [{
          label: 'Commissioned',
          data: [12, 19, 3, 5, 2, 3,0],
          backgroundColor:'rgba(255, 99, 132, 0)',
          borderColor: 'rgba(255, 99, 132, 1)',
          pointBackgroundColor:'rgba(255, 99, 132, 1)',
          borderWidth: 2
        },{
          label: 'Commissioned',
          data: [30, 6, 13, 8, 0, 8,0],
          backgroundColor:'rgba(255, 99, 132, 0)',
          borderColor: 'rgba(111, 133, 232, 1)',
          pointBackgroundColor: 'rgba(111, 133, 232, 1)',
          borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endsection
@endsection