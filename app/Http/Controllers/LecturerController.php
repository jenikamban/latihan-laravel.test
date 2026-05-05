<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $lecturers = lecturer::latest();


       $keyword = request('keyword');
if($keyword) {

$lecturers->where('name','like','%'.$keyword . '%');

}
 $Department_id = request('department_id');
if($Department_id) {
$lecturers->where('department_id',$Department_id);
       

}

         return view('lecturer.index',[
            'title' => 'lecturer',
            'Departments' => Department::latest()->get(),
            'lecturers' => $lecturers->paginate(5)->withQueryString(),
            
            
            ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                 return view('lecturer.create',[
            'title' => 'create lecturer',
            'Departments' => Department::latest()->get(),
            
            
            
            ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
    'name' => 'required|max:255',
    'department_id' => 'required|exists:departments,id',
], [
    'name.required' => 'nama tidak boleh kosong',
    'name.max' => 'nama tidak boleh lebih dari :max karakter',

    'department_id.required' => 'program studi tidak boleh kosong',
    'department_id.exists' => 'program studi yang di pilih tidak di temukan',
]);

    lecturer::create($validated);
    return to_route('lecturer.index')->withSuccess('Data berhasil di tambahkan');
 
    return redirect('/lecturer');
        
    
    }

    /**
     * Display the specified resource.
     */
    public function show(lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lecturer $lecturer)
    {
         return view('lecturer.edit',[
            'title' => 'edit lecturer',
            'Departments' => Department::latest()->get(),
            'lecturer'=>$lecturer
            
            
            
            ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lecturer $lecturer)
    {
        $validated = $request->validate([
    'name' => 'required|max:255',
    'department_id' => 'required|exists:departments,id',
], [
    'name.required' => 'nama tidak boleh kosong',
    'name.max' => 'nama tidak boleh lebih dari :max karakter',

    'department_id.required' => 'program studi tidak boleh kosong',
    'department_id.exists' => 'program studi yang di pilih tidak di temukan',
]);

   $lecturer->update($validated);
    return to_route('lecturer.index')->withSuccess('Data berhasil di ubah');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lecturer $lecturer)
    {
        $lecturer->delete($lecturer);
    return to_route('lecturer.index')->withSuccess('Data berhasil dihapus');
    }
}
