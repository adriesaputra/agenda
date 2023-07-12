<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pejabat;
use App\Models\Protokol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Liputan;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $agenda = Agenda::count();
        $pejabat = Pejabat::count();
        $protokol = Protokol::count();
        $liputan = Liputan::count();

        return view('dashboard', compact('pejabat', 'protokol', 'liputan', 'agenda'));
    }
}
