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
        $data = DB::table('inputers as i')
            ->where('i.admin_id', auth()->user()->admin_id)
            ->whereBetween('i.updated_at',[ $this->from_date,$this->to_date])
            // ->where('l.updated_at', $day)
            ->orderByDesc('i.id');


        return $data;
    }
    
    public function headings(): array
    {
        return [
            
        ];
    }
}
