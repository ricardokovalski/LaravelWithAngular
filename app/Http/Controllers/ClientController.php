<?php

namespace ProjectRico\Http\Controllers;

use Illuminate\Http\Request;
use ProjectRico\Http\Requests;

use ProjectRico\Http\Controllers\Controller;
use ProjectRico\Client;

class ClientController extends Controller
{
    public function index()
    {
        return Client::all();
    }
    
    public function store(Request $request)
    {
        return Client::create($request->all());
    }
    
    public function show($id)
    {
        return Client::find($id);
    }
    
    public function destroy($id)
    {
        Client::find($id)->delete();
    }
    
    public function update(Request $request, $id)
    {
        return Client::find($id)->update($request->all());
    }
}
