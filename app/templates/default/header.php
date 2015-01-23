<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>
    <meta charset="utf-8">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- css -->
    <link href="<?php echo DIR; ?>public/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo DIR; ?>public/css/bootstrap-theme.css" rel="stylesheet">
    <link href="<?php echo DIR; ?>public/css/style.css" rel="stylesheet">
    
    <!-- jquery put in header so we can run page specific js in views -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
</head>
<body>
    <!-- Navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Everything you want hidden at 940px or less, place within here -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo DIR; ?>">Home</a></li>
                    <li><a href="<?php echo DIR; ?>clients/">Clients</a></li>
                </ul> 
            </div>
        </div>
    </div> 
