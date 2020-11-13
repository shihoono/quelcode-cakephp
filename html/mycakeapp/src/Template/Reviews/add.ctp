<?php if ($authuser['id'] === $bidinfo->user_id || $authuser['id'] === $bidinfo->biditem->user_id): ?>
<?php if ($bidinfo->trading_status === 2): ?>
    <?php if ($reviewed === 0): ?>
        <h2>評価</h2>
        <h6>※必ず評価をお願いします</h6>
        <?= $this->Form->create($review) ?>
        <?= $this->Form->radio('rate',[
                                ['value' => 1, 'text' => '1(低)'],
                                ['value' => 2, 'text' => '2'],
                                ['value' => 3, 'text' => '3'],
                                ['value' => 4, 'text' => '4'],
                                ['value' => 5, 'text' => '5(高)'],
                            ]
                            ); ?>
        <?= $this->Form->control('comment', ['label' => '評価コメント', 'type' => 'textarea']); ?>
        <?= $this->Form->button('評価する') ?>
        <?= $this->Form->end() ?>
    <?php else: ?>
    <h2>評価済み</h2>
    <?php endif; ?>
<?php else: ?>
<h2>取引が完了していません</h2>
<?php endif; ?>
<?php else: ?>
<h2>このページは表示できません</h2>
<?php endif; ?>
