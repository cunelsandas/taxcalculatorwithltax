<?php

namespace App\Http\Controllers;

use App\Models\Inputs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardmyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        echo "asfsdaffsdadf";
//        $input = Inputs::all('id','first_name','last_name','card_id','address_number','moo','soi','road','tambon','amphoe','province','zip_code','telephone')->find($id);
//        //$lands = DB::select('select * from lands where owner_id = ?',['owner_id'=>$id]);
//        $lands = DB::select('select * from lands where owner_id = ?', [$id]);
//        $landuses = DB::select('select * from lu where land_id = ?', [$id]);
//        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [$id]);
//        $inputss = Inputs::all();
//        return view('dashboard.inputs.inputShow', [ 'input' => $input,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses,'sign_boards'=>$sign_boards]);

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
        $input = Inputs::all('id','first_name','last_name','card_id','birth_date','address_number','moo','soi','road','tambon','amphoe','province','zip_code','telephone')->find($id);
        $lands = DB::select('select * from lands where owner_id = ?', [$id]);
        $landuses = DB::select('select * from lu where land_id = ?', [$id]);
        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [$id]);
        $inputss = Inputs::all();
        return view('frontend.dashboard', [ 'input' => $input,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses,'sign_boards'=>$sign_boards]);
    }

    public function confirm(Request $request)
    {
        $input = Inputs::all('id','first_name','last_name','card_id','birth_date','address_number','moo','soi','road','tambon','amphoe','province','zip_code','telephone')->find($id);
        $lands = DB::select('select * from lands where owner_id = ?', [$id]);
        $landuses = DB::select('select * from lu where land_id = ?', [$id]);
        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [$id]);
        $inputss = Inputs::all();
        return view('frontend.dashboard', [ 'input' => $input,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses,'sign_boards'=>$sign_boards]);
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
    public function myfnc(Request $request)
    {

        $myfnc = Input::get('id_card');



    }
}

