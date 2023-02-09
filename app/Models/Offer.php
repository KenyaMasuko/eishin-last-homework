<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function candidate($user_id): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'offer_user')
            ->withPivot('user_id')
            ->wherePivot('user_id', $user_id);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class)->withPivot(['feature_id']);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function companyInfo()
    {
        return $this->belongsTo(CompanyInfo::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}
