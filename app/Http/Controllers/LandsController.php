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
use App\Models\Year_depreciations;
use App\Models\Depreciations;

use Illuminate\Validation\Rules\In;

class landsController extends Controller
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
     *
     */
    public function index()
    {
        //$lands = Lands::with('user')->paginate( 20 );
        $lands = Lands::with('user')->paginate( 20 );
        $inputs = Inputs::with('user')->with('inputs');
        return view('dashboard.inputs.inputsList', ['lands' => $lands,'inputs'=>$inputs]);


    }

    /**
     * Show the form for creating a new resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $statuses = Status::all();
        $owner_typeses = Ownertype::all();
        $name_titleses = Nametitle::all();
        $provinces = Province::all();
        $amphoes = Amphoe::all();
        $tambons = Tambon::all();
        $ldoc_types = Ldoctypes::all();
        $lands = Lands::all();
        $inputs = Inputs::find($id);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'owner_id'  ,
            'co_owner'      ,
            'parcel_code'   ,
            'ldoc_type'     ,
            'dn'            ,
            'lb'            ,
            'lp'            ,
            'rw'        ,
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
            'square_1' ,
            'meanprice_vl'  ,
            'rent_one_year',
            'tax_lu'   ,
            'tax_bu'    ,
            'tax_per_rai' ,
            'result_landprice_lands'  ,




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
            'width'=> 'numeric' ,
            'length'     => 'numeric',
            'result-wl' => 'numeric',
            'meanprice-wl' => 'numeric',
            'result_buildprice' => 'numeric',
            'result_final' => 'numeric',
            'result_ratio' => 'numeric'


        ]);
        $lands = new Lands();
        $landuses = new Landuses();
        $user = auth()->user();
        $lands->co_owner     = $request->input('co_owner');
        $lands->parcel_code = $request->input('parcel_code');
        $lands->ldoc_type = $request->input('ldoc_type');
        $lands->dn     = $request->input('dn');
        $lands->lb     = $request->input('lb');
        $lands->lp     = $request->input('lp');
        $lands->rw     = $request->input('rw');
        $lands->ln     = $request->input('ln');
        $lands->sn     = $request->input('sn');
        $lands->sc     = $request->input('sc');
        $lands->moo     = $request->input('moo');
        $lands->vl     = $request->input('vl');
        $lands->soi     = $request->input('soi');
        $lands->road     = $request->input('road');
        $lands->tambon_id     = $request->input('tambon_id');
        $lands->community     = $request->input('community');
        $lands->rai     = $request->input('rai');
        $lands->yawn = $request->input('yawn');
        $lands->wa = $request->input('wa');
        $lands->square_1 = $request->input('square_1');
        $lands->meanprice_vl = $request->input('meanprice_vl');
        $lands->result_landprice_lands = $request->input('result_landprice_lands');
        $lands->tax_lu = $request->input('tax_lu');
        $lands->tax_bu = $request->input('tax_bu');
        $lands->tax_per_rai = $request->input('tax_per_rai');
        $lands->rent_one_year = $request->input('rent_one_year');

        //land use
        $landuses->lut_id   = $request->input('lut_id');
        $landuses->use_rai   = $request->input('use_rai');
        $landuses->use_yawn   = $request->input('use_yawn');
        $landuses->use_wa  = $request->input('use_wa');
        $landuses->meanprice = $request->input('meanprice'); //ราคากลาง ลค ใส่เองนะจ๊ะ
        $landuses->result_landprice = $request->input('result_landprice'); //ราคาประเมินที่ดิน

        $landuses->result_wl   = $request->input('result-wl');
        $landuses->meanprice_wl   = $request->input('meanprice-wl');
        $landuses->result_buildprice   = $request->input('result_buildprice');
        $landuses->result_final   = $request->input('result_final');
        $landuses->result_buildratio   = $request->input('result_buildratio');

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

        $lands->save();
        $landuses->save();
        $request->session()->flash('message', 'Successfully edited note');
        return redirect()->route('lands.index');
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
        $lands = Lands::all()->find($id);
        $landss = Lands::all();
        $inputs = Inputs::find($id);
        $statuses = Status::all();
        $ldoc_types = Ldoctypes::all();
        $tambons = Tambon::all();
        $owner_typeses = Ownertype::all();
        $landuses = Landuses::all();
        $landuse_types = Landuse_types::all();
        $cultivates = Cultivates::all();
        $building_types = Building_types::all();
        $building_materials = Building_materials::all();
        $building_categorys = Buildinguse_categorys::all();
        $year_depreciations = Year_depreciations::all();
        $depreciations = Depreciations::all();
        return view('dashboard.lands.landShow', [ 'statuses' => $statuses,'$owner_typeses'=>$owner_typeses,'lands' =>
            $lands,'landss'=>$landss,'inputs'=>$inputs,'ldoc_types'=>$ldoc_types,'tambons'=>$tambons,'landuse_types'=>$landuse_types,'cultivates'=>$cultivates,'landuses'=>$landuses,
            'building_types'=>$building_types,'building_materials'=> $building_materials,'building_categorys'=>$building_categorys,'year_depreciations'=>$year_depreciations,'depreciations'=>$depreciations ]);

    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lands = Lands::all();
        $landss = Lands::all();
        $inputs = Inputs::find($id);
        $statuses = Status::all();
        $ldoc_types = Ldoctypes::all();
        $tambons = Tambon::all();
        $owner_typeses = Ownertype::all();
        $landuses = Landuses::all();
        $landuse_types = Landuse_types::all();
        $cultivates = Cultivates::all();
        $building_types = Building_types::all();
        $building_materials = Building_materials::all();
        $building_categorys = Buildinguse_categorys::all();
        $year_depreciations = Year_depreciations::all();
        $depreciations = Depreciations::all();
        return view('dashboard.lands.edit', [ 'statuses' => $statuses,'$owner_typeses'=>$owner_typeses,'lands' =>
            $lands,'landss'=>$landss,'inputs'=>$inputs,'ldoc_types'=>$ldoc_types,'tambons'=>$tambons,'landuse_types'=>$landuse_types,'cultivates'=>$cultivates,'landuses'=>$landuses,
            'building_types'=>$building_types,'building_materials'=> $building_materials,'building_categorys'=>$building_categorys,'year_depreciations'=>$year_depreciations,'depreciations'=>$depreciations ]);
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
        //var_dump('cunel');
        //die();
        $validatedData = $request->validate([
            'owner_id'  ,
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
            'square_1'      ,
            'meanprice_vl'  ,
            'rent_one_year',
            'tax_lu'   ,
            'tax_bu'    ,
            'tax_per_rai' ,
            'result_landprice_lands'  ,


            //land use

            //add เพิ่ม
            'house_code' ,
            'build_code',
            'parcel_b_code',
            'build_name',
            'b_number',
            'b_soi',
            'b_road',
            'b_community',
            'building_use_name',
            'building_type_name',

            'b_room',
            'b_floor',
            'b_finish',
            'b_price',





            'lut_id'    ,
            'use_rai'   ,
            'use_yawn'  ,
            'use_wa'    ,
            'result_square',
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
            'length',
            'result-wl' ,
            'meanprice-wl',
            'result_buildprice' => 'numeric|nullable',
            'depreciation',
            'result_real',
            'result_final' => 'numeric|nullable',
            'buildratio' ,
            'result-buildratio' => 'numeric|nullable',
            'tax_exem'  ,
            'result_real_final',
            'tax_final_percent',

            'sum_pay_land_tax' => 'numeric|nullable',
            'tax'
        ]);

//        ทำยังไงถึงจะ edit ได้ ในเมื่อใช้ function edit อยู่

        $lands = new Lands();
        $landuses = new Landuses();


        $lands->owner_id     = $request->input('owner_id');
        $lands->co_owner     = $request->input('co_owner');
        $lands->parcel_code = $request->input('parcel_code');
        $lands->ldoc_type = $request->input('ldoc_type');
        $lands->dn     = $request->input('dn');
        $lands->lb     = $request->input('lb');
        $lands->lp     = $request->input('lp');
        $lands->rw     = $request->input('rw');
        $lands->ln     = $request->input('ln');
        $lands->sn     = $request->input('sn');
        $lands->sc     = $request->input('sc');
        $lands->moo     = $request->input('moo');
        $lands->vl     = $request->input('vl');
        $lands->soi     = $request->input('soi');
        $lands->road     = $request->input('road');
        $lands->tambon_id     = $request->input('tambon_id');
        $lands->community     = $request->input('community');
        $lands->rai     = $request->input('rai');
        $lands->yawn = $request->input('yawn');
        $lands->wa = $request->input('wa');
        $lands->square_1 = $request->input('square_1');
        $lands->meanprice_vl = $request->input('meanprice_vl');
        $lands->result_landprice_lands = $request->input('result_landprice_lands');
        $lands->tax_lu = $request->input('tax_lu');
        $lands->tax_bu = $request->input('tax_bu');
        $lands->tax_per_rai = $request->input('tax_per_rai');
        $lands->rent_one_year = $request->input('rent_one_year');



///add เพิ่ม
        $landuses->house_code     = $request->input('house_code');
        $landuses->build_code   = $request->input('build_code');
        $landuses->parcel_b_code   = $request->input('parcel_b_code');
        $landuses->build_name   = $request->input('build_name');
        $landuses->b_number  = $request->input('b_number');
        $landuses->b_soi = $request->input('b_soi'); //ราคากลาง ลค ใส่เองนะจ๊ะ
        $landuses->b_road = $request->input('b_road'); //ราคาประเมินที่ดิน
        $landuses->b_community   = $request->input('b_community');
        $landuses->building_use_name   = $request->input('building_use_name');
        $landuses->building_type_name   = $request->input('building_type_name');
        $landuses->bm_id   = $request->input('bm_id');
        $landuses->b_room   = $request->input('b_room');
        $landuses->b_floor   = $request->input('b_floor');
        $landuses->b_finish  = $request->input('b_finish');
        $landuses->b_price = $request->input('b_price'); //ราคากลาง ลค ใส่เองนะจ๊ะ




        $landuses->land_id     = $request->input('land_id');
        $landuses->lut_id   = $request->input('lut_id');
        $landuses->use_rai   = $request->input('use_rai');
        $landuses->use_yawn   = $request->input('use_yawn');
        $landuses->use_wa  = $request->input('use_wa');
        $landuses->result_square  = $request->input('result_square');
        $landuses->meanprice = $request->input('meanprice'); //ราคากลาง ลค ใส่เองนะจ๊ะ
        $landuses->result_landprice = $request->input('result_landprice'); //ราคาประเมินที่ดิน

        $landuses->result_wl   = $request->input('result-wl');
        $landuses->meanprice_wl   = $request->input('meanprice-wl');
        $landuses->result_buildprice   = $request->input('result_buildprice');
        $landuses->depreciation   = $request->input('depreciation');
        $landuses->result_real   = $request->input('result_real');
        $landuses->result_final   = $request->input('result_final');
        $landuses->buildratio   = $request->input('buildratio');
        $landuses->result_buildratio   = $request->input('result_buildratio');

        $landuses->tax_exem   = $request->input('tax_exem');
        $landuses->result_real_final   = $request->input('result_real_final');
        $landuses->tax_final_percent   = $request->input('tax_final_percent');
        $landuses->sum_pay_land_tax   = $request->input('sum_pay_land_tax');

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


        $lands->save();
        $landuses->save();
        $request->session()->flash('message', 'Successfully edited note');
        return redirect()->route('inputs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lands = Lands::find($id);
        $landuses = Landuses::find($id);
        if($lands){
            $lands->delete();
        }
        else if($landuses){
            $landuses->delete();
        }
        return redirect()->route('inputs.index');
    }

}
