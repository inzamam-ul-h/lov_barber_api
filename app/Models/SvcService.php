<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SvcService extends Model
{
    use HasFactory;

    use SoftDeletes;
    public $table = 'svc_services';
}