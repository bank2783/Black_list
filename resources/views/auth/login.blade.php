<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('/css/login.css')}}">
</head>
<body>

<h2>Black List</h2>

<div class="login-form">
    <form action="{{route('login_post')}}" method="post">
        @csrf
      <div class="imgcontainer">
        <img src="{{asset('/css/icon/login_page/1077114.png')}}" alt="Avatar" class="avatar">
      </div>
    
    <div class="container">
        <label for="email" class="form-label"><b>อีเมลล์</b></label>
        <input type="email" placeholder="Enter Username" name="email" required>
    
        <label for="psw" class="form-label"><b>รหัสผ่าน</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
            <div class="login-btn-box">
                <button type="submit" class="login-btn">Login</button>
            </div>
    </div>
</form>
</div>



</body>
</html>
