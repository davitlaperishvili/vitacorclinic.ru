import{H as o,r as i,I as P,f as A,a as d,J as k,b as T,K as s,l as O,L as c}from"./helpers.DWk2T5bC.js";var l=o(i,"WeakMap"),x=P(Object.keys,Object),M=Object.prototype,j=M.hasOwnProperty;function C(r){if(!A(r))return x(r);var e=[];for(var t in Object(r))j.call(r,t)&&t!="constructor"&&e.push(t);return e}function K(r){return d(r)?k(r):C(r)}function L(r,e){for(var t=-1,n=e.length,u=r.length;++t<n;)r[u+t]=e[t];return r}function V(r,e){for(var t=-1,n=r==null?0:r.length,u=0,y=[];++t<n;){var v=r[t];e(v,t,r)&&(y[u++]=v)}return y}function I(){return[]}var W=Object.prototype,D=W.propertyIsEnumerable,m=Object.getOwnPropertySymbols,G=m?function(r){return r==null?[]:(r=Object(r),V(m(r),function(e){return D.call(r,e)}))}:I;function E(r,e,t){var n=e(r);return T(r)?n:L(n,t(r))}function U(r){return E(r,K,G)}var p=o(i,"DataView"),f=o(i,"Promise"),g=o(i,"Set"),w="[object Map]",$="[object Object]",b="[object Promise]",S="[object Set]",h="[object WeakMap]",_="[object DataView]",B=s(p),F=s(c),H=s(f),J=s(g),N=s(l),a=O;(p&&a(new p(new ArrayBuffer(1)))!=_||c&&a(new c)!=w||f&&a(f.resolve())!=b||g&&a(new g)!=S||l&&a(new l)!=h)&&(a=function(r){var e=O(r),t=e==$?r.constructor:void 0,n=t?s(t):"";if(n)switch(n){case B:return _;case F:return w;case H:return b;case J:return S;case N:return h}return e});export{g as S,l as W,L as a,C as b,G as c,E as d,U as e,V as f,a as g,K as k,I as s};