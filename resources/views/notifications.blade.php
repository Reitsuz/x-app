<!DOCTYPE html>
<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">

<style>

body{
background:black;
color:white;
font-family:Arial;
max-width:600px;
margin:auto;
}

.item{
border-bottom:1px solid #222;
padding:15px;
}

button{
background:#1da1f2;
border:0;
color:white;
padding:5px 10px;
}

</style>

</head>
<body>

<h2>通知</h2>

@foreach($notifications as $n)

<div class="item">

<div>
{{ $n->type }}
</div>

<div>
{{ $n->data }}
</div>

<form method="POST" action="/notifications/{{$n->id}}">
@csrf
<button>read</button>
</form>

</div>

@endforeach

</body>
</html>