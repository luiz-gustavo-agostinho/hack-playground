<?hh

function fileNameToName(string $fileName): string {
    $name = str_replace('.php', '', $fileName);
    $name = str_replace('-', ' ', $name);
    return ucwords($name);
}

function getPhpScripts(): Map<string, string> {
    $map = new Map<string, string>;

    $files = scandir(__DIR__);
    foreach ($files as $file) {
        if (false !== strpos($file, '.php')) {
            $map[] = Pair {$file, fileNameToName($file)};
        }
    }    
    return $map;
}

function printLinksToOtherScripts() {
    if (isset($_SERVER['SERVER_SOFTWARE'])) {
        echo '<hr><ul>';
        foreach (getPhpScripts() as $key => $value) {
            echo '<li><a href="' . $key . '">' . $value . '</a></li>';
        }
        echo '</ul>';
    }
}

printLinksToOtherScripts();
