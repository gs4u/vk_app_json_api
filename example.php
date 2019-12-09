<?php

$requestURL = 'https://www.gs4u.net/en/vkapp.json?id=g6738030';


$arrContextOptions = array(
	"ssl" => array(
		"verify_peer"      => false,
		"verify_peer_name" => false,
	),
);
$json_string       = file_get_contents($requestURL, false, stream_context_create($arrContextOptions));
$servers           = json_decode($json_string, true);
foreach ($servers as $server)
{
	?>
	<div class="server">
		<div class="name">
			Name: <?php echo $server['name']; ?>
		</div>
		<div class="ipport">
			IP:Port: <?php echo $server['ip'] . ':' . $server['port']; ?>
		</div>
		<div class="map">
			Map: <?php echo $server['map']; ?>
		</div>
		<div class="players">
			Players: <?php echo $server['players'] . ' / ' . $server['players_max']; ?>
		</div>
		<div class="players">
			From: <?php echo $server['country'] . ', ' . $server['city']; ?>
		</div>
		<div class="players">
			Game: <?php echo $server['game']; ?>
		</div>
	</div>
	<hr>
<?php } ?>
