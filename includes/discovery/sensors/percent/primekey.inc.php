<?php

$data = [];
$descr = '';

$usage = snmp_get($device, '.1.3.6.1.4.1.22408.1.1.2.1.4.118.100.98.49.1', '-Oqv');
if (is_numeric($usage) && $usage > '0') {
    $descr = 'Database Usage';
    discover_sensor($valid['sensor'],
                    'percent',
                    $device,
                    '.1.3.6.1.4.1.22408.1.1.2.1.4.118.100.98.49.1',
                    '49',
                    'primekey',
                    $descr,
                    '1',
                    '1',
                    null,
                    null,
                    null,
                    null,
                    $usage
                );
}
