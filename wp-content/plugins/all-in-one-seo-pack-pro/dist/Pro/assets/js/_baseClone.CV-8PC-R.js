import{D as y,k as w,S as $,j as F,E as b,F as E,i as D,G as P,c as G,B as N,b as R,y as K}from"./helpers.DWk2T5bC.js";import{a as W}from"./_arrayEach.Fgt6pfHj.js";import{k as x,c as Y,g as p,e as V}from"./_getTag.BDw1xlYp.js";import{V as B,W as X,X as q,Y as H}from"./links.BtZm82fD.js";import{a as J,g as Q}from"./_getAllKeysIn.fN8NwDhg.js";function Z(r,t){return r&&y(t,x(t),r)}function v(r,t){return r&&y(t,w(t),r)}function z(r,t){return y(r,Y(r),t)}function k(r,t){return y(r,J(r),t)}var rr=Object.prototype,tr=rr.hasOwnProperty;function er(r){var t=r.length,a=new r.constructor(t);return t&&typeof r[0]=="string"&&tr.call(r,"index")&&(a.index=r.index,a.input=r.input),a}function nr(r,t){var a=t?B(r.buffer):r.buffer;return new r.constructor(a,r.byteOffset,r.byteLength)}var ar=/\w*$/;function or(r){var t=new r.constructor(r.source,ar.exec(r));return t.lastIndex=r.lastIndex,t}var S=$?$.prototype:void 0,_=S?S.valueOf:void 0;function cr(r){return _?Object(_.call(r)):{}}var sr="[object Boolean]",ir="[object Date]",fr="[object Map]",gr="[object Number]",ur="[object RegExp]",br="[object Set]",yr="[object String]",lr="[object Symbol]",pr="[object ArrayBuffer]",Tr="[object DataView]",jr="[object Float32Array]",Ar="[object Float64Array]",mr="[object Int8Array]",dr="[object Int16Array]",$r="[object Int32Array]",Sr="[object Uint8Array]",_r="[object Uint8ClampedArray]",Ir="[object Uint16Array]",Or="[object Uint32Array]";function wr(r,t,a){var f=r.constructor;switch(t){case pr:return B(r);case sr:case ir:return new f(+r);case Tr:return nr(r,a);case jr:case Ar:case mr:case dr:case $r:case Sr:case _r:case Ir:case Or:return X(r,a);case fr:return new f;case gr:case yr:return new f(r);case ur:return or(r);case br:return new f;case lr:return cr(r)}}var Fr="[object Map]";function Er(r){return F(r)&&p(r)==Fr}var I=b&&b.isMap,xr=I?E(I):Er,Br="[object Set]";function Cr(r){return F(r)&&p(r)==Br}var O=b&&b.isSet,Lr=O?E(O):Cr,Ur=1,Mr=2,hr=4,C="[object Arguments]",Dr="[object Array]",Pr="[object Boolean]",Gr="[object Date]",Nr="[object Error]",L="[object Function]",Rr="[object GeneratorFunction]",Kr="[object Map]",Wr="[object Number]",U="[object Object]",Yr="[object RegExp]",Vr="[object Set]",Xr="[object String]",qr="[object Symbol]",Hr="[object WeakMap]",Jr="[object ArrayBuffer]",Qr="[object DataView]",Zr="[object Float32Array]",vr="[object Float64Array]",zr="[object Int8Array]",kr="[object Int16Array]",rt="[object Int32Array]",tt="[object Uint8Array]",et="[object Uint8ClampedArray]",nt="[object Uint16Array]",at="[object Uint32Array]",e={};e[C]=e[Dr]=e[Jr]=e[Qr]=e[Pr]=e[Gr]=e[Zr]=e[vr]=e[zr]=e[kr]=e[rt]=e[Kr]=e[Wr]=e[U]=e[Yr]=e[Vr]=e[Xr]=e[qr]=e[tt]=e[et]=e[nt]=e[at]=!0;e[Nr]=e[L]=e[Hr]=!1;function l(r,t,a,f,T,c){var n,g=t&Ur,u=t&Mr,M=t&hr;if(n!==void 0)return n;if(!D(r))return r;var j=R(r);if(j){if(n=er(r),!g)return P(r,n)}else{var i=p(r),A=i==L||i==Rr;if(G(r))return q(r,g);if(i==U||i==C||A&&!T){if(n=u||A?{}:H(r),!g)return u?k(r,v(n,r)):z(r,Z(n,r))}else{if(!e[i])return T?r:{};n=wr(r,i,g)}}c||(c=new N);var m=c.get(r);if(m)return m;c.set(r,n),Lr(r)?r.forEach(function(o){n.add(l(o,t,a,o,r,c))}):xr(r)&&r.forEach(function(o,s){n.set(s,l(o,t,a,s,r,c))});var h=M?u?Q:V:u?w:x,d=j?void 0:h(r);return W(d||r,function(o,s){d&&(s=o,o=r[s]),K(n,s,l(o,t,a,s,r,c))}),n}export{l as b};