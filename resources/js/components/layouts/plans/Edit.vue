<template>
    <div>
        <h4>
            Edit Plan
        </h4>
        <div class="container">
            <form @submit.prevent="sendForm($event)" action="#">

                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" placeholder="name" :value="_plan.name" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <input type="number" placeholder="Limit" :value="_plan.limit"  class="form-control">
                    </div>

                    <div class="col-sm-6">
                        <input type="text"  placeholder="Price" :value="_plan.price"  class="form-control">
                    </div>



                    <div class="col-sm-6">
                        <input type="text"  placeholder="Description" :value="_plan.description"  class="form-control">
                    </div>




                    <div class="col-sm-6">
                        <input type="number"  placeholder="Task price" :value="_plan.task_price"  class="form-control">
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
    export default  {
        data() {

            return {
              plan: {},
                form: new FormData(),
            };

        },
        computed: {
          _plan() {
            return this.plan;
          },
        },
        created() {
            let id = this.$route.params.id;

             axios({
                 method: 'get',
                 url: '/api/plans/'+id,
             }).
                 then(res => {


                     this.plan = res.data;


             });








        },


        methods: {

            sendForm(e) {
                const data = {};
                data.name = e.target[0].value;
                data.limit = e.target[1].value;
                data.price  = e.target[2].value;
                data.description = e.target[3].value;
                data.task_price = e.target[4].value;











                let id = this.$route.params.id;
                axios({
                    method: 'put',
                    url: '/api/plans/'+id,
                    data: data,
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







        },



    }
</script>