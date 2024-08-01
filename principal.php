<!DOCTYPE html>
<html lang="pt">

<head>
    <title>Consumo Energético</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="./Assets/Bootstrap/icons" type="image/x-icon">
    <link href="./Assets/Bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./Assets/CSS/styles.css" rel="stylesheet">
    <link href="./Assets/Bootstrap/icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!---Main-->
    <div class="col-lg-11 mx-auto p-3">
        <!---Header-->
        <nav class="navbar fixed-top navbar-expand-lg shadow rounded-3 p-2 bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <!---Imagens-->
                    <img id="logo" class="navbar-brand-img me-3" width="135" height="55"
                        src="./Assets/Pictures/ulssa_bar.png" alt="Logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand align-items-center d-flex" href="#" onclick="reloadPage()"><svg
                            xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-house-fill align-items-center justify-content-center" viewBox="0 0 16 16">
                            <path
                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                        </svg> Home</a>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg> Utilizador
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Alterar Password</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!---Body-->
        <main id="inicio">
            <div class="row mx-auto p-3 mt-5"></div>

            <div class="dropdown justify-content-center d-flex">
                <button class="btn btn-primary btn-lg dropdown-toggle mt-4" id="dropdownMenuButton" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Equipamentos
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#" onclick="loadData('ups', 'UPS')">UPS
                            
                        </a></li>
                    <li><a class="dropdown-item" href="#" onclick="loadData('gerador', 'Gerador')">Gerador</a></li>
                    <li><a class="dropdown-item" href="#"
                            onclick="loadData('transformador', 'Transformador')">Transformador</a></li>
                </ul>
            </div>

            <div class="modal" id="contactos" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Contactos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Localização: Largo Prof. Abel Salazar, 4099-001 Porto</p>
                            <p>Telefone: 222 077 500</p>
                            <p>Email: <a
                                    href="mailto:secretaria.geral@chporto.min-saude.pt">secretaria.geral@chporto.min-saude.pt</a>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <!-- Botões de footer do modal (se necessário) -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Div para carregar a tabela e o gráfico -->
            <div class="row justify-content-center mt-5">
                <div class="col-8" id="tableContainer">
                    <!-- Tabela será carregada aqui -->
                    <div class="card mt-4 text-bg-secondary shadow">
                        <div class="card-body justify-content-center d-flex">
                            Apresentação
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <canvas id="chartContainer"></canvas>
                </div>
            </div>
        </main>

        <!---Footer-->
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-body-secondary">2024</p>

                <div
                    class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <a class="navbar-brand mx-auto" href="#">
                        <img id="logo" class="navbar-brand-img me-3" width="270" height="30"
                            src="./Assets/Pictures/rep.png" alt="Rep Logo">
                    </a>
                </div>

                <ul class="nav col-md-4 justify-content-end">
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary"
                            onclick="reloadPage()">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary" data-bs-toggle="modal"
                            data-bs-target="#contactos">Contactos</a></li>
                    <li class="nav-item"><a href="https://www.chporto.pt/" class="nav-link px-2 text-body-secondary"
                            target="_blank">ULSSA</a></li>
                </ul>
            </footer>
        </div>
    </div>

    <!---JS-->
    <script src="./Assets/Bootstrap/js/bootstrap.bundle.js"></script>
    <script src="./Assets/JS/scripts.js"></script>

</body>

</html>