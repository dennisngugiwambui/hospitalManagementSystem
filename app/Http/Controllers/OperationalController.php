<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\User;
use Alert;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Laboratory;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\Treatment;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;
use AfricasTalking\SDK\AfricasTalking;
use App\Models\PatientTreatment;
use App\Models\Pharmacy;
use App\Models\WardBooking;
use DateTime;
use Illuminate\Support\Facades\Validator;


class OperationalController extends Controller
{
    public function contactus(Request $req)
    {
        $this->validate($req, [
            'name' => "required",
            'email' => "email|required",
            'subject' => "required",
            'message' => "required",
        ]);

        $contact = new Contact();

        $contact->message = $req->message;
        $contact->name = $req->name;
        $contact->email = $req->email;
        $contact->subject = $req->subject;
        $contact->save();

        alert()->success('thank you for contacting us, we will respond within a while', 'success');
        return redirect()->back()->with('success', 'thank you for contacting us, we will respond within a while');
    }
    public function update(Request $request)
    {
        $users = User::find($request->id);
        if (!$users) {
            $message = 'user update failed';
            // alert()->info('NOTE', $message);
            return back()->with('Error', $message);
        }
        $users->name = $request->name;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->password = $request->password;
        // $users->usertype=$request->usertype;
        $users->update();

        $message = 'user updated successfully';
        // Alert::success('success', 'User updated successfully');
        alert()->success('success', 'User updated successfully')->persistent();
        // Toastr::success('Messages in here', 'Title',);
        //FacadesAlert::alert('success', $message)->persistent();//so wako wrong kwa iyo do
        return back()->with('success', $message);
    }

    // public function Pawword_update(Request $request)
    // {
    //     $owner = User::find($request->id);
    //     if(!$owner){
    //         $message='password update failed';
    //         alert()->info('NOTE', $message);
    //         return back()->with('Error', $message);
    //     }
    //     $owner->password=$request->password;
    //     $owner ->update();

    //     $message = 'user updated successfully';
    //     Alert::success('success', 'User updated successfully');
    //     //FacadesAlert::alert('success', $message)->persistent();//so wako wrong kwa iyo do
    //     return back()->with('success', $message);
    // }

    /**
     * Function to delete a  user
     */
    public function user_destroy(Request $request)
    {
        $destroy = User::find($request->id);
        if (!$destroy) {
            return back()->with('Error', 'User not found');
        }
        $destroy->delete();
        $message = 'user deleted successfully';
        alert()->success('success', $message)->persistent();
        return back()->with('success', $message);
        //$request=Store::where($request->id)->delete();
    }

    public function user_type(Request $request)
    {
        $admin = User::find($request->id);
        if (!$admin) {
            return back()->with('Error', 'User not found');
        }
        $admin->usertype = $request->usertype;
        $admin->update();
        $message = 'user role changed successfully';
        alert()->success('success', $message)->persistent();
        return back()->with('success', $message);
        //$request=Store::where($request->id)->delete();
    }

    public function addingAppointment(Request $req)
    {
        $appoint = new Appointment();

        $appoint->name = $req->name;
        $appoint->phone = $req->phone;
        $appoint->doctor = $req->doctor;
        $appoint->email = $req->email;
        $appoint->message = $req->message;

        $appoint->save();

        $message = 'appointment booked successfully';
        alert()->success('success', $message);

        $mes = 'Hello'.$appoint->name.', an  appointment have been successfully booked with Dr.'.$appoint->doctor;
        dd($appoint->phone);
        $this->sendSms($appoint->phone, $mes);
        // Toastr::success($message, 'success', ["positionClass" => "bottom-left"]);
        return redirect()->back()->with('success', 'uploaded successfully');
    }

    public function adding_doctors(Request $request)
    {
        $detail = new Doctor();

        $image = $request->image;
        $filename = time() . '.' . $image->getClientoriginalExtension();
        $request->image->move('imagename', $filename);
        $detail->image = $filename;
        $detail->name = $request->name;
        $detail->speciality = $request->speciality;

        $detail->save();

        $message = 'doctor added successfully';
        alert()->success('success', $message);
        return redirect()->back()->with('success', 'doctor added successfully');
    }

    public function medications(Request $request)
    {
        $data = new Medication();

        $id = Auth::user()->id;

        $data->patient_id = $id;
        $data->name = $request->name;
        $data->medicine = $request->medicine;
        $data->instructions = $request->instructions;
        $data->times = $request->times;

        $data->save();

        alert()->success('success', 'medication record added successfully');
        // Toastr::success('medication record added successfully', 'success', ["positionClass" => "bottom-left"]);
        return redirect()->back()->with('success', 'medication record added successfully');
    }

    public function register_patients(Request $request)
    {
        $user = new Patient();
        // $users=Patient::all();

        $user->name = $request->name;
        $user->last_date = now()->format('d-m-Y');
        $user->phone = $request->phone;
        $user->age = $request->age;
        $user->ticket_id = 'N/A';
        $user->doctor = 'N/A';
        $user->book = 'N/A';

        $user->save();
        $sms = "Hello, " . $user->name . " Welcome to Denno Hospital You have been successfully registered.";

        $this->sendSms($user->phone, $sms);

        toast()->success('patient registered successfully', 'success');
        // toastr()->success('success', 'patient registered successfully');
        return redirect()->back()->with('success', 'Patient registered successfully');
    }

    public function Doctor_booking(Request $req)
    {
        $users = Patient::find($req->id);
        if (!$users) {
            $message = 'Booking failed';
            // alert()->info('NOTE', $message);
            return back()->with('Error', $message);
        }
        $users->last_date = now()->format('d-m-Y');
        $users->ticket_id = strtoupper(str_random(4));
        $users->doctor = $req->doctor;
        $users->book = 'Booked';
        // $users->usertype=$request->usertype;
        $users->update();

        $mes = 'Hello '.$users->name.', an  appointment have been successfully booked with '.$users->doctor.' Your ticket number is #'.$users->ticket_id;
        // dd($appoint->phone);
        $this->sendSms($users->phone, $mes);


        $message = 'A ticket with ID:#' . $users->ticket_id . ' has been opened.';
        // Alert::success('success', 'User updated successfully');
        alert()->success('success', $message)->persistent();
        // Toastr::success('Messages in here', 'Title',);
        //FacadesAlert::alert('success', $message)->persistent();//so wako wrong kwa iyo do
        return back()->with('success', $message);
    }

    public function making_admin(Request $req)
    {
        $users = User::find($req->id);
        if (!$users) {
            $message = 'User update failed';
            alert()->info('NOTE', $message);
            return back()->with('Error', $message);
        }

        $users->usertype = $req->usertype;
        $users->update();

        $message = 'The user role has been changed successfully';
        // Alert::success('success', 'User updated successfully');
        alert()->success('success', $message)->persistent();
        // Toastr::success('Messages in here', 'Title',);
        //FacadesAlert::alert('success', $message)->persistent();//so wako wrong kwa iyo do
        return back()->with('success', $message);
    }

    public function patient_treatment(Request $req)
    {
        $data = new Treatment();
        $user = Patient::findorfail($req->id);

        $data->doctor_name = $user->doctor;
        // $data->patient_id=$user->id;
        $data->patient_name = $user->name;
        $data->patient_phone = $user->phone;
        $data->date = now()->format('d-m-Y');
        $data->ticket_id = $user->ticket_id;
        $data->comment = $req->doctor_comment;
        $data->lab_comment = 'N/A';
        $data->medicines = 'N/A';
        $data->clinics = 'N/A';
        $data->appointment = 'N/A';
        $data->ward_number = 'N/A';
        $data->payment = 0;

        // dd($data);
        $data->save();
        $message = 'Thank you for treating patient with ticket id #' . $user->ticket_id;
        alert()->success('success', $message)->persistent();

        return redirect()->back()->with('success', 'thank you for treating this patient');
    }

    public function ward_patients(Request $req)
    {

        $validatedData = $req->validate([
            'ward_name.*' => 'required|string',
            'stream.*' => 'required|string',
            'bed.*' => 'required|numeric',
            'price_per_day.*' => 'required|numeric',
        ]);
        $data = new Ward();

        $image = $req->image;
        $filename = time() . '.' . $image->getClientoriginalExtension();
        $req->image->move('imagename', $filename);
        $data->image = $filename;
        $data->ward_name = $req->ward_name;
        $data->available_beds = $req->available_beds;
        $data->date = now()->format('d-m-Y');
        $data->booked_beds =0;
        $data->total_beds = $data->available_beds+$data->booked_beds;

        $data->save();
        // dd($data);

        $message = 'The user role has been changed successfully';
        // Alert::success('success', 'User updated successfully');
        alert()->success('success', $message)->persistent();
        // Toastr::success('Messages in here', 'Title',);
        //FacadesAlert::alert('success', $message)->persistent();//so wako wrong kwa iyo do
        return back()->with('success', $message);
    }

    public function getting_lab(Request $req)
    {
        $users = Treatment::find($req->id);
        if (!$users) {
            $message = 'booking failed';
            alert()->info('NOTE', $message);
            return back()->with('Error', $message);
        }
        $users->lab_comment = 'Get the patient some scanning';
        // $users->usertype=$request->usertype;
        $users->update();


        $message = 'A ticket with ID:#' . $users->ticket_id . ' lab booking have been done successfully.';
        // Alert::success('success', 'User updated successfully');
        alert()->success('success', $message)->persistent();
        // Toastr::success('Messages in here', 'Title',);
        //FacadesAlert::alert('success', $message)->persistent();//so wako wrong kwa iyo do
        return back()->with('success', $message);
    }

    public function Lab_Data(Request $request)
    {
        $user = new Laboratory();

        $data = Treatment::findorfail($request->id);
        if (!$data) {
            $message = 'reporting for the patient failed';
            alert()->info('NOTE', $message);
            return back()->with('Error', $message);
        }

        $user->patient_name = $data->patient_name;
        $user->patient_phone = $data->patient_phone;
        $user->patient_id = $data->id;
        $user->ticket_id = $data->ticket_id;
        $user->date = now()->format('d-m-Y');
        $user->lab_tech = $request->lab_tech;
        $user->comment = $request->comment;

        $user->save();

        $message = 'Lab report added and submited successfully';
        // Toastr::success($message, 'success');
        alert()->success('success', $message)->persistent();
        return redirect()->back()->with('success', $message);
    }

    public function adding_ward_patient(Request $request)
    {
        $users = Treatment::find($request->id);
        if (!$users) {
            $message = 'ward forwading failed';
            alert()->info('NOTE', $message);
            return back()->with('Error', $message);
        }
        $users->ward_number = 'admitted on' . $users->date;
        // $users->usertype=$request->usertype;
        $users->update();


        $message = 'A ticket with ID:#' . $users->ticket_id . ' Book the bed for the patient. Quick recovery.';
        // Alert::success('success', 'User updated successfully');
        alert()->success('success', $message)->persistent();
        // Toastr::success('Messages in here', 'Title',);
        //FacadesAlert::alert('success', $message)->persistent();//so wako wrong kwa iyo do
        return back()->with('success', $message);
    }

    public function sendSms(string $number, string $message)
    {
        $username = 'dennohosi'; // use 'sandbox' for development in the test environment
        $apiKey   =  getenv('AT_API_KEY'); // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms      = $AT->sms();

        // Use the service
        $result   = $sms->send([
            'to'      => $number,
            'message' => $message,
        ]);

    }

    // public function Booking_ward(Request $req)
    // {
    //     $data=new WardBooking();

    //     $user=Treatment::findorfail($req->id);

    //     $data->from=now()->format('d-m-Y');
    //     $data->patient_name=$user->patient_name;
    //     $data->doctor_name=$user->doctor_name;
    //     $data->patient_phone=$user->patient_phone;
    //     $data->next_of_kiln=$req->next_of_kiln;
    //     $data->ticket_id=$user->ticket_id;
    //     $data->to=1;
    //     $data->days=($data->to-$data->from)/ (60 * 60 * 24);
    //     $data->price=300* $data->days;

    //     dd($data);
    // }

    public function Booking_ward(Request $req, $id)
    {
        $data = new WardBooking();

        $wards = Ward::find($id);
        $user = Treatment::findOrFail($req->id);

        $from = new DateTime();
        $data->from = $from->format('d-m-Y');
        $to = new DateTime('+1 day'); // add one day to the current date
        $data->to = $to->format('d-m-Y');

        $data->patient_name = $user->patient_name;
        $data->doctor_name = $user->doctor_name;
        $data->patient_phone = $user->patient_phone;
        $data->next_of_kiln = $req->next_of_kiln;
        $data->ticket_id = $user->ticket_id;

        $interval = $from->diff($to);
        $data->days = $interval->days;

        $data->price = 300 * $data->days;
        $data->ward = $wards->ward_name;

        if (!$wards) {
            $message = 'an error occured';
            alert()->info('NOTE', $message);
            return back()->with('Error', $message);
        }
        $wards->available_beds=$wards->available_beds-1;
        $wards->booked_beds=$wards->booked_beds+1 ;
        $wards->update();

        // dd($data);
        $data->save();

    alert()->success('success', 'we wish a quick recovery to the patient')->persistent();
    return redirect()->back()->with('success', 'we wish quick recovery to the patient');
    }

    public function pharmacy(Request $req)
    {
        $med= new Pharmacy();

        $med->medicine_name=$req->medicine_name;
        $med->description=$req->description;
        $med->quantity=$req->quantity;
        $med->price=$req->price;

        // dd($med);
        $med->save();

        alert()->success('success', 'you have successfully added a medicine');

        return redirect()->back()->with('success', 'you have successfully added a medicine');
    }

    public function getMedicinePrice(Request $request)
    {
        $medicine = Pharmacy::where('name', $request->medicine_name)->first();
        if($medicine){
            return response()->json(['success' => true, 'price' => $medicine->price]);
        } else {
            return response()->json(['success' => false, 'price' => null]);
        }
    }

    public function pharmacy_patient(Request $req)
    {
        $ticket = Treatment::findOrFail($req->id);
        $treatment = new PatientTreatment();

        $treatment->ticket_id = $ticket->id;
        $treatment->patient_name = $ticket->patient_name;
        $treatment->patient_phone = $ticket->patient_phone;
        $treatment->medicine_id = $req->medicine_id;
        $treatment->medicine_name = $req->med_name;
        $treatment->price = $req->price;
        $treatment->date = now()->format('d-m-Y');
        dd($treatment);
    }

    // public function patient_ph(Request $req)
    // {
        // $validator = Validator::make($req->all(), [
        //     'ticket_id' => 'required|exists:treatments,ticket_id',
        //     'medicine' => 'required|array',
        //     'medicine_name' => 'required',
        //     'total_price' => 'required|numeric',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // $ticket = Treatment::findOrFail($req->id);
        // $treatment = new PatientTreatment();
        // $treatment->ticket_id = $ticket->id;
        // $treatment->patient_name = $ticket->patient_name;
        // $treatment->patient_phone = $ticket->patient_phone;
        // $treatment->medicine_id = $req->medicine_id;
        // $treatment->medicine_name = $req->medicine_name;
            // $treatment->quantity = $quantity;
        // $treatment->price = $req->price;
        // $treatment->date = now()->format('d-m-Y');
        // dd($treatment)
        //     // $treatment->save();

        // $total_price = 0;

        // Loop through each medicine_id and medicine_name
        // for ($i = 0; $i < count($req->medicine); $i++) {
        //     $medicine = Pharmacy::find($req->medicine[$i]);
        //     $quantity = $req->quantity[$i];

        //     $price = $medicine->price * $quantity;

        //     $total_price += $price;

        //     $treatment = new PatientTreatment();
        //     $treatment->ticket_id = $ticket->id;
        //     $treatment->patient_name = $ticket->patient_name;
        //     $treatment->patient_phone = $ticket->patient_phone;
        //     $treatment->medicine_id = $medicine->id;
        //     $treatment->medicine_name = $medicine->name;
        //     // $treatment->quantity = $quantity;
        //     $treatment->price = $price;
        //     $treatment->date = now()->format('d-m-Y');
        //     // $treatment->save();
        // }

        // $ticket->total_price = $total_price;
        // // $ticket->save();
        // dd($ticket);
//   }
  public function searchTicket(Request $request)
  {
    $term = $request->q;

    $tickets = Patient::where('name', 'like', '%'.$term.'%')->get();

    $results = [];

    foreach ($tickets as $ticket) {
        $results[] = [
        'id' => $ticket->id,
        'text' => $ticket->name
        ];
    }

    return response()->json($results);
 }



}
