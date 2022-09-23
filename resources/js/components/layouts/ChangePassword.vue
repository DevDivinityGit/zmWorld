<template>
    <div>
        <h3>Change Password</h3>
        <input type="text" id="pass">
        <button @click="changePassword()">Submit</button>
    </div>
</template>


<script>
    export default {



        methods: {
            changePassword() {
                axios({
                    method: 'get',
                    url: '/api/change-password?pass='+document.getElementById('pass').value,
                }).
                    then(res => {
                        if(res.data === 200) {
                            this.$router.push({name: 'login'});
                        }
                });









            }
        }


    }
</script>