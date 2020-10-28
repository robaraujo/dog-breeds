<template>
  <div class="main-wrapper">
    <loading :active.sync="isLoading" :is-full-page="true"></loading>
    <MainHeader></MainHeader>
    <div class="map-wrap">
      <div class="map-overlay">
        <button class="btn-float-new btn btn-primary" @click="toggleAddNew(true)" v-if="!showFormNew">
          <span>+</span> ADD NEWs
        </button>
        <div class="form-new" v-if="showFormNew">
          <div class="content-btns-wrap">
            <div class="form-content">
              <div class="form-control">
                <label>Dog Name:</label>
                <input v-model="formNewPosition.name">
              </div>
              <div class="form-control">
                <label>Dog Breed:</label>
                <select v-model="formNewPosition.dog_breed_id">
                  <option v-for="(breed) in dogBreeds" 
                          :value="breed.id"
                          :key="breed.id">
                    {{breed.name}}
                  </option>
                </select>
              </div>
              <div class="form-control">
                <label>Saw At:</label>
                <datetime v-model="formNewPosition.saw_at" type="datetime"></datetime>
              </div>
              <div class="form-control">
                <googlemaps-geocoder
                  :request="{ location: center}"
                >
                  <template slot-scope="props">
                    <div :title="props.results[0].formatted_address" class="address">
                      <label>Location:</label> {{ props.results[0].formatted_address }}
                    </div>
                  </template>
                </googlemaps-geocoder>
              </div>
            </div>
            <div class="form-buttons">
              <button :disabled="!canSubmitDogPosition()" class="btn block btn-primary" @click="saveDogPosition">Save</button>
              <button class="btn block btn-danger-link" @click="toggleAddNew(false)">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <googlemaps-map
        ref="map"
        :center.sync="center"
        :zoom="12"
        style="width:100%; height: 100%;"
        :options="mapOptions"
      >
        <googlemaps-marker
          title="dog-marker"
          class="dog-marker"
          data-test="dog-marker"
          v-for="(marker, index) in dogPositions"
          ref="dogPositions"
          :key="index"
          :position="{ lat: marker.latitude,lng: marker.longitude }"
          :icon="{
            url: marker.dog_breed.image,
            size: { width: 50, height: 50 },
            origin: { x: 0, y: 0 },
            scaledSize: { width: 50, height: 50 }
          }"
          :scaledSize="{ width: 30, height: 45, f: 'px', b: 'px' }"
          @click="selectMarker(index, marker)"
        ></googlemaps-marker>
        <googlemaps-marker
          v-if="showFormNew"
          :label="{
            color: 'black',
            fontSize: '20px',
            text: 'Drag map to adjust dog location',
            class: 'dog-label'
          }"
          :position="center"
        ></googlemaps-marker>
      </googlemaps-map>
    </div>
  </div>
</template>

<script>
  import Vue from 'vue';
  import axios from 'axios';
  import Loading from 'vue-loading-overlay';
  import 'vue-loading-overlay/dist/vue-loading.css';
  import { Datetime } from 'vue-datetime';
  import moment from 'moment';
  import 'vue-datetime/dist/vue-datetime.css'
  import InfoMarker from './InfoMarker.vue';
  import MainHeader from './MainHeader.vue';

  export default {
    name: "GoogleMap",
    components: {
      Loading,
      MainHeader,
      Datetime,
    },
    data() {
      return {
        mapOptions: {
          disableDefaultUI : true
        },
        center: { lat: 45.508, lng: -73.587 },
        isLoading: false,
        dogPositions: [],
        dogBreeds: [],
        showFormNew: false,
        formNewPosition: {
          name: '',
          saw_at: (new Date()).toISOString(),
          dog_breed_id: 1,
        },
      };
    },
    mounted() {
      this.geolocate();
      this.fetchData();
    },
    methods: {
      canSubmitDogPosition() {
        const { dog_breed_id, name, saw_at } = this.formNewPosition;
        return dog_breed_id && name && saw_at;
      },
      saveDogPosition() {
        const form = {
          ...this.formNewPosition,
          saw_at: moment(this.formNewPosition).format('YYYY/MM/DD HH:mm:ss'),
          latitude: this.center.lat,
          longitude: this.center.lng,
        };
        
        this.isLoading = true;
        axios({ url: '/dog-positions', data: form, method: 'POST' })
          .then(res => {
            this.dogPositions = res.data.positions;
            this.toggleAddNew(false);
            this.$toasted.show('Dog position successfully added.', { 
              duration: 5000,
              type: 'success'
            });
          })
          .finally(() => this.isLoading = false)
      },
      geolocate: function() {
        navigator.geolocation.getCurrentPosition(position => {
          if (!position.coords.latitude) return;
          this.center = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
        });
      },
      toggleAddNew: function(visible) {
        this.showFormNew = visible;
      },
      fetchData() {
        this.isLoading = true;
        axios({url: '/initial-data', method: 'GET' })
          .then(res => {
            this.dogBreeds = res.data.breeds;
            this.dogPositions = res.data.positions;
          })
          .catch(err => console.log(err))
          .finally(() => this.isLoading = false)
      },
      selectMarker(index, marker){
        const map = this.$refs.map.$_map
        const marker_ele = this.$refs.dogPositions[index].$_marker
        console.log(marker_ele)
        const Wrapper = Vue.extend(InfoMarker);
        const InfoMarkerComp = new Wrapper({
          data() {
            return marker;
          }
        }).$mount();

        var infowindow = new window.google.maps.InfoWindow({
          content: InfoMarkerComp.$el
        });
        infowindow.open(map, marker_ele);
      }
    }
  };
</script>
<style>
.main-wrapper {
  height: 100%;
  display: flex;
  flex-direction: column;
}
.map-wrap {
  flex: 1;
  position: relative;
}
.map-overlay > *{
  position: absolute;
  bottom: 13px;
  z-index: 1;
}
.form-new {
  box-shadow: 0px -1px 10px 0px rgba(0,0,0,0.75);
  background: #fff;
  padding: 10px;
  width: 96%;
  max-width: 600px;
  background: #fff;
  left:0;
  right:0;
  margin-left:auto;
  margin-right:auto;
}
.btn-float-new {
  right: 17px;
  bottom: 28px;
  font-weight: bold !important;
  padding: 14px 11px 10px !important;
  box-shadow: 0px -1px 4px 0px rgba(0,0,0,0.75);
}
.btn-float-new span {
  font-size: 20px;
  vertical-align: middle;
}
.content-btns-wrap {
  display: flex;
  justify-content: space-between;
}
.form-content {
  text-align: left;
  width: calc(100% - 95px);
}
.form-buttons {
  width: 90px;
}
.form-buttons > button {
  margin-top: 20px;
}
.address {
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
  margin-top: 5px;
}
@media only screen and (max-width:767px) {
  .form-content {
    margin: auto;
  }
  .content-btns-wrap {
    flex-direction: column;
  }
  .form-buttons {
    display: flex;
    justify-content: center;
    width: 100%;
  }
}
img[src^="https://lyka-challenge.s3.amazonaws.com"] {
  border-radius: 50%;
  box-sizing: border-box;
  border:1px solid rgba(0,0,0,0.5) !important;
}
</style>