<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDagBookRequest;
use App\Http\Requests\UpdateDagBookRequest;
use App\Models\DagBook;
use Illuminate\Support\Facades\Auth;

class DagBookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dagbooks = DagBook::all()->where("user_id", Auth::user()->id);
        return view("dag-book.index", compact('dagbooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dag-book.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDagBookRequest $request)
    {
        DagBook::create($request->all());
        return redirect()->route("dag-book.index")->with("success", "Dagbook Successfully Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(DagBook $dagBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DagBook $dagBook)
    {
        return view("dag-book.edit", compact('dagBook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDagBookRequest $request, DagBook $dagBook)
    {
        $dagBook->update($request->all());
        return redirect()->route("dag-book.index")->with("success", "Dag Book is Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DagBook $dagBook)
    {

        $dagBook->delete();

        return redirect()->route('dag-book.index')
            ->with('success', 'Dag Book id ' . $dagBook['id'] . ' successfully deleted ');
    }
}
