import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

const token = localStorage.getItem('token');
const user = localStorage.getItem('user');
if (token) {
  axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

export default new Vuex.Store({
  state: {
    status: '',
    token: token || '',
    user : user && JSON.parse(user) || {}
  },
  mutations: {
    auth_request(state){
      state.status = 'loading';
    },
    auth_success(state, data){
      const { token, user } = data;
      state.status = 'success';
      state.token = token;
      state.user = user;

      axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    },
    auth_error(state){
      state.status = 'error';
    },
    logout(state){
      state.status = '';
      state.token = '';
    },
  },
  actions: {
    login({commit}, user){
      return new Promise((resolve, reject) => {
        commit('auth_request');
        axios({url: `/login`, data: user, method: 'POST' })
          .then(resp => {
            const { token, user } = resp.data
            localStorage.setItem('token', token)
            localStorage.setItem('user', JSON.stringify(user))
            // Add the following line:
            axios.defaults.headers.common['Authorization'] = token
            commit('auth_success', resp.data)
            resolve(resp)
          })
          .catch(err => {
            commit('auth_error')
            localStorage.removeItem('token')
            reject(err)
          })
      })
    },
    register({commit}, user){
      return new Promise((resolve, reject) => {
        commit('auth_request')
        axios({url: `/register`, data: user, method: 'POST' })
          .then(resp => {
            const { token, user } = resp.data
            localStorage.setItem('token', token)
            localStorage.setItem('user', JSON.stringify(user))
            axios.defaults.headers.common['Authorization'] = token
            commit('auth_success', resp.data)
            resolve(resp)
          })
          .catch(err => {
            const res = err.response.data;
            commit('auth_error', res);
            localStorage.removeItem('token');
            reject(res);
          })
      })
    },
    logout({commit}){
      return new Promise((resolve) => {
        commit('logout')
        localStorage.removeItem('token')
        delete axios.defaults.headers.common['Authorization']
        resolve()
      })
    }
  },
  getters : {
    isLoggedIn: state => !!state.token,
    authStatus: state => state.status,
  }
})