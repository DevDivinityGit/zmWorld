<template>
    <div>
        <h4>
            update download api links
        </h4>
        <div class="container">
            <form @submit.prevent="sendForm($event)" action="#">

                <div class="row">
                    <div class="col-sm-6">
                        <label for="name">Android Link</label>


                        <input type="text" v-model="form.android_link" id="name"  class="form-control">
                    </div>
                    <!--<div class="col-sm-6">-->
                    <!--<input type="text" placeholder="status" class="form-control">-->
                    <!--</div>-->



                    <div class="col-sm-6">
                        <label for="price">ISO Link</label>

                        <input type="text"  v-model="form.iso_link" class="form-control" id="price">
                    </div>



                    <div class="col-sm-12">
                        <label for="text">Text</label>

                        <textarea name="" id="text" cols="15"  v-model="form.text" class="form-control" rows="5"></textarea>





                    </div>















                    <!--<div class="col-sm-6">-->
                    <!--<input type="text"  placeholder="Password" class="form-control">-->
                    <!--</div>-->

                    <!--<div class="col-sm-6">-->
                    <!--<input type="file"  @change="uploadImage($event)" class="form-control">-->
                    <!--</div>-->




                    <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Update</button>
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
                form: {
                    text: '',
                    android_link: '',
                    iso_link: '',
                },
            };
        },
        created() {
          const id = this.$route.params.id;

          axios({
              method: 'get',
              url: '/api/download-api/'+id,
          }).
              then(res => {
                  this.form = res.data;

          });





        },





        methods: {
            uploadImage(e) {

                this.form.append('image', e.target.files[0]);
            },



            sendForm(e) {

                const id = this.$route.params.id;


                axios({
                    method: 'put',
                    url: '/api/download-api/'+id,
                    data: this.form,
                }).
                then(res => {




                    if(res.data === 200) {
                        this.$router.push({name: 'download_api.index'});
                    }


                });

















            },
        }




    }

</script>

