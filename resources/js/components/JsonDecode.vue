<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your Encoded Json</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <!-- Two-way Data-Binding -->
                    <codemirror class="editablediv mt-3" v-model="string_text" :options="cmOptions1" />
                    <button class="btn btn-primary minifyButton" @click="jsonDecode()">Run Minify</button>
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
            mixpanel.track("Load:Json Decode",);
        },

        methods: {
            jsonDecode(){
                mixpanel.track("Use:Json Decode jsonDecode",);
                const raw = (this.string_text || '').toString().trim();

                if (raw === '') {
                    this.$alertify.error('JSON text is empty');
                    this.string_visible = false;
                    return;
                }

                const tryParse = (s) => {
                    try {
                        return JSON.parse(s);
                    } catch (e) {
                        return null;
                    }
                };

                // 1) try as-is
                let parsed = tryParse(raw);

                // 2) try decodeURIComponent then parse
                if (parsed === null) {
                    try {
                        const dec = decodeURIComponent(raw);
                        parsed = tryParse(dec);
                    } catch (e) {
                        // ignore decodeURIComponent errors
                        parsed = parsed;
                    }
                }

                // 3) try base64 (atob) then parse
                if (parsed === null && typeof atob === 'function') {
                    try {
                        const b = atob(raw);
                        parsed = tryParse(b);
                    } catch (e) {
                        parsed = parsed;
                    }
                }

                // 4) as a last resort, try to repair unquoted keys (best-effort)
                if (parsed === null) {
                    try {
                        const repaired = raw.replace(/([\{,\s])(\w+)\s*:/g, '$1"$2":');
                        parsed = tryParse(repaired);
                    } catch (e) {
                        parsed = null;
                    }
                }

                if (parsed === null) {
                    this.$alertify.error('Unable to decode JSON. Ensure it is valid JSON or try URL/base64 decoded input.');
                    this.string_visible = false;
                    return;
                }

                // Success: pretty-print the result
                try {
                    this.contentResult = JSON.stringify(parsed, null, 2);
                    this.string_visible = true;
                } catch (e) {
                    this.$alertify.error('Failed to stringify decoded JSON');
                    this.string_visible = false;
                }
            },
        }
    }
</script>
