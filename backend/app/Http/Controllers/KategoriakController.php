<?php

namespace App\Http\Controllers;

use App\Models\Kategoriak;
use Illuminate\Http\Request;

class KategoriakController extends Controller
{
    //
    public function index(){
        $kategoriak=Kategoriak::all();

        return response()->json($kategoriak);
    }
}
