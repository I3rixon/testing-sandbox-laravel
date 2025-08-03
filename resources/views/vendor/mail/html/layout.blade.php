<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $subject ?? config('app.name') }}</title>
    <style>
        body {
            background-color: #f4f4f7;
            color: #51545E;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .email-wrapper {
            width: 100%;
            padding: 40px 0;
            background-color: #f4f4f7;
        }
        .email-content {
            width: 100%;
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .email-footer {
            text-align: center;
            color: #6B6E76;
            font-size: 13px;
            margin-top: 20px;
        }
        .email-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .email-header img {
            height: 150px;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <img src="{{ asset('assets/bird_2.jpg') }}" alt="{{ config('app.name') }} Logo">
            </div>

           {{ $slot }}
        </div>

        <div class="email-footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>
</html>
