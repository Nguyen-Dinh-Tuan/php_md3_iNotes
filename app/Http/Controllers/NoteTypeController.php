<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NoteType;
use Illuminate\Http\Request;

class NoteTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notetypes = NoteType::paginate(3);
        return view('notetypes.list', compact('notetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notetypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notetype = new NoteType();
        $notetype->name = $request->input('name');
        $notetype->description = $request->input('description');
        $notetype->save();

        return redirect()->route('notetypes.list');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notetype = NoteType::findOrFail($id);
        return view('notetypes.edit', compact('notetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $notetype = NoteType::find($id);
        $notetype->fill($request->all());
        $notetype->name = $request->input('name');
        $notetype->description = $request->input('description');
        $notetype->save();
        return redirect()->route('notetypes.list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    public function delete($id)
    {
        $notetype = NoteType::find($id);
        $notetype->delete();
        return redirect()->route('notetypes.list');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($request->has('name')) {
            return redirect()->route('notetypes.list');
        }
        $notetypes = NoteType::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);

        $notes = Note::all();
        return view('notetypes.list', compact('notes', 'notetypes'));
    }
}
