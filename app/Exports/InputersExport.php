<?php

namespace App\Exports;

use App\Models\Inputer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class InputersExport implements WithHeadings, FromCollection, WithColumnFormatting, WithColumnWidths
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
    
    // public function query()
    // {
    //     $data = DB::table('inputers')
    //         ->where('admin_id', auth()->user()->admin_id)
    //         ->whereBetween('updated_at',[ $this->from_date,$this->to_date])
    //         // ->where('l.updated_at', $day)
    //         ->select('adv_name', 'operator_name', 'customer_name', 'customer_number', 'customer_address', 'product_name', 'product_price', 'product_weight', 'quantity', 'product_promotion', 'total_price', 'courier', 'shipping_price', 'shipping_promotion','payment_method', 'total_payment', 'updated_at')
    //         ->orderByDesc('id');
        
    //     return $data;
    // }
    public function collection()
    {
        $data = DB::table('inputers')
            ->where('admin_id', auth()->user()->admin_id)
            ->whereBetween('updated_at',[ $this->from_date,$this->to_date])
            // ->where('l.updated_at', $day)
            ->select('lead_id','adv_name', 'operator_name', 'customer_name', 'customer_number', 'customer_address', 'product_name', 'product_price', 'product_weight', 'quantity', 'product_promotion', 'total_price', 'courier', 'shipping_price', 'shipping_promotion','payment_method', 'total_payment', 'updated_at')
            ->get();
        // return $data;
        // dd($data);
        $dataInputer[] = array();
        foreach($data as $data){
            $dataInputer[] = array(
                'Order ID' => $data->lead_id,
                'ADV Name' => $data->adv_name,
                'CS Name' => $data->operator_name,
                'Customer Name' => $data->customer_name,
                'Customer WA' => $data->customer_number,
                'Address' => $data->customer_address,
                'Product' => $data->product_name,
                'Price' => $data->product_price,
                'Weight' => $data->product_weight,
                'Qty' => $data->quantity,
                'Product Promotion' => $data->product_promotion,
                'Total Price' => $data->total_price,
                'Courier' => $data->courier,
                'Shipping Price' => $data->shipping_price,
                'Shipping Promotion' => $data->shipping_promotion,
                'Payment Method' => $data->payment_method,
                'Total Payment' => $data->total_payment,
                'Date/Time' => date('d-m-Y', strtotime($data->updated_at)),
                'Shipping Instruction' => $data->product_name.' '.$data->quantity.' '.$data->operator_name
            );
        }
        // return $data;
        // dd($data);
        return collect($dataInputer);
    }
    
    public function headings(): array
    {
        return [
            'Order ID',
            'ADV Name',
            'CS Name',
            'Customer Name',
            'Customer WA',
            'Address',
            'Product',
            'Price',
            'Weight',
            'Qty',
            'Product Promotion',
            'Total Price',
            'Courier',
            'Shipping Price',
            'Shipping Promotion',
            'Payment Method',
            'Total Payment',
            'Date Closing',
            'Shipping Instruction'
        ];
    }
    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_NUMBER,
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 9,
            'B' => 15,            
            'C' => 15,            
            'D' => 15,            
            'E' => 15,            
            'F' => 20,            
            'G' => 9,            
            'H' => 9,            
            'I' => 9,            
            'J' => 9,            
            'K' => 18,            
            'L' => 10,            
            'M' => 9,            
            'N' => 13,            
            'O' => 19,            
            'P' => 16,            
            'Q' => 14,            
            'R' => 14,            
            'S' => 25,            
        ];
    }
}
