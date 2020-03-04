<?php

foreach ($result as $user) :
?>
    <option value=<?=$user['id']?> ><?= $user['firstname'] . ' ' . $user['lastname']; ?></option>
<?php endforeach;
