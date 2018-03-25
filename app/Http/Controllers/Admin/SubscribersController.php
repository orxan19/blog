<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscription;

class SubscribersController extends Controller
{
    public function index(){
        $subs = Subscription::all();
        return view('admin.subs.index', compact('subs'));
    }

    public function destroy($id){
        Subscription::find($id)->remove();

        return redirect()->back()->with('status', 'Подписон удален');
    }
}
