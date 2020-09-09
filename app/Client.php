<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function installments()
    {
        return $this->hasMany('App\Installment');
    }
}
