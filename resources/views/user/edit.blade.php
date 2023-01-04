
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Curso Laravel</title>
  </head>
  <body>
    <main class="container">

        <h1>EDIT</h1>

        <form method="post" action="{{route('user.update', $user->id)}}">
            {{-- CRIA UM TOKEN DE AUTENTICAÇÃO PARA O PUT --}}
            @csrf
            {{-- DIRETIVA DO BLADE PARA O MÉTODO PUT--}}
            @method('put')

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome</label>
                <input type="text" value="{{$user->name}}" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{$user->email}}" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary">ATUALIZAR</button>
        </form>


    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
