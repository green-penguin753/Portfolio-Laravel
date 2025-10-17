<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo2edit</title>

    @vite('resources/css/app.css')
</head>

<body>
    <header>
        <div>
            <div>
                <p>Todo2-編集画面</p>
            </div>
        </div>
    </header>

    <main>
        <div>
            <div>
                <form action="/todo2/{{ $todo_practice2->id }}" method="post">
                    @csrf
                    @method('PUT')

                    <div>

                        <label>
                            <input
                                type="text" name="task_title" value="{{ $todo_practice2->title }}" />
                            @error('task_title')
                            <div>
                                <p>
                                    {{ $message }}
                                </p>
                                @enderror
                        </label>
                        <label>
                            <input
                                type="text" name="task_body" value="{{ $todo_practice2->body }}" />
                            @error('task_body')
                            <div>
                                <p>
                                    {{ $message }}
                                </p>

                            </div>

                            @enderror
                        </label>

                        <div>
                            <a href="/todo2">
                                戻る
                            </a>
                            
                            <button type="submit">
                                編集する
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </main>

</body>

</html>