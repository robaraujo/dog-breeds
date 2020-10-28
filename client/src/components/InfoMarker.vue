<template>
  <div class="info-marker">
    <div>
      <img :src="dog_breed.image" />
    </div>
    <div>
      <h3>{{ ucFirst(name) }}</h3>
      <div class="info-marker-info">
        <label>Breed: </label>
        <span>{{ dog_breed.name }}</span>
      </div>
      <div class="info-marker-info">
        <googlemaps-geocoder
          :request="{ location: { lat: latitude, lng: longitude } }"
        >
          <template slot-scope="props">
            <label>Address: </label>
            <span :title="props.results[0].formatted_address">
              {{ props.results[0].formatted_address }}
            </span>
          </template>
        </googlemaps-geocoder>
      </div>
      <div class="info-marker-info">
        <label>Date: </label>
        <span>{{ moment(created).format('YYYY/MM/DD HH:mm') }}</span>
      </div>
      <div class="info-marker-info">
        <label>Posted by: </label>
        <span>{{ user ? user.username : 'anonymous' }}</span>
      </div>
      <div class="info-marker-info" v-if="user && user.phone">
        <label>User Phone: </label>
        <span>{{ user.phone }}</span>
      </div>
    </div>
  </div>
</template>
<style>
  .info-marker {
    display: flex;
  }
  .info-marker-info {
    text-align: left;
    padding: 5px 10px;
  }
  .info-marker-info label {
    font-weight: bold;
  }
</style>