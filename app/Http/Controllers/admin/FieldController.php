<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = Field::all();
        return view('admin/field/index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/field/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|unique:fields',
            'harga' => 'required',
            'deskripsi' => 'required',
            'jam_buka' => 'required|date_format:H:i',
            'jam_tutup' => 'required|date_format:H:i|after:jam_buka',
            'gambar' => 'required|file',
            'status' => 'required',
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('post-image');
        }

        Field::create($validatedData);

        return redirect('/admin/field')->with('success', 'Field Successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $field = Field::findOrFail($id);
        return view('admin/field.edit', compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $field = Field::findOrFail($id);
        $rules = [
            'nama' => 'required|max:255',
            'harga' => 'required',
            'deskripsi' => 'required',
            'jam_buka' => 'required|date_format:H:i',
            'jam_tutup' => 'required|date_format:H:i|after:jam_buka',
            'gambar' => 'required|file',
            'status' => 'required',
        ];

        if ($request->slug != $field->slug) {
            $rules['slug'] = 'required|unique:fields';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if ($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('post-image');
        }

        Field::where('id', $field->id)
            ->update($validatedData);

        if ($request->file('gambar')) {
        }

        return redirect('/admin/field')->with('success', 'Field Successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $field = Field::findOrFail($id);
        if ($field->gambar) {
            Storage::delete($field->gambar);
        }
        $field->delete();
        return redirect('admin/field')->with('success', 'Field Successfully Deleted');
    }
}
