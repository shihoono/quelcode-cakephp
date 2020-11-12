<?php if (!empty($bidinfo)): ?>
    <?php if ($authuser['id'] === $bidinfo->user_id || $authuser['id'] === $bidinfo->biditem->user_id): ?>
    <h2>「<?=$bidinfo->biditem->name ?>」</h2>
    <h3>※取引画面</h3>
        <?php if($authuser['id'] === $bidinfo->user_id && $bidinfo->trading_status === 0 && is_null($bidinfo->bidder_name)): ?>
        <?= $this->Form->create($bidinfo) ?>
        <fieldset>
            <legend>※：発送先情報</legend>
            <?php
                // echo $this->Form->control('id', array('value' => $bidinfo->id, 'type'=>'hidden'));
                echo $this->Form->control('bidder_name', ['label' => '宛先氏名']);
                echo $this->Form->control('bidder_address', ['label' => '住所']);
                echo $this->Form->control('bidder_phone_number', ['label' => '電話番号']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('送信')) ?>
        <?= $this->Form->end() ?>
        <?php endif; ?>
        <?php if($bidinfo->trading_status === 0 && $bidinfo->bidder_name !== null): ?>
        <table class="vertical-table">
        <h4>発送先情報</h4>
        <tr>
            <th class="small" scope="row">宛先氏名</th>
            <td><?= h($bidinfo->bidder_name) ?></td>
        </tr>
        <tr>
            <th scope="row">住所</th>
            <td><?= h($bidinfo->bidder_address) ?></td>
        </tr>
        <tr>
            <th scope="row">電話番号</th>
            <td><?= h($bidinfo->bidder_phone_number) ?></td>
        </tr>
        </table>
            <?php if ($authuser['id'] === $bidinfo->biditem->user_id): ?>
                <?= $this->Form->create($bidinfo) ?>
                <?php echo $this->Form->button('発送完了', ['name'=>'sent']); ?>
                <?= $this->Form->end() ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php else: ?>
    <h2>*このページは表示できません。<h2>
    <?php endif; ?>
<?php else: ?>
<h2>※落札情報はありません。</h2>
<?php endif; ?>
