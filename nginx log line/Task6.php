<?php
$logFilePath = '/var/log/nginx/access.log.1'; // Update this with the correct path to your NGINX access log file

function parseNginxLogLine($logLine) {
    $logParts = explode(' ', $logLine);

    if (count($logParts) >= 12) {
      //  $userAgentStart = strpos($logLine, '"');
        //$userAgentEnd = strrpos($logLine, '"');
        //$userAgent = substr($logLine, $userAgentStart + 1, $userAgentEnd - $userAgentStart - 1);

        $parsedLog = [
            'ip' => $logParts[0],
            'timestamp' => $logParts[3] . $logParts[4],
            'method' => $logParts[5],
            'path' => $logParts[6].' '.$logParts[7], 
            'status_code' => $logParts[8],
            'size' => $logParts[9],
            'user_agent' => implode(' ', array_slice($logParts, 11)) // $userAgent User agent
        ];
        return $parsedLog;
    }
    return null; // Return null for lines that don't match the expected format
}

$logLines = file($logFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$parsedLogs = [];
foreach ($logLines as $logLine1) {
    $logLine = str_replace('"','',$logLine1);
    $parsedLog = parseNginxLogLine($logLine);
    if ($parsedLog !== null) {
        $parsedLogs[] = $parsedLog;
    }
}

$jsonLogs = json_encode($parsedLogs, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);

echo $jsonLogs; // Outputting JSON representation of parsed NGINX access log lines
?>
