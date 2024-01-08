<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusCode extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function items(){
        return $this->hasMany(Items::class, 'status', 'code_id');
    }

    // public function services(){
    //     return $this->hasMany(User::class, 'id', 'item_id');
    // }

    // public function categories(){
    //     return $this->belongsTo(ItemCategories::class, 'category_id', 'id');
    // }

}
