<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
     * The table associated with the model
     *
     *
     * @var string
     */
    protected $table = "organization";


    /**
     *
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
