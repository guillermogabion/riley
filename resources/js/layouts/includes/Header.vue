<template>
   <v-app-bar app absolute  :color="$is_admin() ? '#ffc107' : 'black'" class="text-white">
      <v-app-bar-nav-icon @click.stop="$emit('changeStatusDrawer')" color="white" v-if="$is_admin()"></v-app-bar-nav-icon>
      <div>

         <h3
         style="padding-left: 3em"
         v-if="$is_user()"
         >
         <!-- Riley's Catering Service -->
         </h3>
      </div>
      
      <v-spacer></v-spacer>
      <div v-if="$is_user()">
         <!-- <v-row
         :mobile-breakpoint="0"
         no-gutters
         >
               <v-btn
               small outline
               style="color: white; background: black;"
               @click="$router.push('home')"
               class="together"
               >
                  <span
                  style="font-weight: bold"
                  >
                  Home
                  </span>
               </v-btn>
               
               <v-btn
               small outline
               class="together"
               style="color: white; background: black;"
               @click="$router.push('services')"
               >
                  <span
                  style="font-weight: bold"
                  >
                     Services
                  </span>
               </v-btn>
               <v-btn
               small outline
               class="together"
               style="color: white; background: black;"
               @click="$router.push('menu')"
               >
                  <span
                  style="font-weight: bold; font-size: small;"
                  >
                  Menu
                  </span>
               </v-btn>
               <v-btn
               small outline
               class="together"
               style="color: white; background: black;"
               >
                  FAQ
               </v-btn>
               <v-btn
               small outline
               class="together"
               style="color: white; background: black;"
               >
                  About
               </v-btn>
               <v-btn
               small outline
               class="together"
               style="color: white; background: black;"
               >
                  Contact
               </v-btn>
         </v-row> -->
     
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