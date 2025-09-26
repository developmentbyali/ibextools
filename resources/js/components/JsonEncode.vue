<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your Json</h4>
                </div>
            </div>
            <div class="text-center mb-3">
                <button class="mb-0  btn btn-primary minifyButton" @click="jsonEncode()">Run Minify</button>
                <label class="text-lg-center text-md-center mdLabel text-success font-weight-bold text-right wrpper-inner-text mx-auto pl-5 pr-5"  v-if="clickMsg">{{clickMsg}}</label>
                <button v-if="contentResult" v-clipboard="contentResult" @click="copyToClipboard" id="copytoClipboard" class="btn btn-success" type="button">Copy Output</button>

            </div>
            <div class="row">
                    <!-- Two-way Data-Binding -->
                    <div class="col-md-6">
                        <codemirror class="editablediv" v-model="string_text" :options="cmOptions1" />
                    </div>

                    <div class="col-md-6">
                        <codemirror v-if="string_visible" class="editablediv" v-model="contentResult"
                                    ref="cmEditor"
                                    :options="cmOptions"
                        />
                    </div>
            </div>
        </div>

    </div>


</template>

<script>

    import { codemirror } from 'vue-codemirror'
    // import base style
    import 'codemirror/lib/codemirror.css'
    import 'codemirror/theme/mbo.css';
    import 'codemirror/theme/rubyblue.css';
    import VueAlertify from 'vue-alertify'
    Vue.use(VueAlertify);
    export default {
        components: {
            codemirror
        },
        data() {
            return {
                content: '',
                contentResult: '',
                clickMsg:'',
                string_visible:true,
                string_text:'',
                cmOptions1: {
                    tabSize: 4,
                    mode: 'js',
                    theme: 'mbo',
                    lineNumbers: true,
                    line: true,
                },
                cmOptions: {
                    tabSize: 4,
                    mode: 'js',
                    theme: 'rubyblue',
                    lineNumbers: true,
                    line: true,
                }
            };
        },
        computed: {
            codemirror() {
                //  this.callBeautify();
                //   return this.$refs.cmEditor.codemirror
            }
        },
        mounted() {
            mixpanel.track("Load:Json Encode",);
        },

        methods: {
            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);

            },

            jsonEncode(){
                mixpanel.track("Use:Json Encode jsonEncode",);
                const raw = (this.string_text || '').toString().trim();

                if (raw === '') {
                    this.$alertify.error('JSON text is empty');
                    this.string_visible = false;
                    return;
                }

                // Ensure we have a canonical JSON string if input is valid JSON
                let jsonString = raw;
                try {
                    const parsed = JSON.parse(raw);
                    // Minify to canonical form
                    jsonString = JSON.stringify(parsed);
                } catch (e) {
                    // input isn't valid JSON; we'll encode the raw string
                    jsonString = raw;
                }

                // Base64 encode: prefer browser btoa, fall back to Buffer for Node
                let encoded = '';
                try {
                    if (typeof btoa === 'function') {
                        encoded = btoa(jsonString);
                    } else if (typeof Buffer !== 'undefined') {
                        encoded = Buffer.from(jsonString, 'utf8').toString('base64');
                    } else {
                        throw new Error('No base64 encoder available');
                    }
                } catch (e) {
                    this.$alertify.error('Encoding failed: ' + e.message);
                    this.string_visible = false;
                    return;
                }

                this.string_visible = true;
                this.contentResult = encoded;
            },
        }
    }
</script>
