<?php

use App\Model\Locais\LocaisDao;
use App\Model\RamaisIn\RamaisInDao;

$locaisObj = new LocaisDao();
$locaisObj->setSqlRead("SELECT id, nome FROM tblocais ORDER BY nome ASC");

$ramaisIn = new RamaisInDao;
$ramaisIn->setSqlRead("SELECT tblocais.nome, tbramais_in.id, tbramais_in.fklocais, tbramais_in.responsavel, tbramais_in.numero, tbramais_in.setor FROM tbramais_in JOIN tblocais ON tblocais.id = tbramais_in.fklocais");

$locaisLista = new LocaisDao;
?>

<div clas="container-fluid">
    <div class="col-md-12 mt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cadastrar Ramais Internos</h3>
            </div>
            <div class="card-body">
                <!-- Date -->
                <form class="form-group" action="App/Controler/RamaisIn/Create.php" method="post">

                    <label>Responsavel</label>
                    <div class="input-group date">
                        <input type="text" name="ramaisInResponsavel" class="form-control" placeholder="Responsável pelo setor" />
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Setor</label>
                            <div class="input-group date">
                                <input type="text" name="ramaisInSetor" class="form-control" placeholder="Digite o nome do Setor" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label>Numero</label>
                            <div class="input-group date">
                                <input type="text" name="ramaisInNumero" class="form-control" placeholder="Digite o Numero para contato" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <label>Locais</label>
                            <div class="input-group date">
                                <select class="form-control" name="ramaisInIdLocais" id="">
                                    <?php foreach ($locaisObj->read() as $locais) : ?>
                                        <option value="<?php echo $locais['id'] ?>"><?php echo $locais['nome'] ?></option>
                                    <?php endforeach; ?>
                                </select>
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
                                    <th>Responsavel</th>
                                    <th>Numero</th>
                                    <th>setor</th>
                                    <th>Locais</th>
                                    <th>Funções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($ramaisIn->read() as $rowRamaisIn) : ?>
                                    <tr>
                                        <td><?php echo $rowRamaisIn['responsavel']; ?></td>
                                        <td><?php echo $rowRamaisIn['numero']; ?></td>
                                        <td><?php echo $rowRamaisIn['setor']; ?></td>
                                        <td><?php echo $rowRamaisIn['nome']; ?></td>


                                        <td>
                                            <div class="col">
                                                <a onclick="pegarId('<?php echo $rowRamaisIn['id']; ?>', '<?php echo $rowRamaisIn['responsavel']; ?>',  '<?php echo $rowRamaisIn['numero'] ?>', '<?php echo $rowRamaisIn['setor']; ?>', '<?php echo $rowRamaisIn['fklocais']; ?>')" class="btn btn-sm btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    <i class="fas fa-comments"></i>Alterar Local
                                                </a>

                                                <a onclick="confirmarExclusao('<?php echo $rowRamaisIn['id']; ?>')" class="btn btn-sm btn-danger mt-1">
                                                    <i class="fas fa-comments"></i>Excluir Local
                                                </a>

                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Responsavel</th>
                                    <th>Numero</th>
                                    <th>setor</th>
                                    <th>Locais</th>
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





<script>
    var comfirmacao;

    function confirmarExclusao(id) {
        confirmacao = window.confirm("Tem certeza que deseja excluir o loca");
        console.log(id)
        if (confirmacao == true) {
            location.href = "App/Controler/RamaisIn/Create.php?idDelete=" + id;
        }
    }



    function pegarId(id, Responsavel, numero, setor, locais) {
        console.log(id, Responsavel, numero, setor, locais);
        document.getElementById('id').value = id; // Usar 'value' em vez de 'innerText'
        document.getElementById("Responsavel").value = Responsavel;
        document.getElementById("numero").value = numero;
        document.getElementById("setor").value = setor;
        document.getElementById("locais").value = locais;

    }
</script>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Alterar nome do local</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="App/Controler/RamaisIn/Create.php" method="get">
                    <div>
                        <input type="text" id="id" name="idUpdate" hidden>
                    </div>

                    <div class="name mt-3">
                        <label for="inputEmail4" class="form-label">Responsavel</label>
                        <input type="text" id="Responsavel" name="ramaisInResponsavel" class="form-control" placeholder="Digite seu nome completo" id="">
                    </div>

                    <div class="row mt-3">

                        <div class="col">
                            <label for="">Setor</label>
                            <input class="form-control" id="setor" type="text" name="ramaisInSetor" placeholder="Endereço*">
                        </div>

                        <div class="col">
                            <label for="">Numero</label>
                            <input type="text" class="form-control" id="numero" name="ramaisInNumero" placeholder="Digite o telefone do local">
                        </div>
                    </div>

                    <div class="col">
                        <label for="">Secretaria</label>
                        <select class="form-control" name="ramaisInIdLocais" id="locais">
                            <?php foreach ($locaisObj->read() as $locais) : ?>
                                <option value="<?php echo $locais['id'] ?>"><?php echo $locais['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary ">Enviar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>




