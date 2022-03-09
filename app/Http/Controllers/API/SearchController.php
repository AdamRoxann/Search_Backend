<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class SearchController extends Controller
{
    public function index(){
        $data = Country::all();
        
        return response()->json($data, 200);
    }
}
