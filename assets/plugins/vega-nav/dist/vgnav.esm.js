// @vegas-VGNav v3.2.6
class e{constructor(e,t={},s){this.sidebar=null,this.button=null,this.target=null,this.settings={button:null,content_over:!0,hash:!1,ajax:{target:"",route:""}},this.classes={body:"vg-sidebar-open",open:"open",btn:"vg-sidebar-active"},this.init(e,t,s)}init(e,t,s){let i=this;"string"==typeof e?i.target=e:(i.target=e.dataset.target||e.href,i.button=e),-1!==i.target.indexOf("#")&&(i.target=i.target.split("#")[1]),this.target&&(i.sidebar=document.getElementById(i.target),i.settings=Object.assign(i.settings,t),!i.button&&i.settings.button&&(i.button=i.settings.button),document.body.classList.contains(i.classes.body)&&!i.sidebar.classList.contains("open")&&this.close(s,!0),s&&"function"==typeof s&&s(i))}open(e=null){if(!this.sidebar)return!1;let s=this;if(e&&"beforeOpen"in e&&"function"==typeof e.beforeOpen&&e.beforeOpen(s),s.sidebar.classList.add("open"),s.button&&"string"!=typeof s.button&&s.button.classList.add(s.classes.btn),document.body.classList.add(s.classes.body),s.settings.hash){let t=s.sidebar.id;t&&window.history.pushState(null,"sidebar open","#sidebar-open-"+t),window.addEventListener("popstate",(function(t){s.close(e)}),!1)}if(s.settings.content_over&&(document.body.style.paddingRight=window.innerWidth-document.documentElement.clientWidth,document.body.style.overflow="hidden"),s.settings.ajax.route&&s.settings.ajax.target){let e=document.getElementById(s.settings.ajax.target);if(e){let e=new XMLHttpRequest;e.open("get",s.settings.ajax.route,!0),e.onload=function(){let s=e.responseText;t(s)},e.send()}const t=t=>{e.innerHTML=t}}document.onclick=function(t){if(t.target===s.sidebar)return s.close(e),!1},document.onkeyup=function(t){return"Escape"===t.key&&s.close(e),!1},t("click",'[data-dismiss="vg-sidebar"]',(function(t){s.close(e)})),e&&"afterOpen"in e&&"function"==typeof e.afterOpen&&e.afterOpen(s)}close(e=null,t=!1){if(!this.sidebar)return!1;let s=this;if(e&&"beforeClose"in e&&"function"==typeof e.beforeClose&&e.beforeClose(s),t){let e=document.querySelectorAll(".vg-sidebar.open");if(e&&e.length){document.body.classList.remove(s.classes.body);for(let t of e)t.classList.remove("open");let t=document.querySelectorAll("."+s.classes.btn);for(let e of t)e.classList.remove(s.classes.btn);location.hash&&history.pushState("",document.title,window.location.pathname+window.location.search)}}else s.sidebar.classList.remove("open"),s.button&&"string"!=typeof s.button&&s.button.classList.remove(s.classes.btn),document.body.classList.remove(s.classes.body),location.hash&&history.pushState("",document.title,window.location.pathname+window.location.search);s.settings.content_over&&(document.body.style.paddingRight="",document.body.style.overflow=""),e&&"afterClose"in e&&"function"==typeof e.afterClose&&e.afterClose(s)}}if(window.location.hash){let t=window.location.hash.replace("#sidebar-open-","");if(document.getElementById(t)){new e(t).open()}}function t(e,t,s){document.addEventListener(e,(function(e){let i=document.body.querySelectorAll(t),n=e.target,a=-1;for(;n&&-1===(a=Array.prototype.indexOf.call(i,n));)n=n.parentElement;a>-1&&function(){"function"==typeof s&&s(n),e.preventDefault()}.call(n,e)}))}t("click",'[data-toggle="vg-sidebar"]',(function(t){let s=t,i={content_over:s.dataset.over||!0,hash:s.dataset.hash||!1,ajax:{target:s.dataset.ajaxTarget||"",route:s.dataset.ajaxRoute||""}},n=new e(s,i);document.body.classList.contains("vg-sidebar-open")?n.close():n.open()}));class s{constructor(e,t={}){if(!e)return console.error("Comrade! The first parameter should not be empty!"),!1;let s={target:[]},i={};if("string"==typeof e)s.container=!!(n=e)&&document.querySelector(n);else{if("object"!=typeof e)return console.error("CAP! Some kind of game flew to us"),!1;s.container=e,i=function(e,t=!1){if(!e)return!1;let s={},i=[].filter.call(e.attributes,(function(e){return/^data-/.test(e.name)}));i.length&&i.forEach((function(e){let i=e.name;t&&(i=i.slice(5)),s[i]=e.value}));return s}(e,!0)}var n;this.settings=Object.assign({},i,s,t),this.classes={container:"vg-flip-list",open:"open",closed:"closed",back:"vg-flip-list--back",toggle:"vg-flip-list--toggle",parent:"vg-flip-list--parent",dropdown:"vg-flip-list--dropdown"},this.isInit=!1,this.isInit||this.init()}init(){const e=this;e.settings.container.classList.add(e.classes.container);let t=[];if(e.settings.target.length)t=e.settings.target;else{let s=e.settings.container.querySelectorAll('[data-vg-toggle="flip-list"]');if(!s.length)return!1;t=Array.prototype.slice.call(s)}t.forEach((function(t){t.classList.add(e.classes.toggle);let s=t.nextElementSibling;if("UL"===s.tagName){let t=document.createElement("li"),i=document.createElement("a");i.setAttribute("href","#"),i.classList.add(e.classes.back),i.innerText="Back",t.prepend(i),s.prepend(t)}else if(s.classList.contains("dropdown-mega-container")){let t=document.createElement("div"),i=document.createElement("a");i.setAttribute("href","#"),i.classList.add(e.classes.back),i.innerText="Назад",t.prepend(i),s.prepend(t)}})),e.isInit=!0,e.toggle()}toggle(){if(!this.isInit)return!1;const e=this;return e.listener("click","."+e.classes.toggle,(function(t){let s=t.parentElement;s.parentElement.classList.add(e.classes.closed);let i=e.settings.container.querySelectorAll("."+e.classes.open);return i.length&&i.forEach((t=>t.classList.remove(e.classes.open))),s.classList.add(e.classes.open),!1})),e.listener("click","."+e.classes.back,(function(t){let s=t.closest("."+e.classes.open),i=t.closest("."+e.classes.closed);s.classList.remove(e.classes.open),i.classList.remove(e.classes.closed);let n=i.closest(".dropdown");return n&&n.classList.add(e.classes.open),!1})),!1}listener(e,t,s){document.addEventListener(e,(function(e){let i=document.body.querySelectorAll(t),n=e.target,a=-1;for(;n&&-1===(a=Array.prototype.indexOf.call(i,n));)n=n.parentElement;a>-1&&function(){"function"==typeof s&&s(n,e),e.preventDefault()}.call(n,e)}))}}class i{constructor(e,t){this.settings=Object.assign({expand:"lg",placement:"horizontal",hover:!1,toggle:'<span class="default"></span>',hamburger:null,mobileTitle:"",move:!1,flip:!1,sidebar:{placement:"right",clone:null,hash:!1}},e),this.callback=t,this.breakpoints={xs:0,sm:576,md:768,lg:992,xl:1200,xxl:1400},this.container=".vg-nav",this.sidebar="vg-nav-sidebar",this.classes={container:"vg-nav-wrapper",sidebar:"vg-sidebar",sidebarContent:"vg-sidebar-content",sidebarHeader:"vg-sidebar-header",sidebarBody:"vg-sidebar-body",hamburger:"vg-nav-hamburger",cloned:"vg-nav-cloned",hover:"vg-nav-hover",flip:"vg-nav-flip",XXL:"vg-nav-xxl",XL:"vg-nav-xl",LG:"vg-nav-lg",MD:"vg-nav-md",SM:"vg-nav-sm",XS:"vg-nav-xs"},this.current_responsive_size="",this.isResponsiveSize=!1,this.isInit=!1,this.isInit||this.init(this.callback)}init(){let e=this,t=document.querySelector(e.container),s=document.querySelector("."+e.classes.container);if(!t||!s)return!1;t.classList.add("vg-nav-"+e.settings.expand),e.settings.hover&&t.classList.add(e.classes.hover);let i=t.querySelectorAll(".dropdown-mega > a, .dropdown > a"),n='<span class="toggle">'+e.settings.toggle+"</span>";if(i.forEach((function(e){e.insertAdjacentHTML("beforeend",n)})),e.isResponsiveSize=t.classList.contains(e.classes.XXL)||t.classList.contains(e.classes.XL)||t.classList.contains(e.classes.LG)||t.classList.contains(e.classes.MD)||t.classList.contains(e.classes.SM)||t.classList.contains(e.classes.XS),e.isResponsiveSize){let s="",i='<span class="'+e.classes.hamburger+'--lines"><span></span><span></span><span></span></span>';e.settings.mobileTitle&&(s='<span class="'+e.classes.hamburger+'--title">'+e.settings.mobileTitle+"</span>"),null!==e.settings.hamburger&&(i=e.settings.hamburger),t.insertAdjacentHTML("afterbegin",'<a href="#" class="'+e.classes.hamburger+'">'+s+i+"</a>")}if(e.settings.move&&e.isResponsiveSize){let e=t.clientWidth,s=t.querySelectorAll(".vg-nav-wrapper > li"),i='<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16"><path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/></svg>';if(s.length){let n=0,a=[];for(let t of s){n+=t.clientWidth,n>=e&&(a.push(t),t.remove())}if(n>=e){let e=t.querySelectorAll(".vg-nav-wrapper > li");a.unshift(e[e.length-1]),e[e.length-1].remove();let s=t.querySelector(".vg-nav-wrapper");if(s){let e=document.createElement("ul");e.classList.add("right");for(let t of a)e.appendChild(t);s.insertAdjacentHTML("beforeend",'<li class="dropdown dots"><a href="#">'+i+"</a></li>"),s.querySelector(".dots").appendChild(e)}}}}e.isInit=!0,e.initSidebar(),e.toggle(e.callback)}initSidebar(){if(!this.isInit)return!1;let t=this,s=document.querySelector(t.container),i=document.getElementById(t.sidebar),n=t.settings.sidebar||!1,a=n.placement||"right",o=n.hash?'data-hash="true"':"";if(t.isResponsiveSize)if(i){if("clone"in n&&n.clone){let e=document.querySelector("#"+t.sidebar).querySelectorAll(n.clone);e&&t.cloneNavigation(e,s.querySelector("."+t.classes.container))}}else{let e="";t.settings.mobileTitle&&(e='<span class="'+t.classes.sidebar+'-title">'+t.settings.mobileTitle+"</span>"),document.body.insertAdjacentHTML("beforeend",'<div class="'+t.classes.sidebar+" "+a+'" id="'+t.sidebar+'" '+o+'><div class="vg-sidebar-content"><div class="vg-sidebar-header">'+e+'<div class="'+t.classes.sidebar+'-close" data-dismiss="'+t.classes.sidebar+'">&times;</div></div><div class="vg-sidebar-body"></div></div></div>');let i=document.getElementById(t.sidebar).getElementsByClassName(t.classes.sidebar+"-body");t.cloneNavigation(i,s.querySelector("."+t.classes.container))}let l=s.querySelector("."+this.classes.hamburger),r={button:l,hash:this.settings.sidebar.hash};const c=new e(t.sidebar,r);l.onclick=function(e){return this.classList.contains("vg-sidebar-active")?c.close():c.open(),!1},t.settings.flip&&t.initFlipList()}initFlipList(){if(!this.isInit)return!1;let e=this,t=document.getElementById(e.sidebar);if(t){let i=t.querySelector("."+e.classes.container);if(i){let n=i.querySelectorAll(".dropdown > a"),a=i.querySelectorAll(".dropdown-mega > a"),o=r(n),l=r(a);function r(e){return Array.prototype.slice.call(e)}i.classList.remove(e.classes.container),new s(i,{target:o.concat(l)})}}}toggle(e){if(!this.isInit)return!1;let t=this,s=document.querySelectorAll("."+t.classes.container),i=document.querySelectorAll("."+t.classes.container+" li > a");function n(e,t,s){e&&"afterClick"in e&&"function"==typeof e.afterClick&&e.afterClick(t,s)}e&&"afterInit"in e&&"function"==typeof e.afterInit&&e.afterInit(t),t.clickable()&&i.forEach((function(i){i.onclick=function(i){let a=this,o=a.closest("li");if(function(e,t,s){e&&"beforeClick"in e&&"function"==typeof e.beforeClick&&e.beforeClick(t,s)}(e,t,i),o.classList.contains("dropdown")){if(t.dispose(s,"dropdown-mega"),o.closest("ul").classList.contains(t.classes.container))return o.classList.contains("show")?o.classList.remove("show"):(t.dispose(s),o.classList.add("show")),n(e,t,i),!1;if(o.classList.contains("show"))return a.closest("li").classList.remove("show"),t.dispose(o),n(e,t,i),!1;{let s=o.children;for(let e=1;e<=s.length;e++)s[e-1].tagName;if(s.length>0)return a.closest("li").classList.add("show"),n(e,t,i),!1}}if(o.classList.contains("dropdown-mega"))return o.classList.contains("show")?o.classList.remove("show"):(t.dispose(s),o.classList.add("show")),n(e,t,i),!1;n(e,t,i)}})),window.addEventListener("mouseup",(e=>{e.target.closest("."+t.classes.container)||(t.dispose(s),t.dispose(s,"dropdown-mega"))}))}dispose(e,t="dropdown"){let s;for(let n=1;n<=e.length;n++)s=e[n-1].getElementsByClassName(t),i(s);function i(e){if(e)for(let t=1;t<=e.length;t++)e[t-1].classList.contains("show")&&e[t-1].classList.remove("show")}}cloneNavigation(e,t){let s=t.cloneNode(!0);s.classList.add(this.classes.cloned),e[0].appendChild(s)}clickable(){if(document.querySelector(this.container).classList.contains(this.classes.hover)){const e=this.checkResponsiveClass();return!!this.checkMobileOrTablet()||window.innerWidth<=e}return!0}checkResponsiveClass(){let e=document.querySelector(this.container);return e.classList.contains(this.classes.XXL)?this.current_responsive_size=this.breakpoints.xxl:e.classList.contains(this.classes.XL)?this.current_responsive_size=this.breakpoints.xl:e.classList.contains(this.classes.LG)?this.current_responsive_size=this.breakpoints.lg:e.classList.contains(this.classes.MD)?this.current_responsive_size=this.breakpoints.md:e.classList.contains(this.classes.SM)?this.current_responsive_size=this.breakpoints.sm:(e.classList.contains(this.classes.XS),this.current_responsive_size=this.breakpoints.xs),this.current_responsive_size}checkMobileOrTablet(){let e=!1;var t;return t=navigator.userAgent||navigator.vendor||window.opera,(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(t)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(t.slice(0,4)))&&(e=!0),e}}export{i as VGNav};