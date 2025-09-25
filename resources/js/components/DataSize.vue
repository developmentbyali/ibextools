<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your Number</h4>
                </div>
            </div>
            <div class="mb-4 text-center buttonWrappers mt-0 mt-2">
                <button class="btn btn-primary " @click="datasize()">Run Minify</button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- Two-way Data-Binding -->
                    <codemirror class="editablediv mt-3" v-model="d_text" :options="cmOptions1" />
                </div>
                <div class="col-md-6">
                            <div class="row pt-5">
                                    <div class="col-md-12  mb-2">
                                        <label for="kb">Kb</label>
                                        <input type="text" class="form-control" v-model="contentResult" >
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="mb">Mb</label>
                                        <input type="text" class="form-control" v-model="resultmb"  >
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="gb">Gb</label>
                                        <input type="text" class="form-control" v-model="resultgb">
                                    </div>
                            </div>
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
                result:'',
                resultmb:'',
                resultgb:'',
                d_visible:true,
                d_text:'',
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
            mixpanel.track("Load:DataSize Converter",);
        },

        methods: {
           datasize(){
               mixpanel.track("Use:DataSize Converter datasize",);
               let binaryNumber=this.d_text
               let i = Math.floor(Math.log(this.d_text) / Math.log(1024)),
               sizes = ['B', 'KB', 'MB', 'GB'];
               let final=(this.d_text / Math.pow(1024, i)).toFixed(2) * 1 + ' ' + sizes[i];
               if(binaryNumber==''){
                   this.$alertify.error('Please enter a Number');
               }
               if(final.includes("KB")){
                   this.contentResult = final;
               }
               if(final.includes("MB")){
                   this.resultmb = final;
               }
               if(final.includes("GB")){
                   this.resultgb = final;
               }

           }
        }
    }
</script>
