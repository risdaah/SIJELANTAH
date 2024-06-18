<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengumpulanExport;

class ExcelController extends Controller
{
    protected $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function generateEXCELall()
    {
        return Excel::download(new PengumpulanExport, 'Laporan-All.xlsx');
    }

    public function generateEXCELByMonthYear(Request $request)
    {
        // Ambil parameter bulan dan tahun dari request
        $month = $request->input('month');
        $year = $request->input('year');

        // Validasi parameter bulan dan tahun
        if (!checkdate($month, 1, $year)) {
            return back()->withErrors(['msg' => 'Bulan atau tahun tidak valid']);
        }

        // Generate nama file berdasarkan bulan dan tahun
        $fileName = 'Laporan-' . $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '.xlsx';

        // Download Excel file dengan data yang difilter berdasarkan bulan dan tahun
        return Excel::download(new PengumpulanExport($month, $year), $fileName);
    }
}
