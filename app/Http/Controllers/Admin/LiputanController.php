<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLiputanRequest;
use App\Http\Requests\UpdateLiputanRequest;
use App\Models\Liputan;
use Illuminate\Http\Request;
use DataTables;

class LiputanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Liputan::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    $btn =
                        '<div class="d-flex justify-content-center">

                            <a href="' .
                        route('admin.liputan.edit', $item->id) .
                        '" class="btn btn-sm btn-warning me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                            </a>
        
                            <form action="' .
                        route('admin.liputan.destroy', $item->id) .
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
        return view('admin.liputan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.liputan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreLiputanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLiputanRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('images/photo', 'public');

        Liputan::create($data);

        notify()->success('Petugas Liputan has been created.');
        return redirect()->route('admin.liputan.index');
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
     * @param  Liputan  $liputan
     * @return \Illuminate\Http\Response
     */
    public function edit(Liputan $liputan)
    {
        return view('admin.liputan.edit', compact('liputan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateLiputanRequest  $request
     * @param  Liputan  $liputan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLiputanRequest $request, Liputan $liputan)
    {
        $data = $request->all();
        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('images/photo', 'public');
        }
        $liputan->update($data);

        notify()->success('Petugas Liputan has been updated.');
        return redirect()->route('admin.liputan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Liputan  $liputan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Liputan $liputan)
    {
        $liputan->delete();

        notify()->success('Petugas Liputan has been deleted.');
        return redirect()->route('admin.liputan.index');
    }
}
