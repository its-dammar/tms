<?php

if ($_SESSION['role'] == 1) :

elseif ($_SESSION['role'] == 2) :

elseif ($_SESSION['role'] == 3) :

else :
?>
    <script>
        history.back();
    </script>

<?php

endif;


?>