 <!DOCTYPE html>
 <html lang="ja">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Todo_practice2</title>
     @vite('resources/css/app.css')
 </head>

 <body>
     <header>
         <div>
             <div>
                 <p>Todoアプリ</p>
             </div>
         </div>
     </header>

     <main>
         <div>
             <div>
                 <p>今日は何する？</p>
                 <form action="/todo2" method="POST">
                     @csrf


                     <div>
                         <label>
                             <input
                                 placeholder="タスクタイトル..." type="text" name="task_title" />
                             @error('task_title')
                             <p>
                                 {{ $message }}
                             </p>

                             @enderror
                         </label>
                         <label>
                             <input
                                 placeholder="タスク本文..." type="text" name="task_body" />
                             @error('task_body')
                             <div>
                                 <p>
                                     {{ $message }}
                                 </p>
                             </div>
                             @enderror
                         </label>


                         <button type="submit">
                             追加する
                         </button>
                     </div>

                 </form>
                 @if ($todo_practice2->isNotEmpty())
                 <div>
                     <div>
                         <div>
                             <table>
                                 <thead>
                                     <tr>
                                         <th scope="col">
                                             タスク</th>
                                         <th scope="col">
                                             <span>Actions</span>
                                         </th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($todo_practice2 as $item)
                                     <tr>
                                         <td>
                                             <div>
                                                 {{ $item->title }}
                                                 {{ $item->body }}
                                                 {{ $item->status }}
                                             </div>
                                         </td>
                                         <td>
                                             <div>
                                                 <div>
                                                     <form action="/todo2/{{ $item->id }}"
                                                         method="post"
                                                         role="menuitem" tabindex="-1">
                                                         @csrf
                                                         @method('PUT')
                                                         <input type="hidden" name="status" value="{{$item->status}}">
                                                         <button type="submit">完了</button>
                                                     </form>
                                                 </div>
                                                 <div>
                                                     <a href="/todo2/{{ $item->id }}/edit/">編集</a>
                                                 </div>
                                                 <div>
                                                     <form onsubmit="return deleteTask();"
                                                         action="/todo2/{{ $item->id }}" method="post"
                                                         role="menuitem" tabindex="-1">
                                                         @csrf
                                                         @method('DELETE')
                                                         <button type="submit">削除</button>
                                                     </form>
                                                 </div>
                                             </div>
                                         </td>
                                     </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
                 @endif
             </div>
         </div>
     </main>

  <script>
    function deleteTask() {
        if (confirm('本当に削除しますか？')) {
            return true;
        } else {
            return false;
        }
    }
  </script>
 

 </body>

 </html>