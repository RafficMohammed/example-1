<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Connection;
use App\Models\Device;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::get(['id','name','relation','_lft','parent_id'])->toTree();
//        foreach ($categories as $debcon){
//            $device = $this->getDeviceName($debcon->device_id);
//            $conn = $this->getConnectionName($debcon->connection_id);
//
//
//
//        }

        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $categories =Category::all();
//        return view('category',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $category=  Category::create([
            'name' => $request->name,
          'relation' => $request->relation
        ]);
        if($request->parent && $request->parent !== 'none')
        {
            $node = Category::find($request->parent);
            $node->appendNode($category);
        }

        return redirect()->back();
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
    private function getConnectionName($connectionId)
    {

        return Connection::find($connectionId)->toArray();
    }

    private function getDeviceName($deviceId)
    {
        return Device::find($deviceId)->toArray();
    }
}
