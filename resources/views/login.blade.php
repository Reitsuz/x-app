<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<style>

body{
background:black;
color:white;
font-family:Arial;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.box{
width:300px;
}

input{
width:100%;
padding:10px;
margin-bottom:10px;
background:#111;
border:1px solid #333;
color:white;
}

button{
width:100%;
padding:10px;
background:#1da1f2;
border:0;
color:white;
cursor:pointer;
}

</style>

</head><meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>

<div class="box">

<h2>アカウント登録画面</h2>
<h6>※認証機能してないので全部適当に入力で</h6>

<form method="POST" action="/register">
@csrf

<input name="name" placeholder="名前">

<input name="username" placeholder="メールアドレス">

<input name="password" type="password" placeholder="パスワード">

<button>アカウント作成</button>

</form>

</div>

</body>
</html>


