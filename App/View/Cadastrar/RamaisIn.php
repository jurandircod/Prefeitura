<div clas="container-fluid">
    <div class="col-md-12 mt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cadastrar Secretaria</h3>
            </div>
            <div class="card-body">
                <!-- Date -->
                <form class="form-group" action="App/Controler/RamaisIn/Create.php" method="post">
                    
                        <label>Responsavel</label>
                        <div class="input-group date">
                            <input type="text" name="ramaisInResponsavel" class="form-control" />
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    
                    <div class="row">
                        <div class="col">
                            <label>Numero</label>
                            <div class="input-group date">
                                <input type="text" name="ramaisInNumero" class="form-control" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label>Setor</label>
                            <div class="input-group date">
                                <input type="text" name="ramaisInSetor" class="form-control" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <label>Locais</label>
                            <div class="input-group date">
                                <input type="text" name="ramaisInIdLocais" class="form-control" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-3 form-group">
                        <button type="submit" class="btn btn-primary"> Enviar</button>
                    </div>
                </form>


            </div>
            <!-- /.form group -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- iCheck -->

</div>
<!-- /.card -->
</div>