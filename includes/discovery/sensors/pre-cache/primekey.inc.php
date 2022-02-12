<?php

echo 'Fans ';
$pre_cache['fans'] = snmpwalk_cache_oid($device, '.1.3.6.1.4.1.22408.1.1.2.1.4.102.97.110', [], 'NET-SNMP-EXTEND-MIB');

//echo 'HSM ';
//$pre_cache['hsm_sensors'] = snmpwalk_cache_oid($device, '.1.3.6.1.4.1.22408.1.1.2.2', [], 'NET-SNMP-EXTEND-MIB');
