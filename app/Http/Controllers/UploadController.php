<?php

namespace App\Http\Controllers;
use App\Form;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(){
		$file = Form::get();
		return view('upload',['file' => $file]);
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
 
		Form::create([
            'name' => $request->name,
            'file' => $nama_file,
		]);
 
		return redirect()->back();
    }
}
