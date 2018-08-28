<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="ckeditor.js"></script>
    <title>CKEditor 5</title>
    <style>
        .ck-editor__editable {
            min-height: 500px;
        }
    </style>
</head>
<body>

<textarea rows="90" name="content" id="editor"></textarea>

<script>

    let editorOptions = {};
    let editorObj;

    /*
   * Below is a list of default editor options. To disable one just put "//" comment left to the title
   */

    editorOptions.options = [
        'heading',         // h1, h2, h3 tag
        '|',               // it is just a section divider
        'bold',            // bold font
        'italic',          // italic font
        'underline',       // underline font
        'strikethrough',   // strikethrough font
        'code',            // code styling tag
        'highlight',       // to highlight some text samples
        '|',
        'imageUpload',     // imageUpload function
        'link',            // link insertion
        'bulletedList',    // bulleted list tag
        'numberedList',    // numbered list tag
        'blockQuote',      // blockQuote tag
        '|',
        'alignment',       // text alignment
        'fontFamily',      // font family choice
        'fontSize',        // font size choice
        '|',
        'undo',            // undo function
        'redo',            // redo function
        '|',
        'insertTable',     // insert table function
        'tableColumn',     // insert table column
        'tableRow',        // insert table row
        'mergeTableCells', // merge table cells
    ];

    ClassicEditor.create(document.querySelector('#editor'), {
        toolbar: editorOptions.options,
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif',
                'Ubuntu, Arial, sans-serif',
                'Ubuntu Mono, Courier New, Courier, monospace'
            ]
        },
        fontSize: {
            options: [
                9,
                11,
                13,
                'default',
                17,
                19,
                21
            ]
        },
        simpleUpload: {
            uploadUrl: 'http://<?= $_SERVER['HTTP_HOST']; ?>/upload.php'
        }
    }).then(editor => {
        editorObj = editor;
    })
        .catch(error => {
            console.error(error);
        });
</script>
<script src="apiTest.js"></script>

</body>
</html>