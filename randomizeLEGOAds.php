<html>
  <head>
  	<base target="_blank" />
    <meta http-equiv="refresh" content="120">
    <script language="javascript" type="text/javascript">
      function resizeIframe(obj) {
        obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
      }
    </script>
    <style type="text/css">
      html, body {
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
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
      echo '<iframe width="' . $_GET['size'] . '" src="/showLEGOAffiliateAd.php?theme=' . $themes[array_rand($themes)] . '&size=' . $_GET['size'] . '" scrolling="no" frameborder="0" onload="resizeIframe(this)" allowtransparency="true"></iframe>';
    ?>
  </body>
</html>
