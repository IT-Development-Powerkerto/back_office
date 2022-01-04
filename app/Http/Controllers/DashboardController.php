<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Announcement;
use App\Models\Campaign;
use App\Models\Client;
use App\Models\CRM;
use App\Models\Role;
use App\Models\Icon;
use App\Models\Lead;
use App\Models\Operator;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $users = User::where('name', 'like', '%'.$request->search.'%')->get();
        }else{
            $users = User::all();
        }
        
        $announcements = Announcement::all();
        $roles = Role::all();
        $icons = Icon::all();
        $products = Product::all();
        $leads = Lead::all();
        $clients = Client::all();
        $campaigns = Campaign::all();
        $total_lead = DB::table('products')->pluck('lead');
        $now = Carbon::now();

        // $now = DB::table('leads')->value('created_at');
        // $countdown = Countdown::from($now)
        //      ->to($now->copy()->addYears(5))
        //      ->get()->toHuman('{days} days, {hours} hours and {minutes} minutes');
        $x = auth()->user();
        if($x->role_id === 4){
            return view('adv', compact('users'),['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
            ->with('products', $products)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('clients', $clients)->with('now', $now);
        }
        if($x->role_id === 5){
            return view('cs', compact('users'),['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
            ->with('products', $products)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('clients', $clients)->with('now', $now);
        }
        else{

            return view('dashboard', compact('users'),['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
            ->with('products', $products)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('clients', $clients)->with('now', $now);
            // ->with('countdown', $countdown);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = 1;
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->updated_at = Carbon::now()->toDateTimeString();
        if($request->hasFile('image')){
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'user-'.time().".".$extFile;
            $path = $request->image->move('public/assets/img',$namaFile);
            $user->image = $path;
        } else {
            $user->image = null;
        }

        $user->save();

        return redirect('/dashboard')->with('success','Successull! User Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $result = User::findOrFail($user);
        return view('dashboard.edit',['user' => $result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        File::delete('$user->image');
        DB::delete('delete from users where id = ?', [$user]);
        return redirect('/dashboard')->with('success','Successull! User Deleted');
    }

    public function adv(){
        $x = auth()->user();
        if($x->role_id === 4){
            $users = User::all();
            $announcements = Announcement::all();
            $roles = Role::all();
            $icons = Icon::all();
            $products = Product::all();
            $leads = Lead::all();
            $campaigns = Campaign::all();
            $total_lead = DB::table('products')->pluck('lead');
            return view('adv',['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
            ->with('products', $products)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns);
        }else{
            return Redirect::back();
        }
    }

    public function cs(){
        $x = auth()->user();
        if($x->role_id === 5){
            $users = User::all();
            $announcements = Announcement::all();
            $roles = Role::all();
            $icons = Icon::all();
            $products = Product::all();
            $leads = Lead::all();
            $campaigns = Campaign::all();
            $total_lead = DB::table('products')->pluck('lead');
            return view('cs',['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
            ->with('products', $products)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns);
        }else{
            return Redirect::back();
        }
    }

    public function ld() {
        $campaigns = Campaign::all();
        $client = Client::all();
        $operator = Operator::all();
        $lead = Lead::all();
        return view('DetailLead')->with('campaign', $campaigns)->with('client', $client)->with('operator', $operator)->with('lead', $lead);
    }

}
