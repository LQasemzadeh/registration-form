<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        @font-face {
            font-family: Vazir;
            src: url('Vazir-Regular.eot');
            src: url('Vazir-Regular.eot?#iefix') format('embedded-opentype'),
            url('Vazir-Regular.woff2') format('woff2'),
            url('Vazir-Regular.woff') format('woff'),
            url('Vazir-Regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: Vazir;
            src: url('Vazir-Bold.eot');
            src: url('Vazir-Bold.eot?#iefix') format('embedded-opentype'),
            url('Vazir-Bold.woff2') format('woff2'),
            url('Vazir-Bold.woff') format('woff'),
            url('Vazir-Bold.ttf') format('truetype');
            font-weight: bold;
            font-style: normal;
        }
        @font-face {
            font-family: Vazir;
            src: url('Vazir-Black.eot');
            src: url('Vazir-Black.eot?#iefix') format('embedded-opentype'),
            url('Vazir-Black.woff2') format('woff2'),
            url('Vazir-Black.woff') format('woff'),
            url('Vazir-Black.ttf') format('truetype');
            font-weight: 900;
            font-style: normal;
        }
        @font-face {
            font-family: Vazir;
            src: url('Vazir-Medium.eot');
            src: url('Vazir-Medium.eot?#iefix') format('embedded-opentype'),
            url('Vazir-Medium.woff2') format('woff2'),
            url('Vazir-Medium.woff') format('woff'),
            url('Vazir-Medium.ttf') format('truetype');
            font-weight: 500;
            font-style: normal;
        }
        @font-face {
            font-family: Vazir;
            src: url('Vazir-Light.eot');
            src: url('Vazir-Light.eot?#iefix') format('embedded-opentype'),
            url('Vazir-Light.woff2') format('woff2'),
            url('Vazir-Light.woff') format('woff'),
            url('Vazir-Light.ttf') format('truetype');
            font-weight: 300;
            font-style: normal;
        }
        @font-face {
            font-family: Vazir;
            src: url('Vazir-Thin.eot');
            src: url('Vazir-Thin.eot?#iefix') format('embedded-opentype'),
            url('Vazir-Thin.woff2') format('woff2'),
            url('Vazir-Thin.woff') format('woff'),
            url('Vazir-Thin.ttf') format('truetype');
            font-weight: 100;
            font-style: normal;
        }
    </style>
    <style>
        body{
            font-family: 'Vazir', sans-serif;
        }

    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" 
    	      action="php/signup.php" 
    	      method="post"
    	      enctype="multipart/form-data">

    		<h4 class="display-4  fs-1">اطلاعات کاربر</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label class="form-label">نام و نام خانوادگی</label>
		    <input type="text" 
		           class="form-control"
		           name="fname"
		           value="<?php echo (isset($_GET['fname']))?$_GET['fname']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">ایمیل</label>
		    <input type="email"
		           class="form-control"
		           name="uname"
		           value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
		  </div>

            <div class="mb-3">
                <label class="form-label">شماره همراه</label>
                <input type="text"
                       class="form-control"
                       name="uname"
                       value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
            </div>

		  <div class="mb-3">
		    <label class="form-label">کلمه عبور</label>
		    <input type="password" 
		           class="form-control"
		           name="pass">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">تصویر</label>
		    <input type="file" 
		           class="form-control"
		           name="pp">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">ثبت نام</button>
		  <a href="login.php" class="link-secondary">ورود</a>
		</form>
    </div>
</body>
</html>