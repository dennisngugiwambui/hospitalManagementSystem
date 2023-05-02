<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Laboratory;
use App\Models\Treatment;
use App\Models\Ward;
use AfricasTalking\SDK\AfricasTalking;
use App\Models\Lab;
use App\Models\PatientTreatment;
use App\Models\Pharmacy;
use App\Models\WardBooking;
use Illuminate\Support\Facades\DB;
use Charts;


class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::id())
        {
            $usertype=Auth::user()->usertype;

        if($usertype=='admin')
        {
            {
                // $ward = Ward::all()->count();
                $pharmacy = Pharmacy::all()->count();
                $user = User::all()->count();
                $booked = WardBooking::all()->count();
                $doctors=Doctor::all()->count();
                $lab_test=Laboratory::all()->count();
                $treatment=Treatment::all()->count();
                $patients=Patient::all()->count();
                $contact=Contact::all()->count();
                $wards=Ward::all()->count();
                return view('admin.index', compact('wards', 'pharmacy', 'user', 'booked', 'doctors', 'lab_test', 'treatment','contact', 'patients'));
            }

        }
        else
        {
            return view('patients.index');
        }
        }
        else
        {
            return view('auth.login');
        }
    }

    public function profile($name)
    {
        if(Auth::id())
        {
            $usertype=Auth::user()->usertype;

            if($usertype=='admin')
            {


                $user=User::whereRaw('LOWER(`name`) LIKE ? ',$name)->first();
                // dd($user);
                // $data=User::findorfail($id);
                $currentUserId=Auth::user()->id;
                $user = User::where('id', $currentUserId)->first();
                $users = User::where('id', $currentUserId)->first();
                $destroy = User::where('id', $currentUserId)->first();
                return view('admin.profile', compact(['user', 'users', 'destroy', 'name']));
            }
            else
            {

                $currentUserId=Auth::user()->id;
                $user = User::where('id', $currentUserId)->first();
                $users = User::where('id', $currentUserId)->first();
                $destroy = User::where('id', $currentUserId)->first();
                return view('Patients.profile', compact('user', 'users', 'destroy'));
            }
        }
        else
        {
            return view('auth.login');
        }
    }

    public function All_users()
    {
        if(Auth::id())
        {
            $usertype=Auth::user()->usertype;

        if($usertype=='admin')
        {

            $users=User::all();
            return view('admin.Allusers', compact('users'));
        }
        else
        {
            return view('patients.users');
        }
        }
        else
        {
            return view('auth.login');
        }
    }

    public function all_appointment()
    {
        $currentUserId=Auth::user()->id;
        $doctors= Appointment::where('id', $currentUserId)->get();

        return view('Patients.appointments', compact('doctors'));
    }

    public function medications()
    {
        $user=Auth::user()->id;
        $data=Medication::where('patient_id',$user)->get();

        return view('patients.medications', compact('data', 'user'));
    }

    public function receptionist()
    {
        $user=Patient::all();
        $doctor=Doctor::all();
        return view('admin.receptionist', compact('user', 'doctor'));
    }

    public function doctors()
    {
        $users=Doctor::all();
        return view('admin.doctors', compact('users'));
    }

    public function treatment()
    {
        $users=Patient::where('ticket_id','!=','N/A')->orderBy('doctor', 'asc')->get();;
        $doctor=Doctor::all();
        return view('admin.treatment', compact('users', 'doctor'));
    }

    public function user_details($id)
    {
        $users = Patient::findorfail($id);
        // $name=Patient::findorfail($name);
        $dat=$users->ticket_id;
        $doctor = Doctor::all();
        $lab=Laboratory::where('ticket_id',$dat)->get();
        $data=Treatment::where('ticket_id', $dat)->get();
        return view('admin.patient_profile', compact(['users', 'doctor', 'data', 'lab']));
    }

    public function lab()
    {
        $user=Treatment::where('lab_comment','!=', 'N/A')->get();
        return view('admin.lab', compact('user'));
    }

    public function lab_testing($id)
    {
        $users=Patient::findorfail($id);
        $dat=$users->ticket_id;
        $data=Treatment::where('ticket_id', $dat)->get();
        $use=Doctor::all();
        $comment=Laboratory::where('ticket_id', $dat)->get();

        return view('admin.lab_testing', compact(['users', 'dat', 'data', 'use', 'comment']));
    }

    public function Wards()
    {
        $wards=Ward::all();
        return view('admin.wards', compact('wards'));
    }

    public function Ward_patients_profiles($id)
    {
        $users=Patient::findorfail($id);
        $dat=$users->ticket_id;
        $data=Treatment::where('ticket_id', $dat)->get();
        $patient=Ward::where('ticket_id', $dat)->get();
        $use=Doctor::all();
        $comment=Laboratory::where('ticket_id', $dat)->get();

        return view('admin.lab_testing', compact(['users', 'dat', 'data', 'use', 'comment']));
    }

    public function Patient_ward_profile(Request $request)
    {
        $use = Ward::findOrFail($request->id);
        $patient = Treatment::where('ward_number', '!=', 'N/A')->get();
        return view('admin.ward_profile', compact('patient', 'use'));
    }

    public function pharmacy(Request $req)
    {
        $medicine=Treatment::all();
        $pharmacy=Pharmacy::all();

        return view('admin.pharmacy', compact('medicine', 'pharmacy'));
    }

    public function contacted()
    {
        $contact= Contact::all();

        return view('admin.contacted', compact('contact'));
    }

    public function admitted_patients()
    {
        $admitted=WardBooking::all();
        $wardData = $admitted->groupBy('ward')->map->count();
        return view('admin.admitted', compact('admitted', 'wardData'));
    }

    public function paid_cases()
    {
        // $admitted=PatientTreatment::all();
        return view('admin.payment');
    }


}
