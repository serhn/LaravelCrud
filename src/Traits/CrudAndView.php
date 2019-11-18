<?php

namespace Serh\LaravelCrud\Traits;

use Illuminate\Http\Request;

trait CrudAndView
{
    protected $perPage = 100;
    protected $layout = "layouts.app";
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
        return view("crud::index", [
            "collection" => $this->model::paginate($this->perPage),
            "name" => $this->name,
            "tab" => $this->tab,
            "route" => $this->getRouteReplace(),
            "layout" => $this->layout
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("crud::edit", [
            "name" => $this->name,
            "tab" => $this->tab,
            "route" => $this->getRouteReplace(),
            "layout" => $this->layout
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
            if ((isset($item['edit']) && $item['edit'] == 0) ||
                isset($item['relations']) ||
                $item['type'] == "img"

            ) {
                continue;
            }
            $val = $request->input($key);
            if ($item['type'] == "password") {
                if (strlen($val) < 8) {
                    continue;
                }
                
                $val = bcrypt($val);
            }
            if (is_null($val)) {
                $val = "";
            }
            $model->$key = $val;
            // $model->$key = $request->input($key);
        }
        $model->save();
        if (method_exists($this, "afterStore")) {
            $this->afterStore();
        }
        return redirect()->route($this->getRouteReplace() . ".show", $model->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("crud::show", [

            "name" => $this->name,
            "tab" => $this->tab,
            "row" => $this->model::find($id),
            "route" => $this->getRouteReplace(),
            "layout" => $this->layout
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("crud::edit", [

            "name" => $this->name,
            "tab" => $this->tab,
            "row" => $this->model::find($id),
            "route" => $this->getRouteReplace(),
            "layout" => $this->layout
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
        //dd($request);
        $model = $this->model::find($id);
        foreach ($this->tab as $key => $item) {
            if ((isset($item['edit']) && $item['edit'] == 0)
                || isset($item['relations']) ||
                $item['type'] == "img"
            ) {
                continue;
            }
            $val = $request->input($key);
            if ($item['type'] == "password") {
                if (strlen($val) < 8) {
                    continue;
                }
                
                $val = bcrypt($val);
            }
            if (is_null($val)) {
                $val = "";
            }
            $model->$key = $val;
        }
        $model->save();
        if (method_exists($this, "afterUpdate")) {
            $this->afterUpdate();
        }
        return redirect()->route($this->getRouteReplace() . ".show", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->model::find($id);
        $model->delete();
        return redirect()->route($this->getRouteReplace() . ".index");
    }
}
