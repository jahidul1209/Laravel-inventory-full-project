<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
        protected $fillable = [
         'name', 'email', 'phone', 'nid_no' 'account_no','address','city','photo',
    ];
}

