<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Refresh" content="2" />
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
    <title>Таймер обратного отсчета</title>
</head>
<body>
<?php
// Остаток времени действия персональной скидки
$diffTime = 86400 - (time() - $_COOKIE['timeStart']);

$hour = (bcdiv($diffTime, 3600)) % 24;
$minute = (bcdiv($diffTime, 60)) % 60;
$second = $diffTime % 60;
?>
    <div class="row">
        <div class="col-md-12 text-center">
          <p id="wellcome">До окончания Вашей персональной скидки осталось: 
          <p id="diffTime"><?php echo ($hour . ' ч ' . $minute . ' мин ' . $second . ' сек');?></p>
          </p>
        </div>
     </div>
</body>
</html>
