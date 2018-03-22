      </div>
    </div>
  </body>
<?php
      // LOADING JAVASCRIPT FILES
      if(!empty($js)) {
        foreach($js as $script) {
          echo "\t<script type='text/javascript' src='$script'></script>\r\n";
        }
      }
?>
  <script type='text/javascript' src='<?= assets_url("js/roll.js") ?>'></script>
  <script type='text/javascript' src='<?= assets_url("js/main.js") ?>'></script>
</html>
