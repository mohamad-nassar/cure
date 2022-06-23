<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page" style="overflow: hidden">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"
        integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <video autoplay muted loop id="myVideo" style="position: fixed;width:100%;object-fit: fill;height:100%">
        <source src="{{ asset('videos/bk.mp4') }}" type="video/mp4">
    </video>
    <div class="login-box">

        <div class="card">
            <div class="card-body login-card-body">

                @if ($errors->any())
                    <div class="alert alert-danger fade show" role="alert" align="center">
                        {{ $errors->first() }}
                        {{-- @if($errors->first()=='Sorry but you are blocked')
                        <p>if you think this was a mistake please contact <a id="msg" data-toggle="modal" data-target="#exampleModal"><u>Superadmin</u></a></p>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content bg-danger">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Contact Superadmin</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <form action="/send/admin/superadmin" method="post" autocomplete="off">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="Your email address">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fas fa-at"></i>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="subject"  placeholder="Message subject">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fas fa-align-center"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <textarea name="message" cols="30" rows="10" class="form-control" style="resize: none"  placeholder="Enter your message here..."></textarea>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fas fa-comment-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fas fa-paper-plane"></i></button>
                                </div>
                            </form>
                              </div>
                            </div>
                          </div>
                          @endif --}}
                    </div>
                @endif
                <form action="{{ route('login.custom') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Email address">
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
                    <div class="row">
                        <div class="col justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
</body>

</html>
