<?php

function countLinesInProject($dir, $extensions = [], $excludeDirs = [])
{
    $totalLines = 0;
    $filesData = [];

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $skip = false;
            foreach ($excludeDirs as $excludeDir) {
                if (strpos($file->getPathname(), $excludeDir) !== false) {
                    $skip = true;
                    break;
                }
            }
            if ($skip) continue;

            $ext = strtolower($file->getExtension());
            if (in_array($ext, $extensions)) {
                $lines = count(file($file->getPathname()));
                $totalLines += $lines;
                $filesData[] = [
                    'path' => str_replace($dir, '', $file->getPathname()),
                    'lines' => $lines
                ];
            }
        }
    }

    // Tổng số tệp
    $totalFiles = count($filesData);

    // Tạo bảng HTML
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<title>Line Count Report</title>';
    echo '<style>';
    echo 'body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f9; }';
    echo 'h2 { color: #333; }';
    echo 'table { width: 100%; border-collapse: collapse; margin-top: 20px; background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }';
    echo 'th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }';
    echo 'th { background-color: #4CAF50; color: white; }';
    echo 'tr:nth-child(even) { background-color: #f9f9f9; }';
    echo 'tr:hover { background-color: #f1f1f1; }';
    echo '.total { font-weight: bold; margin-top: 20px; font-size: 1.2em; color: #4CAF50; }';
    echo '.total-files { font-weight: bold; margin-top: 5px; font-size: 1.2em; color: #4CAF50; }';
    echo '</style>';
    echo '</head>';
    echo '<body>';
    echo '<h2>Line Count Report</h2>';
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>File Path</th>';
    echo '<th>Lines</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($filesData as $file) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($file['path']) . '</td>';
        echo '<td>' . $file['lines'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '<div class="total">Total lines of code: ' . $totalLines . '</div>';
    echo '<div class="total-files">Total files: ' . $totalFiles . '</div>';
    echo '</body>';
    echo '</html>';

    return $totalLines;
}

$projectDir = $_SERVER['DOCUMENT_ROOT']; // Đường dẫn đến thư mục dự án của bạn
$extensions = ['php', "js", "html", "css"]; // Các phần mở rộng tệp cần đếm dòng
$excludeDirs = ['/PHPMailer/']; // Các thư mục cần loại trừ khỏi việc đếm dòng
$totalLines = countLinesInProject($projectDir, $extensions, $excludeDirs);
