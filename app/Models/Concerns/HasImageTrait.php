<?php

namespace App\Models\Concerns;

use App\Models\User;

trait HasImageTrait
{

    public static function boot()
    {
        // 如果存在的话，删除关联图片
        static::deleting(function ($model) {
            $model->image->delete();
        });
    }

    public static function bootHasImage()
    {

        static::deleting(function($model) {
            $model->image->delete();
        });
    }


    public function image()
    {
        return $this->belongTo(Image::class,'image_id');
    }
}
