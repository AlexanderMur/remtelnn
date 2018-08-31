<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Breaking
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Breaking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Breaking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Breaking whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Breaking whereUpdatedAt($value)
 */
class Breaking extends Model
{
    public $fillable = ['name'];

    function parse_price($kind){
        $price = $this->pivot->{$kind.'_price'};
        if($this->is_additional_window()){
            $prices = explode('|',$price);
            if(empty($prices[0]) || !is_numeric($prices[0])){
                $prices[0] = 'none';
            }
            if(empty($prices[1]) || !is_numeric($prices[0])){
                $prices[1] = 'none';
            }
            return $prices;
        }
        if(!is_numeric($price)){
            return 'none';
        }
        return $price;
    }
    function is_additional_window(){
        return strpos($this->pivot->min_price,'|') || strpos($this->pivot->max_price,'|');
    }
}
