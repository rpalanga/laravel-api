<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    // sto memorizzando il nuovo contato nel db
    public function store() {

        //la store deve restituirmi un json con succes = true
        return response()->json([
            'success' => true,
            
        ]);
    }
}
