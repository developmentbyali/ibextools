<template>
        <div class="row">
            <div class="col-12 pt-4 pb-4">
                <div class="row">
                    <div class="col ">
                        Add<h4 class="text-left pb-2 b-color-primary result-title"> your new Tool</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" v-model="fields.title" >
                                <div v-if="errors && errors.title" class="text-danger">{{ errors.title[0] }}</div>
                            </div>
                            <div class="form-group">
                                <label for="des">Description</label>
                                <input type="text" class="form-control" id="des" v-model="fields.des" >
                                <div v-if="errors && errors.des" class="text-danger">{{ errors.des[0] }}</div>
                            </div>
                            <div class="form-group">
                                <label for="keywords">Keywords</label>
                                <input type="text" class="form-control" id="keywords" v-model="fields.keywords" >
                                <div v-if="errors && errors.keywords" class="text-danger">{{ errors.keywords[0] }}</div>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <input type="text" class="form-control" id="content" v-model="fields.content" >
                                <div v-if="errors && errors.content" class="text-danger">{{ errors.content[0] }}</div>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" class="form-control" id="category" v-model="fields.category" >
                                <div v-if="errors && errors.category" class="text-danger">{{ errors.category[0] }}</div>
                            </div>
                            <div class="form-group">
                                <label for="subcategory">Sub Category</label>
                                <input type="text" class="form-control" id="subcategory" v-model="fields.subcategory" >
                                <div v-if="errors && errors.subcategory" class="text-danger">{{ errors.subcategory[0] }}</div>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" v-model="fields.slug" >
                                <div v-if="errors && errors.slug" class="text-danger">{{ errors.slug[0] }}</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Tool</button>
                            <div v-if="success" class="alert alert-success mt-3">
                                Message sent!
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        data() {
            return {
                fields: {},
                errors: {},
                success: false,
                loaded: true,
                action: '',
            }
        },
        mounted: function(){
            console.log('Add tool Component Loaded...');
        },

        methods: {

            submit() {
                if (this.loaded) {
                    this.loaded = false;
                    this.success = false;
                    this.errors = {};
                    axios.post(this.action, this.fields).then(response => {
                        this.fields = {};
                        this.loaded = true;
                        this.success = true;
                    }).catch(error => {
                        this.loaded = true;
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        }
                    });
                }
            },

        },
    }
</script>
