function displayModal($button) {
	var url = $button.prop("tagName") === "A" ? $button.attr("href") : $button.attr("value");
	var params = $button.data("params");
	var title = $button.attr('title') !== undefined ? $button.attr("title") : $button.text();

	if (!$("#modal").data("bs.modal").isShown) {
		$('#modal').modal("show");
	}
	$("#modal").find("#modalContent").load(url, params, function (responseText, textStatus, req) {
		if (req.status !== 200) {
			$(this).html(responseText);
			$("#modalHeaderTitle").html("<h4>" + req.status + "</h4>");
		}
	});
	$("#modalHeaderTitle").html("<h4>" + title + "</h4>");
}


$(function () {

	$(document).on("click", ".showModalButton", function () {
		displayModal($(this));
		return false;
	});

	// Form ID is required: ActiveForm::begin(['options'=>['id'=>'forward-email-form']])
	$("#modal").on("beforeSubmit", "form", function () {
		var form = $(this);
		// return false if form still have some validation errors
		if (form.find(".has-error").length) {
			return false;
		}

		var displayResult = function (text, title) {
			if (title !== undefined) {
				$("#modalHeaderTitle").html("<h4>" + title + "</h4>");
			}
			$('#modalContent').html(text);
		};

		$('#modalContent').html('<div style="text-align:center"><img src="/css/loader.gif"></div>');

		// submit form
		$.ajax({
			url: form.attr("action"),
			type: "post",
			data: form.serialize(),
			success: function (response) {
				if (response !== null && typeof response === "object") {
					$("#modal").modal("toggle"); // Close modal
					$("#modal").trigger({
						type: "modal:submit",
						response: response
					});
					if (response.status !== 200) {
						console.log(response);
					}
				}
				if (response.pjax !== undefined) {
					$.pjax.reload({container: response.pjax, async: false});
				}

				displayResult(response);
			},
			error: function (response) {
				displayResult(response.responseText, response.status + " " + response.statusText);
			}
		});
		return false;
	});

	$("#modal").on("modal:submit", function (e) {
		if (e.response.pjax) {
			$(e.response.pjax).before(e.response.message);
		} else {
			$(".container .breadcrumb").after(e.response.message);
		}
	});
});
