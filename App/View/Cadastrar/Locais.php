<?php

use App\Model\Secretaria\SecretariaDao;

$secretaria = new SecretariaDao;
$secretariaLista = new SecretariaDao;
$secretaria->setSqlRead("SELECT * FROM tbsecretarias");
$rowSecretaria = $secretaria->read();
use App\Model\Locais\LocaisDao;
$locais = new LocaisDao;
$locais->setSqlRead("SELECT * FROM tblocais");

?>

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
                            <input type="text" name="locaisNome" class="form-control" placeholder="digite o nome do local">
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
                                <input type="text" name="locaisBairro" class="form-control" placeholder="digite o bairro">
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
                                <input type="text" name="locaisRua" class="form-control" placeholder="digite a Rua">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group col">
                            <label>Numero</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="locaisNumero" class="form-control" placeholder="Digite o Numero da casa">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label>Secretaria:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                                </div>
                                <select class="form-control" name="locaisIdSecretaria" id="">
                                    <?php foreach ($rowSecretaria as $secretaria) : ?>
                                        <option value="<?php echo $secretaria['id'] ?>"><?php echo $secretaria['nome'] ?></option>
                                    <?php endforeach; ?>
                                </select>

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
                            <textarea class="form-control" name="locaisDescricao" id="" placeholder="Insira uma descrição"></textarea>
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
                                    <th>Rua</th>
                                    <th>Bairro</th>
                                    <th>Numero</th>
                                    <th>Secretaria</th>
                                    <th>Funções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($locais->read() as $rowLocais) : ?>
                                    <?php 
                                    $secretariaLista->setSqlRead("SELECT * FROM tbsecretarias WHERE id = $rowLocais[fksecretarias]");
                                    $nomeSecretaria = $secretariaLista->read();
                                    ?>
                                    <tr>
                                        <td><?php echo $rowLocais['nome']; ?></td>
                                        <td><?php echo $rowLocais['rua']; ?></td>
                                        <td><?php echo $rowLocais['bairro']; ?></td>
                                        <td><?php echo $rowLocais['numero']; ?></td>
                                        <td><?php echo $nomeSecretaria[0]['nome']; ?></td>
                                        <td>
                                            <div class="col">
                                                <a onclick="pegarId('<?php echo $rowLocais['id']; ?>', '<?php echo $rowLocais['nome']; ?>',  '<?php echo $rowLocais['rua'] ?>', '<?php echo $rowLocais['bairro']; ?>', '<?php echo $rowLocais['numero']; ?>', '<?php echo $rowLocais['fksecretarias']; ?>')" class="btn btn-sm btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    <i class="fas fa-comments"></i>Alterar Local
                                                </a>

                                                <a onclick="confirmarExclusao('<?php echo $rowLocais['id']; ?>','<?php echo $rowLocais['fksecretarias']; ?>')" class="btn btn-sm btn-danger mt-1">
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
                                    <th>Rua</th>
                                    <th>Bairro</th>
                                    <th>Numero</th>
                                    <th>Secretaria</th>
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

    function confirmarExclusao(id, idSecretaria) {
        confirmacao = window.confirm("Tem certeza que deseja excluir o loca");
        console.log(id)
        if (confirmacao == true) {
            location.href = "App/Controler/Locais/Create.php?idDelete=" + id + "&locaisIdSecretaria =" + idSecretaria;
        }
    }



    function pegarId(id, nome, rua, bairro, numero, secretaria) {
        console.log(id, nome, rua, bairro, numero, secretaria);
        document.getElementById('id').value = id; // Usar 'value' em vez de 'innerText'
        document.getElementById("nome").value = nome;
        document.getElementById("rua").value = rua;
        document.getElementById("bairro").value = bairro;
        document.getElementById("numero").value = numero;
        document.getElementById("secretaria").value = secretaria;

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
                <form action="App/Controler/Locais/Create.php" method="get">
                    <div>
                        <input type="text" id="id" name="idUpdate" hidden>
                    </div>

                    <div class="name mt-3">
                        <label for="inputEmail4" class="form-label">Nome</label>
                        <input type="text" id="nome" name="locaisNome" class="form-control" placeholder="Digite seu nome completo" id="">
                    </div>

                    <div class="row mt-3">

                        <div class="col">
                            <label for="">Rua</label>
                            <input class="form-control" id="rua" type="text" name="locaisRua" placeholder="Endereço*">
                        </div>

                        <div class="col">
                            <label for="">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="locaisBairro" placeholder="Digite o telefone do local">
                        </div>

                        <div class="col">
                            <label for="">Numero</label>
                            <input type="text" class="form-control" id="numero" name="locaisNumero" placeholder="Digite o telefone do local">
                        </div>
                    </div>

                    <div class="col">
                        <label for="">Secretaria</label>
                        <select class="form-control" name="locaisIdSecretaria" id="secretaria">
                            <?php foreach ($rowSecretaria as $secretaria) : ?>
                                <option value="<?php echo $secretaria['id'] ?>"><?php echo $secretaria['nome'] ?></option>
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