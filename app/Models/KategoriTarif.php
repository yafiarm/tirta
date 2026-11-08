<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriTarif extends Model
{
    protected $table = 'kategori_tarifs';
    protected $fillable = ['nama_kategori', 'tarif_per_kubik', 'biaya_pemeliharaan'];
 
    public function warga(): HasMany
    {
        return $this->hasMany(Warga::class, 'kategori_tarif_id');
    }

}
