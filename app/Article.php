<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content'];     // MassAssignment 대응

    public function user() {    // one쪽의 관계 정의 : 단수
        return $this->belongsTo(User::class);
        //$this(나, Article)는 user에 속한 것이다
    }

    protected function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
