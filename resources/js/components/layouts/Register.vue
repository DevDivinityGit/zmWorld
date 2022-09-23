<template>
    <div>
        <div class="container-fluid">

            <div class="row min-vh-100">
                <header-com></header-com>
                <div class="col-12">

                    <main class="row">


                        <div class="col-12">
                            <!-- Main Content -->
                            <div class="row">
                                <div class="col-12 mt-3 text-center text-uppercase">
                                    <h2>Register</h2>
                                </div>
                            </div>

                            <main class="row">
                                <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <form @submit.prevent="apiCall"  @keydown="removeError($event)">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" id="name" v-model="form.name" class="form-control"
                                                          :class="{'is-invalid': errors.name}" >
                                                    <small  class="invalid-feedback" >
                                                        {{errors.name}}.
                                                    </small>

                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input  id="email" v-model="form.email" class="form-control"
                                                      :class="{'is-invalid': errors.email}">
                                                    <small  class="invalid-feedback">
                                                        {{errors.email}}.
                                                    </small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" v-model="form.password" id="password"
                                                           class="form-control" :class="{'is-invalid': errors.password}">

                                                    <small  class="invalid-feedback">
                                                        {{errors.password}}.
                                                    </small>

                                                </div>
                                                <div class="form-group">
                                                    <label for="passwordConfirmation">Confirm Password</label>
                                                    <input type="password" v-model="form.passwordConfirmation"
                                                           id="passwordConfirmation"
                                                           class="form-control" :class="{'is-invalid': errors.passwordConfirmation}">
                                                    <small  class="invalid-feedback">
                                                        {{errors.passwordConfirmation}}.
                                                    </small>


                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input type="checkbox" id="agreement" class="form-check-input"
                                                               v-model="form.agreement" :class="{'is-invalid': errors.agreement}"
                                                                   @change="removeErrorMsg($event)">
                                                        <label for="agreement" class="form-check-label ml-2">I agree to Terms and Conditions</label>
                                                        <small  class="invalid-feedback">
                                                            {{errors.agreement}}.
                                                        </small>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-outline-dark">Register</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </main>
                            <!-- Main Content -->
                        </div>





                    </main>
                    <!-- Main Content -->

                </div>
                <footer-com></footer-com>

            </div>

        </div>


    </div>
</template>
<script>
    import Header from "./Header";
    import Footer from "./Footer";
    export default {
        data() {
            return {
               form: {
                   name: '',
                   email: '',
                   password: '',
                   passwordConfirmation: '',
                   agreement: '',
               },
                errors: {},


            };
        },
        mounted() {




        },
        components: {
            headerCom: Header,
            footerCom: Footer,
        },
        methods: {
            removeErrorMsg(ev) {
              this.errors[ev.target.id] = null;
            },
            removeError(obj) {
             this.errors[obj.target.id] = null;
            },
            apiCall() {
               axios({
                 method: 'post',
                 url: APIURL+'/api/register',
                 data: this.form,
               })
                   .then(res => {
                       if(res.data.errors) {
                           this.errors = res.data.errors;

                       } else if(res.data.data) {
                           let data = res.data.data;



                            this.$store.dispatch('setUser', data.user);
                            localStorage.setItem('token', data.token);



                            if(sessionStorage.getItem('redirectURL')) {
                                let redirectURL = sessionStorage.getItem('redirectURL');
                                sessionStorage.removeItem('redirectURL');
                                this.$router.push(redirectURL);
                            } else {
                                this.$router.push({name: 'home'});


                            }


                       }
                   })
                   .catch(err => {
                       console.log(err);
                   });
            },

        }


    }
</script>

























