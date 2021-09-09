<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    //
    public function index()
    {
       $devices = Device::all();
       $relation = Connection::all();
       return view('category',compact(['devices','relation']));
    }
}
