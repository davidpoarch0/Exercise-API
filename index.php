<?php 
$url = "http://test.localfeedbackloop.com/api?apiKey=61067f81f8cf7e4a1f673cd230216112&noOfReviews=10&internal=1&yelp=1&google=1&offset=50&threshold=1";
$json = file_get_contents($url);
$json_data = json_decode($json, true);
// echo"<pre>";
// print_r($json_data); 
// echo"</pre>";

$business_info = $json_data["business_info"];
$business_address = $business_info["business_address"];
$business_phone = $business_info["business_phone"];
$business_name = $business_info["business_name"];

//total_rating array
$total_rating = $business_info["total_rating"];

$total_avg_rating = $total_rating["total_avg_rating"];
$total_no_of_reviews = $total_rating["total_no_of_reviews"];

$external_url = $business_info["external_url"];
$external_page_url = $business_info["external_page_url"];

$reviews_array = $json_data["reviews"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog Item</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=144716315690681";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt="logo">
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Home</a>
                    </li>
                    <li><a href="#">About Us</a>
                    </li>
                    <li><a href="#">Services</a>
                    </li>
                    <li><a href="#	">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <section id="blog" class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="blog">
                    <div class="blog-item">
                        <img class="img-responsive img-blog" src="images/blog/blog2.jpg" width="100%" alt="" />
                        <div class="blog-content">
                            <h3><?php echo $business_name; ?></h3>
                            <div class="entry-meta">
                                <span><i class="icon-user"></i> <a href="#"><?php echo $business_phone; ?></a></span>
                            </div>
                            <p class="lead"><?php echo $business_address; ?></p>
                            <hr><!-- 

                            <div class="author well">
                                <div class="media">
                                    <div class="pull-left">
                                        <img class="avatar img-thumbnail" src="images/blog/avatar.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <strong>John Doe</strong>
                                        </div>
                                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p>
                                    </div>
                                </div>
                            </div> -->
                            <div id="comments">
                                <div id="comments-list">
                                    <h3>Reviews</h3>
                                    <?php foreach($reviews_array as $row){ ?>
                                    <div class="media">
                                        <div class="pull-left">
                                            <img class="avatar img-circle" src="images/blog/avatar1.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="well">
                                                <div class="media-heading">
                                                    <strong><?php echo $row["customer_name"];  ?> <?php echo $row["customer_last_name"];  ?></strong>&nbsp; <small><?php echo $row["date_of_submission"];  ?></small>
                                                </div>
                                                <p><strong>Rating:</strong> <?php echo $row["rating"];  ?></p>
                                                <p><?php echo $row["description"];  ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="bottom" class="wet-asphalt">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h4>About Us</h4>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>
                    <p>Pellentesque habitant morbi tristique senectus.</p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4>Company</h4>
                    <div>
                        <ul class="arrow">
                            <li><a href="#">The Company</a>
                            </li>
                            <li><a href="#">Our Team</a>
                            </li>
                            <li><a href="#">Our Partners</a>
                            </li>
                            <li><a href="#">Our Services</a>
                            </li>
                            <li><a href="#">Faq</a>
                            </li>
                            <li><a href="#">Conatct Us</a>
                            </li>
                            <li><a href="#">Privacy Policy</a>
                            </li>
                            <li><a href="#">Terms of Use</a>
                            </li>
                            <li><a href="#">Copyright</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4>Latest Blog</h4>
                    <div>
                        <div class="media">
                            <div class="pull-left">
                                <img src="images/blog/thumb1.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <span class="media-heading"><a href="#">Pellentesque habitant morbi tristique senectus</a></span>
                                <small class="muted">Posted 17 Aug 2013</small>
                            </div>
                        </div>
                        <div class="media">
                            <div class="pull-left">
                                <img src="images/blog/thumb2.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <span class="media-heading"><a href="#">Pellentesque habitant morbi tristique senectus</a></span>
                                <small class="muted">Posted 13 Sep 2013</small>
                            </div>
                        </div>
                        <div class="media">
                            <div class="pull-left">
                                <img src="images/blog/thumb3.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <span class="media-heading"><a href="#">Pellentesque habitant morbi tristique senectus</a></span>
                                <small class="muted">Posted 11 Jul 2013</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4>Address</h4>
                    <address>
<strong>Twitter, Inc.</strong><br>
795 Folsom Ave, Suite 600<br>
San Francisco, CA 94107<br>
<abbr title="Phone">P:</abbr> (123) 456-7890
</address>
                    <h4>Newsletter</h4>
                    <form role="form">
                        <div class="input-group">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Enter your email">
                            <span class="input-group-btn">
<button class="btn btn-danger" type="button">Go!</button>
</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2016 <a href="#">Reviews</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a>
                        </li>
                        <li><a href="#">About Us</a>
                        </li>
                        <li><a href="#">Faq</a>
                        </li>
                        <li><a href="#">Contact Us</a>
                        </li>
                        <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>

</html>