<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['name','description'];


    protected $appends = ['image_path','profit_percent'];
    public function getImagePAthAttribute(){
        return asset('uploads/product_images/'.$this->image);
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }
    // public function getProfitPersentAttribute()
    // {
    //     $profit = $this->sale_price - $this->purchase_price;
    //     $profit_percent = $profit * 100 / $this->purchase_price;
    //     return $profit_percent;
    // }
    public function getProfitPercentAttribute(){
        $profit = $this->sale_price - $this->purchase_price; //المكسب

        $profit_percent = $profit * 100 / $this->purchase_price;  //نسبه المكسب
        // return $profit_percent;
        // }
        return round($profit_percent,2);
    }


}
