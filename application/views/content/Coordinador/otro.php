<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title id='title'>HTML Page setup Tutorial</title>

	<script type="text/javascript">

        function myFunction()
        {

			var laroe="gaggd";
            var html = htmlToPdfmake(`
  <div>
    <h1>My title on page 1</h1>
    <p>
      This is my paragraph on page 1.
    </p>
    <h1 class="pdf-pagebreak-before">My title on page 2</h1>
    <p>This is my paragraph on page 2.</p>
  </div>
`);

            var docDefinition = {
                content: [
                    html
                ],
                pageBreakBefore: function(currentNode) {
                    return currentNode.style && currentNode.style.indexOf('pdf-pagebreak-before') > -1;
                }
            };

            var pdfDocGenerator = pdfMake.createPdf(docDefinition);


        }
	</script>
</head>
<body>

<button type="button" onclick="myFunction()">Click Me!</button>
</body>
</html>
