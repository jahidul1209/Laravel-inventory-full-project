<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
         'name', 'email', 'phone', 'nid_no' 'address','experience','photo','salary','vacation','city'
    ];
}
