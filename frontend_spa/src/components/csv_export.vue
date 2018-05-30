<template lang="pug">
  
  el-button.float-right(@click="export_csv") 匯出成csv
</template>

<script>
export default {
  props: ["data","title","trans"],
  methods: {
     
    export_csv(){
      let args = {
        data: this.data,
        title: this.title,
        headers: this.headers
      }
      let convertToCSV = function convertToCSV(objArray) {
          var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
          var str = '';

          for (var i = 0; i < array.length; i++) {
              var line = '';
              for (var index in array[i]) {
                  if (line != '') line += ','
                  // let hasNL = (""+array[i][index]).indexOf("\n")>-1
                  line+='"'
                  let data =  array[i][index]
                  data = ((data===null?"":data)+ "").replace(/\"/g,"\"\"")
                  data = ((data===null?"":data)+ "").replace(/,/g,"\",")
                  line += data;
                  line+='"'
              }

              str += line + '\r\n';
          }

          return str;
      }

      let exportCSVFile = function exportCSVFile(headers, items, fileTitle) {
          if (headers) {
              items.unshift(headers);
          }

          // Convert Object to JSON
          var jsonObject = JSON.stringify(items);

          var universalBOM = "\uFEFF";
          var csv = convertToCSV(jsonObject);

          var exportedFilenmae = fileTitle + '.csv' || 'export.csv';

          var blob = new Blob(["\ufeff",csv], { type: 'text/csv;charset=utf-8;' });
          if (navigator.msSaveBlob) { // IE 10+
              navigator.msSaveBlob(blob, exportedFilenmae);
          } else {
              var link = document.createElement("a");
              if (link.download !== undefined) { // feature detection
                  // Browsers that support HTML5 download attribute
                  var url = URL.createObjectURL(blob);
                  link.setAttribute("href", url);
                  link.setAttribute("download", exportedFilenmae);
                  link.style.visibility = 'hidden';
                  document.body.appendChild(link);
                  link.click();
                  document.body.removeChild(link);
              }
          }
      }

      let headers = null
      let rkey = args.row_keys || this.default_row_keys;
      headers = {};
      rkey.forEach(o=>headers[o]=o)
      

      var fileTitle = args.title || "資料匯出"; // or 'my-unique-title'
      let dateString = ( new Date().toLocaleDateString()).replace(/[\/\s\:]/g,"");
      exportCSVFile(headers, JSON.parse(JSON.stringify(args.data)), fileTitle + dateString); 

    }
  },
    computed: {
      default_row_keys(){
        //使用reduce 過濾初步重複欄位名稱（預設抓資料）
        let row_keys = Array.from(this.data).concat({}).reduce(
          (keys,data_row)=>keys.concat(Object.keys(data_row)),[]
        ).filter(
          (d,i,arr)=>arr.indexOf(d)==i
        )

        if (this.conf && this.conf.show_id && row_keys.indexOf("id")==-1 ){
          row_keys.unshift("id")
        }

        return row_keys
      },
    }
}
</script>

<style>

</style>
