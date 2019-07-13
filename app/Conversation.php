<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{

    protected $fillable = ['user_1', 'user_2'];
    protected $appends = ['username_1', 'username_2'];

    public function getUsername1Attribute(){
        return User::find($this->user_1)->username;
    }

    public function getUsername2Attribute(){
        return User::find($this->user_2)->username;
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

}
