<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;
    /**
     * 複数代入しない属性
     *
     * @var array
     */
    protected $guarded = ['id']; //複数代入しない属性を指定

    public function company()
    {
        return $this->hasMany(Company::class);
    }
}
