<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoPractice2; //追記
use Illuminate\Support\Facades\Validator;


class TodoPractice2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todo_practice2 = TodoPractice2::where('status', false)->get();
        //$todo_practice2 = TodoPractice2::all();
        //$変数 = モデルクラス::where(カラム名, 値)->first(); // 最初のレコードだけ取得するとき

        return view('todo_practice2.index', compact('todo_practice2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'task_title' => 'required|max:100',
            'task_body' => 'required|max:100',
        ];

        $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];

        Validator::make($request->all(), $rules, $messages)->validate();





        //モデルをインスタンス化
        $todo2 = new TodoPractice2;

        //モデル->カラム名 = 値 で、データを割り当てる
        $todo2->title = $request->input('task_title');
        $todo2->body = $request->input('task_body');
        //データベースに保存
        $todo2->save();


        //リダイレクト
        return redirect('/todo2');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo_practice2 = TodoPractice2::find($id);
        return view('todo_practice2.edit', compact('todo_practice2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if ($request->status === null) {
            $rules = [
                'task_title' => 'required|max:100',
                'task_body' => 'required|max:100'
            ];

            $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];


            Validator::make($request->all(), $rules, $messages)->validate();




            //該当のタスクを検索
            $todo2 = TodoPractice2::find($id);

            //モデル->カラム名 = 値 で、データを割り当てる
            $todo2->title = $request->input('task_title');
            $todo2->body = $request->input('task_body');

            //データベースに保存
            $todo2->save();
        } else { // 完了ボタンを押したとき
            $todo2 = TodoPractice2::find($id);
            $todo2->status = true;
            $todo2->save();
        }
        //リダイレクト
        return redirect('/todo2');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TodoPractice2::find($id)->delete();

        return redirect('/todo2');
    }
}
