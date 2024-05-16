<?php
use App\Model\RamaisEx\RamaisExDao;
$ramaisEx = new RamaisExDao;
$ramaisEx->setSqlRead("SELECT * FROM tbramais_ex");
?>

<div clas="container-fluid">
    <div class="col-md-12 mt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cadastrar Secretaria</h3>
            </div>
            <div class="card-body">
                <!-- Date -->
                <form class="form-group" action="App/Controler/RamaisEx/Create.php" method="post">


                    <label>Nome</label>
                    <div class="input-group date">
                        <input type="text" name="ramaisExNome" class="form-control" />
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Numero</label>
                            <div class="input-group date">
                                <input type="text" name="ramaisExNumero" class="form-control" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label>Setor</label>
                            <input name="ramaisExSetor" class="input-group date form-control">
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
    <div clas="container-fluid">
        <!-- /.card -->
        <div>

            <div class="">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Listar Ramais Externos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Numero</th>
                                        <th>Setor</th>
                                        <th>Funções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ramaisEx->read() as $rowsRamaisEx) : ?>
                                        <tr>
                                            <td><?php echo $rowsRamaisEx['nome']; ?></td>
                                            <td><?php echo $rowsRamaisEx['numero']; ?></td>
                                            <td><?php echo $rowsRamaisEx['setor']; ?></td>

                                            <td>
                                                <div class="col">
                                                    <a class="btn btn-sm btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                        <i class="fas fa-comments"></i>Alterar Local
                                                    </a>

                                                    <a class="btn btn-sm btn-danger mt-1">
                                                        <i class="fas fa-comments"></i>Excluir Local
                                                    </a>

                                                </div>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Numero</th>
                                        <th>Setor</th>
                                        <th>Funções</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- iCheck -->

    </div>
    <!-- /.card -->



    <!-- /.row -->
    <!-- iCheck -->

</div>
<!-- /.card -->