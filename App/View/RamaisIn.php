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
                            <a style="margin-top:25px" onclick="exportarPDF()" href="downloadPdf.php" class="btn btn-success">Exportar PDF</a>
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

