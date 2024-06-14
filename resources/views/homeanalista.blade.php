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
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard || {{Auth::user()->rol->nombre}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

<!--------------------------------------------------------
--------------------INICIO Dashboard Analista ----------------------
----------------------------------------------------------
---------------------------------------------------------->
@if (Auth::user()->rol->id == 2)
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-dark">
          <div class="inner">
            <h3>{{$mt}} </h3>     
            <p>Total Mis Tickets</p>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-circle-right"></i>
          </div>
          <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right" data-toggle="modal" data-target=".bd-example-modal-lg30"></i></a>
        </div>
      </div>
             <!-- Modal todos mis tickets-->
<div class="modal fade bd-example-modal-lg30" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Mis últimos 10 Tickets</h5>
        </div>
        <div class="modal-body">
          <div class="row">
  
            <div class="form-group">
              <div class="col-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">fecha</th>
                      <th scope="col">Categoría</th>
                      <th scope="col">Reporte</th>
                      <th scope="col">Status</th>                                                    
                      <th scope="col">Usuario</th>                                                    
                      <th scope="col">Acciones </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($mtu30 as $i)
                    <tr>
                    <th scope="row">{{$i->id}}</th>
                      <td>{{$i->fecha}}</td>    
                      <td>{{$i->asunto_detalle->nombre}}</td>    
                      <td>{{$i->descripcion}}</td>    
                      
                      @if ($i->status == 'Culminado')
                      <td class="bg-success">
                        {{$i->status}}
                      </td>     
                      @endif
                      @if ($i->status == 'Asignado')
                      <td class="bg-warning">
                        {{$i->status}}
                      </td>     
                      @endif
                    
                      <td>{{$i->user_detalle->name}} {{$i->user_detalle->last_name}}</td>    

                      <td><a class="btn btn-sm btn-primary btn-sm" href="{{ route('ticket.edit',$i->id) }}"><i class="fa fa-fw fa-eye"></i> </a> </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Fin Modal todos mis tickets -->
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3> {{$tabiertocount}}  <sup style="font-size: 20px"></sup></h3>

            <p>Tickets abiertos </p>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-circle-right"></i>
          </div>          
          <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right" data-toggle="modal" data-target=".bd-example-modal-lg3"></i></a>
        </div>
      </div>
       <!-- Modal mis tickets abiertos-->
<div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Últimos 10 tickets abiertos</h5>
        </div>
        <div class="modal-body">
          <div class="row">
  
            <div class="form-group">
              <div class="col-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">fecha</th>
                      <th scope="col">Categoría</th>
                      <th scope="col">Reporte</th>
                      <th scope="col">Status</th>                                                    
                      <th scope="col">Usuario</th>                                                    
                      <th scope="col">Acciones </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($mtu3 as $i)
                    <tr>
                    <th scope="row">{{$i->id}}</th>
                      <td>{{$i->fecha}}</td>    
                      <td>{{$i->asunto_detalle->nombre}}</td>    
                      <td>{{$i->descripcion}}</td>    
                      
                      @if ($i->status == 'Culminado')
                      <td class="bg-success">
                        {{$i->status}}
                      </td>     
                      @endif
                      @if ($i->status == 'Asignado')
                      <td class="bg-warning">
                        {{$i->status}}
                      </td>     
                      @endif
                      @if ($i->status == 'Abierto')
                      <td class="bg-danger">
                        {{$i->status}}
                      </td>     
                      @endif
                      <td>{{$i->user_detalle->name}} {{$i->user_detalle->last_name}}</td>    

                      <td><a class="btn btn-sm btn-primary btn-sm" href="{{ route('ticket.edit',$i->id) }}"><i class="fa fa-fw fa-eye"></i> </a> </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Fin Modal mis tickets abiertos -->
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">           
            <!-- utilizo la variable Nm para leer un array de la consulta y le asigno la posicion
            0 para que traiga el primer valor que corresponde a Los tickets asignados-->         
            <h3>{{$mt1}}</h3>  
            <p>Mis Tickets Asignados</p>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-circle-right"></i>
          </div>
          <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right" data-toggle="modal" data-target=".bd-example-modal-lg4"></i></a>
        </div>
      </div>
      <!-- ./col -->
        <!-- Modal mis tickets asignados-->
<div class="modal fade bd-example-modal-lg4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Mis Últimos 10 tickets asignados</h5>
        </div>
        <div class="modal-body">
          <div class="row">
  
            <div class="form-group">
              <div class="col-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">fecha</th>
                      <th scope="col">Categoría</th>
                      <th scope="col">Reporte</th>
                      <th scope="col">Status</th>                                                    
                      <th scope="col">Usuario</th>                                                    
                      <th scope="col">Acciones </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($mtu4 as $i)
                    <tr>
                    <th scope="row">{{$i->id}}</th>
                      <td>{{$i->fecha}}</td>    
                      <td>{{$i->asunto_detalle->nombre}}</td>    
                      <td>{{$i->descripcion}}</td>    
                      
                      @if ($i->status == 'Culminado')
                      <td class="bg-success">
                        {{$i->status}}
                      </td>     
                      @endif
                      @if ($i->status == 'Asignado')
                      <td class="bg-warning">
                        {{$i->status}}
                      </td>     
                      @endif
                      @if ($i->status == 'Abierto')
                      <td class="bg-danger">
                        {{$i->status}}
                      </td>     
                      @endif
                      <td>{{$i->user_detalle->name}} {{$i->user_detalle->last_name}}</td>    

                      <td><a class="btn btn-sm btn-primary btn-sm" href="{{ route('ticket.edit',$i->id) }}"><i class="fa fa-fw fa-eye"></i> </a> </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Fin Modal mis tickets asignados -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">           
            <h3>{{$mt2}}</h3> 
            <p>Mis Tickets culminados</p>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-circle-right"></i>
          </div>
          <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right" data-toggle="modal" data-target=".bd-example-modal-lg6"></i></a>
        </div>
      </div>
             <!-- Modal mis tickets Culminados-->
<div class="modal fade bd-example-modal-lg6" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Últimos 10 tickets Culminados</h5>
        </div>
        <div class="modal-body">
          <div class="row">
  
            <div class="form-group">
              <div class="col-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">fecha</th>
                      <th scope="col">Categoría</th>
                      <th scope="col">Reporte</th>
                      <th scope="col">Status</th>                                                    
                      <th scope="col">Usuario</th>                                                    
                      <th scope="col">Acciones </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($mtu2 as $i)
                    <tr>
                    <th scope="row">{{$i->id}}</th>
                      <td>{{$i->fecha}}</td>    
                      <td>{{$i->asunto_detalle->nombre}}</td>    
                      <td>{{$i->descripcion}}</td>    
                      
                      @if ($i->status == 'Culminado')
                      <td class="bg-success">
                        {{$i->status}}
                      </td>     
                      @endif
                      @if ($i->status == 'Asignado')
                      <td class="bg-warning">
                        {{$i->status}}
                      </td>     
                      @endif
                      @if ($i->status == 'Abierto')
                      <td class="bg-danger">
                        {{$i->status}}
                      </td>     
                      @endif
                      <td>{{$i->user_detalle->name}} {{$i->user_detalle->last_name}}</td>    

                      <td><a class="btn btn-sm btn-primary btn-sm" href="{{ route('ticket.edit',$i->id) }}"><i class="fa fa-fw fa-eye"></i> </a> </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Fin Modal mis tickets Culminados -->
    </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Inicio | Tickets Asignados</p>
                    <div class="row">
                    <div class="col-10">
                        <h5>Mis Tickets</h5>
                    </div>
                    <div class="col-2">
                    </div>
                    </div>
                    <br>
                    <div class="col-12">
                        @if ($mtu5->isEmpty())
                        <p class="mb-0">Sin resultados || No existen tickets asignados por comentar.</p>
                        @else                    
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Reporte</th>
                            <th scope="col">Status</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Acciones </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($mtu5 as $i)
                            <tr>
                            <th scope="row">{{$i->id}}</th>
                            <td>{{$i->asunto_detalle->nombre}}</td>    
                            <td>{{$i->descripcion}}</td>
                            @if ($i->status == 'Asignado')
                            <td class="bg-warning">
                              {{$i->status}}
                            </td>     
                            @endif
                            <td>{{$i->user_detalle->name}} {{$i->user_detalle->last_name}}</td>
                            <td>{{$i->user_detalle->departamento->nombre}}</td>
                            <td>
                              <a class="btn btn-sm btn-primary btn-sm" href="{{ route('ticket.edit',$i->id) }}"><i class="fa fa-fw fa-eye"></i> </a>                              
                            </td>     
                          </tr>                         
                          @endforeach
                        
                        </tbody>
                      </table>
                      @endif
                    </div>
                </div>   
            </div> 
        </div>
    </div>
      
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Tickets abiertos con más de 2 semanas.</h3>
            
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
                    @if ($tab1semana->isEmpty())
                    <p class="mb-0">Sin resultados || No existen tickets con más de 2 semanas Abiertos.</p>
                    @else
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Reporte</th>
                            <th scope="col">Status</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Acciones </th>
                          </tr>
                        </thead>
                        <tbody>
                          
                                
                          
                            @foreach ($tab1semana as $i)
                            <tr>
                            <th scope="row">{{$i->id}}</th>
                            <td>{{$i->asunto_detalle->nombre}}</td>    
                            <td>{{$i->descripcion}}</td>
                            @if ($i->status == 'Abierto')
                            <td class="bg-danger">
                              {{$i->status}}
                            </td>     
                            @endif
                            <td>{{$i->user_detalle->name}} {{$i->user_detalle->last_name}}</td>
                            <td>{{$i->user_detalle->departamento->nombre}}</td>
                            <td>
                              <a class="btn btn-sm btn-primary btn-sm" href="{{ route('ticket.edit',$i->id) }}"><i class="fa fa-fw fa-eye"></i> </a>                              
                            </td>     
                          </tr>                         
                          @endforeach
                          @endif
                        
                        </tbody>
                      </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        
        </div>
        <div class="row">
          <div class="col-md-6">
  <!--GRAFICA 1 -->
  <div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Mis Tickets Culminados por Categoría</h3>

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
  <div class="card card-dark">
    <div class="card-header">
      <h3 class="card-title">Mi Tiempo promedio de respuesta a Tickets</h3>

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
               <b><h4> {{$tiempo1}} Horas</h4></b>                        
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
               <b><h4> {{$tiempo1}} Horas</h4></b>                        
             </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
  </div>
  
            <!-- /.card -->
          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">

 <!--  GRAFICO 2 -->
    <div class="card card-warning">
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


            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Usuarios con más Reportes Atendidos</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="col-sm-6">
               
  
             </div>
              <div class="card-body">
                <div class="chart">
                    @foreach ($users as $item)
                    <div class="row align-items-start">
                      <div class="col-md-2 p-3">
                        <div class="text-left"><i class="fa fa-user fa-2x"></i>
                        </div>                    
                      </div>
                      <div class="col-md-5 p-3">
                        <div class="text-center">
                         {{$item->label}} <br> {{$item->dept}}
                      </div>
                      </div>
                      <div class="col-md-5 ms-auto p-3">
                        <div class="text-left">
                         <b><h4> {{$item->data}} Tickets</h4></b>                        
                       </div>
                      </div>
                  </div>
                  
                    @endforeach
                   
                  </div>
              </div>
             
        
  
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  
    @endif
    @extends('layouts.footer')
    @stop

    @section('js')
    <script>
        $(function () {
          /* ChartJS
           * -------
           * Here we will create a few charts using ChartJS
           */    
          var cData = JSON.parse(`<?php echo $chart_data; ?>`);
  
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
         
  var ctx2 = document.getElementById('prueba1').getContext('2d');
          
          var myChart = new Chart(ctx2, {
   type: "pie",
    data: {
      labels: cData.label1,
      
      datasets: [{
        backgroundColor:  [
        'rgb(243,233,32)', 'rgb(25, 143, 26)', 
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
       });
  })
      </script>

    @stop
