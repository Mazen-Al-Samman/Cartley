<?php
/**
 * @var string $title
 */
?>
<html lang="en">
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400&display=swap');

        * {
            font-family: 'Poppins', serif;
            letter-spacing: 1px;
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .nav {
            background-color: #f2f2f6;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
            border-radius: 8px;
            color: #01114f;
            font-weight: bold;
            font-size: 20px;
        }

        .text-center {
            text-align: center;
        }

        .result {
            background-color: #ef042d;
            color: white;
            padding: 30px;
            border-radius: 8px;
            margin-top: 10px;
            font-weight: bold;
        }

        pre {
            padding: 20px;
            font-family: monospace !important;
            font-size: 14px;
            border-radius: 8px;
            background-color: #f2f2f6;
        }
    </style>
    <title><?= $title ?></title>
</head>
<body>
<div class="container">
    <div class="nav"><?= $title ?></div>
</div>
<?= $this->renderSection('content') ?>
</body>
</html>