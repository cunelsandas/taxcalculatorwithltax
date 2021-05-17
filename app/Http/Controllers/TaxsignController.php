<?php

namespace App\Http\Controllers;

use App\Models\Amphoe;
use App\Models\Building_materials;
use App\Models\Building_types;
use App\Models\Buildinguse_categorys;
use App\Models\Cultivates;
use App\Models\Depreciations;
use App\Models\Inputs;
use App\Models\Lands;
use App\Models\Landuse_types;
use App\Models\Landuses;
use App\Models\Ldoctypes;
use App\Models\Nametitle;
use App\Models\Ownertype;
use App\Models\Province;
use App\Models\Sign_boards;
use App\Models\Sign_types;
use App\Models\Status;
use App\Models\Tambon;
use App\Models\Year_depreciations;
use Illuminate\Http\Request;

class TaxsignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signs_boards = Sign_boards::with('user')->paginate( 20 );
        $sign_types = Sign_types::all();
        $inputs = Inputs::all();
        return view('backend.taxsign.edit', ['signs_boards' => $signs_boards,'sign_types'=>$sign_types,'inputs'=>$inputs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        $owner_typeses = Ownertype::all();
        $name_titleses = Nametitle::all();
        $provinces = Province::all();
        $amphoes = Amphoe::all();
        $tambons = Tambon::all();
        $ldoc_types = Ldoctypes::all();
        $lands = Lands::all();
        $inputs = Inputs::all();
        $landuses = Landuses::all();
        $landuse_types = Landuse_types::all();
        $cultivates = Cultivates::all();
        $building_types = Building_types::all();
        $building_materials = Building_materials::all();
        $building_categorys = Buildinguse_categorys::all();
        $year_depreciations = Year_depreciations::all();
        $depreciations = Depreciations::all();
        return view('dashboard.lands.create', ['statuses' => $statuses,'owner_typeses'=>$owner_typeses,'name_titleses'=>$name_titleses,
            'provinces'=>$provinces,'amphoes'=>$amphoes,'tambons'=>$tambons,'ldoc_types'=>$ldoc_types,'lands'=>$lands,'inputs'=>$inputs,'landuses'=>$landuses,'landuse_types'=>$landuse_types,'cultivates'=>$cultivates,'landuses'=>$landuses,
            'building_types'=>$building_types,'building_materials'=> $building_materials,'building_categorys'=>$building_categorys,'year_depreciations'=>$year_depreciations,'depreciations'=>$depreciations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([

            'owner_id',
            's_name' ,
            'b_code' ,
            'address' ,
            'setup_date' ,
            'moo' ,
            'soi' ,
            'road' ,
            'tambon_id' ,
            'nearby' ,
            'bkm' ,
            's_option' ,
            's_character' ,
            'sign_type_id' ,
            'sw' ,
            'sl' ,
            'area' ,
            'no_side' ,
            's_desc' ,
            'sm' ,
            'tax' ,
            'note',
            'tax_status'

        ]);



// 'owner_id2' => $request->get('owner_id'),
// 'parcel_code' => $request->get('parcel_code'),

        $sign_boards = new Sign_boards();
        $user = auth()->user();
        $sign_boards->owner_id = $request->input('owner_id');
        $sign_boards->s_name = $request->input('s_name');
        $sign_boards->b_code = $request->input('b_code');
        $sign_boards->address = $request->input('address');
        $sign_boards->setup_date = $request->input('setup_date');
        $sign_boards->moo = $request->input('moo');
        $sign_boards->soi = $request->input('soi');
        $sign_boards->road = $request->input('road');
        $sign_boards->tambon_id = $request->input('tambon_id');
        $sign_boards->nearby = $request->input('nearby');
        $sign_boards->bkm = $request->input('bkm');
        $sign_boards->s_option = $request->input('s_option');
        $sign_boards->s_character = $request->input('s_character');
        $sign_boards->sign_type_id = $request->input('sign_type_id');
        $sign_boards->sw = $request->input('sw');
        $sign_boards->sl = $request->input('sl');
        $sign_boards->area = $request->input('area');
        $sign_boards->no_side = $request->input('no_side');
        $sign_boards->s_desc = $request->input('s_desc');
        $sign_boards->sm = $request->input('sm');
        $sign_boards->tax = $request->input('tax');
        $sign_boards->note = $request->input('note');
        $sign_boards->tax_status = $request->input('tax_status');
        $sign_boards->save();
        $request->session()->flash('message', 'Successfully edited note');
        return redirect()->route('inputs.index');

    }

    /**
     * Display the specified resource.
     *เ
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
        $land = Lands::all();
        $inputs = Inputs::find($id);
        $statuses = Status::all();
        $ldoc_types = Ldoctypes::all();
        $tambons = Tambon::all();
        $owner_typeses = Ownertype::all();
        $landuses = Landuses::all();
        $landuse_types = Landuse_types::all();
        $cultivates = Cultivates::all();
        $sign_types = Sign_types::all();
        return view('backend.taxsign.edit', ['statuses' => $statuses, '$owner_typeses' => $owner_typeses, 'land' =>
            $land, 'inputs' => $inputs, 'ldoc_types' => $ldoc_types, 'tambons' => $tambons, 'landuse_types' => $landuse_types, 'cultivates' => $cultivates, 'landuses' => $landuses,
            'sign_types' => $sign_types]);
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
//var_dump('cunel');
//die();
        $validatedData = $request->validate([

            'owner_id',
            's_name' ,
            'b_code' ,
            'address' ,
            'setup_date' ,
            'moo' ,
            'soi' ,
            'road' ,
            'tambon_id' ,
            'nearby' ,
            'bkm' ,
            's_option' ,
            's_character' ,
            'sign_type_id' ,
            'sw' ,
            'sl' ,
            'area' ,
            'no_side' ,
            's_desc' ,
            'sm' ,
            'tax' ,
            'note',
            'tax_status'

        ]);

        $sign_boards = new Sign_boards();
        $user = auth()->user();
        $sign_boards->owner_id = $request->input('owner_id');
        $sign_boards->s_name = $request->input('s_name');
        $sign_boards->b_code = $request->input('b_code');
        $sign_boards->address = $request->input('address');
        $sign_boards->setup_date = $request->input('setup_date');
        $sign_boards->moo = $request->input('moo');
        $sign_boards->soi = $request->input('soi');
        $sign_boards->road = $request->input('road');
        $sign_boards->tambon_id = $request->input('tambon_id');
        $sign_boards->nearby = $request->input('nearby');
        $sign_boards->bkm = $request->input('bkm');
        $sign_boards->s_option = $request->input('s_option');
        $sign_boards->s_character = $request->input('s_character');
        $sign_boards->sign_type_id = $request->input('sign_type_id');
        $sign_boards->sw = $request->input('sw');
        $sign_boards->sl = $request->input('sl');
        $sign_boards->area = $request->input('area');
        $sign_boards->no_side = $request->input('no_side');
        $sign_boards->s_desc = $request->input('s_desc');
        $sign_boards->sm = $request->input('sm');
        $sign_boards->tax = $request->input('tax');
        $sign_boards->note = $request->input('note');
        $sign_boards->tax_status = $request->input('tax_status');
        $sign_boards->save();
        $request->session()->flash('message', 'Successfully edited note');
        return redirect()->route('inputs.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sign_boards = Sign_boards::find($id);
        if($sign_boards){
            $sign_boards->delete();
        }
        return redirect()->route('inputs.index');
    }


}
