<?php

namespace loo;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    //
    public function user() {
        return $this->belongsTo(User::class);

    }

    public function profileImage() {
        return '/storage/' . ($this->image ? $this->image : 'profile/ETteu4pZuuNyF2LUpSciCKtCv9xK7dGy0YjKrFEi.jpeg');
    }

    public function followers() {
        return $this->belongsToMany(User::class);
    }
}
