<?php

namespace App\Http\Controllers;

use App\Models\DataPria;
use App\Models\DataWanita;
use App\Models\Pasangan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;
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
        $validatedDataPria = $request->validate([
            'pria__nama_lengkap' => 'required|max:60',
            'pria__kk' => 'mimes:pdf',
            'pria__ktp' => 'mimes:pdf',
            'pria__akta_ayah' => 'mimes:pdf',
            'pria__akta_ibu' => 'mimes:pdf',
        ]);
        $validatedDataWanita = $request->validate([
            'wanita__nama_lengkap' => 'required|max:60',
            'wanita__kk' => 'mimes:pdf',
            'wanita__ktp' => 'mimes:pdf',
            'wanita__akta_ayah' => 'mimes:pdf',
            'wanita__akta_ibu' => 'mimes:pdf',
        ]);

        // pria pdf

        $validatedDataPria['id'] = $request['pria__id'];
        if ($request->file('pria__kk')) {
            $validatedDataPria['pria__kk'] = $request->file('pria__kk')->store('kk');
        }
        if ($request->file('pria__ktp')) {
            $validatedDataPria['pria__ktp'] = $request->file('pria__ktp')->store('ktp');
        }
        if ($request->file('pria__akta_ayah')) {
            $validatedDataPria['pria__akta_ayah'] = $request->file('pria__akta_ayah')->store('akta_ayah');
        }
        if ($request->file('pria__akta_ibu')) {
            $validatedDataPria['pria__akta_ibu'] = $request->file('pria__akta_ibu')->store('akta_ibu');
        }

        // wanita pdf

        $validatedDataWanita['id'] = $request['wanita__id'];
        $validatedDataWanita['nama_lengkap'] = $request['wanita__nama_lengkap'];

        if ($request->file('wanita__kk')) {
            $validatedDataWanita['wanita__kk'] = $request->file('wanita__kk')->store('kk');
        }
        if ($request->file('wanita__ktp')) {
            $validatedDataWanita['wanita__ktp'] = $request->file('wanita__ktp')->store('ktp');
        }
        if ($request->file('wanita__akta_ayah')) {
            $validatedDataWanita['wanita__akta_ayah'] = $request->file('wanita__akta_ayah')->store('akta_ayah');
        }
        if ($request->file('wanita__akta_ibu')) {
            $validatedDataWanita['wanita__akta_ibu'] = $request->file('wanita__akta_ibu')->store('akta_ibu');
        }


        $validatedPasangan['id_pria'] = $request['pria__id'];
        $validatedPasangan['id_wanita'] = $request['wanita__id'];

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
        $data = Pasangan::findOrfail($id);

        return view('akurasiData', [
            'data' => $data
        ]);
    }

    public function akurasi(string $id)
    {
        $data = Pasangan::findOrfail($id);
        $dataPria = DataPria::findOrFail($data->DataPria->id);
        $dataWanita = DataWanita::findOrFail($data->DataWanita->id);
        $parser = new Parser();

        //* pria kk
        if ($data->DataPria->pria__kk) {
            $path__pria_kk = storage_path('app/' . $data->DataPria->pria__kk);
            $pdf__pria_kk = $parser->parseFile($path__pria_kk);
            $get__pria_kk = $pdf__pria_kk->getText();
            $get_text__pria_kk = Str::lower($get__pria_kk);

            $match__pria_kk = Str::contains($get_text__pria_kk, ['kartu keluarga']);
            $CF__pria_kk = $match__pria_kk ? 1 : 0;
            $dataPria->pria__cf_kk = $CF__pria_kk;
        } else {
            $CF__pria_kk = 0;
        }

        //* pria ktp
        if ($data->DataPria->pria__ktp) {
            $path__pria_ktp = storage_path('app/' . $data->DataPria->pria__ktp);
            $pdf__pria_ktp = $parser->parseFile($path__pria_ktp);
            $get__pria_ktp = $pdf__pria_ktp->getText();
            $get_text__pria_ktp = Str::lower($get__pria_ktp);

            $match__pria_ktp = Str::contains($get_text__pria_ktp, ['kartu tanda penduduk']);
            $CF__pria_ktp = $match__pria_ktp ? 1 : 0;
            $dataPria->pria__cf_ktp = $CF__pria_ktp;
        } else {
            $CF__pria_ktp = 0;
        }

        //* pria akta_ayah
        if ($data->DataPria->pria__akta_ayah) {
            $path__pria_akta_ayah = storage_path('app/' . $data->DataPria->pria__akta_ayah);
            $pdf__pria_akta_ayah = $parser->parseFile($path__pria_akta_ayah);
            $get__pria_akta_ayah = $pdf__pria_akta_ayah->getText();
            $get_text__pria_akta_ayah = Str::lower($get__pria_akta_ayah);

            $match__pria_akta_ayah = Str::contains($get_text__pria_akta_ayah, ['akta ayah']);
            $CF__pria_akta_ayah = $match__pria_akta_ayah ? 1 : 0;
            $dataPria->pria__cf_akta_ayah = $CF__pria_akta_ayah;
        } else {
            $CF__pria_akta_ayah = 0;
        }


        //* pria akta_ibu
        if ($data->DataPria->pria__akta_ibu) {
            $path__pria_akta_ibu = storage_path('app/' . $data->DataPria->pria__akta_ibu);
            $pdf__pria_akta_ibu = $parser->parseFile($path__pria_akta_ibu);
            $get__pria_akta_ibu = $pdf__pria_akta_ibu->getText();
            $get_text__pria_akta_ibu = Str::lower($get__pria_akta_ibu);


            $match__pria_akta_ibu = Str::contains($get_text__pria_akta_ibu, ['akta ibu']);
            $CF__pria_akta_ibu = $match__pria_akta_ibu ? 1 : 0;
            $dataPria->pria__cf_akta_ibu = $CF__pria_akta_ibu;
        } else {
            $CF__pria_akta_ibu = 0;
        }

        //! wanita kk
        if ($data->DataWanita->wanita__kk) {
            $path__wanita_kk = storage_path('app/' . $data->DataWanita->wanita__kk);
            $pdf__wanita_kk = $parser->parseFile($path__wanita_kk);
            $get__wanita_kk = $pdf__wanita_kk->getText();
            $get_text__wanita_kk = Str::lower($get__wanita_kk);

            $match__wanita_kk = Str::contains($get_text__wanita_kk, ['kartu keluarga']);
            $CF__wanita_kk = $match__wanita_kk ? 1 : 0;
            $dataWanita->wanita__cf_kk = $CF__wanita_kk;
            // dd($get_text__wanita_kk);
        } else {
            $CF__wanita_kk = 0;
        }


        //! wanita ktp
        if ($data->DataWanita->wanita__ktp) {
            $path__wanita_ktp = storage_path('app/' . $data->DataWanita->wanita__ktp);
            $pdf__wanita_ktp = $parser->parseFile($path__wanita_ktp);
            $get__wanita_ktp = $pdf__wanita_ktp->getText();
            $get_text__wanita_ktp = Str::lower($get__wanita_ktp);

            $match__wanita_ktp = Str::contains($get_text__wanita_ktp, ['kartu tanda penduduk']);
            $CF__wanita_ktp = $match__wanita_ktp ? 1 : 0;
            $dataWanita->wanita__cf_ktp = $CF__wanita_ktp;
        } else {
            $CF__wanita_ktp = 0;
        }

        //! wanita akta_ayah
        if ($data->DataWanita->wanita__akta_ayah) {

            $path__wanita_akta_ayah = storage_path('app/' . $data->DataWanita->wanita__akta_ayah);
            $pdf__wanita_akta_ayah = $parser->parseFile($path__wanita_akta_ayah);
            $get__wanita_akta_ayah = $pdf__wanita_akta_ayah->getText();
            $get_text__wanita_akta_ayah = Str::lower($get__wanita_akta_ayah);

            $match__wanita_akta_ayah = Str::contains($get_text__wanita_akta_ayah, ['akta ayah']);
            $CF__wanita_akta_ayah = $match__wanita_akta_ayah ? 1 : 0;
            $dataWanita->wanita__cf_akta_ayah = $CF__wanita_akta_ayah;
        } else {
            $CF__wanita_akta_ayah = 0;
        }

        //! wanita akta_ibu
        if ($data->DataWanita->wanita__akta_ibu) {

            $path__wanita_akta_ibu = storage_path('app/' . $data->DataWanita->wanita__akta_ibu);
            $pdf__wanita_akta_ibu = $parser->parseFile($path__wanita_akta_ibu);
            $get__wanita_akta_ibu = $pdf__wanita_akta_ibu->getText();
            $get_text__wanita_akta_ibu = Str::lower($get__wanita_akta_ibu);

            $match__wanita_akta_ibu = Str::contains($get_text__wanita_akta_ibu, ['akta ibu']);
            $CF__wanita_akta_ibu = $match__wanita_akta_ibu ? 1 : 0;
            $dataWanita->wanita__cf_akta_ibu = $CF__wanita_akta_ibu;
        } else {

            $CF__wanita_akta_ibu = 0;
        }

        //? Hitung CF
        $CF__total = ($CF__pria_kk + $CF__pria_ktp + $CF__pria_akta_ayah + $CF__pria_akta_ibu + $CF__wanita_kk + $CF__wanita_ktp + $CF__wanita_akta_ayah + $CF__wanita_akta_ibu) / 8;

        $data['id_pria'] = $data->DataPria->id;
        $data['id_wanita'] = $data->DataWanita->id;
        $data['data_status'] = $CF__total;

        $dataPria->save();
        $dataWanita->save();
        $data->save();
        return redirect('/data')->with('success', 'Data Akurasi Diterapkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pasangan::findOrfail($id);

        return view('data-edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedDataPria = $request->validate([
            'pria__kk' => 'nullable|mimes:pdf',
            'pria__ktp' => 'nullable|mimes:pdf',
            'pria__akta_ayah' => 'nullable|mimes:pdf',
            'pria__akta_ibu' => 'nullable|mimes:pdf',
        ]);
        $validatedDataWanita = $request->validate([
            'wanita__kk' => 'nullable|mimes:pdf',
            'wanita__ktp' => 'nullable|mimes:pdf',
            'wanita__akta_ayah' => 'nullable|mimes:pdf',
            'wanita__akta_ibu' => 'nullable|mimes:pdf',
        ]);

        $pasangan = Pasangan::findOrFail($id);
        $dataPria = DataPria::findOrFail($pasangan->DataPria->id);
        $dataWanita = DataWanita::findOrFail($pasangan->DataWanita->id);

        //! Data Pria
        $dataPria->id = $request->input('pria__id');
        $dataPria->pria__nama_lengkap = $request->input('pria__nama_lengkap');

        if ($request->hasFile('pria__kk')) {
            if ($dataPria->pria__kk) {
                Storage::delete($dataPria->pria__kk);
            }
            $dataPria->pria__kk = $request->file('pria__kk')->store('kk');
        }
        if ($request->hasFile('pria__ktp')) {
            if ($dataPria->pria__ktp) {
                Storage::delete($dataPria->pria__ktp);
            }
            $dataPria->pria__ktp = $request->file('pria__ktp')->store('ktp');
        }
        if ($request->hasFile('pria__akta_ayah')) {
            if ($dataPria->pria__akta_ayah) {
                Storage::delete($dataPria->pria__akta_ayah);
            }
            $dataPria->pria__akta_ayah = $request->file('pria__akta_ayah')->store('kk');
        }
        if ($request->hasFile('pria__akta_ibu')) {
            if ($dataPria->pria__akta_ibu) {
                Storage::delete($dataPria->pria__akta_ibu);
            }
            $dataPria->pria__akta_ibu = $request->file('pria__akta_ibu')->store('kk');
        }

        //! Data Wanita
        $dataWanita->id = $request->input('wanita__id');
        $dataWanita->wanita__nama_lengkap = $request->input('wanita__nama_lengkap');

        if ($request->hasFile('wanita__kk')) {
            if ($dataWanita->wanita__kk) {
                Storage::delete($dataWanita->wanita__kk);
            }
            $dataWanita->wanita__kk = $request->file('wanita__kk')->store('kk');
        }
        if ($request->hasFile('wanita__ktp')) {
            if ($dataWanita->wanita__ktp) {
                Storage::delete($dataWanita->wanita__ktp);
            }
            $dataWanita->wanita__ktp = $request->file('wanita__ktp')->store('ktp');
        }
        if ($request->hasFile('wanita__akta_ayah')) {
            if ($dataWanita->wanita__akta_ayah) {
                Storage::delete($dataWanita->wanita__akta_ayah);
            }
            $dataWanita->wanita__akta_ayah = $request->file('wanita__akta_ayah')->store('kk');
        }
        if ($request->hasFile('wanita__akta_ibu')) {
            if ($dataWanita->wanita__akta_ibu) {
                Storage::delete($dataWanita->wanita__akta_ibu);
            }
            $dataWanita->wanita__akta_ibu = $request->file('wanita__akta_ibu')->store('kk');
        }

        // tiap perubahan data_status invalid lagi
        $pasangan['data_status'] = 0;

        $dataPria->save();
        $dataWanita->save();
        $pasangan->save();

        return redirect('/data')->with('success', 'Data Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataPasangan = Pasangan::findOrFail($id);

        $pria__id = $dataPasangan->DataPria->id;
        $wanita__id = $dataPasangan->DataWanita->id;

        $dataPria = DataPria::findOrFail($pria__id);
        $dataWanita = DataWanita::findOrFail($wanita__id);


        if ($dataPria->pria__kk) {
            Storage::delete($dataPria->pria__kk);
        }
        if ($dataPria->pria__ktp) {
            Storage::delete($dataPria->pria__ktp);
        }
        if ($dataPria->pria__akta_ayah) {
            Storage::delete($dataPria->pria__akta_ayah);
        }
        if ($dataPria->pria__akta_ibu) {
            Storage::delete($dataPria->pria__akta_ibu);
        }

        if ($dataWanita->wanita__kk) {
            Storage::delete($dataWanita->wanita__kk);
        }
        if ($dataWanita->wanita__ktp) {
            Storage::delete($dataWanita->wanita__ktp);
        }
        if ($dataWanita->wanita__akta_ayah) {
            Storage::delete($dataWanita->wanita__akta_ayah);
        }
        if ($dataWanita->wanita__akta_ibu) {
            Storage::delete($dataWanita->wanita__akta_ibu);
        }

        $dataPasangan->delete();
        $dataPria->delete();
        $dataWanita->delete();
        return redirect('/data')->with('success', 'Data Dihapus!');
    }
}
