<template>
    <div>
        <h4>
            create new Plan
        </h4>
        <div class="container">
            <form @submit.prevent="sendForm($event)" action="#">

                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" placeholder="name" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <input type="number" placeholder="Limit" class="form-control">
                    </div>

                    <div class="col-sm-6">
                        <input type="number"  placeholder="Price" class="form-control">
                    </div>



                    <div class="col-sm-6">
                        <input type="text"  placeholder="Description" class="form-control">
                    </div>

                    <div class="col-sm-6">
                        <input type="text"  placeholder="task price" class="form-control">
                    </div>






                    <!--<div class="col-sm-6">-->
                        <!--<input type="file"  @change="uploadImage($event)" class="form-control">-->
                    <!--</div>-->





                </div>


                <div class="row">
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
            // uploadImage(e) {
            //     console.clear();
            //     this.form.append('image', e.target.files[0]);
            // },



            sendForm(e) {
                let name = e.target[0].value;
                let email = e.target[1].value;
                let password = e.target[2].value;
                let description = e.target[3].value;
                let taskPrice = e.target[4].value;



                this.form.append('name', name);
                this.form.append('limit', email);
                this.form.append('price', password);
                this.form.append('description', description);
                this.form.append('task_price', taskPrice);









                axios({
                    method: 'post',
                    url: '/api/plans',
                    data: this.form,
                    // headers: {
                    //     'Content-Type': 'Multipar/Form-data',
                    // }

                }).
                then(res => {

                    if(res.data === 200) {
                        this.$router.push({name: 'plans'});
                    }


                });
            },
        }




    }

</script>

