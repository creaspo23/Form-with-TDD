<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];

    public function path()
    {
        return "/threads/{$this->channel->slug}/{$this->id}";
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addReply($reply)
    {
        return $this->replies()->create($reply);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function scopeFilters($query, $filters)
    {
        return $filters->apply($query);
    }
}
