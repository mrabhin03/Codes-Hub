<?php
$Language = [
    'py'   => 'python',
    'java' => 'java',
    'js'   => 'javascript',
    'html' => 'markup',
    'css'  => 'css',
    'php'  => 'php',
    'c'    => 'c',
    'cpp'  => 'cpp',
    'cs'   => 'csharp',
    'sql'  => 'sql',
    'json' => 'json',
    'ts'   => 'typescript',
];
$Blocked = ['env', 'ini', 'htaccess']; // never shown, whatever the folder

if (!isset($_GET['VGhpcyBpcyBzZW5zaXRpdmUgZGF0YQ'])) {
    die('No Data Found');
}

$relative = base64_decode($_GET['VGhpcyBpcyBzZW5zaXRpdmUgZGF0YQ'], true);
if ($relative === false) die('No Data Found');

// only allow files inside this site's folder, never server/config files
$base = realpath(__DIR__);
$real = realpath(__DIR__ . DIRECTORY_SEPARATOR . $relative);
$ext  = strtolower(pathinfo((string)$real, PATHINFO_EXTENSION));
if ($real === false || strpos($real, $base . DIRECTORY_SEPARATOR) !== 0 || !is_file($real) || in_array($ext, $Blocked)) {
    die('No Data Found');
}

// .php snippets are fine to show (they are only read as text, never run),
// but keep the site's own files private: hidden folders, the PHPs folder,
// and any PHP file sitting directly in the site root (CodeView.php, etc.)
$segments = explode('/', str_replace('\\', '/', substr($real, strlen($base) + 1)));
foreach ($segments as $seg) {
    if ($seg !== '' && ($seg[0] === '.' || $seg === 'PHPs')) die('No Data Found');
}
if (in_array($ext, ['php', 'phtml']) && count($segments) < 2) {
    die('No Data Found');
}

$fileContent = file_get_contents($real);
if ($fileContent === false) {
    die('Error reading the file!');
}

$lang     = $Language[$ext] ?? 'none';
$fileName = basename($real);
$folder   = str_replace('\\', '/', dirname($relative));

$txtPath = preg_replace('/\.[^.]+$/', '', $real) . '.txt';
$Question = file_exists($txtPath) ? file_get_contents($txtPath) : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0f1117">
    <title>Code</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
    <style>
        :root{
            --bg:#0f1117; --bg2:#151823; --surface:#1a1e2b; --surface2:#222737;
            --line:rgba(255,255,255,.09); --line2:rgba(255,255,255,.18);
            --text:#eef0f6; --muted:#9aa2b8; --accent:#8b9bff;
            --font:'Sora',system-ui,-apple-system,'Segoe UI',Roboto,sans-serif;
            --mono:'JetBrains Mono',SFMono-Regular,Menlo,Consolas,monospace;
            --ease:cubic-bezier(.2,.8,.2,1);
        }
        *,*::before,*::after{box-sizing:border-box}
        html{scroll-behavior:smooth}
        body{
            margin:0;min-height:100vh;padding:28px 20px 56px;
            display:flex;flex-direction:column;align-items:center;gap:18px;
            background:var(--bg);color:var(--text);font-family:var(--font);line-height:1.6;
            -webkit-font-smoothing:antialiased;user-select:none;
        }
        body::before{
            content:"";position:fixed;inset:-30% -10% auto;height:420px;z-index:-1;pointer-events:none;
            background:radial-gradient(55% 60% at 28% 40%,rgba(91,108,255,.26),transparent 70%),
                       radial-gradient(40% 50% at 78% 30%,rgba(255,180,84,.10),transparent 70%);
            filter:blur(10px);
        }
        ::selection{background:#5b6cff;color:#fff}
        ::-webkit-scrollbar{width:0;height:8px}
        ::-webkit-scrollbar-thumb{background:#3a3f52;border-radius:10px}
        :focus-visible{outline:2px solid var(--accent);outline-offset:3px;border-radius:8px}

        h1{
            margin:0;width:100%;max-width:900px;
            font-family:var(--mono);font-size:clamp(18px,3.4vw,26px);font-weight:600;letter-spacing:-.01em;
            word-break:break-word;animation:rise .5s var(--ease) both;
        }
        @keyframes rise{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:none}}

        /* question */
        .QnsP{
            width:100%;max-width:900px;margin:0;padding:18px 22px;
            background:linear-gradient(160deg,var(--surface),var(--bg2));
            border:1px solid var(--line);border-left:3px solid var(--accent);border-radius:14px;
            color:var(--text);font-size:15px;line-height:1.75;
            animation:rise .5s var(--ease) .06s both;
        }
        .QnsP img{
            display:block;width:50%;max-width:100%;margin:12px 0;border-radius:10px;cursor:zoom-in;
            border:1px solid var(--line);transition:transform .3s var(--ease),box-shadow .3s;
        }
        .QnsP img:hover{transform:translateY(-3px);box-shadow:0 16px 34px rgba(0,0,0,.5)}

        /* code card */
        .card{
            width:100%;max-width:900px;overflow:hidden;
            background:var(--surface);border:1px solid var(--line);border-radius:16px;
            box-shadow:0 24px 60px rgba(0,0,0,.4);
            animation:rise .5s var(--ease) .12s both;
        }
        .bar{
            display:flex;align-items:center;justify-content:space-between;gap:12px;
            padding:10px 14px;background:var(--surface2);border-bottom:1px solid var(--line);
        }
        .dots{display:flex;gap:7px}
        .dots i{width:11px;height:11px;border-radius:50%;background:#3a3f52;display:block}
        .dots i:nth-child(1){background:#ff6b6b}
        .dots i:nth-child(2){background:#ffb454}
        .dots i:nth-child(3){background:#5fd68a}

        .copy{
            display:inline-flex;align-items:center;gap:8px;height:36px;padding:0 16px;
            border:0;border-radius:10px;background:#fff;color:#14161c;
            font:inherit;font-size:13.5px;font-weight:600;cursor:pointer;
            transition:transform .25s var(--ease),background .2s,box-shadow .25s;
        }
        .copy:hover{background:#e6e9f5;transform:translateY(-1px);box-shadow:0 8px 18px rgba(0,0,0,.35)}
        .copy:active{transform:scale(.96)}
        .copy svg{width:16px;height:16px}
        .copy.done{background:#5fd68a}
        .copy .ic-ok{display:none}
        .copy.done .ic-copy{display:none}
        .copy.done .ic-ok{display:block}

        pre.Code{
            margin:0 !important;padding:20px 22px !important;border-radius:0 !important;
            background:var(--bg2) !important;cursor:pointer;overflow:auto;
            tab-size:4;
        }
        pre.Code code,#inputBox{
            font-family:var(--mono) !important;font-size:14px !important;line-height:1.7 !important;
            text-shadow:none !important;background:none !important;
        }

        /* image viewer */
        .imageShow{
            position:fixed;inset:0;z-index:50;display:grid;place-content:center;padding:20px;
            background:rgba(8,10,16,.72);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);
            opacity:0;pointer-events:none;transition:opacity .25s;cursor:zoom-out;
        }
        .imageShow.Show{opacity:1;pointer-events:auto}
        .imageShow img{
            max-width:min(100%,1000px);max-height:85vh;border-radius:14px;
            box-shadow:0 30px 80px rgba(0,0,0,.6);
            transform:scale(.9);transition:transform .35s var(--ease);
        }
        .imageShow.Show img{transform:scale(1)}

        @media (max-width:550px){
            body{padding:20px 12px 40px}
            .QnsP{font-size:12.5px;line-height:1.65;padding:14px 16px}
            pre.Code{padding:14px !important}
            pre.Code code,#inputBox{font-size:11.5px !important}
        }
        @media (prefers-reduced-motion:reduce){*,*::before,*::after{animation:none!important;transition:none!important}}
    </style>
</head>
<body id="MainBody">
    <div class="imageShow" onclick="imageShow(null,0)">
        <img src="" alt="" id="OutPutImage">
    </div>

    <h1><?= htmlspecialchars($fileName, ENT_QUOTES, 'UTF-8') ?></h1>
    <?= ($Question !== null) ? "<p class='QnsP' id='QnsP'>Q: " . nl2br($Question) . "</p>" : "" ?>

    <div class="card">
        <div class="bar">
            <div class="dots"><i></i><i></i><i></i></div>
            <button type="button" class="copy" id="CopyBtn" onclick="copyText()">
                <svg class="ic-copy" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="12" height="12" rx="2"/><path d="M5 15V5a2 2 0 0 1 2-2h10"/></svg>
                <svg class="ic-ok" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12.5 4.5 4.5L19 7.5"/></svg>
                <b id="Copied" style="font-weight:600">Copy</b>
            </button>
        </div>
        <pre ondblclick="copyText()" class="Code language-<?= $lang ?>"><code class="language-<?= $lang ?>" id="inputBox"></code></pre>
    </div>

    <script>
        const path = <?= json_encode($folder) ?>;
        const code = [<?= json_encode($fileContent) ?>];
        const CopyBtn = document.getElementById("CopyBtn");
        const Copied = document.getElementById("Copied");
        let copyTimer = null;

        function copyText() {
            const done = () => {
                CopyBtn.classList.add("done");
                Copied.textContent = "Copied!";
                clearTimeout(copyTimer);
                copyTimer = setTimeout(backToCopy, 2000);
            };
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(code[0]).then(done).catch(fallbackCopy);
            } else {
                fallbackCopy();
            }
            function fallbackCopy() {
                const t = document.createElement("textarea");
                t.value = code[0];
                document.body.appendChild(t);
                t.select();
                document.execCommand("copy");
                t.remove();
                done();
            }
        }
        function backToCopy() {
            CopyBtn.classList.remove("done");
            Copied.textContent = "Copy";
        }

        document.getElementById("inputBox").textContent = code[0];

        function printData() {
            const obj = document.getElementById("QnsP");
            if (!obj) return;
            obj.querySelectorAll("img").forEach(element => {
                element.src = `${path}/${element.getAttribute("src")}`;
                element.addEventListener("click", () => imageShow(element, 1));
            });
        }
        printData();

        function imageShow(obj, mode) {
            const Shows = document.querySelector(".imageShow");
            const Out = document.getElementById("OutPutImage");
            if (mode == 1) {
                Out.src = obj.src;
                Shows.classList.add("Show");
            } else {
                Shows.classList.remove("Show");
                setTimeout(() => { if (!Shows.classList.contains("Show")) Out.src = ""; }, 260);
            }
        }
        document.addEventListener("keydown", e => { if (e.key === "Escape") imageShow(null, 0); });
    </script>
</body>
</html>