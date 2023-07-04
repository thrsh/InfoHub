<?php


$documentPath = '../uploads/'. $row['document_path'];
$extension = pathinfo($documentPath, PATHINFO_EXTENSION);

<script>
// Replace 'path/to/your/doc.docx' with the actual path to your DOC file
const docURL = 'path/to/your/doc.docx';

// Asynchronously convert DOC to HTML
const docContainer = document.getElementById('docContainer');
mammoth.extractRawText({ arrayBuffer: docURL }).then(result => {
    const html = result.value;
    docContainer.innerHTML = html;
});
</script>

?>