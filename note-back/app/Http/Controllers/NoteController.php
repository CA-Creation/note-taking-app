<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index() {
        return Note::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $note = Note::create($validated);

        return response()->json($note, 201); // ✅ send created note back
    }


    public function update(Request $request, Note $note) {
        $note->update($request->all());
        return $note;
    }

    public function destroy(Note $note) {
        $note->delete();
        return response()->json(['message' => 'Note deleted']);
    }

    public function show(Note $note) {
        return $note;
    }
}

