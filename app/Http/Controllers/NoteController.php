<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('/dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note/noteCreate');
    }
     public function collectionCreate()
    {
        return view('note/collectionCreate');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);
        Note::create([
            'owner' => Auth::user() -> name,
            'category' => $request -> category,
            'title' => $request -> title,
            'content' => $request -> content
        ]);
        return redirect('/dashboard')->with('successAlert','Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $hi)
    {
        $categories = Note::select('category')->where('owner',Auth::user()->name)->distinct()->get();
        $notes = Note::where('owner',Auth::user()->name)->get();
        return view('note/collectionShowage',compact('notes','categories','hi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $note = Note::find($id);
        return view('note/noteEdit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $note = Note::find($id);
        Note::find($id)->update([
            'owner' => Auth::user() -> name,
            'category' => $note -> category,
            'title' => $request -> title,
            'content' => $request -> content
        ]);
        return redirect('/dashboard')->with('successAlert','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::find($id);
        Note::find($id) -> delete();
        return Redirect::back()->with('successAlert','Deleted Successfully!');
        //Note::where('category', $note -> category )->count() == 1
    }
    public function collectionMove(string $id,Request $request)
    {
        $request -> validate([
            'category' => 'required'
        ]);
        $note = Note::find($id);
        Note::find($id)->update([
            'owner' => Auth::user() -> name,
            'category' => $request -> category,
            'title' => $note -> title,
            'content' => $note -> content
        ]);
        return Redirect::back()->with('successAlert','Moved Successfully!');
    }
}
