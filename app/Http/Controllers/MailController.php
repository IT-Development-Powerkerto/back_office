<?php

namespace App\Http\Controllers;

use App\Mail\AdminMail;
use App\Mail\NotificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{
    public function index($email, $number, $text, $thanks, $product, $client, $client_number, $FU_text, $operator)
    {
        $details = [
            'title' => 'New Order',
            'product' => $product,
            'client' => $client,
            'client_number' => $client_number,
            'FU_text' => $FU_text,
            'operator' => $operator
        ];
        // Mail::to('habibalihabsyi123@gmail.com')->send(new NotificationMail($details));
        Mail::to($email)->send(new NotificationMail($details));
        return Redirect::away('http://orderku.site/'.$number.'/'.$text.'/'.$thanks);
        // dd("Email sudah terkirim.");
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
}
