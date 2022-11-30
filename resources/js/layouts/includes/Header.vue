<template>
   <v-app-bar app absolute  :color="$is_admin() ? '#ffc107' : 'black'" class="text-white">
      <v-app-bar-nav-icon @click.stop="$emit('changeStatusDrawer')" color="white" v-if="$is_admin()"></v-app-bar-nav-icon>
      <div>

         <h3
         style="padding-left: 3em"
         v-if="$is_user()"
         >
         Riley's Catering Service
         </h3>
      </div>
      
      <v-spacer></v-spacer>
      <div v-if="$is_user()">
      </div>
      <Profile/>
   </v-app-bar>
   
      
</template>

<script>
import Profile from './Profile.vue'

export default {
   components :{
      Profile
   }
}
</script>
<style scoped>
  .together{
    min-width: 0
  }
</style>