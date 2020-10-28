<template>
  <div id="app">
    <google-map />
  </div>
</template>

<script>
import GoogleMap from "./components/GoogleMap";

export default {
  name: 'App',
  components: {
    GoogleMap
  }
}
</script>

<style>
html, body, #app {
  min-height: 100% !important;
  height: 100%;
}
body {
  margin: 0;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
.btn {
  cursor: pointer;
  display: inline-block;
  font-weight: 400;
  color: #212529;
  text-align: center;
  vertical-align: middle;
  user-select: none;
  background-color: transparent;
  border: 1px solid transparent;
  padding: .375rem .75rem;
  border-radius: 0.25rem;
  font-size: 1rem;
  line-height: 1.5;
}
.btn:focus {
  outline:0;
}
.btn:disabled {
  opacity: 0.5;
}
.btn-sm {
  padding: .25rem .5rem;
  font-size: .875rem;
  line-height: 1.5;
  border-radius: .2rem;
}
.btn-danger-link:hover {
  color: #e44d5c;
}
.btn-danger-link {
  color: #dc3545;
  text-decoration: underline;
}
.btn-primary:hover {
  background-color: #49bba6;
}
.btn-outline-primary {
  color: #4AAE9B;
  border-color: #4AAE9B;
}
.btn-primary {
  color: #fff;
  background-color: #4AAE9B;
  border-color: #38a08d;
}
.btn-link {
  color: #4AAE9B;
  text-decoration: underline;
}
.form-control {
  margin-top: 2px;
}
.form-control select, .form-control input {
  padding: 4px 16px 4px 8px;
  width: 230px;
  font-size: 1rem;
  font-weight: 400;
  color: #495057;
  box-sizing: border-box;
}
.form-control label {
  min-width: 90px;
  font-weight: bold;
  display: inline-block;
  margin-right: 8px;
  text-align: right;
}
.form-control .vdatetime {
  display: inline-block;
}
.block {
  display: block;
  width: 100%;
}
</style>
