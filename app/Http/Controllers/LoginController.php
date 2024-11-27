<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Employee;
use App\Models\Review;

class LoginController extends Controller
{
    //ログイン画面の表示
    public function login()
    {
        return view('login');
    }

    // ログイン処理
    public function loginCheck(Request $req)
    {
        //name,passwordの入力の有無を確認
        $req->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // 社員情報を取得
        $employee = Employee::where('name', $req->name)->first();

        // 社員が存在し、パスワードが一致する場合
        if ($employee && Hash::check($req->password, $employee->password)) {
            // ログイン成功
            Auth::login($employee);//ログイン状態の維持(ファサード)
            return redirect()->route('top');
        }

        // エラー文
        return back()->withErrors([
            'name' => '社員名またはパスワードが間違っています。',
        ]);
    }

    // ログアウト
    public function logout()
    {
        Auth::logout();//ログイン情報の破棄(ファサード)
        return redirect()->route('login');
    }

}
