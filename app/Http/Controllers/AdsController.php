<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\User;
use App\ImageAd;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ads = Ad::orderBy('id','ASC')->paginate(7);
        $precioTotal= DB::table('ads')->selectRaw('sum(precio)')->get()->toJson();
        //dd($precioTotal);
        return view('admin.ads.index')->with('ads', $ads)->with('total',$precioTotal);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.ads.create');
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
        if($request->file('image')){
            $file = $request->file('image');
            $name = 'diario_publicidad_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/publicistas/';
            $file->move($path,$name);
        }
        $ad = new Ad($request->all());
        $ad->user_id = \Auth::user()->id;
        $ad->save();

        $image = new ImageAd();
        $image->name = $name;
        $image->ads()->associate($ad);
        $image->save();

        return redirect()->route('ads.index');

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
        $ad = Ad::find($id);
        $image = DB::table('imagesAds')->where('ads_id',$id)->value('name'); 
        $precioMensual = $ad->precio / $ad->periodo;       

        return view('admin.ads.show')->with('ad',$ad)->with('image',$image)->with('precioMensual',$precioMensual);
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
        $ad = Ad::find($id);
        $ad->delete();
        flash('Se a eliminado el articulo ' . $ad->name)->error();
        return redirect()->route('ads.index');
       /* DB_USERNAME=inggerar_diario
        DB_PASSWORD=diariosouar*/
    }
}
