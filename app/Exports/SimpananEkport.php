<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SimpananEkport implements FromView
{
    protected $data;
    protected $type;

    public function __construct($data, $type)
    {
        $this->data = $data;
        $this->type = $type;
    }

    public function view(): View
    {
        return view('exports.simpanan-excel', [
            'data' => $this->data,
            'type' => $this->type,
        ]);
    }
}
