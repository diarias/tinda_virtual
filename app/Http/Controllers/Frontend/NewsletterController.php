<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\MailHelper;
use App\Http\Controllers\Controller;
use App\Mail\SubscriptionVerification;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NewsletterController extends Controller
{
    public function newsLetterRequset(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $existSubscriber = NewsletterSubscriber::where('email', $request->email)->first();

        if(!empty($existSubscriber)){
            if($existSubscriber->is_verified == 0){
                $existSubscriber->verified_token = Str::random(25);
                $existSubscriber->save();
                // set mail config
                MailHelper::setMailConfig();
                // send mail
                Mail::to($existSubscriber->email)->send(new SubscriptionVerification($existSubscriber));

                return response(['status' => 'success', 'message' => 'A verification link has been sent to your email please check']);

            }elseif($existSubscriber->is_verified == 1){
                return response(['status' => 'error', 'message' => 'You already subscribed with this email!']);
            }
        }else {
            $existSubscriber = new NewsletterSubscriber();
            $existSubscriber->email = $request->email;
            $existSubscriber->verified_token = Str::random(25);
            $existSubscriber->is_verified = 0;
            $existSubscriber->save();

            // set mail config
            MailHelper::setMailConfig();

            // send mail
            Mail::to($existSubscriber->email)->send(new SubscriptionVerification($existSubscriber));

            return response(['status' => 'success', 'message' => 'A verification link has been sent to your email please check']);
        }
        /**if(!empty($existSubscriber)){
            if($existSubscriber->is_verified == 0){

            }elseif($existSubscriber->is_verified == 1){
                return response(['status' => 'error', 'message' => 'You already subscribed with this email']);
            }
        }else{
            $existSubscriber = new NewsletterSubscriber();
            $existSubscriber->email = $request->email;
            $existSubscriber->verified_token = Str::random(25);
            $existSubscriber->is_verified = 0;
            $existSubscriber->save();

            // send mail
            Mail::to($existSubscriber->email)->send(new SubscriptionVerification($existSubscriber));

            return response(['status' => 'success', 'message' => 'A verification link has been sent to your email please check']);
        }*/

    }

    public function newsLetterEmailVarify($token)
    {
       $verify = NewsletterSubscriber::where('verified_token', $token)->first();
       if($verify){
            $verify->verified_token = 'verified';
            $verify->is_verified = 1;
            $verify->save();
            toastr('Email verification successfully', 'success', 'success');
            return redirect()->route('home');
       }else {
            toastr('Invalid token', 'error', 'Error');
            return redirect()->route('home');
       }
    }
}
