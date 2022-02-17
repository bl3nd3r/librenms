<?php

/*
 *
 * OIDs described here:
 * https://doc.primekey.com/ejbca-appliance/operations/webconf-configurator-of-hardware-appliance/monitoring
 *
*/

$oids = [
    0 => [
        'descr' => 'VMs Status',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.2.118.109.1',
        'state_name' => 'VmsStatus',
        'group' => 'VMs',
        'states' => [
            ['value' => 0, 'generic' => 0, 'graph' => 0, 'descr' => 'AllOK'],
            ['value' => 1, 'generic' => 2, 'graph' => 1, 'descr' => 'Fail'],
        ],
    ],
    1 => [
        'descr' => 'DB Storage',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.4.118.100.98.50.1',
        'state_name' => 'DbStorage',
        'group' => 'DB',
        'states' => [
            ['value' => 0, 'generic' => 0, 'graph' => 0, 'descr' => '< 80% full'],
            ['value' => 1, 'generic' => 1, 'graph' => 1, 'descr' => '> 80% full'],
        ],
    ],
    2 => [
        'descr' => 'CPU Fan',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.4.102.97.110.53.1',
        'state_name' => 'CpuFan',
        'group' => 'Fans',
        'states' => [
            ['value' => 0, 'generic' => 0, 'graph' => 0, 'descr' => 'OK'],
            ['value' => 1, 'generic' => 2, 'graph' => 1, 'descr' => 'Fail'],
        ],
    ],
    3 => [
        'descr' => 'System Fans',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.4.102.97.110.54.1',
        'state_name' => 'SystemFans',
        'group' => 'Fans',
        'states' => [
            ['value' => 0, 'generic' => 0, 'graph' => 0, 'descr' => 'AllOK'],
            ['value' => 1, 'generic' => 1, 'graph' => 1, 'descr' => 'Fail'],
        ],
    ],
    4 => [
        'descr' => 'RAID Status',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.5.114.97.105.100.49.1',
        'state_name' => 'RaidStatus',
        'group' => 'Raid',
        'states' => [
            ['value' => 0, 'generic' => 0, 'graph' => 0, 'descr' => 'CleanOrActive'],
            ['value' => 1, 'generic' => 1, 'graph' => 1, 'descr' => 'Unhealthy'],
        ],
    ],
    // 5 => [       // @TODO determine state mappings
    //     'descr' => 'Galera Status',
    //     'state_name' => 'Galera Status',
    //     'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.8.99.108.117.115.116.101.114.52.1',
    //     'group' => 'DB',
    // ],
    6 => [
        'descr' => 'EJBCA Healthcheck',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.8.104.101.97.108.116.104.101.50.1',
        'state_name' => 'EjbcaHealthcheck',
        'group' => 'Apps',
        'states' => [
            ['value' => 0, 'generic' => 0, 'graph' => 0, 'descr' => 'AllOK'],
            ['value' => 1, 'generic' => 2, 'graph' => 2, 'descr' => 'NotRunning'],
        ],
    ],
    7 => [
        'descr' => 'Signserver Healthcheck',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.8.104.101.97.108.116.104.115.50.1',
        'state_name' => 'SignserverHealthcheck',
        'group' => 'Apps',
        'states' => [
            ['value' => 0, 'generic' => 0, 'graph' => 0, 'descr' => 'AllOK'],
            ['value' => 1, 'generic' => 2, 'graph' => 2, 'descr' => 'NotRunning'],
        ],
    ],
    // 8 => [    // @TODO determine state mappings
    //     'descr' => 'Enum of Status of HSM',
    //     'state_name' => 'HSM',
    //     'oid'   => '.1.3.6.1.4.1.22408.1.1.2.2.4.104.115.109.50.1',
    //     'group' => 'HSM',
    // ],
    9 => [
        'descr' => 'HSM Status',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.2.4.104.115.109.51.1',
        'state_name' => 'HsmStatus',
        'group' => 'HSM',
        'states' => [
            ['value' => 0, 'generic' => 0, 'graph' => 0, 'descr' => 'AllOK'],
            ['value' => 1, 'generic' => 2, 'graph' => 1, 'descr' => 'Fail'],
        ],
    ],
    10 => [  // @TODO clarify if internal or external
        'descr' => 'HSM Battery',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.2.4.104.115.109.53.1',
        'state_name' => 'HsmBattery',
        'group' => 'HSM',
        'states' => [
            ['value' => 0, 'generic' => 0, 'graph' => 0, 'descr' => 'AllOK'],
            ['value' => 1, 'generic' => 2, 'graph' => 1, 'descr' => 'Fail'],
        ],
    ],
    11 => [
        'descr' => 'Ext Battery',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.2.4.104.115.109.56.1',
        'state_name' => 'ExternalBattery',
        'group' => 'Ext Battery',
        'states' => [
            ['value' => 0, 'generic' => 0, 'graph' => 0, 'descr' => 'OkOrAbsent'],
            ['value' => 1, 'generic' => 2, 'graph' => 1, 'descr' => 'Fail'],
        ],
    ],
];

$class = 'state';
$divisor = 1;
$multiplier = 1;
$low_limit = null;
$low_warn_limit = null;
$warn_limit = null;
$high_limit = null;
$poller_type = 'snmp';
$entPhysicalIndex = null;
$entPhysicalIndex_measured = null;
$user_func = null;

$snmp_multi = snmp_get_multi_oid($device, array_column($oids, 'oid'));

foreach ($oids as $index => $entry) {
    $oid = $entry['oid'];
    $descr = $entry['descr'];
    $state_name = $entry['state_name'];
    $group = $entry['group'];
    $states = $entry['states'];

    //if (! empty($snmp_multi) && gettype($snmp_multi[$oid]) === 'string') {
    if (! empty($snmp_multi)) {
        $current = $snmp_multi[$oid];

        create_state_index($state_name, $states);

        if (is_numeric($current)) {
            discover_sensor($valid['sensor'],
                             $class,            // class
                             $device,           // device
                             $oid,              // oid
                             $index,            // index
                             $state_name,       // type
                             $descr,            // descr
                             $divisor,          // divisor
                             $multiplier,       // multiplier
                             $low_limit,        // low_limit
                             $low_warn_limit,   // low_warn_limit
                             $warn_limit,       // warn_limit
                             $high_limit,       // high_limit
                             $current,          // current
                             $poller_type,      // poller_type
                             $entPhysicalIndex, // entPhysicalIndex
                             $entPhysicalIndex_measured, // entPhysicalIndex_measured
                             $user_func,        // user_func
                             $group             // group
                            );
            create_sensor_to_state_index($device, $state_name, $index);
        }
    }
}
