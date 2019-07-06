<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class d_seller extends Model
{
    protected $table = 'd_seller';
    public $timestamps = false;
    protected $primaryKey = 'ipr_id';

    public function item(){
    	return $this->belongsTo('App\m_item', 'sell_ciproduct','i_code');
    }
}
