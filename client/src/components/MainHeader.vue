<template>
  <div>
    <LoginRegisterModal
      v-show="isModalVisible"
      @close="closeModal"
    />
    <div class="header">
      <div class="logo">
        <img src="imgs/logo-dog.png" />
        <span>DOG BREEDS</span>
      </div>
      <div>
        <div class="header-sign-btns" v-if="!isLogged()">
          <button class="btn btn-sm btn-primary" @click="showModal">
            Get Started
          </button>
          <button class="btn btn-sm btn-outline-primary" @click="showModal">
            Log In
          </button>
        </div>
        <div class="logged-info" v-if="isLogged()">
          Welcome, <b>{{ user.username }} </b>&nbsp;
          <button class="btn btn-sm btn-primary" @click="logout">
            Logout
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import { mapState } from 'vuex';
  import LoginRegisterModal from './LoginRegisterModal.vue';
  export default {
    name: 'MainHeader',
    data() {
      return {
        isModalVisible: false
      }
    },
    components: {
      LoginRegisterModal,
    },
    computed: {
      ...mapState(['user'])
    },
    methods: {
      showModal() {
        this.isModalVisible = true;
      },
      closeModal() {
        this.isModalVisible = false;
      },
      logout() {
        this.$store.dispatch("logout");
      },
      isLogged() {
      return this.$store.getters.isLoggedIn;
      }
    }
  }
</script>
<style>
  .header {
    display: flex;
    justify-content: space-between;
    background: #343a40;
    padding: 9px;
  }
  .logo {
    max-height: 30px;
    width: 156px;
    color: #fff;
  }
  .logo img {
    vertical-align: middle;
  }
  .logo img {
    max-height: 100%;
  }
  .logo span {
    margin: 1px 0 0 7px;
  }
  .header-sign-btns > * {
    margin-right: 10px;
  }
  .logged-info {
    color: #fff;
  }
</style>