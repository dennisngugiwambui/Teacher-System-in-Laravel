<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
        }
        .login-title {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            border: 2px solid #ff6f61;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #ff9a9e;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #ff6f61;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #ff9a9e;
        }
        .text-center a {
            color: #ff6f61;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .text-center a:hover {
            color: #ff9a9e;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2 class="login-title">Teacher Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
        </div>
        <div class="form-group">
            <label for="employee_id">Employee ID</label>
            <input type="password" class="form-control" id="employee_id" name="employee_id" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
        <div class="text-center mt-3">
            <a href="#">Forgot your password?</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}


<script>
    let idleTime = 0;

    // Increment the idle time counter every minute
    let idleInterval = setInterval(timerIncrement, 60000); // 1 minute

    // Zero the idle timer on mouse movement, key press, etc.
    window.onmousemove = resetTimer;
    window.onkeypress = resetTimer;

    function timerIncrement() {
        idleTime++;
        if (idleTime > 14) { // 15 minutes
            alert("You have been idle for too long. Please log in again.");
            window.location.href = '/login'; // Redirect to login page
        }
    }

    function resetTimer() {
        idleTime = 0;

        // Optionally, you can refresh the token here if needed
        refreshToken();
    }

    function refreshToken() {
        // Implement an AJAX call to refresh the token if needed
        fetch('/api/refresh-token', {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${getCookie('token')}`
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the token cookie
                    document.cookie = `token=${data.token}; path=/; max-age=${15 * 60}`;
                } else {
                    alert("Failed to refresh token. Please log in again.");
                    window.location.href = '/login';
                }
            })
            .catch(error => console.error('Error refreshing token:', error));
    }

    function getCookie(name) {
        let cookieArr = document.cookie.split(";");
        for(let i = 0; i < cookieArr.length; i++) {
            let cookiePair = cookieArr[i].split("=");
            if(name === cookiePair[0].trim()) {
                return decodeURIComponent(cookiePair[1]);
            }
        }
        return null;
    }
</script>

</body>
</html>
