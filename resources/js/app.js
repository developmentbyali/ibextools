/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Beautify =  require('js-beautify');
window.beautify_html = require('js-beautify').html;
window.cssbeautifier =  require('js-beautify').css;
window.xmljs =  require('xml-js');
window.Vue = require('vue');
import Bugsnag from '@bugsnag/js'
import BugsnagPluginVue from '@bugsnag/plugin-vue'

import Clipboard from 'v-clipboard'
Vue.use(Clipboard)
var environment = process.env.NODE_ENV || 'production';

Bugsnag.start({
    apiKey: 'efcc64d3fa718945e81177b573144a64',
    plugins: [new BugsnagPluginVue(Vue)],
    releaseStage: environment,
    enabledBreadcrumbTypes: ['error', 'log', ,'navigation', 'request', 'user'],
    appVersion: '0.0.0.10'
})

import mixpanel from 'mixpanel-browser'
mixpanel.init("6a512435ff7945114b93565ed41d1437");
window.mixpanel = mixpanel

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('add-tool-component', require('./components/admin/AddToolComponent.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('beautify-component', require('./components/BeautifyComponent.vue').default);
Vue.component('js-beautify-component', require('./components/JsBeautifyComponent.vue').default);
Vue.component('js-minify-component', require('./components/JsMinifyComponent.vue').default);
Vue.component('css-minify-component', require('./components/CssMinifyComponent.vue').default);
Vue.component('json-to-xml-component', require('./components/JsonToXmlComponent.vue').default);
Vue.component('html-beautify-component', require('./components/HtmlBeautifyComponent.vue').default);
Vue.component('html-color-code-component', require('./components/HtmlColorCodeComponent.vue').default);
Vue.component('binary-to-decimal-component', require('./components/BinaryToDecimal.vue').default);
Vue.component('decimal-to-binary-component', require('./components/DecimalToBinary.vue').default);
Vue.component('decimal-to-octal-component', require('./components/DecimalToOctal.vue').default);
Vue.component('decimal-to-hexa-component', require('./components/DecimalToHexadecimal.vue').default);
Vue.component('octal-to-binary-component', require('./components/OctalToBinary.vue').default);
Vue.component('octal-to-decimal-component', require('./components/OctalToDecimal.vue').default);
Vue.component('octal-to-hexadecimal-component', require('./components/OctalToHexadecimal.vue').default);
Vue.component('hexadecimal-to-binary-component', require('./components/HexadecimalToBinary.vue').default);
Vue.component('hexadecimal-to-decimal-component', require('./components/HexadecimalToDecimal.vue').default);
Vue.component('hexadecimal-to-octal-component', require('./components/HexadecimalToOctal.vue').default);
Vue.component('binary-to-hexadecimal-component', require('./components/BinaryToHexadecimal.vue').default);
Vue.component('binary-to-octal-component', require('./components/BinaryToOctal.vue').default);
Vue.component('binary-to-string-component', require('./components/BinaryToString.vue').default);
Vue.component('string-to-binary-component', require('./components/StringToBinary.vue').default);
Vue.component('md5-component', require('./components/Md5Convert.vue').default);
Vue.component('sha1-component', require('./components/SHA1Convert.vue').default);
Vue.component('sha256-component', require('./components/SHA256Convert.vue').default);
Vue.component('sha512-component', require('./components/SHA512Convert.vue').default);
Vue.component('base64encode-component', require('./components/Base64Encode.vue').default);
Vue.component('base64decode-component', require('./components/Base64Decode.vue').default);
Vue.component('short-url-component', require('./components/ShortUrl.vue').default);
Vue.component('wordcount-component', require('./components/WordCounter.vue').default);
Vue.component('sql-component', require('./components/SqlFormatter.vue').default);
Vue.component('data-size-component', require('./components/DataSize.vue').default);
Vue.component('rgb-to-hex-component', require('./components/RGBToHex.vue').default);
Vue.component('xml-formatter-component', require('./components/XMLFormatter.vue').default);
Vue.component('timestamp-component', require('./components/TimeStampConverter.vue').default);
Vue.component('json-formatter-component', require('./components/JsonFormatter.vue').default);
Vue.component('url-encode-component', require('./components/URLEncode.vue').default);
Vue.component('url-decode-component', require('./components/URLDecode.vue').default);
Vue.component('json-encode-component', require('./components/JsonEncode.vue').default);
Vue.component('json-decode-component', require('./components/JsonDecode.vue').default);
Vue.component('back-link-component', require('./components/BackLink.vue').default);
Vue.component('png-converter-component', require('./components/PngConverter.vue').default);





/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
