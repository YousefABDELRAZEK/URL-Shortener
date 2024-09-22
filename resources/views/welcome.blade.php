<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <title>URL Shortener</title>
    <style>
        @property --angle {
            syntax: '<angle>';
            initial-value: 90deg;
            inherits: true;
        }
        @property --gradX {
            syntax: '<percentage>';
            initial-value: 50%;
            inherits: true;
        }
        @property --gradY {
            syntax: '<percentage>';
            initial-value: 0%;
            inherits: true;
        }
        :root {
            --d: 2500ms;
            --angle: 90deg;
            --gradX: 100%;
            --gradY: 50%;
            --c1: #c6a8ff;
            --c2: rgba(168, 239, 255, 0.1);
        }
        body {
            margin: 0;
            height: 100vh;
            justify-content: center;
            text-align: center;
            display: flex;
            flex-direction: column;
            background-image: url('/Dark Gradient 02.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            color: #dee2e6;
            font-family: "Inter", sans-serif;
  font-optical-sizing: auto;
  font-weight: 500;
  font-style: italic;
        }
        .box {
            width: 25%;
            height: 20%;
            margin: 10px auto;
            padding: 20px;
            background: linear-gradient(135deg, #221333, #2a2a2a);
            border-radius: 20px;
            box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 1px 1px;
            position: relative;
        }
        .box::before {
            content: '';
            position: absolute;
            inset: -4px;
            background: conic-gradient(from var(--angle), var(--c2), var(--c1) 0.1turn, var(--c1) 0.15turn, var(--c2) 0.25turn);
            border-radius: 24px;
            animation: borderRotate var(--d) linear infinite forwards;
            z-index: -1;
        }
        @keyframes borderRotate {
            100% {
                --angle: 420deg;
            }
        }
        .box h1 {
            margin-top: 20px;
        }
        .search {
            display: inline-block;
            position: relative;
            margin-top: 20px;
        }
        .search input[type="text"] {
            width: 300px;
            padding: 10px;
            border: none;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .search button[type="submit"] {
            background-color: #c6a8ff;
            border: none;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 0;
            right: 0;
            transition: .9s ease;
        }
        .search button[type="submit"]:hover {
            transform: scale(1.1);
            color: rgb(255, 255, 255);
            background-color: #2d0e66;
        }
        .error { color: red; }
        .success {
            color: #eff6e0;
            margin-top: 20px;
        }
        .success a{
            color: #b53c92;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>URL Shortener</h1>
        <form method="POST" action="{{ route('shorten') }}">
            @csrf
            <div class="search">
                <input type="text" name="original_url" placeholder="Enter URL to shorten" value="{{ old('original_url') }}">
                <button type="submit">Generate</button>
            </div>
        </form>
        @if(session('success'))
        <div class="success">
            Shortened URL: <a href="{{ session('success') }}" target="_blank">{{ session('success') }}</a>
        </div>
        @endif

    </div>
</body>
</html>