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

        // pria pdf
        $validatedDataPria['id'] = $request['pria__id'];
        $validatedDataPria['nama_lengkap'] = $request['pria__nama'];

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

        // wanita pdf
        $validatedDataWanita['id'] = $request['wanita__id'];
        $validatedDataWanita['nama_lengkap'] = $request['wanita__nama'];

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
        $data = Pasangan::findOrfail($id);

        return view('akurasiData', [
            'data' => $data
        ]);
    }

    public function akurasi(string $id)
    {
        $data = Pasangan::findOrfail($id);
        $parser = new Parser();

        //* pria kk
        if ($data->DataPria->kk) {
            $path__pria_kk = storage_path('app/' . $data->DataPria->kk);
            $pdf__pria_kk = $parser->parseFile($path__pria_kk);
            $get__pria_kk = $pdf__pria_kk->getText();
            $get_text__pria_kk = Str::lower($get__pria_kk);

            $match__pria_kk = Str::contains($get_text__pria_kk, ['kartu keluarga']);

            $CF__pria_kk = $match__pria_kk ? 1 : 0;
        } else {
            $CF__pria_kk = 0;
        }

        //* pria ktp
        if ($data->DataPria->ktp) {
            $path__pria_ktp = storage_path('app/' . $data->DataPria->ktp);
            $pdf__pria_ktp = $parser->parseFile($path__pria_ktp);
            $get__pria_ktp = $pdf__pria_ktp->getText();
            $get_text__pria_ktp = Str::lower($get__pria_ktp);

            $match__pria_ktp = Str::contains($get_text__pria_ktp, ['kartu tanda penduduk']);
            $CF__pria_ktp = $match__pria_ktp ? 1 : 0;
        } else {
            $CF__pria_ktp = 0;
        }

        //* pria akta_ayah
        if ($data->DataPria->akta_ayah) {
            $path__pria_akta_ayah = storage_path('app/' . $data->DataPria->akta_ayah);
            $pdf__pria_akta_ayah = $parser->parseFile($path__pria_akta_ayah);
            $get__pria_akta_ayah = $pdf__pria_akta_ayah->getText();
            $get_text__pria_akta_ayah = Str::lower($get__pria_akta_ayah);

            $match__pria_akta_ayah = Str::contains($get_text__pria_akta_ayah, ['akta ayah']);
            $CF__pria_akta_ayah = $match__pria_akta_ayah ? 1 : 0;
        } else {
            $CF__pria_akta_ayah = 0;
        }


        //* pria akta_ibu
        if ($data->DataPria->akta_ibu) {
            $path__pria_akta_ibu = storage_path('app/' . $data->DataPria->akta_ibu);
            $pdf__pria_akta_ibu = $parser->parseFile($path__pria_akta_ibu);
            $get__pria_akta_ibu = $pdf__pria_akta_ibu->getText();
            $get_text__pria_akta_ibu = Str::lower($get__pria_akta_ibu);


            $match__pria_akta_ibu = Str::contains($get_text__pria_akta_ibu, ['akta ibu']);

            $CF__pria_akta_ibu = $match__pria_akta_ibu ? 1 : 0;
        } else {
            $CF__pria_akta_ibu = 0;
        }

        //! wanita kk
        if ($data->DataWanita->kk) {
            $path__wanita_kk = storage_path('app/' . $data->DataWanita->kk);
            $pdf__wanita_kk = $parser->parseFile($path__wanita_kk);
            $get__wanita_kk = $pdf__wanita_kk->getText();
            $get_text__wanita_kk = Str::lower($get__wanita_kk);

            $match__wanita_kk = Str::contains($get_text__wanita_kk, ['kartu keluarga']);

            $CF__wanita_kk = $match__wanita_kk ? 1 : 0;
            // dd($get_text__wanita_kk);
        } else {
            $CF__wanita_kk = 0;
        }


        //! wanita ktp
        if ($data->DataWanita->ktp) {
            $path__wanita_ktp = storage_path('app/' . $data->DataWanita->ktp);
            $pdf__wanita_ktp = $parser->parseFile($path__wanita_ktp);
            $get__wanita_ktp = $pdf__wanita_ktp->getText();
            $get_text__wanita_ktp = Str::lower($get__wanita_ktp);

            $match__wanita_ktp = Str::contains($get_text__wanita_ktp, ['kartu tanda penduduk']);
            $CF__wanita_ktp = $match__wanita_ktp ? 1 : 0;
        } else {
            $CF__wanita_ktp = 0;
        }

        //! wanita akta_ayah
        if ($data->DataWanita->akta_ayah) {

            $path__wanita_akta_ayah = storage_path('app/' . $data->DataWanita->akta_ayah);
            $pdf__wanita_akta_ayah = $parser->parseFile($path__wanita_akta_ayah);
            $get__wanita_akta_ayah = $pdf__wanita_akta_ayah->getText();
            $get_text__wanita_akta_ayah = Str::lower($get__wanita_akta_ayah);

            $match__wanita_akta_ayah = Str::contains($get_text__wanita_akta_ayah, ['akta ayah']);

            $CF__wanita_akta_ayah = $match__wanita_akta_ayah ? 1 : 0;
        } else {
            $CF__wanita_akta_ayah = 0;
        }

        //! wanita akta_ibu
        if ($data->DataWanita->akta_ibu) {

            $path__wanita_akta_ibu = storage_path('app/' . $data->DataWanita->akta_ibu);
            $pdf__wanita_akta_ibu = $parser->parseFile($path__wanita_akta_ibu);
            $get__wanita_akta_ibu = $pdf__wanita_akta_ibu->getText();
            $get_text__wanita_akta_ibu = Str::lower($get__wanita_akta_ibu);

            $match__wanita_akta_ibu = Str::contains($get_text__wanita_akta_ibu, ['akta ibu']);

            $CF__wanita_akta_ibu = $match__wanita_akta_ibu ? 1 : 0;
        } else {

            $CF__wanita_akta_ibu = 0;
        }

        //? Hitung CF
        $CF__total = ($CF__pria_kk + $CF__pria_ktp + $CF__pria_akta_ayah + $CF__pria_akta_ibu + $CF__wanita_kk + $CF__wanita_ktp + $CF__wanita_akta_ayah + $CF__wanita_akta_ibu) / 8;
        // dd($CF__pria_kk, $CF__pria_ktp, $CF__pria_akta_ayah, $CF__pria_akta_ibu, $CF__wanita_kk, $CF__wanita_ktp, $CF__wanita_akta_ayah, $CF__wanita_akta_ibu);
        $data['id_pria'] = $data->DataPria->id;
        $data['id_wanita'] = $data->DataWanita->id;
        $data['data_status'] = $CF__total;

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
        $pasangan = Pasangan::findOrFail($id);
        $dataPria = DataPria::findOrFail($pasangan->DataPria->id);
        $dataWanita = DataWanita::findOrFail($pasangan->DataWanita->id);

        //! Data Pria
        $dataPria->id = $request->input('pria__id');
        $dataPria->nama_lengkap = $request->input('pria__nama');

        if ($request->hasFile('pria__kk')) {
            if ($dataPria->kk) {
                Storage::delete($dataPria->kk);
            }
            $dataPria->kk = $request->file('pria__kk')->store('kk');
        }
        if ($request->hasFile('pria__ktp')) {
            if ($dataPria->ktp) {
                Storage::delete($dataPria->ktp);
            }
            $dataPria->ktp = $request->file('pria__ktp')->store('ktp');
        }
        if ($request->hasFile('pria__akta-ayah')) {
            if ($dataPria->akta_ayah) {
                Storage::delete($dataPria->akta_ayah);
            }
            $dataPria->akta_ayah = $request->file('pria__akta-ayah')->store('kk');
        }
        if ($request->hasFile('pria__akta-ibu')) {
            if ($dataPria->akta_ibu) {
                Storage::delete($dataPria->akta_ibu);
            }
            $dataPria->akta_ibu = $request->file('pria__akta-ibu')->store('kk');
        }

        //! Data Wanita
        $dataWanita->id = $request->input('wanita__id');
        $dataWanita->nama_lengkap = $request->input('wanita__nama');

        if ($request->hasFile('wanita__kk')) {
            if ($dataWanita->kk) {
                Storage::delete($dataWanita->kk);
            }
            $dataWanita->kk = $request->file('wanita__kk')->store('kk');
        }
        if ($request->hasFile('wanita__ktp')) {
            if ($dataWanita->ktp) {
                Storage::delete($dataWanita->ktp);
            }
            $dataWanita->ktp = $request->file('wanita__ktp')->store('ktp');
        }
        if ($request->hasFile('wanita__akta-ayah')) {
            if ($dataWanita->akta_ayah) {
                Storage::delete($dataWanita->akta_ayah);
            }
            $dataWanita->akta_ayah = $request->file('wanita__akta-ayah')->store('kk');
        }
        if ($request->hasFile('wanita__akta-ibu')) {
            if ($dataWanita->akta_ibu) {
                Storage::delete($dataWanita->akta_ibu);
            }
            $dataWanita->akta_ibu = $request->file('wanita__akta-ibu')->store('kk');
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


        if ($dataPria->kk) {
            Storage::delete($dataPria->kk);
        }
        if ($dataPria->ktp) {
            Storage::delete($dataPria->ktp);
        }
        if ($dataPria->akta_ayah) {
            Storage::delete($dataPria->akta_ayah);
        }
        if ($dataPria->akta_ibu) {
            Storage::delete($dataPria->akta_ibu);
        }

        if ($dataWanita->kk) {
            Storage::delete($dataWanita->kk);
        }
        if ($dataWanita->ktp) {
            Storage::delete($dataWanita->ktp);
        }
        if ($dataWanita->akta_ayah) {
            Storage::delete($dataWanita->akta_ayah);
        }
        if ($dataWanita->akta_ibu) {
            Storage::delete($dataWanita->akta_ibu);
        }

        $dataPasangan->delete();
        $dataPria->delete();
        $dataWanita->delete();
        return redirect('/data')->with('success', 'Data Dihapus!');
    }
}
