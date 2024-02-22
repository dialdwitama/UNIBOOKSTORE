<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Unibook Store ujikom">
    <meta name="author" content="Unibook Store">
    <title>
      {{ Request::is('/') ? 'Unibook Store' : '' }}
      {{ Request::is('ujikom/books*') ? 'Buku' : '' }}
      {{ Request::is('ujikom/publishers*') ? 'Penerbit' : '' }}
      {{ Request::is('ujikom/reports*') ? 'Pengadaan' : '' }}
    </title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="/css/ujikom.css" rel="stylesheet">
  </head>