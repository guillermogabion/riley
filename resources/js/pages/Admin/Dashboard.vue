<template>
<v-slide-x-transition>
    <div
    v-if="$is_admin()"
    >
        <v-card>
        I am Dashboard
        <br/>
        I am Dashboard
        <br/>
        I am Dashboard
        <br/>
        I am Dashboard
        <br/>
        I am Dashboard
        <br/>
        I am Dashboard
        <br/>
        I am Dashboard
        <br/>
        I am Dashboard
        <br/>
        I am Dashboard
        <br/>
        I am Dashboard
        <br/>
    </v-card>
    </div>
    <div
    v-if="$is_user()"
    >
       <Home />
    </div>
   
</v-slide-x-transition>
</template>

<script>
import Home from '../../userspart/home.vue'
export default {
    components : {
        Home
    },
    data() {
        
        return {
            
        }
    },
   
}
</script>