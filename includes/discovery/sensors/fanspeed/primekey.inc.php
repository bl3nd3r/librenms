<?php

/*
 *
 * OIDs described here:
 * https://doc.primekey.com/ejbca-appliance/operations/webconf-configurator-of-hardware-appliance/monitoring
 *
*/

$oids = [
    49 => [
        'descr' => 'CPU Fan',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.4.102.97.110.49.1',
    ],
    50 => [
        'descr' => 'System Fan 1',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.4.102.97.110.50.1',
    ],
    51 => [
        'descr' => 'System Fan 2',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.4.102.97.110.51.1',
    ],
    52 => [
        'descr' => 'System Fan 3',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.4.102.97.110.52.1',
    ],
];

foreach ($oids as $index => $entry) {
    $oid = $entry['oid'];
    $descr = $entry['descr'];

    $current = snmp_get($device, $oid, '-Oqv');

    if (is_numeric($current) && $current > '0') {
        discover_sensor($valid['sensor'],
                        'fanspeed',
                        $device,
                        $oid,
                        $index,
                        'primekey',
                        $descr,
                        1, // divisor
                        1, // multiplier,
                        null, // low_limit,
                        null, // low_warn_limit,
                        null, // warn_limit,
                        null, // high_limit,
                        $current
                    );
    }
}
