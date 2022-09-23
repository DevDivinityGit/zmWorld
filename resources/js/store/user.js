
const state = {
     user: null,
    Searched: false,


};

const getters = {
     getUser(state) {
         return state.user;
     },
    getSearched(state) {
      return state.Searched;
    },


};

const mutations = {
    insertUser(state, user) {
      state.user = user;
    },



    destoryUser(state) {
      state.user = null;
    },
    setSearched(state, val) {
        state.Searched = val;
    },


};

const actions = {


         deleteTokenAndUser(context) {

            //
            // axios({
            //     method: 'post',
            //     url: APIURL+"/api/logout",
            //
            // })
            //     .then(res => {
            //         console.log(res.data);
            //     })
            //     .catch(error => {
            //         console.log(error);
            //     });



             context.commit('destoryUser');

         },


    setUser(context, user) {
             context.commit('insertUser', user);
    }

};


export default {state, getters, mutations, actions};


