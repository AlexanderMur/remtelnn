<?php

namespace App\Traits;
trait Sortable
{
    public static function bootSortable()
    {
        static::creating(function ($model) {
            $model->order = $model->newQuery()->max('order') + 1;
        });
    }
}