(function(Z,Y,U){function P(f){return f.getFullYear()+"-"+(f.getMonth()+1)+"-"+f.getDate()+" "+f.getHours()+":"+f.getMinutes()+":"+f.getSeconds()+":"+f.getMilliseconds()}function j(g){try{return Array.prototype.slice.call(g,0)}catch(f){for(var l=[],k=0,h=g.length;k<h;k++){l.push(g[k])}return l}}function T(k,g){k=k||"";g=g||Y;if(0===k.indexOf("#")){return g.getElementById(k.substring(1))}var q=[];if(/^[a-zA-Z]{1,}$/.test(k)){q=j(g.getElementsByTagName(k))}else{if(0===k.indexOf(".")){if(g.querySelectorAll){q=j(g.querySelectorAll(k))}else{for(var p=g.getElementsByTagName("*"),n=k.substring(1),m=0,l=p.length;m<l;m++){Q(p[m],n)&&q.push(p[m])}}}}return q}function d(g,f){g&&1===g.nodeType&&("none"===g.style.display?g.style.display=f?"block":g._oldDisplay||"":f&&(g.style.display="block"))}function O(f){f&&1===f.nodeType&&"none"!==f.style.display&&(f._oldDisplay=f.style.display||"",f.style.display="none")}function W(g,f){if("[object Array]"===Object.prototype.toString.call(g)){for(var k=0,h=g.length;k<h;k++){W(g[k],f)}}else{Q(g,f)||(g.className=""===g.className?f:g.className+(" "+f))}}function Q(g,f){if(g.className){var h=g.className.split(/\s+/);h.unshift("000");h.push("000");return 2<h.length&&-1<h.join(",").indexOf(","+f+",")}return !1}function S(g,f){if("[object Array]"===Object.prototype.toString.call(g)){for(var l=0,k=g.length;l<k;l++){S(g[l],f)}}else{if(Q(g,f)){for(var l=g.className.split(/\s+/),k=0,h=l.length;k<h;k++){if(f===l[k]){l.splice(k,1);break}}g.className=l.join(" ")}}}function N(g,f,h){g.addEventListener?g.addEventListener(f,h,!1):g.attachEvent?g.attachEvent("on"+f,h):g["on"+f]=h}function M(g){if(Z.JSON&&Z.JSON.stringify){return Z.JSON.stringify(g)}var f=[];if("object"==typeof g){if(g instanceof Array){var k=[];f.push("[");for(var h=0;h<g.length;h++){k.push(M(g[h]))}f.push(k.join());f.push("]")}else{if(null!=g){f.push("{");k=[];for(h in g){k.push('"'+h+'":'+M(g[h]))}f.push(k.join());f.push("}")}}return f.join("")}return"number"!==typeof g?'"'+(g||"")+'"':g}function b(f){this.key=f||"account.xiaomi.com"}function a(g){g=g||{};var f=L,k={},h;for(h in f){h in k||h in g||(g[h]=f[h])}this.opt=g;this.init()}function K(f){V.on(function(g,h){f.style.height=Math.max(g.height,h.height)+"px";f.style.width=h.width+"px"});V.onbeforeResize(function(){f.style.height="auto";f.style.width="100%"})}U=Z.MiLogin||(Z.MiLogin={});(function(){var f=location.hostname;return -1<f.indexOf("onebox")?"onebox":-1<f.indexOf("preview")?"preview":"release"})();var w=function(){var f=[];return{add:function(g,k,h){f.push({title:g,message:k,more:h,time:P(new Date)});-1!==(location.search+"").indexOf("debug")&&"console" in Z&&"function"===typeof Z.console.log&&console.log(arguments)},get:function(){return f}}}(),R=function(){var g=navigator.userAgent,f={};/\s+chrome\/([\d\.]*)/i.test(g)?(f.name="Chrome",f.version=parseInt(RegExp.$1)):/msie\s+(\d+\.\d+)/i.test(g)?(f.name="IE",f.version=parseFloat(RegExp.$1)):/\s+firefox\/([\d\.]*)/i.test(g)?(f.name="Firefox",f.version=parseInt(RegExp.$1)):/applewebKit\/([\d\.]*)/i.test(g)?(f.name="Webkit",f.version=parseInt(RegExp.$1),/miuibrowser\/([\d\.]*)/i.test(g)&&(f.name="MIUI Browser",f.version=parseInt(RegExp.$1)),/version\/([\d\.]*)\s+Safari/i.test(g)&&(f.name="Safari",f.version=parseInt(RegExp.$1))):/trident\/([\d\.]*)/i.test(g)?(g=g.match(/rv:([\d\.]*)/))&&2<=g.length?(f.name="IE",f.version=parseFloat(g[1])):(f.name="Trident",f.version=RegExp.$1):(f.name=g,f.version=0);return f}();(function(){var g=Y.createElement("a");g.target="_blank";Y.body.appendChild(g);var f=0,h=null;return function(q,p){if("_self"===p){location.href=q}else{g.href=q;var n=(new Date).getTime();if(!(h===q&&1000>n-f)){h=q;f=n;try{var l=Y.createEvent("MouseEvents");l.initMouseEvent("click",!0,!0,Z);g.dispatchEvent(l)}catch(m){g.click()}}}}})();try{var J=!!Z.localStorage}catch(c){J=!1}b.prototype={key:"account.xiaomi.com",_read:J?function(){var g="";try{g=Z.localStorage.getItem(this.key)}catch(f){}g=(new Function("","return "+g))();return"object"==typeof g&&g?g:{}}:function(){return{}},_save:J?function(g){try{Z.localStorage.setItem(this.key,M(g))}catch(f){w.add("setItem \u629b\u51fa\u5f02\u5e38",R.name+" "+R.version)}}:function(){return !1},_readAndGc:function(g){var f=this._read(),k;for(k in f){var h=f[k];h.expires&&(new Date).getTime()-h.time>=h.expires&&delete f[k]}this._save(f);return g?f[g]:f},remove:function(g){var f=this._readAndGc();delete f[g];this._save(f)},get:function(f){f=this._readAndGc(f)||{};return f.value?f.value:null},set:function(g,f,l){if(!g){return !1}var k=this._readAndGc(),h=(new Date).getTime();k[g]={value:f,expires:l,time:h};this._save(k)}};Z.LStore=new b("account.xiaomi.com");var V={fns:[],beforeFns:[],inited:!1,on:function(f){"function"===typeof f&&this.fns.push(f);!this.inited&&this.init();Z.onresize&&Z.onresize()},off:function(g){if("function"===typeof g){for(var f=0,h=this.fns.length;f<h;f++){if(g===this.fns[f]){return this.fns.splice(f,1),!0}}}return !1},onbeforeResize:function(f){"function"===typeof f&&this.beforeFns.push(f)},beforeExec:function(){for(var g=0,f;f=this.beforeFns[g++];){f&&f.call(Z)}},exec:function(){this.beforeExec();var g;g=Z.innerWidth||0;var f=Z.innerHeight||0;g||("CSS1Compat"==Y.compatMode?(g=Y.documentElement.clientWidth,f=Y.documentElement.clientHeight):(g=Y.body.clientWidth,f=Y.body.clientHeight));g={width:g,height:f};for(var f=Y.documentElement,l=Y.body,k=Math.max(f.clientHeight||0,l.scrollHeight,f.scrollHeight||0,l.offsetHeight,f.offsetHeight||0),f={width:Math.max(f.clientWidth||0,l.scrollWidth,f.scrollWidth||0,l.offsetWidth,f.offsetWidth||0),height:k},l=Y.documentElement,k=Y.body,l={scleft:Math.max(l.scrollLeft||0,k.scrollLeft),sctop:Math.max(l.scrollTop||0,k.scrollTop)},k=0,h;h=this.fns[k++];){h&&h.call(Z,g,f,l)}},init:function(){var g=null,f=this;Z.onresize=function(){Z.clearTimeout(g);g=Z.setTimeout(function(){f.exec()},60)}},triggle:function(){this.exec()}},o={},X=null,i=Y.body,L={title:"{Modal-DefTitle}",cls:"",titleCls:"",bodyCls:"",html:"",afterRender:function(){}},e=function(){var f=0;return function(){return"modal-id-"+f++}}();a.prototype={init:function(){var g=this.opt;X||(g.renderTo?X=g.renderTo:(X=Y.createElement("div"),W(X,"modal_container"),X.innerHTML='<div class="modal_msk"></div>',i.appendChild(X),!g.modalfixed&&K(X)));this.id=g.id||e();var f=this.modal=o[this.id],h=this;f||(f=this.modal=Y.createElement("div"),W(f,"modal_tip"),this.hide(),f.id=this.id,f.innerHTML='<div class="modal_tip_flex"><div class="modal_tip_hd modal-header"><div class="external_logo_area"><a class="milogo" href="javascript:void(0)"></a></div><div class="modal-header-text modal_tip_title"></div><a href="javascript:void(0)" title="" class="modal-header-close btn_mod_close"><span>{MSG-CLOSE}</span></a></div><div class="modal_tip_bd modal-body"></div></div>',g.renderTo?g.renderTo.appendChild(f):X.appendChild(f),this.header=T(".modal-header",f)[0],this.title=T(".modal-header-text",f)[0],this.body=T(".modal-body",f)[0],this.closeBtn=T(".modal-header-close",f)[0],N(this.closeBtn,"click",function(){h.close()}),this.render(g),o[this.id]=f,this.resizeModal=function(q,p,m){p=f;var n="getComputedStyle" in Z?Z.getComputedStyle(p):p.currentStyle;p={width:Math.max(parseInt(n.width)||0,p.clientWidth,p.offsetWidth),height:Math.max(parseInt(n.height)||0,p.clientHeight,p.offsetHeight)};n=q.height;q=q.width;var l=m.sctop;m=m.scleft;g.deviceType&&"mobile"===g.deviceType||(p&&p.height&&(f.style.marginTop=p.height<n?(n-p.height)/2+"px":0+l+"px",f.style.top=0),p&&p.width&&(f.style.marginLeft=p.width<q?(q-p.width)/2+"px":0+m+"px",f.style.left=0))},g.modalfixed&&(this.resizeModal=function(){}),!g.renderTo&&V.on(this.resizeModal));this.show()},show:function(){if(this.modal&&(d(X,"hide"),d(this.modal,"hide"),!this.opt.renderTo)){var f=this;setTimeout(function(){!f.opt.modalfixed&&V.triggle()},200)}},beforeClose:function(){if(this.opt.beforeClose){return this.opt.beforeClose.call(this)}},close:function(f){if(this.modal){if(!1===this.beforeClose()){return 0}f?(V.off(this.resizeModal),X.removeChild(this.modal),this.modal=null,o[this.id]=null,O(X,"hide")):this.hide()}},hide:function(){O(X,"hide");O(this.modal,"hide")},render:function(f){this.title.innerHTML=f.title;this.body.innerHTML=f.html;f.titleCls&&W(this.title,f.titleCls);f.bodyCls&&W(this.body,f.bodyCls);f.cls&&W(this.modal,f.cls);f.afterRender.call(this)},update:function(g,f){f&&(g.titleCls&&S(this.title,g.titleCls),g.bodyCls&&S(this.body,g.bodyCls),g.cls&&S(this.modal,g.cls));this.render(g)}};Z.Modal=a;U&&U.loaded&&U.loaded()})(window,document);