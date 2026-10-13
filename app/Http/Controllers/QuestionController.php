<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
      public function store(Request $request)
    {
        $data = $request->validate([
            'nama'       => 'required',
            'email'      => 'required|email',
            'pertanyaan' => 'nullable',
        ], [
            'nama.required'  => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email'    => 'Format email tidak valid',
        ]);

        return redirect('/home')->with('info', 'Selamat, Kamu Lulus!');
        // return view('home-question-respon', $data);
        //return redirect()->route('thank-you')->with('data', $data);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
