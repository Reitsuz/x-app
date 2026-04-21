<!DOCTYPE html>
<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">

<style>

body{
margin:0;
background:#0a0a0a;
color:#e7e9ea;
font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto;
}

/* layout */
.layout{
display:flex;
max-width:1200px;
margin:auto;
}

/* sidebar */
.sidebar{
width:260px;
position:sticky;
top:0;
height:100vh;
padding:20px;
border-right:1px solid #1f1f1f;
}

.sidebar h2{
margin-bottom:20px;
}

.sidebar a{
display:block;
padding:10px 12px;
border-radius:999px;
color:#e7e9ea;
text-decoration:none;
margin-bottom:5px;
}

.sidebar a:hover{
background:#1a1a1a;
}

/* main */
.main{
flex:1;
border-right:1px solid #1f1f1f;
}

/* right */
.right{
width:300px;
padding:20px;
}

/* postbox */
.postbox{
padding:15px;
border-bottom:1px solid #1f1f1f;
background:#0a0a0a;
position:sticky;
top:0;
backdrop-filter:blur(10px);
z-index:10;
}

textarea{
width:100%;
background:#111;
border:1px solid #222;
color:white;
padding:12px;
border-radius:12px;
outline:none;
resize:none;
}

input[type="file"]{
margin-top:10px;
color:#aaa;
}

/* post card */
.post{
padding:16px;
border-bottom:1px solid #1f1f1f;
transition:.2s;
}

.post:hover{
background:#121212;
}

/* user */
.user{
font-weight:600;
margin-bottom:6px;
}

/* buttons */
button{
background:#1d9bf0;
border:0;
color:white;
padding:6px 12px;
border-radius:999px;
cursor:pointer;
margin-top:6px;
margin-right:5px;
font-size:13px;
}

button:hover{
background:#1a8cd8;
}

/* image */
img{
width:100%;
margin-top:10px;
border-radius:16px;
}

/* right panel */
.right h3{
margin-top:0;
}

.trend{
padding:10px;
background:#111;
border-radius:12px;
margin-bottom:10px;
}

</style>

</head>

<body>

<div class="layout">

<!-- sidebar -->
<div class="sidebar">

<h2>Y</h2>

<a href="/">🏠 ホーム</a>
<a href="/notifications">🔔 通知</a>
<a href="/logout">🚪 ログアウト</a>

</div>

<!-- main -->
<div class="main">

<!-- post box -->
<div class="postbox">

<form method="POST" action="/post" enctype="multipart/form-data">
@csrf

<textarea name="body" placeholder="つぶやきを記載"></textarea>

<input type="file" name="image">

<button>投稿</button>

</form>

</div>

<!-- posts -->
@foreach($posts as $post)

<div class="post">

<div class="user">
User {{ $post->user_id }}
</div>

<div>
{{ $post->body }}
</div>

@if($post->image)
<img src="/storage/{{$post->image}}">
@endif

<!-- actions -->
<form method="POST" action="/like/{{$post->id}}">
@csrf
<button>♥ いいね</button>
</form>

<form method="POST" action="/repost/{{$post->id}}">
@csrf
<button>🔁再投稿</button>
</form>

<form method="POST" action="/reply/{{$post->id}}">
@csrf
<input name="body" placeholder="返信内容を記載">
<button>返信</button>
</form>

</div>

@endforeach

</div>

<!-- right -->
<div class="right">

<h3>トレンド</h3>

<div class="trend">#laravel</div>
<div class="trend">#x</div>
<div class="trend">#render</div>
<div class="trend">#php</div>

</div>

</div>

</body>
</html>