<?php

namespace App\Http\Controllers;

use App\Models\Tikon;
use Illuminate\Http\Request;

class TikonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tikon::all();

        return response()->json([
            "message" => "Load data success",
            "data" => $data
        ], 200);
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
        $table = new Tikon();
        $table->judul = $request->judul;
        $table->deskripsi = $request->deskripsi;
        $table->class = $request->class;
        $table->tanggal_konser = $request->tanggal_konser;
        $table->harga_tiket = $request->harga_tiket;
        $table->jumlah = $request->jumlah;
        $table->save();

        //return $table;
        return response()->json([
            "message" => "Store success",
            "data" => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Tikon::find($id);
        if($table){
            return $table;
        } else{
            return ["message" => "Data not found"];
        }
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
        $update = Tikon::where('id', $id) -> update($request -> all());
        if($update){
            return response([
                "message" => "Data berhasil diupdate"
            ]);
        } else {
            return ["message" => "Data not found"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Tikon::find($id);
        if($table){
            $table->delete();
            return ["message" => "Delete success"];
        } else{
            return ["message" => "Data not found"];
        }
    }
}
