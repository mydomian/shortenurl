<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Hello, </h1>
    <p>I am {{ $name ?? '' }}</p>
    <p>Issue Title : {{ $ticket_title ?? '' }}</p>
    <p>Issue Details : {{ $ticket_issues ?? '' }}</p>
    <p>Issue Status : <span style="background: yellow; padding:6px">{{ $status ? 'Closed' : 'Pending' }}</span></p>
</body>
</html>
