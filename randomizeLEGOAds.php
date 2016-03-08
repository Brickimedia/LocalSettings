<?php
$themes = array(
  "starwars",
  "duplo",
  "ninjago",
  "city",
  "friends",
  "creator",
  "easter",
  "", //default
);
echo '<iframe src="/LEGOAffiliateAd.php?theme=' . $items[array_rand($items)] . '&size=' . $_GET['size'] . '" style="border:0;max-width:12em;" scrolling="no" allowtransparency="true"></iframe>';
