<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The table associated with the model
     *
     *
     * @var string
     */
    protected $table = "employee";


    /**
     *
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'employee_id',
        'email_address',
        'phone',
        'date_of_birth',
        'street1',
        'street2',
        'city',
        'state',
        'zip',
        'salary'
    ];
}
