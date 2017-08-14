<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\eventos_general;
use App\participantesevento;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Flash;
use Illuminate\Support\Facades\Session;

class excelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \Excel::create('participantes', function($excel) {
            $excel->sheet('participantes', function($sheet) {
              
               $products=DB::table('participantesevento')->where('id_evento', 8)->get();
              //$products=eventos_general::all();
                           
         //dd($products);
            
         $sheet->loadView('adminlte::excel.xlsxparticipantes', ['products' => $products]);
            
            });
        })->export('xlsx');


    }


     public function excelparticipantes($id)
    {

       $products=DB::table('participantesevento')->where('id_evento','=',$id)->get();

        \Excel::create('participantes', function($excel)use ($products) {
            $excel->sheet('participantes', function($sheet) use ($products){
              
              
              //$products=eventos_general::all();
                           
         //dd($products);
            
         $sheet->loadView('adminlte::excel.xlsxparticipantes', ['products' => $products]);
            
            });
        })->export('csv');


    }


    public function excelparticipantesall()
    {

       $products=DB::table('participantesevento')->get();

        \Excel::create('participantes', function($excel)use ($products) {
            $excel->sheet('participantes', function($sheet) use ($products){
              
              
              //$products=eventos_general::all();
                           
         //dd($products);
            
         $sheet->loadView('adminlte::excel.xlsxparticipantes', ['products' => $products]);
            
            });
        })->export('csv');


    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
