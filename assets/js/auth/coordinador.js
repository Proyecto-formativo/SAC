

$(function() {
	$('#download').click(function() {
		let HTML_Width = $("#pdf").width();
		let HTML_Height = $("#pdf").height();
		let top_left_margin = 1;
		let PDF_Width = HTML_Width + (top_left_margin * 2);
		let PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
		let canvas_image_width = HTML_Width;
		let canvas_image_height = HTML_Height;
		let totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;
		let user = this.auth_user;
		html2canvas($("#pdf")[0], {allowTaint: true}).then(function (canvas) {
			canvas.getContext('2d');
			let imgData = canvas.toDataURL("image/jpeg", 1.0);
			let pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);

			pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);

			let counter = 0;

			for (let i = 1; i <= totalPDFPages; i++) {
				counter++;
				pdf.addPage(PDF_Width, PDF_Height);
				pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
			}
			pdf.save("reporte.pdf");
		});

	});
});





