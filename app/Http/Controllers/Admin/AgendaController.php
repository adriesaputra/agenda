<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agenda;
use App\Models\Pejabat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Liputan;
use App\Models\Protokol;
use DataTables;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Agenda::with('pejabats', 'liputans', 'protokols')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    $btn =
                        '<div class="d-flex justify-content-center">

                            <a href="' .
                        route('admin.agenda.edit', $item->id) .
                        '" class="btn btn-sm btn-warning me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                            </a>
        
                            <form action="' .
                        route('admin.agenda.destroy', $item->id) .
                        '" method="POST">
                                        ' .
                        method_field('delete') .
                        csrf_field() .
                        '
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                </button>
                            </form>

                        </div>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.agenda.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pejabats = Pejabat::all();
        $liputans = Liputan::all();
        $protokols = Protokol::all();
        return view('admin.agenda.create', compact('pejabats', 'liputans', 'protokols'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi_acara' => 'required',
            'lokasi_acara' => 'required',
            'waktu_acara' => 'required'
        ]);
        $agenda = Agenda::create([
            'title' => $title = $request->title,
            'slug' => str($title)->slug(),
            'deskripsi_acara' => $request->deskripsi_acara,
            'lokasi_acara' => $request->lokasi_acara,
            'waktu_acara' => $request->waktu_acara,
        ]);

        if ($request->has('pejabats')) {
            $agenda->pejabats()->attach($request->pejabats);
        }

        if ($request->has('liputans')) {
            $agenda->liputans()->attach($request->liputans);
        }

        if ($request->has('protokols')) {
            $agenda->protokols()->attach($request->protokols);
        }

        notify()->success('Agenda has been created.');
        return redirect()->route('admin.agenda.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        $pejabats = Pejabat::all();
        $liputans = Liputan::all();
        $protokols = Protokol::all();
        return view('admin.agenda.edit', compact('agenda', 'pejabats', 'liputans', 'protokols'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        notify()->success('Agenda has been deleted.');
        return redirect()->route('admin.agenda.index');
    }
}
