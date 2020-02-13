<?php

namespace App\Controllers;

use App\Models\Breadcrumbs;
use App\Models\Product;
use FW\App;
use RedBeanPHP\R;

class ProductsController extends BaseController
{
    public function show()
    {
        $slug = $this->route['slug'];
        $product = R::findOne('products', 'slug = ? AND status = 1', [$slug]);
        $brand = R::findOne('brands', 'id = ?', [$product->brand_id]);
        $related = R::getAll(
            "SELECT * FROM related_products 
            JOIN products 
            ON products.id = related_products.related_id 
            WHERE related_products.product_id = ?", [$product->id]
        );
        $tops = R::findAll('products', 'is_top = 1');
        $images = R::findAll('product_images', 'product_id = ?', [$product->id]);
        $currency = $this->currency;
        $categories = App::$app->getProperty('categories');

        // недавно просмотренныые товары
        $pModel = new Product();
        $pModel->setRecentlyViewed($product->id);
        $rViewed = $pModel->getRecentlyViewed(6);
        $recentlyViewed = null;
        if ($rViewed) {
            $recentlyViewed = R::find('products', "id IN (" . R::genSlots($rViewed) . ") LIMIT 6", $rViewed);
        }

        $mods = R::findAll('modifications', 'product_id = ?', [$product->id]);

        // breadcrumbs
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, $product->title);

        // установить мета данные
        $this->setMeta($product->title, $product->description, $product->keywords);
        // передать данные в представление
        $this->setData(compact(
            'product', 
            'currency', 
            'categories',
            'brand',
            'related', 
            'images', 
            'recentlyViewed', 
            'tops',
            'mods',
            'breadcrumbs'
        ));
    }
}