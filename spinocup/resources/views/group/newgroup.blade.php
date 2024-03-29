<html>

<head>
    <title>Hello</title>
    <link href="css/newview.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="form-wrapper">
        <h1>新規作成</h1>
        <form class="register-form" method="POST" action="{{route('roomstore')}}">
            @csrf
            <div class="form-item">
                <label for="roomname"></label>
                <input type="text" name="title" required placeholder="部屋名"></input>
            </div>
            <div class="selectdiv">
                <label>
                    <select name="class">
                        <option selected> 小学生 </option>
                        <option>中学生</option>
                        <option>高校生</option>
                        <option>大学生</option>
                    </select>
                </label>
            </div>
            <div class="button-panel">
                <input href="create" type="submit" class="button" title="Create Group" value="グループを作成"></input>
            </div>
        </form>
        <div class="form-footer">

        </div>
    </div>
    <a href="group" class="btn btn-3d-circle">
        <span class="btn-3d-circle-content">
            <span class="btn-3d-circle-front">戻る</span>
        </span>
        <span class="btn-3d-circle-back">↩ </span>
    </a>
</body>

</html>