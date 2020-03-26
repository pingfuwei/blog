<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=Area::orderby("a_id","desc")->paginate(3);

        return view("area.index",["brand"=>$brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd($brand);
        return view("area.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except("_token");
//        dd($data);
        if($request->hasFile('logo')){
            $data["logo"]=$this->updates("logo");
        }
        if($request->hasFile('images')){
            $data["images"]=$this->logo("images");
            $data["images"]=implode("|",$data["images"]);
        }
//        dd($data);
        $res=Area::insert($data);
        if($res){
            return redirect('area/index');
        }
    }
    public function logo($logo){
        $file=request()->$logo;
        foreach ($file as $k=>$v){
            if($v->isValid()){
                $photo[$k]=$v->store('photo');;
            }
        }
        return $photo;
    }
    public function updates($logo)
    {
        if(request()->file($logo)->isValid()){
            $photo = request()->file($logo);
            $photo = $photo->store('photo');
            return $photo;
        }
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
}
