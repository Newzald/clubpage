<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?
	/*
		Gets clubs info data 
		and reassembles as array
		then grabs the .../?club= id
	*/
	$pageURL = "clubpages.herokuapp.com/clubs";
	$str = file_get_contents('http://' . $pageURL . '/clubsinfo.json');
	$json = json_decode($str, true);
	$club = $_GET['club'];
	
	$social_list = [];
	/*
		Start grabbing info from array
		grabs: Full club name, both sections of about text, contect info, image references, contacts and contact details
	*/
	$club_name = $json[$club]['clubname'];
	$about_text_top = $json[$club]['abt1']; //make this dynamic later, i.e. auto breaks up about text into to sections provided a particular length
	$about_text_bottom = $json[$club]['abt2'];
	$contact_text = $json[$club]['contact'];
	
	$imgSQ = $club . '/' . $json[$club]['imgSQ'];
	$imgRQ = $club . '/' . $json[$club]['imgRQ'];
	$snapUN = $json[$club]['social']['snapchatName'];
	
	if ($snapUN != ''){
		$snapcode = 'http://' . $pageURL . '/' . $club . '/snapcode.png';
		}
	
	$contact_names = [$json[$club]['admins']['a1']['name'],$json[$club]['admins']['a2']['name'],$json[$club]['admins']['a3']['name']];
	$contact_numbers = [$json[$club]['admins']['a1']['phone'],$json[$club]['admins']['a2']['phone'],$json[$club]['admins']['a3']['phone']];
	$contact_emails = [$json[$club]['admins']['a1']['email'],$json[$club]['admins']['a2']['email'],$json[$club]['admins']['a3']['email']];
	
	$social_media = ($json[$club]['social']);
	
	/*
		Finish grabbing info from array
	*/
	?>
    <title><? echo $club_name; ?></title>
    
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#be1d23">
    <link rel="icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Bard">
    <meta name="application-name" content="Bard">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="./style.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="main.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Kameron|Open+Sans" rel="stylesheet">
  </head>
  <body>
      <nav class="navbar navbar-default navbar-fixed-top head_foot">
        <div class="container">
          <div class="navbar-header">
          <a class="navbar-brand" href="http://student.bard.edu/clublist/"><span class="logo" id="logoB">B</span><span class="logo hidden-xs" id="logoArd">ard</span></a>
          <span class="navbar-brand club-title"><? print $club_name; ?></span>
          </div>
        </div>
      </nav>
    	<div class="container">
          <div class="col-sm-8 info">
            <span class="title">About</span>
            <hr>
            <p class="about-info" id="ahead"><? echo $about_text_top; ?></p>
            <img class="about-image-lg" src="<? echo $imgRQ ?>" alt=":(">
            <img class="about-image-sm" src="<? echo $imgSQ ?>" alt=":(">
            <p class="about-info" id="behind"><? echo $about_text_bottom; ?></p>
            </div>
            <div class="col-sm-4 info">
            <span class="title">Contact</span>
            <hr>
            <p id="contact-info"><? echo $contact_text; ?></p>
            <div id="contacts">
                <div class="row">
                    <div class="col-lg-6"><span class="contact-name"><? echo $contact_names[0]; ?></span></div>
                    <div class="col-lg-6"><span class="contact-modus"><? echo $contact_numbers[0]; ?><br><a class="mailing" href="mailto:<? echo $contact_emails[0]; ?>"><? echo $contact_emails[0]; ?></span></a></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6"><span class="contact-name"><? echo $contact_names[1]; ?></span></div>
                    <div class="col-lg-6"><span class="contact-modus"><? echo $contact_numbers[1]; ?><br><a class="mailing" href="mailto:<? echo $contact_emails[1]; ?>"><? echo $contact_emails[1]; ?></span></a></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6"><span class="contact-name"><? echo $contact_names[2]; ?></span></div>
                    <div class="col-lg-6"><span class="contact-modus"><? echo $contact_numbers[2]; ?><br><a class="mailing" href="mailto:<? echo $contact_emails[2]; ?>"><? echo $contact_emails[2]; ?></span></a></div>
                </div>
            </div>
            <span class="title">Social</span>
            <hr>
                <div id="social-icons">
				<? 
                    foreach ($social_media as $value){
                            $index = array_search($value, $social_media);
                            if($value != '' and $index != 'snapchatName'){
                                echo '<a href="' . $value . '"><img class="social-icon" src="./icons/social-logo-' . $index . '.jpg" alt=""></a>';
                                }
                            elseif($index == 'snapchatName'){
                                echo '<img rel="popover" class="social-icon icon" title="Snapchat Username: ' . $snapUN . '" data-img="' . $snapcode . '" src="./icons/social-logo-snapchat.jpg" alt="">';
                                }
                            }
                ?>
                </div>
          </div>
        </div>
    <footer class="footer">
      <div class="container">
      	<p class="navbar-text">This club is sponsored by the Bard Student Government. For questions about Bard clubs, contact the <a href="mailto:studentactivities@bard.edu">Office of Student Activities</a> or <a href="mailto:sparc@bard.edu">SPARC</a>.</p>
      </div> 
    </footer>
  </body>
</html>