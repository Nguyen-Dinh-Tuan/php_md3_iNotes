<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NoteType;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $notes = Note::paginate(3);
//        $notes = Note::all();
        $notetype = NoteType::all();
        return view('notes.list', compact('notes','notetype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notetype = NoteType::all();

        return view('notes.create', compact('notetype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $note = new Note();
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->type_id = $request->input('type_id');
        $note->save();

        return redirect()->route('notes.list');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::findOrFail($id);
        $notetype = NoteType::all();
        return view('notes.edit', compact('note','notetype'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $note= Note::find($id);
        $note->fill($request->all());
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->type_id = $request->input('type_id');
        $note->save();
        return redirect()->route('notes.list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $note = Note::find($id);
//        $city->customers()->delete();
        $note->delete();
        return redirect()->route('notes.list');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($request->has('title')){
            return redirect()->route('notes.list');
        }
        $notes = Note::where('title', 'LIKE', '%'  . $keyword . '%')->paginate(5);

        $notetype = NoteType::all();
        return view('notes.list', compact('notes', 'notetype'));
    }
}
