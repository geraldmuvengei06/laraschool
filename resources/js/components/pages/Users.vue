<template>
    <div>
        <v-container
        class="fill-height"
        fluid
      >
        <v-row
          justify="center"
          align="center"
          
        >

          
          <v-col
          cols="12"
          lg="10"
          md="10"
          sm="12"
          xs="12"
          class="col-has-margin-top"
          
          >

            <v-card flat>
              <v-card-title>
                Users
                <v-spacer></v-spacer>
                <v-text-field
                    dense
                    outlined
                  v-model="search"
                  append-icon="search"
                  label="Search"
                  single-line
                  hide-details
                ></v-text-field>
                <v-spacer></v-spacer>

                <v-btn
                  color="success"
                  class="white--text has-margin-top"
                  fab
                  @click="dialog = !dialog"
                >
                  <v-icon dark>add</v-icon>
                </v-btn>
                
                
              </v-card-title>
              <v-data-table
                :headers="headers"
                :items="users"
                :search="search"
                loading="tableLoading"
                loading-text="Loading... Please wait"
                show-expand
              >
                <!-- <template v-slot:item.permissions="{ item }">
                  <v-chip :color="getColor(item.permissions)" dark>{{ item.permissions }}</v-chip>
                </template> -->
                <template v-slot:item.name="{ item }">
                    {{ getUserName(item) }}
                </template>

                <template v-slot:item.actions="{ item }" >
                  <span v-if="($store.getters.user.id !== item.id )">
                   <v-btn
                    color="success "
                    class="white--text"
                    fab
                    @click="editUser(item)"
                    x-small
                  >
                    <v-icon
                    small
                    >
                      edit
                    </v-icon>
                  </v-btn>

                  <v-btn
                    
                    color="error lighten-1"
                    class="white--text"
                    fab
                    @click="deleteUser(item)"
                    x-small
                  >
                    <v-icon
                    small
                    >
                      delete
                    </v-icon>
                  </v-btn>
                </span>

                  
                 
                </template>

                <template #expanded_item="{ headers, item }">
                  <h2>{{ item.id_number }}</h2>
                  <h2>{{ item.phone }}</h2>
                  <h2>{{ item.address }}</h2>
                  <h2>{{ item.permissions ? item.permissions.length : '' }}</h2>

                  <v-btn
                    color="primary lighten-1"
                    class="white--text"
                    fab
                    @click="editPermissions(item)"
                    x-small
                  >
                    <v-icon
                    small
                    >
                      lock
                    </v-icon>
                  </v-btn>

                </template> 
              </v-data-table>
            </v-card>
          </v-col>
        </v-row>
      </v-container>

      <!-- create role -->

      <v-dialog v-model="dialog" max-width="400px">
        <v-form ref="roleForm" @submit.prevent="saveUser" >
          <v-card> 
            <v-card-title>
              <span class="headline">Add User</span>
            </v-card-title>
            <v-card-text class="is-dialog-text">
                <v-row>
                
                  <v-col cols="12">
                    
                        <v-text-field
                            dense
                            outlined
                        label="Name*"
                        required
                        :rules="nameRules"
                        v-model="userForm.name"
                        ></v-text-field>
                    
                  </v-col>

                </v-row>
            </v-card-text>
            <v-container class="is-card-container">
              <v-card-actions>
                <v-btn color="success darken-1" class="white--text" :loading="loading" @click="saveUser" >Save</v-btn>
                <v-spacer></v-spacer>
                <v-btn color="success darken-1" text @click="dialog = false">Close</v-btn>
              </v-card-actions>
            </v-container>
          </v-card>
        </v-form>
      </v-dialog>

      <!-- edit role modal -->
      <v-dialog v-model="editUserDialog" max-width="600px">
          <v-card> 
            <v-card-title>
              <span class="headline">Edit User</span>
            </v-card-title>
            <v-card-text class="is-dialog-text">
              <v-form ref="roleForm" @submit.prevent="updateUser" >
                <v-row>
                    <v-col cols="12"
                    lg="6"
                    md="6"
                    sm="12"
                    xs=12
                    class="py-1">

                        <v-text-field
                            dense
                            outlined
                            label="First"
                            name="first"
                            append-icon="person"
                            type="first"
                            v-model="userForm.first"
                        />

                    </v-col>

                    <v-col cols="12"
                    lg="6"
                    md="6"
                    sm="12"
                    xs=12
                    class="py-1">

                        <v-text-field
                            dense
                            outlined
                            label="Last"
                            name="last"
                            type="last"
                            v-model="userForm.last"
                        />

                    </v-col>

                    <v-col cols="12"
                    lg="6"
                    md="6"
                    sm="12"
                    xs=12
                    class="py-1">
                        
                        <v-text-field
                            dense
                            outlined
                            label="Email"
                            name="email"
                            append-icon="mail"
                            type="email"
                            v-model="userForm.email"
                        />
                    </v-col>

                    <v-col cols="12"
                    lg="6"
                    md="6"
                    sm="12"
                    xs=12
                    class="py-1">
                        
                        <v-text-field
                            dense
                            outlined
                            label="Phone"
                            name="phone"
                            append-icon="phone"
                            type="phone"
                            v-model="userForm.phone"
                        />
                    </v-col>

                    <v-col cols="12"
                    lg="6"
                    md="6"
                    sm="12"
                    xs=12
                    class="py-1">

                        <v-select
                          id="roles"
                          append-icon="lock"
                          :items="roles"
                          v-model="userForm.role"
                          label="Role"
                          item-text="test"
                          item-value="test"
                          outlined
                          dense

                        >
                        
                        </v-select>
                    </v-col>

                    <v-col cols="12"
                    lg="6"
                    md="6"
                    sm="12"
                    xs="12"
                    class="py-0"
                    >
                        
                        <v-switch class="my-2" color="success" v-model="userForm.confirmed" :label="(userForm.confirmed ? 'Confirmed' : 'Not Confirmed')"></v-switch>
                    </v-col>


                    
                </v-row>
              </v-form>
            </v-card-text>
            <v-container class="is-card-container">
              <v-card-actions>
                <v-btn color="success darken-1" class="white--text" :loading="loading" @click="updateUser(userForm.id)" >Save</v-btn>
                <v-spacer></v-spacer>
                <v-btn color="success darken-1" text @click="editUserDialog = false">Close</v-btn>
              </v-card-actions>
            </v-container>
          </v-card>
      </v-dialog>

      <!-- edit role permissions modal -->

      <v-dialog v-model="editUserPermissions" max-width="800px">
        <v-form ref="roleForm" @submit.prevent="updateUser" >
          <v-card> 
            <v-card-title>
              <span class="headline">Edit Permissions - {{ user.name }}</span>
            </v-card-title>
            <v-card-text class="is-dialog-text">
              <v-container grid-list-xs ma-2>
                <v-row>
                
                  <v-col cols="3"
                  lg="3"
                  md="4"
                  sm="6"
                  xs="12"
                  class="pa-0" 
                  v-for="(perm, id) in permissions" :key="id">
                      <v-checkbox  
                        hide-details 
                        single-line 
                        :label="perm.name" 
                        v-model="value"
                        @click="assignPermissiontoUser(user.id, perm.id)" ></v-checkbox>
                  </v-col>


                </v-row>
              </v-container>
            </v-card-text>
            <v-container class="is-card-container">
              <v-card-actions>
                <v-btn color="success darken-1" class="white--text" :loading="loading" @click="updateUser(roleForm.id)" >Save</v-btn>
                <v-spacer></v-spacer>
                <v-btn color="success darken-1" text @click="editUserPermissions = false">Close</v-btn>
              </v-card-actions>
            </v-container>
          </v-card>
        </v-form>
      </v-dialog>

      <!-- The snackbar components takes message, and type props -->
    <snackbar-component :message="message"  :type="type"></snackbar-component>
    </div>
</template>

<script>
export default {
    data: () => ({
        // for modals
      dialog: false,
      editUserDialog: false,
      editUserPermissions: false,

      // for loading table
      tableLoading: false,
      
      // for snackbar
      type: '',
      message: '',

      // for loading button
      loading: false,

      userForm: new Form({
        id: '',
        first: '',
        last: '',
        email: '',
        phone: '',
        role: '',
        confirmed: false,
      }),
      nameRules: [
        v => !!v || 'Name is required',
        v => v.length >= 4 || 'Name must be 4 characters or more'
      ],

      // for checkbox
      value: null,
      userPermissionForm: new Form({
        user_id: '',
        permission_id: '',
      }),

      // table
      search: '',
      headers: [
        { text: 'Name', value: 'name', align: 'start' },
        { text: 'Email', value: 'email' },
        { text: 'Phone', value: 'phone' },
        // { text: 'ID Number', value: 'id_number' },
        // { text: 'Address', value: 'address' },
        // { text: 'permissions', value: 'permissions.length' },
        { text: 'Action', value: 'actions', sortable: false, align: 'center' }
      ],

      user: {},
      users: [],
      roles: [],
      permissions: [],
      userPermissions: [],
      
        
      

    }),

    methods: {
    
      getUserName(item){
          const newLocal=item.initials? item.initials:''
          const newLocal_1=item.first? item.first:''
          const newLocal_2=item.last? item.last:''
          return (newLocal) + ' ' + (newLocal_1) + ' ' + (newLocal_2)
      },
      getColor(permissions){
        if(permissions > 10) return "red"
        else if(permissions > 5) return "orange"
        else return "green"
      },

      editUser (item){
        this.editUserDialog = true
        this.userForm.fill(item)
                console.log(this.userForm.confirmed);

      },

      updateUser(id){
        
        this.userForm.put('/users/' + id).then((res) => {
          this.message = res.data
          this.type = 'success'
          Fire.$emit('showSnackbar')
          this.getUsers();
          this.editUserDialog = false
        }).catch((err) => {
          this.message = err.response.data
          this.type = 'error'
          Fire.$emit('showSnackbar')
          this.getUsers();
        })
      },

      deleteUser(item){
        axios.delete('/users/' + item.id).then((res) => {

          // show snackbar
          this.message = res.data
          this.type = 'success'
          Fire.$emit('showSnackbar')
          this.getUsers();
          
        }).catch((err) => {
          this.message = err.response.data
          this.type = 'error'
          Fire.$emit('showSnackbar')
          
        })
      },

      editPermissions(item) {
        this.role = item
        this.rolePermissions = this.role.permissions
        this.editRolePermissions = true
        
      },

      assignPermissiontoUser(user_id, permission_id){
        
        this.userPermissionForm.user_id = user_id
        this.userPermissionForm.permission_id = permission_id

        this.userPermissionForm.post('/assign-permission-to-user').then((res) => {
            this.message = res.data
            this.type = 'success'
            // emit a show snackbar event
            Fire.$emit('showSnackbar')
        }).catch((err) => {
            this.message = err.response.data.message
            this.type = 'error'
            // emit a show snackbar event
            Fire.$emit('showSnackbar')
        })
      },

      getUserValue(userPermissions_id, perm_id){
        if (userPermissions_id == perm_id) {
          this.value = true
        }
      },

      getUsers() {
        this.tableLoading = true;
        axios.get('/users').then((res) => {
          this.users = res.data.users
          this.roles = res.data.roles
          this.permissions = res.data.permissions
        });
        this.tableLoading = false;
      },

      saveUser() {

        if (this.$refs.userForm.validate()) {
          this.loading = true
          this.roleForm.post('/users').then((res) => {

            this.loading = false
            this.message = res.data
            this.type = 'success'
            // emit a show snackbar event
            Fire.$emit('showSnackbar')
            this.getUsers()
            this.dialog = false
          }).catch((err) => {

              // show snackbar
              this.loading = false
              this.message = err.response.data.message
              this.type = 'error'
              // emit a show snackbar event
              Fire.$emit('showSnackbar')
          })
        }
      }
    },

    mounted() {
      this.getUsers()
      
    }
}
</script>

<style lang="scss" scoped>
  .has-margin-top{
    margin-top: -70px;
  }
  .col-has-margin-top{
    margin-top: 20px;
  }
  .is-dialog-text{
    padding-bottom: 0px !important;
  }
  .is-card-container{
    padding-top: 0px !important;
  }
</style>