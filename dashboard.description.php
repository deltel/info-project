<?php 
    foreach ($issue as $output) :
        if($output['title'] === $_POST['title']) :
            $result = $output;
            break;
        endif;
    endforeach;

    foreach ($user as $output) :
        if($output['title'] === $_POST['title']) :
            $result += ['id' => $output['id']];
            $result += ['creatorFirstName' => $output['firstname']];
            $result += ['creatorLastName' => $output['lastname']];
            break;
        endif;
    endforeach;
?>

<h1><?=$result['title'];?></h1>
<p>Issue #<?=$result['id'];?></p><br>
<p><?=$result['description'];?></p>
<br><br>
<ul>
    <li>Issue created on <?=$result['created'];?> by <?=$result['creatorFirstName'] . ' ' . $result['creatorLastName'];?></li>
    <li>Last updated on <?=$result['updated'];?></li>
</ul>

<div id="rightBox">
    <ul>
        <li><p>Assigned To</p><?=$result['firstname'] . ' ' . $result['lastname'];?></li>
        <li><p>Type</p><?=$result['type'];?></li>
        <li><p>Priority</p><?=$result['priority'];?></li>
        <li><p>Status</p><?=$result['status'];?></li>
    </ul>
    <button>Mark as Closed</button>
    <button>Mark In Progress</button>
</div>

