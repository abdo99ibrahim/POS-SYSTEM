<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = ['product one', 'product two'];
        foreach($products as $product){
            Product::create([
                'category_id'=> 1,
                'ar'=>['name'=>$product,'description'=>$product . 'desc'],
                'en'=>['name'=>$product,'description'=>$product . 'desc'],
                'purchase_price'=>100,
                'sale_price'=>150,
                'stock'=>43,
            ]);
        }
    }
}
