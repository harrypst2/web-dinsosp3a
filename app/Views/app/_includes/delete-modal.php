<div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Batal"></button>
			<div class="modal-status bg-danger"></div>
			<div class="modal-body text-center py-4">
				<?= tabler_icon("alert-triangle") ?>
				<h3>Apakah kamu yakin?</h3>
				<div class="text-muted">Kamu yakin akan menghapus <span class="delete-modal-spesific-name" style="font-weight: bold;"></span>? Ini tidak akan bisa dikembalikan.</div>
			</div>
			<div class="modal-footer">
				<div class="w-100">
					<div class="row">
						<div class="col">
							<a href="javascript:void(0)" class="btn btn-white w-100" data-bs-dismiss="modal">Batal</a>
						</div>
						<div class="col">
							<a href="javascript:void(0)" class="btn btn-danger w-100 delete-modal-do-delete">Hapus</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>