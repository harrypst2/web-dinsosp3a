/**
 * Current URL
 */
const current_url = window.location.href;

/**
 * DataTable Language
 * Indonesian
 */
let datatableLanguage = {
	"sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
	"sProcessing": "Sedang memproses...",
	"sLengthMenu": "Tampilkan _MENU_ entri",
	"sZeroRecords": "Tidak ditemukan data yang sesuai",
	"sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
	"sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
	"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
	"sInfoPostFix": "",
	"sSearch": "Cari:",
	"sUrl": "",
	"oPaginate": {
		"sFirst": "Pertama",
		"sPrevious": "Sebelumnya",
		"sNext": "Selanjutnya",
		"sLast": "Terakhir",
	},
};

/**
 * DataTable Columns
 */
function dtColumns() {
	let url = window.location.href;
	let now = url.split("/");
	let slug = now[now.length - 1];

	if (slug == "users") {
		return [
			{ data: "no", orderable: false },
			{ data: "name" },
			{ data: "username" },
			{ data: "email" },
			{ data: "action", orderable: false }
		];
	} else if (slug == "categories") {
		return [
			{ data: "no", orderable: false },
			{ data: "name" },
			{ data: "action", orderable: false }
		];
	} else if (slug == "news") {
		return [
			{ data: "no", orderable: false },
			{ data: "title" },
			{ data: "category" },
			{ data: "created_at" },
			{ data: "updated_at" },
			{ data: "action", orderable: false }
		];
	} else if (slug == "public") {
		return [
			{ data: "no", orderable: false },
			{ data: "title" },
			{ data: "created_at" },
			{ data: "updated_at" },
			{ data: "action", orderable: false }
		];
	} else if (slug == "agenda") {
		return [
			{ data: "no", orderable: false },
			{ data: "title" },
			{ data: "date" },
			{ data: "created_at" },
			{ data: "updated_at" },
			{ data: "action", orderable: false }
		];
	} else if (slug == "faqs") {
		return [
			{ data: "no", orderable: false },
			{ data: "question" },
			{ data: "answer" },
			{ data: "action", orderable: false }
		];
	} else if (slug == "category") {
		return [
			{ data: "no", orderable: false },
			{ data: "name" },
			{ data: "total" },
			{ data: "action", orderable: false }
		];
	} else if (slug == "list") {
		return [
			{ data: "no", orderable: false },
			{ data: "title" },
			{ data: "file" },
			{ data: "target" },
			{ data: "action", orderable: false }
		];
	} else if (slug == "files") {
		return [
			{ data: "no", orderable: false },
			{ data: "title" },
			{ data: "file" },
			{ data: "downloaded" },
			{ data: "active" },
			{ data: "action", orderable: false }
		];
	} else if (slug == "org-chart") {
		return [
			{ data: "no", orderable: false },
			{ data: "name" },
			{ data: "position" },
			{ data: "gender" },
			{ data: "bidang" },
			{ data: "nip" },
			{ data: "parent" },
			{ data: "action", orderable: false }
		];
	} else if (slug == "employees") {
		return [
			{ data: "no", orderable: false },
			{ data: "name" },
			{ data: "nip" },
			{ data: "gender" },
			{ data: "position" },
			{ data: "action", orderable: false }
		];
	} else if (slug == "sliders") {
		return [
			{ data: "no", orderable: false },
			{ data: "title" },
			{ data: "description" },
			{ data: "action", orderable: false }
		];
	} else if (slug == "partners") {
		return [
			{ data: "no", orderable: false },
			{ data: "name" },
			{ data: "url" },
			{ data: "description" },
			{ data: "action", orderable: false }
		];
	}
}

$(document).ready(function () {
	/**
	 * Toogle Show Password
	 */
	$("#show-password").on("click", function (evt) {
		evt.preventDefault();

		let password = $(this).parent().parent().find("input[name=\"password\"]");
		let type = password.attr("type");
		let submit = $("button[type=\"submit\"]");

		if (type == "password") {
			password.attr("type", "text");
			submit.attr("disabled", "disabled");
		} else {
			password.attr("type", "password");
			submit.removeAttr("disabled");
		}
	});

	/**
	 * Automatic Show Alert
	 */
	if ($(".notyf").length > 0) {
		let $notyf = $(".notyf");

		let type = $notyf.data("type");
		let message = $notyf.data("message");
		let duration = $notyf.data("duration");
		let ripple = $notyf.data("ripple");
		let dismissible = $notyf.data("dismissible");
		let position = {
			x: $notyf.data("x"),
			y: $notyf.data("y")
		};

		if (type && message && duration) {
			let notyf = new Notyf();
			notyf.open({
				type,
				message,
				duration,
				ripple,
				dismissible,
				position,
			});
		}
	}

	/**
	 * DataTable
	 */
	if ($(".datatable").length > 0) {
		let datatable = $(".datatable");
		let serverside = datatable.data("serverside");

		if (serverside) {
			datatable.DataTable({
				language: datatableLanguage,
				lengthMenu: [
					[10, 25, 50, 100, -1],
					[10, 25, 50, 100, "Semua"]
				],
				processing: true,
				serverSide: true,
				ajax: serverside,
				order: [],
				columns: dtColumns(),
			});
		} else {
			datatable.DataTable({
				language: datatableLanguage,
				lengthMenu: [
					[10, 25, 50, 100, -1],
					[10, 25, 50, 100, "Semua"]
				],
			});
		}
	}

	/**
	 * CUD Modal
	 */
	$(document).on("click", ".add-button", function (evt) {
		evt.preventDefault();

		let formSection = $("#modal-form form");
		let pageTitle = formSection.data("page");

		formSection.find("[readonly]").removeAttr("readonly");

		formSection.find("input:not([type=\"hidden\"])").val("");
		formSection.find("select").val("").change();
		formSection.find("[type=\"checkbox\"]").prop("checked", true);
		formSection.find("textarea").html("");

		formSection.find("h5.modal-title").html("Tambah " + pageTitle);
		formSection.attr("action", current_url + "/insert");
	});
	$(document).on("click", ".edit-button", function (evt) {
		evt.preventDefault();

		let formSection = $("#modal-form form");
		let pageTitle = formSection.data("page");

		let thisData = $(this).data();
		for (data in thisData) {
			if (data !== "id" && data !== "readonly") {
				formSection.find("input[name=\"" + data + "\"]").val(thisData[data]);
				formSection.find("select[name=\"" + data + "\"]").val(thisData[data]).change();
				formSection.find("[type=\"checkbox\"][name=\"" + data + "\"]").prop("checked", thisData[data]);
				formSection.find("textarea[name=\"" + data + "\"]").html(thisData[data]);
			}

			if (data === "readonly") {
				let { readonly } = thisData;
				let section = readonly.split(",");

				for (input in section) {
					formSection.find("input[name=\"" + section[input] + "\"]").attr("readonly", "readonly");
					formSection.find("select[name=\"" + section[input] + "\"]").attr("readonly", "readonly");
					formSection.find("textarea[name=\"" + section[input] + "\"]").attr("readonly", "readonly");
				}
			}
		}

		formSection.find("h5.modal-title").html("Ubah " + pageTitle);
		formSection.attr("action", current_url + "/update/" + thisData.id);
	});
	$(document).on("click", ".delete-button", function (evt) {
		evt.preventDefault();

		let name = $(this).data("name");
		let url = $(this).data("delete");

		$(".delete-modal-spesific-name").html(name);
		$(".delete-modal-do-delete").attr("href", url);
	});
	if ($("#modal-form").length > 0) {
		let formModal = document.getElementById("modal-form");
		formModal.addEventListener("hidden.bs.modal", function (evt) {
			let formSection = $("#modal-form form");

			formSection.find("input:not([type=\"hidden\"])").val("");
			formSection.find("select").val("").change();
			formSection.find("textarea").html("");

			formSection.find("h5.modal-title").html("");
			formSection.attr("action", "");
		});
	}
	if ($("#modal-danger").length > 0) {
		let deleteModal = document.getElementById("modal-danger");
		deleteModal.addEventListener("hidden.bs.modal", function (evt) {
			$(".delete-modal-spesific-name").html("");
			$(".delete-modal-do-delete").attr("href", "javascript:void(0)");
		});
	}

	/**
	 * Top offset for CKEditor 5
	 */
	let viewportTopOffset = 112;
	if (window.innerWidth <= 767) {
		viewportTopOffset = 56;
	}

	/**
	 * WatchDog for CKEditor 5
	 */
	const watchdog = new CKSource.EditorWatchdog();
	window.watchdog = watchdog;
	watchdog.setCreator((element, config) => {
		return CKSource.Editor
			.create(element, config)
			.then(editor => {
				return editor;
			});
	});
	watchdog.setDestructor(editor => {
		return editor.destroy();
	});
	watchdog.on("error", ckeditorError);

	/**
	 * CKEditor Full
	 */
	if ($(".editor").length > 0) {
		watchdog.create(document.querySelector(".editor"), {
			mediaEmbed: {
				previewsInData: true
			},
			toolbar: {
				viewportTopOffset,
				shouldNotGroupWhenFull: true,
				items: [
					"fontsize",
					"fontcolor",
					"fontbackgroundcolor",
					"|",
					"bold",
					"italic",
					"underline",
					"strikethrough",
					"subscript",
					"superscript",
					"|",
					"link",
					"specialcharacters",
					"|",
					"bulletedList",
					"numberedList",
					"-",
					"alignment",
					"outdent",
					"indent",
					"|",
					"findandreplace",
					"|",
					"imageUpload",
					"blockQuote",
					"insertTable",
					"mediaEmbed",
					"|",
					"undo",
					"redo"
				]
			},
			language: "id",
			image: {
				toolbar: [
					"imageTextAlternative",
					"imageStyle:inline",
					"imageStyle:block",
					"imageStyle:side"
				]
			},
			table: {
				contentToolbar: [
					"tableColumn",
					"tableRow",
					"mergeTableCells",
					"tableCellProperties",
					"tableProperties"
				]
			},
			licenseKey: "",
		}).catch(ckeditorError);
	}

	/**
	 * CKEditor Small
	 */
	if ($(".small-editor").length > 0) {
		watchdog.create(document.querySelector(".small-editor"), {
			mediaEmbed: {
				previewsInData: true
			},
			toolbar: {
				viewportTopOffset,
				shouldNotGroupWhenFull: true,
				items: [
					"bold",
					"italic",
					"underline",
					"strikethrough",
					"subscript",
					"superscript",
					"|",
					"link",
					"specialcharacters",
					"|",
					"findandreplace",
					"|",
					"undo",
					"redo"
				]
			},
			language: "id",
			image: {
				toolbar: [
					"imageTextAlternative",
					"imageStyle:inline",
					"imageStyle:block",
					"imageStyle:side"
				]
			},
			table: {
				contentToolbar: [
					"tableColumn",
					"tableRow",
					"mergeTableCells",
					"tableCellProperties",
					"tableProperties"
				]
			},
			licenseKey: "",
		}).catch(ckeditorError);
	}

	/**
	 * Dropify.js
	 */
	if ($(".dropify").length > 0) {
		$(".dropify").dropify();
	}
});

function ckeditorError(error) {
	console.error("Oops, something went wrong!");
	console.error("Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:");
	console.warn("Build id: m9wt1741xirn-nohdljl880ze");
	console.error(error);
}