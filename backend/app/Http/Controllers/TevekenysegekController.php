<?php

namespace App\Http\Controllers;

use App\Models\Tevekenysegek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TevekenysegekController extends Controller
{
    //
    public function index(){
        $tevekenysegek=Tevekenysegek::all();

        return response()->json($tevekenysegek);
    }
    public function specificKat(string $id){
        $tevekenysegek = DB::table('tevekenysegeks')
        ->join('kategoriaks','tevekenysegeks.kat_id','=','kategoriaks_id')
        ->select('*')
        ->whereRaw(`kategoriaks.id = $id`)
        ->get();

        return $tevekenysegek;
    }
    public function tevekenysegFeltolt(Request $request){
        $request -> validate([
            'kat_id' => 'required|integer|exists:kategoriaks.id',
            'tev_nev' => 'required|string|max:255',
            'allapot' => 'required|boolean'
        ]);
        $tevekenysegek = new Tevekenysegek();
        $tevekenysegek->kat_id = $request->input('kat_id');
        $tevekenysegek->tev_nev = $request->input('tev_nev');
        $tevekenysegek->allapot = $request->input('allapot');
        $tevekenysegek->save();

        return response()->json(['message' => 'Tevékenység feltöltve'],201);

    }
    public function tevekenysegTorol(string $id){
        $tevekenysegek = Tevekenysegek::find($id);
        if (!$tevekenysegek){
            return response()->json(['message' => 'Tevékenység nem létezik'],404);
        }
        $tevekenysegek->delete();
        return response()->json(['message' => 'Tevékenység törölve']);

    }

    
}
