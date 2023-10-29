<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Log\Logger;

class ApprovalModel extends Model
{
    use HasFactory;

    const PENGAJUAN_BARU = 'BARU';
    const PENGAJUAN_MODIFIKASI = 'MODIFIKASI';

    protected $table = 'approval';

    protected $fillable = [
        'jenis_pengajuan',
        'no',
        'stock_code',
        'jenis_item',
        'item',
        'json_data',
        'egi',
        'component_code',
        'manufacturer',
        'part_number',
        'recd_part_no',
        'stock_type',
        'penyedia_yang_disarankan',
        'harga_perkiraan',
        'pemakaian_per_tahun',
        'gudang_yang_diperlukan',
        'satuan',
        'dibatasi_untuk',
        'cross_reff',
        'inspeksi_khusus',
        'kritikalitas',
        'berbahaya',
        'catatan_penghapusan',
        'catatan_penghapusan_teks',
        'created_by',
        'setuju'
    ];


    public static function pengajuanBaru(
        $no,
        $stockCode,
        $jenisItem,
        $item,
        $jsonData,
        $egi,
        $component_code,
        $manucaturer,
        $partNumber,
        $recdPartNo,
        $stockType,
        $penyediaYangDisarankan,
        $hargaPerkiraan,
        $pemakaianPerTahun,
        $gudangYangDigunakan,
        $satuan,
        $dibatasiUntuk,
        $crossReff,
        $inspeksiKhusus,
        $kritikalitas,
        $berbahaya
    ) {
        $input = [
            'jenis_pengajuan' => self::PENGAJUAN_BARU,
            'no' => $no,
            'stock_code' => $stockCode,
            'jenis_item' => $jenisItem,
            'item' => $item,
            'json_data' => $jsonData,
            'egi' => $egi,
            'component_code' => $component_code,
            'manufacturer' => $manucaturer,
            'part_number' => $partNumber,
            'recd_part_no' => $recdPartNo,
            'stock_type' => $stockType,
            'penyedia_yang_disarankan' => $penyediaYangDisarankan,
            'harga_perkiraan' => $hargaPerkiraan,
            'pemakaian_per_tahun' => $pemakaianPerTahun,
            'gudang_yang_diperlukan' => $gudangYangDigunakan,
            'satuan' => $satuan,
            'dibatasi_untuk' => $dibatasiUntuk,
            'cross_reff' => $crossReff,
            'inspeksi_khusus' => $inspeksiKhusus,
            'kritikalitas' => $kritikalitas,
            'berbahaya' => $berbahaya,
            'catatan_penghapusan' => "-",
            'catatan_penghapusan_teks' => "-",
        ];

        return self::saveForm($input);
    }



    public static function pengajuanModifikasi(
        $no,
        $stockCode,
        $jenisItem,
        $item,
        $jsonData,
        $egi,
        $component_code,
        $manucaturer,
        $partNumber,
        $recdPartNo,
        $stockType,
        $penyediaYangDisarankan,
        $hargaPerkiraan,
        $pemakaianPerTahun,
        $gudangYangDigunakan,
        $satuan,
        $dibatasiUntuk,
        $crossReff,
        $inspeksiKhusus,
        $kritikalitas,
        $berbahaya,
        $catatan_penghapusan,
        $catatan_penghapusan_teks,
    ) {
        $input = [
            'jenis_pengajuan' => self::PENGAJUAN_MODIFIKASI,
            'no' => $no,
            'stock_code' => $stockCode,
            'jenis_item' => $jenisItem,
            'item' => $item,
            'json_data' => $jsonData,
            'egi' => $egi,
            'component_code' => $component_code,
            'manufacturer' => $manucaturer,
            'part_number' => $partNumber,
            'recd_part_no' => $recdPartNo,
            'stock_type' => $stockType,
            'penyedia_yang_disarankan' => $penyediaYangDisarankan,
            'harga_perkiraan' => $hargaPerkiraan,
            'pemakaian_per_tahun' => $pemakaianPerTahun,
            'gudang_yang_diperlukan' => $gudangYangDigunakan,
            'satuan' => $satuan,
            'dibatasi_untuk' => $dibatasiUntuk,
            'cross_reff' => $crossReff,
            'inspeksi_khusus' => $inspeksiKhusus,
            'kritikalitas' => $kritikalitas,
            'berbahaya' => $berbahaya,
            'catatan_penghapusan' => $catatan_penghapusan,
            'catatan_penghapusan_teks' => $catatan_penghapusan_teks,
        ];

        return self::saveForm($input);
    }

    public static function saveForm($input)
    {

        $input = array_merge($input, [
            'created_by' => auth()->user()->id
        ]);

        try {
            if (self::create($input)) {
                return ['success' => true, 'message' => 'Data berhasil ditambahkan'];
            }

            return ['success' => false, 'message' => 'Gagal membuat data'];
        } catch (\Throwable $th) {
            dd($th);
            return ['success' => false, 'message' => 'Terjadi kesalahan saat menyimpan data'];
        }
    }

    public function setujuLabel()
    {
        return $this->setuju ? 'Disetujui' : 'Diajukan';
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function jsonDataParse()
    {
        $templateHtml = "<table class='table'><tbody>";
        $jsonData = json_decode($this->json_data);
        if ($jsonData) {
            foreach ($jsonData as $key => $value) {
                $templateHtml .= "<tr>";
                $templateHtml .= "<td>$key</td><td>:</td><td>$value</td>";
                $templateHtml .= "</tr>";
            }
        }
        $templateHtml .= "</tbody></table>";


        return $templateHtml;
    }
}
