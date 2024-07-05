jQuery(document).ready(function () {

  //ativa menu mobile
  function ativamenu() {
    // Ativa o  MmenuLight em todas as resoluções de telas "all"
    var menu = new MmenuLight(document.querySelector('#nav'), 'all');
    var navigator = menu.navigation();
    var drawer = menu.offcanvas({ position: 'left' });
    //abre o menu  MmenuLight e ativa o botão Hamburger
    document.querySelector('#navMmenu').addEventListener('click', evnt => {
      evnt.preventDefault();
      drawer.open();
      jQuery(checkbtnHamburger);
      jQuery("#navMmenu").toggleClass("active");
      jQuery("#nav").css("display", "block");
    });
    // função para verifica se o menu MmenuLight esta aberto e se o menu hamburger esta ativo
    function checkbtnHamburger() {
      if (jQuery(".mm-ocd-opened").length != 0) {
        //console.log('menu aberto, mantenha o botão hamburger ativo');
        //enquanto o menu estiver abetto fica executando essa função
        setTimeout(checkbtnHamburger, 0);
      } else {
        //console.log('menu fechou, volta o botão hamburger para fechado');
        jQuery("#navMmenu").toggleClass("active");
      }
      // caso o botão hamburger não estiver ativo o menu MmenuLight deve ser fechado
      if (jQuery("#navMmenu.btn-hamburger.active").length != 1) { drawer.close(); }
    };
  }
  ativamenu();

  //Ativa o menu só no descktop
  var isVGNavExecuted = false;
  function checkScreenWidth() {
    if (jQuery(window).width() >= 991 && !isVGNavExecuted) {
      new VGNav({
        expand: 'xs',
        isHover: true,
        move: true,
      });
      isVGNavExecuted = true; // Marcar a função como executada
    }
  }
  checkScreenWidth();
  jQuery(window).resize(function () {
    checkScreenWidth();
  });

 




});

