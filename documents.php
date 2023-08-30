<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <title>Documents</title>
    <style>
        /* #documents-page {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #documents-page .docs {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 80px;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
        }

        #documents-page .docs div {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            margin: 50px;
        }

        #documents-page .docs div i {
            font-size: 40px;

        }

        .container nav {
            flex: 0.5;
            margin-right: 20px;
        }

        .container #documents-page {
            flex: 2;
            display: flex;
            justify-content: center;
            align-items: center;
        } */
        #documents-page {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-top: 50px;
        }

        .docs {
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            margin-right: 400px;
        }

        .docs a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 80px;
            height: 80px;
            text-decoration: none;

        }

        .docs i {
            font-size: 40px;
        }

        .docs h1 {
            color: #321843;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <?php include 'header.php' ?>

    <div id="documents-page">
        <div class="docs">
            <h1>2021 Docs: </h1>
            <a href="sales.php"><i class="fa-solid fa-folder"></i></a>
            <a href="" target="_blank"><i class="fa-solid fa-folder"></i></a>
            <a href="" target="_blank"><i class="fa-solid fa-folder"></i></a>
            <a href="" target="_blank"><i class="fa-solid fa-folder"></i></a>
        </div>
        <div class="docs">
            <h1>2022 Docs: </h1>
            <a href="" target="_blank"><i class="fa-solid fa-folder"></i></a>
            <a href="" target="_blank"><i class="fa-solid fa-folder"></i></a>
            <a href="" target="_blank"><i class="fa-solid fa-folder"></i></a>
            <a href="" target="_blank"><i class="fa-solid fa-folder"></i></a>
        </div>
        <div class="docs">
            <h1>2023 Docs: </h1>
            <a href="" target="_blank"><i class="fa-solid fa-folder"></i></a>
            <a href="" target="_blank"><i class="fa-solid fa-folder"></i></a>
            <a href="" target="_blank"><i class="fa-solid fa-folder"></i></a>
            <a href="" target="_blank"><i class="fa-solid fa-folder"></i></a>
        </div>
    </div>

</body>

</html>