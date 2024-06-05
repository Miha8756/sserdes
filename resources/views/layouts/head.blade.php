<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', __("seo." . Request::route()->getName() . ".title"))</title>
    <meta name="description"
          content="@yield('description', __(" seo." . Request::route()->getName() . ".description"))">


          <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
          

    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    @vite([
        "resources/scss/layouts/common.scss",
        "resources/js/layouts/common.js",

        "resources/scss/". Request::route()->getName() .".scss",
        "resources/js/". Request::route()->getName() .".js"
    ])

</head>
