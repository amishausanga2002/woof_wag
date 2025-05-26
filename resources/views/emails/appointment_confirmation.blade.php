<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>
    <h2>Hello {{ $appointment->user->name }},</h2>

    <p>Your appointment for <strong>{{ ucfirst($appointment->type) }}</strong> has been booked.</p>

    <ul>
        <li><strong>Pet Name:</strong> {{ $appointment->pet_name }}</li>
        <li><strong>Date:</strong> {{ $appointment->preferred_date }}</li>
        <li><strong>Time:</strong> {{ $appointment->preferred_time }}</li>
        <li><strong>Notes:</strong> {{ $appointment->notes ?? '-' }}</li>
    </ul>

    <p>Thank you for choosing our services!</p>
</body>
</html>
