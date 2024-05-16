<?php
use App\Model\Secretaria\SecretariaDao;
$secretaria = new SecretariaDao;
$secretaria->setSqlRead("SELECT * FROM tbsecretarias");
?>

<div clas="container-fluid">
    <div class="col-md-12 mt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cadastrar Secretaria</h3>
            </div>
            <div class="card-body">
                <!-- Date -->
                <form class="form-group" action="App/Controler/Secretaria/Create.php" method="post">
                    <div class="">
                        <label>Nome da Secretaria</label>
                        <div class="input-group date">
                            <input type="text" name="secretariaNome" class="form-control" />
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
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
    <div>
        
        <div class="">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listar equipamentos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nome do local</th>
                                    <th>Funções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($secretaria->read() as $rowsSecretaria) : ?>
                                    <tr>
                                        <td><?php echo $rowsSecretaria['nome']; ?></td>

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
                                    <th>Nome do local</th>
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