<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#0f1117" />
    <title>Code Hub By Abhin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="css/styles.css?v=<?php echo time() ?>" rel="stylesheet" />
</head>
<body>
<button class="fab Share" onclick="shareLink()" aria-label="Share">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="m8.6 13.5 6.8 4M15.4 6.5l-6.8 4"/></svg>
</button>

<nav class="nav" id="Nav">
    <div class="wrap">
        <a class="brand" href="./">Code Hub</a>
        <ul class="menu" id="menu">
            <li class="menu-item"><a class="chip active All" data-folder="" data-label="All" role="button" tabindex="0" onclick='selectOption(this,"")'>All</a></li>
            <?php
            $AvlFolder = [];
            $AvlSubFolder = [];
            $folderPath = '../';
            if (is_dir($folderPath)) {
                foreach (scandir($folderPath) as $item) {
                    $itemPath = $folderPath . DIRECTORY_SEPARATOR . $item;
                    if ($item !== '.' && $item !== '..' && is_dir($itemPath) && $item[0] !== '.' && $item != 'PHPs') {
                        $AvlFolder[] = $item;
                        $safe = htmlspecialchars($item, ENT_QUOTES);
            ?>
            <li class="menu-item">
                <a class="chip" data-folder="<?= $safe ?>" data-label="<?= $safe ?>" role="button" tabindex="0" aria-haspopup="true" aria-expanded="false">
                    <?= $safe ?>
                    <svg class="caret" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><path d="M1.5 3.5 5 7l3.5-3.5"/></svg>
                </a>
                <div class="dropdown" role="menu">
                    <a onclick='selectOption(this,"<?= $safe ?>")'>All</a>
                    <?php
                    $SubfolderPath = "../$item";
                    if (is_dir($SubfolderPath)) {
                        foreach (scandir($SubfolderPath) as $Subitem) {
                            $subPath = $SubfolderPath . DIRECTORY_SEPARATOR . $Subitem;
                            if ($Subitem !== '.' && $Subitem !== '..' && is_dir($subPath) && $Subitem[0] !== '.' && $Subitem != 'PHPs') {
                                $AvlSubFolder[$item][] = $Subitem;
                                $sub = htmlspecialchars($Subitem, ENT_QUOTES);
                    ?>
                    <a onclick='selectOption(this,"<?= $safe ?>/<?= $sub ?>")'><?= $sub ?></a>
                    <?php
                            }
                        }
                    } else {
                        echo "The specified folder does not exist.";
                    }
                    ?>
                </div>
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
</nav>

<header class="hero">
    <div class="wrap">
        <div class="hero-title">
            <h1>Code Hub</h1>
            <span class="Creator">Created by Abhin M</span>
        </div>
        <p class="lead">A Code Repository</p>
        <label class="search">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg>
            <input type="text" id="SearchDataInput" class="SearchData" placeholder="Search File" autocomplete="off">
        </label>
        <p class="tip">Tip: Open menu for sorted list</p>
    </div>
</header>

<main class="codeData">
    <div class="wrap" id="JavaCodes"></div>
</main>

<footer>
    <div class="wrap">This is a Prototype Website for<br><b>'Quick code share'</b> <a target="_blank" rel="noopener" href="https://github.com/mrabhin03">By Abhin M</a></div>
</footer>

<button class="fab to-top" id="ToTop" aria-label="Back to top">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 15 6-6 6 6"/></svg>
</button>
<div class="toast" id="Toast" role="status"></div>

<script src="js/scripts.js?v=<?php echo time() ?>"></script>
<?php
$opFold = '';
if (isset($_GET["OpenFolder"])) {
    $Folders = explode("/", $_GET["OpenFolder"]);
    if (in_array($Folders[0], $AvlFolder)) {
        $opFold = $Folders[0];
        if (count($Folders) > 1 && isset($AvlSubFolder[$Folders[0]]) && in_array($Folders[1], $AvlSubFolder[$Folders[0]])) {
            $opFold = $_GET["OpenFolder"];
        }
    }
}
?>
<script>initHub(<?= json_encode($opFold) ?>);</script>
</body>
</html>