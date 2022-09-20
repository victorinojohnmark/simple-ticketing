tinymce.init({
    selector: 'textarea#ticketTinyMCE', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    content_style: "body { font-family: Source Sans Pro; }"
});