<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class PencatatanMeter extends Model
{
    protected $table = 'pencatatan_meters';
    protected $fillable = ['warga_id', 'bulan_tahun', 'meter_awal', 'meter_akhir', 'total_pemakaian', 'tanggal_catat'];
 
    public function warga(): BelongsTo
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }
 
    public function tagihan(): HasOne
    {
        return $this->hasOne(Tagihan::class, 'pencatatan_meter_id');
    }

}
