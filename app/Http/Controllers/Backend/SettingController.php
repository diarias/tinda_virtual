<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EmailConfiguration;
use App\Models\GeneralSetting;
use App\Models\LogoSetting;
use App\Models\Pushersetting;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    use ImageUploadTrait;
    public function index(){
        $generalSetting = GeneralSetting::first();
        $emailSettings = EmailConfiguration::first();
        $logoSetting = LogoSetting::first();
        $pusherSetting = PusherSetting::first();
        return view('admin.setting.index', compact('generalSetting', 'emailSettings', 'logoSetting', 'pusherSetting'));
    }

    public function generalSettingUpdate(Request $request){

        $request->validate([
            'site_name'=> ['required','max:200'],
            'layout'=> ['required','max:200'],
            'contact_email' => ['required','max:200'],
            'default_currency' => ['required','max:200'],
            'currency_icon' => ['required','max:200'],
            'time_zone' => ['required','max:200'],
        ]);

        GeneralSetting::updateOrCreate(
            ['id'=>1],
            [
                'site_name'=> $request->site_name,
                'layout'=> $request->layout,
                'contact_email'=> $request->contact_email,
                'contact_phone'=> $request->contact_phone,
                'contact_address'=> $request->contact_address,
                'map'=> $request->map,
                'currency_name'=> $request->default_currency,
                'currency_icon' => $request->currency_icon,
                'time_zone'=> $request->time_zone,
            ]
        );

        toastr('Updated Successfully!','success','Success');

        return redirect()->back();
    }

    public function emailConfigSettingUpdate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'host' => ['required', 'max:200'],
            'username' => ['required', 'max:200'],
            'password' => ['required', 'max:200'],
            'port' => ['required', 'max:200'],
            'encryption' => ['required', 'max:200'],
        ]);

         EmailConfiguration::updateOrCreate(
            ['id' => 1],
            [
                'email' => $request->email,
                'host' => $request->host,
                'username' => $request->username,
                'password' => $request->password,
                'port' => $request->port,
                'encryption' => $request->encryption,
            ]
        );

        toastr('Updates successfully!', 'success', 'success');

        return redirect()->back();
    }

    public function logoSettingUpdate(Request $request)
    {
        $request->validate([
            'logo' => ['image', 'max:3000'],
            'favicon' => ['image', 'max:3000'],
        ]);

        $logoPath = $this->updateImage($request, 'logo', 'uploads', $request->old_logo);
        $favicon = $this->updateImage($request, 'favicon', 'uploads', $request->old_favicon);

       LogoSetting::updateOrCreate(
            ['id' => 1],
            [
                'logo' =>  (!empty($logoPath)) ? $logoPath : $request->old_logo,
                'favicon' => (!empty($favicon)) ? $favicon : $request->old_favicon,
                
            ]
        );
        
        toastr('Updated successfully!', 'success', 'success');

        return redirect()->back();
    }

    public function pusherSettingUpdate(Request $request) : RedirectResponse{
        $request->validate([
            'pusher_app_id' => ['required'],
            'pusher_key' => ['required'],
            'pusher_secret' => ['required'],
            'pusher_cluster' => ['required'],
        ]);

       Pushersetting::updateOrCreate(
            ['id' => 1],
            [
                'pusher_app_id' => $request->pusher_app_id,
                'pusher_key' => $request->pusher_key,
                'pusher_secret' => $request->pusher_secret,
                'pusher_cluster' => $request->pusher_cluster,               
                
            ]
        );
        
        toastr('Updated successfully!', 'success', 'success');
        return redirect()->back();
    }
}
