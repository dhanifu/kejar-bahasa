<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

use Auth;
use App\CategoryClass;
use App\Classs;
use App\Module;
use App\Purchased;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check()) {
            $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
            $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

            if (request()->date != '') {
                $date = explode('-', request()->date);
                $start = Carbon::parse($date[0])->format('Y-m-d'). ' 00:00:01';
                $end = Carbon::parse($date[1])->format('Y-m-d'). ' 23:59:59';
            } 
            
            $purchaseds = Purchased::with(['class','user'])
                            ->whereBetween(
                                'created_at', 
                                [$start, $end]
                            )->get();
                            
            return view('admin.report.index', compact('purchaseds'));
        } else {
            return redirect()->route('login');
        }
    }

    public function reportPdf($daterange)
    {
        $date = explode('+', $daterange);

        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        $purchaseds = Purchased::with(['class','user'])
                ->whereBetween(
                    'created_at', [$start, $end]
                    )->get();

        $pdf = PDF::setOptions([
            'dpi' => 150,
            'defaultFont' => 'sans-serif'
        ])->loadView('admin.report.pdf', compact('purchaseds', 'date'));

        return $pdf->stream();
    }
}
