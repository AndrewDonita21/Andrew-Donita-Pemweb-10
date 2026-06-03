<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keluhan;

class KeluhanController extends Controller
{
    public function masyarakat(Keluhan $keluhan)
    {  
        $keluhan= Keluhan::with('pelapor')->where('masyarakat_id',$keluhan->id)->first();
        return $keluhan;
    }
    
        
    
}
