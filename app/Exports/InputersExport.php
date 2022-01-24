<?php

namespace App\Exports;

use App\Models\Inputer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InputersExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    
    protected $from_date;
    protected $to_date;
    function __construct($from_date,$to_date) {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }
    public function query()
    {
        $data = DB::table('inputers')
            ->where('admin_id', auth()->user()->admin_id)
            ->whereBetween('updated_at',[ $this->from_date,$this->to_date])
            // ->where('l.updated_at', $day)
            ->select('adv_name', 'operator_name', 'customer_name', 'customer_number', 'customer_address', 'product_name', 'product_price', 'product_weight', 'quantity', 'promotion_price', 'total_price', 'courier', 'shipping_price', 'payment_method', 'total_payment', 'updated_at')
            ->orderByDesc('id');


        return $data;
    }
    
    public function headings(): array
    {
        return [
            'ADV Name',
            'CS Name',
            'Customer Name',
            'Customer WA',
            'Address',
            'Product',
            'Price',
            'Weight',
            'Qty',
            'promotion',
            'Total Price',
            'Courier',
            'Shipping Price',
            'Payment Method',
            'Total Payment',
            'Date/Time'
        ];
    }
}
