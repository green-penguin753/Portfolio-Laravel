<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>Todo List-編集-</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    @vite('resources/css/app.css')
  </head>
  <body>
    <header>
      <p class=" header-text">Todo List</p>
    </header>
    <main>
      <div class="top-container">
        <p class="task-text">
          タスクを<span></span>編集する？
        </p>
        <form
          action="/tasks/{{ $task->id }}"
          method="post"
          >
          @csrf
          @method('PUT')
          <div>
            <label>
              <input
                class="text-input-form"
                type="text"
                name="task_name"
                value="{{ old(('task_name'),$task->name)  }}" 
                />
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
            <label
              class="deadline-input-form"
              >目標日：
              <input
                type="date"
                name="deadline"
                value="{{ $task->deadline }}" 
              />
            </label>
          </div>
          <div class="edit-buttons">
            <a
              href="/tasks"
              class="back"
              >
            ←もどる
            </a>
            <button
              type="submit"
              class="button add-button update-button"
              >
              ✏️編集する
            </button>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>