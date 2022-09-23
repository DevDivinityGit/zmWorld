<template>
    <div>
        <h4>
          create new user
        </h4>
        <div class="container">
            <form @submit.prevent="sendForm($event)" action="#">

            <div class="row">
            <div class="col-sm-6">
                <input type="text" placeholder="name" class="form-control">
            </div>
            <div class="col-sm-6">
                <input type="text" placeholder="Email" class="form-control">
            </div>

            <div class="col-sm-6">
                <input type="text"  placeholder="Password" class="form-control">
            </div>

            <div class="col-sm-6">
                <input type="file"  @change="uploadImage($event)" class="form-control">
            </div>
            <div class="col-sm-6">
                <button class="btn btn-primary" type="submit">Submit</button>
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
            form: new FormData(),
          };
        },
        methods: {
            uploadImage(e) {
                console.clear();
                 this.form.append('image', e.target.files[0]);
            },



            sendForm(e) {
                let name = e.target[0].value;
                let email = e.target[1].value;
                let password = e.target[2].value;



                this.form.append('name', name);
                this.form.append('email', email);
                this.form.append('password', password);









                axios({
                    method: 'post',
                    url: '/api/users',
                    data: this.form,
                    headers: {
                        'Content-Type': 'Multipar/Form-data',
                    }

                }).
                then(res => {

                    if(res.data === 200) {
                        this.$router.push({name: 'users'});
                    }


                });
            },
        }




    }

</script>

