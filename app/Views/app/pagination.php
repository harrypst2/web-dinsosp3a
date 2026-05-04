<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(2);
?>
<ul class="pagination ms-auto">
	<li <?= $pager->hasPrevious() ? "class=\"page-item\"" : "class=\"page-item disabled\"" ?>>
		<a class="page-link" href="<?= $pager->getPrevious() ?>" tabindex="-1" aria-disabled="true">
			<?= tabler_icon("chevrons-left") ?>
		</a>
	</li>

	<?php foreach ($pager->links() as $link) : ?>
		<li <?= $link["active"] ? "class=\"mx-1 page-item active\"" : "class=\"mx-1 page-item\"" ?>>
			<a class="page-link" href="<?= $link["uri"] ?>">
				<?= $link["title"] ?>
			</a>
		</li>
	<?php endforeach ?>

	<li <?= $pager->hasNext() ? "class=\"page-item\"" : "class=\"page-item disabled\"" ?>>
		<a class="page-link" href="<?= $pager->getNext() ?>">
			<?= tabler_icon("chevrons-right") ?>
		</a>
	</li>
</ul>