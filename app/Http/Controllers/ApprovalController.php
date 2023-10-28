<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ApprovalController extends Controller
{
    public function index()
    {
        return view('approval.index');
    }

    public function export($id)
    {
        // return view('pdf.pengajuan');
        $pdf = PDF::loadView('pdf.pengajuan',[])
        ->setPaper('a4', 'portrait');
        return $pdf->stream();
    }
}
