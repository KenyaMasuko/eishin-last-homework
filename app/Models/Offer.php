<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

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
