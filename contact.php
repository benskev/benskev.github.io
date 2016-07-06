<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'benskev.github.io Contact Form'; 
		$to = 'ben@benskev.co.za'; 
		$subject = 'Message from ' . $name;
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <title>BenSkev GitHub Repo</title>
    <link rel="stylesheet" href="stylesheets/styles.css">
    <link rel="stylesheet" href="stylesheets/github-dark.css">
    <link href="css/open-iconic-bootstrap.css" rel="stylesheet">
    <link href="css/anim.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="javascripts/respond.js"></script>
    <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <link rel="stylesheet" href="stylesheets/ie.css">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

  </head>
  <body>
      <div id="header">
        <nav>
          <li class="fork"><a href="benskev.github.io">Home</a></li>
          <!--<li class="downloads"><a href="https://github.com/benskev/spra/zipball/master">ZIP</a></li>
          <li class="downloads"><a href="https://github.com/benskev/spra/tarball/master">TAR</a></li>
          -->
          <li class="fork"><a href="/about">About Me :D</a></li>
          <li class="fork"><a href="/contact">Contact Meeeee</a></li>
          <li class="fork"><a href="https://github.com/benskev">View On GitHub</a></li>
          
          <li class="title">BenSkev GitHub Repo</li>
          
        </nav>
      </div><!-- end header -->

      <div class="wrapper">

      <section>
    <div class="wrapper">

      <section>
        <div id="title">
          <h1>BenSkev GitHub Repo</h1>
          <p>Basically just a collection of random computer programs that don't do anything signficant..</p>
          <hr>
          <span class="credits left">Project maintained by <a href="https://github.com/benskev">benskev</a></span>
          <span class="credits right">Hosted on GitHub Pages &mdash; Theme by <a href="https://twitter.com/michigangraham">mattgraham</a></span>
        </div>

        <h3>
<a id="say-waa" class="anchor" href="#say-waa" aria-hidden="true">
    <span aria-hidden="true" class="octicon octicon-link"></span>
</a>Throw me an ems on the interwebs</h3>
        <p>Contrary to popular folklore, computer nerds like emails and shi. Throw me a message or hit me a Facebook message :D or just use the form below to send me an email if you don't know what i'm talking about.</p>
        <h1 class="page-header text-center">Contact Form Example</h1>
            <form class="form-horizontal" role="form" method="post" action="index.php">
                    <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                                    <?php echo "<p class='text-danger'>$errName</p>";?>
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                                    <?php echo "<p class='text-danger'>$errEmail</p>";?>
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="message" class="col-sm-2 control-label">Message</label>
                            <div class="col-sm-10">
                                    <textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
                                    <?php echo "<p class='text-danger'>$errMessage</p>";?>
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
                            <div class="col-sm-10">
                                    <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
                                    <?php echo "<p class='text-danger'>$errHuman</p>";?>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                    <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                    <?php echo $result; ?>	
                            </div>
                    </div>
            </form> 
      </section>
      