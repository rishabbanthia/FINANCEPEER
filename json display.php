<!DOCTYPE html>
<html>
  
<head>
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
    </script>
  
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
    </script>
  
    <style>
        .box {
            width: 750px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 100px;
        }
    </style>
</head>
  
<body>
    <div class="container box">
        <h3 align="center">
             JSON data into database
        </h3><br />
          
        <?php
          
           
            $connect = mysqli_connect("localhost", "root", "", "test"); 
              
            $query = '';
            $table_data = '';
            
         
            $filename = "data.json";
         
            $data = file_get_contents($filename); 
            
           
            $array = json_decode($data, true); 
            
           
            foreach($array as $row) {
  
                $query .= 
                "INSERT INTO rishab VALUES 
                ('".$row["userId"]."', '".$row["id"]."', 
                '".$row["title"]."', '".$row["body"]."'); "; 
               
                $table_data .= '
                <tr>
                    <td>'.$row["userId"].'</td>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["title"].'</td>
                    <td>'.$row["body"].'</td>

                </tr>
                '; 
            }
  
            if(mysqli_multi_query($connect, $query)) {
                echo '<h3>Finance peer JSON Data</h3><br />';
                echo '
                <table class="table table-bordered">
                <tr>
                    <th width="10%">User ID</th>
                    <th width="10%">ID</th>
                    <th width="30%">TITLE</th>
                    <th width="50%">BODY</th>
                </tr>
                ';
                echo $table_data;  
                echo '</table>';
            }
          ?>
        <br />
    </div>
</body>
  
</html>
