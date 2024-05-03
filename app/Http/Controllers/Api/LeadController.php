<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    


    // sto memorizzando il nuovo contato nel db
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            "name"=> "required",
            "address"=> "required|email",
            "message"=> "required",
        ], [
            "name"=> "Hai dimenticato di  inserire il tuo nome",
            "address.required"=> "Hai dimenticato di inserire la tua Mail", 
            "address.email"=> "La Mail che hai inserito non è corretta",
            "message.required"=> "Hai dimenticato di inserire il messaggio",    
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'=> false,
                'errors' => $validator->errors(),
            ]);
        }

        $newLead = new Lead();
        $newLead->fill($request->all());
        $newLead->save();

        Mail::to('femaleg107@agafx.com')->send(new NewContact($newLead));


        //la store deve restituirmi un json con succes = true
        return response()->json([
            'success' => true,
            'message' => 'Richiesta avvenuta in modo Corretto',
            'request' => $request->all(),
            
        ]);
    }
}
