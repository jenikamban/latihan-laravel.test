<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('organization.index',[
            'title' => 'organization',
            'organizations' => organization::latest()->get(),
            
            
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organization.create',[
            'title' => 'organization',
            ' create organizations',
            
            
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         {
         $validated = $request->validate([
        'name' => 'required|max:255',
        'Leader_name' => 'required|max:255',
        
         ], [
        'name.required' => 'nama organization tidak boleh kosong',
        'name.max' => 'nama organization tidak boleh lebih dari :max karakter',

        
        'Leader_name.required' => 'nama pimpinan tidak boleh kosong',
        'Leader_name.max' => 'nama pimpinan tidak boleh lebih dari :max karakter',

        
        

    ]);

    try {

DB::beginTransaction();

$organization = organization::create($validated);
   $organization->organizationLeader()->create($validated);
   DB::commit();
    return to_route('organization.index')->withSuccess('Data berhasil di tambahkan');
 
      }catch(\Exception $e){
        DB::rollBack();
return to_route('organization.create')->withError('Data gagal di tambahkan');

    }

  
    
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        return view('organization.edit',[
            'title' => 'organization',
            ' Edit organizations',
            'organization'=>$organization,
            
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {
         {
         $validated = $request->validate([
        'name' => 'required|max:255',
        'Leader_name' => 'required|max:255',
        
         ], [
        'name.required' => 'nama organization tidak boleh kosong',
        'name.max' => 'nama organization tidak boleh lebih dari :max karakter',

        
        'Leader_name.required' => 'nama pimpinan tidak boleh kosong',
        'Leader_name.max' => 'nama pimpinan tidak boleh lebih dari :max karakter',

        
        

    ]);         }

    try {

DB::beginTransaction();

$organization ->update($validated);
   $organization->organizationLeader()->updateOrCreate(

['organization_id'=>$organization->id],
['Leader_name'=>$validated['Leader_name']],

   );
   DB::commit();
    return to_route('organization.index')->withSuccess('Data berhasil di tambahkan');
 
      }catch(\Exception $e){
        DB::rollBack();
return to_route('organization.edit',$organization)->withError('Data gagal di tambahkan');
    }
    }   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        
        $organization->delete($organization);
    return to_route('organization.index')->withSuccess('Data berhasil dihapus');
    }
}
