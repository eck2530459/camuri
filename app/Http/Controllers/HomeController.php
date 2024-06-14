<?php

namespace App\Http\Controllers;
use App\Models\TicketDetalle;
use App\Models\Ticket;
use App\Models\HistorialTicket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['culminar', 'store', 'destroy', 'edit', 'update']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function imprimir(){
      $añoactual = now();
      $year= $añoactual->year; 
      $mes = $añoactual->month; 
      $data= NULL;
      
    //******************consulta para grafica tickets por status******************************************************** */
    //consulta para grafica tickets por status
    $record = DB::table('tickets')
    ->select('status as labels', DB::raw('count(*) as data'))
    ->where('status', '!=', NULL)
    ->whereYear('tickets.created_at', '=', $year)
    ->groupBy('labels')
     ->get(); 
      //return $record;
       foreach($record as $row) {
          $data['labels'][] = $row->labels;
          $data['data'][] = (int) $row->data;}
          $arreglo=$data;
          //$collection = collect($record);

          //return $arreglo->label;  
          $data['chart_data'] = json_encode($data);
          $collection =collect($data);
          //return $collection->first();
          //return $arreglo['label'];
          
     // $pdf = \PDF::loadView('pdf.ejemplo');
      //return $pdf->download('ejemplo.pdf');
      return view('pdf.ejemplo', compact('arreglo', 'record', 'data', 'añoactual'));
 }
    public function update(Request $request)
    {
        $ticketculminar = TicketDetalle::find($request->bookId);
        $ticketculminar2 = Ticket::find($request->bookId);
       // $analista = User::find($ticketculminar->analista_id);
        $historial = HistorialTicket::where('ticket_id', '=', $request->bookId)
        ->orderby('id', 'desc')->first();
       //return $historial;
        $HistorialTicket = new HistorialTicket();
        $HistorialTicket->razon_estatus = 'Culminacion de Ticket';
        $HistorialTicket->mod_id = Auth::user()->id;
        $HistorialTicket->asunto = $historial->asunto;
        $HistorialTicket->user_id = $historial->user_id;
        $HistorialTicket->descripcion = $ticketculminar->descripcion;
        $HistorialTicket->respuesta = $ticketculminar->respuesta;
        $HistorialTicket->analista_id = $historial->analista_id;
        //$HistorialTicket->analista_id = $request->input('categoria', $ticket->analista_id);
        $HistorialTicket->ticket_id = $ticketculminar->id;
        $HistorialTicket->save();
        //return $HistorialTicket;
        $ticketculminar2->update([
          'status'  => 'Culminado']);
            return back()->withStatus(__('Ticket culminado con éxito.'));    
        }
     
    public function index()
    {
      $añoactual = now();
      $year= $añoactual->year;
      //return Usuario-->>>>>>>>>>>>>>>>> 
      if (Auth::user()->rol_id == 3) {
        $mtu = TicketDetalle::join('tickets as t', 'ticket_detalles.ticket_id', '=', 't.id')
        ->where('user_id', Auth::user()->id)
        ->orderby('t.created_at', 'DESC')->paginate(10);
        $mtu2 = TicketDetalle::join('tickets as t', 'ticket_detalles.ticket_id', '=', 't.id')
        ->where('user_id', Auth::user()->id)
        ->where('status', 'Culminado')
        ->orderby('t.created_at', 'DESC')->paginate(10);
        $mtu3 = TicketDetalle::join('tickets as t', 'ticket_detalles.ticket_id', '=', 't.id')
        ->where('user_id', Auth::user()->id)->where('status', 'Abierto')->orderby('t.created_at', 'DESC')->paginate(10);
        $tusuario = TicketDetalle::where('user_id', '=',  Auth::user()->id)->count();
        $tusuarioasig = DB::table('tickets')
        ->join('ticket_detalles', 'ticket_detalles.ticket_id', '=', 'tickets.id')
        ->where('ticket_detalles.user_id', '=', Auth::user()->id)
        ->where('tickets.status', '=', 'Abierto')
        ->count();
        $tusuario2 = DB::table('ticket_detalles')
        ->join('tickets as t', 'ticket_detalles.ticket_id', '=', 't.id')
        ->join('users as u', 'u.id', '=', 'ticket_detalles.user_id')
        ->where('ticket_detalles.user_id', '=', Auth::user()->id)
        ->where('ticket_detalles.analista_id', '!=', NULL)
        ->where('ticket_detalles.respuesta', '!=', NULL)
        ->where('t.status', '=', 'Asignado')
        ->select('ticket_detalles.id','ticket_detalles.descripcion', 'ticket_detalles.respuesta', 't.status', 'u.name')
        ->orderby('ticket_detalles.created_at', 'DESC')
        ->get();    
        $tusuarioculm = DB::table('tickets')
        ->join('ticket_detalles', 'ticket_detalles.ticket_id', '=', 'tickets.id')
        ->where('ticket_detalles.user_id', '=', Auth::user()->id)
        ->where('tickets.status', '=', 'Culminado')
        ->count();
        $n = 0;

      return view('homeusuario', compact('year','n','mtu', 'mtu2','mtu3','tusuario','tusuarioasig','tusuario2', 'tusuarioculm'));
      }  
    //return Analista-->>>>>>>>>>>>>>>>> 
    //Valido si el usuario es Analista //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 
    //rol******************************* DASHBOARD Analista *****************************************************
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 
      if (Auth::user()->rol_id == 2) {
 
    $tiempo = NULL; $tiempo1 = NULL;
    $endDate =Carbon::now()->subweek(2);
    $startDate =Carbon::now()->subMonth(2);    
    $fnfecha= Carbon::parse($endDate)->format('Y-m-d');
    $infecha= Carbon::parse($startDate)->format('Y-m-d');    
    //return $fnfecha;
    
    $tab1semana = TicketDetalle::join('tickets as t', 'ticket_id', 't.id')
    ->where('t.status', 'Abierto')
    ->whereBetween('t.created_at', [$infecha,$fnfecha])
    ->whereYear('t.created_at', '=', $year)
    //->select( DB::raw('count(*) as data, tickets.id as ta'))
    //->groupby('ta')
    ->get();
    $count = $tab1semana->count();

    //return $tab1semana[0]->user_detalle->name;
    $tabiertocount = Ticket::where('status', 'Abierto')->whereYear('created_at', '=', $year)->count();      
    $suma = 0; $suma1 = 0; $data= NULL;
    $mt = TicketDetalle::where('analista_id', Auth::user()->id)->whereYear('created_at', '=', $year)->count();
    $mt1 = Ticket::join('ticket_detalles as td', 'td.ticket_id', 'tickets.id')
    ->where('status', 'Asignado')->where('analista_id',Auth::user()->id )->whereYear('tickets.created_at', '=', $year)->count();
    $mt2 = Ticket::join('ticket_detalles as td', 'td.ticket_id', 'tickets.id')
    ->where('status', 'Culminado')->where('analista_id',Auth::user()->id )->whereYear('tickets.created_at', '=', $year)->count();      
    $ttotal = Ticket::count();
      //calculando el promedio de respuesta de los tickets 
    
    $promedioanalista = Ticket::join('ticket_detalles as td','td.ticket_id', 'tickets.id')
    ->where('analista_id', Auth::user()->id)
    ->where('status', '!=', 'Abierto')
    ->where('fecha_rpta', '!=', NULL)
    ->whereYear('tickets.created_at', '=', $year)->get();      
    $promedioanalista5 = Ticket::join('ticket_detalles as td','td.ticket_id', 'tickets.id')->where('analista_id', Auth::user()->id)->where('status', 'Culminado')
    ->whereYear('tickets.created_at', '=', $year)->orderby('tickets.created_at', 'DESC')->take(5)->get();
    $mtu2 = TicketDetalle::join('tickets as t', 'ticket_detalles.ticket_id', '=', 't.id')
    ->where('status', 'Culminado')->where('analista_id', Auth::user()->id)->whereYear('t.created_at', '=', $year)
    ->orderby('t.created_at', 'DESC')->get();
    //return $mtu2;
    $mtu3 = TicketDetalle::join('tickets as t', 'ticket_detalles.ticket_id', '=', 't.id')
    ->where('status', 'Abierto')->whereYear('t.created_at', '=', $year)->orderby('t.created_at', 'DESC')->get();
    $mtu4 = TicketDetalle::join('tickets as t', 'ticket_detalles.ticket_id', '=', 't.id')
    ->where('status', 'Asignado')->whereYear('t.created_at', '=', $year)->where('analista_id', Auth::user()->id)->orderby('t.created_at', 'DESC')->get();
    $mtu5 = TicketDetalle::join('tickets as t', 'ticket_detalles.ticket_id', '=', 't.id')
    ->where('status', 'Asignado')->where('analista_id', Auth::user()->id)
    ->where('respuesta', NULL)->orderby('t.created_at', 'DESC')->whereYear('t.created_at', '=', $year)->get();
    $mtu30 = TicketDetalle::join('tickets as t', 'ticket_detalles.ticket_id', '=', 't.id')
    ->where('analista_id', Auth::user()->id)->whereYear('t.created_at', '=', $year)
    ->orderby('t.created_at', 'DESC')->get();
          
    $prome= count($promedioanalista);  
    //return $prome;    
    if ($prome != 0) {
      foreach($promedioanalista as $creacion)
    {
    $timein = $creacion->created_at;          
    $datein = Carbon::parse($timein);

    $timefn = $creacion->fecha_rpta;
    $datefn = Carbon::parse($timefn);
    $dif = $datein->diffIndays($datefn);             
        $suma += $dif;                                                  
    $dif1 = $datein->diffInhours($datefn);             
        $suma1 += $dif1;}
    $pro = (int)$suma;   
    $pro1 = (int)$suma1;   

    $tiempo = $pro/$prome;  
    $tiempo1 = $pro1/$prome;}
      //***********consulta para grafica tickets por categoria*************************************************************** */
      //consulta para grafica tickets por categoria
      $record = DB::table('ticket_detalles')
      ->join('asuntos', 'ticket_detalles.asunto_id', '=', 'asuntos.id')
      ->join('tickets', 'tickets.id', 'ticket_detalles.ticket_id')
      ->select('asuntos.nombre as label', DB::raw('count(*) as data'))
      ->where('status', '=', 'Culminado')
      ->where('analista_id','=', Auth::user()->id)->whereYear('tickets.created_at', '=', $year)->groupBy('asuntos.nombre')
      ->get();     
       foreach($record as $row) {
          $data['label'][] = $row->label;
          $data['data'][] = (int) $row->data;}
        $arreglo=$data;
      //*******************consulta no recuerdo */
      $ta = Ticket::join('ticket_detalles as td', 'td.ticket_id', '=', 'tickets.id')
      ->where('td.analista_id', Auth::user()->id)->whereYear('tickets.created_at', '=', $year)
      ->select('tickets.status')
      ->groupby('status')->get();
      $count = count($ta);
      
      //*******consulta para grafica tickets por status  ******************************************************************* */      
      $record = DB::table('tickets')
      ->join('ticket_detalles as t', 't.ticket_id', 'tickets.id')
      ->select('status as label', DB::raw('count(*) as data'))
      ->where('status', '=', 'Asignado')->orwhere('status', '=', 'Culminado')
      ->where('analista_id','=', Auth::user()->id)
      ->whereYear('tickets.created_at', '=', $year)
      ->groupBy('label')
       ->get();
       foreach($record as $row) {
          $data['label1'][] = $row->label;
          $data['data1'][] = (int) $row->data;          
        }

     //**********consulta para usuarios con mas reportes**************************************************************** */
      //consulta para usuarios con mas reportes
      $users = DB::table('tickets')
      ->join('ticket_detalles', 'ticket_detalles.ticket_id', '=', 'tickets.id')
      ->join('users', 'users.id', '=', 'ticket_detalles.user_id')
      ->join('departamentos', 'users.departamento_id', '=', 'departamentos.id')
      ->select('users.name as label', 'departamentos.nombre as dept', DB::raw('count(*) as data'))
      ->where('analista_id','=', Auth::user()->id)->whereYear('tickets.created_at', '=', $year)
      ->groupBy('users.name')
      ->groupBy('departamentos.nombre')
      ->orderby('data', 'DESC')
      ->take(3)
       ->get();
      $data['chart_data'] = json_encode($data);

        return view('homeanalista',  $data, compact('mtu30','mtu2','tab1semana','count','year','tiempo', 'mtu3', 'mtu5', 'mtu4','tiempo1', 'mt', 'mt1', 'mt2', 'tabiertocount', 'users'));
      //fin analista
      }
      //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
      //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 
      //rol******************************* DASHBOARD ADMIIIIN *****************************************************
      //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
      //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 
      if (Auth::user()->rol_id == 1) {     
        $analista =  User::where('rol_id', 2)->get();
        //return $analista;  
        $ticketscount = TicketDetalle::whereYear('ticket_detalles.created_at', '=', $year)->count();
        $tabiertocount = Ticket::where('status', 'Abierto')->whereYear('tickets.created_at', '=', $year)->count();
        $tasignadocount = Ticket::where('status', 'Asignado')->whereYear('tickets.created_at', '=', $year)->count();
        $taculminadocount = Ticket::where('status', 'Culminado')->whereYear('tickets.created_at', '=', $year)->count();
        $ttotal = Ticket::whereYear('tickets.created_at', '=', $year)->count();
        $p = round($tabiertocount * 100 / $ttotal, 2);
        $p1 =  round($tasignadocount * 100 / $ttotal, 2);
        $p2 =  round($taculminadocount * 100 / $ttotal, 2);
        $endDate =Carbon::now()->subweek(2);
        $startDate =Carbon::now()->subMonth(2);    
        $fnfecha= Carbon::parse($endDate)->format('Y-m-d');
        $infecha= Carbon::parse($startDate)->format('Y-m-d');   
        
        $tab1semana = TicketDetalle::join('tickets as t', 'ticket_id', 't.id')
        ->where('t.status', 'Abierto')
        ->whereBetween('t.created_at', [$infecha,$fnfecha])
        ->whereYear('t.created_at', '=', $year)
        //->select( DB::raw('count(*) as data, tickets.id as ta'))
        //->groupby('ta')
        ->get();
        $count = $tab1semana->count();
//*********************** consulta para usuarios con mas reportes*************************************************** */
      $users = DB::table('tickets')
      ->join('ticket_detalles', 'ticket_detalles.ticket_id', '=', 'tickets.id')
      ->join('users', 'users.id', '=', 'ticket_detalles.user_id')
      ->join('departamentos', 'users.departamento_id', '=', 'departamentos.id')
      ->select('users.name as label', 'departamentos.nombre as dept', DB::raw('count(*) as data'))
      ->whereYear('tickets.created_at', '=', $year)
      ->groupBy('users.name')
      ->groupBy('departamentos.nombre')
      ->orderby('data', 'DESC')
      ->take(3)
       ->get();
   
    //consulta para grafica tickets por categoria
      $record = DB::table('ticket_detalles')
      ->join('asuntos', 'ticket_detalles.asunto_id', '=', 'asuntos.id')
      ->select('asuntos.nombre as label', DB::raw('count(*) as data'))
      ->where('asunto_id', '!=', NULL)
      ->whereYear('ticket_detalles.created_at', '=', $year)
      ->groupBy('asuntos.nombre')
       ->get();
     
       foreach($record as $row) {
          $data['label'][] = $row->label;
          $data['data'][] = (int) $row->data;
        }

       //************************************************************************** */
    //consulta para grafica tickets por departamento
      $record = DB::table('ticket_detalles')
      ->join('users as u', 'u.id', '=', 'ticket_detalles.user_id')
      ->join('departamentos as d', 'u.departamento_id', '=', 'd.id')
      ->select('d.nombre as label', DB::raw('count(u.departamento_id) as data'))
      ->whereYear('ticket_detalles.created_at', '=', $year)
      //->where('asunto_id', '!=', NULL)
      ->groupBy('label')
       ->get();
     
       foreach($record as $row) {
          $data['label10'][] = $row->label;

          $data['data10'][] = (int) $row->data;
        }
//******************consulta para grafica tickets por status******************************************************** */
    //consulta para grafica tickets por status
    $record = DB::table('tickets')
    ->select('status as label', DB::raw('count(*) as data'))
    ->where('status', '!=', NULL)
    ->whereYear('tickets.created_at', '=', $year)
    ->groupBy('label')
     ->get();
     foreach($record as $row) {
        $data['label1'][] = $row->label;
        $data['data1'][] = (int) $row->data;
        //return $data;
      }
//*************consulta para grafica usuarios************************************************************* */
    //consulta para grafica usuarios
    $record = DB::table('ticket_detalles')
    ->join('users', 'ticket_detalles.user_id', '=', 'users.id')
    ->select('users.name as label', DB::raw('count(*) as data'))
    ->where('users.name', '!=', NULL)
    ->groupBy('label')
     ->get();
     foreach($record as $row) {
        $data['label2'][] = $row->label;
        $data['data2'][] = (int) $row->data;
        
      }
     //************************************************************************** */
      /*consulta Cantidad de tickets por mes */
      $endDate = Carbon::now();
      $startDate = Carbon::now()->subyear()->addMonth();
      //$startDate = Carbon::now()->subyear();
      $startDate->day    = 1;
      $startDate->hour   = 0;
      $startDate->minute = 0;
      $startDate->second = 0;
      $fecha=$startDate;  

      for ($i=1; $i <=12; $i++) 
      {
        $mes= $fecha->month;  
        $year= $endDate->year;  

        $ticketsxmes = Ticket::select( 'created_at')
        ->whereBetween('created_at', [$startDate,$endDate])
        ->whereMonth('created_at', '=', $mes)
        ->whereYear('created_at', '=', $year)
        ->select( DB::raw('count(*) as data'))->get();
        //return $ticketsxmes;

        $fecha=$fecha->addMonth();
        switch( $mes)
            {
              case('1'): $data['label5'][] ='Ene'; break; case('2'): $data['label5'][] ='Feb';break;
              case('3'): $data['label5'][] ='Mar'; break; case('4'): $data['label5'][] ='Abr';break;
              case('6'): $data['label5'][] ='Jun'; break; case('7'): $data['label5'][] ='Jul';break;
              case('8'): $data['label5'][] ='Ago'; break; case('9'): $data['label5'][] ='Sep';break;
              case('10'): $data['label5'][] ='Oct'; break; case('11'): $data['label5'][] ='Nov';break;
              case('12'): $data['label5'][] ='Dic'; break; case('5'): $data['label5'][] ='May';break;
            } 
            if ( $ticketsxmes[0]->data == NULL ){
              $ticketsxmes[0]->data=0;
              $data['data5'][] = (float)$ticketsxmes[0]->data;
            }else {   
              $data['data5'][] =   (float)$ticketsxmes[0]->data;  
        }
          }
        $arreglo=$data;   
         $data['chart_data'] = json_encode($data);
         return view('home', $data, compact('tab1semana','analista','year','users','p','p1','p2','ticketscount', 'tabiertocount', 'tasignadocount', 'taculminadocount', 'arreglo' ));
      }
      
    }
    public function analista($id){
      $añoactual = now();
      $year= $añoactual->year; $suma = 0;  $tiempo = 0;

      $cticket = TicketDetalle::join('users', 'users.id', 'ticket_detalles.analista_id')
      ->select('users.name as labels','users.last_name as ln', DB::raw('count(*) as data'))
      ->where('analista_id', $id)
      ->whereYear('ticket_detalles.created_at', '=', $year)
      ->groupBy('ln')
      ->groupBy('labels')->get();
      
      $cticket2 = TicketDetalle::join('tickets', 'tickets.id', 'ticket_detalles.ticket_id')
      ->select('tickets.status as labels', DB::raw('count(*) as data'))
      ->where('analista_id', $id)
      ->whereYear('ticket_detalles.created_at', '=', $year)
      ->groupBy('labels')->get();

      $tt = $cticket->count();
      //return $cticket;

      $promedioanalista = Ticket::join('ticket_detalles as td','td.ticket_id', 'tickets.id')
      ->where('analista_id', $id)
      ->where('status', '!=', 'Abierto')
      ->where('fecha_rpta', '!=', NULL)
      ->whereYear('tickets.created_at', '=', $year)->get();  
      $prome= count($promedioanalista);  
      //return $prome;    
      if ($prome != 0) {
        foreach($promedioanalista as $creacion)
      {
      $timein = $creacion->created_at;          
      $datein = Carbon::parse($timein);
  
      $timefn = $creacion->fecha_rpta;
      $datefn = Carbon::parse($timefn);
      $dif = $datein->diffIndays($datefn);             
          $suma += $dif;                                                  
      }
      $pro = (int)$suma;   
  
      $tiempo = $pro/$prome;  
      
    }
//******************consulta para grafica tickets por status******************************************************** */
    //consulta para grafica tickets por status
    $record = DB::table('tickets')
    ->join('ticket_detalles', 'tickets.id', 'ticket_detalles.ticket_id')
    ->select('status as label', DB::raw('count(*) as data'))
    ->where('analista_id', '=', $id)
    ->whereYear('tickets.created_at', '=', $year)
    ->groupBy('label')
     ->get();
     foreach($record as $row) {
        $data['label1'][] = $row->label;
        $data['data1'][] = (int) $row->data;
        //return $data;
      }


     //************************************************************************** */
      /*consulta Cantidad de tickets por mes */
      $endDate = Carbon::now();
      $startDate = Carbon::now()->subyear()->addMonth();
      //$startDate = Carbon::now()->subyear();
      $startDate->day    = 1;
      $startDate->hour   = 0;
      $startDate->minute = 0;
      $startDate->second = 0;
      $fecha=$startDate;  

      for ($i=1; $i <=12; $i++) 
      {
        $mes= $fecha->month;  
        $year= $endDate->year;  

        $ticketsxmes = TicketDetalle::
        join('tickets as t', 't.id', 'ticket_detalles.ticket_id')->select('created_at')
        ->where('analista_id', $id)
        ->where('t.status', 'Culminado')        
        ->whereBetween('t.created_at', [$startDate,$endDate])
        ->whereMonth('t.created_at', '=', $mes)
        ->whereYear('t.created_at', '=', $year)
        ->select( DB::raw('count(*) as data'))->get();
        //return $ticketsxmes;

        $fecha=$fecha->addMonth();
        switch( $mes)
            {
              case('1'): $data['label5'][] ='Ene'; break; case('2'): $data['label5'][] ='Feb';break;
              case('3'): $data['label5'][] ='Mar'; break; case('4'): $data['label5'][] ='Abr';break;
              case('6'): $data['label5'][] ='Jun'; break; case('7'): $data['label5'][] ='Jul';break;
              case('8'): $data['label5'][] ='Ago'; break; case('9'): $data['label5'][] ='Sep';break;
              case('10'): $data['label5'][] ='Oct'; break; case('11'): $data['label5'][] ='Nov';break;
              case('12'): $data['label5'][] ='Dic'; break; case('5'): $data['label5'][] ='May';break;
            } 
            if ( $ticketsxmes[0]->data == NULL ){
              $ticketsxmes[0]->data=0;
              $data['data5'][] = (float)$ticketsxmes[0]->data;
            }else {   
              $data['data5'][] =   (float)$ticketsxmes[0]->data;  
        }
          }
 //consulta para grafica tickets por categoria
      $record = DB::table('ticket_detalles')
      ->join('asuntos', 'ticket_detalles.asunto_id', '=', 'asuntos.id')
      ->select('asuntos.nombre as label', DB::raw('count(*) as data'))
      ->where('ticket_detalles.analista_id', $id)
      ->whereYear('ticket_detalles.created_at', '=', $year)
      ->groupBy('asuntos.nombre')
       ->get();
     
       foreach($record as $row) {
          $data['label'][] = $row->label;
          $data['data'][] = (int) $row->data;
        }


        $arreglo=$data;   
         $data['chart_data'] = json_encode($data);
      

      return view('analista',$data, compact('tt', 'tiempo','cticket2','cticket'));

    }
}
