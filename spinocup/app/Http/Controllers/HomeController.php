<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Http\Requests\UpdateRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $account_data = Register::all();
        return view('home', ['account_data' => $account_data]);
    }

    /**
     * プロフィール編集をフォームを表示する
     * @param int $id
     * @return view
     */
    public function update_profile($id)
    {
        $profile = Register::find($id);
        if (is_null($profile)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('home'));
        }
        return view('update_profile', ['profile' => $profile]);
    }
    /**
     * 更新処理
     * 
     * @return view
     */
    public function exeUpdate(UpdateRequest $request)
    {
        // 会員登録のデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            $update_profile = Register::find($inputs['id']);
            $update_profile->fill([
                'email' => $inputs['email'],
                'name' => $inputs['name'],
                'profile' => $inputs['profile']
            ]);
            $update_profile->save();
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            \Session::flash('error_msg', 'ユーザーネーム、またはメールアドレスが既に使用されています。');
            return back();
        }
        \Session::flash('update_success', 'おめでとうございます。更新が完了しました。');
        return redirect(route('home'));
    }
}
