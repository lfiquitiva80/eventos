<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\eventos_general;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Flash;
use Illuminate\Support\Facades\Session;
use PDF;
use App\participantesevento;

class PDFcontroller extends Controller
{
    
	 public function index()

    {
    	$data=participantesevento::all();

        $pdf = PDF::loadView('adminlte::excel.xlsxparticipantes', ['products' => $data]);
		return $pdf->download('invoice.pdf');

    }

     
    public function Certificado($id)

    {
        
         
                       // $rutaimagen="imgplantillas/".$nombre;

        $data=DB::table('participantesevento')->where('id',"=",$id)->get(); 

        $pdf = PDF::loadView('adminlte::pdf.pdf', ['products' => $data]);
       

        return $pdf->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'Helvetica'])->stream($id.'.pdf');
        
        //Storage::disk('local')->put($id, \File::get($pdf));
         
                        

    }

}
