<?php

/*
 *
 * OIDs described here:
 * https://doc.primekey.com/ejbca-appliance/operations/webconf-configurator-of-hardware-appliance/monitoring
 *
*/

$oids = [
    52 => [
        'descr' => 'HSM',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.2.4.104.115.109.52.1',
    ],
    55 => [
        'descr' => 'Ext Battery',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.2.4.104.115.109.55.1',
    ],
];

foreach ($oids as $index => $entry) {
    $oid = $entry['oid'];
    $descr = $entry['descr'];

    $voltage = snmp_get($device, $oid, '-Oqv');
    $voltage = first_word($voltage);

    // print preg_replace ('/\s+\S+/', '', $volgate);

    if (is_numeric($voltage) && $voltage > '0') {
        discover_sensor($valid['sensor'],
                        'voltage',  // class
                        $device,    // device
                        $oid,       // oid
                        $index,     // index
                        'primekey', // type
                        $descr,     // descr
                        1,          // divisor
                        1,          // multiplier
                        null,       // low_limit
                        null,       // low_warn_limit
                        null,       // warn_limit
                        null,       // high_limit
                        $voltage,   // current
                        'snmp',     // poller_type
                        null,       // entPhysicalIndex
                        null,       // entPhysicalIndex_measured
                        'first_word' // user_func
                    );
    }
}
