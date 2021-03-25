<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class URL
{
    public static function linkCategory($category)
    {
        return route('category/index', [
            'category_id'   => $category->id,
            'category_name' => Str::slug($category->name)
        ]);

    }

    public static function linkArticle($article)
    {
        return route('article/index', [
            'article_id'   => $article->id,
            'article_name' => Str::slug($article->name)
        ]);

    }
    public static function linkProduct($product)
    {
        return route('product/detail', [
            'product_id'   => $product->id,
            'product_name' => Str::slug($product->name)
        ]);

    }
    
}