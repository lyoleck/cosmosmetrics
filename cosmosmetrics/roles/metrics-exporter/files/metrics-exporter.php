<?php
function get_page($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    try {
        $page = curl_exec($ch);
        curl_close($ch);
    }
    catch (Exception $e) {
        return false;
    }
    return $page;
}

$status = json_decode(get_page('http://localhost:26657/status'), true);
$net_info = json_decode(get_page('http://localhost:26657/net_info'), true);
$metrics = array();

if (isset($net_info['result']['n_peers'])) {
    $metrics['n_peers'] = $net_info['result']['n_peers'];
}
if (isset($status['result']['sync_info']['latest_block_height'])) {
    $metrics['latest_block_height'] = $status['result']['sync_info']['latest_block_height'];
}
if (isset($status['result']['sync_info']['latest_block_time'])) {
    $metrics['out_of_sync'] = time() - strtotime($status['result']['sync_info']['latest_block_time']);
}

foreach ($metrics as $key => $metric) {
    echo "# HELP {$key} {$key}\n";
    echo "# TYPE {$key} gauge\n";
    echo "{$key} {$metric}\n";
}
?>
