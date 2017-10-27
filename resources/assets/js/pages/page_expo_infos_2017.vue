<template lang="pug">
.page_expo_info2017
  .container.text-center
    .row
      .col-sm-12
        a.btn.btn-primary.btn-lg(
            href="/files/雜學校zashare2017-展覽手冊.pdf",
            target="_blank",
            @click="$ga.event('manual', 'click', '下載展覽手冊')")
          i.fa.fa-book
          h1 展覽手冊下載
          i.fa.fa-angle-down
</template>

<script>
export default {

}
</script>

<style>

</style>
