<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $param;
    public function index()
    {
        return view('profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = strtolower($request->profile);

        $dataArray = explode(' ', $data);

        $name = '';
        $city = '';

        $remove = ['tahun', 'th', 'thn'];
        $dataArray = array_diff($dataArray, $remove);

        $angka = array_filter($dataArray, function ($nilai) {
            return is_numeric($nilai);
        });

        $indeksAngka = array_keys(array_intersect($dataArray, $angka));
        
        $indexNumeric = $indeksAngka[0];

        $nama = implode(' ', array_slice($dataArray, 0, $indexNumeric));
    
        $kota = implode(' ', array_slice($dataArray, $indexNumeric + 1));
        $age = null;
        if (!empty($angka)) {
            $age = reset($angka);
        }
        

        $profile = Profile::create([
            'name' => strtoupper($nama),
            'age' => $age,
            'city' => strtoupper($kota),
        ]);

        return redirect()->back()->withStatus('Berhasil menambahkan data');

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
        //
    }
}
