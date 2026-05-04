<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(2);
?>
<ul class="pagination justify-content-center mb-0">
	<li <?= $pager->hasPrevious() ? "class=\"page-item\"" : "class=\"page-item disabled\"" ?>>
		<a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang("Pager.previous") ?>">
			&laquo;
		</a>
	</li>

	<?php foreach ($pager->links() as $link) : ?>
		<li <?= $link["active"] ? "class=\"active page-item\"" : "class=\"page-item\"" ?>>
			<a class="page-link" href="<?= $link["uri"] ?>">
				<?= $link["title"] ?>
			</a>
		</li>
	<?php endforeach ?>

	<li <?= $pager->hasNext() ? "class=\"page-item\"" : "class=\"page-item disabled\"" ?>>
		<a class="page-link" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
			&raquo;
		</a>
	</li>
</ul>