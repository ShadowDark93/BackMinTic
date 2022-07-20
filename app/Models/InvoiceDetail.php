<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InvoiceDetail
 *
 * @property $id
 * @property $id_invoice
 * @property $id_product
 * @property $amount
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @property Invoice $invoice
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InvoiceDetail extends Model
{
    
    static $rules = [
		'id_invoice' => 'required',
		'id_product' => 'required',
		'amount' => 'required',
		'total' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_invoice','id_product','amount','total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function invoice()
    {
        return $this->hasOne('App\Models\Invoice', 'id', 'id_invoice');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'id_product');
    }
    

}
