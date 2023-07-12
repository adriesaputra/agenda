<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProtokolRequest;
use App\Http\Requests\UpdateProtokolRequest;
use App\Models\Protokol;
use Illuminate\Http\Request;
use DataTables;

class ProtokolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Protokol::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    $btn =
                        '<div class="d-flex justify-content-center">

                            <a href="' .
                        route('admin.protokol.edit', $item->id) .
                        '" class="btn btn-sm btn-warning me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                            </a>
        
                            <form action="' .
                        route('admin.protokol.destroy', $item->id) .
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
        return view('admin.protokol.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.protokol.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProtokolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProtokolRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('images/photo', 'public');

        Protokol::create($data);

        notify()->success('Petugas Protokol has been created.');
        return redirect()->route('admin.protokol.index');
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
     * @param  Protokol  $protokol
     * @return \Illuminate\Http\Response
     */
    public function edit(Protokol $protokol)
    {
        return view('admin.protokol.edit', compact('protokol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProtokolRequest  $request
     * @param  Protokol  $protokol
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProtokolRequest $request, Protokol $protokol)
    {
        $data = $request->all();
        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('images/photo', 'public');
        }
        $protokol->update($data);

        notify()->success('Petugas Protokol has been updated.');
        return redirect()->route('admin.protokol.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Protokol  $protokol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Protokol $protokol)
    {
        $protokol->delete();

        notify()->success('Petugas Protokol has been deleted.');
        return redirect()->route('admin.protokol.index');
    }
}
