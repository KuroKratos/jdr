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
</html>
