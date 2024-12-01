<?php

namespace App\Http\Controllers;

use App\Models\Type_course;
use Illuminate\Http\Request;

class TypeCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type_course::orderBy('updated_at', 'DESC')->get();

        return view('admin.course_type', compact('types'));
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
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image',
        ]);

        $existType = Type_course::where('name_type', $request->name)->first();

        
        if($existType) {
            return redirect()->back()->with('error', 'Tipe Course sudah ada!');
            // dd($request->all());
        }else {

            $imagePath = time(). '.'. $request->image->guessExtension();
            $request->image->move(public_path('Uploads/for-course_type'), $imagePath);

            $type = new Type_course();
            $type->name_type = $request->name; 
            $type->deskripsi = $request->deskripsi;
            $type->gambar = $imagePath;
            $type->save();

            return redirect('/admin-course_type')->with('success', 'Tipe Course Berhasil Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Type_course $type_course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type_course $type_course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        // dd($request->all());
        // Validasi data
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'image' => 'nullable|image', // 'nullable' karena gambar tidak harus diubah
        ]);

        // Cek apakah nama tipe course sudah ada selain yang sedang diupdate
        $existType = Type_course::where('name_type', $request->name)
            ->where('id', '!=', $request->id)->first();

            
            if ($existType) {
                return redirect()->back()->with('error', 'Tipe Course sudah ada!');
            } else {
            $types = Type_course::where('id', $request->id)->first();
            // Proses update gambar jika ada gambar baru
            if ($request->hasFile('image')) {
                // Path gambar lama
                $oldImagePath = public_path('Uploads/for-course_type/' . $types->gambar);

                // Hapus gambar lama jika file ada
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // Simpan gambar baru
                $imagePath = time() . '.' . $request->image->guessExtension();
                $request->image->move(public_path('Uploads/for-course_type'), $imagePath);

                // Update path gambar pada model
                $types->gambar = $imagePath;
            }

            // Update data lainnya
            $types->name_type = $request->name;
            $types->deskripsi = $request->deskripsi;
            $types->save();

            return redirect('/admin-course_type')->with('success', 'Tipe Course Berhasil Diupdate!');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id',
        ]);

        $type = Type_course::where('id', $request->id)->first();

        $oldImagePath = public_path('Uploads/for-course_type/' . $type->gambar);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

        $type->delete();
        return redirect()->back()->with('success', 'Tipe Course Berhasil Hapus!');
    }
}
