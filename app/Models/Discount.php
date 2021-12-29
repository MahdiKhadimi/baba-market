<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    protected $fillable = [
        'title',
        'percent',
        'image',
        'started_at',
        'end_at'
    ];


    /*
     |------------------------------
     | Relations
     |------------------------------
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}