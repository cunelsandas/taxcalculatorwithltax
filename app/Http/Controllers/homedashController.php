<?php

namespace App\Http\Controllers;

use App\Models\Inputs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class homedashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function myfnc(Request $request)
    {

        $myfnc2 = $request->card_id;
        $myfnc3 = $request->birth_date;


        $inputs = DB::select('select * from inputs where card_id = ? AND birth_date = ?', [$myfnc2,$myfnc3]);

        $inputs2 = DB::select('select id from inputs where card_id = ? AND birth_date = ?', [$myfnc2,$myfnc3]);

        foreach ($inputs2 as $inputs2) {
        }

        $lands = DB::select('select * from lands where owner_id = ?', [$inputs2->id]);
        $landuses = DB::select('select * from lu where land_id = ?', [$inputs2->id]);
        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [$inputs2->id]);
        return view('frontend.dashboard', ['inputs' => $inputs, 'lands' => $lands, 'landuses' => $landuses, 'sign_boards' => $sign_boards]);
    }

    public static function confirm(Request $request)
    {

        $myfnc2 = $request->card_id;
        $myfnc3 = $request->birth_date;


        $inputs = DB::select('select * from inputs where card_id = ? AND birth_date = ?', [$myfnc2,$myfnc3]);

        $inputs2 = DB::select('select id from inputs where card_id = ? AND birth_date = ?', [$myfnc2,$myfnc3]);

        foreach ($inputs2 as $inputs2) {
        }

        $lands = DB::select('select * from lands where owner_id = ?', [$inputs2->id]);
        $landuses = DB::select('select * from lu where land_id = ?', [$inputs2->id]);
        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [$inputs2->id]);
        return view('confirm', ['inputs' => $inputs, 'lands' => $lands, 'landuses' => $landuses, 'sign_boards' => $sign_boards]);
    }

    public static function cancel(Request $request)
    {

        $myfnc2 = $request->card_id;
        $myfnc3 = $request->birth_date;


        $inputs = DB::select('select * from inputs where card_id = ? AND birth_date = ?', [$myfnc2,$myfnc3]);

        $inputs2 = DB::select('select id from inputs where card_id = ? AND birth_date = ?', [$myfnc2,$myfnc3]);

        foreach ($inputs2 as $inputs2) {
        }

        $lands = DB::select('select * from lands where owner_id = ?', [$inputs2->id]);
        $landuses = DB::select('select * from lu where land_id = ?', [$inputs2->id]);
        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [$inputs2->id]);
        return view('frontend.dashboard', ['inputs' => $inputs, 'lands' => $lands, 'landuses' => $landuses, 'sign_boards' => $sign_boards]);
    }
}
