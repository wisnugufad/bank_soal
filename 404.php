<?php 
  // echo $root = dirname( __FILE__ )."\index.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    @font-face {
      font-family: 'roboto';
      src: url('./assets/fonts/Roboto-Regular.ttf');
    }

    html {
      color: #adadad;
      font-size: 20px;
    }

    body {
      background-color: #fafafa;
    }

    p {
      font-size: 180px;
      margin-top: 100px;
      margin-bottom: 0px;
    }

    .btn {
      border-radius: 5px;
      font-size: 18px !important;
      padding: 10px 30px;
      font-size: 22px;
      text-decoration: none;
      margin: 20px;
      color: #fff;
      position: relative;
      display: inline-block;
    }

    .btn:active {
      transform: translate(0px, 5px);
      -webkit-transform: translate(0px, 5px);
      box-shadow: 0px 1px 0px 0px;
    }

    .blue {
      background-color: #adadad;
      box-shadow: 0px 5px 0px 0px #8a8a8a;
    }

    .blue:hover {
      background-color: #525252;
    }
  </style>
</head>
<body>
  <div align="center">
    <p>404</p>
    <span>Woops, Looks like this page doesn't exist.</span>
    <br>
    <!-- <a href="<?php echo $root; ?>" class="btn blue">Go Back</a> -->
  </div>
</body>
</html>