var json = require('json-file')
var file = 'team_2017.json'
// jsonfile.readFile(file, function (err, obj) {
//   console.dir(err)
// })

// Likewise, this... 
var fs = require("fs")
var data = fs.readFile(file, "utf8", function (err, data) {
  // console.log(data)
  var jsondata = JSON.parse(data)
  console.log(jsondata)
  //載入MySQL模組
  var mysql = require('mysql');
  //建立連線
  var connection = mysql.createConnection({
    host: '127.0.0.1',
    user: 'root',
    password: '@##434frt))',
    database: 'zashare'
  });
  //開始連接
  connection.connect();
  jsondata
    .map(obj => ({
      // tag: obj.tag_team,
      tag: obj.tag,
      place: obj.space,
      // space_num: obj.space_num,
      theme: obj.theme,
      cata: "",
      name_cht: obj.name_cht,
      name_eng: obj.name_eng,
      discribe_cht: obj.description_cht,
      discribe_eng: obj.description_eng,
      learn_thing: "",
      teach_thing: "",
      website: obj.website,
      year: "2017",
    }))
    .forEach(d => {
      connection.query('INSERT INTO `companies` SET ?', d, function (error) {
        if (error) {
          console.log('寫入資料失敗！');
          throw error;
        }
      });
    })
  connection.end();

});