<?php

namespace App\Models;

use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Device
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Breaking[] $breakings
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Device whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Device whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Device whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Device whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Device whereUpdatedAt($value)
 */
class Device extends Model
{
    use Sortable;
    public $fillable = ['name','category_id','subcategories','order'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function breakings() {

        return $this->belongsToMany(Breaking::class)->withPivot(
            'min_price',
            'max_price',
            'info_time',
            'info_guarantee',
            'info_custom'
            );

    }

    public function getCategoryName() {

        $cat = Category::findOrFail($this->category_id);
        return $cat->name;
    }
    //
}
