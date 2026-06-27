<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px;">
    <div style="max-width: 500px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px;">
        <h2 style="color: #00BD9D;">New Contact Message</h2>
        <p><strong>Name:</strong> {{ $contactName }}</p>
        <p><strong>Email:</strong> {{ $contactEmail }}</p>
        <p><strong>Message:</strong></p>
        <p style="background: #f0f0f0; padding: 15px; border-radius: 8px;">{{ $contactMessage }}</p>
    </div>
</body>
</html>
