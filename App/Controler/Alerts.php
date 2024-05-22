<?php
namespace App\Controler;

class Alerts
{

    public static function alerts($status)
    {
        switch ($status) {
            case "1":
                echo "<script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            
                $('.toastrDefaultSuccess')
                toastr.success('Cadastro Realizado com sucesso');
            });
            limparUrl();
        </script>";
                break;
            case "2";
                echo "<script>
                $(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                
                    $('.toastrDefaultInfo')
                    toastr.info('Alteração Realizada com Sucesso');
                });
            </script>";
                break;
            case "3":
                echo "<script>
                    $(function() {
                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    
                        $('.toastrDefaultError')
                        toastr.error('Senha ou Email Incorretos Contato o administrador do sistema');
                    });
                </script>";
                break;
            case "4":
                echo "<script>
                    $(function() {
                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    
                        $('.toastrDefaultWarning')
                        toastr.warning('Exclusão realizada');
                    });
                </script>";
                break;
        }
    }
}
