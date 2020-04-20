<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Mail\Contact;
use Carbon\Carbon;
use App\Building;
use App\House;
use App\Message;
use App\User;
use App\Billing;
use Auth;
use Hash;
use Toastr;

class DashboardController extends Controller
{
    public function index()
    {
        $buildings    = Building::latest()->take(5)->get();
        $houses    = House::latest()->take(5)->get();

        $buildingtotal = Building::latest()->count();
        $housetotal = House::latest()->count();

        $messages      = Message::latest()->where('agent_id', Auth::id())->take(5)->get();
        $messagetotal  = Message::latest()->where('agent_id', Auth::id())->count();

        return view('agent.dashboard',compact('buildings','buildingtotal','houses', 'housetotal','messages','messagetotal'));
    }

    public function profile()
    {
        $profile = Auth::user();

        return view('agent.profile',compact('profile'));
    }
    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'username'  => 'required',
            'email'     => 'required|email',
            'image'     => 'image|mimes:jpeg,jpg,png',
            'about'     => 'max:400'
        ]);

        $user = User::find(Auth::id());

        $image = $request->file('image');
        $slug  = str_slug($request->name);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-agent-'.Auth::id().'-'.$currentDate.'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('users')){
                Storage::disk('public')->makeDirectory('users');
            }
            if(Storage::disk('public')->exists('users/'.$user->image) && $user->image != 'default.png' ){
                Storage::disk('public')->delete('users/'.$user->image);
            }
            $userimage = Image::make($image)->save($imagename);
            Storage::disk('public')->put('users/'.$imagename, $userimage);
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if(isset($image)){
            $user->image = $imagename;
        }
        $user->about = $request->about;
        $user->save();

        return back();
    }


    
    public function changePassword()
    {
        return view('agent.changepassword');

    }

    public function changePasswordUpdate(Request $request)
    {
        if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {

            Toastr::error('message', 'Your current password does not matches with the password you provided! Please try again.');
            return redirect()->back();
        }
        if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){

            Toastr::error('message', 'New Password cannot be same as your current password! Please choose a different password.');
            return redirect()->back();
        }

        $this->validate($request, [
            'currentpassword' => 'required',
            'newpassword' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();

        Toastr::success('message', 'Password changed successfully.');
        return redirect()->back();
    }



    // MESSAGE
    public function message()
    {
        $messages = Message::latest()->where('agent_id', Auth::id())->paginate(10);

        return view('agent.messages.index',compact('messages'));
    }

    public function billing()
    {
        $messages = Message::latest()->where('agent_id', Auth::id())->paginate(10);

        return view('agent.messages.billing',compact('messages'));
    }

    public function add_pay($id, Request $request){
        $message = Message::findOrFail($id);
        $billing = new Billing();

        $user_id = $message->user_id;
        $house_id = $message->house_id;
        $pay_amount = $request->pay_amount;
        $pay_date = $request->pay_date;

        $billing->message_id = $id;
        $billing->user_id = $user_id;
        $billing->house_id = $house_id;
        $billing->pay_amount = $pay_amount;
        $billing->pay_date = $pay_date;
        $billing->save();

        return redirect()->back();
    }

    public function billing_view($id)
    {
        $messages = Message::latest()->where('agent_id', Auth::id())->paginate(10);
        $billings = Billing::get()->where('message_id', $id);

        return view('agent.messages.billing_view',compact('messages', 'billings'));
    }

    public function messageaccept($id, Request $request)
    {
        $message = Message::findOrFail($id);
        $message->status = 1;
        $message->save();

        $house_id = $request->house_id;
        $house = House::findOrFail($house_id);
        $house->state = 1;
        $house->save();
        
        return redirect()->route('agent.message');
    }

        public function messagedecline($id, Request $request)
    {
        $message = Message::findOrFail($id);
        $message->status = 3;
        $message->save();

        $house_id = $request->house_id;
        $house = House::findOrFail($house_id);
        $house->state = 0;
        $house->save();
        
        return redirect()->route('agent.message');
    }

    public function messageRead($id)
    {
        $message = Message::findOrFail($id);

        return view('agent.messages.read',compact('message'));
    }

    public function messageReplay($id)
    {
        $message = Message::findOrFail($id);

        return view('agent.messages.replay',compact('message'));
    }

    public function messageSend(Request $request)
    {
        $request->validate([
            'agent_id'  => 'required',
            'user_id'   => 'required',
            'name'      => 'required',
            'email'     => 'required',
            'phone'     => 'required',
            'message'   => 'required'
        ]);

        Message::create($request->all());

        Toastr::success('message', 'Message send successfully.');
        return back();

    }

    public function messageReadUnread(Request $request)
    {
        $status = $request->status;
        $msgid  = $request->messageid;

        if($status){
            $status = 0;
        }else{
            $status = 1;
        }

        $message = Message::findOrFail($msgid);
        $message->status = $status;
        $message->save();

        return redirect()->route('agent.message');
    }

    public function messageDelete($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        Toastr::success('message', 'Message deleted successfully.');
        return back();
    }


    public function contactMail(Request $request)
    {
        $message  = $request->message;
        $name     = $request->name;
        $mailfrom = $request->mailfrom;

        Mail::to($request->email)->send(new Contact($message,$name,$mailfrom));

        Toastr::success('message', 'Mail send successfully.');
        return back();
    }

}
