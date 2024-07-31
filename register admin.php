<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="styles.css.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="Team">
        <div class="row">
            <div class="column">
                <div class="card">
                <a  href="register.php"><button class="button" >inscri de Client </button></a>
                </div>
            </div>
            <div class="column">
                <div class="card">
                <a  href="regad.php"><button class="button" >inscri de admin </button></a>
                
                    
                </div>
            </div>
        </div>
    </div>

    <h2>SIign admin</h2>

        <form action="process_register admin.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="name" name="name" required aria-describedby="usernameHelp">
                <div id="usernameHelp" class="form-text">Enter your username.</div>
                <div id="nameError" class="form-text text-danger"></div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Enter your email.</div>
                <div id="emailError" class="form-text text-danger"></div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required aria-describedby="passwordHelp">
                <div id="passwordHelp" class="form-text">Enter your password.</div>
                <div id="passwordError" class="form-text text-danger"></div>
            </div>
           
            <button type="submit" class="btn btn-primary">Sign In</button>
        </form>
    </div>

    <script src="script.js"></script> <!-- Include any client-side validation if needed -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
