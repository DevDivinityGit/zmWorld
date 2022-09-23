
const state = {
    user: {},


};

const getters = {
    getUser(state) {
        if(localStorage.getItem('user')) {
            state.user = JSON.parse(localStorage.getItem('user'));
        }
        return state.user;
    },


};

const mutations = {



};

const actions = {




};


export default {state, getters, mutations, actions};


