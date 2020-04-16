<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = [];

    public function getFullName() {
        return "{$this->lastname}, {$this->firstname} {$this->middlename}";
    }
}
