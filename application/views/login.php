<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login Page</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="<?=base_url('assets/')?>css/facebook/app.min.css" rel="stylesheet" />
    <link href="<?=base_url('assets/')?>plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->
</head>
<body class="pace-top">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- end #page-loader -->
    
    <!-- begin login-cover -->
    <div class="login-cover">
        <div class="login-cover-image" style="background-image: url(<?=base_url('assets/')?>img/login-bg/Office-4.jpg)" data-id="login-cover-image"></div>
        <div class="login-cover-bg"></div>
    </div>
    <!-- end login-cover -->
    
    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <img src="<?=base_url('assets/')?>img/logo/cropped-Logo-1.png" style="width: 20%;"> <b>Sign</b> In
                    <small>Login Scheduler APP</small>
                </div>
                <div class="icon">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <!-- end brand -->
            <!-- begin login-content -->
            <div class="login-content">
                <form class="margin-bottom-0" action="<?=base_url('index.php/C_Dashboard/auth')?>" method="post">
                    <div class="form-group m-b-20">
                        <input type="text" name="username" class="form-control form-control-lg" autofocus="" autocomplete="off" placeholder="Username" required />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" data-toggle="password" data-placement="after" name="password" autocomplete="off" class="form-control form-control-lg" placeholder="Password" required />
                    </div>
                    <div class="login-buttons">
                        <button type="submit" id="btn-login" class="btn btn-success btn-block btn-lg">Sign me in</button>
                    </div>
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end login -->
        
    </div>
    <!-- end page container -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?=base_url('assets/')?>js/app.min.js"></script>
    <script src="<?=base_url('assets/')?>js/theme/facebook.min.js"></script>
    <script src="<?=base_url('assets/')?>plugins/bootstrap-show-password/dist/bootstrap-show-password.js"></script>
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?=base_url('assets/')?>plugins/highlight.js/highlight.min.js"></script>
    <script src="<?=base_url('assets/')?>js/demo/render.highlight.js"></script>
    <script src="<?=base_url('assets/')?>js/demo/login-v2.demo.js"></script>
    <script src="<?=base_url('assets/')?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
</body>
</html>

