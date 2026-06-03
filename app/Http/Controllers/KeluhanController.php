<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keluhan;

class KeluhanController extends Controller
{
    public function masyarakat()
    {  
        $keluhans = keluhan::with('masyarakat')->get();
        return View('keluhan.index', compact('keluhan'));
    }
        
    
}
