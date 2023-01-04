(()=>{var he=Object.create,_t=Object.defineProperty,ce=Object.getPrototypeOf,le=Object.prototype.hasOwnProperty,fe=Object.getOwnPropertyNames,pe=Object.getOwnPropertyDescriptor;var de=b=>_t(b,"__esModule",{value:!0});var ue=(b,E)=>()=>(E||(E={exports:{}},b(E.exports,E)),E.exports);var ge=(b,E,J)=>{if(E&&typeof E=="object"||typeof E=="function")for(let $ of fe(E))!le.call(b,$)&&$!=="default"&&_t(b,$,{get:()=>E[$],enumerable:!(J=pe(E,$))||J.enumerable});return b},me=b=>ge(de(_t(b!=null?he(ce(b)):{},"default",b&&b.__esModule&&"default"in b?{get:()=>b.default,enumerable:!0}:{value:b,enumerable:!0})),b);var vi=ue((kt,Pt)=>{(function(b,E){typeof kt=="object"&&typeof Pt!="undefined"?Pt.exports=E():typeof define=="function"&&define.amd?define(E):(b=typeof globalThis!="undefined"?globalThis:b||self,b.Cropper=E())})(kt,function(){"use strict";function b(a,t){var e=Object.keys(a);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(a);t&&(i=i.filter(function(o){return Object.getOwnPropertyDescriptor(a,o).enumerable})),e.push.apply(e,i)}return e}function E(a){for(var t=1;t<arguments.length;t++){var e=arguments[t]!=null?arguments[t]:{};t%2?b(Object(e),!0).forEach(function(i){yi(a,i,e[i])}):Object.getOwnPropertyDescriptors?Object.defineProperties(a,Object.getOwnPropertyDescriptors(e)):b(Object(e)).forEach(function(i){Object.defineProperty(a,i,Object.getOwnPropertyDescriptor(e,i))})}return a}function J(a){return J=typeof Symbol=="function"&&typeof Symbol.iterator=="symbol"?function(t){return typeof t}:function(t){return t&&typeof Symbol=="function"&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},J(a)}function $(a,t){if(!(a instanceof t))throw new TypeError("Cannot call a class as a function")}function Yt(a,t){for(var e=0;e<t.length;e++){var i=t[e];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(a,i.key,i)}}function bi(a,t,e){return t&&Yt(a.prototype,t),e&&Yt(a,e),Object.defineProperty(a,"prototype",{writable:!1}),a}function yi(a,t,e){return t in a?Object.defineProperty(a,t,{value:e,enumerable:!0,configurable:!0,writable:!0}):a[t]=e,a}function Xt(a){return xi(a)||Di(a)||Ei(a)||Mi()}function xi(a){if(Array.isArray(a))return vt(a)}function Di(a){if(typeof Symbol!="undefined"&&a[Symbol.iterator]!=null||a["@@iterator"]!=null)return Array.from(a)}function Ei(a,t){if(!!a){if(typeof a=="string")return vt(a,t);var e=Object.prototype.toString.call(a).slice(8,-1);if(e==="Object"&&a.constructor&&(e=a.constructor.name),e==="Map"||e==="Set")return Array.from(a);if(e==="Arguments"||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(e))return vt(a,t)}}function vt(a,t){(t==null||t>a.length)&&(t=a.length);for(var e=0,i=new Array(t);e<t;e++)i[e]=a[e];return i}function Mi(){throw new TypeError(`Invalid attempt to spread non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`)}var pt=typeof window!="undefined"&&typeof window.document!="undefined",P=pt?window:{},wt=pt&&P.document.documentElement?"ontouchstart"in P.document.documentElement:!1,bt=pt?"PointerEvent"in P:!1,y="cropper",yt="all",zt="crop",Ht="move",Wt="zoom",G="e",q="w",tt="s",W="n",nt="ne",ot="nw",st="se",ht="sw",xt="".concat(y,"-crop"),Ut="".concat(y,"-disabled"),R="".concat(y,"-hidden"),jt="".concat(y,"-hide"),Ti="".concat(y,"-invisible"),dt="".concat(y,"-modal"),Dt="".concat(y,"-move"),ct="".concat(y,"Action"),ut="".concat(y,"Preview"),Et="crop",Vt="move",$t="none",Mt="crop",Tt="cropend",Ct="cropmove",Ot="cropstart",Gt="dblclick",Ci=wt?"touchstart":"mousedown",Oi=wt?"touchmove":"mousemove",Ni=wt?"touchend touchcancel":"mouseup",qt=bt?"pointerdown":Ci,Ft=bt?"pointermove":Oi,Qt=bt?"pointerup pointercancel":Ni,Zt="ready",Kt="resize",Jt="wheel",Nt="zoom",ti="image/jpeg",Ai=/^e|w|s|n|se|sw|ne|nw|all|crop|move|zoom$/,Ri=/^data:/,Si=/^data:image\/jpeg;base64,/,Ii=/^img|canvas$/i,ii=200,ei=100,ai={viewMode:0,dragMode:Et,initialAspectRatio:NaN,aspectRatio:NaN,data:null,preview:"",responsive:!0,restore:!0,checkCrossOrigin:!0,checkOrientation:!0,modal:!0,guides:!0,center:!0,highlight:!0,background:!0,autoCrop:!0,autoCropArea:.8,movable:!0,rotatable:!0,scalable:!0,zoomable:!0,zoomOnTouch:!0,zoomOnWheel:!0,wheelZoomRatio:.1,cropBoxMovable:!0,cropBoxResizable:!0,toggleDragModeOnDblclick:!0,minCanvasWidth:0,minCanvasHeight:0,minCropBoxWidth:0,minCropBoxHeight:0,minContainerWidth:ii,minContainerHeight:ei,ready:null,cropstart:null,cropmove:null,cropend:null,crop:null,zoom:null},Li='<div class="cropper-container" touch-action="none"><div class="cropper-wrap-box"><div class="cropper-canvas"></div></div><div class="cropper-drag-box"></div><div class="cropper-crop-box"><span class="cropper-view-box"></span><span class="cropper-dashed dashed-h"></span><span class="cropper-dashed dashed-v"></span><span class="cropper-center"></span><span class="cropper-face"></span><span class="cropper-line line-e" data-cropper-action="e"></span><span class="cropper-line line-n" data-cropper-action="n"></span><span class="cropper-line line-w" data-cropper-action="w"></span><span class="cropper-line line-s" data-cropper-action="s"></span><span class="cropper-point point-e" data-cropper-action="e"></span><span class="cropper-point point-n" data-cropper-action="n"></span><span class="cropper-point point-w" data-cropper-action="w"></span><span class="cropper-point point-s" data-cropper-action="s"></span><span class="cropper-point point-ne" data-cropper-action="ne"></span><span class="cropper-point point-nw" data-cropper-action="nw"></span><span class="cropper-point point-sw" data-cropper-action="sw"></span><span class="cropper-point point-se" data-cropper-action="se"></span></div></div>',Bi=Number.isNaN||P.isNaN;function u(a){return typeof a=="number"&&!Bi(a)}var ri=function(t){return t>0&&t<Infinity};function At(a){return typeof a=="undefined"}function F(a){return J(a)==="object"&&a!==null}var _i=Object.prototype.hasOwnProperty;function it(a){if(!F(a))return!1;try{var t=a.constructor,e=t.prototype;return t&&e&&_i.call(e,"isPrototypeOf")}catch(i){return!1}}function S(a){return typeof a=="function"}var ki=Array.prototype.slice;function ni(a){return Array.from?Array.from(a):ki.call(a)}function M(a,t){return a&&S(t)&&(Array.isArray(a)||u(a.length)?ni(a).forEach(function(e,i){t.call(a,e,i,a)}):F(a)&&Object.keys(a).forEach(function(e){t.call(a,a[e],e,a)})),a}var x=Object.assign||function(t){for(var e=arguments.length,i=new Array(e>1?e-1:0),o=1;o<e;o++)i[o-1]=arguments[o];return F(t)&&i.length>0&&i.forEach(function(r){F(r)&&Object.keys(r).forEach(function(n){t[n]=r[n]})}),t},Pi=/\.\d*(?:0|9){12}\d*$/;function et(a){var t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:1e11;return Pi.test(a)?Math.round(a*t)/t:a}var Yi=/^width|height|left|top|marginLeft|marginTop$/;function U(a,t){var e=a.style;M(t,function(i,o){Yi.test(o)&&u(i)&&(i="".concat(i,"px")),e[o]=i})}function Xi(a,t){return a.classList?a.classList.contains(t):a.className.indexOf(t)>-1}function N(a,t){if(!!t){if(u(a.length)){M(a,function(i){N(i,t)});return}if(a.classList){a.classList.add(t);return}var e=a.className.trim();e?e.indexOf(t)<0&&(a.className="".concat(e," ").concat(t)):a.className=t}}function Y(a,t){if(!!t){if(u(a.length)){M(a,function(e){Y(e,t)});return}if(a.classList){a.classList.remove(t);return}a.className.indexOf(t)>=0&&(a.className=a.className.replace(t,""))}}function at(a,t,e){if(!!t){if(u(a.length)){M(a,function(i){at(i,t,e)});return}e?N(a,t):Y(a,t)}}var zi=/([a-z\d])([A-Z])/g;function Rt(a){return a.replace(zi,"$1-$2").toLowerCase()}function St(a,t){return F(a[t])?a[t]:a.dataset?a.dataset[t]:a.getAttribute("data-".concat(Rt(t)))}function lt(a,t,e){F(e)?a[t]=e:a.dataset?a.dataset[t]=e:a.setAttribute("data-".concat(Rt(t)),e)}function Hi(a,t){if(F(a[t]))try{delete a[t]}catch(e){a[t]=void 0}else if(a.dataset)try{delete a.dataset[t]}catch(e){a.dataset[t]=void 0}else a.removeAttribute("data-".concat(Rt(t)))}var oi=/\s\s*/,si=function(){var a=!1;if(pt){var t=!1,e=function(){},i=Object.defineProperty({},"once",{get:function(){return a=!0,t},set:function(r){t=r}});P.addEventListener("test",e,i),P.removeEventListener("test",e,i)}return a}();function k(a,t,e){var i=arguments.length>3&&arguments[3]!==void 0?arguments[3]:{},o=e;t.trim().split(oi).forEach(function(r){if(!si){var n=a.listeners;n&&n[r]&&n[r][e]&&(o=n[r][e],delete n[r][e],Object.keys(n[r]).length===0&&delete n[r],Object.keys(n).length===0&&delete a.listeners)}a.removeEventListener(r,o,i)})}function B(a,t,e){var i=arguments.length>3&&arguments[3]!==void 0?arguments[3]:{},o=e;t.trim().split(oi).forEach(function(r){if(i.once&&!si){var n=a.listeners,s=n===void 0?{}:n;o=function(){delete s[r][e],a.removeEventListener(r,o,i);for(var l=arguments.length,h=new Array(l),c=0;c<l;c++)h[c]=arguments[c];e.apply(a,h)},s[r]||(s[r]={}),s[r][e]&&a.removeEventListener(r,s[r][e],i),s[r][e]=o,a.listeners=s}a.addEventListener(r,o,i)})}function rt(a,t,e){var i;return S(Event)&&S(CustomEvent)?i=new CustomEvent(t,{detail:e,bubbles:!0,cancelable:!0}):(i=document.createEvent("CustomEvent"),i.initCustomEvent(t,!0,!0,e)),a.dispatchEvent(i)}function hi(a){var t=a.getBoundingClientRect();return{left:t.left+(window.pageXOffset-document.documentElement.clientLeft),top:t.top+(window.pageYOffset-document.documentElement.clientTop)}}var It=P.location,Wi=/^(\w+:)\/\/([^:/?#]*):?(\d*)/i;function ci(a){var t=a.match(Wi);return t!==null&&(t[1]!==It.protocol||t[2]!==It.hostname||t[3]!==It.port)}function li(a){var t="timestamp=".concat(new Date().getTime());return a+(a.indexOf("?")===-1?"?":"&")+t}function ft(a){var t=a.rotate,e=a.scaleX,i=a.scaleY,o=a.translateX,r=a.translateY,n=[];u(o)&&o!==0&&n.push("translateX(".concat(o,"px)")),u(r)&&r!==0&&n.push("translateY(".concat(r,"px)")),u(t)&&t!==0&&n.push("rotate(".concat(t,"deg)")),u(e)&&e!==1&&n.push("scaleX(".concat(e,")")),u(i)&&i!==1&&n.push("scaleY(".concat(i,")"));var s=n.length?n.join(" "):"none";return{WebkitTransform:s,msTransform:s,transform:s}}function Ui(a){var t=E({},a),e=0;return M(a,function(i,o){delete t[o],M(t,function(r){var n=Math.abs(i.startX-r.startX),s=Math.abs(i.startY-r.startY),p=Math.abs(i.endX-r.endX),l=Math.abs(i.endY-r.endY),h=Math.sqrt(n*n+s*s),c=Math.sqrt(p*p+l*l),f=(c-h)/h;Math.abs(f)>Math.abs(e)&&(e=f)})}),e}function gt(a,t){var e=a.pageX,i=a.pageY,o={endX:e,endY:i};return t?o:E({startX:e,startY:i},o)}function ji(a){var t=0,e=0,i=0;return M(a,function(o){var r=o.startX,n=o.startY;t+=r,e+=n,i+=1}),t/=i,e/=i,{pageX:t,pageY:e}}function j(a){var t=a.aspectRatio,e=a.height,i=a.width,o=arguments.length>1&&arguments[1]!==void 0?arguments[1]:"contain",r=ri(i),n=ri(e);if(r&&n){var s=e*t;o==="contain"&&s>i||o==="cover"&&s<i?e=i/t:i=e*t}else r?e=i/t:n&&(i=e*t);return{width:i,height:e}}function Vi(a){var t=a.width,e=a.height,i=a.degree;if(i=Math.abs(i)%180,i===90)return{width:e,height:t};var o=i%90*Math.PI/180,r=Math.sin(o),n=Math.cos(o),s=t*n+e*r,p=t*r+e*n;return i>90?{width:p,height:s}:{width:s,height:p}}function $i(a,t,e,i){var o=t.aspectRatio,r=t.naturalWidth,n=t.naturalHeight,s=t.rotate,p=s===void 0?0:s,l=t.scaleX,h=l===void 0?1:l,c=t.scaleY,f=c===void 0?1:c,m=e.aspectRatio,g=e.naturalWidth,D=e.naturalHeight,v=i.fillColor,C=v===void 0?"transparent":v,A=i.imageSmoothingEnabled,T=A===void 0?!0:A,z=i.imageSmoothingQuality,L=z===void 0?"low":z,d=i.maxWidth,w=d===void 0?Infinity:d,O=i.maxHeight,_=O===void 0?Infinity:O,H=i.minWidth,Q=H===void 0?0:H,Z=i.minHeight,V=Z===void 0?0:Z,X=document.createElement("canvas"),I=X.getContext("2d"),K=j({aspectRatio:m,width:w,height:_}),mt=j({aspectRatio:m,width:Q,height:V},"cover"),Lt=Math.min(K.width,Math.max(mt.width,g)),Bt=Math.min(K.height,Math.max(mt.height,D)),di=j({aspectRatio:o,width:w,height:_}),ui=j({aspectRatio:o,width:Q,height:V},"cover"),gi=Math.min(di.width,Math.max(ui.width,r)),mi=Math.min(di.height,Math.max(ui.height,n)),oe=[-gi/2,-mi/2,gi,mi];return X.width=et(Lt),X.height=et(Bt),I.fillStyle=C,I.fillRect(0,0,Lt,Bt),I.save(),I.translate(Lt/2,Bt/2),I.rotate(p*Math.PI/180),I.scale(h,f),I.imageSmoothingEnabled=T,I.imageSmoothingQuality=L,I.drawImage.apply(I,[a].concat(Xt(oe.map(function(se){return Math.floor(et(se))})))),I.restore(),X}var fi=String.fromCharCode;function Gi(a,t,e){var i="";e+=t;for(var o=t;o<e;o+=1)i+=fi(a.getUint8(o));return i}var qi=/^data:.*,/;function Fi(a){var t=a.replace(qi,""),e=atob(t),i=new ArrayBuffer(e.length),o=new Uint8Array(i);return M(o,function(r,n){o[n]=e.charCodeAt(n)}),i}function Qi(a,t){for(var e=[],i=8192,o=new Uint8Array(a);o.length>0;)e.push(fi.apply(null,ni(o.subarray(0,i)))),o=o.subarray(i);return"data:".concat(t,";base64,").concat(btoa(e.join("")))}function Zi(a){var t=new DataView(a),e;try{var i,o,r;if(t.getUint8(0)===255&&t.getUint8(1)===216)for(var n=t.byteLength,s=2;s+1<n;){if(t.getUint8(s)===255&&t.getUint8(s+1)===225){o=s;break}s+=1}if(o){var p=o+4,l=o+10;if(Gi(t,p,4)==="Exif"){var h=t.getUint16(l);if(i=h===18761,(i||h===19789)&&t.getUint16(l+2,i)===42){var c=t.getUint32(l+4,i);c>=8&&(r=l+c)}}}if(r){var f=t.getUint16(r,i),m,g;for(g=0;g<f;g+=1)if(m=r+g*12+2,t.getUint16(m,i)===274){m+=8,e=t.getUint16(m,i),t.setUint16(m,1,i);break}}}catch(D){e=1}return e}function Ki(a){var t=0,e=1,i=1;switch(a){case 2:e=-1;break;case 3:t=-180;break;case 4:i=-1;break;case 5:t=90,i=-1;break;case 6:t=90;break;case 7:t=90,e=-1;break;case 8:t=-90;break}return{rotate:t,scaleX:e,scaleY:i}}var Ji={render:function(){this.initContainer(),this.initCanvas(),this.initCropBox(),this.renderCanvas(),this.cropped&&this.renderCropBox()},initContainer:function(){var t=this.element,e=this.options,i=this.container,o=this.cropper,r=Number(e.minContainerWidth),n=Number(e.minContainerHeight);N(o,R),Y(t,R);var s={width:Math.max(i.offsetWidth,r>=0?r:ii),height:Math.max(i.offsetHeight,n>=0?n:ei)};this.containerData=s,U(o,{width:s.width,height:s.height}),N(t,R),Y(o,R)},initCanvas:function(){var t=this.containerData,e=this.imageData,i=this.options.viewMode,o=Math.abs(e.rotate)%180==90,r=o?e.naturalHeight:e.naturalWidth,n=o?e.naturalWidth:e.naturalHeight,s=r/n,p=t.width,l=t.height;t.height*s>t.width?i===3?p=t.height*s:l=t.width/s:i===3?l=t.width/s:p=t.height*s;var h={aspectRatio:s,naturalWidth:r,naturalHeight:n,width:p,height:l};this.canvasData=h,this.limited=i===1||i===2,this.limitCanvas(!0,!0),h.width=Math.min(Math.max(h.width,h.minWidth),h.maxWidth),h.height=Math.min(Math.max(h.height,h.minHeight),h.maxHeight),h.left=(t.width-h.width)/2,h.top=(t.height-h.height)/2,h.oldLeft=h.left,h.oldTop=h.top,this.initialCanvasData=x({},h)},limitCanvas:function(t,e){var i=this.options,o=this.containerData,r=this.canvasData,n=this.cropBoxData,s=i.viewMode,p=r.aspectRatio,l=this.cropped&&n;if(t){var h=Number(i.minCanvasWidth)||0,c=Number(i.minCanvasHeight)||0;s>1?(h=Math.max(h,o.width),c=Math.max(c,o.height),s===3&&(c*p>h?h=c*p:c=h/p)):s>0&&(h?h=Math.max(h,l?n.width:0):c?c=Math.max(c,l?n.height:0):l&&(h=n.width,c=n.height,c*p>h?h=c*p:c=h/p));var f=j({aspectRatio:p,width:h,height:c});h=f.width,c=f.height,r.minWidth=h,r.minHeight=c,r.maxWidth=Infinity,r.maxHeight=Infinity}if(e)if(s>(l?0:1)){var m=o.width-r.width,g=o.height-r.height;r.minLeft=Math.min(0,m),r.minTop=Math.min(0,g),r.maxLeft=Math.max(0,m),r.maxTop=Math.max(0,g),l&&this.limited&&(r.minLeft=Math.min(n.left,n.left+(n.width-r.width)),r.minTop=Math.min(n.top,n.top+(n.height-r.height)),r.maxLeft=n.left,r.maxTop=n.top,s===2&&(r.width>=o.width&&(r.minLeft=Math.min(0,m),r.maxLeft=Math.max(0,m)),r.height>=o.height&&(r.minTop=Math.min(0,g),r.maxTop=Math.max(0,g))))}else r.minLeft=-r.width,r.minTop=-r.height,r.maxLeft=o.width,r.maxTop=o.height},renderCanvas:function(t,e){var i=this.canvasData,o=this.imageData;if(e){var r=Vi({width:o.naturalWidth*Math.abs(o.scaleX||1),height:o.naturalHeight*Math.abs(o.scaleY||1),degree:o.rotate||0}),n=r.width,s=r.height,p=i.width*(n/i.naturalWidth),l=i.height*(s/i.naturalHeight);i.left-=(p-i.width)/2,i.top-=(l-i.height)/2,i.width=p,i.height=l,i.aspectRatio=n/s,i.naturalWidth=n,i.naturalHeight=s,this.limitCanvas(!0,!1)}(i.width>i.maxWidth||i.width<i.minWidth)&&(i.left=i.oldLeft),(i.height>i.maxHeight||i.height<i.minHeight)&&(i.top=i.oldTop),i.width=Math.min(Math.max(i.width,i.minWidth),i.maxWidth),i.height=Math.min(Math.max(i.height,i.minHeight),i.maxHeight),this.limitCanvas(!1,!0),i.left=Math.min(Math.max(i.left,i.minLeft),i.maxLeft),i.top=Math.min(Math.max(i.top,i.minTop),i.maxTop),i.oldLeft=i.left,i.oldTop=i.top,U(this.canvas,x({width:i.width,height:i.height},ft({translateX:i.left,translateY:i.top}))),this.renderImage(t),this.cropped&&this.limited&&this.limitCropBox(!0,!0)},renderImage:function(t){var e=this.canvasData,i=this.imageData,o=i.naturalWidth*(e.width/e.naturalWidth),r=i.naturalHeight*(e.height/e.naturalHeight);x(i,{width:o,height:r,left:(e.width-o)/2,top:(e.height-r)/2}),U(this.image,x({width:i.width,height:i.height},ft(x({translateX:i.left,translateY:i.top},i)))),t&&this.output()},initCropBox:function(){var t=this.options,e=this.canvasData,i=t.aspectRatio||t.initialAspectRatio,o=Number(t.autoCropArea)||.8,r={width:e.width,height:e.height};i&&(e.height*i>e.width?r.height=r.width/i:r.width=r.height*i),this.cropBoxData=r,this.limitCropBox(!0,!0),r.width=Math.min(Math.max(r.width,r.minWidth),r.maxWidth),r.height=Math.min(Math.max(r.height,r.minHeight),r.maxHeight),r.width=Math.max(r.minWidth,r.width*o),r.height=Math.max(r.minHeight,r.height*o),r.left=e.left+(e.width-r.width)/2,r.top=e.top+(e.height-r.height)/2,r.oldLeft=r.left,r.oldTop=r.top,this.initialCropBoxData=x({},r)},limitCropBox:function(t,e){var i=this.options,o=this.containerData,r=this.canvasData,n=this.cropBoxData,s=this.limited,p=i.aspectRatio;if(t){var l=Number(i.minCropBoxWidth)||0,h=Number(i.minCropBoxHeight)||0,c=s?Math.min(o.width,r.width,r.width+r.left,o.width-r.left):o.width,f=s?Math.min(o.height,r.height,r.height+r.top,o.height-r.top):o.height;l=Math.min(l,o.width),h=Math.min(h,o.height),p&&(l&&h?h*p>l?h=l/p:l=h*p:l?h=l/p:h&&(l=h*p),f*p>c?f=c/p:c=f*p),n.minWidth=Math.min(l,c),n.minHeight=Math.min(h,f),n.maxWidth=c,n.maxHeight=f}e&&(s?(n.minLeft=Math.max(0,r.left),n.minTop=Math.max(0,r.top),n.maxLeft=Math.min(o.width,r.left+r.width)-n.width,n.maxTop=Math.min(o.height,r.top+r.height)-n.height):(n.minLeft=0,n.minTop=0,n.maxLeft=o.width-n.width,n.maxTop=o.height-n.height))},renderCropBox:function(){var t=this.options,e=this.containerData,i=this.cropBoxData;(i.width>i.maxWidth||i.width<i.minWidth)&&(i.left=i.oldLeft),(i.height>i.maxHeight||i.height<i.minHeight)&&(i.top=i.oldTop),i.width=Math.min(Math.max(i.width,i.minWidth),i.maxWidth),i.height=Math.min(Math.max(i.height,i.minHeight),i.maxHeight),this.limitCropBox(!1,!0),i.left=Math.min(Math.max(i.left,i.minLeft),i.maxLeft),i.top=Math.min(Math.max(i.top,i.minTop),i.maxTop),i.oldLeft=i.left,i.oldTop=i.top,t.movable&&t.cropBoxMovable&&lt(this.face,ct,i.width>=e.width&&i.height>=e.height?Ht:yt),U(this.cropBox,x({width:i.width,height:i.height},ft({translateX:i.left,translateY:i.top}))),this.cropped&&this.limited&&this.limitCanvas(!0,!0),this.disabled||this.output()},output:function(){this.preview(),rt(this.element,Mt,this.getData())}},te={initPreview:function(){var t=this.element,e=this.crossOrigin,i=this.options.preview,o=e?this.crossOriginUrl:this.url,r=t.alt||"The image to preview",n=document.createElement("img");if(e&&(n.crossOrigin=e),n.src=o,n.alt=r,this.viewBox.appendChild(n),this.viewBoxImage=n,!!i){var s=i;typeof i=="string"?s=t.ownerDocument.querySelectorAll(i):i.querySelector&&(s=[i]),this.previews=s,M(s,function(p){var l=document.createElement("img");lt(p,ut,{width:p.offsetWidth,height:p.offsetHeight,html:p.innerHTML}),e&&(l.crossOrigin=e),l.src=o,l.alt=r,l.style.cssText='display:block;width:100%;height:auto;min-width:0!important;min-height:0!important;max-width:none!important;max-height:none!important;image-orientation:0deg!important;"',p.innerHTML="",p.appendChild(l)})}},resetPreview:function(){M(this.previews,function(t){var e=St(t,ut);U(t,{width:e.width,height:e.height}),t.innerHTML=e.html,Hi(t,ut)})},preview:function(){var t=this.imageData,e=this.canvasData,i=this.cropBoxData,o=i.width,r=i.height,n=t.width,s=t.height,p=i.left-e.left-t.left,l=i.top-e.top-t.top;!this.cropped||this.disabled||(U(this.viewBoxImage,x({width:n,height:s},ft(x({translateX:-p,translateY:-l},t)))),M(this.previews,function(h){var c=St(h,ut),f=c.width,m=c.height,g=f,D=m,v=1;o&&(v=f/o,D=r*v),r&&D>m&&(v=m/r,g=o*v,D=m),U(h,{width:g,height:D}),U(h.getElementsByTagName("img")[0],x({width:n*v,height:s*v},ft(x({translateX:-p*v,translateY:-l*v},t))))}))}},ie={bind:function(){var t=this.element,e=this.options,i=this.cropper;S(e.cropstart)&&B(t,Ot,e.cropstart),S(e.cropmove)&&B(t,Ct,e.cropmove),S(e.cropend)&&B(t,Tt,e.cropend),S(e.crop)&&B(t,Mt,e.crop),S(e.zoom)&&B(t,Nt,e.zoom),B(i,qt,this.onCropStart=this.cropStart.bind(this)),e.zoomable&&e.zoomOnWheel&&B(i,Jt,this.onWheel=this.wheel.bind(this),{passive:!1,capture:!0}),e.toggleDragModeOnDblclick&&B(i,Gt,this.onDblclick=this.dblclick.bind(this)),B(t.ownerDocument,Ft,this.onCropMove=this.cropMove.bind(this)),B(t.ownerDocument,Qt,this.onCropEnd=this.cropEnd.bind(this)),e.responsive&&B(window,Kt,this.onResize=this.resize.bind(this))},unbind:function(){var t=this.element,e=this.options,i=this.cropper;S(e.cropstart)&&k(t,Ot,e.cropstart),S(e.cropmove)&&k(t,Ct,e.cropmove),S(e.cropend)&&k(t,Tt,e.cropend),S(e.crop)&&k(t,Mt,e.crop),S(e.zoom)&&k(t,Nt,e.zoom),k(i,qt,this.onCropStart),e.zoomable&&e.zoomOnWheel&&k(i,Jt,this.onWheel,{passive:!1,capture:!0}),e.toggleDragModeOnDblclick&&k(i,Gt,this.onDblclick),k(t.ownerDocument,Ft,this.onCropMove),k(t.ownerDocument,Qt,this.onCropEnd),e.responsive&&k(window,Kt,this.onResize)}},ee={resize:function(){if(!this.disabled){var t=this.options,e=this.container,i=this.containerData,o=e.offsetWidth/i.width,r=e.offsetHeight/i.height,n=Math.abs(o-1)>Math.abs(r-1)?o:r;if(n!==1){var s,p;t.restore&&(s=this.getCanvasData(),p=this.getCropBoxData()),this.render(),t.restore&&(this.setCanvasData(M(s,function(l,h){s[h]=l*n})),this.setCropBoxData(M(p,function(l,h){p[h]=l*n})))}}},dblclick:function(){this.disabled||this.options.dragMode===$t||this.setDragMode(Xi(this.dragBox,xt)?Vt:Et)},wheel:function(t){var e=this,i=Number(this.options.wheelZoomRatio)||.1,o=1;this.disabled||(t.preventDefault(),!this.wheeling&&(this.wheeling=!0,setTimeout(function(){e.wheeling=!1},50),t.deltaY?o=t.deltaY>0?1:-1:t.wheelDelta?o=-t.wheelDelta/120:t.detail&&(o=t.detail>0?1:-1),this.zoom(-o*i,t)))},cropStart:function(t){var e=t.buttons,i=t.button;if(!(this.disabled||(t.type==="mousedown"||t.type==="pointerdown"&&t.pointerType==="mouse")&&(u(e)&&e!==1||u(i)&&i!==0||t.ctrlKey))){var o=this.options,r=this.pointers,n;t.changedTouches?M(t.changedTouches,function(s){r[s.identifier]=gt(s)}):r[t.pointerId||0]=gt(t),Object.keys(r).length>1&&o.zoomable&&o.zoomOnTouch?n=Wt:n=St(t.target,ct),!!Ai.test(n)&&rt(this.element,Ot,{originalEvent:t,action:n})!==!1&&(t.preventDefault(),this.action=n,this.cropping=!1,n===zt&&(this.cropping=!0,N(this.dragBox,dt)))}},cropMove:function(t){var e=this.action;if(!(this.disabled||!e)){var i=this.pointers;t.preventDefault(),rt(this.element,Ct,{originalEvent:t,action:e})!==!1&&(t.changedTouches?M(t.changedTouches,function(o){x(i[o.identifier]||{},gt(o,!0))}):x(i[t.pointerId||0]||{},gt(t,!0)),this.change(t))}},cropEnd:function(t){if(!this.disabled){var e=this.action,i=this.pointers;t.changedTouches?M(t.changedTouches,function(o){delete i[o.identifier]}):delete i[t.pointerId||0],!!e&&(t.preventDefault(),Object.keys(i).length||(this.action=""),this.cropping&&(this.cropping=!1,at(this.dragBox,dt,this.cropped&&this.options.modal)),rt(this.element,Tt,{originalEvent:t,action:e}))}}},ae={change:function(t){var e=this.options,i=this.canvasData,o=this.containerData,r=this.cropBoxData,n=this.pointers,s=this.action,p=e.aspectRatio,l=r.left,h=r.top,c=r.width,f=r.height,m=l+c,g=h+f,D=0,v=0,C=o.width,A=o.height,T=!0,z;!p&&t.shiftKey&&(p=c&&f?c/f:1),this.limited&&(D=r.minLeft,v=r.minTop,C=D+Math.min(o.width,i.width,i.left+i.width),A=v+Math.min(o.height,i.height,i.top+i.height));var L=n[Object.keys(n)[0]],d={x:L.endX-L.startX,y:L.endY-L.startY},w=function(_){switch(_){case G:m+d.x>C&&(d.x=C-m);break;case q:l+d.x<D&&(d.x=D-l);break;case W:h+d.y<v&&(d.y=v-h);break;case tt:g+d.y>A&&(d.y=A-g);break}};switch(s){case yt:l+=d.x,h+=d.y;break;case G:if(d.x>=0&&(m>=C||p&&(h<=v||g>=A))){T=!1;break}w(G),c+=d.x,c<0&&(s=q,c=-c,l-=c),p&&(f=c/p,h+=(r.height-f)/2);break;case W:if(d.y<=0&&(h<=v||p&&(l<=D||m>=C))){T=!1;break}w(W),f-=d.y,h+=d.y,f<0&&(s=tt,f=-f,h-=f),p&&(c=f*p,l+=(r.width-c)/2);break;case q:if(d.x<=0&&(l<=D||p&&(h<=v||g>=A))){T=!1;break}w(q),c-=d.x,l+=d.x,c<0&&(s=G,c=-c,l-=c),p&&(f=c/p,h+=(r.height-f)/2);break;case tt:if(d.y>=0&&(g>=A||p&&(l<=D||m>=C))){T=!1;break}w(tt),f+=d.y,f<0&&(s=W,f=-f,h-=f),p&&(c=f*p,l+=(r.width-c)/2);break;case nt:if(p){if(d.y<=0&&(h<=v||m>=C)){T=!1;break}w(W),f-=d.y,h+=d.y,c=f*p}else w(W),w(G),d.x>=0?m<C?c+=d.x:d.y<=0&&h<=v&&(T=!1):c+=d.x,d.y<=0?h>v&&(f-=d.y,h+=d.y):(f-=d.y,h+=d.y);c<0&&f<0?(s=ht,f=-f,c=-c,h-=f,l-=c):c<0?(s=ot,c=-c,l-=c):f<0&&(s=st,f=-f,h-=f);break;case ot:if(p){if(d.y<=0&&(h<=v||l<=D)){T=!1;break}w(W),f-=d.y,h+=d.y,c=f*p,l+=r.width-c}else w(W),w(q),d.x<=0?l>D?(c-=d.x,l+=d.x):d.y<=0&&h<=v&&(T=!1):(c-=d.x,l+=d.x),d.y<=0?h>v&&(f-=d.y,h+=d.y):(f-=d.y,h+=d.y);c<0&&f<0?(s=st,f=-f,c=-c,h-=f,l-=c):c<0?(s=nt,c=-c,l-=c):f<0&&(s=ht,f=-f,h-=f);break;case ht:if(p){if(d.x<=0&&(l<=D||g>=A)){T=!1;break}w(q),c-=d.x,l+=d.x,f=c/p}else w(tt),w(q),d.x<=0?l>D?(c-=d.x,l+=d.x):d.y>=0&&g>=A&&(T=!1):(c-=d.x,l+=d.x),d.y>=0?g<A&&(f+=d.y):f+=d.y;c<0&&f<0?(s=nt,f=-f,c=-c,h-=f,l-=c):c<0?(s=st,c=-c,l-=c):f<0&&(s=ot,f=-f,h-=f);break;case st:if(p){if(d.x>=0&&(m>=C||g>=A)){T=!1;break}w(G),c+=d.x,f=c/p}else w(tt),w(G),d.x>=0?m<C?c+=d.x:d.y>=0&&g>=A&&(T=!1):c+=d.x,d.y>=0?g<A&&(f+=d.y):f+=d.y;c<0&&f<0?(s=ot,f=-f,c=-c,h-=f,l-=c):c<0?(s=ht,c=-c,l-=c):f<0&&(s=nt,f=-f,h-=f);break;case Ht:this.move(d.x,d.y),T=!1;break;case Wt:this.zoom(Ui(n),t),T=!1;break;case zt:if(!d.x||!d.y){T=!1;break}z=hi(this.cropper),l=L.startX-z.left,h=L.startY-z.top,c=r.minWidth,f=r.minHeight,d.x>0?s=d.y>0?st:nt:d.x<0&&(l-=c,s=d.y>0?ht:ot),d.y<0&&(h-=f),this.cropped||(Y(this.cropBox,R),this.cropped=!0,this.limited&&this.limitCropBox(!0,!0));break}T&&(r.width=c,r.height=f,r.left=l,r.top=h,this.action=s,this.renderCropBox()),M(n,function(O){O.startX=O.endX,O.startY=O.endY})}},re={crop:function(){return this.ready&&!this.cropped&&!this.disabled&&(this.cropped=!0,this.limitCropBox(!0,!0),this.options.modal&&N(this.dragBox,dt),Y(this.cropBox,R),this.setCropBoxData(this.initialCropBoxData)),this},reset:function(){return this.ready&&!this.disabled&&(this.imageData=x({},this.initialImageData),this.canvasData=x({},this.initialCanvasData),this.cropBoxData=x({},this.initialCropBoxData),this.renderCanvas(),this.cropped&&this.renderCropBox()),this},clear:function(){return this.cropped&&!this.disabled&&(x(this.cropBoxData,{left:0,top:0,width:0,height:0}),this.cropped=!1,this.renderCropBox(),this.limitCanvas(!0,!0),this.renderCanvas(),Y(this.dragBox,dt),N(this.cropBox,R)),this},replace:function(t){var e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:!1;return!this.disabled&&t&&(this.isImg&&(this.element.src=t),e?(this.url=t,this.image.src=t,this.ready&&(this.viewBoxImage.src=t,M(this.previews,function(i){i.getElementsByTagName("img")[0].src=t}))):(this.isImg&&(this.replaced=!0),this.options.data=null,this.uncreate(),this.load(t))),this},enable:function(){return this.ready&&this.disabled&&(this.disabled=!1,Y(this.cropper,Ut)),this},disable:function(){return this.ready&&!this.disabled&&(this.disabled=!0,N(this.cropper,Ut)),this},destroy:function(){var t=this.element;return t[y]?(t[y]=void 0,this.isImg&&this.replaced&&(t.src=this.originalUrl),this.uncreate(),this):this},move:function(t){var e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:t,i=this.canvasData,o=i.left,r=i.top;return this.moveTo(At(t)?t:o+Number(t),At(e)?e:r+Number(e))},moveTo:function(t){var e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:t,i=this.canvasData,o=!1;return t=Number(t),e=Number(e),this.ready&&!this.disabled&&this.options.movable&&(u(t)&&(i.left=t,o=!0),u(e)&&(i.top=e,o=!0),o&&this.renderCanvas(!0)),this},zoom:function(t,e){var i=this.canvasData;return t=Number(t),t<0?t=1/(1-t):t=1+t,this.zoomTo(i.width*t/i.naturalWidth,null,e)},zoomTo:function(t,e,i){var o=this.options,r=this.canvasData,n=r.width,s=r.height,p=r.naturalWidth,l=r.naturalHeight;if(t=Number(t),t>=0&&this.ready&&!this.disabled&&o.zoomable){var h=p*t,c=l*t;if(rt(this.element,Nt,{ratio:t,oldRatio:n/p,originalEvent:i})===!1)return this;if(i){var f=this.pointers,m=hi(this.cropper),g=f&&Object.keys(f).length?ji(f):{pageX:i.pageX,pageY:i.pageY};r.left-=(h-n)*((g.pageX-m.left-r.left)/n),r.top-=(c-s)*((g.pageY-m.top-r.top)/s)}else it(e)&&u(e.x)&&u(e.y)?(r.left-=(h-n)*((e.x-r.left)/n),r.top-=(c-s)*((e.y-r.top)/s)):(r.left-=(h-n)/2,r.top-=(c-s)/2);r.width=h,r.height=c,this.renderCanvas(!0)}return this},rotate:function(t){return this.rotateTo((this.imageData.rotate||0)+Number(t))},rotateTo:function(t){return t=Number(t),u(t)&&this.ready&&!this.disabled&&this.options.rotatable&&(this.imageData.rotate=t%360,this.renderCanvas(!0,!0)),this},scaleX:function(t){var e=this.imageData.scaleY;return this.scale(t,u(e)?e:1)},scaleY:function(t){var e=this.imageData.scaleX;return this.scale(u(e)?e:1,t)},scale:function(t){var e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:t,i=this.imageData,o=!1;return t=Number(t),e=Number(e),this.ready&&!this.disabled&&this.options.scalable&&(u(t)&&(i.scaleX=t,o=!0),u(e)&&(i.scaleY=e,o=!0),o&&this.renderCanvas(!0,!0)),this},getData:function(){var t=arguments.length>0&&arguments[0]!==void 0?arguments[0]:!1,e=this.options,i=this.imageData,o=this.canvasData,r=this.cropBoxData,n;if(this.ready&&this.cropped){n={x:r.left-o.left,y:r.top-o.top,width:r.width,height:r.height};var s=i.width/i.naturalWidth;if(M(n,function(h,c){n[c]=h/s}),t){var p=Math.round(n.y+n.height),l=Math.round(n.x+n.width);n.x=Math.round(n.x),n.y=Math.round(n.y),n.width=l-n.x,n.height=p-n.y}}else n={x:0,y:0,width:0,height:0};return e.rotatable&&(n.rotate=i.rotate||0),e.scalable&&(n.scaleX=i.scaleX||1,n.scaleY=i.scaleY||1),n},setData:function(t){var e=this.options,i=this.imageData,o=this.canvasData,r={};if(this.ready&&!this.disabled&&it(t)){var n=!1;e.rotatable&&u(t.rotate)&&t.rotate!==i.rotate&&(i.rotate=t.rotate,n=!0),e.scalable&&(u(t.scaleX)&&t.scaleX!==i.scaleX&&(i.scaleX=t.scaleX,n=!0),u(t.scaleY)&&t.scaleY!==i.scaleY&&(i.scaleY=t.scaleY,n=!0)),n&&this.renderCanvas(!0,!0);var s=i.width/i.naturalWidth;u(t.x)&&(r.left=t.x*s+o.left),u(t.y)&&(r.top=t.y*s+o.top),u(t.width)&&(r.width=t.width*s),u(t.height)&&(r.height=t.height*s),this.setCropBoxData(r)}return this},getContainerData:function(){return this.ready?x({},this.containerData):{}},getImageData:function(){return this.sized?x({},this.imageData):{}},getCanvasData:function(){var t=this.canvasData,e={};return this.ready&&M(["left","top","width","height","naturalWidth","naturalHeight"],function(i){e[i]=t[i]}),e},setCanvasData:function(t){var e=this.canvasData,i=e.aspectRatio;return this.ready&&!this.disabled&&it(t)&&(u(t.left)&&(e.left=t.left),u(t.top)&&(e.top=t.top),u(t.width)?(e.width=t.width,e.height=t.width/i):u(t.height)&&(e.height=t.height,e.width=t.height*i),this.renderCanvas(!0)),this},getCropBoxData:function(){var t=this.cropBoxData,e;return this.ready&&this.cropped&&(e={left:t.left,top:t.top,width:t.width,height:t.height}),e||{}},setCropBoxData:function(t){var e=this.cropBoxData,i=this.options.aspectRatio,o,r;return this.ready&&this.cropped&&!this.disabled&&it(t)&&(u(t.left)&&(e.left=t.left),u(t.top)&&(e.top=t.top),u(t.width)&&t.width!==e.width&&(o=!0,e.width=t.width),u(t.height)&&t.height!==e.height&&(r=!0,e.height=t.height),i&&(o?e.height=e.width/i:r&&(e.width=e.height*i)),this.renderCropBox()),this},getCroppedCanvas:function(){var t=arguments.length>0&&arguments[0]!==void 0?arguments[0]:{};if(!this.ready||!window.HTMLCanvasElement)return null;var e=this.canvasData,i=$i(this.image,this.imageData,e,t);if(!this.cropped)return i;var o=this.getData(),r=o.x,n=o.y,s=o.width,p=o.height,l=i.width/Math.floor(e.naturalWidth);l!==1&&(r*=l,n*=l,s*=l,p*=l);var h=s/p,c=j({aspectRatio:h,width:t.maxWidth||Infinity,height:t.maxHeight||Infinity}),f=j({aspectRatio:h,width:t.minWidth||0,height:t.minHeight||0},"cover"),m=j({aspectRatio:h,width:t.width||(l!==1?i.width:s),height:t.height||(l!==1?i.height:p)}),g=m.width,D=m.height;g=Math.min(c.width,Math.max(f.width,g)),D=Math.min(c.height,Math.max(f.height,D));var v=document.createElement("canvas"),C=v.getContext("2d");v.width=et(g),v.height=et(D),C.fillStyle=t.fillColor||"transparent",C.fillRect(0,0,g,D);var A=t.imageSmoothingEnabled,T=A===void 0?!0:A,z=t.imageSmoothingQuality;C.imageSmoothingEnabled=T,z&&(C.imageSmoothingQuality=z);var L=i.width,d=i.height,w=r,O=n,_,H,Q,Z,V,X;w<=-s||w>L?(w=0,_=0,Q=0,V=0):w<=0?(Q=-w,w=0,_=Math.min(L,s+w),V=_):w<=L&&(Q=0,_=Math.min(s,L-w),V=_),_<=0||O<=-p||O>d?(O=0,H=0,Z=0,X=0):O<=0?(Z=-O,O=0,H=Math.min(d,p+O),X=H):O<=d&&(Z=0,H=Math.min(p,d-O),X=H);var I=[w,O,_,H];if(V>0&&X>0){var K=g/s;I.push(Q*K,Z*K,V*K,X*K)}return C.drawImage.apply(C,[i].concat(Xt(I.map(function(mt){return Math.floor(et(mt))})))),v},setAspectRatio:function(t){var e=this.options;return!this.disabled&&!At(t)&&(e.aspectRatio=Math.max(0,t)||NaN,this.ready&&(this.initCropBox(),this.cropped&&this.renderCropBox())),this},setDragMode:function(t){var e=this.options,i=this.dragBox,o=this.face;if(this.ready&&!this.disabled){var r=t===Et,n=e.movable&&t===Vt;t=r||n?t:$t,e.dragMode=t,lt(i,ct,t),at(i,xt,r),at(i,Dt,n),e.cropBoxMovable||(lt(o,ct,t),at(o,xt,r),at(o,Dt,n))}return this}},ne=P.Cropper,pi=function(){function a(t){var e=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};if($(this,a),!t||!Ii.test(t.tagName))throw new Error("The first argument is required and must be an <img> or <canvas> element.");this.element=t,this.options=x({},ai,it(e)&&e),this.cropped=!1,this.disabled=!1,this.pointers={},this.ready=!1,this.reloading=!1,this.replaced=!1,this.sized=!1,this.sizing=!1,this.init()}return bi(a,[{key:"init",value:function(){var e=this.element,i=e.tagName.toLowerCase(),o;if(!e[y]){if(e[y]=this,i==="img"){if(this.isImg=!0,o=e.getAttribute("src")||"",this.originalUrl=o,!o)return;o=e.src}else i==="canvas"&&window.HTMLCanvasElement&&(o=e.toDataURL());this.load(o)}}},{key:"load",value:function(e){var i=this;if(!!e){this.url=e,this.imageData={};var o=this.element,r=this.options;if(!r.rotatable&&!r.scalable&&(r.checkOrientation=!1),!r.checkOrientation||!window.ArrayBuffer){this.clone();return}if(Ri.test(e)){Si.test(e)?this.read(Fi(e)):this.clone();return}var n=new XMLHttpRequest,s=this.clone.bind(this);this.reloading=!0,this.xhr=n,n.onabort=s,n.onerror=s,n.ontimeout=s,n.onprogress=function(){n.getResponseHeader("content-type")!==ti&&n.abort()},n.onload=function(){i.read(n.response)},n.onloadend=function(){i.reloading=!1,i.xhr=null},r.checkCrossOrigin&&ci(e)&&o.crossOrigin&&(e=li(e)),n.open("GET",e,!0),n.responseType="arraybuffer",n.withCredentials=o.crossOrigin==="use-credentials",n.send()}}},{key:"read",value:function(e){var i=this.options,o=this.imageData,r=Zi(e),n=0,s=1,p=1;if(r>1){this.url=Qi(e,ti);var l=Ki(r);n=l.rotate,s=l.scaleX,p=l.scaleY}i.rotatable&&(o.rotate=n),i.scalable&&(o.scaleX=s,o.scaleY=p),this.clone()}},{key:"clone",value:function(){var e=this.element,i=this.url,o=e.crossOrigin,r=i;this.options.checkCrossOrigin&&ci(i)&&(o||(o="anonymous"),r=li(i)),this.crossOrigin=o,this.crossOriginUrl=r;var n=document.createElement("img");o&&(n.crossOrigin=o),n.src=r||i,n.alt=e.alt||"The image to crop",this.image=n,n.onload=this.start.bind(this),n.onerror=this.stop.bind(this),N(n,jt),e.parentNode.insertBefore(n,e.nextSibling)}},{key:"start",value:function(){var e=this,i=this.image;i.onload=null,i.onerror=null,this.sizing=!0;var o=P.navigator&&/(?:iPad|iPhone|iPod).*?AppleWebKit/i.test(P.navigator.userAgent),r=function(l,h){x(e.imageData,{naturalWidth:l,naturalHeight:h,aspectRatio:l/h}),e.initialImageData=x({},e.imageData),e.sizing=!1,e.sized=!0,e.build()};if(i.naturalWidth&&!o){r(i.naturalWidth,i.naturalHeight);return}var n=document.createElement("img"),s=document.body||document.documentElement;this.sizingImage=n,n.onload=function(){r(n.width,n.height),o||s.removeChild(n)},n.src=i.src,o||(n.style.cssText="left:0;max-height:none!important;max-width:none!important;min-height:0!important;min-width:0!important;opacity:0;position:absolute;top:0;z-index:-1;",s.appendChild(n))}},{key:"stop",value:function(){var e=this.image;e.onload=null,e.onerror=null,e.parentNode.removeChild(e),this.image=null}},{key:"build",value:function(){if(!(!this.sized||this.ready)){var e=this.element,i=this.options,o=this.image,r=e.parentNode,n=document.createElement("div");n.innerHTML=Li;var s=n.querySelector(".".concat(y,"-container")),p=s.querySelector(".".concat(y,"-canvas")),l=s.querySelector(".".concat(y,"-drag-box")),h=s.querySelector(".".concat(y,"-crop-box")),c=h.querySelector(".".concat(y,"-face"));this.container=r,this.cropper=s,this.canvas=p,this.dragBox=l,this.cropBox=h,this.viewBox=s.querySelector(".".concat(y,"-view-box")),this.face=c,p.appendChild(o),N(e,R),r.insertBefore(s,e.nextSibling),Y(o,jt),this.initPreview(),this.bind(),i.initialAspectRatio=Math.max(0,i.initialAspectRatio)||NaN,i.aspectRatio=Math.max(0,i.aspectRatio)||NaN,i.viewMode=Math.max(0,Math.min(3,Math.round(i.viewMode)))||0,N(h,R),i.guides||N(h.getElementsByClassName("".concat(y,"-dashed")),R),i.center||N(h.getElementsByClassName("".concat(y,"-center")),R),i.background&&N(s,"".concat(y,"-bg")),i.highlight||N(c,Ti),i.cropBoxMovable&&(N(c,Dt),lt(c,ct,yt)),i.cropBoxResizable||(N(h.getElementsByClassName("".concat(y,"-line")),R),N(h.getElementsByClassName("".concat(y,"-point")),R)),this.render(),this.ready=!0,this.setDragMode(i.dragMode),i.autoCrop&&this.crop(),this.setData(i.data),S(i.ready)&&B(e,Zt,i.ready,{once:!0}),rt(e,Zt)}}},{key:"unbuild",value:function(){if(!!this.ready){this.ready=!1,this.unbind(),this.resetPreview();var e=this.cropper.parentNode;e&&e.removeChild(this.cropper),Y(this.element,R)}}},{key:"uncreate",value:function(){this.ready?(this.unbuild(),this.ready=!1,this.cropped=!1):this.sizing?(this.sizingImage.onload=null,this.sizing=!1,this.sized=!1):this.reloading?(this.xhr.onabort=null,this.xhr.abort()):this.image&&this.stop()}}],[{key:"noConflict",value:function(){return window.Cropper=ne,a}},{key:"setDefaults",value:function(e){x(ai,it(e)&&e)}}]),a}();return x(pi.prototype,Ji,te,ie,ee,ae,re),pi})});var wi=me(vi());document.addEventListener("alpine:init",()=>{Alpine.data("curation",b=>({statePath:b.statePath,filename:b.filename,filetype:b.filetype,cropper:null,init(){this.destroy(),this.initCropper()},destroy(){this.cropper!=null&&(this.cropper.destroy(),this.cropper=null)},async initCropper(){this.cropper=new wi.default(this.$refs.cropper,{})},saveCuration(){let E=this.cropper.getData(!0);this.$wire.saveCuration(E)}}))});})();
/*!
 * Cropper.js v1.5.13
 * https://fengyuanchen.github.io/cropperjs
 *
 * Copyright 2015-present Chen Fengyuan
 * Released under the MIT license
 *
 * Date: 2022-11-20T05:30:46.114Z
 */
