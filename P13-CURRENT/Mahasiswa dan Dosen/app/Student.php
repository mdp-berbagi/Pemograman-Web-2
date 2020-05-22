<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Student extends Model
{
    protected $fillable = ["name", "birthday", "gender", "start_study", "major_id", "register_id"];

    /**
     * Mendapatkan NPM
     *
     * Ini tidak optimal, harusnya NPM di simpan di
     * database dan buat mutation
     *
     * Mutation yang dibuat harusnya :
     * mayor_id, start_study dan id_reg
     *
     * biar update npm klo antar 3 itu berubah
     *
     * @return string
     */
    function getNpmAttribute(): string
    {
        $start = substr(Carbon::parse($this->start_study)->year, 2, 2);
        $finish = $start + 4;
        $mayor = $this->major_id;
        $id_reg = sprintf("%04d", $this->register_id);

        return "{$start}{$finish}{$mayor}{$id_reg}";
    }

    /**
     * Dapetin gender
     *
     * @param int $gender_code
     *
     * @return string
     */
    function getGenderAttribute(int $gender_code): string
    {
        return $gender_code == 1 ? "Wanita" : "Pria";
    }

    /**
     * membuat gender
     * gendernya bisa 0 / 1 / wanita / pria
     *
     * @param string $new_gender
     *
     * @return void
     */
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
