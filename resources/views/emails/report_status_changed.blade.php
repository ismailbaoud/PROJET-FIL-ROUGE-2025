<!DOCTYPE html>
<html>
<head>
    <title>Report Status Updated</title>
</head>
<body>
    <h1>Hello {{ $report->user->userName }},</h1>
    <p>The status of your report (ID: {{ $report->id }}) has been updated to: <strong>{{ $report->status }}</strong>.</p>
    <p>Thank you for using our platform!</p>
</body>
</html>
