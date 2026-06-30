<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome Email</title>
</head>
<body>
    <h2>Hello {{ $student->first_name }}!</h2>

    <p>Welcome to the Student Record System.</p>
    <p>Your student number is <strong>{{ $student->student_number }}</strong>.</p>
    <p>Course: {{ $student->course }}</p>
    <p>Year Level: {{ $student->year_level }}</p>

    <p>Thank you.</p>
</body>
</html>