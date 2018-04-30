<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Absen;
use App\Staff;
use DB;
use fpdf;
use PDF;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $Staff = Staff::all();
        $Absen = Absen::all();
        return view('admin.index', compact(['Absen', $Absen], ['Staff', $Staff]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function editall()
    {
        DB::table('absen')->update(['hadir' => 'tidakhadir']);
        return redirect('admin/daftar-kehadiran')->with('status', 'Semua Data Kehadiran Direset!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Absen = Absen::find($id);
        $Absen->delete();
        return redirect('admin/daftar-kehadiran')->with('status', 'Daftar Hadir Terhapus!');
    }

    public function resetrecord()
    {
        DB::table('absen')->delete();
        return redirect('admin/daftar-kehadiran')->with('status', 'Semua Data Kehadiran Terhapus!');
    }
        
    public function excel()
    {
        
       $Absen = DB::table('absen')
                       ->join('staff','staff.id','=','absen.staff_id')
                       ->select('staff.nip','staff.nama', 'staff.jabatan' ,'absen.created_at', 'absen.updated_at', 'absen.keterangan')
                       ->get();
        
        \Excel::create('Report Absen',function($excel) use($Absen)
        {
            
                        $excel->sheet('Report Absen',function($sheet) use ($Absen)         
                        {
                            $row=1;
                            $sheet->row($row,array(
                            'No','NIP','Nama','Jabatan','Datang','Pulang'));
                            
                            $no=1;
                            foreach($Absen as $t)
                            {
                                $sheet->row(++$row,array(
                                    $no,
                                    $t->nip,
                                    $t->nama,
                                    $t->jabatan,
                                    $t->created_at,
                                    $t->updated_at,
                                    $t->keterangan,
                                ));
                                 $no++;
                            }
            
                        });
                       
        })->export('xlsx');
        
    }

    public function pdf(Request $request)
    {
        $absen = Absen::all();
        $staff = Staff::all();
        $pdf = PDF::loadView('admin.adminpdf', ['absen' => $absen], ['staff' => $staff]);
        return $pdf->download('Report Absen');

        // $pdf = new \fpdf\FPDF();
        // $pdf->AddPage();
        // $pdf->SetFont('Arial','B',8);
        // $pdf->Cell(10,10,'No',1,0);
        // $pdf->Cell(25,10,'Nama',1,0);
        // $pdf->Cell(25,10,'Jabatan',1,0);
        // $pdf->Cell(25,10,'Datang',1,0);
        // $pdf->Cell(25,10,'Pulang',1,1);


        // $Absen = DB::table('absen')
        //                ->join('staff','staff.id','=','absen.staff_id')
        //                ->select('staff.nama', 'staff.jabatan' ,'absen.created_at', 'absen.updated_at')
        //                ->get();

        // $no=1;
        // $pdf->SetFont('Arial','',7);
        // foreach ($Absen as $u) {
        //     $pdf->Cell(10,7,$no,1,0);
        // $pdf->Cell(25,7,$u->nama,1,0);
        // $pdf->Cell(25,7,$u->jabatan,1,0);
        // $pdf->Cell(25,7,$u->created_at,1,0);
        // $pdf->Cell(25,7,$u->updated_at,1,1);

        // $no++;
        // }

        // $pdf->Output();
        // die;
    }

}
