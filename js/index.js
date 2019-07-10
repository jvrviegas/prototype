jQuery(document).ready(function ($) {
            $("#enviaDados").click(function () {
                var dados = {
                    usuario: $("input[name=usuario]").val(),
                    senha: $("input[name=senha]").val(),
                    opc: 1
                };
                now = new Date();
                $.ajax({
                    url: 'conexao.php',
                    data: dados,
                    type: "POST",
                    dataType: 'json',
                    success: function (result) {
                        if (result == 2) {
                            location.replace("gerente.php");
                        } else if (result === 1) {
                            $("#login").addClass("hidden");
                            $("#h2_login").addClass("hidden");
                            $("#start").removeClass("hidden");
                            $("#start").addClass("fadeIn");
                        } else if (result === 0) {
                            Swal("Usuário e/ou senha incorretos!");
                        }
                    }
                });
                /*} else {
                    Swal({
                        title: 'Manda Pizza',
                        html: "<h3>Estabelecimento fechado, retorne mais tarde.</h3><br><h4>Horário de funcionamento: <br>" +
                            "<table style='margin-left: 18%;'><tbody><tr class=\"K7Ltle\"><td class=\"SKNSIb\">Segunda-feira</td><td>18:00–22:45</td><br></tr><tr><td class=\"SKNSIb\">Terça-feira</td><td>18:00–23:00</td></tr><tr><td class=\"SKNSIb\">Quarta-feira</td><td>18:00–23:30</td></tr><tr><td class=\"SKNSIb\">Quinta-feira</td><td>18:00–23:30</td></tr><tr><td class=\"SKNSIb\">Sexta-feira</td><td>18:00–23:45</td></tr><tr><td class=\"SKNSIb\">Sábado</td><td>18:00–23:59</td></tr><tr><td class=\"SKNSIb\">Domingo</td><td>20:45–23:00</td></tr></h4></tbody></table>",
                        type: 'warning',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                    });
                }*/
            });
            $("#minitutorial_qrcode").click(function (){
                Swal.fire({
                    imageUrl: 'images/minitutorial_qrcode.png',
                    imageHeight: 450,
                    imageAlt: 'Mini tutorial para ler QR Code'
                })
            });
    
});
