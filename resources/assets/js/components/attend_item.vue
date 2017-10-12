<template>
  <div class='attenditem' @click='click(item.name_cht)'>
    <a class="cardtop" :href='item.website' :title='"前往"+item.name_cht+"的網站"' target='_blank'>
      <img class="icon" :src='icon_url'>
      <div class="topleft">
        <span class=itemtag v-html='item.tag'></span>
        <br>
        <h3 v-html='item.name_cht'></h3>
        <h6 class=itemtheme>{{item.theme}}</h6>
      </div>
    </a>
    <div v-show="liststyle!='iconmode'">
      <hr>
        <p>
          <span v-html='expand?item.description_cht:(item.description_cht.substr(0,max_len)+"...")'></span>
          <span v-if='item.description_cht.length>max_len && !expand' class=swex @click='expand=true'>更多</span>
      </p>
        <hr>
        <p class=itemteach v-html='item.teach_thing'></p>
        <p class=itemlearn v-html='item.learn_thing'></p>
    </div>
  </div>
</template>

<script>
export default {
 props: ["item","liststyle"],
  data: function(){
    return {
      expand: true,
      max_len: 130
    }
  },
  methods: {
    // click: function(title){
      // if (ga)
        // ga('send', 'event', '參展單位', '點擊網站',title);
    // }            
  },
  computed:{
    icon_url(){
      return "/img/2017/expo_2017/teamlogos/"+this.item.tag[0]+"/"+this.item.tag+".jpg"
    }
  }
}
</script>

<style>

</style>
