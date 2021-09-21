<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Requests\RoomRequest;

class RoomController extends Controller
{
    //
    public function showList1()
    {
        $rooms = Room::where('class','小学生')->get();
        return view('room.list',['rooms' => $rooms]);
    }

    public function showList2()
    {
        $rooms = Room::where('class','中学生')->get();
        return view('room.list',['rooms' => $rooms]);
    }

    public function showList3()
    {
        $rooms = Room::where('class','高校生')->get();
        return view('room.list',['rooms' => $rooms]);
    }

    public function showList4()
    {
        $rooms = Room::where('class','大学生')->get();
        return view('room.list',['rooms' => $rooms]);
    }

    public function exeStore(Request $request)
    {
        
        $inputs = $request->all();
        \DB::beginTransaction();
        try{
            Room::create($inputs);
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            \Session::flash('error_msg','ユーザーネーム');
            return redirect(route('newgroup'));

        }
        return redirect(route('group'));
    }

}
