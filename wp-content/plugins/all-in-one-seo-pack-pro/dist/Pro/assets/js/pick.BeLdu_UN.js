import{b as c,h as p}from"./_basePickBy.C2EKNIbO.js";import{a as m}from"./_getTag.BDw1xlYp.js";import{S as i,b as _,e as g,u as b,w as y}from"./helpers.DWk2T5bC.js";var u=i?i.isConcatSpreadable:void 0;function h(n){return _(n)||g(n)||!!(u&&n&&n[u])}function l(n,t,o,a,r){var e=-1,f=n.length;for(o||(o=h),r||(r=[]);++e<f;){var s=n[e];t>0&&o(s)?t>1?l(s,t-1,o,a,r):m(r,s):r[r.length]=s}return r}function d(n){var t=n==null?0:n.length;return t?l(n,1):[]}function x(n){return b(y(n,void 0,d),n+"")}function R(n){return n===void 0}function A(n,t){return c(n,t,function(o,a){return p(n,a)})}var w=x(function(n,t){return n==null?{}:A(n,t)});export{x as a,l as b,d as f,R as i,w as p};
