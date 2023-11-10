<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Script-Type" content="text/javascript">
  <!--サイトの説明 -->

  <!--css javascript-->
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
  <script src="../js/chratsample.js" defer></script>

  <style>
  .chart-wrapper {
    width: 100%;
    margin: auto;
  }
  </style>


</head>


<body id="body">
  <h1>ドーナツ型</h1>
  <div class="chart-wrapper">
    <canvas id="myChart"></canvas>
  </div>


  <form action="" method="post" onsubmit="updateChart(); return false;"> <input type="text" name="one">
    <input type="text" name="two">
    <input type="text" name="three">
    <input type="text" name="four">
    <input type="text" name="five">
    <input type="submit" name="did">
  </form>



</body>

</html>