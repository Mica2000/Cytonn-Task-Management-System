<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Task Created</title>
</head>
<body>
    <h1>New Task: {{ $task->title }}</h1>
    <p><strong>Description:</strong> {{ $task->description }}</p>
    <p><strong>Status:</strong> {{ $task->status }}</p>
    <p><strong>Deadline:</strong> {{ $task->deadline }}</p>
</body>
</html>
