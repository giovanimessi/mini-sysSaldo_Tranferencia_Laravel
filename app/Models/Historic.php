<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    use HasFactory;

    public $timestamps = "false";

    protected $fillable = ['type','amount','total_before','total_after','user_id_transaction','date','user_id'];
}
