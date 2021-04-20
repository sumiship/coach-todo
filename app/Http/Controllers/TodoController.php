<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TodoController extends Controller
{
    public function index(Request $request)
    {
        $lists = DB::select('select * from list');
        return view('index',['lists'=> $lists]);
    }
    public function create(Request $request)
    {
        $timestamp = time();
        $param = [
            'content' => $request -> content,
            'created_at' => date("Y-m-d H:i:s", $timestamp),
            'updated_at' => date("Y-m-d H:i:s", $timestamp),
        ];
        DB::insert('insert into list (content, created_at, updated_at) values (:content, :created_at, :updated_at)', $param);
        return redirect('/');
    }
    public function update(Request $request){
        $timestamp = time();
        $param = [
            'content' => $request->content,
            'updated_at' => date("Y-m-d H:i:s", $timestamp),
        ];
        DB::table('list')->where('id', $request->id)->update($param);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $param = ['id' => $request->id];
        DB::table('list')->where('id', $request->id)->delete();
        return redirect('/');
    }
}
