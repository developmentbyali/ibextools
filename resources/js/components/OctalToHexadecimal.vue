<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your Octal Code</h4>
                </div>
            </div>
            <div class="text-center  mb-3">
                <button class="mb-0 btn btn-primary minifyButton" @click="octaltohexadecimal()">Run Minify</button>
                <label class="text-lg-center text-md-center mdLabel text-success font-weight-bold text-right wrpper-inner-text mx-auto pl-5 pr-5"  v-if="clickMsg">{{clickMsg}}</label>
                <button v-if="contentResult" v-clipboard="contentResult" @click="copyToClipboard" id="copytoClipboard" class="btn btn-success" type="button">Copy Output</button>

            </div>
            <div class="row">
                    <!-- Two-way Data-Binding -->
                    <div class="col-md-6">
                        <codemirror class="editablediv" v-model="octal_text" :options="cmOptions1" />
                    </div>

                    <div class="col-md-6">
                        <codemirror v-if="octal_visible" class="editablediv" v-model="contentResult"
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
    import VueAlertify from 'vue-alertify';
    import 'codemirror/theme/mbo.css';
    import 'codemirror/theme/rubyblue.css';
      Vue.use(VueAlertify);
    // import base style
    import 'codemirror/lib/codemirror.css'
    export default {
        components: {
            codemirror
        },
        data() {
            return {
                content: '',
                contentResult: '',
                clickMsg:'',
                octal_visible:true,
                octal_text:'',
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
            mixpanel.track("Load:Octal To Hexadecimal",);
        },
        methods: {
            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);

            },

           octaltohexadecimal(){
              mixpanel.track("Use:Octal To Hexadecimal octaltohexadecimal",);
              let octal = (this.octal_text || '').toString().trim();

              if (octal === '') {
                  this.$alertify.error('Field is empty');
                  this.octal_visible = false;
                  return;
              }

              if (!/^[0-7]+$/.test(octal)) {
                  this.$alertify.error('Invalid octal number: only digits 0-7 are allowed');
                  this.octal_visible = false;
                  return;
              }

              try {
                  const n = BigInt('0o' + octal);
                  this.contentResult = n.toString(16).toUpperCase();
                  this.octal_visible = true;
              } catch (e) {
                  const num = parseInt(octal, 8);
                  if (isNaN(num)) {
                      this.$alertify.error('Conversion failed');
                      this.octal_visible = false;
                      return;
                  }
                  this.contentResult = num.toString(16).toUpperCase();
                  this.octal_visible = true;
              }

            },
        }
    }
</script>
