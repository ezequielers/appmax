<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'pro_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public function setProPriceAttribute ($value)
    {
        $this->attributes['pro_price'] = trim(
            str_replace(',', '.',
                str_replace('.', '',
                    str_replace('R$', '', $value)
                )
            )
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pro_sku', 'pro_name', 'pro_description', 'pro_price', 'pro_amount', 'pro_status'
    ];
}
