<?php

namespace App\Controllers;

use RedBeanPHP\R;

class MainController extends BaseController
{
    public function index()
    {
        $currency = $this->currency;
        $brands = R::findAll('brands');
        $new_products = R::find('products', 'status = 1 AND is_new = 1');
        $bestsellers = R::find('products', 'status = 1 AND is_bestseller = 1');
        $featured = R::find('products', 'status = 1 AND is_featured = 1');
        $deals = R::find('products', 'status = 1 AND is_deal_of_week = 1');
        
        $this->setMeta('Главная');
        $this->setData(compact('brands', 'new_products', 'bestsellers', 'featured', 'deals', 'currency'));
    }
}


//for ($i = 1; $i <= 200; $i++) {
            // brands
            // $brand = R::dispense('brands');
            // $title = "Brand {$i}";
            // $brand->title = $title;
            // $brand->slug = str_slug($title);
            // $brand->image = 'brand' . $i . '.png';
            // $brand->description = "Some description brand #{$i}";
            // $id = R::store( $brand );

            // categories
            // $category = R::dispense('categories');
            // $title = "Категория #{$i}";
            // if ($i == 0) {
            //     $title = "Без категории";
            // }
            // $category->title = $title;
            // $category->slug = str_slug($title, ['transliterate' => true]);
            
            // if ($i <= 4 && $i != 0) {
            //     $category->parent_id = 1;
            // } elseif($i != 0) {
            //     $category->parent_id = rand(2, 5);
            // }
            // $category->keywords = "категория #{$i}";
            // $category->description = "Описание для категории #{$i}";
            // $id = R::store( $category );

            // products
            // $product = R::dispense('products');
            // $product->category_id = rand(6, 20);
            // $product->brand_id = rand(1, 9);
            // $title = "Продукт #{$i}";
            // $product->title = $title;
            // $product->slug = str_slug($title, ['transliterate' => true]);
            // $product->content = str_rand(100);
            // $price = rand(10.00, 999.00);
            // $product->price = $price;
            // if ($i % rand(1, 5) == 0) {
            //     $product->old_price = $price + rand(10.00, 500.00);
            // }
            // $product->keywords = "продукт #{$i}";
            // $product->description = str_rand(10);
            // $product->image = "product" . rand(1, 10) . '.jpg';
            // $product->rating = rand(1, 5);
            // $product->is_top = (rand(1, 8) % 5 == 0) ? 1 : 0;
            // $product->is_featured = (rand(1, 9) % 5 == 0) ? 1 : 0;
            // $product->is_deal_of_week = (rand(1, 12) % 5 == 0) ? 1 : 0;
            // $product->quantity = rand(0, 50);
            // $id = R::store( $product );

            // related_products
            // for ($j = 1; $j <= 5; $j++) {
            //     $related_product = R::dispense('related_products');
            //     $related_product->product_id = $i;
            //     $relatedId = $i;
            //     while ($relatedId == $i) {
            //         $relatedId = rand(1, 200);
            //     }
            //     $related_product->related_id = $relatedId;
            //     $id = R::store( $related_product );
            // }

            // modifications
            // for ($j = 1; $j <= rand(2, 4); $j++) {
            //     $modification = R::dispense('modifications');
            //     $modification->product_id = $i;
            //     if ($j == 1) {
            //         $modification->title = 'White';
            //     } elseif ($j == 2) {
            //         $modification->title = 'Black';
            //     } elseif ($j == 3) {
            //         $modification->title = 'Gold';
            //     } else {
            //         $modification->title = 'Onyx';
            //     }
            //     $modification->price = rand(10, 500);
            //     $id = R::store( $modification );
            // }

            // product_images
            // for ($j = 1; $j <= rand(5, 7); $j++) {
            //     $product_image = R::dispense('product_images');
            //     $product_image->product_id = $i;
            //     $product_image->image = 'product' . rand(1, 10) . '.jpg';
            //     $id = R::store( $product_image );
            // }


        //}


        /*
1
4
6
10
13
16
19
23
2
5
7
11
14
17
20
24
        */