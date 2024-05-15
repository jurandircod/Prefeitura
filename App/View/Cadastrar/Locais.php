<div class="container-fluid">

    <div class="row mt-3">
        <div class="col-md-12">

            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar Locais</h3>
                </div>
                <form class="card-body" action="App/Controler/Locais/Create.php" method="post">
                    <!-- Date dd/mm/yyyy -->
                    <div class="form-group">
                        <label>Nome</label>

                        <div class="input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" name="locaisNome" class="form-control">
                        </div>

                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- Date mm/dd/yyyy -->
                    <div class="row">
                        <div class="form-group col">
                            <label for="">Bairro</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" nome="locaisBairro" class="form-control">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group col">
                            <label>Rua</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" nome="locaisRua" class="form-control">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group col">
                            <label>Numero da Casa</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" nome="locaisNumero" class="form-control">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label>Secretaria:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                                </div>
                                <input type="text" nome="locaisIdSecretaria" class="form-control">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                    <!-- IP mask -->
                    <div class="form-group">
                        <label>Descrição:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                            </div>
                            <textarea class="form-control" name="locaisDescricao" id=""></textarea>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <!-- /.card-body -->

            <!-- /.card -->


            <!-- /.card -->

        </div>
        <!-- /.col (left) -->

        <!-- /.col (right) -->
    </div>
</div>