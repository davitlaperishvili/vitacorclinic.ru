import{c as f,a as d}from"./vue-router.B1TtE6Mo.js";import{c as y,k as _,l as w}from"./links.BtZm82fD.js";import{a as h}from"./allowed.BpIEUKoe.js";const c=(n,r,t)=>{const e=r[t];return e?()=>{const a=c(n,r,t+1);e({...n,next:a})}:n.next},v=(n,r)=>{const t=f({history:d(`wp-admin/admin.php?page=aioseo-${window.aioseo.page}`),routes:n,scrollBehavior(e,a,o){return o||(e.hash?{selector:e.hash}:{left:0,top:0})}});return t.beforeEach((e,a,o)=>{const s=y(),l=_();s.loaded||w(r),s.ping();const m=e.meta.access;if(!h(m))return e.meta.home!==a.name?t.replace({name:e.meta.home}):null;if(e.meta.middleware){const i=Array.isArray(e.meta.middleware)?e.meta.middleware:[e.meta.middleware],u={app:r,from:a,next:o,router:t,to:e},p=c(u,i,1);return i[0]({...u,next:p})}return l.resetPageNumbers(),o()}),t},R=(n,r,t)=>{const e=n[r];return e?typeof e=="function"?e():Promise.resolve(e):new Promise((a,o)=>{(typeof queueMicrotask=="function"?queueMicrotask:setTimeout)(o.bind(null,new Error("Unknown variable dynamic import: "+r+(r.split("/").length!==t?". Note that variables only represent file names one level deep.":""))))})};export{R as _,v as s};
