<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="ckeditor.js"></script>
    <title>CKEditor 5</title>
</head>
<body>

<textarea name="content" id="editor"></textarea>

<script>
    ClassicEditor.create(document.querySelector( '#editor' ), {
        simpleUpload: {
            uploadUrl: 'http://ckeditor/upload.php'
        }
    })
</script>

</body>
</html>