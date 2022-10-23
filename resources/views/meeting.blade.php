<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>meeting</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <calendar
        :args="{{ json_encode($args) }}"
    ></calendar>
</div>
<script src="{{ mix('/js/calendar.js') }}"></script>
</body>
</html>