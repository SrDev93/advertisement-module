<?php

namespace Modules\Advertisement\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\IrCity\Entities\ProvinceCity;

class Advertisement extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected static function newFactory()
    {
        return \Modules\Advertisement\Database\factories\AdvertisementFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(AdverCategory::class, 'category_id');
    }

    public function province()
    {
        return $this->belongsTo(ProvinceCity::class, 'province_id');
    }

    public function city()
    {
        return $this->belongsTo(ProvinceCity::class, 'city_id');
    }
}
