<!doctype html>
<html>
<head>
   <meta charset="utf-8"/>
   <link href="css/list.css" rel="stylesheet" type="text/css">
   <title>上部ナビゲーション型</title>
</head>
<body>
<div>
    <div>
        <table>
            <thead>
                <tr>
                    <th scope="col">チャット番号</th>
                    <th scope="col">タイトル</th>
                    <th scope="col">日付</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($rooms as $room)
                <tr>
                    <th>{{ $room->id }}</th>
                    <td data-label="title" class="txt"><a href="groupH">{{ $room->title }}<a></td>
                    <td data-label="data" class="txt">{{ $room->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
            
        </table> 

        <a href="group" class="btn btn-3d-circle">
            <span class="btn-3d-circle-content">
                <span class="btn-3d-circle-front">戻る</span>
            </span>
            <span class="btn-3d-circle-back">↩  </span>
        </a>

    </div>
</div>
</body>
</html>




