<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\eventos_general;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Flash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('documento');
        $participantesevento=\DB::table('participantesevento')->where('Documento','LIKE',"%$name%")
           ->orderBy('Documento', 'asc')->Paginate(15);
 
    //dd($participantesevento);

    return view('adminlte::home', ['participantesevento' => $participantesevento]);
    }


     public function edit(Request $request)
    {
       $name = $request->input('documento');
        $participantesevento=\DB::table('participantesevento')->where('Documento','LIKE',"%$name%")
           ->orderBy('Documento', 'asc')->get();
 
    //dd($participantesevento);

    return view('adminlte::home', ['participantesevento' => $participantesevento]);

    }

     public function update(Request $request, $id)
    {
       $input = $request->all();
        //sires::update($input);
        //sires::find($id)->update($input);
       
        $updates=\DB::table('participantesevento')->where('id',"=",$id)->update($input); 
        return redirect()->route('buscar');
    }

   



}