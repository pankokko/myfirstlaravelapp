<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css"> 
<title>@yield("title")</title>
<script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<main class="wrapper">
  @yield('content')
</main>
</body>
</html>