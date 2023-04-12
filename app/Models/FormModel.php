<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormModel extends Model
{
    use HasFactory;

    protected $table = 'form';

    protected $guarded = [];

    protected $hidden = ['id', 'user_id', 'updated_at'];
}
