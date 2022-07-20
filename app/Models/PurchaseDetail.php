<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseDetail
 *
 * @property $id
 * @property $id_purchese
 * @property $id_product
 * @property $amount
 * @property $price
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @property Product $product
 * @property Purchase $purchase
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PurchaseDetail extends Model
{
    
    static $rules = [
		'id_purchese' => 'required',
		'id_product' => 'required',
		'amount' => 'required',
		'price' => 'required',
		'total' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_purchese','id_product','amount','price','total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'id_product');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function purchase()
    {
        return $this->hasOne('App\Models\Purchase', 'id', 'id_purchese');
    }
    

}
