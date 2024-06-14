<!doctype html>
<html lang="en">
   
<head>
    <title>CCG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<style>
    table{
        margin-top: 1cm;
        font-size: 65%;
    }
</style>

</head>

<body >
    <div class="row"> 
        
        <img src="img/ccglogo.jpg" class="float-left" width="120" height="75">  
        <img src="img/ccglogo.jpg" class="float-right" width="120" height="75"> 
         <h5 class="text-center  ">Club Camurí Grande</h5>
   </div > 
         <h5 br br class="text-center "><br/><br/>Estadisticas  Año:{{$añoactual->year}} Mes: {{$añoactual->month}}</h5>
       
<div class="row">
  <div class="col-6">
    <div class="card card-warning">
        <div class="card-header">
          <h5 class="card-title">Tickets por Status</h5>
        </div>
        <div class="card-body">
          @if ($record->isEmpty())
                  <p class="mb-0">Sin resultados || No existen tickets con más de 2 semanas Abiertos.</p>
                  @else
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Status</th>
                          <th scope="col">Cantidad</th>                  
                        </tr>
                      </thead>
                      <tbody>                                                                              
                          @foreach ($record as $i)
                          <tr>
                          <th scope="row">{{$i->labels}}</th>                        
                          <th scope="row">{{$i->data}}</th>                                                
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
 </div>   
</body>

</html>