<div class="container-fluid">
    <h2 class="text-center display-4">Lista de Ramais Internos</h2>
    <form>
        <div class="row">
            <div class="col-md-12">
                <div class="row" style="justify-content: center">
                    <div class="form-group col-6">
                        <div class="input-group">
                            <input autocomplete="off" id="ajax" type="search" class="ajax form-control" placeholder="Pesquise pelo nome ou secretaria">
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
                    <!-- Cards serão adicionados dinamicamente aqui -->
                </div>
            </div>
        </div>
    </form>
</div>

