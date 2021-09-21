<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Requests\RoomRequest;

class RoomController extends Controller
{
    //
    public function showList()
    {
        return view('room.list');
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
