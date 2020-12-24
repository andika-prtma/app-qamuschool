<br>
<br>
<table class="table table-hover">
	<?php foreach ($subnavbar->result() as $sb): ?>
		<tr ondblclick="update(<?= $sb->ID ?>);">
			<td><?= $sb->name ?></td>
		</tr>
	<?php endforeach ?>
</table>