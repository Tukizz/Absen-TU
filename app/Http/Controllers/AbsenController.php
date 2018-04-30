<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;
use App\Staff;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $Absen = Absen::all();
       $Staff = Staff::all();
       return view('absen.index', compact(['Absen', $Absen], ['Staff', $Staff]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $Absen = Absen::all();
        $Staff = Staff::all();
       return view('absen.index', compact(['Absen', $Absen], ['Staff', $Staff]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'staff_id' => 'required',
            'hadir' => 'required',


        ]);

        $Absen = new Absen;
        $Absen->staff_id = $request->staff_id;
        $Absen->hadir = $request->hadir;
        $Absen->save();

        return redirect('absen')->with('datang', 'Anda datang Pukul : ' );
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
        $data = Absen::find($id);
        return view('absen.index')->with('Absen', $data);
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
        $this->validate($request, [
            
            'hadir' => 'required',


        ]);

        $Absen = Absen::find($id);
        
        $Absen->hadir = $request->hadir;
        $Absen->save();

        return redirect('absen')->with('pulang', 'Anda Pulang Pukul : ' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
