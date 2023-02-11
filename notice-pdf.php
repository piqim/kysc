<!DOCTYPE pdf>
<html lang="en">

<?php
//CONNECT TO DATABASE
require 'connection.php';

//ACQUIRE THE PDF FILE NAME FROM THE GET METHOD IN THE URL
$filepdf = $_GET['pdf'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notice PDF Reader</title>
</head>

<body>
    <!-- PDF SECTION -->
    <section id="pdfread">
        <div class="container-fluid">
            <!-- PDF READER -->
            <div>
                <iframe id="pdf-js-viewer" src="assets/web/viewer.html?file=pdf/<?php echo $filepdf;?>" title="webviewer"
                    frameborder="0" width="100%" height="700"></iframe>
            </div>
            </object>
        </div>
    </section>
    
</body>

</html>