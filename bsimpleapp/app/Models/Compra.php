<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = ['proveedor_id', 'user_id', 'producto_id', 'cantidad', 'preciototal'];

    public function proveedores()
    {
        return $this->hasOne('App\Models\Proveedor', 'id', 'proveedor_id');
    }

    public function productos()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'producto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
}
