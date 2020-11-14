<h2><?=$user->username?> の評価</h2>
<table class="vertical-table">
<tr>
	<th class="small" scope="row">評価平均</th>
	<td><strong><?=$rate_avg?></strong></td>
</tr>
</table>
<table cellpadding="0" cellspacing="0">
<thead>
	<tr>
		<th class="main" scope="col">評価コメント</th>
	</tr>
</thead>
<tbody>
<?php if (!empty($reviews)): ?>
	<?php foreach ($reviews as $review): ?>
	<tr>
		<td><?= h($review->comment) ?></td>
	</tr>
	<?php endforeach; ?>
<?php endif; ?>
</tbody>
</table>