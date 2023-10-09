<?php

namespace App\Imports;

use App\Models\Recipients;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
class RecipientImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public $campaignId;
    public function model(array $row)
    {
        return new Recipients([
            'name' => $row[0],
            'email' => $row[1],
            'phone_number' => $row[2],
            'address' => $row[3],
            'subscription_status' => $row[4],
            'source' => $row[5],
        ]);
    }
}