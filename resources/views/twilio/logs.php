<?php
/**
 * @var GatheringLog[] $logs
 */
use Shin1x1\TwiliojpOsaka\Domain\Entity\GatheringLog;

?>
<table style="border: 1px #000 solid;">
    <tr>
        <th>電話番号</th>
        <th>プッシュ番号</th>
        <th>登録日時</th>
    </tr>
    <?php foreach ($logs as $log): ?>
        <tr>
            <td><?= e($log->getTelephoneNo()->getMaskedTelNo()) ?></td>
            <td style="text-align: center"><?= e($log->getPushed()) ?></td>
            <td><?= e($log->getCreatedAt()->format('Y-m-d H:i:s')) ?></td>
        </tr>
    <?php endforeach ?>
</table>