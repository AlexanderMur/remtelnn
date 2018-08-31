<?php

namespace App\Http\Controllers;

use App\Models\Breaking;
use App\Models\Category;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        $device = Device::all();
        $breakings =  Breaking::all();
        return view('dashboard', [
            'cats' => $cats,
            'device' => $device,
            'breakings' => $breakings,
        ]);
    }

    public function showPasswordForm() {
        return view('auth.passwords.change');
    }

    public function changePassword(Request $request) {

        if (!(Hash::check($request->get('old_pass'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Ваш текуший пароль не совпадает с паролем, который вы указали, попробуйте еще раз");
        }

        if(strcmp($request->get('old_pass'), $request->get('pass')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Новый пароль не может быть таким же, как ваш текущий пароль. Выберите другой пароль");
        }

        $validatedData = $request->validate([
            'old_pass' => 'required',
            'pass' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('pass'));
        $user->save();

        return redirect()->back()->with("success","Пароль Изменен !");
    }

}
