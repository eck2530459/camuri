@extends('adminlte::page')
 
@section('title', 'AdminLTE')
 
@section('content\_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop
 
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detalle Analista:  @if ($cticket->isempty())     
        @else
       {{ $cticket[0]->labels}}  {{ $cticket[0]->ln}} 
        @endif</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Detalle || {{Auth::user()->rol->nombre}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
                @if ($cticket->isempty())
                <h4> No existen registros </h4>
                @else
                <h3>{{$cticket[0]->data}} </h3>     
                <p>Total Tickets Atendidos</p>
                @endif
            </div>
            <div class="icon">
              <i class="fas fa-arrow-circle-right"></i>
            </div>
            <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right" data-toggle="modal" data-target=".bd-example-modal-lg30"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                @if ($cticket2->isempty())
                <h4> No existen registros </h4>
                @else
                <h3>{{$cticket2[0]->data}} </h3>     
                <p>Total Tickets {{$cticket2[0]->labels}}</p>
                @endif
              </div>
              <div class="icon">
                <i class="fas fa-arrow-circle-right"></i>
              </div>
              <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right" data-toggle="modal" data-target=".bd-example-modal-lg30"></i></a>
            </div>
          </div>
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                @if ($cticket2->isempty())
                <h4> No existen registros </h4>
                @else
                <h3>{{$cticket2[1]->data}} </h3>     
                <p>Total Tickets {{$cticket2[1]->labels}}</p>
                @endif
              </div>
              <div class="icon">
                <i class="fas fa-arrow-circle-right"></i>
              </div>
              <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right" data-toggle="modal" data-target=".bd-example-modal-lg30"></i></a>
            </div>
          </div>
    </div>
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
    <!--GRAFICA 1 -->
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Tickets Culminados por  mes Año actual</h3>
  
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="prueba3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>  
            </div>
    
     <!--  GRAFICO 2 -->
     <div class="col-md-6">
     <div class="card card-orange">
        <div class="card-header">
          <h3 class="card-title">Tickets por Status</h3>
    
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <canvas id="prueba1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
      </div>
     </div>
      <!--  GRAFICO 3 -->
     <div class="col-md-6">

     <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">Tickets por Falla</h3>
    
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <canvas id="prueba" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
      </div>
     </div>

     <div class="col-md-6">
     <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">Tiempo promedio de respuesta a Tickets</h3>
    
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div class="row align-items-start">
                <div class="col-md-4 p-3">
                  <div class="text-left"><i class="fa fa-calendar"></i> Todos
                  </div>                    
                </div>
                <div class="col-md-4 p-3">
                  <div class="text-center">
                    <b><h4> {{$tiempo}} Días =</h4></b>                        
                </div>
                </div>
                <div class="col-md-4 ms-auto p-3">
                  <div class="text-left">
                   <b><h4>  Horas</h4></b>                        
                 </div>
                </div>
            </div>
            <div class="row align-items-start">
                <div class="col-md-4 p-3">
                  <div class="text-left"><i class="fa fa-calendar"></i> Últimos 5
                  </div>                    
                </div>
                <div class="col-md-4 p-3">
                  <div class="text-center">
                    <b><h4> {{$tiempo}} Días =</h4></b>                        
                </div>
                </div>
                <div class="col-md-4 ms-auto p-3">
                  <div class="text-left">
                   <b><h4>  Horas</h4></b>                        
                 </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
      </div>
     </div>

    </div></div></section>
  </div>
  @stop
  @section('js')
  <script>
    $(function () {
       //-------------
       var cData = JSON.parse(`<?php echo $chart_data; ?>`);
   const ctx5 = document.getElementById('prueba3');
    const myChart5 = new Chart(ctx5, {
        type: 'bar',
        data: {
          labels: cData.label5,
          
            datasets: [{
                label: 'Cantidad de Tickets por mes',             
                data: cData.data5,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                   
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                 
                ],
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
     })
     var ctx2 = document.getElementById('prueba1').getContext('2d');
        
        var myChart = new Chart(ctx2, {
 type: "pie",
  data: {
    labels: cData.label1,
    
    datasets: [{
      backgroundColor:  [
        'rgb(25, 143, 26)', 'rgb(243,233,32)',
        'rgb(75, 192, 192)', 'rgb(54, 162, 235)'
        ],
      data: cData.data1,


    }],
    tooltip: {
        callbacks: {
            label: function(context) {
                let label = context.label;
                let value = context.formattedValue;
                

                if (!label)
                    label="Unknown"

                let sum = 0;
                let dataArr = context.chart.data1.datasets[0].data1;
                dataArr.map(data => {
                    sum += Number(data);
                });

                let percentage = (60 * 100 / sum).toFixed(2) + '%';
                return 'label' + ": " + 50;
            }
        }
    }
  },
  
  options: {
    
  }
})

//-------------

var ctx = document.getElementById('prueba').getContext('2d');
        var myChart = new Chart(ctx, {
 type: "doughnut",
  data: {
    labels: cData.label,    
    datasets: [{
      backgroundColor:  [
        'rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)', 
        'rgb(75, 192, 192)', 'rgb(54, 162, 235)', 'rgb(142, 90, 198)',
        'rgb(59, 182, 74)', 'rgb(59, 182, 74)', 'rgb(59, 182, 74)'
        ],
      data: cData.data,
    }],
    tooltip: {
        callbacks: {
            label: function(context) {
                let label = context.label;
                let value = context.formattedValue;

                if (!label)
                    label="Unknown"

                let sum = 0;
                let dataArr = context.chart.data.datasets[0].data;
                dataArr.map(data => {
                    sum += Number(data);
                });

                let percentage = (60 * 100 / sum).toFixed(2) + '%';
                return 'label' + ": " + 50;
            }
        }
    }
  },
  
  options: {
    
  }
})
  
    })

    </script>
@stop
