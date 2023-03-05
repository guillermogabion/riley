<template>
    <v-card>
      <v-card-title>
       Gallery
        <v-spacer></v-spacer>
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
        <div class="pa-2">
          <v-btn
          color="primary"
          @click="dialog=true"
          >
            Add Item
          </v-btn>
        </div>
      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="food"
        :search="search"
        :loading="loading"
      >

      <template v-slot:item.photo="{item}">
        <img
        :alt="item.photo"
        :src="item.photo"
        width="150"
        height="150"
        />
      </template >
      <template v-slot:item.actions="{item}">
        <v-icon
            small
            @click="deleteItem(item)"
        >
            mdi-delete
        </v-icon>
      </template>
    </v-data-table>
   
    <v-dialog
    v-model="dialog"
    width="20%"
    >
    <v-card>
      <v-card-title>
        <!-- <span class="text-h5">{{ formTitle }}</span> -->
        Add New Item
      </v-card-title>
  
      <v-card-text>
        <v-container>
          <div class="img-holder">
              <v-img
                style="width: 100px; height: 100%;"
                :src="this.payload.photo || logo"
              >
              <div class="upload-options" required style="padding-top: 5px;">
                <input
                  accept="image/png, image/gif, image/jpeg"
                  id="fileData"
                  type="file"
                  @change="onFileChange"
                  style="padding-left: 20%;"
                  class="fileInput hidden"
                />
  
              </div>
              </v-img>
            </div>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-btn
        @click="addFood()"
        >
          Save
        </v-btn>
        <v-btn  @click="dialog = false">
          Close
        </v-btn>
      </v-card-actions>
    </v-card>
    </v-dialog>
    </v-card>
  </template>
  <script>
  import axios from '../../../plugins/axios'
  import logo from '../../../assets/logos/cc.png'
  export default {
    data () {
      return {
        loading: true,
        payload: {
          id : '',
          photo: '',
        },
        switch1: false,
        logo,
        dialog: false,
        search: '',
        headers: [
          {
            text: 'Photo',
            align: 'start',
            sortable: false,
            value: 'photo',
          },
          { text : 'Actions', value: 'actions'}
        ],
        food: [],
        type: [],
        editedItem: {
          photo: '',
       
        },
        editedIndex: -1,
        editDialog : false,
      }
    },
    mounted(){
        this.show()
        this.getType()
    },
    methods: {
        show(){
            axios.get('getGallery').then(response => {
                console.log(response.data)
                this.food = response.data
                this.loading = false
            })
        },
        onFileChange(e) {
          var files = e.target.files || e.dataTransfer.files;
          this.createImg(files[0]);
        },
        createImg(file){
          var reader = new FileReader; 
          reader.onload = (e) => {
            this.payload.photo = e.target.result;
            };
          reader.readAsDataURL(file)
        },
        addFood(){
              axios.post('addPicture', this.payload).then(response => {
              console.log(response.data)
              this.show();
              this.dialog = false
              this.clear()
            })
        },
        editFood() {
         
        },
        clear(){
          this.$nextTick(() => {
            this.payload = Object.assign({}, this.payload)
            this.editedIndex = -1
          })
        },
  
        getType(){
          axios.get('getType').then(response => {
            console.log(response.data)
            this.type = response.data
          })
        },
     
        editItem(item) {
          this.editedIndex = this.food.indexOf(item)
          this.editedItem = Object.assign({}, item)
          this.editDialog = true
        },

        deleteItem (item) {
            axios.delete('deletePicture/' + item.id).then(response => {
                console.log(response.data)
                this.show();
            })
      },
     
       
    }
  }
  </script>