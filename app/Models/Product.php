<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function Subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcat_id');
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function Color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function Unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function Size()
    {
        return $this->belongsTo(Size::class);
    }

    public static function catProductCount($cat_id)
    {
        $catCount = Product::where('cat_id', $cat_id)->count();
        return $catCount;
    }
    public static function subcatProductCount($subcat_id)
    {
        $subcatCount = Product::where('subcat_id', $subcat_id)->count();
        return $subcatCount;
    }
    public static function brandProductCount($brand_id)
    {
        $brandCount = Product::where('brand_id', $brand_id)->where('status', 1)->count();
        return $brandCount;
    }
}
