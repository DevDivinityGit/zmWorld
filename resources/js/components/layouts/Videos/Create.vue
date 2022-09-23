<template>
    <div>
        <h4>
            create Video api links
        </h4>
        <div class="container">
            <form @submit.prevent="sendForm($event)" action="#">

                <div class="row">
                    <div class="col-sm-6">
                        <label for="name">Url</label>


                        <input type="text" v-model="form.name" id="name"  class="form-control">
                    </div>
                    <!--<div class="col-sm-6">-->
                    <!--<input type="text" placeholder="status" class="form-control">-->
                    <!--</div>-->



                    <!--<div class="col-sm-6">-->
                        <!--<label for="price">ISO Link</label>-->

                        <!--<input type="text"  v-model="form.iso_link" class="form-control" id="price">-->
                    <!--</div>-->



                    <!--<div class="col-sm-12">-->
                        <!--<label for="text">Text</label>-->

                        <!--<textarea name="" id="text" cols="15"  v-model="form.text" class="form-control" rows="5"></textarea>-->





                    <!--</div>-->















                    <!--<div class="col-sm-6">-->
                    <!--<input type="text"  placeholder="Password" class="form-control">-->
                    <!--</div>-->

                    <!--<div class="col-sm-6">-->
                    <!--<input type="file"  @change="uploadImage($event)" class="form-control">-->
                    <!--</div>-->








                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Create</button>
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
                  name: '',
                },
            };
        },
        methods: {


            sendForm(e) {



                axios({
                    method: 'post',
                    url: '/api/videos',
                    data: this.form,
                }).
                    then(res => {






                        if(res.data === 200) {
                            this.$router.push({name: 'videos.index'});
                        }


                });

















            },
        }




    }

</script>

