$(document).ready(function () {
	if ($("#org-chart").length > 0) {
		let chart = new OrgChart(document.getElementById("org-chart"), {
			template: "ula",
			enableSearch: false,
			mouseScrool: OrgChart.action.none,
			nodeBinding: {
				field_0: "Nama Lengkap",
				field_1: "Posisi",
				img_0: "img"
			},
			nodes: orgStructure
		});
	}
});