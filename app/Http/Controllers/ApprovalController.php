<?php

namespace App\Http\Controllers;

use App\Constants\CategoryConstant;
use App\Constants\StockTypeConstant;
use App\Models\ApprovalModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

class ApprovalController extends Controller
{
    public function index()
    {
        $approvals = ApprovalModel::all();
        return view('approval.index', compact('approvals'));
    }

    public function baru()
    {
        $categories = CategoryConstant::list();
        $items = CategoryConstant::items();
        $stockType = StockTypeConstant::list();
        return view('approval.baru', compact('categories', 'items', 'stockType'));
    }


    public function modifikasi()
    {
        $categories = CategoryConstant::list();
        $items = CategoryConstant::items();
        $stockType = StockTypeConstant::list();
        return view('approval.modifikasi', compact('categories', 'items', 'stockType'));
    }

    public function storeBaru(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'no' => 'required',
            'stock_code' => 'required',
            'jenis_item' => 'required',
            'item' => 'required',
            'json_data' => 'required',
            'egi' => 'required',
            'component_code' => 'required',
            'manufacturer' => 'required',
            'part_number' => 'required',
            'recd_part_no' => 'required',
            'stock_type' => 'required',
            'penyedia_yang_disarankan' => 'required',
            'harga_perkiraan' => 'required',
            'pemakaian_per_tahun' => 'required',
            'gudang_yang_diperlukan' => 'required',
            'satuan' => 'required',
            'dibatasi_untuk' => 'required',
            'cross_reff' => 'required',
            'inspeksi_khusus' => 'required',
            'kritikalitas' => 'required',
            'berbahaya' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json(['success' => false, 'message' => $valid->messages()->first()]);
        }

        $response = ApprovalModel::pengajuanBaru(
            $request->get('no'),
            $request->get('stock_code'),
            $request->get('jenis_item'),
            $request->get('item'),
            json_encode($request->get('json_data')),
            $request->get('egi'),
            $request->get('component_code'),
            $request->get('manufacturer'),
            $request->get('part_number'),
            $request->get('recd_part_no'),
            $request->get('stock_type'),
            $request->get('penyedia_yang_disarankan'),
            $request->get('harga_perkiraan'),
            $request->get('pemakaian_per_tahun'),
            $request->get('gudang_yang_diperlukan'),
            $request->get('satuan'),
            $request->get('dibatasi_untuk'),
            $request->get('cross_reff'),
            $request->get('inspeksi_khusus'),
            $request->get('kritikalitas'),
            $request->get('berbahaya'),
        );

        return response()->json($response);
    }

    public function storeModifikasi(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'no' => 'required',
            'stock_code' => 'required',
            'jenis_item' => 'required',
            'item' => 'required',
            'json_data' => 'required',
            'egi' => 'required',
            'component_code' => 'required',
            'manufacturer' => 'required',
            'part_number' => 'required',
            'recd_part_no' => 'required',
            'stock_type' => 'required',
            'penyedia_yang_disarankan' => 'required',
            'harga_perkiraan' => 'required',
            'pemakaian_per_tahun' => 'required',
            'gudang_yang_diperlukan' => 'required',
            'satuan' => 'required',
            'dibatasi_untuk' => 'required',
            'cross_reff' => 'required',
            'inspeksi_khusus' => 'required',
            'kritikalitas' => 'required',
            'berbahaya' => 'required',
            'catatan_penghapusan' => 'required',
            'catatan_penghapusan_teks' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json(['success' => false, 'message' => $valid->messages()->first()]);
        }

        $response = ApprovalModel::pengajuanModifikasi(
            $request->get('no'),
            $request->get('stock_code'),
            $request->get('jenis_item'),
            $request->get('item'),
            json_encode($request->get('json_data')),
            $request->get('egi'),
            $request->get('component_code'),
            $request->get('manufacturer'),
            $request->get('part_number'),
            $request->get('recd_part_no'),
            $request->get('stock_type'),
            $request->get('penyedia_yang_disarankan'),
            $request->get('harga_perkiraan'),
            $request->get('pemakaian_per_tahun'),
            $request->get('gudang_yang_diperlukan'),
            $request->get('satuan'),
            $request->get('dibatasi_untuk'),
            $request->get('cross_reff'),
            $request->get('inspeksi_khusus'),
            $request->get('kritikalitas'),
            $request->get('berbahaya'),
            $request->get('catatan_penghapusan'),
            $request->get('catatan_penghapusan_teks'),
        );

        return response()->json($response);
    }

    public function export($id)
    {
        // return view('pdf.pengajuan');
        $data = ApprovalModel::find($id);
        if (!$data) {
            abort(404);
        }
        $pdf = PDF::loadView('pdf.pengajuan', 
        [
        'data' => $data, 
        'list_stock_type' => StockTypeConstant::list()
        ])
            ->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function approve($id)
    {
        $approval = ApprovalModel::findOrFail($id);

        $approval->setuju = 1;

        $approval->save();

        return redirect()->route('approval.index');
    }
}
