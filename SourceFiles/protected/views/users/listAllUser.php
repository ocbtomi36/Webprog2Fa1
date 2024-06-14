<div class="list_all_users">
    <h2>List of Users</h2>

    <?php if($rows === NULL || empty($rows)):?>

    <p>There is no record in file.</p>
    <?php else: ?>

    <table>
        <thead>
            <tr>
                <?php foreach ($label as $l): ?>
                    <th><?=$l?></th>
                <?php endforeach;?>
                <th>operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <?php foreach ($row as $field):?>
                        <td><?= $field ?></td>
                    <?php endforeach;?>
                        <td>
                            <a href="<?= BASE_URL?>start.php?U=users&M=details&P=<?=$row[0]?>">Details</a>
                            <a href="<?= BASE_URL?>start.php?U=users&M=modify&P=<?=$row[0]?>">Modify</a>
                            <a href="<?= BASE_URL?>start.php?U=users&M=delete&P=<?=$row[0]?>">Delete</a>
                        </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="spacing">
</div>
<?php endif;?>
