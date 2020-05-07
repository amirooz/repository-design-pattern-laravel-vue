<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Eloquent\Updater;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class Division extends Model
{
    use Updater;
    use SoftDeletes;
    use HasApiTokens;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

}
