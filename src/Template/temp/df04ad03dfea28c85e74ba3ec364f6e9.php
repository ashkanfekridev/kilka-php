<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kilka-backend</title>
    <style>

        body{
            background: #fff;
        }
        p{
            font-family: IRANYekanWeb;
            text-align: center;
            margin-top: 28vh;
            font-size: 60px;
            color: #333;
        }

    </style>
</head>
<body>
    <p><?php echo $TITLE; ?></p>
    <p><?php echo $text; ?></p>

    <div>
        <?php foreach($users as $user){ ?>
        <p><?php echo $user['name']; ?></p>
        <?php } ?>
    </div>
</body>
</html>
