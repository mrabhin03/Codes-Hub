<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Code Hub</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="css/styles.css?v=<?php echo time()?>" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"> Code Hub</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active All" aria-current="page" onclick='selectOption(this,"")'>All</a></li>
                        <?php
                            $AvlFolder=[];
                            $folderPath = '../';
                            if (is_dir($folderPath)) {
                                $items = scandir($folderPath);
                                foreach ($items as $item) {
                                    $itemPath = $folderPath . DIRECTORY_SEPARATOR . $item;
                                    if ($item !== '.' && $item !== '..' && is_dir($itemPath) && $item[0] !== '.' && $item!='PHPs') {
                                        $AvlFolder[]=$item;
                                        ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle <?=$item;?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?=$item;?></a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" onclick="selectOption(this.parentNode.parentNode.parentNode,'<?=$item;?>')">All</a></li>
                                            <?php
                                                $SubfolderPath = "../$item";
                                                if (is_dir($SubfolderPath)) {
                                                    $newitems = scandir($SubfolderPath);
                                                    foreach ($newitems as $Subitem) {
                                                        $itemPath = $SubfolderPath . DIRECTORY_SEPARATOR . $Subitem;
                                                        if ($Subitem !== '.' && $Subitem !== '..' && is_dir($itemPath) && $Subitem[0] !== '.' && $Subitem!='PHPs') {
                                                            ?>
                                                            <li><a class="dropdown-item" onclick='selectOption(this.parentNode.parentNode.parentNode,"<?=$item;?>/<?=$Subitem;?>")'><?=$Subitem;?></a></li>
                                                            <?php
                                                        }
                                                    }
                                                } else {
                                                    echo "The specified folder does not exist.";
                                                }
                                            ?>
                                        </ul>
                                    </li>
                                        <?php
                                    }
                                }
                            } else {
                                echo "The specified folder does not exist.";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

        <header class="bg-dark py-5">
           
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Code Hub</h1>
                    <p class="lead fw-normal text-white-50 mb-0">A Code Repository</p>
                    <input type="text" id='SearchDataInput' class="SearchData" placeholder='Search File'>
                </div>
                
            </div>
        </header>
        

        <section class="codeData" style='flex-grow:1;' >
            <div id='Loader-Spin'>
                <div class='spinner-box'>
                    <!-- <div class='spin1'></div> -->
                    <div class='spin2'></div>
                    <div class='spin3'></div>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5" style='position: relative;'  id='JavaCodes'>
                
            </div>
        </section>
        <footer class="py-5 bg-dark" style='margin-top:20px'>
            <div class="container"><p class="m-0 text-center text-white">This Website is a Prototype <br> <b>'Code Reviewer'</b> <a target='_blank' href="https://github.com/mrabhin03">By Abhin M</a></p></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js?v=<?php echo time()?>"></script>
        <?php
        $opFold='';
        if(isset($_GET["OpenFolder"]) && in_array($_GET["OpenFolder"],$AvlFolder)){
            $opFold=$_GET["OpenFolder"];
            echo"<script>ActiveSelector(document.querySelector('.$opFold').parentNode)</script>";
        }
        ?>
        <script>
            GetData('<?=$opFold?>','')
        </script>
    </body>
</html>
