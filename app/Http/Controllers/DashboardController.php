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
use App\Models\Inputer;
use App\Events\MessageCreated;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $day = Carbon::now()->format('Y-m-d');
        $user_expired = auth()->user()->expired_at;
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();

        //count lead every day
        $lead_su = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->count();
        $lead_mo = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->count();
        $lead_tu = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->count();
        $lead_we = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->count();
        $lead_th = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->count();
        $lead_fr = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->count();
        $lead_sa = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->count();

        //count lead closing every month
        $closing_su = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->count();
        $closing_mo = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->count();
        $closing_tu = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->count();
        $closing_we = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->count();
        $closing_th = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->count();
        $closing_fr = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->count();
        $closing_sa = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->count();

        $quantity = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('quantity');

        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
        else{
            if($request->date_filter){
                $day = Carbon::parse($request->date_filter)->format('Y-m-d');
            } else {
                $day = Carbon::now()->format('Y-m-d');
            }
            $leads = DB::table('leads as l')
            ->join('operators as o', 'l.operator_id', '=', 'o.id')
            ->join('products as p', 'l.product_id', '=', 'p.id' )
            ->join('statuses as s', 'l.status_id', '=', 's.id')
            ->join('clients as c', 'l.client_id', '=', 'c.id')
            ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
            ->select('l.id as id', 'advertiser', 'c.name as client_name', 'c.whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.updated_at as client_updated_at', 'c.created_at as client_created_at')
            ->where('l.admin_id', auth()->user()->admin_id)
            ->where('l.updated_at', $day)
            ->orderByDesc('l.id')
            ->paginate(5);
            //dd($leads);
            $users = User::where('admin_id', auth()->user()->admin_id)->get();
            $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
            if (auth()->user()->admin_id == 1){
                $roles = Role::all();
            }
            else {
                $roles = Role::where('id', '!=', 1)->get();
            }

            $icons = Icon::all();
            $products = Product::where('admin_id', auth()->user()->admin_id)->get();


            $client = Client::where('admin_id', auth()->user()->admin_id)->get();
            $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
            $total_lead = DB::table('products')->where('admin_id', auth()->user()->admin_id)->pluck('lead');
            $inputer = Inputer::where('admin_id', auth()->user()->admin_id);
            // dd($leads);

            // $now = DB::table('leads')->value('created_at');
            // $countdown = Countdown::from($now)
            //      ->to($now->copy()->addYears(5))
            //      ->get()->toHuman('{days} days, {hours} hours and {minutes} minutes');

            $x = auth()->user();
            if($x->admin_id == 1){
                return redirect(route('superadmin.index'));
            }
            else if($x->role_id == 2){
                return redirect(route('ceo'));
            }
            else if($x->role_id == 3){
                return redirect(route('manager'));
            }
            else if($x->role_id == 4){
                return redirect(route('advDashboard'));
            }
            else if($x->role_id == 5){
                return redirect(route('csDashboard'));
            }
            else if($x->role_id == 9){
                return redirect(route('finance'));
            }
            else if($x->role_id == 10){
                return redirect(route('inputer'));
            }else if($x->role_id == 11){
                return redirect(route('HumanResource.index'));
            }
            else{

                return view('dashboard', compact('users'),['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
                ->with('products', $products)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('client', $client)->with('day', $day)
                ->with('inputer', $inputer)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_su', $lead_su)->with('lead_mo', $lead_mo)->with('lead_tu', $lead_tu)->with('lead_we', $lead_we)->with('lead_th', $lead_th)->with('lead_fr', $lead_fr)->with('lead_sa', $lead_sa)
                ->with('closing_su', $closing_su)->with('closing_mo', $closing_mo)->with('closing_tu', $closing_tu)->with('closing_we', $closing_we)->with('closing_th', $closing_th)->with('closing_fr', $closing_fr)->with('closing_sa', $closing_sa);
                // ->with('countdown', $countdown);
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

        if($request->role_id == 1){
            $user = new User();
            $user->name = $request->name;
            $user->role_id = $request->role_id;
            $user->phone = $phone;
            $user->username = $validated['username'];
            $user->email = $validated['email'];
            $user->password = Hash::make($validated['password']);
            $user->status = 1;
            $user->paket_id = auth()->user()->paket_id;
            $user->exp = auth()->user()->exp;
            $user->remember_token = Str::random(10);
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->updated_at = Carbon::now()->toDateTimeString();
            $user->expired_at = auth()->user()->expired_at;
            if($request->hasFile('image')){
                $extFile = $request->image->getClientOriginalExtension();
                $namaFile = 'user-'.time().".".$extFile;
                $path = $request->image->move('public/assets/img',$namaFile);
                $user->image = $path;
            } else {
                $user->image = null;
            }
            $user->save();
            $user_id = User::orderBy('id', 'DESC')->value('id');
            DB::table('users')->where('id', $user_id)->update([
                'admin_id' => $user_id,
            ]);
        } else{
            $user = new User();
            $user->admin_id = auth()->user()->id;
            $user->name = $request->name;
            $user->role_id = $request->role_id;
            $user->phone = $phone;
            $user->username = $validated['username'];
            $user->email = $validated['email'];
            $user->password = Hash::make($validated['password']);
            $user->status = 1;
            $user->paket_id = auth()->user()->paket_id;
            $user->exp = auth()->user()->exp;
            $user->remember_token = Str::random(10);
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->updated_at = Carbon::now()->toDateTimeString();
            $user->expired_at = auth()->user()->expired_at;
            if($request->hasFile('image')){
                $extFile = $request->image->getClientOriginalExtension();
                $namaFile = 'user-'.time().".".$extFile;
                $path = $request->image->move('public/assets/img',$namaFile);
                $user->image = $path;
            } else {
                $user->image = null;
            }
            $user->save();
        }

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
        $result = User::findOrFail($user)->where('admin_id', auth()->user()->admin_id);
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
        $user = User::find($user);
        File::delete($user->image);
        $user->delete();
        return redirect('/dashboard')->with('success','Successull! User Deleted');
    }

    public function adv(Request $request){
        $day = Carbon::now()->format('Y-m-d');
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->count();

        //count lead every month
        $lead_jan = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->count();
        $lead_feb = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->count();
        $lead_mar = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->count();
        $lead_apr = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->count();
        $lead_may = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->count();
        $lead_jun = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->count();
        $lead_jul = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->count();
        $lead_aug = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->count();
        $lead_sep = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->count();
        $lead_okt = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->count();
        $lead_nov = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->count();
        $lead_des = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->count();

        //count lead closing every month
        $closing_jan = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->count();
        $closing_feb = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->count();
        $closing_mar = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->count();
        $closing_apr = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->count();
        $closing_may = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->count();
        $closing_jun = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->count();
        $closing_jul = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->count();
        $closing_aug = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->count();
        $closing_sep = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->count();
        $closing_okt = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->count();
        $closing_nov = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->count();
        $closing_des = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->count();

        $quantity = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->value('quantity');

        $lead_day = Lead::where('admin_id', auth()->user()->admin_id)->where('created_at', $day);
        $lead_week = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->get();
        $lead_month = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->get();
        $lead_all = Lead::where('admin_id', auth()->user()->admin_id)->get();
        $omset_day = Inputer::where('admin_id', auth()->user()->admin_id)->where('created_at', $day)->sum('total_price');
        $omset_week = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('total_price');
        $omset_month = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('total_price');
        $omset_all = Inputer::where('admin_id', auth()->user()->admin_id)->get();
        $products = Product::all();
        $day = Carbon::now()->format('Y-m-d');
        $user_expired = auth()->user()->expired_at;
        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
        else{
            if($request){
                $users = User::where('admin_id', auth()->user()->admin_id)->where('name', 'like', '%'.$request->search.'%')->get();
            }else{
                $users = User::where('admin_id', auth()->user()->admin_id)->get();
            }
            $x = auth()->user();
            if($x->role_id == 4){
                $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
                $roles = Role::all();
                $icons = Icon::all();
                $products = Product::where('admin_id', auth()->user()->admin_id)->get();
                if($request->date_filter){
                    $day = Carbon::parse($request->date_filter)->format('Y-m-d');
                } else {
                    $day = Carbon::now()->format('Y-m-d');
                }
                $leads = DB::table('leads as l')
                    ->join('operators as o', 'l.operator_id', '=', 'o.id')
                    ->join('products as p', 'l.product_id', '=', 'p.id' )
                    ->join('statuses as s', 'l.status_id', '=', 's.id')
                    ->join('clients as c', 'l.client_id', '=', 'c.id')
                    ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
                    ->select('l.id as id', 'advertiser', 'c.name as client_name', 'c.whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.updated_at as client_updated_at', 'c.created_at as client_created_at')
                    ->where('l.admin_id', auth()->user()->admin_id)
                    ->where('l.advertiser', $x->name)
                    ->where('l.updated_at', $day)
                    ->orderByDesc('l.id')
                    ->paginate(5);
                $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
                $total_lead = DB::table('products')->where('admin_id', auth()->user()->admin_id)->pluck('lead');
                return view('adv',['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
                ->with('products', $products)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_jan', $lead_jan)->with('lead_feb', $lead_feb)->with('lead_mar', $lead_mar)->with('lead_apr', $lead_apr)->with('lead_may', $lead_may)->with('lead_jun', $lead_jun)
                ->with('lead_jul', $lead_jul)->with('lead_aug', $lead_aug)->with('lead_sep', $lead_sep)->with('lead_okt', $lead_okt)->with('lead_nov', $lead_nov)->with('lead_des', $lead_des)
                ->with('closing_jan', $closing_jan)->with('closing_feb', $closing_feb)->with('closing_mar', $closing_mar)->with('closing_apr', $closing_apr)->with('closing_may', $closing_may)->with('closing_jun', $closing_jun)
                ->with('closing_jul', $closing_jul)->with('closing_aug', $closing_aug)->with('closing_sep', $closing_sep)->with('closing_okt', $closing_okt)->with('closing_nov', $closing_nov)->with('closing_des', $closing_des);
            }else{
                return Redirect::back();
            }
        }
    }

    public function WeeklyADV() {
        return view('Weeklyadv');
    }
    public function MonthlyADV() {
        return view('Monthlyadv');
    }

    public function cs(Request $request){
        $day = Carbon::now()->format('Y-m-d');
        $user_expired = auth()->user()->expired_at;
        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
        else{
            if($request){
                $users = User::where('admin_id', auth()->user()->admin_id)->where('name', 'like', '%'.$request->search.'%')->get();
            }else{
                $users = User::where('admin_id', auth()->user()->admin_id)->get();
            }
            $x = auth()->user();
            $operator = Operator::where('user_id', $x->id)->value('user_id');
            if($x->role_id == 5){
                $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
                $roles = Role::all();
                $icons = Icon::all();
                $products = Product::where('admin_id', auth()->user()->admin_id)->get();
                if($request->date_filter){
                    $day = Carbon::parse($request->date_filter)->format('Y-m-d');
                } else {
                    $day = Carbon::now()->format('Y-m-d');
                }
                $leads = DB::table('leads as l')
                    ->join('operators as o', 'l.operator_id', '=', 'o.id')
                    ->join('products as p', 'l.product_id', '=', 'p.id' )
                    ->join('statuses as s', 'l.status_id', '=', 's.id')
                    ->join('clients as c', 'l.client_id', '=', 'c.id')
                    ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
                    ->select('l.id as id', 'advertiser', 'c.name as client_name', 'c.whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.updated_at as client_updated_at', 'c.created_at as client_created_at')
                    ->where('l.admin_id', auth()->user()->admin_id)
                    ->where('l.user_id', $operator)
                    ->where('l.updated_at', $day)
                    ->orderByDesc('l.id')
                    ->paginate(5);
                $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->where('user_id', auth()->user()->id)->count();
                $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
                $total_lead = DB::table('products')->where('admin_id', auth()->user()->admin_id)->pluck('lead');
                return view('cs',['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
                ->with('products', $products)->with('leads', $leads)->with('lead_count', $lead_count)->with('total_lead', $total_lead)->with('campaigns', $campaigns);
            }else{
                return Redirect::back();
            }
        }
    }

    public function ld() {
        if(auth()->user()->role_id == 1){
            $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
        }else{
            $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->where('user_id', auth()->user()->id)->get();
        }
        $client = Client::where('admin_id', auth()->user()->admin_id)->get();
        $operator = Operator::where('admin_id', auth()->user()->admin_id)->get();
        $day = Carbon::now()->format('Y-m-d');
        // $lead = DB::table('leads as l')
        //     ->join('operators as o', 'l.operator_id', '=', 'o.id')
        //     ->join('products as p', 'l.product_id', '=', 'p.id' )
        //     ->join('statuses as s', 'l.status_id', '=', 's.id')
        //     ->join('clients as c', 'l.client_id', '=', 'c.id')
        //     ->join('campaigns as cp', 'l.campaign_id', '=', 'cp.id')
        //     ->select('l.id as id', 'advertiser', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.name as client_name', 'c.whatsapp as client_wa', 'c.created_at as client_created_at', 'c.updated_at as client_updated_at', 'cp.cs_to_customer as cs_to_customer', 'cp.id as campaign_id')
        //     ->where('c.updated_at', $day);
        //$lead = Lead::where('updated_at', $day)->orderByDesc('id')->get();
        $lead = Lead::where('admin_id', auth()->user()->admin_id)->orderByDesc('id')->get();

        return view('DetailLead')->with('campaign', $campaigns)->with('client', $client)->with('operator', $operator)->with('lead', $lead);
    }

    public function WeeklyDashboard(Request $request) {
        $day = Carbon::now()->format('Y-m-d');
        $user_expired = auth()->user()->expired_at;
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->count();

        //count lead every week
        $lead_week1 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->count();
        $lead_week2 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->count();
        $lead_week3 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->count();
        $lead_week4 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->count();

        //count lead closing every week
        $closing_week1 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->count();
        $closing_week2 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->count();
        $closing_week3 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->count();
        $closing_week4 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->count();

        $quantity = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('quantity');

        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
        else{
            if($request->date_filter){
                $day = Carbon::parse($request->date_filter)->format('Y-m-d');
            } else {
                $day = Carbon::now()->format('Y-m-d');
            }
            $leads = DB::table('leads as l')
            ->join('operators as o', 'l.operator_id', '=', 'o.id')
            ->join('products as p', 'l.product_id', '=', 'p.id' )
            ->join('statuses as s', 'l.status_id', '=', 's.id')
            ->join('clients as c', 'l.client_id', '=', 'c.id')
            ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
            ->select('l.id as id', 'advertiser', 'c.name as client_name', 'c.whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.updated_at as client_updated_at', 'c.created_at as client_created_at')
            ->where('l.admin_id', auth()->user()->admin_id)
            ->where('l.updated_at', $day)
            ->orderByDesc('l.id')
            ->paginate(5);
            //dd($leads);
            $users = User::where('admin_id', auth()->user()->admin_id)->get();
            $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
            if (auth()->user()->admin_id == 1){
                $roles = Role::all();
            }
            else {
                $roles = Role::where('id', '!=', 1)->get();
            }

            $icons = Icon::all();
            $products = Product::where('admin_id', auth()->user()->admin_id)->get();


            $client = Client::where('admin_id', auth()->user()->admin_id)->get();
            $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
            $total_lead = DB::table('products')->where('admin_id', auth()->user()->admin_id)->pluck('lead');
            $inputer = Inputer::where('admin_id', auth()->user()->admin_id);
            // dd($leads);

            // $now = DB::table('leads')->value('created_at');
            // $countdown = Countdown::from($now)
            //      ->to($now->copy()->addYears(5))
            //      ->get()->toHuman('{days} days, {hours} hours and {minutes} minutes');

            $x = auth()->user();
            if($x->admin_id == 1){
                return redirect(route('superadmin.index'));
            }
            else if($x->role_id == 2){
                return redirect(route('ceo'));
            }
            else if($x->role_id == 3){
                return redirect(route('manager'));
            }
            else if($x->role_id == 4){
                return redirect(route('advDashboard'));
            }
            else if($x->role_id == 5){
                return redirect(route('csDashboard'));
            }
            else if($x->role_id == 9){
                return redirect(route('finance'));
            }
            else if($x->role_id == 10){
                return redirect(route('inputer'));
            }else if($x->role_id == 11){
                return redirect(route('HumanResource.index'));
            }
            else{

                return view('WeeklyDashboard', compact('users'),['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
                ->with('products', $products)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('client', $client)->with('day', $day)
                ->with('inputer', $inputer)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_week1', $lead_week1)->with('lead_week2', $lead_week2)->with('lead_week3', $lead_week3)->with('lead_week4', $lead_week4)
                ->with('closing_week1', $closing_week1)->with('closing_week2', $closing_week2)->with('closing_week3', $closing_week3)->with('closing_week4', $closing_week4);
                // ->with('countdown', $countdown);
            }
        }
    }
    public function MonthlyDashboard(Request $request) {
        $day = Carbon::now()->format('Y-m-d');
        $user_expired = auth()->user()->expired_at;
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->count();

        //count lead every month
        $lead_jan = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->count();
        $lead_feb = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->count();
        $lead_mar = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->count();
        $lead_apr = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->count();
        $lead_may = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->count();
        $lead_jun = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->count();
        $lead_jul = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->count();
        $lead_aug = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->count();
        $lead_sep = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->count();
        $lead_okt = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->count();
        $lead_nov = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->count();
        $lead_des = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->count();

        //count lead closing every month
        $closing_jan = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->count();
        $closing_feb = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->count();
        $closing_mar = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->count();
        $closing_apr = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->count();
        $closing_may = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->count();
        $closing_jun = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->count();
        $closing_jul = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->count();
        $closing_aug = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->count();
        $closing_sep = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->count();
        $closing_okt = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->count();
        $closing_nov = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->count();
        $closing_des = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->count();

        $quantity = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->sum('quantity');

        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
        else{
            if($request->date_filter){
                $day = Carbon::parse($request->date_filter)->format('Y-m-d');
            } else {
                $day = Carbon::now()->format('Y-m-d');
            }
            $leads = DB::table('leads as l')
            ->join('operators as o', 'l.operator_id', '=', 'o.id')
            ->join('products as p', 'l.product_id', '=', 'p.id' )
            ->join('statuses as s', 'l.status_id', '=', 's.id')
            ->join('clients as c', 'l.client_id', '=', 'c.id')
            ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
            ->select('l.id as id', 'advertiser', 'c.name as client_name', 'c.whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.updated_at as client_updated_at', 'c.created_at as client_created_at')
            ->where('l.admin_id', auth()->user()->admin_id)
            ->where('l.updated_at', $day)
            ->orderByDesc('l.id')
            ->paginate(5);
            //dd($leads);
            $users = User::where('admin_id', auth()->user()->admin_id)->get();
            $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
            if (auth()->user()->admin_id == 1){
                $roles = Role::all();
            }
            else {
                $roles = Role::where('id', '!=', 1)->get();
            }

            $icons = Icon::all();
            $products = Product::where('admin_id', auth()->user()->admin_id)->get();


            $client = Client::where('admin_id', auth()->user()->admin_id)->get();
            $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
            $total_lead = DB::table('products')->where('admin_id', auth()->user()->admin_id)->pluck('lead');
            $inputer = Inputer::where('admin_id', auth()->user()->admin_id);
            // dd($leads);

            // $now = DB::table('leads')->value('created_at');
            // $countdown = Countdown::from($now)
            //      ->to($now->copy()->addYears(5))
            //      ->get()->toHuman('{days} days, {hours} hours and {minutes} minutes');

            $x = auth()->user();
            if($x->admin_id == 1){
                return redirect(route('superadmin.index'));
            }
            else if($x->role_id == 2){
                return redirect(route('ceo'));
            }
            else if($x->role_id == 3){
                return redirect(route('manager'));
            }
            else if($x->role_id == 4){
                return redirect(route('advDashboard'));
            }
            else if($x->role_id == 5){
                return redirect(route('csDashboard'));
            }
            else if($x->role_id == 9){
                return redirect(route('finance'));
            }
            else if($x->role_id == 10){
                return redirect(route('inputer'));
            }else if($x->role_id == 11){
                return redirect(route('HumanResource.index'));
            }
            else{
                return view('MonthlyDashboard', compact('users'),['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
                ->with('products', $products)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('client', $client)->with('day', $day)
                ->with('inputer', $inputer)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_jan', $lead_jan)->with('lead_feb', $lead_feb)->with('lead_mar', $lead_mar)->with('lead_apr', $lead_apr)->with('lead_may', $lead_may)->with('lead_jun', $lead_jun)
                ->with('lead_jul', $lead_jul)->with('lead_aug', $lead_aug)->with('lead_sep', $lead_sep)->with('lead_okt', $lead_okt)->with('lead_nov', $lead_nov)->with('lead_des', $lead_des)
                ->with('closing_jan', $closing_jan)->with('closing_feb', $closing_feb)->with('closing_mar', $closing_mar)->with('closing_apr', $closing_apr)->with('closing_may', $closing_may)->with('closing_jun', $closing_jun)
                ->with('closing_jul', $closing_jul)->with('closing_aug', $closing_aug)->with('closing_sep', $closing_sep)->with('closing_okt', $closing_okt)->with('closing_nov', $closing_nov)->with('closing_des', $closing_des);
                // ->with('countdown', $countdown);
            }
        }
    }

    public function Evaluation() {
        $products = Product::where('admin_id', auth()->user()->admin_id)->get();
        if(auth()->user()->role_id==4){
            return view('evaluationADV')->with('product', $products);
        }elseif (auth()->user()->role_id==5){
            return view('evaluationCS')->with('product', $products);
        }elseif (auth()->user()->role_id==1){
            return view('evaluation')->with('product', $products);
        }else {
            return redirect()->back();
        }
    }
}
