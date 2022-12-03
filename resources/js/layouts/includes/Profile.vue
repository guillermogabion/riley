<template>
    <div
  
    >
        <v-menu
          button
          offset-y
          content-class="bubble-menu"
          style="z-index:999"
        >
          <template
            v-slot:activator="{ on }"
          >
            <v-avatar
              color="white"
              v-on="on"
              size="32"
              class="clicker"
            >
              <v-img
                  :src="logo"
                  contain
                  alt="admin"
              />
            </v-avatar>
          </template>
           <v-list
              dense
              class="clicker"
            >
              <v-list-item
                dense
                class="text-capitalize"
                @click = "dialog = true"
              >
                edit profile
              </v-list-item>
              <v-list-item
              dense
              class="text-capitalize"
              @click="backHome()"
              >
              Back Home
            </v-list-item>
            <v-list-item
            dense
            class="text-capitalize"
            @click="recordsDialog = true"
            v-if="$is_user()"
            >
            Transaction History
          </v-list-item>
            <v-list-item
              dense
              class="text-capitalize"
              @click="logout"
            >
              logout
            </v-list-item>
            </v-list>
        </v-menu>
        <v-dialog
        v-model="dialog"
        >
        <v-dialog
          width="500px"
          v-model="dialog"
          >
          <v-card>
            <v-card-title class="text-h5 grey lighten-2">
                Edit Profile
              </v-card-title>
              <v-card-text
              color="grey"
              style="padding-top: 1em;"
              >
              </v-card-text>
              <v-col>
                  <v-text-field
                      v-model="user.first_name"
                      filled
                      rounded
                      dense
                      label="First Name"
                  ></v-text-field>
                  <v-text-field
                      v-model="user.last_name"
                      filled
                      rounded
                      dense
                      label="Last Name"
                  ></v-text-field>
                  <v-text-field
                      v-model="user.birthdate"
                      filled
                      rounded
                      dense
                      label="Birth Date"
                  ></v-text-field>
                  <v-text-field
                      v-model="user.address"
                      filled
                      rounded
                      dense
                      label="Address"
                  ></v-text-field>
                  <v-text-field
                      v-model="user.landmark"
                      filled
                      rounded
                      dense
                      label="Landmark"
                  ></v-text-field>
                  <v-text-field
                      v-model="user.contact"
                      filled
                      rounded
                      dense
                      label="Contact Number"
                  ></v-text-field>
                
              </v-col>
              <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn
                  color="green"
                  @click="update()"
                  >
                    Save
                  </v-btn>
              </v-card-actions>
          </v-card>
          </v-dialog>
        </v-dialog>
        <v-dialog v-model="recordsDialog" width="30%"
        max-height="400px"
        >
          <!-- <v-card
          >
          {{this.records.catering}}
          <br>
          {{this.records.rent}}
          <br>
          {{this.records.tray}}
          </v-card> -->
          <v-card
          >

          
          <v-card>
            <span style="font-weight: bold; padding-left: 1em;">
              Caterings
            </span>
            
            <!-- <v-card
            v-for="catering in records.catering"
            :key="catering.id"
            >
            {{ catering.event_type }}
            {{ catering.status }}
            </v-card> -->

            <table
            class="table table-striped"
            >
              <thead>
                <tr>
                  <th>Event Type</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="catering in records.catering" :key="catering.id">
                  <td>{{ catering.event_type }}</td>
                  <td>{{ catering.created_at }}</td>
                  <td>{{ catering.status }}</td>
                </tr>
              </tbody>
            </table>
          </v-card>
         
          <v-card>
            <span style="font-weight: bold; padding-left: 1em;">
              Trays
            </span>
          <br>
            <table
            class="table table-striped"
            >
              <thead>
                <tr>
                  <th>Order</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="tray in records.tray" :key="tray.id">
                  <td> {{ tray.order }}</td>
                  <td> {{ tray.created_at }}</td>
                  <td> {{ tray.status }}</td>
                </tr>
              </tbody>
            </table>
          </v-card>
          <v-card>
            <span style="font-weight: bold; padding-left: 1em;">
              Rents
            </span>
            <br>
              <table
                class="table table-striped"
                >
                  <thead>
                    <tr>
                      <th>Supply</th>
                      <th>Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="rent in records.rent" :key="rent.id">
                      <td> {{ rent.supply_name }}</td>
                      <td> {{ rent.created_at }}</td>
                      <td> {{ rent.status }}</td>
                    </tr>
                  </tbody>
                </table>
          </v-card>
        </v-card>
        </v-dialog>
    </div>
  </template>
  <script>
  import axios from '../../plugins/axios'
  import logo from '../../assets/rileylogo.png'
  export default {
    data(){
      return {
        logo,
        dialog: false ,
        recordsDialog: false ,
        payload : {
          first_name: '',
          last_name : '',
          birthdate : '',
          address : '',
          landmark : '',
          contact : ''
        },
        user: [],
        records: []
      }
    },
    methods:{
      logout(){
        localStorage.setItem('token', '')
        location.reload();
      },
      getProfile(){
        axios.get('getProfile').then(response => {
          console.log(response.data)
          this.user = response.data
        })
      },
      update(){
        axios.post('updateUser/' + this.user.id, this.user).then(response => {
          console.log(response.data)
          this.dialog = false
        })
      },
      getrecords(){
        axios.get('history').then(response => {
          this.records = response.data
        })
      },
      backHome(){
        window.location.href = '/design';
      }
    },
    mounted(){
      this.getProfile()
      this.getrecords()
    }
  }
  </script>
  
  