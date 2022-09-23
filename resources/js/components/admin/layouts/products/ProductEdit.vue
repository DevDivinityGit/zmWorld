<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Product </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link :to="{name: 'home'}">Home</router-link></li>
                            <li class="breadcrumb-item"><router-link :to="{name: 'all.products'}">Products</router-link></li>
                            <li class="breadcrumb-item active">Edit </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container">
            <form @keydown="removeError($event)" @submit.prevent="submitData" enctype="multipart/form-data">

                <div class="row justify-content-center">
                    <div class="col-sm-11">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Name: </label>
                                        <input type="text" class="form-control"  :class="{'is-invalid': theErrors.name}"  v-model="form.name" id="name">
                                        <small  class="invalid-feedback" >
                                            {{theErrors.name}}.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="price">Price: </label>
                                        <input type="number" :class="{'is-invalid': theErrors.price}"  class="form-control " id="price" v-model="form.price">

                                        <small  class="invalid-feedback" >
                                            {{theErrors.price}}.
                                        </small>
                                    </div>

                                </div>


                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="quantity">Quantity: </label>
                                        <input type="number" :class="{'is-invalid': theErrors.quantity}" class="form-control " id="quantity" v-model="form.quantity">

                                        <small  class="invalid-feedback" >
                                            {{theErrors.quantity}}.
                                        </small>
                                    </div>

                                </div>




                                <div class="col-sm-12">
                                    <label for="editor" style="margin-top: 10px;">Description: </label>
                                    <br>
                                    <div class="form-group">
                                        <div  id="editor" :class="{'is-invalid': theErrors.description}" class="form-control"></div>
                                        <div class="invalid-feedback">{{theErrors.description}}</div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="image-upload">Main Image</label>

                                            <div id="image-preview"
                                                 v-if="theProductImages.main"
                                                 :style="'background: url(/uploads/images/'+theProductImages.main+') center no-repeat; width: 100%; background-size: cover;'"
                                            >
                                                <label for="image-upload" id="image-label">Change Image</label>
                                                <input  class="uploadAble" type="file" name="image" id="image-upload" ref="main" >
                                            </div>






                                            <div v-else id="image-preview">
                                                <label for="image-upload" id="image-label">Change Image</label>
                                                <input  class="uploadAble" type="file" name="image" id="image-upload" ref="main" >
                                            </div>



                                        </div>


                                    </div>

                                    <div class="row">

                                        <div class="col-sm-4">
                                            <span class="text-muted font-weight-bold">Optonal Image</span>




                                            <div id="image-preview-2"
                                                  v-if="theProductImages.one"

                                                 :style="'background: url(/uploads/images/'+theProductImages.one+') center no-repeat; width: 100%; background-size: cover;'"

                                            >
                                                <label for="image-upload" id="image-label-2">Change Image</label>
                                                <input class="uploadAble" type="file" name="image" id="image-upload-2" />
                                            </div>




                                            <div v-else id="image-preview-2">
                                                <label for="image-upload" id="image-label-2">Change Image</label>
                                                <input class="uploadAble" type="file" name="image" id="image-upload-2" />
                                            </div>



                                        </div>
                                        <div class="col-sm-4">
                                            <span class="text-muted font-weight-bold">Optonal Image</span>



                                            <div id="image-preview-3"
                                             v-if="theProductImages.two"

                                                 :style="'background: url(/uploads/images/'+theProductImages.two+') center no-repeat; width: 100%; background-size: cover;'"


                                            >
                                                <label for="image-upload" id="image-label-3">Change Image</label>
                                                <input class="uploadAble" type="file" name="image" id="image-upload-3" />
                                            </div>




                                            <div v-else id="image-preview-3">
                                                <label for="image-upload" id="image-label-3">Change Image</label>
                                                <input class="uploadAble" type="file" name="image" id="image-upload-3" />
                                            </div>




                                        </div>




                                        <div class="col-sm-4">
                                            <span class="text-muted font-weight-bold">Optonal Image</span>


                                            <div id="image-preview-4"

                                                v-if="theProductImages.three"

                                                 :style="'background: url(/uploads/images/'+theProductImages.three+') center no-repeat; width: 100%; background-size: cover;'"


                                            >
                                                <label for="image-upload" id="image-label-4">Change Image</label>
                                                <input class="uploadAble" type="file" name="image" id="image-upload-4" />
                                            </div>







                                            <div v-else id="image-preview-4">
                                                <label for="image-upload" id="image-label-4">Change Image</label>
                                                <input class="uploadAble" type="file" name="image" id="image-upload-4" />
                                            </div>





                                        </div>



                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <span class="text-muted font-weight-bold">Assign Categories</span>

                                            <div class="form-group">
                                                <select  id="mySelect2"    name="selectCat"   class="js-example-basic-multiple form-control "  multiple>
                                                    <option  :selected="category.isSelected" :value="category.id" :key="id"   v-for="(category, id) in categories">{{category.name}}</option>
                                                    ...

                                                </select>
                                                <small   v-if="theErrors.categories" style="color: #ff3140">
                                                    {{theErrors.categories}}.
                                                </small>
                                                <!--<div class="invalid-feedback">{{theErrors.categories}}</div>-->


                                            </div>


                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button  type="submit" class="btn btn-info btn-block">Update</button>
                                        </div>
                                    </div>


                                    <br>

















                                </div>



                            </div>

                        </div>
                    </div>




                </div>


            </form>
        </div>







    </div>
</template>





<script>






    export default {
        data() {
            return {
                productImages: {},
                category: null,
                form: {
                    name: '',
                    slug: '',
                    price: '',
                    quantity: '',
                    description: '',
                },
                files: [],
                errors: {},
            };
        },
        created() {

            axios({
                method: 'get',
                url: APIURL+'/api/products/'+this.$route.params.slug,
                headers: {
                    'authorization': "Bearer "+localStorage.getItem('token'),
                },
            })
                .then(res => {
                   let data = res.data.data;
                   this.form.name = data.name;
                   this.form.price = data.price;
                   this.form.quantity = data.quantity;
                    CKEDITOR.instances.editor.setData(data.description);
                    this.productImages = data.images;

                });


        },
        watch: {


        },
        computed: {
            theProductImages() {
              return this.productImages;
            },



            theErrors() {
                return this.errors;
            },

            categories() {
                return this.category;

            },
        },
        mounted() {
            CKEDITOR.replace('editor');




            $(document).ready(function() {
                $.uploadPreview({
                    input_field: "#image-upload",   // Default: .image-upload
                    preview_box: "#image-preview",  // Default: .image-preview
                    label_field: "#image-label",    // Default: .image-label
                    label_default: "Choose File",   // Default: Choose File
                    label_selected: "Change File",  // Default: Change File
                    no_label: false,                 // Default: fals




                });



                $.uploadPreview({
                    input_field: "#image-upload-2",   // Default: .image-upload
                    preview_box: "#image-preview-2",  // Default: .image-preview
                    label_field: "#image-label-2",    // Default: .image-label
                    label_default: "Choose File",   // Default: Choose File
                    label_selected: "Change File",  // Default: Change File
                    no_label: false,                 // Default: fals




                });



                $.uploadPreview({
                    input_field: "#image-upload-3",   // Default: .image-upload
                    preview_box: "#image-preview-3",  // Default: .image-preview
                    label_field: "#image-label-3",    // Default: .image-label
                    label_default: "Choose File",   // Default: Choose File
                    label_selected: "Change File",  // Default: Change File
                    no_label: false,                 // Default: fals




                });


                $.uploadPreview({
                    input_field: "#image-upload-4",   // Default: .image-upload
                    preview_box: "#image-preview-4",  // Default: .image-preview
                    label_field: "#image-label-4",    // Default: .image-label
                    label_default: "Choose File",   // Default: Choose File
                    label_selected: "Change File",  // Default: Change File
                    no_label: false,                 // Default: fals




                });





                $('.js-example-basic-multiple').select2();





























            });


            axios({
                method: 'get',
                url: APIURL+'/api/fetch-related-categories/'+this.$route.params.slug,
                headers: {
                  'authorization': "Bearer "+localStorage.getItem('token'),
                },
            })
                .then(res => {
                    this.category =  res.data;
                });





















        },
        methods: {



            removeError(ev) {
                this.errors[ev.target.id] = null;

            },







            submitData(ev) {


                let select2Error = document.getElementsByClassName('select2')[0];
                let CKEditorError = document.getElementById('cke_editor');






                const selectCat = document.getElementsByName('selectCat')[0];
                const categoriesArr = [];
                for(let i=0; i<selectCat.options.length; i++) {
                    if(selectCat.options[i].selected) {
                        categoriesArr.push(selectCat.options[i].value);
                    }
                }




                let images = document.getElementsByClassName('uploadAble');








                let formData = new FormData();


                if(images[0].files[0]) {
                    formData.append('fileMain', images[0].files[0]);

                }

                if(images[1].files[0]) {
                    formData.append('fileOne', images[1].files[0]);


                }

                if(images[2].files[0]) {
                    formData.append('fileTwo', images[2].files[0]);


                }

                if(images[3].files[0]) {
                    formData.append('fileThree', images[3].files[0]);


                }


                //GET DATA FROM CKEDITOR AND SELECT2 AND SLUG
                this.form.description = CKEDITOR.instances.editor.getData();

                this.form.slug = this.form.name.replace(/ /g, '-').toLocaleLowerCase();



                //END GETING DATA FROM CKEDITOR AND SELECT2



                //ASSIGN INPUT DATA TO FORMDATA OBJECT
                formData.append('name', this.form.name);
                formData.append('price', this.form.price);
                formData.append('quantity', this.form.quantity);
                formData.append('description', this.form.description);
                formData.append('slug', this.form.slug);
                formData.append('categories', categoriesArr);



                //END ASSIGNING DATA TO FORMdATA OBJECT








                axios({
                    method: 'post',
                    url: APIURL+'/api/products/'+this.$route.params.slug+'/update',
                    data: formData,
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'authorization': "Bearer "+localStorage.getItem('token'),

                    },



                })
                    .then(res => {





                        let that = this;



                        if(res.data.errors) {
                            this.errors = res.data.errors;


                            //    EDITOR AND SELECT2 ERRORS

                            if(this.errors.description) {


                            }

                            if(this.errors.description) {
                                let x = document.getElementsByTagName('iframe');
                                let y = document.getElementById('cke_1_contents');
                                x[0].addEventListener('mouseover', function() {
                                    CKEditorError.classList.remove('addDangerous');
                                    that.theErrors.description = null;
                                });




                                CKEditorError.classList.add('addDangerous');



                            }
                            //    END EDITOR AND SELECT2 ERRORS


                        } else if(res.data) {
                            if(res.data === 1) {
                                Vue.$toast.open('Product updated successfully');


                            }
                        }

                        if(this.theErrors.categories) {

                            select2Error.classList.add('addDangerous');
                            $('#mySelect2').on('select2:select', function (e) {
                                select2Error.classList.remove('addDangerous');
                                that.theErrors.categories = null;

                            });


                        }

                    });




















            },







        },
    }
</script>

<style scoped>

    #image-preview, #image-preview-2, #image-preview-3, #image-preview-4 {
        width: 100%;
        height: 300px;
        position: relative;
        overflow: hidden;
        background-color: #ffffff;
        color: #ecf0f1;
    }
    #image-preview input, #image-preview-2 input, #image-preview-3 input, #image-preview-4 input  {
        line-height: 200px;
        font-size: 200px;
        position: absolute;
        opacity: 0;
        z-index: 10;
    }
    #image-preview label, #image-preview-2 label, #image-preview-3 label, #image-preview-4 label {
        position: absolute;
        z-index: 5;
        opacity: 0.8;
        cursor: pointer;
        background-color: #bdc3c7;
        width: 200px;
        height: 50px;
        font-size: 20px;
        line-height: 50px;
        text-transform: uppercase;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        text-align: center;
    }
















</style>




