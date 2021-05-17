<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inputs;
use App\Models\Status;
use App\Models\Ownertype;
use App\Models\Nametitle;
use App\Models\Province;
use App\Models\Amphoe;
use App\Models\Tambon;
use App\Models\Lands;
use App\Models\Sign_boards;
use Illuminate\Validation\Rules\In;

class ReportsController extends Controller
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
        $inputs = Inputs::with('user')->with('status')->with('owner_types')->paginate( 20 );
        return view('dashboard.inputs.inputsList', ['inputs' => $inputs]);
    }

    public function index1()
    {
        $inputs = Inputs::with('user')->with('status')->with('owner_types')->paginate( 20 );
        return view('dashboard.reports.pds1List', ['inputs' => $inputs]);
    }
    public function index2()
    {
        $inputs = Inputs::with('user')->with('status')->with('owner_types')->paginate( 20 );
        return view('dashboard.reports.pds2List', ['inputs' => $inputs]);
    }
    public function index3()
    {
        $inputs = Inputs::with('user')->with('status')->with('owner_types')->paginate( 20 );
        return view('dashboard.reports.pds3List', ['inputs' => $inputs]);
    }
    public function index4()
    {
        $inputs = Inputs::with('user')->with('status')->with('owner_types')->paginate( 20 );
        return view('dashboard.reports.pds4List', ['inputs' => $inputs]);
    }
    public function index6()
    {
        $inputs = Inputs::with('user')->with('status')->with('owner_types')->paginate( 20 );
        return view('dashboard.reports.pds6List', ['inputs' => $inputs]);
    }
    public function index7()
    {
        $inputs = Inputs::with('user')->with('status')->with('owner_types')->paginate( 20 );
        return view('dashboard.reports.pds7List', ['inputs' => $inputs]);
    }
    public function index8()
    {
        $inputs = Inputs::with('user')->with('status')->with('owner_types')->paginate( 20 );
        return view('dashboard.reports.pds8List', ['inputs' => $inputs]);
    }

    public function indexpp1()
    {
        $inputs = Inputs::with('user')->with('status')->with('owner_types')->paginate( 20 );
        return view('dashboard.reports.pp1List', ['inputs' => $inputs]);
    }

    public function indexpp3()
    {
        $inputs = Inputs::with('user')->with('status')->with('owner_types')->paginate( 20 );
        return view('dashboard.reports.pp3List', ['inputs' => $inputs]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.reports.create');
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
            'name'    => 'required|min:1|max:64',
            'subject' => 'required|min:1|max:128',
            'content' => 'required|min:1',
        ]);
        $template = new EmailTemplate();
        $template->name = $request->input('name');
        $template->subject = $request->input('subject');
        $template->content = $request->input('content');
        $template->save();
        $request->session()->flash('message', 'Successfully created Email Template');
        return redirect()->route('mail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     ** @param  int  $id2
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $input = Inputs::all('id','first_name','last_name','card_id','address_number','moo','soi','road','tambon','amphoe','province','zip_code','telephone')->find($id);
        //$lands = DB::select('select * from lands where owner_id = ?',['owner_id'=>$id]);
        $lands = DB::select('select * from lands where owner_id = ?', [$id]);
        $landuses = DB::select('select * from lu where land_id = ?', [$id]);
        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [$id]);
        $inputss = Inputs::all();
        return view('dashboard.reports.Reportshow', [ 'input' => $input,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses,'sign_boards'=>$sign_boards]);
    }


    public static function print_pds1($id)
    {
        $datas1 = DB::table('lands')
            ->where('owner_id', '=' ,$id)
            ->get();

        $datas2 = DB::table('lu')
            ->where('land_id', '=' ,$id)
            ->distinct()
            ->get();


        $datas2=$datas2->toArray();
        $results=array();
        foreach ($datas1 as $key=>$data){

                $newarr=array();
                $newarr['ldoc_type'] = $data->ldoc_type;
                $newarr['sn'] = $data->sn;
                $newarr['dn'] = $data->dn;
                $newarr['moo'] = $data->moo;
                $newarr['vl'] = $data->vl;
                $newarr['tambon_id'] = $data->tambon_id;
                $newarr['rai'] = $data->rai;
                $newarr['yawn'] = $data->yawn;
                $newarr['wa'] = $data->wa;
                $newarr['square_1'] = $data->square_1;
                $newarr['meanprice_vl'] = $data->meanprice_vl;
                $newarr['result_landprice_lands'] = $data->result_landprice_lands;

                $newarr['building_type_name'] = $datas2[$key]->building_type_name;
                $newarr['building_use_name'] = $datas2[$key]->building_use_name;
                $newarr['bm_id'] = $datas2[$key]->bm_id;
                $newarr['result_wl'] = $datas2[$key]->result_wl;
                $newarr['meanprice_wl'] = $datas2[$key]->meanprice_wl;
                $newarr['result_buildprice'] = $datas2[$key]->result_buildprice;
                $newarr['result_real'] = $datas2[$key]->result_real;
                $newarr['depreciation'] = $datas2[$key]->depreciation;
                $newarr['result_final'] = $datas2[$key]->result_final;
                $newarr['buildratio'] = $datas2[$key]->buildratio;
                $newarr['result_buildratio'] = $datas2[$key]->result_buildratio;
                $newarr['tax_exem'] = $datas2[$key]->tax_exem;
                $newarr['result_real_final'] = $datas2[$key]->result_real_final;
                $newarr['tax_final_percent'] = $datas2[$key]->tax_final_percent;

            $results[]=$newarr;

        }

        $input = Inputs::all('id','first_name','last_name','card_id','address_number','moo','soi','road','tambon','amphoe','province','zip_code','telephone');
        //$lands = DB::select('select * from lands where owner_id = ?',['owner_id'=>$id]);
        $lands = DB::select('select * from lands where owner_id = ?', [$id]);
        $landuses = DB::select('select * from lu where land_id = ?', [$id]);
//        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [15]);
        $inputss = Inputs::all();



        return view('dashboard.reports.print_pds1', [ 'input' => $input,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses])->with('results',$results);
    }


    public static function print_pds2($id)
    {
        $datas1 = DB::table('lands')
            ->join('lu','lu.land_id', '=', 'lands.owner_id')
            ->select('lands.id','lands.ldoc_type','lands.sn','lands.dn','lands.moo','lands.vl','lands.tambon_id','lands.rai','lands.yawn','lands.wa','lands.square_1','lands.meanprice_vl', 'lands.result_landprice_lands',
                'lu.id' ,'lu.building_type_name','lu.building_use_name','lu.bm_id','lu.result_wl','lu.meanprice_wl','lu.result_buildprice','lu.result_real','lu.depreciation','lu.result_final','lu.buildratio','lu.result_buildratio','lu.tax_exem'
                ,'lu.result_real_final','lu.tax_final_percent')
            ->where('lands.owner_id', '=' ,$id)
            ->get();

        $input = Inputs::all('id','first_name','last_name','card_id','address_number','moo','soi','road','tambon','amphoe','province','zip_code','telephone')->find($id);
        //$lands = DB::select('select * from lands where owner_id = ?',['owner_id'=>$id]);
        $lands = DB::select('select * from lands where owner_id = ?', [$id]);
        $landuses = DB::select('select * from lu where land_id = ?', [$id]);
        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [$id]);
        $inputss = Inputs::all();


        return view('dashboard.reports.print_pds2', [ 'input' => $input,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses,'sign_boards'=>$sign_boards],compact('datas1'));
    }

    public static function print_pds3($id)
    {
        $datas1 = DB::table('lands')
            ->get();

        $datas2 = DB::table('lu')
            ->distinct()
            ->get();


        $datas2=$datas2->toArray();
        $results=array();
        foreach ($datas1 as $key=>$data){

            $newarr=array();
            $newarr['ldoc_type'] = $data->ldoc_type;
            $newarr['sn'] = $data->sn;
            $newarr['dn'] = $data->dn;
            $newarr['ln'] = $data->ln;
            $newarr['moo'] = $data->moo;
            $newarr['vl'] = $data->vl;
            $newarr['tambon_id'] = $data->tambon_id;
            $newarr['rai'] = $data->rai;
            $newarr['yawn'] = $data->yawn;
            $newarr['wa'] = $data->wa;
            $newarr['square_1'] = $data->square_1;
            $newarr['meanprice_vl'] = $data->meanprice_vl;
            $newarr['result_landprice_lands'] = $data->result_landprice_lands;

            $newarr['building_type_name'] = $datas2[$key]->building_type_name;
            $newarr['building_use_name'] = $datas2[$key]->building_use_name;
            $newarr['bm_id'] = $datas2[$key]->bm_id;
            $newarr['lut_id'] = $datas2[$key]->lut_id;
            $newarr['b_number'] = $datas2[$key]->b_number;
            $newarr['building_type_name'] = $datas2[$key]->building_type_name;
            $newarr['bm_id'] = $datas2[$key]->bm_id;
            $newarr['result_square'] = $datas2[$key]->result_square;
            $newarr['result_wl'] = $datas2[$key]->result_wl;
            $newarr['meanprice_wl'] = $datas2[$key]->meanprice_wl;
            $newarr['result_buildprice'] = $datas2[$key]->result_buildprice;
            $newarr['result_real'] = $datas2[$key]->result_real;
            $newarr['depreciation'] = $datas2[$key]->depreciation;
            $newarr['result_final'] = $datas2[$key]->result_final;
            $newarr['buildratio'] = $datas2[$key]->buildratio;
            $newarr['result_buildratio'] = $datas2[$key]->result_buildratio;
            $newarr['tax_exem'] = $datas2[$key]->tax_exem;
            $newarr['result_real_final'] = $datas2[$key]->result_real_final;
            $newarr['tax_final_percent'] = $datas2[$key]->tax_final_percent;

            $results[]=$newarr;

        }

        $input = Inputs::all('id','first_name','last_name','card_id','address_number','moo','soi','road','tambon','amphoe','province','zip_code','telephone');
        //$lands = DB::select('select * from lands where owner_id = ?',['owner_id'=>$id]);
        $lands = DB::select('select * from lands');
        $landuses = DB::select('select * from lu');
//        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [15]);
        $inputss = Inputs::all();



        return view('dashboard.reports.print_pds3', [ 'input' => $input,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses])->with('results',$results);
    }

    public static function print_pds4($id)
    {
        $datas1 = DB::table('lands')
            ->join('lu','lu.land_id', '=', 'lands.owner_id')
            ->select('lands.id','lands.ldoc_type','lands.sn','lands.dn','lands.moo','lands.vl','lands.tambon_id','lands.rai','lands.yawn','lands.wa','lands.square_1','lands.meanprice_vl', 'lands.result_landprice_lands',
                'lu.id' ,'lu.building_type_name','lu.building_use_name','lu.bm_id','lu.result_wl','lu.meanprice_wl','lu.result_buildprice','lu.result_real','lu.depreciation','lu.result_final','lu.buildratio','lu.result_buildratio','lu.tax_exem'
                ,'lu.result_real_final','lu.tax_final_percent')
            ->where('lands.owner_id', '=' ,$id)
            ->get();

        $input = Inputs::all('id','first_name','last_name','card_id','address_number','moo','soi','road','tambon','amphoe','province','zip_code','telephone')->find($id);
        //$lands = DB::select('select * from lands where owner_id = ?',['owner_id'=>$id]);
        $lands = DB::select('select * from lands where owner_id = ?', [$id]);
        $landuses = DB::select('select * from lu where land_id = ?', [$id]);
        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [$id]);
        $inputss = Inputs::all();

        return view('dashboard.reports.print_pds4', [ 'input' => $input,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses,'sign_boards'=>$sign_boards],compact('datas1'));
    }


    public static function print_pds6($id)
    {

        $datas1 = DB::table('lands')
            ->where('owner_id', '=' ,$id)
            ->get();

        $datas2 = DB::table('lu')
            ->where('land_id', '=' ,$id)
            ->distinct()
            ->get();


        $datas2=$datas2->toArray();
        $results=array();
        foreach ($datas1 as $key=>$data){

            $newarr=array();
            $newarr['ldoc_type'] = $data->ldoc_type;
            $newarr['sn'] = $data->sn;
            $newarr['dn'] = $data->dn;
            $newarr['moo'] = $data->moo;
            $newarr['vl'] = $data->vl;
            $newarr['tambon_id'] = $data->tambon_id;
            $newarr['rai'] = $data->rai;
            $newarr['yawn'] = $data->yawn;
            $newarr['wa'] = $data->wa;
            $newarr['square_1'] = $data->square_1;
            $newarr['meanprice_vl'] = $data->meanprice_vl;
            $newarr['result_landprice_lands'] = $data->result_landprice_lands;

            $newarr['building_type_name'] = $datas2[$key]->building_type_name;
            $newarr['building_use_name'] = $datas2[$key]->building_use_name;
            $newarr['bm_id'] = $datas2[$key]->bm_id;
            $newarr['result_wl'] = $datas2[$key]->result_wl;
            $newarr['meanprice_wl'] = $datas2[$key]->meanprice_wl;
            $newarr['result_buildprice'] = $datas2[$key]->result_buildprice;
            $newarr['result_real'] = $datas2[$key]->result_real;
            $newarr['depreciation'] = $datas2[$key]->depreciation;
            $newarr['result_final'] = $datas2[$key]->result_final;
            $newarr['buildratio'] = $datas2[$key]->buildratio;
            $newarr['result_buildratio'] = $datas2[$key]->result_buildratio;
            $newarr['tax_exem'] = $datas2[$key]->tax_exem;
            $newarr['result_real_final'] = $datas2[$key]->result_real_final;
            $newarr['tax_final_percent'] = $datas2[$key]->tax_final_percent;

            $results[]=$newarr;

        }

        $inputs = DB::select('select * from inputs where id = ?', [$id]);
        //$lands = DB::select('select * from lands where owner_id = ?',['owner_id'=>$id]);
        $lands = DB::select('select * from lands where owner_id = ?', [$id]);
        $landuses = DB::select('select * from lu where land_id = ?', [$id]);
//        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [15]);
        $inputss = Inputs::all();


        return view('dashboard.reports.print_pds6', [ 'inputs' => $inputs,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses])->with('results',$results);
    }

    public static function print_pds7($id)
    {
        $datas1 = DB::table('lands')
            ->get();

        $datas2 = DB::table('lu')
            ->distinct()
            ->get();


        $datas2=$datas2->toArray();
        $results=array();
        foreach ($datas1 as $key=>$data){

            $newarr=array();
            $newarr['ldoc_type'] = $data->ldoc_type;
            $newarr['sn'] = $data->sn;
            $newarr['dn'] = $data->dn;
            $newarr['moo'] = $data->moo;
            $newarr['vl'] = $data->vl;
            $newarr['tambon_id'] = $data->tambon_id;
            $newarr['rai'] = $data->rai;
            $newarr['yawn'] = $data->yawn;
            $newarr['wa'] = $data->wa;
            $newarr['square_1'] = $data->square_1;
            $newarr['meanprice_vl'] = $data->meanprice_vl;
            $newarr['result_landprice_lands'] = $data->result_landprice_lands;

            $newarr['building_type_name'] = $datas2[$key]->building_type_name;
            $newarr['building_use_name'] = $datas2[$key]->building_use_name;
            $newarr['bm_id'] = $datas2[$key]->bm_id;
            $newarr['lut_id'] = $datas2[$key]->lut_id;
            $newarr['b_number'] = $datas2[$key]->b_number;
            $newarr['building_type_name'] = $datas2[$key]->building_type_name;
            $newarr['bm_id'] = $datas2[$key]->bm_id;
            $newarr['result_square'] = $datas2[$key]->result_square;
            $newarr['result_wl'] = $datas2[$key]->result_wl;
            $newarr['meanprice_wl'] = $datas2[$key]->meanprice_wl;
            $newarr['result_buildprice'] = $datas2[$key]->result_buildprice;
            $newarr['result_real'] = $datas2[$key]->result_real;
            $newarr['depreciation'] = $datas2[$key]->depreciation;
            $newarr['result_final'] = $datas2[$key]->result_final;
            $newarr['buildratio'] = $datas2[$key]->buildratio;
            $newarr['result_buildratio'] = $datas2[$key]->result_buildratio;
            $newarr['tax_exem'] = $datas2[$key]->tax_exem;
            $newarr['result_real_final'] = $datas2[$key]->result_real_final;
            $newarr['tax_final_percent'] = $datas2[$key]->tax_final_percent;
            $newarr['sum_pay_land_tax'] = $datas2[$key]->sum_pay_land_tax;

            $results[]=$newarr;

        }

        $input = Inputs::all('id','first_name','last_name','card_id','address_number','moo','soi','road','tambon','amphoe','province','zip_code','telephone');
        //$lands = DB::select('select * from lands where owner_id = ?',['owner_id'=>$id]);
        $lands = DB::select('select * from lands');
        $landuses = DB::select('select * from lu');
//        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [15]);
        $inputss = Inputs::all();



        return view('dashboard.reports.print_pds7', [ 'input' => $input,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses])->with('results',$results);
    }



    public static function print_pp1($id)
    {
        $datas1 = DB::table('sign_board')
            ->get();

        $datas2 = DB::table('lu')
            ->distinct()
            ->get();


        $datas2=$datas2->toArray();
        $results=array();
        foreach ($datas1 as $key=>$data){

            $newarr=array();

            $newarr['s_name'] = $data->s_name;


            $results[]=$newarr;

        }

        $inputs = DB::select('select * from inputs where id = ?', [$id]);
        //$lands = DB::select('select * from lands where owner_id = ?',['owner_id'=>$id]);
        $lands = DB::select('select * from lands');
        $landuses = DB::select('select * from lu');
        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [$id]);
        $inputss = Inputs::all();



        return view('dashboard.reports.print_pp1', [ 'inputs' => $inputs,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses,'sign_boards'=>$sign_boards])->with('results',$results);
    }



    public static function print_pp3($id)
    {
        $datas1 = DB::table('sign_board')
            ->get();

        $datas2 = DB::table('lu')
            ->distinct()
            ->get();


        $datas2=$datas2->toArray();
        $results=array();
        foreach ($datas1 as $key=>$data){

            $newarr=array();

            $newarr['s_name'] = $data->s_name;


            $results[]=$newarr;

        }

        $inputs = DB::select('select * from inputs where id = ?', [$id]);
        //$lands = DB::select('select * from lands where owner_id = ?',['owner_id'=>$id]);
        $lands = DB::select('select * from lands');
        $landuses = DB::select('select * from lu');
        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [$id]);
        $inputss = Inputs::all();



        return view('dashboard.reports.print_pp3', [ 'inputs' => $inputs,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses,'sign_boards'=>$sign_boards])->with('results',$results);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas1 = DB::table('lands')
            ->join('lu','lu.land_id', '=', 'lands.owner_id')
            ->select('lands.id','lands.ldoc_type','lands.sn','lands.dn','lands.moo','lands.vl','lands.tambon_id','lands.rai','lands.yawn','lands.wa','lands.square_1','lands.meanprice_vl', 'lands.result_landprice_lands',
                'lu.id' ,'lu.building_type_name','lu.building_use_name','lu.bm_id','lu.result_wl','lu.meanprice_wl','lu.result_buildprice','lu.result_real','lu.depreciation','lu.result_final','lu.buildratio','lu.result_buildratio','lu.tax_exem'
                ,'lu.result_real_final','lu.tax_final_percent')
            ->where('lands.owner_id', '=' ,$id)
            ->get();

        $datas3 = DB::table('lands')
            ->join('lu','lu.land_id', '=', 'lands.owner_id')
            ->select('lands.id','lands.ldoc_type','lands.sn','lands.ln','lands.dn','lands.moo','lands.vl','lands.tambon_id','lands.rai','lands.yawn','lands.wa','lands.square_1','lands.meanprice_vl', 'lands.result_landprice_lands',
                'lu.lut_id' , 'lu.use_rai' ,'lu.use_yawn' ,'lu.use_wa','lu.result_square' , 'lu.id' ,'lu.b_number','lu.building_type_name','lu.building_use_name','lu.bm_id','lu.result_wl','lu.meanprice_wl','lu.result_buildprice','lu.result_real','lu.depreciation','lu.result_final','lu.buildratio','lu.result_buildratio','lu.tax_exem'
                ,'lu.result_real_final','lu.tax_final_percent')
            ->get();


        $input = Inputs::all('id','first_name','last_name','card_id','address_number','moo','soi','road','tambon','amphoe','province','zip_code','telephone')->find($id);
        //$lands = DB::select('select * from lands where owner_id = ?',['owner_id'=>$id]);
        $lands = DB::select('select * from lands where owner_id = ?', [$id]);
        $landuses = DB::select('select * from lu where land_id = ?', [$id]);
        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [$id]);
        $inputss = Inputs::all();



        return view('dashboard.reports.edit', [ 'input' => $input,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses,'sign_boards'=>$sign_boards],compact('datas1','datas3'));
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
        $validatedData = $request->validate([
            'name'    => 'required|min:1|max:64',
            'subject' => 'required|min:1|max:128',
            'content' => 'required|min:1',
        ]);
        $template = EmailTemplate::find($id);
        $template->name = $request->input('name');
        $template->subject = $request->input('subject');
        $template->content = $request->input('content');
        $template->save();
        $request->session()->flash('message', 'Successfully updated Email Template');
        return redirect()->route('mail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $template = EmailTemplate::find($id);
        if($template){
            $template->delete();
        }
        $request->session()->flash('message', 'Successfully deleted Email Template');
        return redirect()->route('mail.index');
    }

    public function prepareSend($id){
        $template = EmailTemplate::find($id);
        return view('dashboard.email.send', [ 'template' => $template ]);
    }

    public function send($id, Request $request){
        $template = EmailTemplate::find($id);
        Mail::send([], [], function ($message) use ($request, $template)
        {
            $message->to($request->input('email'));
            $message->subject($template->subject);
            $message->setBody($template->content,'text/html');
        });
        $request->session()->flash('message', 'Successfully sended Email');
        return redirect()->route('mail.index');
    }
}
