<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Mail\OTPMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function UserRegistration(Request $request)
    {
        try {
            $request->validate([
                'firstName' => 'required|string|max:50',
                'lastName' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users,email',
                'mobile' => 'required|string|max:50',
                'password' => 'required|string|min:4'
            ]);

            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => Hash::make($request->input('password')),
            ]);

            return response()->json(['status' => 'success', 'message' => 'User Registration Successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function UserLogin(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email|max:50',
                'password' => 'required|string|min:4'
            ]);

            $user = User::where('email', $request->input('email'))->first();


            //Hash::check('plain text','hash text')
            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return response()->json(['status' => 'failed', 'message' => 'Invalid User']);
            }


            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['status' => 'success', 'message' => 'Login Successful', 'token' => $token]);

            // $token = $user->createToken('authToken')->plainTextToken;
            // $response = response()->json(['status' => 'success', 'message' => 'Login Successful', 'token' => $token]);
            // $response->cookie('authToken', $token, 60 * 24 * 7);


        } catch (Exception $e) {
            return response()->json(['status' => 'failed', $e->getMessage()]);
        }
    }



    function UserProfile()
    {
        return Auth::user();
    }

    function UserLogout(Request $request)
    {
        $request->user()->tokens()->delete();
        return redirect('/');
    }

    function UpdateProfile(Request $request)
    {
        try {
            $request->validate([
                'firstName' => 'required|string|max:50',
                'lastName' => 'required|string|max:50',
                'mobile' => 'required|string|max:50',
            ]);

            User::where('id', '=', Auth::id())->update([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'mobile' => $request->input('mobile'),
            ]);

            return response()->json(['status' => 'success', 'message' => 'Update Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'failed', 'message' => $e->getMessage()]);
        }
    }


    function SendOTPCode(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email|max:50'
            ]);

            $email = $request->input('email');
            $otp = rand(1000, 9999);
            $count = User::where('email', '=', $email)->count();

            if ($count == 1) {
                Mail::to($email)->send(new OTPMail($otp));
                User::where('email', '=', $email)->update(['otp' => $otp]);
                return response()->json(['status' => 'success', 'message' => '4 Digit OTP Code has been send to your email !']);
            } else {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Invalid Email Address'
                ]);
            }

        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function VerifyOTP(Request $request)
    {

        try {
            $request->validate([
                'email' => 'required|string|email|max:50',
                'otp' => 'required|string|min:4'
            ]);

            $email = $request->input('email');
            $otp = $request->input('otp');

            $user = User::where('email', '=', $email)->where('otp', '=', $otp)->first();

            if (!$user) {
                return response()->json(['status' => 'fail', 'message' => 'Invalid OTP']);
            }

            // CurrentDate-UpdatedTe=4>Min

            User::where('email', '=', $email)->update(['otp' => '0']);  //otp reset

            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['status' => 'success', 'message' => 'OTP Verification Successful', 'token' => $token]);

        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }




    function ResetPassword(Request $request)
    {

        try {
            $request->validate([
                'password' => 'required|string|min:3'
            ]);
            $id = Auth::id();
            $password = $request->input('password');
            User::where('id', '=', $id)->update(['password' => Hash::make($password)]);
            return response()->json(['status' => 'success', 'message' => 'Request Successful']);

        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage(),]);
        }
    }





}