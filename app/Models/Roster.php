<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roster extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'name',
        'identity_card_number',
        'description',
        'status'
    ];

    public function Status(){
        return $this->belongsTo(Status::class,'status','id');
    }
}
