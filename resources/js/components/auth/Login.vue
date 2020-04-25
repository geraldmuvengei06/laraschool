<template>
  <v-app id="inspire">
    <v-content >
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            lg="9"
            md="8"
            sm="6"
            class="hidden-xs-only is-background primary"
          >
            <div class="is-background-content">
              <v-spacer></v-spacer>
              <p class="is-logo white primary--text" >LS</p>
              <h4 class="title white--text">Laraschool</h4>
              <p class="subtitle-2 white--text">A school management system</p>
              <v-spacer></v-spacer>
              <p class="subtitle-2 white--text"><v-icon class="white--text">link</v-icon> Visit <a class="white--text" href="https://thundersoftwares.com">thundersoftwares.com</a> </p>
            </div>
          </v-col>

          <v-col
            cols="12"
            md="8"
            sm="6"
            class="hidden-sm-and-up is-background "
          >
          <div class="is-background-content-mini">
            <v-spacer></v-spacer>
            <p class="is-logo primary white--text" >LS</p>
            <h4 class="title accent--text">Laraschool</h4>
            <p class="subtitle-2 accent--text">A school management system</p>
            <v-spacer></v-spacer>
          </div>
          
          </v-col>
        
          <v-col
            cols="12"
            lg="3"
            md="4"
            sm="6"
            xs="12"
          >
            <v-form ref="form" @keydown="form.onKeydown($event)" @submit.prevent="doLogin()" >
              <v-card class="elevation-0 flat">
                <v-toolbar
                  color="transparent"
                  light
                  text
                  flat
                >
                  <v-toolbar-title>{{ title }}</v-toolbar-title>
                  <v-spacer />
                  <v-tooltip bottom>
                    <template v-slot:activator="{ on }">
                      <v-btn
                        :href="source"
                        icon
                        large
                        target="_blank"
                        v-on="on"
                      >
                        <v-icon>help</v-icon>
                      </v-btn>
                    </template>
                    <span>Source</span>
                  </v-tooltip>
                
                </v-toolbar>
                <v-card-text>
                    <v-text-field
                      label="Login"
                      name="login"
                      outlined
                      dense
                      append-icon="person"
                      type="email"
                      v-model="form.email"
                      :rules="emailRules"
                      width="200"
                    />

                    <v-text-field
                      id="password"
                      label="Password"
                      name="password"
                      outlined
                      dense
                      append-icon="lock"
                      type="password"
                      v-model="form.password"
                      :rules="passwordRules"
                    />
                  
                </v-card-text>
                <v-card-actions>
                  <v-btn text link :to="{ name: 'forgot-password' }"  color="primary"  >Forgot password?</v-btn>
                  <v-spacer />
                  <v-btn color="primary" :loading="loading" @click="doLogin">Login</v-btn>

                </v-card-actions>
                  <v-spacer></v-spacer>

                  <v-btn  text color="primary" class="mt-10" link :to="{ name: 'register' }">Don't have an account?</v-btn>
              </v-card>
            </v-form>
                
          </v-col>

          
        </v-row>
      </v-container>

      <snackbar-component :message="message"  :type="type"></snackbar-component>

    </v-content>
  </v-app>
</template>

<script>
  export default {
    props: {
      source: String,
    },

    data() {
      return {
        title : 'Login to your account',
        loading: false,
        message: '',
        type: '',
      
        form: new Form({
          email: '',
          password: '',
          remember: false
        }),
        emailRules: [
          v => !!v || 'E-mail is required',
          v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
        ],
        passwordRules: [
          v => !!v || 'Password is required',
          v => v.length >= 8 || 'Password must be 8 characters or more'
        ]
      }
    },

    methods: {
      doLogin() {
        if (this.$refs.form.validate()) {
          NProgress.start()
          this.loading = true
          
          this.form.post('/login').then((res) => {
            document.location.href = '/home'
            NProgress.done()
            this.loading = false
          }).catch((err) => {
              this.loading = false
              this.message = err.response.data.message
              this.type = 'error'
              Fire.$emit('showSnackbar')
              // this.error = err.response.data.errors
              this.isErrorSnackbar = true

          })

        }else{
           this.message = "The email and password field are required."
            this.type = 'error'
            Fire.$emit('showSnackbar')
        }
        
      }
    },

    

    created() {
      axios.get('/user').then((res) => {
        
        if(res != null || res != undefined){
                
          document.location.href = '/home'
        }
      })
    },
  }
</script>

<style lang="scss" scoped>

  .container{
    padding-top: 0;
    padding-bottom: 0;
  }

  .is-background{
    // background: #9652ff;
    
    .is-background-content{
      display: flex;
      height: 100vh;
      justify-content: center;
      align-items: center;
      flex-direction: column;

      .is-logo{
        font-size: 24px;
        font-weight: bold;
        padding: 12px 16px;
        border-radius: 50%;
      }
    }

    .is-background-content-mini{
      display: flex;
      height: 100px;
      justify-content: center;
      align-items: center;
      flex-direction: column;

      .is-logo{
        font-size: 24px;
        font-weight: bold;
        padding: 12px 16px;
        border-radius: 50%;
      }
    }

  }
  
</style>