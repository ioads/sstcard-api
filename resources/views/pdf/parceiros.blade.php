<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Relatório de parceiros</title>
  </head>
  <body>
    <h2 class="text-center">Relatório de parceiros</h2>
    <br>

    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Nome Fantasia</th>
                <th scope="col">Razão Social</th>
                <th scope="col">Celular</th>
                <th scope="col">E-mail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parceiros as $parceiro)
            <tr>
                <th scope="row">{{ $parceiro->id }}</th>
                <td>{{ $parceiro->cnpj }}</td>
                <td>{{ $parceiro->nome_fantasia }}</td>
                <td>{{ $parceiro->razao_social }}</td>
                <td>{{ $parceiro->celular }}</td>
                <td>{{ $parceiro->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>