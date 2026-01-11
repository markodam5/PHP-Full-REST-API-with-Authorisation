
<?php

require_once "RestClient.php";

// Header authorization send for server.php file:
    $api = new RestClient([
             'base_url' => $SERVER_URL,
             'headers' => array(
             'Authorization' => 'Basic' . base64_encode('4e44d509804f6b704bd10d4e1b601234')
             )
    ]);

// =============================================================================================
    // SEND REQUEST TO THE SERVER:

    // Return all data
    $result = $api->get("get"); // Parametar get is from get method on the Server.php file

    // Return data with specific ID:
    // $result = $api->get("get", ['id' => 2]);

    // Return with limit:
    // $result = $api->get("get", ['limit' => 5]);
// =============================================================================================
    
    $status = $result->getDecodedResponse();

    if($result->info->http_code != 200){
        $http_code = $result->info->http_code;
        echo "<p style='color:red;'><b> Status code " . ": " .$http_code. "</b></p>" ;

        // decode_response(); from RestClient.php file:
       $status = $result->getDecodedResponse();

        if(is_array($status) && isset($status['message'])){
            echo "<p style='color:red;'><b> $status[message] </b></p>";
        }else{
            echo 'Unexpected response';
        }

        exit();
    }


?>

<!-- =============================================================================================   -->
<!-- SHOW RESULTS: -->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rest tutorial</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Rest tutorial</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div> <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <p class="lead">REST API</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <?php

                        foreach($status['movies'] as $movie){
                            
                    ?>

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <a href="single.php?single=<?php echo $movie['movie_id'] ?>">
                                    <img style="width: 250px; height: 250px;" src="<?php echo $movie['movie_picture'] ?>" alt=""></a>

                                <div class="caption">
                                    <h4 class="pull-right"> </h4>
                                    <h4><a href="#"><?php echo $movie['movie_title'] ?></a>
                                    </h4>
                                    <p> <a target="_blank" href="<?php echo $movie['movie_link'] ?>">Watch trailer</a></p>

                                </div>
                                <div class="ratings">
                                    <p class="pull-right">Price: <?php echo $movie['movie_price'] ?>  DIN</p>
                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>

                                    </p>
                                </div>
                            </div>
                        </div>

                        <?php   } ?>


                </div> <!-- End of class row -->
            </div> <!-- End of class="col-md-9" -->
        </div> <!-- End of class="row" -->
    </div> <!-- End of class="container" -->


    <div class="container">
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website <?php echo date('Y'); ?></p>
                </div>
            </div>
        </footer>
        
    </div><!-- End of class="container" -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>
</html>
