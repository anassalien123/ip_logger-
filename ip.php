<?php
    $ip = $_SERVER['REMOTE_ADDR'];
    $useragent = $_SERVER['HTTP_USER_AGENT'];

    // Detect browser
    preg_match('/(Firefox|Chrome|Safari|Edg|Brave)[\/\s]?([0-9.]*)/', $useragent, $bMatch);
    $browser = $bMatch[1] ?? 'Unknown';
    $browserVersion = $bMatch[2] ?? 'Unknown';

    // Detect OS
    preg_match('/(Windows NT|Mac OS X|Android|Linux|iPhone OS)[\/\s]?([0-9._]*)/', $useragent, $osMatch);
    $osRaw = $osMatch[1] ?? 'Unknown';
    $osVersion = isset($osMatch[2]) ? str_replace('_', '.', $osMatch[2]) : 'Not detected';

    // Normalize OS name
    $osMap = [
        'Windows NT' => 'Windows',
        'Mac OS X' => 'Mac OS',
        'iPhone OS' => 'iOS',
    ];
    $os = $osMap[$osRaw] ?? $osRaw;

    // Format log entry
    $data = "---------------------------\n";
    $data .= "IP: $ip\n";
    $data .= "User-Agent: $useragent\n";
    $data .= "Browser: $browser\n";
    $data .= "Browser Version: $browserVersion\n";
    $data .= "OS: $os\n";
    $data .= "OS Version: $osVersion\n";
    $data .= "Time: " . date("Y-m-d H:i:s") . "\n";
    $data .= "---------------------------\n\n";

    file_put_contents('data_ip.txt', $data, FILE_APPEND);
?>
