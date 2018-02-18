<?phpnamespace App\Http\Controllers;use Illuminate\Http\Request;use App\Ad;use App\AdNoticia;use App\AdNotificacion;use App\AdPrincipal;use App\User;use App\Producto;use App\ImageAd;use Laracasts\Flash\Flash;use PDF;use File;use Illuminate\Support\Facades\Redirect;use App\Http\Requests\ArticleRequest;use Illuminate\Support\Facades\DB;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Collection;class AdsController extends Controller{    /**     * Display a listing of the resource.     *     * @return \Illuminate\Http\Response     */    public function index()    {        //        /*$photos = File::directories('../public/contratos/');        dd($photos);*/        $ads = Ad::orderBy('id','ASC')->paginate(7);        $precioTotal= DB::table('ads')->selectRaw('sum(precio)')->get()->toJson();        //dd($precioTotal);        $productos = Producto::orderBy('id','ASC')->paginate(7);        return view('admin.ads.index')->with('ads', $ads)->with('total',$precioTotal)->with('productos', $productos);    }    /**     * Show the form for creating a new resource.     *     * @return \Illuminate\Http\Response     */    public function create()    {        //        return view('admin.ads.create');    }    /**     * Store a newly created resource in storage.     *     * @param  \Illuminate\Http\Request  $request     * @return \Illuminate\Http\Response     */    public function store(Request $request)    {        //dd($request);        if($request->file('imagePrincipal')){            $file = $request->file('imagePrincipal');            $name = 'diario_publicidad_imagenPrincipal' . time() . '.' . $file->getClientOriginalExtension();            $path = public_path() . '/images/publicistas/paginaPrincipal';            $file->move($path,$name);            //id category ubicacion precio periodo name image description user_id            $ad = new Ad();            $ad->user_id = \Auth::user()->id;            $ad->name = $request->name;            $ad->precio = $request->precio;            $ad->periodo = $request->periodo;            $ad->category = $request->category;            $ad->description = $request->description;            $ad->image = $name;            $ad->save();            $image = new ImageAd();            $image->name = $name;            $image->ads()->associate($ad);            $image->save();            //id name image description ads_id            $principal = new AdPrincipal();            $principal->ads_id = $ad->id;            $principal->name = $request->name;;            $principal->description = $request->description;            $principal->image = $image->name;            $principal->save();        }        if($request->file('imageNoticia')){            $fileNoticia = $request->file('imageNoticia');            $nameNoticia = 'diario_publicidad_imageNoticia' . time() . '.' . $fileNoticia->getClientOriginalExtension();            $pathNoticia = public_path() . '/images/publicistas/Noticia';            $fileNoticia->move($pathNoticia,$nameNoticia);            //id name image description ads_id            $noticia = new AdNoticia();            $noticia->ads_id = $ad->id;            $noticia->name = $request->name;;            $noticia->description = $request->description;            $noticia->image = $nameNoticia;            $noticia->save();        }        if($request->file('imageNotificacion')){            $fileNotificacion = $request->file('imageNotificacion');            $nameNotificacion = 'diario_publicidad_imageNotificacion' . time() . '.' . $fileNotificacion->getClientOriginalExtension();            $pathNotificacion = public_path() . '/images/publicistas/Notificacion';            $fileNotificacion->move($pathNotificacion,$nameNotificacion);            //id name image description ads_id            $notificacion = new AdNotificacion();            $notificacion->ads_id = $ad->id;            $notificacion->name = $request->name;;            $notificacion->description = $request->description;            $notificacion->image = $nameNotificacion;            $notificacion->save();        }              return redirect()->route('ads.index');    }    /**     * Display the specified resource.     *     * @param  int  $id     * @return \Illuminate\Http\Response     */    public function show($id)    {        //        $ad = Ad::find($id);        $image = DB::table('imagesAds')->where('ads_id',$id)->value('name');         $precioMensual = $ad->precio / $ad->periodo;               return view('admin.ads.show')->with('ad',$ad)->with('precioMensual',$precioMensual);    }    /**     * Show the form for editing the specified resource.     *     * @param  int  $id     * @return \Illuminate\Http\Response     */    public function edit($id)    {        //    }    /**     * Update the specified resource in storage.     *     * @param  \Illuminate\Http\Request  $request     * @param  int  $id     * @return \Illuminate\Http\Response     */    public function update(Request $request, $id)    {        //    }    /**     * Remove the specified resource from storage.     *     * @param  int  class="table table-striped"$id     * @return \Illuminate\Http\Response     */    public function destroy($id)    {        //        $ad = AdPrincipal::find($id);        $ad->delete();        flash('Se a eliminado el articulo ' . $ad->name)->error();        return redirect()->route('ads.index');       /* DB_USERNAME=inggerar_diario        DB_PASSWORD=diariosouar*/    }    public function CreatePdf($id){        $ad = Ad::find($id);        $productos = Producto::orderBy('id','ASC')->pluck('nombre','id');        return view('admin.ads.createContrato')->with('ad',$ad)->with('productos',$productos);    }    public function pdf(Request $request){        dd($request);        $ad = Ad::find($request->id);        $fecha = new \DateTime();        $fecha = $fecha->format('d-M-Y');        $datos = array('razonsocial' => $request->razonsocial ,'responsable' => $request->responsable,'dni' => $request->dni,'direccion' => $request->direccion,'cp' => $request->cp,'telefono' => $request->telefono,'cuilText' => $request->cuilText,'rubro' => $request->rubro,'cargo' => $request->cargo,'localidad' => $request->localidad,'email' => $request->email,'paquete'=>$paquete,'p'=>$numeroPaquete,'fecha'=>$fecha);        //dd($datos);        $precioMensual = $ad->precio / $ad->periodo;                $pdf = PDF::loadView('contrato',compact('ad'),compact('datos'),compact('fecha'));        $fecha= new \DateTime();        $pdf->save(public_path().'/contratos/'.$ad->name.'_'.$fecha->format('d-m-Y').'_contrato.pdf');        return $pdf->stream($ad->name.'_contrato.pdf');    }    public function ApiIndexPrincipal(){        //dd('todo ok');        $ads = DB::table('adsforprincipal')->get();        $json = json_decode($ads,true);        return response()->json(array('result'=>$json));    }    public function ApiIndexNoticia(){        $ads = DB::table('adsfornoticia')->get();        $json = json_decode($ads,true);        return response()->json(array('result'=>$json));    }    public function ApiIndexNotificacion(){        $ads = DB::table('adsfornotificacion')->get();        $json = json_decode($ads,true);        return response()->json(array('result'=>$json));    }    ///////////////PRODCUTO    public function ProductoCreate(){        return view('admin.ads.productoCreate');    }    public function ProductoStore(Request $request){        $producto = new Producto($request->all());        $producto->save();        flash('Se a creado el Producto ' . $producto->nombre)->success();        return redirect()->route('ads.index');    }        public function ProductoShow($id){        $producto = Producto::find($id);        return view('admin.ads.productoShow')->with('producto',$producto);    }        public function ProductoEdit($id){        $producto = Producto::find($id);        return view('admin.ads.productoEdit')->with('producto',$producto);    }        public function ProductoUpdate(Request $request, $id){        $producto = Producto::find($id);        $producto->fill($request->all());        $producto->save();        flash('Se a editado el Producto ' . $producto->nombre)->success();        return redirect()->route('ads.index');    }        public function ProductoDestroy($id){        $producto = Producto::find($id);        flash('Se a eliminado el Producto ' . $producto->nombre)->success();        $producto->delete();        return redirect()->route('ads.index');    }}