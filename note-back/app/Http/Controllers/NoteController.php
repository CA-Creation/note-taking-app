<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return Note::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = Note::create($request->all());
        return response()->json($note, 201);
    }

    public function show($id)
    {
        return Note::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update($request->all());

        return response()->json($note, 200);
    }

    public function destroy($id)
    {
        Note::destroy($id);
        return response()->json(null, 204);
    }
}


