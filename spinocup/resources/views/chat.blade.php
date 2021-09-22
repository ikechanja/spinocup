<!DOCTYPE html>
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pusher Test</title>
  <meta name="csrf-token" content="{{csrf_token()}}">
  <link rel="stylesheet" type="text/css" href="/css/chat.css">
 <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  

</head>
<body>
  <!-- <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p> -->
  
  <!-- <div class="app">
  <div class="contents">
  <div class="top-left">
      <div class="top-logo1">
        <h1 class="logo-top">OMOIDE CHAT</h1>
      </div>
  </div>
   <div class="top-right">
    <li class="list-group-item active"># Chat room</li> -->
    <div class="container">
  <div class="row" id="app">
   <h1>Chat room</h1>
   <div class="offset-3 col-md-9">
    <li class="list-group-item active">Chat</li>
    <ul class="list-group"> 
     <!-- <message v-for="value in chat.message">
      @{{value}}
     </message> -->
     <table id="targetTable">
    <tbody>
        @for($i=0;$i<= 20;$i++)
        <tr>
            <td>{{$messageall[$i]->user->name}}</td>
            <td>{{$messageall[$i]->message}}</td>
        </tr>
        @endfor
    </tbody>
    </table>
    <!-- is_countable($messageall)-1 -->
    </ul>
    <input type="text" class="form-control" placeholder="Type your message here.." v-model='message' @keyup.enter='send' id="form1">
   </div>
  </div>
 </div>
 <script src="{{ asset('js/app.js') }}"></script>
</body>
<script>
    src="{{ asset('js/app.js') }}"

    //const usename = ''

    window.Pusher = Pusher;

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('5860cc0ba59b0e5a95ee', {
      cluster: 'ap3'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      //alert(JSON.stringify(data));
      datas = JSON.stringify(data);
      //alert(datas);
      jsondata = JSON.parse(datas);
      console.log(jsondata.message);

      let table = document.getElementById('targetTable');
      let newRow = table.insertRow();

      let newCell = newRow.insertCell();
      let newText = document.createTextNode(jsondata.user);
      newCell.appendChild(newText);

      newCell = newRow.insertCell();
      newText = document.createTextNode(jsondata.message);
      newCell.appendChild(newText);
      
    });
  </script>
   <style>
  .list-group{
   overflow-y: scroll;
   height: 400px;
  }
 </style>