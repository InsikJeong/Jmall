<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'content','user_id','user_name','article_id'
    ];

    public function user(){
        //일대다 관계에서 one쪽은 단수
        return $this->belongsTo(User::class);
    }

    public function Articles(){
        //일대다 관계에서 one쪽은 단수
        return $this->belongsTo(Articles::class);
    }
}
