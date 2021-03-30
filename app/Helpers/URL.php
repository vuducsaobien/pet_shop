<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class URL
{
    
    public static function linkCategory($category)
    {
        return route('category/index', [
            'category_slug' => $category->slug,
        ]);
    }

    public static function linkArticle($article)
    {
        return route('article/detail', [
            'article_slug' => $article->slug
        ]);

    }

    public static function linkProduct($product)
    {
        return route('product/index', [
            'product_slug' => $product['slug'],
            'product_id'   => $product['id']
        ]);

    }
    
    public static function linkModal($product_id)
    {
        return route('product/modal', [
            'id'   => $product_id
        ]);

    }

}