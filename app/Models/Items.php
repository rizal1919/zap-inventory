<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemCategories;


class Items extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function last_edit_user(){
        return $this->hasMany(User::class, 'id', 'last_edited_by_id');
    }

    public function services(){
        return $this->hasMany(User::class, 'id', 'item_id');
    }

    public function categories(){
        return $this->belongsTo(ItemCategories::class, 'category_id', 'id');
    }

    public function statusCode(){
        return $this->belongsTo(StatusCode::class, 'status', 'code_id');
    }

    // public function logActivity(){
    //     return $this->hasMany(LogActivity::class, '')
    // }
}
