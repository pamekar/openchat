<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cookie;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username'];


    public function getConversationsAttribute()
    {
        $user = Cookie::get('user_id');
        return Conversation::where('user_1', $user)->orWhere('user_2', $user)
            ->with('messages')->get();
    }

    /**
     * Scope a query to only include others users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOthers($query)
    {
        $user = session('user');
        return $query->where('id', '<>', $user->id);
    }
}
