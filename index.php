
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- jquery library londing-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="./css/main.css?">
    <script src ="./js/common.js" defer></script>
    <title>서전주 중학교</title>
</head>
<body>
    <!--$_SERVER['DOCUMENT_ROOT'] => c:\kkk\apm\apache24\htdocs\-->
    <!--c:\bbb\apm\apache24\hdocs-->
    <header>
       <?php include $_SERVER['DOCUMENT_ROOT']."/myproject_homepage/header.php"; ?>
    </header>
    <section>
       <?php include $_SERVER['DOCUMENT_ROOT']."/myproject_homepage/main.php"; ?>
    </section>
    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT']."/myproject_homepage/footer.php"; ?>
    </footer>
</body>
</html>