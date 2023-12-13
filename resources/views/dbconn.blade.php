
<!DOCTYPE html>
<html>
<head>
    <title>Database Connection</title>
</head>
<body>
    <h1>Database Connection</h1>

   <div>
        <?php
        if(DB::connection()->getPdo()){
            echo "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
        }

        ?>
   </div>
</body>
</html>
