$(document).ready(function() {
    $('#search').keyup(function(event) {


        if ($('#search').val().length >= 4) {

            $.ajax({
                url: 'pesquisa.php',
                method: 'POST',
                //datatype:"html",
                data: $('#search').serialize(),
                success: function(data) {
                    $('.container-produto').html(data);
                    $('.main').slideDown();
                }
            });
        }

    });


    $('pesquisa').submit(function() {
        return false
    });

    //login


    //menu lateral
    var menu = $(".painel-menu");
    var close = $('.close');
    var a = $(".painel-a");
    var icon = $('.menu-icon');


    $('.close').click(function() {
        //animate({propriedade},duration,easign,complete)
        if (menu.css("width") == "64px") {
            menu.animate({
                width: "301px"
            });
            close.animate({
                right: "-150px"
            });
            close.slideDown().html("x");
            a.animate({
                left: "0"
            })
            icon.css("display", "none");
        } else {
            menu.animate({
                width: "64px"
            });
            close.animate({
                right: "0"
            });
            close.slideDown().html("&equiv;");
            a.animate({
                left: "-200px"
            });
            icon.css({
                "display": "flex",
                "right": "-175px"
            });
        }
    });
    // carregar paginas
    $("#cadProduto").click(function() {
        $('.pag').load("cadastro-produto.php");
        $('.container-caixa').hide();
        return false;

    });




});