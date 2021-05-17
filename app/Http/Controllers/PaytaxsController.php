<?php

namespace App\Http\Controllers;

use App\Models\Landuses;
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

class PaytaxsController extends Controller
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
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inputs = Inputs::with('user')->with('status')->with('owner_types')->paginate( 20 );
        $lands = Lands::all();
        $landuses = Landuses::all();
        $sign_boards = Sign_boards::all();
        $inputss = Inputs::all();
        return view('dashboard.paytaxs.paytaxsList', ['inputs' => $inputs,'lands'=>$lands,'landuses'=>$landuses,'sign_boards'=>$sign_boards]);


    }

    public function indexpayments()
    {

        $inputs = Inputs::with('user')->with('status')->with('owner_types')->paginate( 20 );
        $lands = Lands::all();
        $landuses = Landuses::all();
        $sign_boards = Sign_boards::all();
        $inputss = Inputs::all();
        return view('dashboard.paytaxs.payments', ['inputs' => $inputs,'lands'=>$lands,'landuses'=>$landuses,'sign_boards'=>$sign_boards]);


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
        return view('dashboard.paytaxs.create', ['statuses' => $statuses,'owner_typeses'=>$owner_typeses,'name_titleses'=>$name_titleses,
            'provinces'=>$provinces,'amphoes'=>$amphoes,'tambons'=>$tambons]);

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
            'card_id'            ,
            'owner_types'     ,
            'name_titles'       ,
            'first_name'          ,
            'last_name'        ,
            'address_number'       ,
            'moo'          ,
            'soi'           ,
            'road'          ,
            'province'         ,
            'amphoe'         ,
            'tambon'         ,
            'community'          ,
            'zip_code'         ,
            'telephone'         ,
            'fax'         ,
            'email'         ,

            'status_id'

        ]);
        $user = auth()->user();
        $input = new Inputs();
        $input->card_id     = $request->input('card_id');
        $input->owner_types = $request->input('owner_types');
        $input->name_titles = $request->input('name_titles');
        $input->first_name     = $request->input('first_name');
        $input->last_name     = $request->input('last_name');
        $input->address_number     = $request->input('address_number');
        $input->moo     = $request->input('moo');
        $input->soi     = $request->input('soi');
        $input->road     = $request->input('road');
        $input->province     = $request->input('province');
        $input->amphoe     = $request->input('amphoe');
        $input->tambon     = $request->input('tambon');
        $input->community     = $request->input('community');
        $input->zip_code     = $request->input('zip_code');
        $input->telephone     = $request->input('telephone');
        $input->fax     = $request->input('fax');
        $input->email     = $request->input('email');

        $input->status_id = $request->input('status_id');
        $input->users_id = $user->id;
        $input->save();
        $request->session()->flash('message', 'Successfully created ');
        return redirect()->route('paytaxs.index');
    }

    public function lands()
    {
        $statuses = Status::all();
        $owner_typeses = Ownertype::all();
        $name_titleses = Nametitle::all();
        $provinces = Province::all();
        $amphoes = Amphoe::all();
        $tambons = Tambon::all();
        return view('dashboard.inputs.create', ['statuses' => $statuses,'owner_typeses'=>$owner_typeses,'name_titleses'=>$name_titleses,
            'provinces'=>$provinces,'amphoes'=>$amphoes,'tambons'=>$tambons]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $input = Inputs::all('id','name_titles','first_name','last_name','card_id','address_number','moo','soi','road','tambon','amphoe','province','zip_code','telephone')->find($id);
        //$lands = DB::select('select * from lands where owner_id = ?',['owner_id'=>$id]);
        $lands = DB::select('select * from lands where owner_id = ?', [$id]);
        $landuses = DB::select('select * from lu where land_id = ?', [$id]);
        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [$id]);
        //        $sign_board = Sign_boards::all('s_id','s_code','s_name','address','soi','road','moo','tambon_id','sign_type_id','sw','sl','tax')->find($id);
        $inputss = Inputs::all();
        return view('dashboard.paytaxs.paytaxShow', [ 'input' => $input,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses,'sign_boards'=>$sign_boards]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public static function paytaxs_lands($id)
    {
        $input = Inputs::all('id','first_name','last_name','card_id','address_number','moo','soi','road','tambon','amphoe','province','zip_code','telephone')->find($id);
        //$lands = DB::select('select * from lands where owner_id = ?',['owner_id'=>$id]);
        $lands = DB::select('select * from lands where owner_id = ?', [$id]);
        $landuses = DB::select('select * from lu where land_id = ?', [$id]);
        $sign_boards = DB::select('select * from sign_board where owner_id = ?', [$id]);
        $inputss = Inputs::all();
        return view('dashboard.paytaxs.paytaxs_lands', [ 'input' => $input,'inputss'=>$inputss,'lands'=>$lands,'landuses'=>$landuses,'sign_boards'=>$sign_boards]);

    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inputs = Inputs::all()->find($id);
        $statuses = Status::all();
        $owner_typeses = Ownertype::all();
        return view('dashboard.paytaxs.edit', [ 'statuses' => $statuses,'$owner_typeses'=>$owner_typeses,'inputs' => $inputs ]);
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
            'card_id'            ,
            'first_name'          ,
            'last_name'          ,
            'address_number'         ,
            'moo'          ,
            'soi'           ,
            'road'          ,
            'community'          ,
            'zip_code'       ,
            'telephone'         ,
            'fax'         ,
            'email'         ,

            'status_id'

        ]);
        $input = Inputs::find($id);
        $input->status_id = $request->input('status_id');
        $input->save();
        $request->session()->flash('message', 'Successfully edited');
        return redirect()->route('paytaxs.index');
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
        return redirect()->route('paytaxs.index');
    }
}
