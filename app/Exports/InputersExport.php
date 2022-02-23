<?php

namespace App\Exports;

use App\Models\CsInputer;
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
        $cs_id = CsInputer::where('inputer_id', auth()->user()->id)->pluck('cs_id');
        $operator_name = DB::table('users')->whereIn('id', $cs_id)->pluck('name');
        $data = DB::table('inputers')
            ->where('admin_id', auth()->user()->admin_id)
            ->whereBetween('updated_at',[ $this->from_date,$this->to_date])
            ->whereIn('operator_name', $operator_name)
            ->select('lead_id','adv_name', 'operator_name', 'customer_name', 'customer_number', 'customer_address', 'product_name', 'product_price', 'product_weight', 'quantity', 'product_promotion', 'total_price', 'courier', 'shipping_price', 'shipping_promotion','payment_method', 'total_payment', 'updated_at', 'warehouse')
            ->get();
        $dataInputer[] = array();
        foreach($data as $data){
            if($data->warehouse == 'Cilacap'){
                $wh = 'C';
            }else if($data->warehouse == 'Kosambi'){
                $wh = 'K';
            }else if($data->warehouse == 'Tandes.Sby'){
                $wh = 'S';
            }else{
                $wh = 'Not Yet';
            }
            $date = $data->updated_at;
            $year = date('y', strtotime($date));
            $month = date('n', strtotime($date));
            $n = intval($month);
            $res = '';

            $roman_numerals = array(
                'X'  => 10,
                'IX' => 9,
                'V'  => 5,
                'IV' => 4,
                'I'  => 1
            );
            if($data->warehouse == 'Cilacap'){
                $warehouse = 'Cilacap';
            }else if($data->warehouse == 'Kosambi'){
                $warehouse = 'Kosambi';
            }else if($data->warehouse == 'Tandes.Sby'){
                $warehouse = 'Surabaya';
            }else{
                $warehouse = 'Not Yet';
            }

            foreach ($roman_numerals as $roman => $numeral) 
            {
            $matches = intval($n / $numeral);
            $res .= str_repeat($roman, $matches);
            $n = $n % $numeral;
            }
            
            $dataInputer[] = array(
                'Order ID' => $data->lead_id,
                'ADV Name' => $data->adv_name,
                'CS Name' => $data->operator_name,
                'Customer Name' => $data->customer_name,
                'Warehouse' => $warehouse,
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
                'Date/Time' => date('d-m-Y H:i:s', strtotime($data->updated_at)),
                'Shipping Instruction' => $data->product_name.' '.$data->quantity.' '.$data->operator_name,
                'Invoice' => 'PWK.WP.'.$wh.'/'.$year.'/'.$res.'-'.$data->lead_id
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
            'Warehouse',
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
            'Shipping Instruction',
            'Invoice'
        ];
    }
    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_NUMBER,
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
            'F' => 15,            
            'G' => 20,            
            'H' => 9,            
            'I' => 9,            
            'J' => 9,            
            'K' => 9,            
            'L' => 18,            
            'M' => 10,            
            'N' => 9,            
            'O' => 13,            
            'P' => 19,            
            'Q' => 16,            
            'R' => 14,            
            'S' => 14,
            'T' => 25,
            'U' => 20            
        ];
    }
}
