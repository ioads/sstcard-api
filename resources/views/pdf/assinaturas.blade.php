<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Relatório de assinaturas</title>
  </head>
  <body>
    <h2 class="text-center">Relatório de assinaturas</h2>
    <br>

    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">ID Api</th>
                <th scope="col">CPF</th>
                <th scope="col">Cliente</th>
                <th scope="col">Plano</th>
                <th scope="col">Adesão</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assinaturas as $assinatura)
            <tr>
                <th scope="row">{{ $assinatura->id }}</th>
                <td>{{ $assinatura->customer->document_number }}</td>
                <td>{{ $assinatura->customer->name }}</td>
                <td>{{ $assinatura->plan->name }}</td>
                <td>{{ $assinatura->plan->date_created }}</td>
                <td>{{ $assinatura->status }}</td>
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