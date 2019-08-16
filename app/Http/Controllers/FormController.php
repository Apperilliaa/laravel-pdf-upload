<?php

namespace App\Http\Controllers;

use App\Form;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function index()
    {
    	$form = Form::all();
    	return view('index',['form'=>$form]);
    }
 
    public function cetak_pdf()
    {
    	//$pdf = PDF::loadview('form/Kunci_Keluar');
        //->setPaper('a4', 'landscape');
        //return $pdf->download('HO_CPC.pdf');
        return view('DSR_Aplikasi/flm');
    }

    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('datafile')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/');
    }
}
