<?php
    $conn = new mysqli('localhost', 'id12777838_adminku', '12345', 'id12777838_keluhan');

    if(!$conn){
    echo json_encode(['status' => 0, 'msg' => 'Koneksi Error!!!']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>keluhan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="head" style="text-align:center;">
        <h1>Vehicle Counting dengan Opencv</h1><br>
    </div>
  <form method='GET'>
    <div class="form-group">
      <label for="jobdesk">Jobdesk :</label>
      <input type="text" class="form-control" id="jobdesk" name="nama" placeholder="masukkan Jobdesk">
    </div>
    <div class="form-group">
      <label for="keluhan">Keluhan : </label>
      <textarea class="form-control" id="keluhan" name="keluhan" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <?php
    if (isset ($_GET['jobdesk'])) {
    $url = 'https://akbar277.000webhostapp.com/keluhan/rest.php?jobdesk='.urlencode($_GET['jobdesk'])."&keluhan=".urlencode($_GET['keluhan']);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    echo "Berhasil Dinputkan";
    curl_close($ch);
    }   
    ?>
    <h1>Keluhan</h1><br>
    <div class="container mt-3">
        <h2>KELUHAN</h2>
          <div class="media-body">
          <?php
            $sql = "SELECT * FROM keluhan";
            $result = mysqli_query($conn,$sql);
        
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                ?>
              <<tr>
                <td><?php echo $row['jobdesk'];?></td>
                <td><?php echo $row['tanggal'];?></td>
                <td><?php echo $row['keluhan'];?></td>
              </tr>
            <?php
          }
            } else {
            echo "0 results";
            }
            ?>     
          </div>
        </div>

</body>
</html>