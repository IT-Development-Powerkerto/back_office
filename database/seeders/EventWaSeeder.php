<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventWaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event_pixel = [
            [
                'admin_id'        => 1,
                'name'        => 'Add Payment Info',
                'event_pixel'  => "fbq('track', 'AddPaymentInfo');",
            ],
            [
                'admin_id'        => 1,
                'name'        => 'Add To Cart',
                'event_pixel'  => "fbq('track', 'AddToCart');",
            ],
            [
                'admin_id'        => 1,
                'name'        => 'Add To Wishlist',
                'event_pixel'  => "fbq('track', 'AddToWishlist');",
            ],
            [
                'admin_id'        => 1,
                'name'        => 'Complete Registration',
                'event_pixel'  => "fbq('track', 'CompleteRegistration');",
            ],
            [
                'admin_id'        => 1,
                'name'        => 'Contack',
                'event_pixel'  => "fbq('track', 'Contact');",
            ],
            [
                'admin_id'        => 1,
                'name'        => 'Customize Product',
                'event_pixel'  => "fbq('track', 'CustomizeProduct');",
            ],
            [
                'admin_id'        => 1,
                'name'        => 'Lead',
                'event_pixel'  => "fbq('track', 'Lead');",
            ],
            [
                'admin_id'        => 1,
                'name'        => 'Purchase',
                'event_pixel'  => "fbq('track', 'Purchase', {value: 0.00, currency: 'IDR'});",
            ],
            [
                'admin_id'        => 1,
                'name'        => 'View Content',
                'event_pixel'  => "fbq('track', 'ViewContent');",
            ],
        ];

        DB::table('event_was')->insert($event_pixel);
    }
}
