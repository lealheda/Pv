<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Http\Requests;

class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function htmltest(){    
        dd("entra");
		return view('layouts.pdf.test');
	}

    public function test(){
        $view = \View::make('layouts.pdf.test')->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('pdf');
    }
}
