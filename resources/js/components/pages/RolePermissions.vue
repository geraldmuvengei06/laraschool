<template>
    <div>
        <v-container
        class="fill-height is-roles"
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
                Roles
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
                :items="roles"
                :search="search"
                loading="tableLoading"
                loading-text="Loading... Please wait"
              >
                <template v-slot:item.calories="{ item }">
                  <v-chip :color="getColor(item.permissions)" dark>{{ item.permissions }}</v-chip>
                </template>

                <template v-slot:item.actions="{ item }">
                  
                   <v-btn
                    color="success "
                    class="white--text"
                    fab
                    @click="editRole(item)"
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
                    @click.stop="delete_dialog = true"
                    x-small
                  >
                    <v-icon
                    small
                    >
                      delete
                    </v-icon>
                  </v-btn>

                  <span>
                  <!-- delete dialog -->

                  <v-dialog
                  v-model="delete_dialog"
                  max-width="290"
                  >
                    <v-card>
                      <v-card-title class="headline">Are you sure you want to delete?</v-card-title>

                      <v-card-actions>
                        <v-spacer></v-spacer>

                        <v-btn
                          color="success darken-1"
                          text
                          @click="delete_dialog = false"
                        >
                          Cancel
                        </v-btn>

                        <v-btn
                          color="error darken-1"
                          text
                          @click.stop="deleteRole(item)"
                        >
                          Yes
                        </v-btn>
                      </v-card-actions>
                    </v-card>
                  </v-dialog>
                </span>

                  <v-btn
                    color="primary darken-1"
                    class="white--text"
                    @click="editPermissions(item)"
                    small
                  >
                   
                    Permissions
                  </v-btn>
                 
                </template>
              </v-data-table>
            </v-card>
          </v-col>
        </v-row>
      </v-container>

      <!-- create role -->

      <v-dialog v-model="dialog" max-width="400px">
        <v-form ref="roleForm" @submit.prevent="saveRole" >
          <v-card> 
            <v-card-title>
              <span class="headline">Add Role</span>
            </v-card-title>
            <v-card-text class="is-dialog-text">
                <v-row>
                
                  <v-col cols="12">
                    
                        <v-text-field
                          dense
                          outlined
                        label="Name*"
                        required
                        :rules="roleRules"
                        v-model="roleForm.name"
                        hide-details
                        ></v-text-field>
                        <div class="v-text-field__details">
                            <div class="v-messages theme--light">
                                <div class="v-messages__wrapper">
                                    <has-error :form="roleForm" class="v-messages theme--light error--text" field="name"></has-error>
                                </div>
                            </div>
                        </div>
                  </v-col>

                </v-row>
            </v-card-text>
            <v-container class="is-card-container">
              <v-card-actions>
                <v-btn color="success darken-1" class="white--text" :loading="loading" @click="saveRole" >Save</v-btn>
                <v-spacer></v-spacer>
                <v-btn color="success darken-1" text @click="dialog = false">Close</v-btn>
              </v-card-actions>
            </v-container>
          </v-card>
        </v-form>
      </v-dialog>

      <!-- edit role modal -->
      <v-dialog v-model="editRoleDialog" max-width="400px">
        <v-form ref="roleForm" @submit.prevent="updateRole" >
          <v-card> 
            <v-card-title>
              <span class="headline">Edit Role</span>
            </v-card-title>
            <v-card-text class="is-dialog-text">
                <v-row>
                
                  <v-col cols="12">
                    
                        <v-text-field
                          dense
                          outlined
                          label="Name*"
                          required
                          :rules="roleRules"
                          v-model="roleForm.name"
                          hide-details
                          ></v-text-field>
                          <div class="v-text-field__details">
                              <div class="v-messages theme--light">
                                  <div class="v-messages__wrapper">
                                      <has-error :form="roleForm" class="v-messages theme--light error--text" field="name"></has-error>
                                  </div>
                              </div>
                          </div>
                    
                  </v-col>

                </v-row>
            </v-card-text>
            <v-container class="is-card-container">
              <v-card-actions>
                <v-btn color="success darken-1" class="white--text" :loading="loading" @click="updateRole(roleForm.id)" >Save</v-btn>
                <v-spacer></v-spacer>
                <v-btn color="success darken-1" text @click="editRoleDialog = false">Close</v-btn>
              </v-card-actions>
            </v-container>
          </v-card>
        </v-form>
      </v-dialog>

      <!-- edit role permissions modal -->

      <v-dialog v-model="editRolePermissions" max-width="800px">
        <v-form ref="roleForm" @submit.prevent="updateRole" >
          <v-card> 
            <v-card-title>
              <span class="headline">Edit Permissions - {{ role.name }}</span>
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
                        :value="getRoleValue(rolePermissions.id, perm.id)"
                        @click="assignPermissiontoRole(role.id, perm.id)" ></v-checkbox>
                  </v-col>


                </v-row>
              </v-container>
            </v-card-text>
            <v-container class="is-card-container">
              <v-card-actions>
                <v-btn color="success darken-1" class="white--text" :loading="loading" @click="updateRole(roleForm.id)" >Save</v-btn>
                <v-spacer></v-spacer>
                <v-btn color="success darken-1" text @click="editRolePermissions = false">Close</v-btn>
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
      dialog: false,
      editRoleDialog: false,
      editRolePermissions: false,
      delete_dialog: false,

      // for loading table
      tableLoading: false,
      
      // for snackbar
      message: '',
      type: '',

      // for loading button
      loading: false,

      roleForm: new Form({
        id: '',
        name: '',
      }),

      // for checkbox
      value: null,
      rolePermissionForm: new Form({
        role_id: '',
        permission_id: '',
      }),




      search: '',
      headers: [
        { text: 'Name', value: 'name', align: 'start' },
        { text: 'Model', value: 'guard_name' },
        { text: 'permissions', value: 'permissions.length' },
        { text: 'Action', value: 'actions', sortable: false, align: 'center' }
      ],

      role: {},
      roles: [],
      permissions: [],
      rolePermissions: [],
      roleRules: [
          v => !!v || 'Name is required',
          v => v.length >= 4 || 'Name must be 4 characters or more'
        ]
        
      

    }),

    methods: {
      getColor(permissions){
        if(permissions > 10) return "red"
        else if(permissions > 5) return "orange"
        else return "green"
      },

      editRole (item){
        this.editRoleDialog = true
        this.roleForm.fill(item)
      },

      updateRole(id){
        this.roleForm.put('/roles/' + id).then((res) => {
          this.message = res.data
          this.type = 'success'
          Fire.$emit('showSnackbar')
          this.getRoles();
          this.editRoleDialog = false
        }).catch((err) => {
          this.message = err.response.data.message
          this.type = 'error'
          Fire.$emit('showSnackbar')
          this.getRoles();
        })
      },

      deleteRole(item){
        axios.delete('/roles/' + item.id).then((res) => {
          // show snackbar
          this.message = res.data
          this.type = 'success'
          Fire.$emit('showSnackbar')
          this.getRoles();
          this.delete_dialog = false
          
        }).catch((err) => {
          this.message = res.data
          this.type = 'error'
          Fire.$emit('showSnackbar')
          this.getRoles();
          
        })
      },

      editPermissions(item) {
        this.role = item
        this.rolePermissions = this.role.permissions
        this.editRolePermissions = true
        
      },

      assignPermissiontoRole(role_id, permission_id){
        
        this.rolePermissionForm.role_id = role_id
        this.rolePermissionForm.permission_id = permission_id

        this.rolePermissionForm.post('/assign-permission-to-role').then((res) => {
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

      getRoleValue(rolePermissions_id, perm_id){
        if (rolePermissions_id == perm_id) {
          this.value = true
        }
      },

      getRoles() {
        this.tableLoading = true;
        axios.get('/roles').then((res) => {
          this.roles = res.data.roles
          this.permissions = res.data.permissions
        });
        this.tableLoading = false;
      },

      saveRole() {

        if (this.$refs.roleForm.validate()) {
          this.loading = true
          this.roleForm.post('/roles').then((res) => {

            this.loading = false
            this.message = res.data
            this.type = 'success'
            // emit a show snackbar event
            Fire.$emit('showSnackbar')
            this.getRoles()
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
      this.getRoles()
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