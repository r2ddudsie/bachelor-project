<!DOCTYPE html>

<?php
//starting the session
session_start();
?>

<html lang="pt">

<head>
    <title>Dashboard CGM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialscale=1">

    <link rel="icon" href="./Assets/Bootstrap/icons" type="image/x-icon">
    <link href="./Assets/Bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./Assets/CSS/styles.css" rel="stylesheet">
    <link href="./Assets/Bootstrap/icons/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>
    <main class="form-signin w-100 m-auto" width="1000" height="500">
        <div class="p-3 mb-2 bg-primary-subtle text-primary-emphasis">
            <div class="container-sm">
                <div class="row justify-content-center align-items-center" style="height:100vh">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <img id="login" class="rounded mx-auto d-block" width="200" height="200"
                                        src="./Assets/Pictures/ulssa_login.png">
                                    <h1 class="h3 mb-3 fw-normal">Acesso à Dashboard</h1>

                                    <div class="form-group">
                                        <input type="username" class="form-control" id="floatingInput"
                                            placeholder="Username" name="username" required>

                                    </div>
                                    <p></p>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="floatingPassword"
                                            placeholder="Password" name="password" required>

                                    </div>

                                    <div class="form-check text-start my-3">
                                        <input class="form-check-input" type="checkbox" value="remember-me"
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Lembrar-me
                                        </label>
                                    </div>
                                    <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                                
                                </form>




                                <!-- Button trigger modal -->
                                <div class="container-sm">
                                <p></p>
                                <button type="button" class="btn btn-primary rounded mx-auto d-block" data-bs-toggle="modal" data-bs-target="#myModal">
                                        Novo Registo
                                    </button>
                                </div>

                                <!-- Modal -->

                                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fs-5" id="exampleModalLabel">Novo registo</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">


                                                <form class="was-validated">
                                                    <!---Username--->
                                                    <div data-mdb-input-init class="form-outline mb-4">
                                                        <input type="text" id="username2" class="form-control" placeholder="Username"
                                                            name="username2" required>
                                                        <label class="form-label" for="username2"></label>
                                                    </div>

                                                    <!--Password--->

                                                    <div data-mdb-input-init class="form-outline mb-4">
                                                        <input type="password" id="password2" class="form-control" placeholder="Password"
                                                            name="password2" required>
                                                        <label class="form-label" for="password2"></label>
                                                    </div>

                                                    <!---Repetir password, VALIDAÇÃO?--->

                                                    <div data-mdb-input-init class="form-outline mb-4">
                                                        <input type="password" id="password2" class="form-control" placeholder="Repetir Password"
                                                            name="password2" required>
                                                        <label class="form-label" for="password2"></label>
                                                    </div>

                                                    <!---Botão submeter--->
                                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                        class="btn btn-primary btn-block">Registar</button>


                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Fechar</button>
                                            <button type="button" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </main>


    <script src="./Assets/Bootstrap/js/bootstrap.bundle.js"></script>




</body>