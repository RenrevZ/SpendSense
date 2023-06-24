<?php

namespace App\Http\Controllers;

use App\Models\CashType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CashTypeController extends Controller
{
    public function index(){
        $count = (new CashType())->CashTypeId();

        $data = array(
            'count' => str_pad($count, 7, '0', STR_PAD_LEFT),
            'user' => auth()->user()
        );

        return response()->json($data);
    }

    public function store(Request $request){

        try{
            $validator = Validator::make($request->all(), [
                'cashTypeID' => 'required|max:200',
                'cashDescription' => 'required|max:200',
                'amount' => 'required|max:200'
            ]);

            $validator->setCustomMessages([
                'cashTypeID.required' => 'The cash type id should never be blank.',
                'cashDescription.required' => 'The description should never be blank.',
                'amount.required' => 'The amount should never be blank.',
                'cashTypeID.max' => 'Maximum character for cash type id has been reach',
                'cashDescription.max' => 'Maximum character description has been reach.',
                'amount.max' => 'Maximum character for amount has been reach.',
            ]);

            if($validator->fails()){
                return response()->json(['message' => $validator->errors()],422);
            }

            $db = new CashType();

            DB::transaction(function() use($db,$request){
                $db->store($request);
                $db->storeRemittance($request);
            });

        }catch (\Exception $e){
            Log::info($e);
            return response()->json(['message' => 'Error saving into database please notify the developer on error'],422);
        }

        return response()->json(['message' => 'Success! New Cash Type Has been Created'],201);
    }
}
