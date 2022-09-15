<?php

namespace App\Http\Controllers\random;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Models\randomModel;
use Illuminate\Support\Facades\Validator;

//use Dotenv\Validator;

class randomController extends Controller
{
    public function random() {
        return response()->json(randomModel::get(), 200);
    }

    public function randomRetrieve($uniq)
    {
        $random = randomModel::where("uniq",$uniq)->first();
        if ( is_null($random)) {
            return response()->json(['error'=> true, 'message'=> 'not found']);
        }
        return response()->json($random, 200);
    }

    public function randomEdit(Request $req, $id)
    {
        $rules = [
            'uniq'=>'required|min:1|max:4',
            'value'=>'required|min:1|max:4'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $random = randomModel::find($id);        
        if ( is_null($random)) {
            return response()->json(['error'=> true, 'message'=> 'not found']);
        }
        $random -> update($req->all());
        return response()->json($random, 200);
    }

    public function randomDelete(Request $req, $id)
    {
        $random = randomModel::find($id);
        
        if ( is_null($random)) {
            return response()->json(['error'=> true, 'message'=> 'not found']);
        }
        $random -> delete();
        return response()->json('', 204);
    }

    public function randomGenerate(Request $req)
    {
        $uniq = rand();
        while(randomModel::where("uniq",$uniq)->first()){
            $uniq = rand();
        } 
        $random = randomModel::create(["uniq"=>$uniq,"value"=>rand()]);
        return response()->json($random, 201);
    }
}
