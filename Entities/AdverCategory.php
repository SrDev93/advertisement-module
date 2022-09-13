<?php

namespace Modules\Advertisement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdverCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected static function newFactory()
    {
        return \Modules\Advertisement\Database\factories\AdverCategoryFactory::new();
    }

    public function parent()
    {
        return $this->hasOne(AdverCategory::class, 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(AdverCategory::class, 'parent_id')->with('children')->orderBy('sort_id', 'ASC');
    }
}
