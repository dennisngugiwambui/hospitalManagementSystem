<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    // public function index()
    // {
    //     if(Auth::id())
    //     {
    //         $usertype=Auth::user()->usertype;

    //     if($usertype=='1')
    //     {


    //         return view('admin.index');
    //     }
    //     else
    //     {
    //         return view('users.index');
    //     }
    //     }
    //     else
    //     {
    //         return view('auth.login');
    //     }

    // }

    public function index()
    {
        $doctor=Doctor::all();
        $user=Doctor::all();
        return view('homepages.index', compact('doctor', 'user'));
    }

    public function about()
    {
        $doctor=Doctor::all();
        return view('homepages.about', compact('doctor'));
    }

    public function appointments()
    {
        return view('homepages.appointments');
    }

    public function home_doctors()
    {
        $doctor=Doctor::all();
        return view('homepages.doctors', compact('doctor'));
    }

    public function contact()
    {
        return view('homepages.contact');
    }

    public function department()
    {
        return view('homepages.department');
    }
}
