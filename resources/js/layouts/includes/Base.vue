<template>
    <div>
        <app-nav-bar :mini="mini" @changeStatusDrawer="mini = !mini" v-if="$is_admin()"></app-nav-bar>
        <app-bar @changeStatusDrawer="mini = !mini"></app-bar>
        <v-main
        class="bg-gray-200 h-full overflow-auto no-scrollbar"
        style="height: 100vh; max-height: 100vh;"
        >
        <v-container>
            <transition name="slide-x-transition" mode="out-in">
                <router-view></router-view>
               
            </transition>
        </v-container>
        </v-main> 
        <app-footer></app-footer>
    </div>

</template>
<script>
import Chat from './chat/index.vue'
import AppBar from "../includes/Header.vue"
import AppNavBar from "../includes/Sidebar.vue"
import AppFooter from "../includes/footer.vue"
export default {
        data() {
            return {
                mini: true,
                dialog: false
            }
           
        },
        components:{
             AppBar,
             AppNavBar,
             AppFooter,
             Chat
        },
    }
</script>