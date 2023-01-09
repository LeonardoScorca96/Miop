<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'Title',
        'Subtitle',
        'Mony',
        'Amount',
        'id',
        'User_id'
    ];
    public function user($id){
        return $this->belongsTo(User::class);
        
    }

}
