<template lang="pug">
  .attenditem(@click='click(item.name_cht)')
    a.row.cardtop(:href='item.website', :title='"前往"+item.name_cht+"的網站"', target='_blank')
      .col-xs-4.col-icon
        img.icon(:src='icon_url')
      .col-sm-8
        .topleft
          span.itemtag(v-html='item.tag')
          br
          h3(v-html='item.name_cht')
          h6.itemtheme(v-html="item.theme")
    .row(v-show="liststyle!='iconmode'")
      .col-sm-12
        hr
        p
          span(v-html='expand?item.description_cht:(item.description_cht.substr(0,max_len)+"...")')
          span.swex(v-if='item.description_cht.length>max_len && !expand', @click='expand=true') 更多
        //- hr
        //- p.itemteach(v-html='item.teach_thing')
        //- p.itemlearn(v-html='item.learn_thing')

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
    click: function(title){
      this.$ga.event('link', 'click', title.replace(/(<([^>]+)>)/ig,""));
    }            
  },
  computed:{
    icon_url(){
      let tag = this.item.ori_tag?this.item.ori_tag:this.item.tag
      return "/img/2017/expo_2017/teamlogos/"+tag[0]+"/"+tag+".jpg"
    }
  }
}
</script>

<style>

</style>
