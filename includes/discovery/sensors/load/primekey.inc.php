<?php

/*
 *
 * OIDs described here:
 * https://doc.primekey.com/ejbca-appliance/operations/webconf-configurator-of-hardware-appliance/monitoring
 *
*/

$oids = [
    50 => [
        'descr' => ' 1min average',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.5.108.111.97.100.50.1',
    ],
    51 => [
        'descr' => ' 5min average',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.5.108.111.97.100.51.1',
    ],
    52 => [
        'descr' => '15min average',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.5.108.111.97.100.52.1',
    ],
];

foreach ($oids as $index => $entry) {
    $oid = $entry['oid'];
    $descr = $entry['descr'];

    $current = snmp_get($device, $oid, '-Oqv');

    if (is_numeric($current) && $current > '0') {
        discover_sensor($valid['sensor'],
                        'load',     // class
                        $device,    // device
                        $oid,       // oid
                        $index,     // index
                        'primekey', // type
                        $descr,     // descr
                        1,          // divisor
                        100,        // multiplier
                        null,       // low_limit
                        null,       // low_warn_limit
                        null,       // warn_limit
                        null,       // high_limit
                        $current    // current
                    );
    }
}
