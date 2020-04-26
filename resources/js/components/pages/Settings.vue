<template>
    <div>
        <v-container
        class="fill-height is-settings"
        fluid
      >
        <v-row
        >
          <v-col
          cols="12"
          lg="3"
          md="4"
          sm="4"
          xs="12"
          class="col-has-margin-top"
          
          >
            <v-card flat>
              <v-tabs
                v-model="settingsTabs"
                color="success"
                light
                slider-color="success lighten2"
                vertical
                align="center"
              >

              <v-tabs-slider></v-tabs-slider>
                  <v-tab href="#appsettings">
                      <v-icon class="pr-1" >dashboard</v-icon>
                      <span>App Settings</span>
                  </v-tab>
                  <v-tab href="#mailsettings">
                      <v-icon class="pr-1">mail</v-icon>
                      <span>Mail Settings</span>
                  </v-tab>

                  <v-tab href="#messagesettings">
                      <v-icon class="pr-1">mail</v-icon>
                      <span>SMS Settings</span>
                  </v-tab>

              </v-tabs>

            </v-card>
          </v-col>


          <v-col
          cols="12"
          lg="9"
          md="8"
          sm="8"
          xs="12"
          class="col-has-margin-top"
          >
            <v-card flat>
              <v-card-text>
                <v-tabs-items v-model="settingsTabs">
                  <v-tab-item
                  value="appsettings">
                      <v-card flat class="pb-4">
                        <v-card-title primary-title>
                          App Settings
                        </v-card-title>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis rerum, consequatur sunt autem eius temporibus accusantium aliquam quibusdam iure. Amet consequuntur error libero consequatur quo veritatis, natus adipisci nisi dolores.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem asperiores molestias similique optio corporis quas quod voluptatibus modi cumque ad possimus rem facilis accusantium voluptas atque culpa adipisci, sint nisi!
                          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci, itaque, temporibus aspernatur mollitia nisi numquam ab sit aut quod, fugiat animi! Quo ipsa ipsum tenetur tempore odit facere. Error, officiis.
                      </v-card>
                  </v-tab-item>
                  <v-tab-item
                  value="mailsettings">

                      <v-card class="pb-4" flat>
                          <v-card-title primary-title>
                            Mail Settings
                          </v-card-title>
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem eos expedita aspernatur accusamus, harum recusandae, suscipit aperiam, corporis nemo quisquam libero et hic vitae numquam sed voluptatibus explicabo qui debitis.
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem eos expedita aspernatur accusamus, harum recusandae, suscipit aperiam, corporis nemo quisquam libero et hic vitae numquam sed voluptatibus explicabo qui debitis.
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem eos expedita aspernatur accusamus, harum recusandae, suscipit aperiam, corporis nemo quisquam libero et hic vitae numquam sed voluptatibus explicabo qui debitis.
                      </v-card>
                      
                  </v-tab-item>

                  <v-tab-item
                  value="messagesettings">

                      <v-card class="pb-4" flat>
                          <v-card-title primary-title>
                            Message Settings
                          </v-card-title>
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem eos expedita aspernatur accusamus, harum recusandae, suscipit aperiam, corporis nemo quisquam libero et hic vitae numquam sed voluptatibus explicabo qui debitis.
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem eos expedita aspernatur accusamus, harum recusandae, suscipit aperiam, corporis nemo quisquam libero et hic vitae numquam sed voluptatibus explicabo qui debitis.
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem eos expedita aspernatur accusamus, harum recusandae, suscipit aperiam, corporis nemo quisquam libero et hic vitae numquam sed voluptatibus explicabo qui debitis.
                      </v-card>
                      
                  </v-tab-item>

                 
                </v-tabs-items>
              </v-card-text>
            </v-card>
          </v-col>



        </v-row>
      </v-container>
    </div>
</template>

<script>
export default {
    data() {
      return {
        sheet: false,
        settingsTabs: null,
      }
    },
    mounted() {
        console.log('Settings mounted.')
    }
}
</script>