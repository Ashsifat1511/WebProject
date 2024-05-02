<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Unauthorized Access!</div>
                    <div class="card-body text-center">
                        <h1>Can't Access</h1>
                        <p>You can't access this page</p>
                        <p id="countdown">You will be redirected to the dashboard page in 10 seconds.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let seconds = 10;
        const countdownElement = document.getElementById('countdown');

        const interval = setInterval(function() {
            seconds--;
            countdownElement.textContent = 'You will be redirected to the dashboard page in ' + seconds + ' seconds.';
            if (seconds <= 0) {
                clearInterval(interval);
                window.location.href = '/dashboard';
            }
        }, 1000);
    </script>
</body>

</html>