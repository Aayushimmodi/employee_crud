<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'emp_firstname',
        'emp_lastname',
        'emp_mobile',
        'emp_email',
        'emp_dob',
        'emp_joining'
    ];
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (!$model->custom_id) {  // Check if custom_id is not already set
                // Generate the next custom ID
                $lastId = static::orderBy('id', 'desc')->first();
                $lastNumber = $lastId ? $lastId->id : 0;
                $nextCustomId = 'EE-' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
                $model->custom_id = $nextCustomId;  // Assign the new custom ID
            }
        });
    }


}
