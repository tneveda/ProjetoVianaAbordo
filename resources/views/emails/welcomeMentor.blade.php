<DOCTYPE html>
   <html lang="en-US">
     <head>
     <meta charset="utf-8">
     </head>
     <body>
     <h2>   Hi {{$data['name']}}, we are glad you are here! Following are your account details: <br>
</h3>
<h3>Email: </h3><p>{{$data['email']}}</p>
<h3>Username: </h3><p>{{$data['username']}}</p>
<h3>Password: </h3><p>{{$data['password']}}</p>
</body>
</html>