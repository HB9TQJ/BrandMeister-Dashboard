<?php
$config['default language'] = "en";
$config['baseurl'] = "/dashboard/";

$config['custom_menu'] = array();

$config['LHServers'] = array();

//Add extra text to navbar
$config['brand'] = "";

//LH Servers first one is the default
$config['LHServers'][] = array('Name' => 'Global','url' => "https://bm-lastheard.pi9noz.ampr.org/lh/");
$config['LHServers'][] = array('Name' => '204 NL','url' => "https://bm-lastheard.pi9noz.ampr.org/lh-local/");
$config['LHServers'][] = array('Name' => '222 IT','url' => "http://www.digitalham.it:5001");
$config['LHServers'][] = array('Name' => '235 UK','url' => "http://81.174.156.160:5001");

$config['LH-table'] = "[0,1,0,1,1,1,1,1,1,1,1,1,1,0,0]";
