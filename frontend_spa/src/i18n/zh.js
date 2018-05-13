let data = {
  global: {
    name: "雜學校",
  },
  page_about: {
    sub_slogan: `”奇幻繽紛的場景及融入生活的探索， 將教育與文化的多元串聯成亞洲最具影響力的創新會展品牌。”`
  },
  form: {
    label_next: "下一步",
    label_back: "上一步",
    label_submit: "確認送出",
    label_upload: "點擊上傳",
    step_confirm: "確認與送出",
    step_complete: "報名完成",
    confirm_dialog_title: "確認送出？送出將無法更改",
    confirm_dialog_content: "最後確認",
    confirm_dialog_yes: "確定",
    confirm_dialog_no: "取消",
    update_success: "資料更新成功",
    update_cancel: "已取消",
    data_not_complete: "資料填寫不完整或格式錯誤，請往前填寫完整後再送出"

  },
  regist_expo: {
    title: "2018 雜學校報名表單",
    sub_title: "為避免報名失敗，請務必先行詳閱徵展手冊中相關規範、時程與流程。",

    confirm_title: "恭喜你即將完成參展報名申請！",
    confirm_text: "請再次確認所有填寫資料後按下「確認送出」，並於三日內繳交報名費，才算完成所有報名手續呦！<br>＊海外參展者（含中國、港、澳等地區）享「免報名費」優惠。<br><br>報名費繳款帳戶：<br>銀行名稱－第一銀行永春分行 (007)<br>帳戶名稱－雜學股份有限公司<br>帳號－157-10-029362<br><br>遞交報名申請後，將由主辦單位以E-mail回覆收到線上報名資料，及提供上列報名費繳費資訊。若提交後三日內未收到相關回覆，請主動聯繫主辦單位查詢。<br><br>我確認資料已經正確無誤，送出後將無法修改<br>",
    complete_text: "謝謝你願意和我們一同為教育而努力！<br>最後甄選入選名單將於2018/07/10公布在官方網站。<br><br>如欲報名「ZA WORKSHOP 雜工坊」及「Zac. 教育新創短講評選」請繼續填寫表單：",

    sections: [
      {
        title: "ㄧ、參展資訊",
        id: 0,
        required: true,
        questions: [
          {
            title: "1. 申請攤位類型",
            type: "select",
            prop: "type",
            options: [
              { label: "基礎單位 (1m*1m 限高2.5m)", value: "基礎單位 (1m*1m 限高2.5m)" },
              { label: "標準單位 (2m*3m 限高2.5m)", value: "標準單位 (2m*3m 限高2.5m)" },
              { label: "進階單位 (2m*6m 限高2.5m)", value: "進階單位 (2m*6m 限高2.5m)" },
            ]
          },
          {
            title: "2. 申請類別（主辦方保留最後分配權）",
            type: "select",
            prop: "theme",
            options: [
              {label: "教育創新", value: "教育創新"},
              {label: "文化實踐", value: "文化實踐"},
              {label: "生活探索", value: "生活探索"},
              {label: "專業培育", value: "專業培育"}
            ] 
          },
          {
            title: "3. 是否曾參展雜學校？",
            type: "select",
            prop: "attended",
            explain: "若參展過2屆以上，請填寫「最近一次」的參展年份。",
            options: [
              {label: "首次參展", value: "首次參展"},
              {label: "2015不太乖教育節", value: "2015不太乖教育節"},
              {label: "2016雜學校", value: "2016雜學校"},
              {label: "2017雜學校", value: "2017雜學校"}
            ]
          }
        ]
      },
      {
        title: "二、申請單位資訊",
        id: 1,
        required: true,
        questions: [
          {
            title: "1. 申請單位/個人名稱 - 中文",
            prop: "name_cht",
          },
          {
            title: "1. 申請單位/個人名稱 - 英文",
            prop: "name_eng",
          },
          {
            title: "2. 申請單位/個人簡介 （請以200-300字讓我們能更認識你）",
            type: "textarea",
            prop: "description",
            settings: {
              maxlength: 300
            },
          },
          {
            title: "3. 你目前所經營/接觸的目標受眾（取前2個最接近的對話群、消費群）",
            type: "select",
            prop: "target_audience",
            settings: {
              multiple: true,
              'multiple-limit': 2 
            },
            options: [
              "學齡前幼兒","國小生","國中生","高中生","自學生","大專以上學生",
              "職場新鮮人","青壯年","家長","教育工作者","投資人","創業者","學校單位",
              "公部門","其他",
            ]
          },
          {
            title: "4. 最希望在雜學校接觸/開放的目標受眾（取前2個最想開發的對話群、消費群）",
            type: "select",
            prop: "want_audience",
            settings: {
              multiple: true,
              'multiple-limit': 2
            },
            options: [
              "學齡前幼兒", "國小生", "國中生", "高中生", "自學生", "大專以上學生",
              "職場新鮮人", "青壯年", "家長", "教育工作者", "投資人", "創業者", "學校單位",
              "公部門", "其他",
            ]
          },
          {
            title: "5. 是否在展位進行銷售行為？",
            type: "select",
            prop: "have_sell",
            options: [
              { label: "是（請於參展規劃簡報中介紹商品與現場售價）", value: 1 },
              { label: "否", value: 0 }
            ]
          },
          {
            title: "6. 請以一份20頁(內)電子簡報檔闡述參展規劃（主辦單位將以此份檔案作為雜星賞評選依據）",
            type: "file",
            prop: "file_proposal",
            explain: `建議內容設定：<br> 一、品牌/團隊/個人介紹
                      <br> 二、闡述自身教育觀點理念或與創新教育關聯性（參展雜學校原因）
                      <br> 三、本次參展主題或議題設定（如本次展出重點與品牌本身並無直接關聯，可詳加補述）
                      <br> 四、參展內容企劃與呈現方式（本次展出的亮點以及會如何執行與呈現）
                      <br> 五、展位內互動體驗或活動規劃（須為不影響人流動線的體驗或活動）
                      <br> 六、展位規劃示意圖
                      <br> 七、過往參展經驗或活動成果
                      <br> 八、如會在展位現場進行銷售或名單資料搜集，需提交商品介紹與現場售價或名單搜集方式（例如遊戲互動、傳單、coupon）
                      <br> 請務必輸出成pdf格式，並確認檔案大小在20MB限制內。若檔案不符導致系統無法存取，主辦方將不另行確認及通知。`,
          },
          {
            title: "7. 請簡述參與雜學校的原因（100字以內）",
            type: "textarea",
            prop: "attend_reason",
            settings: {
              maxlength: 100
            },
          },
          {
            title: "8. 備註－其他補充事項（200字以內）",
            type: "textarea",
            required: false,
            prop: "other",
            settings: {
              maxlength: 200
            },
          }
        ]
      }, 
      {
        title: "三、參展聯絡資料",
        id: 2,
        required: true,
        questions: [
          {
            title: "1. 主要聯絡人姓名（請優先填寫執行窗口）",
            prop: "main_contact_name",
          }, {
            title: "手機",
            prop: "main_contact_phone",
          }, {
            title: "Email",
            prop: "main_contact_email",
          }, {
            title: "2. 次要聯絡人",
            prop: "secondary_contact_name",
          }, {
            title: "手機",
            prop: "secondary_contact_phone",
          }, {
            title: "Email",
            prop: "secondary_contact_email",
          }
        ],
      }

    ],
  },
  regist_expoworkshop: {
    title: "雜工坊申請表",
    sub_title: "每一工坊場次時限為90 分鐘( 含進、退場時間)、可容納座位數30 人為上限。<br>如成功登記到雜工坊場次，開課單位須支付10, 000 元場次費，並由主辦單位統籌各場次報名、收費（每一參與者收500 元 / 場）事宜，如課堂衍生材料須由開課單位協力提供。（ 詳細說明請見徵展手冊 P.18）",

    confirm_title: "恭喜你即將完成雜工坊申請！",
    confirm_text: "請再次確認所有填寫資料後按下「確認送出」，主辦單位收到提案申請後將以E-mail回覆確認。若提交後三日內未收到相關回覆，請主動聯繫主辦單位查詢。",
    complete_text: "謝謝貴團隊的用心籌劃！<br>最後甄選結果與場次安排將於2018/07/10公布在官方網站。",

    sections: [
      {
        id: 0,
        title: "ㄧ、申請基本資訊",
        questions: [
          {
            title: "1. 課程類型",
            type: "select",
            prop: "class_type",
            options: [
              "藝術體驗創作",
              "傳統工藝教學",
              "互動式教學",
              "科學動手實驗",
              "創新教案分享與教學",
              "小型分享座談",
              "戶外活動",
              "其他"]

          },
          {
            title: "2. 活動招生族群",
            prop: "class_audience",
            required: false,
            settings: {
              placeholder: "無限制（一般大眾皆可）"
            }
          },
          {
            title: "3.	活動預計招生人數(場地建議容納人數以30人為限)",
            type: "number",
            prop: "class_person_count",
          }
          ,
          {
            title: "4. 登記場次",
            type: "select",
            explain: "請複選可配合安排之場次，若確定有登記到工坊場次，主辦單位會以此做為時段安排的參考。 ",
            prop: "class_time",
            settings: {
              multiple: true
            },
            options: [
              "10/5 (五) 13:00-14:30",
              "10/5 (五) 15:00-16:30",
              "10/5 (五) 17:00-18:30",
              "10/6 (六) 10:00-11:30",
              "10/6 (六) 13:00-14:30",
              "10/6 (六) 15:00-16:30",
              "10/6 (六) 17:00-18:30",
              "10/7 (日) 10:00-11:30",
              "10/7 (日) 13:00-14:30",
              "10/7 (日) 15:00-16:30",
              "10/7 (日) 17:00-18:30",
            ]
          },
          {
            title: "6. 請以一份20頁(內)電子簡報檔闡述參展規劃（主辦單位將以此份檔案作為雜星賞評選依據）",
            type: "file",
            prop: "class_proposal",
            explain: `建議內容設定：建議內容設定：
                <br>一、背景介紹（含品牌/團隊/講師介紹）
                <br>二、主題或議題設定（如本次體驗活動重點與品牌本身並無直接關聯，可詳加補述）
                <br>三、活動內容（目標族群、活動企劃、執行方式、人力分工配置等）
                <br>四、過往活動經驗或舉辦成果
                <br> 請務必輸出成pdf格式，並確認檔案大小在20MB限制內。若檔案不符導致系統無法存取，主辦方將不另行確認及通知。`
          }
        ]
      },
      {
        title: "二、工坊聯絡資料",
        id: 1,
        required: true,
        questions: [
          {
            title: "1. 主要聯絡人姓名（請優先填寫執行窗口）",
            prop: "main_contact_name",
          }, {
            title: "手機",
            prop: "main_contact_phone",
          }, {
            title: "Email",
            prop: "main_contact_email",
          }, {
            title: "2. 次要聯絡人",
            prop: "secondary_contact_name",
          }, {
            title: "手機",
            prop: "secondary_contact_phone",
          }, {
            title: "Email",
            prop: "secondary_contact_email",
          }
        ],
      }
    ]
  },
  regist_expospeak: {
    title: "Zac. 教育新創短講評選申請表",
    sub_title: "雜學校設法創造一個能提供實質資源的公開平台，透過Zac. 徵選，邀請通過初選之10 組入圍團隊（每一參與者均收21,000 元/ 展位）將移展至「雜學校概念館 」，由雜學校團隊量身訂製策展規劃，不只提供行銷與曝光的舞台，並讓其他參展團隊、記者媒體、貴賓等也有一個很棒的觀摩機會！（詳細參與辦法及相關評選內容請見徵展手冊 P.19)",

    confirm_title: "恭喜你即將完成「Zac. 教育新創短講評選」申請！",
    confirm_text: "請再次確認所有填寫資料後按下「確認送出」，主辦單位收到提案申請後將以E-mail回覆確認。若提交後三日內未收到相關回覆，請主動聯繫主辦單位查詢。",
    complete_text: "謝謝貴團隊的用心籌劃！<br>最後甄選結果與場次安排將於2018/07/10公布在官方網站。",

    sections: [
      {
        title: "ㄧ、申請基本資訊",
        id: 0,
        required: true,
        questions: [
          {
            title: "1. 評選入圍之單位，是否同意策展權益交由給主辦單位規劃與設計",
            type: "select",
            prop: "agree_plan",
            options: [
              { label: "是，移展至雜學校概念館（由雜學校團隊量身規劃展位）",value: 1},
              { label: "否，維持在雜博覽展出（參展團隊自行規劃展位）", value: 0 }
            ]
          },
          {
            title: "2. 團隊人數",
            type: "number",
            prop: "team_person_count",
          }, 
          {
            title: "3. 是否已有獲得資金挹注",
            type: "select",
            prop: "has_money",
            options: [
              { label: "是", value: 1 },
              { label: "否", value: 0 }
            ]
          },

        ]
      },
      {
        title: "二、申請資料填寫",
        id: 1,
        required: true,
        questions: [
          {
            title: "1. 請簡述你的具體創業內容（200-300字內）",
            type: "textarea",
            prop: "startup_content",
            settings: {
              maxlength: 300
            }
          }, {
            title: "2. 請簡述你的目標族群（200-300字內）",
            type: "textarea",
            prop: "startup_audience",
            settings: {
              maxlength: 300
            }
          },{
            title: "3. 請簡述你目前的創業困境（200-300字內）",
            type: "textarea",
            prop: "startup_difficult",
            settings: {
              maxlength: 300
            }
          }, {
            title: "4. 請敘述你想解決的教育問題（200-300字內）",
            type: "textarea",
            prop: "startup_problem",
            settings: {
              maxlength: 300
            }
          }, {
            title: "5. 請敘述你認為團隊/產品賦予社會的影響力是（200-300字內）",
            type: "textarea",
            prop: "startup_power",
            settings: {
              maxlength: 300
            }
          }, {
            title: "6. 請檢附一份20頁(內)提案計畫書（主辦單位將以此份檔案作為「Zac.新創教育短講評選」初選評比依據。）",
            type: "file",
            prop: "startup_proposal",
            explain: `建議內容設定：<br>一、背景介紹（含品牌/ 團隊介紹）
                    <br>二、創業目標
                    <br>三、創業內容（目標市場、族群、競爭力分析等）
                    <br>四、實施方法（目前發展狀況、商業模式、成果等）
                    <br>五、執行期程與規劃
                    <br>六、人力配置
                    <br>七、預算分配及運用
                    <br>八、風險評估
                    <br>九、預期效益
                    <br>請務必輸出成pdf格式，並確認檔案大小在20MB限制內。若檔案不符導致系統無法存取，主辦方將不另行確認及通知。`,
          }
        ]
      },
      {
        title: "三、申請人聯絡資料",
        id: 2,
        required: true,
        questions: [
          {
            title: "1. 主要聯絡人姓名（請優先填寫執行窗口）",
            prop: "main_contact_name",
          }, {
            title: "手機",
            prop: "main_contact_phone",
          }, {
            title: "Email",
            prop: "main_contact_email",
          }, {
            title: "2. 次要聯絡人",
            prop: "secondary_contact_name",
          }, {
            title: "手機",
            prop: "secondary_contact_phone",
          }, {
            title: "Email",
            prop: "secondary_contact_email",
          }
        ],
      }
    ]

  }
}
export default data