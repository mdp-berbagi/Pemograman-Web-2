<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Student extends Model
{
    /**
     * Mendapatkan NPM
     */
    function getNpmAttribute(): string
    {
        $start = substr(Carbon::parse($this->start_study)->year, 2, 2);
        $finish = $start + 4;
        $mayor = $this->major_id;
        $id_reg = sprintf("%04d", $this->register_id);

        return "{$start}{$finish}{$mayor}{$id_reg}";
    }

    function getGenderAttribute(int $gender_code): string
    {
        return $gender_code == 1 ? "Wanita" : "Pria";
    }

    function setGenderAttribute(string $new_gender)
    {
        $result = [
            '0' => 0,
            '1' => 1,
            'wanita' => 1,
            'pria' => 0
        ];

        $this->attributes['gender'] = (string) $result[strtolower($new_gender)];
    }
}
