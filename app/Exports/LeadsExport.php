<?php

namespace App\Exports;

use App\Models\Lead;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class LeadsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('leads as l')
            ->join('operators as o', 'l.operator_id', '=', 'o.id')
            ->join('products as p', 'l.product_id', '=', 'p.id' )
            ->join('statuses as s', 'l.status_id', '=', 's.id')
            ->join('clients as c', 'l.client_id', '=', 'c.id')
            ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
            ->select('l.id as id', 'advertiser', 'c.name as client_name', 'c.whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.updated_at as client_updated_at', 'c.created_at as client_created_at')
            ->where('l.admin_id', auth()->user()->admin_id)
            // ->where('l.updated_at', $day)
            ->orderByDesc('l.id')
            ->get();
        // return Lead::with();
    }
}
