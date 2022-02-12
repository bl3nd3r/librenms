<?php

$data = [];
$descr = '';

$temperature = snmp_get($device, '.1.3.6.1.4.1.22408.1.1.2.1.3.99.112.117.1', '-Oqv');
if (is_numeric($temperature) && $temperature > '0') {
    $descr = 'CPU Temperature';
    discover_sensor($valid['sensor'],
                    'temperature',
                    $device,
                    '.1.3.6.1.4.1.22408.1.1.2.1.3.99.112.117.1',
                    '117',
                    'primekey',
                    $descr,
                    '1',
                    '1',
                    null,
                    null,
                    null,
                    null,
                    $temperature
                );
}
