<?php use app\core\Application; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Name Works' ?></title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/daterangepicker.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css"/>
</head>
<body>

{{content}}

<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/assets/js/moment.min.js"></script>
<script type="text/javascript" src="/assets/js/daterangepicker.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>

</body>
</html>