<?php if (!empty($bidinfo)): ?>
    <?php if ($bidinfo->trading_status === 2): ?>
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
<p>取引が完了していません</p>
<?php endif; ?>
<?php else: ?>
<h2>※落札情報はありません。</h2>
<?php endif; ?>
