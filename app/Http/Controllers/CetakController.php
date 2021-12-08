<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use PDF;

class CetakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $report = Transaksi::orderBy('created_at','Desc')->paginate(20);
        return view('report.index', compact('report'));    
    }
    public function cetak_pdf()
    {
        $report = Transaksi::orderBy('created_at','Desc')->get();
        $pdf = PDF::loadview('report.report_pdf', compact('report'));
        return $pdf->download('report-laundry.pdf');
    }

}
