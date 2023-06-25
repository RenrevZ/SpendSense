<?php

namespace App\Http\Controllers;

use App\Models\CashRemittance;
use App\Models\CashType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CashRegistryController extends Controller
{
    public function index(){
        $data = array(
            'cash' =>  (new CashType())->getTypeAndRemittance()
        );

        return response()->json($data,200);
    }

    public function show($id){
        $data = array(
            'data' => (new CashType())->showTypeAndRemittance($id)
        );

        return response()->json($data,200);
    }

    public function update(Request $request){
        $request->validate([
            'cashTypeID' => 'required',
            'cashDescription' => 'required',
            'amount' => 'required',
        ]);

        try{
            $db = (new CashRemittance())->updateModel($request);
        }catch(Exception $e){
            Log::info($e);
            return response()->json(['message' => 'There was an error saving in database please inform the developer immediately'],400);
        }

        $data = array(
            'message' => 'Balance Has been updated'
        );

        return response()->json($data,200);
    }
}
