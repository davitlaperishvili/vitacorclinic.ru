import{v as e,o as m,c as p,B as a,a as k,E as r,b as f,V as _}from"./js/runtime-dom.esm-bundler.tPRhSV4q.js";import{l as h}from"./js/index.D9rFM2Zx.js";import{l as L}from"./js/index.Dbgw3oZ8.js";import{l as S}from"./js/index.3BJ3ZnWB.js";import{f as g,a as w,c as A,l as y}from"./js/links.BtZm82fD.js";import{e as v}from"./js/elemLoaded.COgXIo-H.js";import{a as C}from"./js/addons.BL-b166P.js";import{u as F}from"./js/url.B28X8G0X.js";import{S as E}from"./js/Information.Bv8uKEyF.js";import{S as V}from"./js/Caret.Ke5gylGO.js";import{_ as x}from"./js/_plugin-vue_export-helper.BN1snXvA.js";import"./js/default-i18n.DXRQgkn2.js";import"./js/constants.CPpKID74.js";import"./js/helpers.DWk2T5bC.js";import"./js/upperFirst.7wc0xztY.js";import"./js/_stringToArray.DnK4tKcY.js";import"./js/toString.Cp__a8QI.js";const P={setup(){return{licenseStore:g(),postEditorStore:w(),rootStore:A()}},components:{SvgCircleInformation:E,SvgClose:V},data(){return{linkFormatValue:{},disabled:!1,url:null,strings:{upsell:this.$t.sprintf(this.$t.__("Did you know you can automatically add internal links using Link Assistant? %1$s",this.$td),this.$links.getPlainLink(this.$constants.GLOBAL_STRINGS.learnMore,this.rootStore.aioseo.urls.aio.linkAssistant,!0))}}},computed:{canShowUpsell(){const t=C.getAddon("aioseo-link-assistant"),{options:o}=this.postEditorStore.currentPost,i=o.linkFormat.internalLinkCount,n=o.linkFormat.linkAssistantDismissed;return(this.licenseStore.isUnlicensed||!t||!t.isActive||t.requiresUpgrade)&&2<i&&!n&&!this.disabled&&this.linkFormatValue.url&&this.isInternalLink(this.linkFormatValue.url)}},methods:{async linkAdded(t){var s;await this.$nextTick();const{options:o}=this.postEditorStore.currentPost,i=o.linkFormat.internalLinkCount,n=o.linkFormat.linkAssistantDismissed;2<i||n||this.isInternalLink(t.url||((s=t.suggestion)==null?void 0:s.url)||null)&&this.postEditorStore.incrementInternalLinkCount()},async setLinkFormatValue(){await this.$nextTick();const t=document.querySelector("#aioseo-link-assistant-education input");!this.linkFormatValue.url&&(t!=null&&t.value)&&(this.linkFormatValue=JSON.parse(t.value))},isInternalLink(t){const o=F.parse(t,!1,!0);return t.indexOf("//")===-1&&t.indexOf("/")===0?!0:t.indexOf("#")===0?!1:o.host?o.host===this.rootStore.aioseo.urls.domain:!0}},created(){this.setLinkFormatValue();const{addAction:t,hasAction:o}=window.wp.hooks;o("aioseo-link-format-link-added","aioseo")||t("aioseo-link-format-link-added","aioseo",this.linkAdded)}},D={key:0,class:"aioseo-link-assistant-did-you-know"},I=["innerHTML"];function B(t,o,i,n,s,u){const c=e("svg-circle-information"),d=e("svg-close");return u.canShowUpsell?(m(),p("div",D,[a(c),k("span",{onClick:o[0]||(o[0]=r(U=>s.disabled=!0,["stop"])),innerHTML:s.strings.upsell},null,8,I),a(d,{onClick:r(n.postEditorStore.disableLinkAssistantEducation,["stop"])},null,8,["onClick"])])):f("",!0)}const N=x(P,[["render",B]]),l=()=>{let t=_({...N,name:"Standalone/LinkFormat"});t=h(t),t=L(t),t=S(t),y(t),t.mount("#aioseo-link-assistant-education-mount")};window.aioseo&&window.aioseo.currentPost&&window.aioseo.currentPost.context==="post"&&(document.getElementById("aioseo-link-assistant-education")?l():(v("#aioseo-link-assistant-education","aioseoLaDidYouKnow"),document.addEventListener("animationstart",function(o){o.animationName==="aioseoLaDidYouKnow"&&l()},{passive:!0})));