<?php include('/var/www/html/php-login/controllers/register.php'); ?>
<!doctype html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/php-login/css/style.css">

	<title>PHP Login System Test!</title>
	<!-- JQuery + Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="" method="post">
                    <h3>Register</h3>
		    <?php echo $successMsg; ?>
		    <?php echo $emailExists; ?>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" />
			<?php echo $_emailError; ?>
			<?php echo $emailEmptyError; ?>
                    </div>

		    <div class="form-group">
                        <label>Username</label>
                        <input type="Username" class="form-control" name="username" id="username" />
			<?php echo $_unameError; ?>
			<?php echo $unameEmptyError; ?> 
		    </div>
		    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password" />
			<?php echo $pwError; ?>
			<?php echo $pwEmptyError;  ?>
                    </div>

                    <button type="submit" name="signup" id="signup" class="btn btn-outline-primary btn-lg btn-block">
                        Sign up
                    </button>
		    <div style="text-align:center">
			<a href="/php-login/index.php">Cancel</a>
		    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>
    
