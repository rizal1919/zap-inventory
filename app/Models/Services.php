<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function items(){
        return $this->belongsTo(Items::class, 'item_id', 'id');
    }

}
