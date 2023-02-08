<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function accounts()
    {
        return $this->hasMany(Company::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}
