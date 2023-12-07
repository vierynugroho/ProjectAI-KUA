<?php

namespace App\Http\Controllers;

use App\Models\DataPria;
use App\Models\DataWanita;
use App\Models\Pasangan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Pasangan::with(['DataPria', 'DataWanita'])->get();
        return view('data', [
            'datas' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = Carbon::now()->timestamp;
        return view('data-add', [
            'id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validatedDataPria = $request->validate([
        //     'pria__id' => 'required',
        //     'pria__nama' => 'required|max:255',
        //     'pria__kk' => 'unique:data_pria|mimes:pdf',
        //     'pria__ktp' => 'unique:data_pria|mimes:pdf',
        //     'pria__akta-ayah' => 'mimes:pdf',
        //     'pria__akta-ibu' => 'mimes:pdf',
        // ]);

        // $validatedDataWanita = $request->validate([
        //     'wanita__id' => 'required',
        //     'wanita__nama' => 'required|max:255',
        //     'wanita__kk' => 'unique:data_wanita|mimes:pdf',
        //     'wanita__ktp' => 'unique:data_wanita|mimes:pdf',
        //     'wanita__akta-ayah' => 'mimes:pdf',
        //     'wanita__akta-ibu' => 'mimes:pdf',
        // ]);

        // $validatedPasangan = $request->validate([
        //     'pria__id' => 'required',
        //     'wanita__id' => 'required',
        // ]);

        $validatedDataPria['id'] = $request['pria__id'];
        $validatedDataPria['nama_lengkap'] = $request['pria__nama'];

        // pria pdf
        if ($request->file('pria__kk')) {
            $validatedDataPria['kk'] = $request->file('pria__kk')->store('kk');
        }
        if ($request->file('pria__ktp')) {
            $validatedDataPria['ktp'] = $request->file('pria__ktp')->store('ktp');
        }
        if ($request->file('pria__akta-ayah')) {
            $validatedDataPria['akta_ayah'] = $request->file('pria__akta-ayah')->store('akta_ayah');
        }
        if ($request->file('pria__akta-ibu')) {
            $validatedDataPria['akta_ibu'] = $request->file('pria__akta-ibu')->store('akta_ibu');
        }

        $validatedDataWanita['id'] = $request['wanita__id'];
        $validatedDataWanita['nama_lengkap'] = $request['wanita__nama'];
        // wanita pdf
        if ($request->file('wanita__kk')) {
            $validatedDataWanita['kk'] = $request->file('wanita__kk')->store('kk');
        }
        if ($request->file('wanita__ktp')) {
            $validatedDataWanita['ktp'] = $request->file('wanita__ktp')->store('ktp');
        }
        if ($request->file('wanita__akta-ayah')) {
            $validatedDataWanita['akta_ayah'] = $request->file('wanita__akta-ayah')->store('akta_ayah');
        }
        if ($request->file('wanita__akta-ibu')) {
            $validatedDataWanita['akta_ibu'] = $request->file('wanita__akta-ibu')->store('akta_ibu');
        }


        $validatedPasangan['id_pria'] = $request['pria__id'];
        $validatedPasangan['id_wanita'] = $request['wanita__id'];

        // dd($request->all());
        DataPria::create($validatedDataPria);
        DataWanita::create($validatedDataWanita);
        Pasangan::create($validatedPasangan);

        return redirect('/data')->with('success', 'Data Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('akurasiData');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('data-edit');
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