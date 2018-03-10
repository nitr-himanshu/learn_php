<!DOCTYPE html>
<?php require_once '../private/intialize.php'; ?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1" />
    <link rel="stylesheet" href="<?php echo url_for("/css/bootstrap.min.css");?>"/>
    <script src="<?php echo url_for('/js/bootstrap.min.js'); ?>"></script>
    <title>Trying Something New</title>
  </head>
  <body>
    <div class="container">
      <h1>3 Grid Example</h1>
      <div class="row">
        <div class="col-md-4" style="background-color: #FF0099">
          <div class="list-inline">
          </div>
          Left
        </div>
        <div class="col-md-4" style="background-color: #AABBCC">
          Middle
        </div>
        <div class="col-md-4" style="background-color: #339900">
          Right
        </div>
      </div>
    </div>
  </body>
</html>
