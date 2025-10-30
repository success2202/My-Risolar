<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    //

    public function Index(){
        return view('manage.prescription.index')
        ->with('prescription', Prescription::latest()->get())
        ->with('bheading', 'Prescription')
        ->with('breadcrumb', 'Prescription');
        
    }
}
