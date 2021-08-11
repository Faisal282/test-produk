<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
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
        //
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
        $validator = Validator::make($request->all(), [
            "KodeBrg" => ["required"],
        ]);
        $errors = $validator->errors();
        $err = [];
        foreach ($errors->all() as $message) {
            array_push($err, $message);
        }
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'msg' => $err], 400);
        } else {
            $a = $request->all();
            $data = DB::table('produks')->where('id', $id)->update($request->all());
            if ($data) {
                return response()->json(['status' => 'success', 'msg' => 'success updated'], 200);
            } else {
                return response()->json(['status' => 'failed', 'msg' => 'there are something wrong', 'insight' => var_dump($data)], 400);
            }
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
        //
    }


    // dibawah ini adalah api section untuk get data dari API
    public function getAll()
    {
        $data = DB::table('produks')->get();
        return response()->json($data);
    }

    public function getDetail(Request $request, $id)
    {
        $data = DB::table('produks')->where('id', '=', $id)->get();
        return response()->json($data);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "KodeBrg" => ["required"],
        ]);
        $errors = $validator->errors();
        $err = [];
        foreach ($errors->all() as $message) {
            array_push($err, $message);
        }
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'msg' => $err], 400);
        } else {
            $a = $request->all();
            $data = DB::table('produks')->insert($request->all());
            if ($data) {
                return response()->json(['status' => 'success', 'msg' => 'success inserted'], 200);
            } else {
                return response()->json(['status' => 'failed', 'msg' => 'there are something wrong', 'insight' => var_dump($data)], 400);
            }
        }
    }

    public function delete(Request $request, $id)
    {
        $result = DB::table('produks')->where('id', '=', $id)->delete();
        if ($result) {
            return response()->json(['status' => 'success', 'msg' => 'success deleted'], 200);
        } else {
            return response()->json(['status' => 'failed', 'msg' => 'the data couldn`t find', 'insight' => $result], 400);
        }
    }
}
