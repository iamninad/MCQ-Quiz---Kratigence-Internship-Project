<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
</head>
<body>
    <div class="py-5">
        <div class="container text-center">
            <form>
                <div class="form-group">
                    <label for="userid">Email address</label>
                    <input type="email" name="userid" class="form-control" id="userid" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <h5 class="text-muted">For demo : email = admin@admin.com <br>pass = admin</h5>
                <button onclick="validate()" value="Login" class="btn btn-primary">Login</button>
            </form>
            <script>
            function  validate() {
                var uname = document.getElementById('userid').value;
                var psw = document.getElementById('password').value;
                if(uname=='admin@admin.com' && psw=='admin'){
                    window.open("dashboard.php");
                }else{
                    alert('Enter correct details!');
                }
            }
                
            </script>


        </div>
    </div>
</body>
</html>