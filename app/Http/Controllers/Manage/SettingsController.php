<?php

namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Setting;
use App\Traits\imageUpload;
use App\Models\Privacypolicy;
use App\Models\TermsCondition;
use Intervention\Image\Facades\Image;
use App\Models\AboutUs;
use App\Models\Annoucement;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    //
    use imageUpload;

    public function Index(){
       
        return view('manage.settings.index')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings')
        ->with('announcement', Annoucement::latest()->first());
    }

  

    public function Socials(){
       
        return view('manage.settings.socials')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings');
    }


    
    public function Abouts(){
        return view('manage.settings.abouts');
    }

    public function Aboutus(){
        $aboutus = AboutUs::first();
        return view('manage.about.index')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings')
        ->with('aboutus',  $aboutus);
    }
    public function AboutusCreate(){
        $aboutus = AboutUs::first();
        return view('manage.about.create')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings')
        ->with('aboutus',  $aboutus);
    }

    public function AboutusStore(Request $request){
        $data = [
            'content' => $request->content,
        ];
    
         Aboutus::firstOrCreate([], $data);
    
        Session::flash('alert', 'success');
        Session::flash('message', 'About us created Successfully');
        return back();
    }

    public function AboutusEdit($id){
        $aboutus = Aboutus::where('id', decrypt($id))->first();
        return view('manage.about.edit')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings')
        ->with('aboutus',  $aboutus);
    }

    public function AboutusUpdate(Request $request, $id)
    {
        $aboutus = Aboutus::where('id', decrypt($id))->first();
        $aboutus->content = $request->input('content');
       
        $aboutus->save();
        Session::flash('alert', 'success');
        Session::flash('message', 'About us updated Successfully');
        return redirect()->route('admin.settings.aboutus');
    }

    public function AboutusDelete($id){
        $record = Aboutus::where('id', decrypt($id))->first();
        if($record){
            $record->delete();
            Session::flash('alert', 'error');
            Session::flash('alert', 'Record Deleted Successfully');
            return back();
        }
        Session::flash('alert', 'error');
        Session::flash('alert', 'Somthing went wrong');
        return back();
    }

    public function PrivacyPolicy(){
        $privacypolicy = Privacypolicy::first();
        return view('manage.privacy.index')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings')
        ->with('privacypolicy',  $privacypolicy);
    }

    public function PrivacyPolicyCreate(){
        $privacypolicy = Privacypolicy::first();
        return view('manage.privacy.create')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings')
        ->with('privacypolicy',  $privacypolicy);
    }

    public function PrivacyPolicyStore(Request $request){
        $data = [
            'content' => $request->content,
        ];
    
        $record = Privacypolicy::firstOrCreate([], $data);
    
        Session::flash('alert', 'success');
        Session::flash('message', 'Privacy and Policy created Successfully');
        return back();
    }

    public function PrivacyPolicyEdit($id){
        $privacypolicy = Privacypolicy::where('id', decrypt($id))->first();
        return view('manage.privacy.edit')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings')
        ->with('privacypolicy',  $privacypolicy);
    }

    public function PrivaprivacyUpdate(Request $request, $id)
    {
       
        $privacypolicy = Privacypolicy::where('id', decrypt($id))->first();
       
        $privacypolicy->content = $request->input('content');
       
        $privacypolicy->save();
        Session::flash('alert', 'success');
        Session::flash('message', 'Privacy policy updated Successfully');
        return redirect()->route('admin.settings.privacyPolicy');
    }

    public function PrivacyPolicyDelete($id){
        $record = Privacypolicy::where('id', decrypt($id))->first();
        if($record){
            $record->delete();
            Session::flash('alert', 'error');
            Session::flash('alert', 'Record Deleted Successfully');
            return back();
        }
        Session::flash('alert', 'error');
        Session::flash('alert', 'Somthing went wrong');
        return back();
    }

    public function TermsConditions(){
        $termscondition = TermsCondition::first();
        return view('manage.termsConditions.index')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings')
        ->with('termscondition',  $termscondition);
    }

    public function  TermsConditionsCreate(){
        return view('manage.termsConditions.create')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings');
    }

    public function TermsConditionsStore(Request $request){
        $data = [
            'content' => $request->content,
        ];
    
        TermsCondition::firstOrCreate([], $data);
        Session::flash('alert', 'success');
        Session::flash('message', 'Terms and Conditions created Successfully');
        return back();
    }

    public function TermsConditionsEdit($id){
        $termsConditions = TermsCondition::where('id', decrypt($id))->first();
        return view('manage.termsConditions.edit')
        ->with('bheading', 'Website Settings')
        ->with('breadcrumb', 'Website Settings')
        ->with('termsConditions',  $termsConditions);
    }

    public function TermsConditionsUpdate(Request $request, $id)
    {  
        $record = TermsCondition::where('id', decrypt($id))->first();
        $record->content = $request->input('content');
        $record->save();
        Session::flash('alert', 'success');
        Session::flash('message', 'Terms Conditions updated Successfully');
        return redirect()->route('admin.settings.termsConditions');
    }

    public function TermsConditionsDelete($id){
        $record = TermsCondition::where('id', decrypt($id))->first();
        if($record){
            $record->delete();
            Session::flash('alert', 'error');
            Session::flash('alert', 'Record Deleted Successfully');
            return back();
        }
        Session::flash('alert', 'error');
        Session::flash('alert', 'Somthing went wrong');
        return back();
    }

    public function UpdateSocials(Request $request){
        $data = [
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedIn' => $request->linkedIn,
            'instagram' => $request->instagram,
        ];
        $testim = Setting::first();
        $testim->fill($data)->save();
        Session::flash('alert', 'success');
        Session::flash('message', 'Socials updated Successfully');
        return back();
    }

    public function UpdateSettings(Request $request){
        $data = [
            'site_name' => $request->site_name,
            'site_phone' => $request->site_phone,
            'site_email' => $request->site_email,
            'address' => $request->address,
            'title' => $request->title,
            'city' => $request->city,
            'about' => $request->about_us,
            'state' => $request->state,
            'country' => $request->country,
        ];
        if($request->file('image')){
              $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $FileName = \pathinfo($name, PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $time = time() . $FileName;
                $fileName = $time . '.' . $ext;
                Image::make($request->file('image'))->save('images/'.$fileName);
          $data['site_logo'] =  $fileName;
        }
        if($request->file('fav')){
                $file = $request->file('fav');
                $name = $file->getClientOriginalName();
                $FileName = \pathinfo($name, PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $time = time() . $FileName;
                $fileName = $time . '.' . $ext;
                Image::make($request->file('fav'))->resize(50,50)->save('images/'.$fileName);
            $data['fav'] = $fileName;
          }
        if($request->announcement){
            Annoucement::latest()->first()->update(['content' => $request->announcement]);
        }
        $testim = Setting::first();
        $testim->update($data);
        Session::flash('alert', 'success');
        Session::flash('message', 'Logo Updated Successfully');
        return back();
    }


}
