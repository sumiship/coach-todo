<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>todoList</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <style>
   body {font-size:16pt; margin: 5px; }
   h1 { font-size:50pt; color:red;
       margin:-20px 0px -30px 0px; letter-spacing:-4pt; }
  .h1 {margin-bottom:20px;}
   .content {margin:10px; }
   </style>
</head>
<body class="container">
  <div class="row h1">
  <div class="col-offset-2 col-8">
   <h1>TodoList</h1>
  </div>
  </div>
  <div class="row">
   <div class="form">
    <form action="/todo/create" name="" method="POST">
      @csrf
      <input type="text" name="content">
      <button>追加</button>
    </form>
   </div>
  </div>
  <div class="row">
    <table>
      <tr>
        <th>作成日</th>
        <th>タスク名</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
     @foreach ($lists as $list)
      <tr>
        <td>
          {{$list->created_at}}
        </td>
        <td>
          <form action="{{ route('todo.update',['id'=>$list->id]) }}" method="POST">
          @csrf
            <input type="text" name="content" value="{{$list->content}}">
        </td>
        <td><button>更新</button></td>
          </form>
        <td>
          <form action="{{ route('todo.delete', ['id'=> $list->id]) }}" method="post">
          @csrf
            <button>削除</button>
          </form>
        </td>
      </tr>
     @endforeach
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>