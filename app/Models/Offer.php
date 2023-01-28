<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = ['id']; //複数代入しない属性を指定

    public function features()
    {
        return $this->belongsToMany(Feature::class)->withPivot(['feature_id']);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
