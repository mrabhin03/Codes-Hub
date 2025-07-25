<div class="code-main">
<?php
$Nots=["index.html","CodeView.php"];
$ExtensionNot=["class","txt","docx","pdf"];
function getJavaFiles($directory, $rootDir = null,$Search) {
    global $ExtensionNot;
    $javaFiles = []; 
    if ($rootDir === null) {
        $rootDir = basename($directory);
    }

    if (is_dir($directory)) {
        $items = scandir($directory);
        foreach ($items as $item) {
            if ($item !== '.' && $item !== '..') {
                $itemPath = $directory . DIRECTORY_SEPARATOR . $item;
                if (is_dir($itemPath)) {
                    $javaFiles = array_merge($javaFiles, getJavaFiles($itemPath, $rootDir,$Search));
                } elseif (is_file($itemPath) && !in_array((pathinfo($itemPath, PATHINFO_EXTENSION)) ,$ExtensionNot) && stripos(basename($itemPath), $Search) !== false)
                {
                    $relativePath = str_replace('../','',$itemPath);
                    $relativePath = str_replace('\\','/',$relativePath);
                    $Type=explode('/',$relativePath);
                    $javaFiles[] = [
                        'FileName' => $item,
                        'RootDirectory' => $Type[count($Type)-2],
                        'FullPath' => $relativePath,
                        'DateTime'=>date('Y-m-d H:i:s', filemtime($itemPath))
                    ];
                }
            }
        }
    }

    return $javaFiles;
}
?>
    <?php
    if(!isset($_GET['Dir'])){
        $Dir='';
    }else{
        if($_GET['Dir']!=''){
            $Dir = "/" . str_replace('/', "/", $_GET['Dir']);
        }else{
            $Dir='';
        }
    }
    $Search=$_GET['Search'];
    $folderPath = '..'.$Dir; 
    $AllFiles=[];
    if (is_dir($folderPath)) {
        $items = scandir($folderPath);
        foreach ($items as $item) {
            $javaFiles=[];
            $itemPath = $folderPath . DIRECTORY_SEPARATOR . $item;
            if (is_file($itemPath) && !in_array((pathinfo($itemPath, PATHINFO_EXTENSION) ),$ExtensionNot) && stripos(basename($itemPath), $Search) !== false) {
                $relativePath = str_replace('../','',$itemPath);
                $relativePath=str_replace('\\','/',$relativePath);
                $MainTemp=explode('/',$relativePath);
                $AllFiles[]=[
                    'FileName'=>$item,
                    'Type'=>$MainTemp[count($MainTemp)-2],
                    'Path'=>$relativePath,
                    'Creator'=>$MainTemp[0],
                    'DateTime'=>date('Y-m-d H:i:s', filemtime($itemPath))
                ];
            }else{
                if ($item !== '.' && $item !== '..' && is_dir($itemPath) && $item[0] !== '.' && $item!='PHPs') {
                    $directory = $folderPath."/".$item; 
                    $javaFiles = getJavaFiles($directory,null,$Search);
                    foreach ($javaFiles as $file) {
                        $T=str_replace('\\','/',$file['FullPath']);
                        $Cret=explode('/',$T);
                        $AllFiles[]=[
                            'FileName'=>$file['FileName'],
                            'Type'=>$file['RootDirectory'],
                            'Path'=>$T,
                            'Creator'=>$Cret[0],
                            'DateTime'=>$file['DateTime']
                        ];
                    }
                }
            }
        }
    } else {
        echo "The specified folder does not exist.";
    }
        if(count($AllFiles)==0){
            echo "<div style='grid-column: span 4;font-size:20px;text-align:center;color:white;'>No File Found</div>";
            die();
        }
        usort($AllFiles, function($a, $b) {
            return strtotime($b['DateTime']) - strtotime($a['DateTime']);
        });
        foreach ($AllFiles as $file) {
            if ($file['FileName'] !== '.' && $file['FileName'] !== '..') {
                if (!in_array((pathinfo($file['Path'], PATHINFO_EXTENSION) ),$ExtensionNot) && !in_array($file['FileName'], $Nots)) {
                    $FilePath= base64_encode($file['Path']);
                    $timestamp = strtotime($file['DateTime']);
                    $today = date('Y-m-d');
                    $yesterday = date('Y-m-d', strtotime('yesterday'));
                    $fileDate = date('Y-m-d', $timestamp);
                    $Latest=false;
                    if ($fileDate === $today) {
                        $Latest=true;
                    } elseif ($fileDate === $yesterday) {
                        $Latest=true;
                    }
                                        
    ?>
    <div class="card h-100">
        <!-- <img class="card-img-top" style='height:100px; width:100px; margin:5px auto; margin-top:15px;' src="assets/java.png" alt="..." /> -->
        <div class="card-body p-4">
            <div class="text-center">
                <?php if($Latest){?>
            <span style='padding:3px 5px;background-color:red; border-radius:4px; font-size:12px;'>New</span>
            <?php } ?>
            <h5 class="fw-bolder"  style='font-size:20px;margin-top:10px;'><?php $file1=$file['FileName']; echo $file1;?></h5>
                <span style='font-size:15px; color:#cfcfcf;'>
                    Type: <span style='color:white'><?php echo ( explode("-",$file['Type']))[1] ?></span><br>
                    Qns: <b><?php echo $file['Creator'] ?></b><br>
                    <?php  echo date('Y-m-d', $timestamp); ?><br>
            </span>
            </div>
        </div>
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" style='background-color:white;' onclick='ResetValue()' target='_blank' href="../CodeView.php?VGhpcyBpcyBzZW5zaXRpdmUgZGF0YQ=<?php echo $FilePath ?>">View Code</a></div>
        </div>
    </div>
    <?php
            }
        }
    }
    ?>
                        
</div>