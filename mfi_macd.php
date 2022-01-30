<?php
$ticker = $_POST['search'];
$target = 'C:\Users\Harsh\Desktop\indicator_backtesting\mfi_macd.py';
$c = $target . " " . $ticker;
$command_exec = escapeshellcmd($c);
$str_output = shell_exec($command_exec);
?>