$(document).ready(function () {
    //Pesquisa pagina principal
    $('#search').keyup(function (event) {
        var termo = $('#search').val();
        //se o termo de pesquisas for maior que 4 a pesquisa sera realizada
        if (termo.length >= 4 && termo !== "") {
            $.ajax({
                url: '/search',
                method: 'POST',
                data: $('#pesquisa').serialize(),
                success: function (data) {
                    $('.container-produto').html(data);
                    $('.container-produto').slideDown(700);
                }
            });
        } else {
            $('.container-produto').hide(500);
        }
    });
    $('#pesquisa').submit(function () {
        return false;
    });

    //login
    $('#login').click(function (event) {
        var login = $('.login');
        if (login.css("display") != "none") {
            login.hide("slow", function () { });
        } else {
            login.slideDown(300);
        }
    });
    // Tratamento de erro ao fazer login
    var erro = $('.erro');
    console.log(erro);
    if (erro.length >= 1) {
        $('.login').show();
    } else {
        $('.login').hide();
    }

    //menu lateral
    var menu = $(".painel-menu");
    var close = $('.close');
    var a = $(".painel-a");
    var icon = $('.menu-icon');
    $('.close').click(function () {
        //animate({propriedade},duration,easign,complete)
        if (menu.css("width") === "64px") {
            menu.animate({
                width: "301px"
            });
            close.animate({
                right: "-150px"
            });
            close.slideDown().html("x");
            a.animate({
                left: "0"
            });
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
    // carregar paginas atraves do menu
    // Página de cadastro de perfumes
    $("#cadProduto").click(function () {
        $('.pag').load("cadastro-produto.php");
        $('.container-caixa').hide();
        return false;

    });
    $('#lista-produtos').click(function () {
        $('.pag').load("App/lista-produtos.php");
        $('.container-caixa').hide();
        return false;
    });









});