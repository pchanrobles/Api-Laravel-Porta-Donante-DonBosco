<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Models\Donantes;

class DonanteController extends Controller
{
    public function requestDonantessInfo(Request $request, $id)
    {
        $credentials = $request->validate([
            'details' => 'required',
        ]);

        if (auth()->check() && auth()->user()->id == $id) {
            $users = DB::table('RequestDonantes')->insert([
                ['user_id' => $id, 'details' => $credentials['details'], 'status' => 0]
            ]);

            return response()->json(["msg" => "Solicitud enviada."], 200);
        } else {
            return response()->json(["msg" => "No autorizado."], 401);
        }
    }
    public function confirmEmail(Request $data)
    {
            return response()->json([
           'email' => $data
       ]);

     }
}