<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use function Laravel\Prompts\error;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            //code...
            $google_user = Socialite::driver('google')->user();

            $customer = Customer::where('google_id', $google_user->getId())->first();

            if (!$customer) {
                $new_customer = Customer::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);

                $new_customer->sendEmailVerificationNotification();

                Auth::login($new_customer);

                toastr()->success('Berhasil Login, silakan verifikasi email Anda', 'Success', ['timeOut' => 1500]);
                return redirect()->intended('/email/verify');
            } else {
                Auth::login($customer);
                return redirect()->intended('/shop/account');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
