<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 *
 * @property $id
 * @property $id_user
 * @property $id_client
 * @property $date
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @property Client $client
 * @property InvoiceDetail[] $invoiceDetails
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Invoice extends Model
{
    
    static $rules = [
		'id_user' => 'required',
		'id_client' => 'required',
		'date' => 'required',
		'total' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_user','id_client','date','total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne('App\Models\Client', 'id', 'id_client');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceDetails()
    {
        return $this->hasMany('App\Models\InvoiceDetail', 'id_invoice', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
    

}
