import{S as o}from"./LogoGear.BbumEdXr.js";import{_ as n}from"./_plugin-vue_export-helper.BN1snXvA.js";import{v as r,o as i,c as a,a as t,B as c}from"./runtime-dom.esm-bundler.tPRhSV4q.js";import{f as p,c as g}from"./links.BtZm82fD.js";const $={components:{SvgAioseoLogoGear:o},data(){return{strings:{boldText:this.$t.sprintf("<strong>%1$s %2$s</strong>","AIOSEO",this.$isPro?"Pro":""),linkText:this.$t.__("Click here to learn more",this.$td)}}},computed:{link(){return this.$t.sprintf('<strong><a href="%1$s" target="_blank" class="text-white">%2$s</a></strong>',this.$links.getDocUrl("restApi"),this.strings.linkText)},upgradeText(){return this.$t.sprintf(this.$t.__("%1$s relies on the WordPress Rest API and your site might have it disabled. %2$s.",this.$td),this.strings.boldText,this.link)}},mounted(){document.body.classList.add("aioseo-has-bar")},beforeUnmount(){document.body.classList.remove("aioseo-has-bar")}},m={class:"aioseo-api-bar"},f={class:"upgrade-text"},x=["innerHTML"];function k(l,u,d,_,h,s){const e=r("svg-aioseo-logo-gear");return i(),a("div",m,[t("div",f,[c(e),t("div",{innerHTML:s.upgradeText},null,8,x)])])}const B=n($,[["render",k]]),b={setup(){return{licenseStore:p(),rootStore:g()}},components:{SvgAioseoLogoGear:o},data(){return{strings:{boldText:this.$t.sprintf("<strong>%1$s %2$s</strong>","All in One SEO","Pro"),linkText:this.$t.__("license key now",this.$tdPro),renewLinkText:this.$t.__("Renew your license now",this.$tdPro)}}},computed:{link(){return this.$t.sprintf('<strong><a href="%1$s" class="text-white">%2$s</a></strong>',this.rootStore.aioseo.data.isNetworkAdmin?this.rootStore.aioseo.urls.aio.networkSettings:this.rootStore.aioseo.urls.aio.settings,this.strings.linkText)},renewLink(){return this.$t.sprintf('<strong><a href="%1$s" class="text-white" target="_blank">%2$s</a></strong>',this.$links.utmUrl("expired-license-key-bar","","https://aioseo.com/account/downloads/"),this.strings.renewLinkText)},upgradeText(){return this.licenseStore.license.isExpired?this.$t.sprintf(this.$t.__("You're using %1$s but your license has expired. %2$s.",this.$tdPro),this.strings.boldText,this.renewLink):this.$t.sprintf(this.$t.__("You're using %1$s but no license key has been entered. Add your %2$s.",this.$tdPro),this.strings.boldText,this.link)}},mounted(){document.body.classList.add("aioseo-has-bar")},beforeUnmount(){document.body.classList.remove("aioseo-has-bar")}},y={class:"aioseo-license-key-bar"},T={class:"upgrade-text"},L=["innerHTML"];function v(l,u,d,_,h,s){const e=r("svg-aioseo-logo-gear");return i(),a("div",y,[t("div",T,[c(e),t("div",{innerHTML:s.upgradeText},null,8,L)])])}const C=n(b,[["render",v]]);export{B as C,C as a};
