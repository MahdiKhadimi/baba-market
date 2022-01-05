<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    
    public const id='id';
    public const c_title='title';
    public const c_slug='slug';
    public const c_image='slug';

    protected $table = 'brands';

  
    protected $fillable = [
        'title',
        'slug',
        'image'
    ];

    /*
     |------------------------------
     | Relation
     |------------------------------
     |
     |
     |
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}