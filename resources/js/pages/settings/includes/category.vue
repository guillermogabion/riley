<template>
  <div>
    <v-data-table
      :headers="headers"
      :items="supply"
      sort-by="calories"
      class="elevation-1"
      :loading="loading"
    >
      <template v-slot:top>
        <v-toolbar
          flat
        >
          <v-toolbar-title>Supplies</v-toolbar-title>
          <v-divider
            class="mx-4"
            inset
            vertical
          ></v-divider>
          <v-spacer></v-spacer>
          <v-dialog
            v-model="dialog"
            max-width="300px"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                color="primary"
                dark
                class="mb-2"
                v-bind="attrs"
                v-on="on"
              >
                New Item
              </v-btn>
            </template>
            <v-card>
              <v-card-title>
                <span class="text-h5">{{ formTitle }}</span>
              </v-card-title>
  
              <v-card-text>
                <v-container>
                      <v-text-field
                        v-model="editedItem.name"
                        label="Supply Name"
                      ></v-text-field>
                      <v-text-field
                        v-model="editedItem.price"
                        label="Price"
                        type="number"
                      ></v-text-field>
                </v-container>
              </v-card-text>
  
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                  color="blue darken-1"
                  text
                  @click="close"
                >
                  Cancel
                </v-btn>
                <v-btn
                  color="blue darken-1"
                  text
                  @click="save"
                >
                  Save
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
          <v-dialog v-model="dialogDelete" max-width="500px">
            <v-card>
              <v-card-title class="text-h5">Are you sure you want to delete this item?</v-card-title>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
                <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                <v-spacer></v-spacer>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-toolbar>
      </template>
      <template  v-slot:item.avatar="{ item }">
        <v-avatar size="36px">
            <img
              :alt="item.avatar"
              :src="item.avatar"
            >
          </v-avatar>
      </template>
      <template v-slot:item.actions="{ item }">
        <v-icon
          small
          class="mr-2"
          @click="editItem(item)"
        >
          mdi-pencil
        </v-icon>
        <v-icon
          small
          @click="deleteItem(item)"
        >
          mdi-delete
        </v-icon>
      </template>
      <template v-slot:no-data>
        <v-btn
          color="primary"
        
        >
          Reset
        </v-btn>
      </template>
    </v-data-table>
    <v-dialog
    v-model="edit"
    max-width="300px"
    >
    <v-card>
      <v-card-title>
          Edit Data
      </v-card-title>
      <v-card-text>
        <v-container>
              <v-text-field
                v-model="editedItem.name"
                label="Supply Name"
              ></v-text-field>
              <v-text-field
                v-model="editedItem.price"
                label="Price"
                type="number"
              ></v-text-field>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn
          color="blue darken-1"
          text
          @click="edits()"
        >
          Save
        </v-btn>
      </v-card-actions>
    </v-card>
    
    </v-dialog>
  </div>
  </template>

<script>
import logo from '../../../assets/logo.jpg'
import axios from '../../../plugins/axios'
export default {
  data: () => ({
    logo,
    dialog: false,
    dialogDelete: false,
    headers: [
      { text: 'Name', value: 'name' },
      { text: 'Price', value: 'price' },
      { text: 'Actions', value: 'actions', sortable: false },
    ],
    supply: [],
    editedIndex: -1,
    editedItem: {
      id: '',
      name: '',
      avatar: ''
    },
    defaultItem: {
      name: '',
      avatar: '',
    },
    loading: true,
    edit : false
  }),

  computed: {
    formTitle () {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
  },

  watch: {
    dialog (val) {
      val || this.close()
    },
    dialogDelete (val) {
      val || this.closeDelete()
    },
  },

  created () {
    // this.initialize()
    this.showAll()

  },

  methods: {
    onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files;
        this.createImg(files[0]);
      },
      createImg(file){
        var reader = new FileReader; 
        reader.onload = (e) => {
          this.editedItem.avatar = e.target.result;
          };
        reader.readAsDataURL(file)
      },

    editItem (item) {
      this.editedIndex = this.supply.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.edit = true
    },

    deleteItem (item) {
      this.editedIndex = this.desserts.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialogDelete = true
    },

    deleteItemConfirm () {
      this.desserts.splice(this.editedIndex, 1)
      this.closeDelete()
    },

    close () {
      this.dialog = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    closeDelete () {
      this.dialogDelete = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    save() {
      axios.post('addSupply', this.editedItem).then((response)=> {
        this.loading = true
        console.log(response.data);
        this.showAll()
        this.dialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      })
   
    },
    edits() {
      axios.post('editSupply/' + this.editedItem.id , this.editedItem).then((response)=> {
        this.loading = true
        console.log(response.data);
        this.showAll()
        this.edit = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      })
   
    },
    showCategory(){
      axios.get('show-category').then((response)=> {
        console.log(response.data)
        this.category = response.data
      })
    }, 
    showAll(){
      axios.get('getAllSupply').then(response => {
        console.log(response.data)
        this.supply = response.data
        this.loading = false

      })
    },
    
  },
}
</script>
<style>
.img-holder {
    width: 90%;
    height: 300px;
    border-radius:50px;
    background: #f8f9fb;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left:1em;
}
.inputWrapper {
    overflow: hidden;
    position: relative;
    cursor: pointer;
    /*Using a background color, but you can use a background image to represent a button*/
    background-color: #DDF;
}

.fileInput {
    cursor: pointer;
    height: 100%;
    position:absolute;
    top: 0;
    right: 0;
    /*This makes the button huge so that it can be clicked on*/
    font-size:50px;
}
.hidden {
    /*Opacity settings for all browsers*/
    opacity: 0;
    -moz-opacity: 0;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0)
}

</style>