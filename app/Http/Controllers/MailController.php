<?php

namespace App\Http\Controllers;

use App\Mail\AdminMail;
use App\Mail\BigFlipMail;
use App\Mail\NotificationMail;
use App\Models\Campaign;
use App\Models\Client;
use App\Models\Operator;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{
    public function index($email, $number, $campaign_id, $product_id, $client_id, $lead_id)
    {
        $FU_text = Campaign::where('id', $campaign_id)->where('deleted_at', null)->value('cs_to_customer');
        $client_name = Client::where('id', $client_id)->where('deleted_at', null)->value('name');
        $client_number = Client::where('id', $client_id)->where('deleted_at', null)->value('whatsapp');
        // dd($clients);
        $user_id = User::where('phone', $number)->where('deleted_at', null)->where('deleted_at', null)->value('id');
        $operator_name = Operator::where('campaign_id', $campaign_id)->where('deleted_at', null)->where('user_id', $user_id)->value('name');
        $text = Campaign::where('id', $campaign_id)->value('customer_to_cs');
        $product_name = Product::where('id', $product_id)->where('deleted_at', null)->value('name');
        $thanks = Campaign::where('id', $campaign_id)->where('deleted_at', null)->value('message');
        $wa_text = 'Kode Order: ord-'.$lead_id.str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($client_name, $client_number, $operator_name, $product_name), $text);
        $details = [
            'title' => 'New Order',
            'product' => $product_name,
            'client' => $client_name,
            'client_number' => $client_number,
            'FU_text' => $FU_text,
            'operator' => $operator_name,
            'lead_id' => $lead_id
        ];
        Mail::to('habibalihabsyi123@gmail.com')->send(new NotificationMail($details));
        // Mail::to($email)->send(new NotificationMail($details));
        return Redirect::away('http://orderku.site/'.$number.'/'.$wa_text.'/'.$thanks);
        // return Redirect::away('http://127.0.0.1:8080/'.$number.'/'.$wa_text.'/'.$thanks);
    }

    public function activation($email)
    {
        $email = $email;
        $details = [
            'title' => 'Selamat Bergabung di Banyumax.id',
            'email' => $email
        ];
        Mail::to($email)->send(new AdminMail($details));
        return redirect('/superadmin');
    }
    public function inquiry(){
        $details = [
            'title' => 'ada inquiry',
        ];
        Mail::to('habibalihabsyi123@gmail.com')->send(new BigFlipMail($details));
    }
}
