<?php

namespace Serh\LaravelCrud\Traits;

use Illuminate\Http\Request;

trait CrudAndView
{
    protected function getRouteReplace()
    {
        $routeName = \Request::route()->getName();
        $regexp = "/\.(index|create|store|show|edit|update|destroy)$/i";
        $route = preg_replace($regexp, "", $routeName);
        if ($route === $routeName) {
            throw new \Exception("Not valid Route path: " . $routeName . "!");
        }
        return $route;
    }
    public function index()
    {
        return view("crud.index", [
            "collection" => $this->model::all(),
            "name" => $this->name,
            "tab" => $this->tab,
            "route" => $this->getRouteReplace()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("crud.edit", [
            "name" => $this->name,
            "tab" => $this->tab,
            "route" => $this->getRouteReplace()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new $this->model;
        foreach ($this->tab as $key => $item) {

            $model->$key = $request->input($key);
        }
        $model->save();
        return redirect()->route($this->getRouteReplace() . ".index");
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
        return view("crud.edit", [

            "name" => $this->name,
            "tab" => $this->tab,
            "row" => $this->model::where("id",$id)->first(),
            "route" => $this->getRouteReplace()
        ]);
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
        $model = $this->model::where("id",$id)->first();
        foreach ($this->tab as $key => $item) {

            $model->$key = $request->input($key);
        }
        $model->save();
        return redirect()->route($this->getRouteReplace() . ".index");
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model=$this->model::where("id",$id)->first();
        $model->delete();
        return redirect()->route($this->getRouteReplace() . ".index");
    }
}
