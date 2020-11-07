<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
        'title', 'content','user_id','user_name'
    ];

    public function user(){
        //일대다 관계에서 one쪽은 단수
        return $this->belongsTo(User::class);
    }

    public function Comments(){
        //many쪽 관계라서 복수형
        return $this->hasMany(Comments::class);
        // this(사용자)는 많은  가지고 있다.
    }
}
