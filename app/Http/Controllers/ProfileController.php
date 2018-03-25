<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index(){

        $user = Auth::user();
        
        return view('pages.profile', compact('user'));
    }

    public function store(Request $request){

        
        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'avatar' => 'nullable|image'
        ]);
        $user = Auth::user();
        $user->edit($request->all());
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->back()->with('status', 'Профиль обновлен');

    }
}
