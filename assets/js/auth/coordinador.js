

$(function() {
	$('#download').click(function() {
		var options = {
		};
		var pdf = new jsPDF('p', 'pt', 'a4');
		//pdf.text("Reporte numero");
		pdf.addHTML($("#pdf"), 15, 15, options, function() {
			pdf.save('informe.pdf');
		});
	});
});


