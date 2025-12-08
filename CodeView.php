
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
  <?php
  $Language=array(
    'py'=>"Python",
    'java'=>"java",
    'js'=>"javascript",
    'html'=>"markup",
    'css'=>"markup",
  );
    if(!isset($_GET['VGhpcyBpcyBzZW5zaXRpdmUgZGF0YQ'])){
      die('No Data Found');
    }
    $decryptedData = base64_decode($_GET['VGhpcyBpcyBzZW5zaXRpdmUgZGF0YQ']);
    $filePath=$decryptedData;
    $fileContent = file_get_contents($filePath);
    $ext = pathinfo($filePath, PATHINFO_EXTENSION);
    $filePathTxt = preg_replace('/\.[^.]+$/', '', $filePath) . ".txt";
    
    if (file_exists($filePathTxt)) {
        $Question = file_get_contents($filePathTxt);
    }

    if ($fileContent === false) {
        die("Error reading the file!");
    }
    $folder = dirname($filePath);
    $fileName = basename($filePath);
    echo "<script>const path=`$folder`;</script>"
  ?>
    <style>
      .imageShow{
        display: none;
      }
      .imageShow.Show{
        width: 100%;
        height: 100vh;
        
        position: fixed;
        z-index: 50;
        backdrop-filter: blur(10px);
        display: grid;
        place-content: center;
        padding: 20px;
        box-sizing: border-box;
      }
      .imageShow.Show img{
        width: 100%;
        border-radius: 10px;
        max-height: 500px;
        transform: scale(0);
        animation: upscale .5s ease-in-out forwards;
      }
      @keyframes upscale {
        0%{
          transform: scale(0);
        }100%{
          transform: scale(1);
        }
      }
        body {
          user-select: none;
            font-family: Arial, sans-serif;
            background-color:#232323;
            margin: 0;
            padding: 0px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow:auto;
        }
        ::-webkit-scrollbar{
            width: 0px;
        }
        h1 {
            color: white;
            margin: 0px;
            margin-top:15px;
            font-size: 25px;
        }
        form {
            background-color: #333;
            box-sizing: border-box;
            border-radius: 8px;
            padding: 15px;
            padding-bottom: 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 700px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-bottom:30px;
        }
        .Code{
            user-select: none;
            border-radius:20px !important;
            color:#ddd;
            padding: 10px;
            margin: 0px;
            height:fit-content;
            transition: border-color 0.3s ease;
            display: block;
            margin: 0px 0;
            width: 98%;
            cursor: pointer;
        }
        textarea:focus {
            border-color: #3498db;
            outline: none;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
            font-size:14px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #2980b9;
        }
        #copies{
            font-size:14px;
        }
        button>b{
            font-weight:100;
        }
        #header-details{
          width:100%; 
          display:flex; 
          align-items:center; 
          justify-content:space-between;
        }
        #header-details a{
          color:white;
        }
        #inputBox{
           height: 100%;
           font-size: 15px;
           overflow: auto;
        }
        .QnsP{
          max-width: 700px;
          color:white
        }
        .QnsP img{
          width: 50%;
          border-radius:8px
        }
        @media (max-width:550px) {
          .QnsP{
            font-size: 11px;
            line-height:15px
          }
          #inputBox{
            font-size: 11px;
          }
          h1 {
            font-size: 18px;
          }
        }
    </style>
</head>
<body id='MainBody'>
  <div class="imageShow" onclick="imageShow(null,0)">
    <img src="" alt="" id="OutPutImage">
  </div>
    <h1><?php echo $fileName;?></h1>
    <?=(isset($Question))?"<p class='QnsP' id='QnsP'>Q: ".nl2br($Question)."</p>":""?>
    <form  method="post">
        <div id="header-details">
          <button type="button" onclick="copyText()"><ion-icon id="copies" name="copy-outline"></ion-icon> <b id="Copied">Copy</b> </button>
        </div>
        <pre ondblclick="copyText()" class='Code'><code class="language-<?=$Language[$ext]?> Code" id="inputBox" ></code></pre>        
    </form>
    <script>
        const copies = document.getElementById("copies");
        const Copied=document.getElementById("Copied");
        function copyText() {
            navigator.clipboard.writeText(code[0]);
            copies.name="checkmark-outline";
            Copied.innerHTML="Copied!"
            setTimeout(backToCopy, 2000);
        }
        function backToCopy(){
            copies.name="copy-outline";
            Copied.innerHTML="Copy"
        }

        code=[];
        code.push(<?php echo json_encode($fileContent); ?>);

        function getCodes(){
          const inputBox = document.getElementById("inputBox").textContent =`${code[0]}`;
        }
        getCodes();
       
        function printData(){
          obj=document.getElementById("QnsP")
          obj.querySelectorAll("img").forEach(element => {
            element.src=`${path}/${element.getAttribute("src")}`;
            element.addEventListener('click', () => {
              imageShow(element,1);
            });

          });
        }
        printData()


        function imageShow(obj,mode){
          const Shows=document.querySelector(".imageShow")
          const Out=document.getElementById("OutPutImage");
          if (mode==1){
            Out.src=obj.src
            Shows.classList.add("Show")
          }else{
            Shows.classList.remove("Show");
            Out.src=''
          }
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>