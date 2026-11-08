<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tagihan extends Model
{
    protected $table = 'tagihans';
    protected $fillable = [
        'pencatatan_meter_id',
        'warga_id',
        'nomor_tagihan',
        'total_tagihan',
        'status_pembayaran',
        'tanggal_tenggat',
        'tanggal_bayar'
    ];
 
    public function warga(): BelongsTo
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }
 
    public function pencatatanMeter(): BelongsTo
    {
        return $this->belongsTo(PencatatanMeter::class, 'pencatatan_meter_id');
    }

}
