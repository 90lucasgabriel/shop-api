<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        factory(Category::class, 10)->create()->each(
        	function($c){
        		//Create 5 products for each category
	            for($i=0; $i<5; $i++){

	            	//return product created
	                $p = $c->products()->save(
	                	factory(Product::class)->make()
            		);

	                //Create 4 images url for each product
	        		for($j=0; $j<4; $j++){
            			$p->productImage()->save(factory(ProductImage::class)->make());
            		}
	            }
        	}
    	);
    }
}