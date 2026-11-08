<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TagihanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nomor_tagihan' => $this->nomor_tagihan,
            'total_tagihan' => $this->total_tagihan,
            'formatted_total' => 'Rp ' . number_format($this->total_tagihan, 0, ',', '.'),
            'status_pembayaran' => $this->status_pembayaran,
            'tanggal_tenggat' => $this->tanggal_tenggat,
            'tanggal_bayar' => $this->tanggal_bayar,
            'warga' => [
                'nomor_rumah' => $this->warga->nomor_rumah ?? null,
                'nama_warga' => $this->warga->nama_warga ?? null,
            ],
            'pemakaian_kubik' => $this->pencatatanMeter->total_pemakaian ?? 0,
        ];

    }
}
