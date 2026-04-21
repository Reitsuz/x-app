<!DOCTYPE html>
<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0">
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

</head>
<body>

<div class="box">

<h2>Register</h2>

<form method="POST" action="/register">
@csrf

<input name="name" placeholder="name">

<input name="username" placeholder="username">

<input name="password" type="password" placeholder="password">

<button>作成</button>

</form>

</div>

</body>
</html>