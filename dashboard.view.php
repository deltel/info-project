<?php

if (sizeof($issue) > 0) :
?>
    <table>
        <thead>
            <th>Title</th>
            <th>Type</th>
            <th>Status</th>
            <th>Assigned To</th>
            <th>Created</th>
        </thead>
        <tbody>
            <?php foreach ($issue as $row) : ?>
                <tr>
                    <td><a class="description" href="#"><?=$row['title'];?></a></td>
                    <td><?= $row['type']; ?></td>
                    <td><?php
                        if ($row['status'] === "Open") : ?>
                            <span class="open"><?=$row['status'];?></span>
                            <?php elseif ($row['status'] === "In Progress") : ?>
                                <span class="inProgress"><?=$row['status'];?></span>
                                <?php else : ?>
                                    <span class="closed"><?=$row['status'];?></span>
                                <?php endif; ?>
                     </td>
                    <td><?= $row['firstname'] . ' ' . $row['lastname']; ?></td>
                    <td><?= $row['created']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
<?php
else : echo "No Issues";
endif;
