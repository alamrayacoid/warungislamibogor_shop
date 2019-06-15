<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function ujian()
    {
    	return view('ujian.ujian');
    }
    public function ujian_mulai()
    {
    	return view('ujian.ujian_mulai');
    }
}
