<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body onload="hello();">
  <script>
    function hello()
    {
      document.getElementById("btnn").click();
    }
</script>
    <!-- Button trigger modal -->
<button type="button" style="display: none" id="btnn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Administartor registration</h5>
        </div>
        <form action="Route('accept',$session)" method="post" autocomplete="off">
          @csrf
        <div class="modal-body">
          @if ($errors->any())
                    <div class="alert alert-danger fade show" role="alert" align="center">
                        {{ $errors->first() }}
                    </div>
                @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="email" readonly value="{{ $invit->email }}" placeholder="Username">
            <div class="input-group-append">
                <div class="input-group-text">
                  <box-icon name='envelope' type='solid' ></box-icon>
                </div>
            </div>
        </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Username">
            <div class="input-group-append">
                <div class="input-group-text">
                  <box-icon type='solid' name='user'></box-icon>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                  <box-icon name='lock-alt' type='solid' ></box-icon>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
</body>
</html>