<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Traits\imageUpload;
use Illuminate\Support\Facades\Session;

class PrescriptionController extends Controller
{
    //
use imageUpload;
    public function Index()
    {
        return view('users.pages.prescription');
    }

    public function PrescriptionStore(Request $request)
    {
        
        $image = $this->UploadImage($request, 'images/prescription');

        $data = [
            'name' => $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'city'=> $request->city,
            'state'=> $request->state,
            'image' =>$image,
            'notes' => $request->notes
        ];

        Prescription::create($data);
        Session::flash('alert', 'success');
        Session::flash('msg', 'Prescription Uploaded successfully');
        return back();
    }
}
