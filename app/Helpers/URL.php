<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class URL
{
    public static function linkCategory($category)
    {
        return route('category/list', [
            'category_id'   => $category->id,
            'category_slug' => $category->slug
        ]);

    }

    public static function linkArticle($article)
    {
        return route('article/index', [
            'article_id'   => $article->id,
            'article_slug' => $article->slug
        ]);

    }

    public static function linkProduct($product_id, $product_name)
    {
        return route('product/index', [
            'product_id'   => $product_id,
            'product_name' => $product_name
        ]);

    }
    
    public static function linkModal($product_id)
    {
        return route('product/modal', [
            'id'   => $product_id
        ]);

    }

}