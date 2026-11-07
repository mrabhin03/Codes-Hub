<?php
$Nots = ["index.html", "CodeView.php"];
$ExtensionNot = ["class", "txt", "docx", "pdf", "jpg", "png"];

function h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

function getJavaFiles($directory, $rootDir, $Search) {
    global $ExtensionNot;
    $javaFiles = [];
    if ($rootDir === null) $rootDir = basename($directory);
    if (is_dir($directory)) {
        foreach (scandir($directory) as $item) {
            if ($item === '.' || $item === '..') continue;
            $itemPath = $directory . DIRECTORY_SEPARATOR . $item;
            if (is_dir($itemPath)) {
                $javaFiles = array_merge($javaFiles, getJavaFiles($itemPath, $rootDir, $Search));
            } elseif (is_file($itemPath)
                && !in_array(pathinfo($itemPath, PATHINFO_EXTENSION), $ExtensionNot)
                && stripos(basename($itemPath), $Search) !== false) {
                $relativePath = str_replace('\\', '/', str_replace('../', '', $itemPath));
                $Type = explode('/', $relativePath);
                $javaFiles[] = [
                    'FileName'      => $item,
                    'RootDirectory' => $Type[count($Type) - 2],
                    'FullPath'      => $relativePath,
                    'DateTime'      => date('Y-m-d H:i:s', filemtime($itemPath)),
                ];
            }
        }
    }
    return $javaFiles;
}

$Search = isset($_GET['Search']) ? $_GET['Search'] : '';
$RawDir = isset($_GET['Dir']) ? trim($_GET['Dir']) : '';
if (strpos($RawDir, '..') !== false || strpos($RawDir, '\\') !== false) $RawDir = ''; // block path traversal
$Dir = ($RawDir !== '') ? '/' . ltrim($RawDir, '/') : '';
$folderPath = '..' . $Dir;
$AllFiles = [];

if (is_dir($folderPath)) {
    foreach (scandir($folderPath) as $item) {
        $itemPath = $folderPath . DIRECTORY_SEPARATOR . $item;
        if (is_file($itemPath)
            && !in_array(pathinfo($itemPath, PATHINFO_EXTENSION), $ExtensionNot)
            && stripos(basename($itemPath), $Search) !== false) {
            $relativePath = str_replace('\\', '/', str_replace('../', '', $itemPath));
            $Main = explode('/', $relativePath);
            $AllFiles[] = [
                'FileName' => $item,
                'Type'     => $Main[count($Main) - 2] ?? '',
                'Path'     => $relativePath,
                'Creator'  => $Main[0],
                'DateTime' => date('Y-m-d H:i:s', filemtime($itemPath)),
            ];
        } elseif ($item !== '.' && $item !== '..' && is_dir($itemPath) && $item[0] !== '.' && $item != 'PHPs') {
            foreach (getJavaFiles($folderPath . "/" . $item, null, $Search) as $file) {
                $T = str_replace('\\', '/', $file['FullPath']);
                $AllFiles[] = [
                    'FileName' => $file['FileName'],
                    'Type'     => $file['RootDirectory'],
                    'Path'     => $T,
                    'Creator'  => explode('/', $T)[0],
                    'DateTime' => $file['DateTime'],
                ];
            }
        }
    }
} else {
    echo "The specified folder does not exist.";
}

$AllFiles = array_values(array_filter($AllFiles, function ($f) use ($Nots, $ExtensionNot) {
    return !in_array($f['FileName'], $Nots) && !in_array(pathinfo($f['Path'], PATHINFO_EXTENSION), $ExtensionNot);
}));
?>
<div class="dir"><h2><?= $RawDir === '' ? 'All' : h($RawDir) ?></h2></div>
<?php
if (count($AllFiles) === 0) {
    echo "<div class='code-main'><div class='empty'>No File Found</div></div>";
    exit;
}

usort($AllFiles, fn($a, $b) => strtotime($b['DateTime']) - strtotime($a['DateTime']));
$today = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('yesterday'));
?>
<div class="code-main">
<?php foreach ($AllFiles as $i => $file):
    $FilePath = base64_encode($file['Path']);
    $ts = strtotime($file['DateTime']);
    $fileDate = date('Y-m-d', $ts);
    $Latest = ($fileDate === $today || $fileDate === $yesterday);
    $parts = explode('-', $file['Type']);
    $TypeLabel = $parts[1] ?? $parts[0];
    $hue = crc32($TypeLabel) % 360; // each type gets its own consistent colour
?>
    <div class="card" style="--i:<?= min($i, 12) ?>;--tag:hsl(<?= $hue ?> 80% 72%)">
        <div class="card-body">
            <?php if ($Latest): ?><span class="badge-new">New</span><?php endif; ?>
            <h3><?= h($file['FileName']) ?></h3>
            <div class="meta">
                Type: <span class="type"><?= h($TypeLabel) ?></span><br>
                Qns: <b><?= h($file['Creator']) ?></b><br>
                <?= date('Y-m-d', $ts) ?>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn" target="_blank" rel="noopener" href="../CodeView.php?VGhpcyBpcyBzZW5zaXRpdmUgZGF0YQ=<?= h($FilePath) ?>">
                View Code
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
        </div>
    </div>
<?php endforeach; ?>
</div>