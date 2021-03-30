<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class URL
{
    public static function linkCategory($category)
    {
        return route('category/list', [
            'category_slug' => $category->slug,

        ]);

    }

    public static function linkArticle($article)
    {
        return route('article/index', [
            'article_slug' => $article->slug
        ]);

    }

    public static function linkProduct($product)
    {
        return route('product/index', [
            'product_slug'   => $product['slug'],

        ]);

    }
    
    public static function linkModal($product_id)
    {
        return route('product/modal', [
            'id'   => $product_id
        ]);

    }

}