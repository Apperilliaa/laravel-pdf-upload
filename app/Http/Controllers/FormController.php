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
    	$form = Form::all();
    	$pdf = PDF::loadview('form/BA_SerahTerima',['form'=>$form]);
    	return $pdf->download('BA_SerahTerima.pdf');
    }

    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('datafile')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/');
    }

    public function upload(){
		$gambar = fileModel::get();
		return view('upload',['gambar' => $gambar]);
	}
 
	public function proses_upload(Request $request){
		$this->validate($request, [
            'name' => 'required',
			'file' => 'required|file|mimes:xlsx,xls,pdf,csv|max:2048'
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
 
		fileModel::create([
            'name' => $request->name,
            'file' => $nama_file,
		]);
 
		return redirect()->back();
    }
}
