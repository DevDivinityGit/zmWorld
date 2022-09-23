<template>


   <div class="container">
       <div class="row justify-content-center">
           <div class="col-sm-9">


               <label for="editor" style="margin-top: 10px;">Guid API: </label>
               <br>
               <div class="form-group">
                   <div  id="editor"  class="form-control"></div>
                   <div class="invalid-feedback">{{'none'}}</div>


                   <button @click="hitAdd()" class="btn btn-secondary btn-block">update</button>

               </div>
               <br>




           </div>




       </div>
   </div>
</template>


<script>
    export default {
        mounted() {


            axios({
                method: 'get',
                url: '/api/guid-api',


            }).
            then(res => {

                const data = res.data[0].body;


                CKEDITOR.instances.editor.setData(data);





            });





            CKEDITOR.replace('editor');





        },

        methods: {

            hitAdd() {






               let val =  CKEDITOR.instances.editor.getData();


               axios({
                   method: 'post',
                   url: '/api/guid-api',
                   data: {
                     newVal: val,
                   },
               }).
                   then(res => {




               });



            }




        },




    }




</script>