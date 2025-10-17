<!DOCTYPE html>
<html lang="ja">
 
<head>
    <title>Todo List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css"> 
    @vite('resources/css/app.css')
</head>
 
<body>
    <header>
            <p class="header-text">Todo List</p>
    </header>

    <main>
        <div class="top-container">
            <p class="task-text">思いついたことから <span></span>かいてみる？</p>
            <form action="/tasks" method="post">
                @csrf
                <div>
                    <label>
                        <input
                            class="text-input-form"
                            placeholder="お散歩にいく..." 
                            type="text" name="task_name" 
                            value="{{ old('task_name') }}"/>
                            @error('task_name')
                            <div>
                                <p class="required-message">
                                    {{ $message }}
                                </p>
                            </div>
                            @enderror
                    </label>
                </div>
                <div>
                    <label class="deadline-input-form">目標日：
                        <input
                            type="date" name="deadline"/>
                    </label>
                </div>
                <div class="button-wrapper">
                    <button type="submit" class="button add-button">
                        追加する
                    </button>
                </div>
            </form>
        </div> 

    
        <div class="task-container">
            @if ($tasks->isNotEmpty())
                <table>
                    <thead>
                        <tr class="th-wrapper">
                            <th scope="col">
                                完了
                            </th>
                            <th scope="col">
                                目標日
                            </th>
                            <th scope="col">
                                タスク
                            </th>
                            <th scope="col">
                                アクション
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $item)
                            <tr class="task-wrapper">
                                <td>
                                    <div>
                                        <form action="/tasks/{{ $item->id }}"
                                            method="post"
                                            role="menuitem" tabindex="-1">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="flag" value="{{$item->flag ? 0 : 1 }}}">
                                            <button type="submit"
                                            class="flag-button">
                                                {{ $item->flag ? '✅' : '⬜' }}
                                            </button>
                                        </form>
                                    </div>    
                                </td>
                                
                                <td>
                                    <div class="deadline">
                                        {{ $item->deadline ? $item->deadline->format('m/d') : '未設定'}}
                                    </div>
                                </td>

                                <td class="table-task">
                                    <div class="task">
                                        <span title="このタスクは{{ $item->created_at->format('m/d') }}に追加されました">
                                        {{ $item->task }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="/tasks/{{ $item->id }}/edit/"
                                        class="button edit-button">✏️<span class="action-buttons-text">編集</span></a>
                                    
                                    
                                        <form onsubmit="return deleteTask(@js($item->task));"
                                            action="/tasks/{{ $item->id }}" method="post"
                                            role="menuitem" tabindex="-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                            class="button delete-button">🗑️<span class="action-buttons-text">削除</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <!--
                        <div class="paginate">
                            link
                        </div>-->
                    </tbody>
                </table>
            @endif
        </div>
    </main>


     <script>
        function deleteTask(task) {
        if (confirm(task + 'を\n本当に消してもいいですか？')) {
            return true;
        } else {
            return false;
        }
    }
  </script>
</body>
 
</html>