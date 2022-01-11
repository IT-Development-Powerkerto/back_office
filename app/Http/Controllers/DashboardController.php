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
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = User::all();
        $announcements = Announcement::all();
        $roles = Role::all();
        $icons = Icon::all();
        $products = Product::all();
        $day = Carbon::now()->format('Y-m-d');
        $leads = DB::table('leads as l')
            ->join('operators as o', 'l.operator_id', '=', 'o.id')
            ->join('products as p', 'l.product_id', '=', 'p.id' )
            ->join('statuses as s', 'l.status_id', '=', 's.id')
            ->join('clients as c', 'l.client_id', '=', 'c.id')
            ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
            ->select('l.id as id', 'advertiser', 'c.name as client_name', 'c.whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.updated_at as client_updated_at', 'c.created_at as client_created_at')
            // ->where('l.updated_at', $day)
            ->orderByDesc('l.id')
            ->paginate(5);
            // dd($leads);
        $client = Client::all();
        $campaigns = Campaign::all();
        $total_lead = DB::table('products')->pluck('lead');
        // dd($leads);

        // $now = DB::table('leads')->value('created_at');
        // $countdown = Countdown::from($now)
        //      ->to($now->copy()->addYears(5))
        //      ->get()->toHuman('{days} days, {hours} hours and {minutes} minutes');
        $x = auth()->user();
        if($x->role_id == 4){
            return redirect(route('advDashboard'));
        }
        if($x->role_id == 5){
            return redirect(route('csDashboard'));
        }
        else{
            for ($i=0; $leads->count() > $i; $i++){
                return view('dashboard', compact('users'),['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
            ->with('products', $products)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('client', $client)->with('day', $day);
            // ->with('countdown', $countdown);
            $i--;
            return Redirect::back();
            }

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
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email',
            'phone' => 'required|unique:users',
            'password' => 'required'
        ]);
        if($validator->fails()){
            // return back()->with('error','Error! User not been Added')->withInput()->withErrors($validator);
            return Redirect::back()->with('error_code', 5)->withInput()->withErrors($validator);
        }
        $validated = $validator->validate();
        if(substr(trim($validated['phone']), 0, 1)=='0'){
            $phone = '62'.substr(trim($validated['phone']), 1);
        } else{
            $phone = $validated['phone'];
        }
        $user = new User();
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->phone = $phone;
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
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

    public function adv(Request $request){
        if($request){
            $users = User::where('name', 'like', '%'.$request->search.'%')->get();
        }else{
            $users = User::all();
        }
        $x = auth()->user();
        if($x->role_id == 4){
            $announcements = Announcement::all();
            $roles = Role::all();
            $icons = Icon::all();
            $products = Product::all();
            $leads = DB::table('leads as l')
                ->join('operators as o', 'l.operator_id', '=', 'o.id')
                ->join('products as p', 'l.product_id', '=', 'p.id' )
                ->join('statuses as s', 'l.status_id', '=', 's.id')
                ->join('clients as c', 'l.client_id', '=', 'c.id')
                ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
                ->select('l.id as id', 'advertiser', 'c.name as client_name', 'c.whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.updated_at as client_updated_at', 'c.created_at as client_created_at')
                ->where('l.advertiser', $x->name)
                ->orderByDesc('l.id')
                ->paginate(5);
            $campaigns = Campaign::all();
            $total_lead = DB::table('products')->pluck('lead');
            return view('adv',['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
            ->with('products', $products)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns);
        }else{
            return Redirect::back();
        }
    }

    public function cs(Request $request){
        if($request){
            $users = User::where('name', 'like', '%'.$request->search.'%')->get();
        }else{
            $users = User::all();
        }
        $x = auth()->user();
        if($x->role_id == 5){
            $announcements = Announcement::all();
            $roles = Role::all();
            $icons = Icon::all();
            $products = Product::all();
            $leads = DB::table('leads as l')
                ->join('operators as o', 'l.operator_id', '=', 'o.id')
                ->join('products as p', 'l.product_id', '=', 'p.id' )
                ->join('statuses as s', 'l.status_id', '=', 's.id')
                ->join('clients as c', 'l.client_id', '=', 'c.id')
                ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
                ->select('l.id as id', 'advertiser', 'c.name as client_name', 'c.whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.updated_at as client_updated_at', 'c.created_at as client_created_at')
                ->where('l.user_id', $x->id)
                ->orderByDesc('l.id')
                ->paginate(5);
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
        $day = Carbon::now()->format('Y-m-d');
        // $lead = DB::table('leads as l')
        //     ->join('operators as o', 'l.operator_id', '=', 'o.id')
        //     ->join('products as p', 'l.product_id', '=', 'p.id' )
        //     ->join('statuses as s', 'l.status_id', '=', 's.id')
        //     ->join('clients as c', 'l.client_id', '=', 'c.id')
        //     ->join('campaigns as cp', 'l.campaign_id', '=', 'cp.id')
        //     ->select('l.id as id', 'advertiser', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.name as client_name', 'c.whatsapp as client_wa', 'c.created_at as client_created_at', 'c.updated_at as client_updated_at', 'cp.cs_to_customer as cs_to_customer', 'cp.id as campaign_id')
        //     ->where('c.updated_at', $day);
        $lead = Lead::where('updated_at', $day)->orderByDesc('id')->get();

        return view('DetailLead')->with('campaign', $campaigns)->with('client', $client)->with('operator', $operator)->with('lead', $lead);
    }

}
