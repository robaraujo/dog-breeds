<script>
  export default {
    name: 'LoginRegisterModal',
    methods: {
      close() {
        this.$emit('close');
      },
      detectBackdropClick(e) {
        if(e.target.classList.contains('modal-backdrop')) {
          this.close()
        }
      },
      selectNav(nav) {
        this.nav = nav === 'register' ? 'register' : 'login'
      },
      submit() {
        if (!this.canSubmit()) return;
        
        this.$store
          .dispatch(this.nav, { ...this.form })
          .then(() => {
            this.showMsg('Logged in successfully.', 'success');
            this.close();
          })
          .catch(err => {
            this.showMsg(err.message, 'error')
          })
      },
      canSubmit() {
        return this.form.username && this.form.password
      },
      showMsg(msg, type) {
        this.$toasted.show(msg, { 
          duration: 5000,
          type: type
        });
      }
    },
    data() {
      return {
        nav: 'login',
        form: {
          username: '',
          password: '',
        }
      }
    }
  };
</script>
<template>
  <transition name="modal-fade">
    <div class="modal-backdrop" @click="detectBackdropClick($event)" >
      <div class="modal"
        role="dialog"
        aria-labelledby="modalTitle"
        aria-describedby="modalDescription"
      >
        <div class="nav-wrap">
          <div :class="nav === 'register' && 'active'" class="nav-item" @click="selectNav('register')">Register</div>
          <div :class="nav === 'login' && 'active'" class="nav-item" @click="selectNav('login')">Login</div>
        </div>
        <div class="modal-form">
          <input name="username" placeholder="Username" v-model="form.username" @keyup.enter="submit($event)">
          <input type="password" name="password" placeholder="Password" v-model="form.password" @keyup.enter="submit($event)">
          <br><br>
          <div v-if="nav === 'register'">
            <button @click="submit()" :disabled="!canSubmit()" class="btn btn-primary block">
              Register
            </button>
            <br>
            <button class="btn btn-link" @click="selectNav('login')">
              Already have an account?
            </button>
          </div>
          <div v-if="nav === 'login'">
            <button @click="submit()" :disabled="!canSubmit()" class="btn btn-primary block">
              Login
            </button>
            <br>
            <button class="btn btn-link" @click="selectNav('register')">
              Don't have an account?
            </button>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>
<style>
  .modal-backdrop {
    z-index: 2;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .modal {
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    width: 96%;
    max-width: 400px;
  }
  .nav-wrap {
    width: 100%;
    display: flex;
  }
  .nav-item {
    flex: 0 0 50%;
    padding: 9px 0px;
    color: #2f2f2f;
    cursor: pointer;
  }
  .nav-item:not(.active) {
    background: #dddddd;
  }
  .modal-form {
    padding: 25px 10px;
  }
  .modal-form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #eeeeee;
    box-sizing: border-box;
  }
  
  .modal-fade-enter,
  .modal-fade-leave-active {
    opacity: 0;
  }

  .modal-fade-enter-active,
  .modal-fade-leave-active {
    transition: opacity .5s ease
  }
</style>