<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <style>

    body {
      height: 100vh;
      background-color: #ffffff;
      overflow: hidden;
    }

    .loader {
      display: none; 
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 9999;
      background-color: #FBFBFB;
    }

    .loader img {
      width: 150px;
      height: 150px;
    }

    .blur-background {
      filter: blur(15px); 
      pointer-events: none; 
    }

  </style>
</head>
<body>

  <div class="loader">
    <img src="loader.gif" alt="Loading..." />
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {

      function showLoader() {
        $('.loader').show();
        $('.content').addClass('blur-background'); 
      }

      function hideLoader() {
        $('.loader').hide();
        $('.content').removeClass('blur-background'); 
      }

      showLoader();
      //hideLoader();

    });
  </script>
</body>
</html>