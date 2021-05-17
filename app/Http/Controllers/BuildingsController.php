<?php

namespace App\Http\Controllers;

use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inputs;
use App\Models\Lands;
use App\Models\Buildings;
use App\Models\Status;
use App\Models\Ownertype;
use App\Models\Nametitle;
use App\Models\Province;
use App\Models\Amphoe;
use App\Models\Tambon;
use App\Models\Ldoctypes;
use App\Models\Landuses;
use App\Models\Landuse_types;
use App\Models\Cultivates;
use App\Models\Building_types;
use App\Models\Building_materials;
use App\Models\Buildinguse_categorys;

use Illuminate\Validation\Rules\In;

class BuildingsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lands = Lands::with('user')->paginate( 20 );
        return view('dashboard.buildings.buildingsList', ['$lands' => $lands]);


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
        $land = Lands::all();
        $inputs = Inputs::all();
        $landuses = Landuses::all();
        $buildings = Buildings::all();
        $building_types = Building_types::all();
        $building_materials = Building_materials::all();
        return view('dashboard.buildings.create', ['statuses' => $statuses,'owner_typeses'=>$owner_typeses,'name_titleses'=>$name_titleses,
            'provinces'=>$provinces,'amphoes'=>$amphoes,'tambons'=>$tambons,'ldoc_types'=>$ldoc_types,'lands'=>$land,'inputs'=>$inputs,'landuses'=>$landuses,
            'buildings'=>$buildings]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'b_code'  ,
            'parcel_code'      ,
            'house_code'   ,
            'bt_td'     ,
            'bm_id'            ,
            'b_st'            ,
            'bstid'            ,
            'usage_id'            ,
            'village'            ,
            'bname'            ,
            'baddress'            ,
            'bmoo'           ,
            'bsoi'             ,
            'broad'           ,
            'tambon_id'          ,
            'bfloor'     ,
            'broom'     ,
            'bwidth'           ,
            'blength'          ,
            'complete_date'            ,
            'bprice',
//
//
//            //land use
//
//            'lut_id'    ,
//            'use_rai'   ,
//            'use_yawn'  ,
//            'use_wa'    ,
//            'meanprice' , //ราคากลาง ลค ใส่เองนะจ๊ะ
//            'result_landprice' , //ราคาประเมินที่ดิน
//
//            //ส่วนลดหย่อน
//            'reduce_rai'    ,
//            'reduce_yawn'    ,
//            'reduce_wa'    ,
//            'rate_per_rai' ,  //อัตราภาษีตอ่ไร่
//            'net_rai'   ,
//            'net_yawn' ,
//            'net_wa'    ,
//            'amount_tax'    ,   //ประมาณการภาษี
//            'lu_notes'      ,
//            'cid'       ,   //ประเภทพืชที่ปลูก
//            'width' ,
//            'length' ,



        ]);
//        $land = new Lands();
//        $landuses = new Landuses();
        $buildings = new Buildings();
        $user = auth()->user();

        $buildings -> b_code    = $request->input('b_code');
        $buildings -> land_id    = $request->input('land_id');
        $buildings -> parcel_code    = $request->input('parcel_code');
        $buildings -> house_code    = $request->input('house_code');
        $buildings -> bt_id    = $request->input('bt_id');
        $buildings -> bm_id    = $request->input('bm_id');
        $buildings -> b_st    = $request->input('b_st');
        $buildings -> village    = $request->input('village');
        $buildings -> bname    = $request->input('bname');
        $buildings -> baddress    = $request->input('baddress');
        $buildings -> bmoo    = $request->input('bmoo');
        $buildings -> bsoi    = $request->input('bsoi');
        $buildings -> broad    = $request->input('broad');
        $buildings -> tambon_id    = $request->input('tambon_id');
        $buildings -> bfloor    = $request->input('bfloor');
        $buildings -> broom    = $request->input('broom');
        $buildings -> bwidth    = $request->input('bwidth');
        $buildings -> blength    = $request->input('blength');
        $buildings -> bcomplete_date    = $request->input('bcomplete_date');
        $buildings -> bprice    = $request->input('bprice');



//        $land->owner_id     = $request->input('owner_id');
//        $land->co_owner     = $request->input('co_owner');
//        $land->parcel_code = $request->input('parcel_code');
//        $land->ldoc_type = $request->input('ldoc_type');
//        $land->dn     = $request->input('dn');
//        $land->lb     = $request->input('lb');
//        $land->lp     = $request->input('lp');
//        $land->rw     = $request->input('rw');
//        $land->ln     = $request->input('ln');
//        $land->sn     = $request->input('sn');
//        $land->sc     = $request->input('sc');
//        $land->moo     = $request->input('moo');
//        $land->vl     = $request->input('vl');
//        $land->soi     = $request->input('soi');
//        $land->road     = $request->input('road');
//        $land->tambon_id     = $request->input('tambon_id');
//        $land->community     = $request->input('community');
//        $land->rai     = $request->input('rai');
//        $land->yawn = $request->input('yawn');
//        $land->wa = $request->input('wa');
//        $land->rent_one_year = $request->input('rent_one_year');
//
//        //land use
//
//        $landuses->lut_id   = $request->input('lut_id');
//        $landuses->use_rai   = $request->input('use_rai');
//        $landuses->use_yawn   = $request->input('use_yawn');
//        $landuses->use_wa  = $request->input('use_wa');
//        $landuses->meanprice = $request->input('meanprice'); //ราคากลาง ลค ใส่เองนะจ๊ะ
//        $landuses->result_landprice = $request->input('result_landprice'); //ราคาประเมินที่ดิน
//
//            //ส่วนลดหย่อน
//        $landuses->reduce_rai   = $request->input('reduce_rai');
//        $landuses->reduce_yawn   = $request->input('reduce_yawn');
//        $landuses->reduce_wa    = $request->input('reduce_wa');
//        $landuses->rate_per_rai = $request->input('rate_per_rai');  //อัตราภาษีตอ่ไร่
//        $landuses->net_rai   = $request->input('net_rai');
//        $landuses->net_yawn = $request->input('net_yawn');
//        $landuses->net_wa    = $request->input('net_wa');
//        $landuses->amount_tax    = $request->input('amount_tax');   //ประมาณการภาษี
//        $landuses->lu_notes     = $request->input('lu_notes');
//        $landuses->cid       = $request->input('cid');   //ประเภทพืชที่ปลูก
//        $landuses->width = $request->input('width'); //กว้าง
//        $landuses->length = $request->input('length'); //ยาว


        $buildings->save();
       // $landuses->save();
        $request->session()->flash('message', 'Successfully edited note');
        return redirect()->route('buildings.index');
    }

    public function build(){
            return view('dashboard.manage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $land = Lands::with('user')->with('status')->with('owner_types')->find($id);
        return view('dashboard.buildings.buildingShow', [ '$land' => $land ]);

    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $land = Lands::find($id);
        $inputs = Inputs::all();
        $statuses = Status::all();
        $ldoc_types = Ldoctypes::all();
        $tambons = Tambon::all();
        $owner_typeses = Ownertype::all();
        $landuses = Landuses::all();
        $landuse_types = Landuse_types::all();
        $cultivates = Cultivates::all();
        $buildings = Buildings::all();
        $building_types = Building_types::all();
        $building_materials = Building_materials::all();
        $building_categorys = Buildinguse_categorys::all();
        return view('dashboard.buildings.edit', [ 'statuses' => $statuses,'$owner_typeses'=>$owner_typeses,'land' =>
            $land,'inputs'=>$inputs,'ldoc_types'=>$ldoc_types,'tambons'=>$tambons,'landuse_types'=>$landuse_types,'cultivates'=>$cultivates,'landuses'=>$landuses,
            'buildings'=>$buildings,'building_types'=>$building_types,'building_materials'=> $building_materials,'building_categorys'=>$building_categorys]);
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
        //var_dump('bazinga');
        //die();
        $validatedData = $request->validate([
//            'card_id'             => 'required',
//            'owner_types'         => 'required',
//            'name_titles'         => 'required',
//            'first_name'           => 'required',
//            'last_name'           => 'required',
//            'address_number'           => 'required',
//            'moo'          ,
//            'soi'           ,
//            'road'          ,
//            'province'           => 'required',
//            'amphoe'           => 'required',
//            'tambon'           => 'required',
//            'community'          ,
//            'zip_code'         => 'required' ,
//            'telephone'         ,
//            'fax'         ,
//            'email'         ,
//            'status_id'         => 'required'

            'co_owner'      ,
            'parcel_code'   ,
            'ldoc_type'     ,
            'dn'            ,
            'lb'            ,
            'lp'            ,
            'rw'            ,
            'ln'            ,
            'sn'            ,
            'sc'            ,
            'moo'           ,
            'vl'             ,
            'soi'           ,
            'road'          ,
            'tambon_id'     ,
            'community'     ,
            'rai'           ,
            'yawn'          ,
            'wa'            ,
            'rent_one_year',


            //land use

            'lut_id'    ,
            'use_rai'   ,
            'use_yawn'  ,
            'use_wa'    ,
            'meanprice' , //ราคากลาง ลค ใส่เองนะจ๊ะ
            'result_landprice' , //ราคาประเมินที่ดิน

            //ส่วนลดหย่อน
            'reduce_rai'    ,
            'reduce_yawn'    ,
            'reduce_wa'    ,
            'rate_per_rai' ,  //อัตราภาษีตอ่ไร่
            'net_rai'   ,
            'net_yawn' ,
            'net_wa'    ,
            'amount_tax'    ,   //ประมาณการภาษี
            'lu_notes'      ,
            'cid'       ,   //ประเภทพืชที่ปลูก
            'width' ,
            'length'

        ]);
        $land = Lands::find($id);
        $landuses = Landuses::find($id);
        $land->co_owner     = $request->input('co_owner');
        $land->parcel_code = $request->input('parcel_code');
        $land->ldoc_type = $request->input('ldoc_type');
        $land->dn     = $request->input('dn');
        $land->lb     = $request->input('lb');
        $land->lp     = $request->input('lp');
        $land->rw     = $request->input('rw');
        $land->ln     = $request->input('ln');
        $land->sn     = $request->input('sn');
        $land->sc     = $request->input('sc');
        $land->moo     = $request->input('moo');
        $land->vl     = $request->input('vl');
        $land->soi     = $request->input('soi');
        $land->road     = $request->input('road');
        $land->tambon_id     = $request->input('tambon_id');
        $land->community     = $request->input('community');
        $land->rai     = $request->input('rai');
        $land->yawn = $request->input('yawn');
        $land->wa = $request->input('wa');
        $land->rent_one_year = $request->input('rent_one_year');


        $landuses->lut_id   = $request->input('lut_id');
        $landuses->use_rai   = $request->input('use_rai');
        $landuses->use_yawn   = $request->input('use_yawn');
        $landuses->use_wa  = $request->input('use_wa');
        $landuses->meanprice = $request->input('meanprice'); //ราคากลาง ลค ใส่เองนะจ๊ะ
        $landuses->result_landprice = $request->input('result_landprice'); //ราคาประเมินที่ดิน

        //ส่วนลดหย่อน
        $landuses->reduce_rai   = $request->input('reduce_rai');
        $landuses->reduce_yawn   = $request->input('reduce_yawn');
        $landuses->reduce_wa    = $request->input('reduce_wa');
        $landuses->rate_per_rai = $request->input('rate_per_rai');  //อัตราภาษีตอ่ไร่
        $landuses->net_rai   = $request->input('net_rai');
        $landuses->net_yawn = $request->input('net_yawn');
        $landuses->net_wa    = $request->input('net_wa');
        $landuses->amount_tax    = $request->input('amount_tax');   //ประมาณการภาษี
        $landuses->lu_notes     = $request->input('lu_notes');
        $landuses->cid       = $request->input('cid');   //ประเภทพืชที่ปลูก
        $landuses->width = $request->input('width'); //กว้าง
        $landuses->length = $request->input('length'); //ยาว
        $land->save();
        $landuses->save();
        $request->session()->flash('message', 'Successfully edited note');
        return redirect()->route('buildings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input = Inputs::find($id);
        if($input){
            $input->delete();
        }
        return redirect()->route('inputs.index');
    }
}
