<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
        'title', 'content','user_id'
    ];

    public function user(){
        //일대다 관계에서 one쪽은 단수
        return $this->belongsTo(User::class);
    }
}
