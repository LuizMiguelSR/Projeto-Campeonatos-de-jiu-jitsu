<!DOCTYPE html>
<html>
<head>
    <title>Exibição CKEditor</title>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<body>
    <h2>Conteúdo CKEditor</h2>
    {!! $teste !!}
    <script>
        CKEDITOR.replace('conteudo');
    </script>
</body>
</html>
