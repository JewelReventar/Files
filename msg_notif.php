<?php 
    $notif = $db->prepare("SELECT status FROM pm WHERE status = '0' AND senderid > 1 LIMIT 1");
    $notif->execute();
    while($rows = $notif->fetch()) : ?> 
            <?php if ($rows['status'] == 0) : ?>
                <span class="msg-notif">(New)</span>
    <?php endif; 
         endwhile; 
    $notif->close(); ?>