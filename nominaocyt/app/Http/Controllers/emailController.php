<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Mail\email as correo;
use App\Mail\envio;
//use App\Mail;
use App\Mail\partevento as part;
use App\Http\Controllers\Flash;
use Illuminate\Support\Facades\Session;
use Illuminate\Mail\Mailer;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\messaje;
use App\participantesevento;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;






class emailController extends Controller
{
    
      public function index(Request $request)
        {

        //dd($request);	
       //\Mail::to($Request->get('de'))->cc($Request->get('para'))->send(new emails);

          $data = $request->all();

          $idcorreo=$request->get('idcorreo');
     
           //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
           \Mail::send('adminlte::emails.notificacion',$data, function($message) use ($request)
            {
           

               //remitente
               $message->from($request->get('para'));
               $message->cc($request->get('cc'));
               //asunto
               $message->subject($request->get('asunto'));
               //receptor
               $message->to($request->get('de'), env('CONTACT_NAME'));
           });
     

        //to va el usuario conectado en session

        Session::flash('msjevento',"Se ha enviado el correo de manera exitosa!");

        return view('adminlte::Principal');
           return view('adminlte::emails.notificacion', ['idcorreo' => $idcorreo]);
           
        }


        public function edit($id)
        {
         $idcorreo=$id;
            //dd($eventosg);
         return view('adminlte::emails.enviar', compact('idcorreo'));

       }


       public function editmailsparticipantes($id)
        {
         
         $idcorreo= participantesevento::findOrFail($id);

          //dd($idcorreo);


            //dd($eventosg);
         return view('adminlte::emails.emailparticipantes', compact('idcorreo','id'));

       }


     public function enviarcorreo(Request $request, $id)
         { 
             $order = participantesevento::findOrFail($id);
             //dd($order);

        // Ship order...

        \Mail::to($request->get('para'))->send(new part($order));

         return redirect()->route('participantesevento.index');
        }

        
     public function enviarparticipantes(Request $request)
         { 
              //dd($request); 
       //\Mail::to($Request->get('de'))->cc($Request->get('para'))->send(new emails);

         $data = $request->all();
          $datos = $request->get('cuerpocorreo');

          

          //dd($data);
           //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
           \Mail::send('adminlte::emails.notificacion2',$data, function($message) use ($request)
           {
               //remitente
               $message->from($request->get('para'));
               $message->cc($request->get('cc'));

               //asunto
               $message->subject($request->get('asunto'));

               //receptor
               $message->to('foo@example.com', env('CONTACT_NAME'));
           });
     

        //to va el usuario conectado en session
        //dd($datos);
        //Session::flash('msjevento',"Se ha enviado el correo de manera exitosa!");

        return redirect()->route('participantesevento.index');   
        return view('adminlte::emails.notificacion2', ['datos' => $datos]);


        //return view('adminlte::participantesevento.index');

             //$data = $request->all();


            // Ship order...

         /*   Mail::to('eventos@ocyt.org.co')->cc($request->cc)
                  ->send(new correo());


            */
             

        }

        #envia el correo del participantes.
        public function partevento(Request $request, $id)
        {

        $order = Order::findOrFail($id);
        //  $order = $request;

        // Ship order...

        Mail::to($request->user())->send(new OrderShipped($order));

        return redirect()->route('participantesevento.index');

        }

         






  }   





 