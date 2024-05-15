

<div class="container-fluid">
    <h2 class="text-center display-4">Lista de Ramais</h2>
    <form>
        <div class="row">
            <div class="col-md-12">
                <div class="row" style="justify-content: center">
                    <div class="form-group col-6">
                        <div class="input-group">
                            <input autocomplete="off" id="nome" type="search" class="ajax form-control" placeholder="Pesquise pelo nome ou secretaria">
                        </div>
                        <div class="row" style="justify-content: center">
                            <a style="margin-top:25px" onclick="exportarPDF()" class="btn btn-success">Exportar PDF</a>
                            <div style="margin-left:35px"><a style="margin-top:25px" href="local/ramal/lista/lista_fisica/download_pdf.php?id=1" class="btn btn-primary">Baixar Lista Física</a></div>
                            <div style="margin-left:30px; margin-top: 10px">
                                <h6 style="margin-top:25px;opacity: 60%">Última atualização:28/07/2023 14:42</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div id="Content" class="row">
                    <?php foreach ($listaRamais as $lista) : ?>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column item">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="lead"><b><?php echo $lista['nome'] ?></b></h2>
                                            <p class="text-muted text-sm"><b>Setor:</b>Diretoria de Tecnologia e Informação</p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="great"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefone/Ramal: <b>168</b></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </form>
</div>